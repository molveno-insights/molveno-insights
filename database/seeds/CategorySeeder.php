<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('category')->insert(
            [
                ["name" => "Sports"],
                ["name" => "Outside"],
                ["name" => "Beach"],
                ["name" => "Food"],
                ["name" => "Hiking"],
                ["name" => "Nightlife"],
                ["name" => "Movies"],
                ["name" => "Series"],
                ["name" => "Biking"],
                ["name" => "Vlogs"],
                ["name" => "Activities"],
                ["name" => "Sightings"]
            ]
        );
    }
}
