<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Product::factory()->count(20)->create([
            'img' => fake()->imageUrl('100', '30'),
            'price'=> fake()->numberBetween(100,1000),
        ]);
    }
}
