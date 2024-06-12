<?php

namespace Database\Seeders;

use App\Models\Sector;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SectorsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = \Faker\Factory::create();
        for ($i = 0; $i < 5; $i++) {
            Sector::create([
                'name' => $faker->unique()->randomElement(["Строительные материалы", "Инструменты", "Продукты", "Товары для дома", "Електроприборы"])
            ]);
        }
    }
}
