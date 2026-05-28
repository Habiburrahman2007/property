<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Property;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

/**
 * Controller: PropertyController
 *
 * Manages the listings dashboard and filtering logic in the admin portal.
 */
class PropertyController extends Controller
{
    /**
     * Display a filtered inventory list of all properties.
     */
    public function index(Request $request)
    {
        $query = Property::query();

        // 1. Text Search (nama_property or group_name)
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('nama_property', 'like', "%{$search}%")
                  ->orWhere('group_name', 'like', "%{$search}%");
            });
        }

        // 2. Filter: Kawasan (JSON Array Search)
        if ($request->filled('kawasan') && $request->kawasan != 'Semua Kawasan') {
            $kawasan = $request->kawasan;
            // Cross-compatible: works for both sqlite and mysql JSON structures
            $query->where(function($q) use ($kawasan) {
                $q->whereJsonContains('kawasan', $kawasan)
                  ->orWhere('kawasan', 'like', "%{$kawasan}%");
            });
        }

        // 3. Filter: Hadap (SET / Multi-selection)
        if ($request->filled('hadap') && $request->hadap != 'Semua Arah') {
            $query->where('hadap', 'like', "%{$request->hadap}%");
        }

        // 4. Filter: Siap (Move-in readiness)
        if ($request->filled('siap') && $request->siap != 'Semua Kondisi') {
            $query->where('siap', $request->siap);
        }

        // 5. Filter: Lebar Min
        if ($request->filled('lebar_min')) {
            $query->where('lebar', '>=', $request->lebar_min);
        }

        // 6. Filter: Harga Max
        if ($request->filled('harga_max')) {
            $query->where('price', '<=', $request->harga_max);
        }

        // 7. Filter: Tipe (Ruko / Villa)
        if ($request->filled('tipe') && $request->tipe != 'Semua') {
            $query->where('tipe', $request->tipe);
        }

        // 8. Filter: Status (in stock / sold_out)
        if ($request->filled('status') && $request->status != 'All') {
            $query->where('status', $request->status);
        }

        // 9. Filter: Carport (Boolean)
        if ($request->filled('carport')) {
            $carportVal = $request->carport === 'true';
            $query->where('carport', $carportVal);
        }

        // Get per_page limit from request, default to 50
        $perPage = $request->integer('per_page', 50);
        if (!in_array($perPage, [25, 50, 100])) {
            $perPage = 50;
        }

        // Fetch properties paginated
        $properties = $query->latest()->paginate($perPage)->withQueryString();

        return view('admin.dashboard', compact('properties'));
    }

    /**
     * Return JSON details of a single property (used for the side drawer).
     */
    public function show($id)
    {
        $property = Property::with('creator')->findOrFail($id);

        // Format price to readable IDR currency for JSON response
        $property->formatted_price = 'Rp ' . number_format($property->price, 0, ',', '.');
        $property->dimensions = round($property->lebar) . 'm x ' . round($property->panjang) . 'm';

        return response()->json($property);
    }

    /**
     * Store a newly created property listing.
     */
    public function store(Request $request)
    {
        if (session('admin_user.role') !== 'superadmin') {
            return response()->json(['error' => 'Akses terbatas untuk Superadmin saja.'], 403);
        }

        $validated = $request->validate([
            'nama_property' => 'required|string|max:100|min:3',
            'group_name' => 'nullable|string|max:255',
            'lebar' => 'required|numeric|min:0',
            'panjang' => 'required|numeric|min:0',
            'hadap' => 'required|array',
            'tipe' => 'required|string|in:Villa,Ruko',
            'tingkat' => 'required|numeric|min:0',
            'price' => 'required|numeric|min:0',
            'carport' => 'nullable',
            'status' => 'required|string|in:in stock,sold_out',
            'siap' => 'required|string|in:siap_huni,siap_kosong,siap_huni_renovasi',
            'maps_link' => 'nullable|url',
            'kawasan' => 'required|array',
            'unit' => 'nullable|string|max:50',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $validated['carport'] = $request->has('carport') && $request->carport == '1';
        $validated['hadap'] = implode(', ', $request->hadap);
        $validated['created_by'] = session('admin_user.id');

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('properties', 'public');
            $validated['image'] = $path;
        }

        Property::create($validated);

        return response()->json(['success' => true, 'message' => 'Properti berhasil ditambahkan!']);
    }

    /**
     * Update the specified property listing.
     */
    public function update(Request $request, $id)
    {
        if (session('admin_user.role') !== 'superadmin') {
            return response()->json(['error' => 'Akses terbatas untuk Superadmin saja.'], 403);
        }

        $property = Property::findOrFail($id);

        $validated = $request->validate([
            'nama_property' => 'required|string|max:255',
            'group_name' => 'nullable|string|max:255',
            'lebar' => 'required|numeric|min:0',
            'panjang' => 'required|numeric|min:0',
            'hadap' => 'required|array',
            'tipe' => 'required|string|in:Villa,Ruko',
            'tingkat' => 'required|numeric|min:0',
            'price' => 'required|numeric|min:0',
            'carport' => 'nullable',
            'status' => 'required|string|in:in stock,sold_out',
            'siap' => 'required|string|in:siap_huni,siap_kosong,siap_huni_renovasi',
            'maps_link' => 'nullable|url',
            'kawasan' => 'required|array',
            'unit' => 'nullable|string|max:50',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $validated['carport'] = $request->has('carport') && $request->carport == '1';
        $validated['hadap'] = implode(', ', $request->hadap);

        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($property->image) {
                Storage::disk('public')->delete($property->image);
            }
            $path = $request->file('image')->store('properties', 'public');
            $validated['image'] = $path;
        }

        $property->update($validated);

        return response()->json(['success' => true, 'message' => 'Properti berhasil diperbarui!']);
    }

    /**
     * Soft-delete the specified property listing.
     */
    public function destroy($id)
    {
        if (session('admin_user.role') !== 'superadmin') {
            return response()->json(['error' => 'Akses terbatas untuk Superadmin saja.'], 403);
        }

        $property = Property::findOrFail($id);
        $property->delete();

        return response()->json(['success' => true, 'message' => 'Properti berhasil dihapus!']);
    }

    /**
     * Display a list of archived (soft-deleted) properties.
     */
    public function archive(Request $request)
    {
        if (session('admin_user.role') !== 'superadmin') {
            abort(403, 'Akses terbatas untuk Superadmin saja.');
        }

        $query = Property::onlyTrashed();

        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('nama_property', 'like', "%{$search}%")
                  ->orWhere('group_name', 'like', "%{$search}%");
            });
        }

        if ($request->filled('tipe')) {
            $query->where('tipe', $request->tipe);
        }

        $properties = $query->latest('deleted_at')->paginate(10)->withQueryString();

        return view('admin.properties.archive', compact('properties'));
    }

    /**
     * Return JSON details of a single archived property.
     */
    public function showArchive($id)
    {
        if (session('admin_user.role') !== 'superadmin') {
            return response()->json(['error' => 'Akses terbatas untuk Superadmin saja.'], 403);
        }

        $property = Property::onlyTrashed()->with('creator')->findOrFail($id);
        $property->formatted_price = 'Rp ' . number_format($property->price, 0, ',', '.');
        $property->dimensions = round($property->lebar) . 'm x ' . round($property->panjang) . 'm';

        return response()->json($property);
    }

    /**
     * Restore a soft-deleted property.
     */
    public function restore($id)
    {
        if (session('admin_user.role') !== 'superadmin') {
            return response()->json(['error' => 'Akses terbatas untuk Superadmin saja.'], 403);
        }

        $property = Property::onlyTrashed()->findOrFail($id);
        $property->restore();

        return response()->json(['success' => true, 'message' => 'Properti berhasil dipulihkan!']);
    }
}
