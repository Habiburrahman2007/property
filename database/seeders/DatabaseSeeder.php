<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Property;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;


class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Create Superadmin Account
        $superadmin = User::factory()->superadmin()->create([
            'email' => 'superadmin@primeproperty.com',
            'password' => Hash::make('password'),
        ]);

        // Create Active Admin Account
        $admin = User::factory()->create([
            'email' => 'admin@primeproperty.com',
            'password' => Hash::make('password'),
        ]);

        // Create Inactive Admin Account
        User::factory()->inactive()->create([
            'email' => 'inactive.admin@primeproperty.com',
            'password' => Hash::make('password'),
        ]);

        // Seed premium properties under admin user
        Property::create([
            'nama_property' => 'Villa Senopati A1',
            'group_name' => 'Luxury Res',
            'lebar' => 15.00,
            'panjang' => 30.00,
            'hadap' => 'Selatan',
            'tipe' => 'Villa',
            'tingkat' => 2.0,
            'price' => 45000000000,
            'carport' => true,
            'status' => 'in stock',
            'siap' => 'siap_huni',
            'kawasan' => ['Jakarta Selatan', 'Senopati'],
            'maps_link' => 'https://maps.google.com/?q=Senopati+Jakarta',
            'unit' => 'A1',
            'created_by' => $admin->id,
        ]);

        Property::create([
            'nama_property' => 'Menteng Heritage',
            'group_name' => 'Classic',
            'lebar' => 20.00,
            'panjang' => 40.00,
            'hadap' => 'Utara',
            'tipe' => 'Villa',
            'tingkat' => 3.0,
            'price' => 85500000000,
            'carport' => true,
            'status' => 'sold_out',
            'siap' => 'siap_huni',
            'kawasan' => ['Menteng', 'Jakarta Pusat'],
            'maps_link' => 'https://maps.google.com/?q=Menteng+Jakarta',
            'unit' => 'H12',
            'created_by' => $admin->id,
        ]);

        Property::create([
            'nama_property' => 'Kebayoran Plot 8',
            'group_name' => 'Land Dev',
            'lebar' => 12.00,
            'panjang' => 25.00,
            'hadap' => 'Timur',
            'tipe' => 'Ruko',
            'tingkat' => 1.0,
            'price' => 18000000000,
            'carport' => false,
            'status' => 'in stock',
            'siap' => 'siap_kosong',
            'kawasan' => ['Jakarta Selatan', 'Kebayoran Baru'],
            'maps_link' => 'https://maps.google.com/?q=Kebayoran+Baru+Jakarta',
            'unit' => 'Plot 8',
            'created_by' => $admin->id,
        ]);

        Property::create([
            'nama_property' => 'Pondok Indah B3',
            'group_name' => 'Modern',
            'lebar' => 10.00,
            'panjang' => 20.00,
            'hadap' => 'Barat',
            'tipe' => 'Ruko',
            'tingkat' => 2.0,
            'price' => 22500000000,
            'carport' => true,
            'status' => 'in stock',
            'siap' => 'siap_huni',
            'kawasan' => ['Jakarta Selatan', 'Pondok Indah'],
            'maps_link' => 'https://maps.google.com/?q=Pondok+Indah+Jakarta',
            'unit' => 'B3',
            'created_by' => $admin->id,
        ]);

        // ==========================================
        // Seed Audit Logs and Mock Design Users
        // ==========================================

        // Create design users
        $elena = User::factory()->create([
            'email' => 'elena@prime.com',
            'password' => Hash::make('password'),
        ]);

        $marcus = User::factory()->create([
            'email' => 'marcus@prime.com',
            'password' => Hash::make('password'),
        ]);

        $sarah = User::factory()->create([
            'email' => 'sarah@prime.com',
            'password' => Hash::make('password'),
        ]);

        // Get seeded Villa Senopati property
        $villa = Property::where('nama_property', 'Villa Senopati A1')->first();

        // Seed soft-deleted Penthouse property
        $penthouse = Property::create([
            'nama_property' => 'Penthouse B - The View',
            'group_name' => 'The View Group',
            'lebar' => 18.00,
            'panjang' => 35.00,
            'hadap' => 'Timur',
            'tipe' => 'Villa',
            'tingkat' => 3.0,
            'price' => 72000000000,
            'carport' => true,
            'status' => 'in stock',
            'siap' => 'siap_huni',
            'kawasan' => ['Jakarta Selatan', 'Kebayoran Baru'],
            'maps_link' => 'https://maps.google.com/?q=Kebayoran+Baru+Jakarta',
            'unit' => 'B',
            'created_by' => $sarah->id,
        ]);
        $penthouse->delete(); // Soft-delete it!

        // Seed logs matching the Stitch design
        \App\Models\AuditLog::create([
            'user_id' => $elena->id,
            'property_id' => $villa->id,
            'action' => 'Created Property',
            'module' => 'Properties',
            'target' => $villa->nama_property,
            'ip_address' => '192.168.1.105',
            'created_at' => \Carbon\Carbon::create(2026, 5, 24, 14, 30, 0),
        ]);

        \App\Models\AuditLog::create([
            'user_id' => $marcus->id,
            'property_id' => null,
            'action' => 'Updated Admin',
            'module' => 'Admin Management',
            'target' => 'Role: Manager',
            'ip_address' => '10.0.0.42',
            'created_at' => \Carbon\Carbon::create(2026, 5, 24, 13, 15, 0),
        ]);

        \App\Models\AuditLog::create([
            'user_id' => $sarah->id,
            'property_id' => $penthouse->id,
            'action' => 'Deleted Listing',
            'module' => 'Properties',
            'target' => $penthouse->nama_property,
            'ip_address' => '172.16.254.1',
            'created_at' => \Carbon\Carbon::create(2026, 5, 24, 11, 45, 0),
        ]);

        \App\Models\AuditLog::create([
            'user_id' => $elena->id,
            'property_id' => null,
            'action' => 'System Login',
            'module' => 'Authentication',
            'target' => '-',
            'ip_address' => '192.168.1.105',
            'created_at' => \Carbon\Carbon::create(2026, 5, 24, 9, 0, 0),
        ]);

        \App\Models\AuditLog::create([
            'user_id' => $marcus->id,
            'property_id' => null,
            'action' => 'Modified Settings',
            'module' => 'Settings',
            'target' => 'Global Tax Rate',
            'ip_address' => '10.0.0.42',
            'created_at' => \Carbon\Carbon::create(2026, 5, 23, 16, 20, 0),
        ]);

        // Seed 50 dummy property listings
        $this->call(PropertySeeder::class);
    }
}
