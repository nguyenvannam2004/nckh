<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
use App\Models\destinations;

class destinationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        for ($i = 1; $i <= 20; $i++) {
            destinations::create([
                'name' => $faker->name,
                'city' => $faker->randomElement(['jaktok', 'univenci', 'kratopcy']),
                'country' => $faker->randomElement(['france', 'china', 'Japan']),
                'description' => $faker->text(100),
                'created_at' => $faker->dateTimeBetween('-1 years', 'now')->format('Y-m-d H:i:s'), // Tạo ngày giờ ngẫu nhiên
                'updated_at' => $faker->dateTimeBetween('-1 years', 'now')->format('Y-m-d H:i:s'),
            ]);
        }
    }
}
