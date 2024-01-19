<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class FilmActorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        // Seed film_actor relationship
        $films = DB::table('films')->pluck('id')->toArray();
        $actors = DB::table('actors')->pluck('id')->toArray();

        foreach ($films as $film) {
            $numberOfActors = $faker->numberBetween(1, 3);
            $selectedActors = $faker->randomElements($actors, $numberOfActors);

            foreach ($selectedActors as $actor) {
                DB::table('films_actors')->insert([
                    'film_id'   => $film,
                    'actor_id'  => $actor,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }
    }
}
