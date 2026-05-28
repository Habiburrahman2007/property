<?php

namespace Database\Factories;

use App\Models\Property;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Property>
 */
class PropertyFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Property::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $tipe = fake()->randomElement(['Villa', 'Ruko']);
        
        $villaNames = [
            'Senopati', 'Heritage', 'Kencana', 'Dago Hills', 'Ubud Retreat', 'Nusa Dua', 
            'Menteng', 'Kemang', 'Sunset', 'Green Valley', 'Forest Hill', 'Spring Garden', 
            'Emerald', 'Sapphire', 'Vista', 'Horizon', 'Royal', 'Oasis', 'Sanctuary', 'Harmony'
        ];
        
        $rukoNames = [
            'Sudirman', 'Thamrin', 'Gading Serpong', 'Golden Boulevard', 'Central Park', 
            'Landmark', 'Business Point', 'Mega Plaza', 'Commercial Center', 'Junction', 
            'Square', 'Promenade', 'Hub', 'Boulevard'
        ];

        $villaSuffixes = ['Mansion', 'Heights', 'Residence', 'Vista', 'Grove', 'Park', 'Corner', 'Pavilion'];
        $rukoSuffixes = ['Center', 'Plaza', 'Point', 'Square', 'Blok A', 'Blok B', 'Hub'];

        if ($tipe === 'Villa') {
            $name = 'Villa ' . fake()->randomElement($villaNames) . ' ' . fake()->randomElement($villaSuffixes);
            $group = fake()->randomElement(['Luxury Res', 'Classic', 'Modern', 'The View Group', 'Green Emerald', 'Oasis Escape']);
            $lebar = fake()->randomFloat(2, 10.00, 30.00);
            $panjang = fake()->randomFloat(2, 15.00, 50.00);
            $tingkat = fake()->randomElement([1.0, 2.0, 3.0]);
            $price = fake()->numberBetween(15, 100) * 1000000000; // Rp 15M - 100M
            $carport = true;
            $siap = fake()->randomElement(['siap_huni', 'siap_huni_renovasi']);
        } else {
            $name = 'Ruko ' . fake()->randomElement($rukoNames) . ' ' . fake()->randomElement($rukoSuffixes);
            $group = fake()->randomElement(['Land Dev', 'Commercial Hub', 'Business Zone', 'Golden Center']);
            $lebar = fake()->randomFloat(2, 5.00, 12.00);
            $panjang = fake()->randomFloat(2, 10.00, 25.00);
            $tingkat = fake()->randomElement([2.0, 3.0, 4.0, 5.0]);
            $price = fake()->numberBetween(2, 35) * 1000000000; // Rp 2M - 35M
            $carport = fake()->boolean(70); // 70% chance of carport
            $siap = fake()->randomElement(['siap_kosong', 'siap_huni']);
        }

        // Random combination of directions (SET)
        $directions = ['Utara', 'Selatan', 'Timur', 'Barat'];
        $numDirections = fake()->randomElement([1, 1, 1, 2]); // mostly 1 direction, occasionally 2 (hook)
        $selectedDirections = fake()->randomElements($directions, $numDirections);
        $hadap = implode(',', $selectedDirections);

        // Kawasan tags based on cities and upscale sub-districts in Indonesia
        $kawasanOptions = [
            ['Jakarta Selatan', 'Senopati'],
            ['Jakarta Selatan', 'Kebayoran Baru'],
            ['Jakarta Selatan', 'Pondok Indah'],
            ['Jakarta Selatan', 'Kemang'],
            ['Jakarta Pusat', 'Menteng'],
            ['Tangerang', 'BSD City'],
            ['Tangerang', 'Gading Serpong'],
            ['Tangerang', 'Alam Sutera'],
            ['Bali', 'Seminyak'],
            ['Bali', 'Ubud'],
            ['Bali', 'Canggu'],
            ['Bandung', 'Dago'],
            ['Bandung', 'Setiabudi'],
            ['Surabaya', 'Dharmahusada'],
            ['Surabaya', 'Graha Famili']
        ];
        
        $kawasan = fake()->randomElement($kawasanOptions);
        
        // Random unit identifier
        $unit = fake()->randomElement(['A', 'B', 'C', 'D', 'Block AA', 'Block C', 'Ruko-']) . fake()->numberBetween(1, 40);

        return [
            'nama_property' => $name . ' ' . $unit,
            'group_name' => $group,
            'lebar' => $lebar,
            'panjang' => $panjang,
            'hadap' => $hadap,
            'tipe' => $tipe,
            'tingkat' => $tingkat,
            'price' => $price,
            'carport' => $carport,
            'status' => fake()->randomElement(['in stock', 'in stock', 'in stock', 'sold_out']), // 75% in stock
            'siap' => $siap,
            'maps_link' => 'https://maps.google.com/?q=' . urlencode($name . ' ' . $unit),
            'kawasan' => $kawasan,
            'unit' => $unit,
            'image' => null, // seeded image can be null or fallback to public/ruko_bisnis.png
            'created_by' => function () {
                return User::where('role', 'admin')->inRandomOrder()->first()?->id ?? User::factory()->create(['role' => 'admin'])->id;
            },
        ];
    }
}
