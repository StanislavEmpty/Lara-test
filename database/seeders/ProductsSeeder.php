<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = \Faker\Factory::create();
        for ($i = 0; $i < 20; $i++) {
            Product::create([
                'name' => $faker->word,
                'price' => $faker->randomFloat($nbMaxDecimals = 2, $min = 0, $max = 100),
                'category_id' => $faker->numberBetween($min = 1, $max = 10),
                'make' => $faker->word,
                'model' => $faker->word,
                'country' => $faker->country,
                'description' => $faker->text,
            ]);
        }
    }
}
