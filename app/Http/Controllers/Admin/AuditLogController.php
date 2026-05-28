<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AuditLog;
use Illuminate\Http\Request;

/**
 * Controller: AuditLogController
 *
 * Manages the Audit Logs system trail, query filtering, and role authorization.
 */
class AuditLogController extends Controller
{
    /**
     * Display a paginated, filterable listing of system activity logs.
     * When ?_json=1 is appended, returns a JSON payload for realtime AJAX filtering.
     */
    public function index(Request $request)
    {
        // Strict Authorization check (accessible only to Superadmins)
        if (session('admin_user.role') !== 'superadmin') {
            abort(403, 'Akses ditolak. Halaman ini hanya tersedia untuk Superadmin.');
        }

        $query = AuditLog::with(['user', 'property']);

        // 1. Text Search (Keyword, User Email, or IP Address)
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('target', 'like', "%{$search}%")
                  ->orWhere('ip_address', 'like', "%{$search}%")
                  ->orWhere('action', 'like', "%{$search}%")
                  ->orWhereHas('user', function ($uq) use ($search) {
                      $uq->where('email', 'like', "%{$search}%")
                         ->orWhere('name', 'like', "%{$search}%");
                  });
            });
        }

        // 2. Filter: Module
        if ($request->filled('module') && $request->module !== 'All Modules') {
            $query->where('module', $request->module);
        }

        // 3. Filter: Action Type
        if ($request->filled('action_type') && $request->action_type !== 'All Actions') {
            $actionType = $request->action_type;
            if ($actionType === 'Create') {
                $query->where('action', 'like', '%create%');
            } elseif ($actionType === 'Update') {
                $query->where('action', 'like', '%update%');
            } elseif ($actionType === 'Delete') {
                $query->where('action', 'like', '%delete%');
            } elseif ($actionType === 'Login/Logout') {
                $query->whereIn('action', ['System Login', 'System Logout']);
            }
        }

        // 4. Filter: Date
        if ($request->filled('date')) {
            $query->whereDate('created_at', $request->date);
        }

        // Paginate logs (10 rows, matching the design specifications)
        $logs = $query->latest('id')->paginate(10)->withQueryString();

        // ── JSON response for realtime AJAX debounced filter ──────────────
        if ($request->has('_json')) {
            $items = $logs->map(function ($log) {
                $email = optional($log->user)->email ?? 'sistem@prime.com';
                $name  = optional($log->user)->name  ?? explode('@', $email)[0];

                $months = [
                    1 => 'Januari', 2 => 'Februari', 3 => 'Maret', 4 => 'April', 5 => 'Mei', 6 => 'Juni',
                    7 => 'Juli', 8 => 'Agustus', 9 => 'September', 10 => 'Oktober', 11 => 'November', 12 => 'Desember'
                ];
                $dt = $log->created_at ? $log->created_at->setTimezone('Asia/Jakarta') : null;
                $formattedDate = $dt 
                    ? $dt->format('d') . ' ' . $months[$dt->format('n')] . ' ' . $dt->format('Y') . ' | ' . $dt->format('H:i') . ' WIB'
                    : '-';

                return [
                    'id'                   => $log->id,
                    'user_email'           => $email,
                    'user_name'            => $name,
                    'action'               => $log->action,
                    'module'               => $log->module,
                    'target'               => $log->target,
                    'created_at_formatted' => $formattedDate,
                ];
            });

            return response()->json([
                'logs'  => $items,
                'total' => $logs->total(),
                'from'  => $logs->firstItem() ?? 0,
                'to'    => $logs->lastItem()  ?? 0,
            ]);
        }

        return view('admin.logs', compact('logs'));
    }
}
