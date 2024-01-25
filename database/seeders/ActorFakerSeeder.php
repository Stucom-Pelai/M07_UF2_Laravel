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
                'nueva_columna' => $faker->word, // Change this line based on the data type of 'nueva_columna'
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
