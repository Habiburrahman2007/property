<?php
 
namespace App\Http\Controllers;
 
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Cache;

/**
 * Controller: AuthController
 *
 * Manages authenticating agents and superadmins to the portal.
 */
class AuthController extends Controller
{
    /**
     * Show the agent login page.
     */
    public function showLogin()
    {
        // If already logged in, redirect to properties dashboard
        if (session()->has('admin_user')) {
            return redirect('/admin/properties');
        }
 
        return view('admin.login');
    }
 
    /**
     * Authenticate the incoming login request.
     */
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $email = strtolower($request->email);
        $cacheKey = 'login_fails_' . $email;
        $lockoutKey = 'login_lockout_' . $email;

        // 1. Check if currently locked out
        if (Cache::has($lockoutKey)) {
            $expiresAt = Cache::get($lockoutKey);
            $remainingSeconds = $expiresAt - time();
            $remainingMinutes = ceil($remainingSeconds / 60);
            return back()->withInput()->with('error', "Akun Anda sedang dikunci karena 5x gagal login dalam 30 menit. Silakan coba lagi dalam {$remainingMinutes} menit.");
        }
 
        $user = User::where('email', $request->email)->first();
 
        // Check if user exists and password matches
        if (!$user || !Hash::check($request->password, $user->password)) {
            // Record failed attempt
            $attempts = Cache::get($cacheKey, []);
            $now = time();
            
            // Filter attempts within the last 30 minutes (1800 seconds)
            $attempts = array_filter($attempts, function ($timestamp) use ($now) {
                return ($now - $timestamp) < 1800;
            });
            
            // Add current failure
            $attempts[] = $now;
            
            // Save back to cache (keep it alive for 30 minutes)
            Cache::put($cacheKey, $attempts, 1800);
            
            // If failed attempts in last 30 minutes is 5 or more, lock out for 15 minutes (900 seconds)
            if (count($attempts) >= 5) {
                Cache::put($lockoutKey, $now + 900, 900);
                return back()->withInput()->with('error', 'Percobaan login gagal yang ke-5. Akun Anda dikunci selama 15 menit.');
            }

            $sisaPercobaan = 5 - count($attempts);
            return back()->withInput()->with('error', "Kombinasi email atau password salah. Sisa percobaan: {$sisaPercobaan}x.");
        }
 
        // Check if admin account is active
        if (!$user->is_active) {
            return back()->withInput()->with('error', 'Akun Anda dinonaktifkan. Silakan hubungi Superadmin.');
        }

        // Clear fail history on successful login
        Cache::forget($cacheKey);
        Cache::forget($lockoutKey);
 
        // Update last login timestamp
        $user->update(['last_login_at' => now()]);
 
        // Store user in session
        session(['admin_user' => [
            'id' => $user->id,
            'email' => $user->email,
            'role' => $user->role,
        ]]);
 
        // Log successful login
        \App\Models\AuditLog::log('System Login', 'Authentication', '-');
 
        return redirect('/admin/properties')->with('success', 'Selamat datang kembali!');
    }

    /**
     * Terminate the session and log the agent out.
     */
    public function logout()
    {
        // Log logout BEFORE session is forgotten (so we have user context)
        \App\Models\AuditLog::log('System Logout', 'Authentication', '-');

        session()->forget('admin_user');
        return redirect('/agent/login')->with('success', 'Anda telah berhasil logout.');
    }
}
