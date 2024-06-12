<?php

namespace Database\Seeders;

use App\Models\Cart;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CartsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = \Faker\Factory::create();
        for ($i = 0; $i < 10; $i++) {
            Cart::create([
               'user_id' => $faker->numberBetween(11, 20),
               'product_id' => $faker->numberBetween(1, 20),
                'quantity' => $faker->numberBetween(1, 30),
            ]);
        }
    }
}
