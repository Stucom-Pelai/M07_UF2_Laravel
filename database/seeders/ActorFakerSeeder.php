<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class ActorFakerSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();

        foreach (range(1, 10) as $index) {
            DB::table('actors')->insert([
                'name' => $faker->firstName,
                'surname' => $faker->lastName,
                'birthdate' => $faker->date,
                'country' => $faker->country,
                'img_url' => $faker->imageUrl(),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
