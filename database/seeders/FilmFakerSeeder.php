<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class FilmFakerSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();

        for ($i = 0; $i <= 10; $i++) {
            DB::table('films')->insert([
                'name' => $faker->sentence($nbWords = 3),
                'year' => $faker->numberBetween($min = 1950, $max = 2023),
                'genre' => $faker->word,
                'country' => $faker->country,
                'duration' => $faker->numberBetween($min = 60, $max = 180),
                'img_url' => $faker->imageUrl($width = 640, $height = 480),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
