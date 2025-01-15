<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
use App\Models\tours;
class tourSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        for ($i = 1; $i <= 20; $i++) {
            tours::create([
                'name' => $faker->name,
                'destination_id' => rand(1,20),
                'start_date' => $faker->date(),
                'end_date' => $faker->date(),
                'price' => $faker->randomFloat(2, 1, 1000),
                'created_at' => $faker->dateTimeBetween('-1 years', 'now')->format('Y-m-d H:i:s'), // Tạo ngày giờ ngẫu nhiên
                'updated_at' => $faker->dateTimeBetween('-1 years', 'now')->format('Y-m-d H:i:s'),
            ]);
        }
    }
}
