<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $properties = \App\Models\Property::orderBy('created_at', 'desc')->take(6)->get();
    return view('home', compact('properties'));
});

Route::get('/about', function () {
    return view('about');
});

Route::get('/contact', function () {
    return view('contact');
});

Route::post('/contact', function (Illuminate\Http\Request $request) {
    // 1. Anti-spam Rate Limiting: 3 submit per IP per jam
    $ip = $request->ip();
    $key = 'contact_submit:' . $ip;

    if (Illuminate\Support\Facades\RateLimiter::tooManyAttempts($key, 3)) {
        $seconds = Illuminate\Support\Facades\RateLimiter::availableIn($key);
        $minutes = ceil($seconds / 60);
        return redirect()->back()
            ->withInput()
            ->withErrors(['rate_limit' => "Terlalu banyak pengiriman pesan. Silakan coba lagi dalam {$minutes} menit."]);
    }

    // 2. Validasi input: semua wajib diisi, format email valid, HP min 10 digit
    $request->validate([
        'nama' => 'required|string|max:255',
        'email' => 'required|email|max:255',
        'phone' => 'required|string|min:10|max:15',
        'pesan' => 'required|string',
    ], [
        'nama.required' => 'Nama lengkap wajib diisi.',
        'email.required' => 'Alamat email wajib diisi.',
        'email.email' => 'Format alamat email tidak valid.',
        'phone.required' => 'Nomor HP wajib diisi.',
        'phone.min' => 'Nomor HP harus memiliki minimal 10 digit.',
        'pesan.required' => 'Pesan wajib diisi.',
    ]);

    // Record the successful rate limit attempt
    Illuminate\Support\Facades\RateLimiter::hit($key, 3600); // 1 hour window

    // 3. Ambil session prime_portal_messages
    $messages = session('prime_portal_messages', []);

    // 4. Buat pesan baru dan masukkan ke urutan teratas
    $newId = count($messages) > 0 ? max(array_column($messages, 'id')) + 1 : 1;
    $newMessage = [
        'id' => $newId,
        'name' => $request->nama,
        'email' => $request->email,
        'phone' => $request->phone,
        'date' => now()->setTimezone('Asia/Jakarta')->format('d M Y, H:i') . ' WIB',
        'snippet' => Illuminate\Support\Str::limit($request->pesan, 60),
        'message' => $request->pesan,
        'is_read' => false,
        'tags' => ["New Lead", "Hubungi Kami"]
    ];

    array_unshift($messages, $newMessage);
    session(['prime_portal_messages' => $messages]);

    // 5. Kirim email notifikasi ke admin Prime Property
    try {
        Illuminate\Support\Facades\Mail::raw(
            "Halo Admin,\n\nAda pesan baru yang masuk melalui formulir kontak Prime Property:\n\n" .
            "Nama: {$request->nama}\n" .
            "Email: {$request->email}\n" .
            "Telepon: {$request->phone}\n" .
            "Pesan:\n{$request->pesan}\n\n" .
            "Silakan periksa di portal administrasi.",
            function ($message) use ($request) {
                $message->to('admin@primeproperty.co.id')
                        ->subject('Notifikasi Pesan Baru: ' . $request->nama);
            }
        );
    } catch (\Exception $e) {
        // Log mail failure gracefully without disrupting user flow
        Illuminate\Support\Facades\Log::error("Failed to send admin email notification: " . $e->getMessage());
    }

    return redirect()->back()->with('success_message', 'Pesan terkirim, tim kami akan menghubungi Anda.');
});

// Public API endpoint for dynamic property details in homepage drawer
Route::get('/properties/{id}/json', function ($id) {
    try {
        $property = \App\Models\Property::findOrFail($id);
        return response()->json($property);
    } catch (\Exception $e) {
        return response()->json(['error' => 'Property not found'], 404);
    }
});

// ─── Authentication Routes ────────────────────────────────────────────────────
// AC-9.2: Auth endpoints throttled at 10 req/min/IP
Route::middleware('throttle:auth')->group(function () {
    Route::get('/agent/login', [App\Http\Controllers\AuthController::class, 'showLogin'])->name('agent.login');
    Route::post('/agent/login', [App\Http\Controllers\AuthController::class, 'login']);
    Route::post('/logout', [App\Http\Controllers\AuthController::class, 'logout']);
});

// ─── Protected Admin Portal Routes ───────────────────────────────────────────
// AC-9.2: All internal endpoints protected by auth middleware.
//         Global rate limiting at 100 req/min/IP applied to the entire group.
Route::middleware(['admin.auth', 'throttle:global'])->prefix('admin')->group(function () {
    Route::get('/properties/archive', [App\Http\Controllers\Admin\PropertyController::class, 'archive']);
    Route::get('/properties/archive/{id}', [App\Http\Controllers\Admin\PropertyController::class, 'showArchive']);
    Route::post('/properties/{id}/restore', [App\Http\Controllers\Admin\PropertyController::class, 'restore']);

    Route::get('/properties', [App\Http\Controllers\Admin\PropertyController::class, 'index']);
    Route::get('/properties/{id}', [App\Http\Controllers\Admin\PropertyController::class, 'show']);
    Route::post('/properties', [App\Http\Controllers\Admin\PropertyController::class, 'store']);
    Route::put('/properties/{id}', [App\Http\Controllers\Admin\PropertyController::class, 'update']);
    Route::delete('/properties/{id}', [App\Http\Controllers\Admin\PropertyController::class, 'destroy']);

    Route::get('/users', [App\Http\Controllers\Admin\UserController::class, 'index']);
    Route::post('/users', [App\Http\Controllers\Admin\UserController::class, 'store']);
    Route::post('/users/{id}/toggle', [App\Http\Controllers\Admin\UserController::class, 'toggleActive']);
    Route::post('/users/{id}/reset-password', [App\Http\Controllers\Admin\UserController::class, 'resetPassword']);

    Route::get('/logs', [App\Http\Controllers\Admin\AuditLogController::class, 'index']);

    Route::get('/messages', function () {
        return view('admin.messages');
    });

    Route::post('/messages/{id}/toggle-read', function ($id) {
        $messages = session('prime_portal_messages', []);
        foreach ($messages as &$msg) {
            if ($msg['id'] == $id) {
                $msg['is_read'] = !$msg['is_read'];
                break;
            }
        }
        session(['prime_portal_messages' => $messages]);
        return response()->json(['success' => true]);
    });

    Route::delete('/messages/{id}', function ($id) {
        $messages = session('prime_portal_messages', []);
        $messages = array_values(array_filter($messages, function ($msg) use ($id) {
            return $msg['id'] != $id;
        }));
        session(['prime_portal_messages' => $messages]);
        return response()->json(['success' => true]);
    });
});


