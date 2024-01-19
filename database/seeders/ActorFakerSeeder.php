<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class ActorFakerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        foreach (range(1, 10) as $index) {
            DB::table('actors')->insert([
                'name'      => $faker->firstName,
                'surname'   => $faker->lastName,
                'birthdate' => $faker->date,
                'country'   => $faker->country,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
