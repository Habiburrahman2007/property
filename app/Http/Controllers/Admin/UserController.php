<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * Controller: UserController
 *
 * Manages administrative and agent accounts under Superadmin jurisdiction.
 */
class UserController extends Controller
{
    /**
     * Display a listing of all administrators and agents.
     */
    public function index()
    {
        if (session('admin_user.role') !== 'superadmin') {
            abort(403, 'Akses ditolak. Halaman ini hanya tersedia untuk Superadmin.');
        }

        $users = User::latest()->get();

        return view('admin.users', compact('users'));
    }

    /**
     * Create a new administrative user.
     * Manually provisioned with a dynamically generated secure password.
     */
    public function store(Request $request)
    {
        if (session('admin_user.role') !== 'superadmin') {
            return response()->json(['error' => 'Akses terbatas untuk Superadmin saja.'], 403);
        }

        $request->validate([
            'email' => 'required|email|max:255|unique:users,email',
            'role' => 'required|string|in:admin,superadmin',
        ]);

        // Generate a secure random password
        $tempPassword = Str::random(12);

        $user = User::create([
            'email' => $request->email,
            'password' => Hash::make($tempPassword),
            'role' => $request->role,
            'is_active' => true,
        ]);

        // Log admin creation
        \App\Models\AuditLog::log('Created Admin', 'Admin Management', "Account: {$user->email} (Role: {$user->role})");

        return response()->json([
            'success' => true,
            'message' => 'Akun admin baru berhasil dibuat!',
            'email' => $user->email,
            'password' => $tempPassword,
        ]);
    }

    /**
     * Toggle the active status of an admin account.
     */
    public function toggleActive($id)
    {
        if (session('admin_user.role') !== 'superadmin') {
            return response()->json(['error' => 'Akses terbatas untuk Superadmin saja.'], 403);
        }

        // Prevent self-lockout
        if ($id == session('admin_user.id')) {
            return response()->json(['error' => 'Anda tidak dapat menonaktifkan akun Anda sendiri.'], 400);
        }

        $user = User::findOrFail($id);
        $user->is_active = !$user->is_active;
        $user->save();

        $statusStr = $user->is_active ? 'diaktifkan' : 'dinonaktifkan';

        // Log status update
        \App\Models\AuditLog::log('Updated Admin', 'Admin Management', "Account: {$user->email} toggled to " . ($user->is_active ? 'Active' : 'Disabled'));

        return response()->json([
            'success' => true,
            'message' => "Akun admin {$user->email} berhasil {$statusStr}!",
            'is_active' => $user->is_active,
        ]);
    }

    /**
     * Reset password for an admin account and generate a new password.
     */
    public function resetPassword($id)
    {
        if (session('admin_user.role') !== 'superadmin') {
            return response()->json(['error' => 'Akses terbatas untuk Superadmin saja.'], 403);
        }

        $user = User::findOrFail($id);

        // Generate a new secure random password
        $newPassword = Str::random(12);

        $user->password = Hash::make($newPassword);
        $user->save();

        // Log password reset
        \App\Models\AuditLog::log('Reset Password', 'Admin Management', "Password reset for account: {$user->email}");

        return response()->json([
            'success' => true,
            'message' => "Password untuk akun {$user->email} berhasil direset!",
            'password' => $newPassword,
        ]);
    }
}
