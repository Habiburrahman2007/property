<?php

namespace App\Observers;

use App\Models\Property;
use App\Models\AuditLog;

/**
 * Observer: PropertyObserver
 *
 * Hooks into Eloquent lifecycle events of the Property model
 * to automatically log creation, modifications, and deletion in audit logs.
 */
class PropertyObserver
{
    /**
     * Handle the Property "created" event.
     */
    public function created(Property $property): void
    {
        AuditLog::log(
            'Created Property',
            'Properties',
            $property->nama_property,
            $property->id,
            null
        );
    }

    /**
     * Handle the Property "updated" event.
     */
    public function updated(Property $property): void
    {
        $dirty = $property->getDirty();
        $changes = [];

        // Track only relevant field modifications (skip standard Eloquent timestamps)
        foreach ($dirty as $key => $value) {
            if ($key !== 'updated_at' && $key !== 'created_at') {
                $changes[$key] = [
                    'old' => $property->getOriginal($key),
                    'new' => $value
                ];
            }
        }

        // If something meaningful changed, log the update
        if (!empty($changes)) {
            AuditLog::log(
                'Updated Property',
                'Properties',
                $property->nama_property,
                $property->id,
                $changes
            );
        }
    }

    /**
     * Handle the Property "deleted" event.
     */
    public function deleted(Property $property): void
    {
        AuditLog::log(
            'Deleted Listing',
            'Properties',
            $property->nama_property,
            $property->id,
            null
        );
    }
}
