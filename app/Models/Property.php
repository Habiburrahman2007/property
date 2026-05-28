<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Model: Property
 *
 * Represents a premium real estate listing.
 * Supports soft-delete scoping via `deleted_at`.
 */
class Property extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'nama_property',
        'group_name',
        'lebar',
        'panjang',
        'hadap',
        'tipe',
        'tingkat',
        'price',
        'carport',
        'status',
        'siap',
        'maps_link',
        'kawasan',
        'unit',
        'image',
        'created_by',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'lebar' => 'decimal:2',
        'panjang' => 'decimal:2',
        'tingkat' => 'decimal:1',
        'price' => 'integer',
        'carport' => 'boolean',
        'kawasan' => 'array',
        'deleted_at' => 'datetime',
    ];

    /**
     * Relationship: The admin who created this property listing.
     */
    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
}
