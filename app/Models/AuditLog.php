<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Model: AuditLog
 *
 * Represents an immutable, append-only system activity log entry.
 */
class AuditLog extends Model
{
    // Disables default Laravel timestamps (since we only use append-only created_at)
    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'property_id',
        'action',
        'module',
        'target',
        'changes_payload',
        'ip_address',
        'created_at',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'changes_payload' => 'array',
        'created_at' => 'datetime',
    ];

    /**
     * Relationship: The administrator who performed the logged action.
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * Relationship: The property affected by the logged action.
     * Includes trashed models in case the property was soft-deleted.
     */
    public function property()
    {
        return $this->belongsTo(Property::class, 'property_id')->withTrashed();
    }

    /**
     * Helper: Writes a secure log entry to the audit logs table.
     * Automatically captures the actor ID from the active admin session and request IP.
     */
    public static function log($action, $module, $target = null, $propertyId = null, $changesPayload = null)
    {
        if (session()->has('admin_user.id')) {
            return self::create([
                'user_id' => session('admin_user.id'),
                'property_id' => $propertyId,
                'action' => $action,
                'module' => $module,
                'target' => $target,
                'changes_payload' => $changesPayload,
                'ip_address' => request()->ip(),
            ]);
        }
        
        return null;
    }
}
