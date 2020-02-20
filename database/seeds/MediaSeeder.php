<?php

use Illuminate\Database\Seeder;

class MediaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('media')->insert([
            'name' => 'MOLVENO ...relax al lago ** trentino italy **',
            'category' => 'fun',
            'added_by' => 'Gijs',
            'url' => 'DvwmK6gDNyA',
            'forchildren' => 1,
        ]);

        DB::table('media')->insert([
            'name' => 'Big Hero - Molveno Bike Park',
            'category' => 'fun',
            'added_by' => 'Gijs',
            'url' => 'JQIQyso-cWY',
            'forchildren' => 1,
        ]);

        DB::table('media')->insert([
            'name' => 'TRENTINO, ITALY Travel VLOG #1: Hiking in Paganella Dolomites, Lunch in Mountain Hut, Molveno Lake',
            'category' => 'fun',
            'added_by' => 'Gijs',
            'url' => 'uUN2q7iC2VU',
            'forchildren' => 1,
        ]);

        DB::table('media')->insert([
            'name' => 'Juf Roos • Alle Afleveringen • 2 Uur Special',
            'category' => 'fun',
            'added_by' => 'Gijs',
            'url' => 'NaMBUcQQ4js',
            'forchildren' => 1,
        ]);

        DB::table('media')->insert([
            'name' => 'The Princess and the Goblin Full Length Movie',
            'category' => 'fun',
            'added_by' => 'Gijs',
            'url' => '9kS6fSczcZs',
            'forchildren' => 1,
        ]);

        DB::table('media')->insert([
            'name' => 'MOLVENO ...relax al lago ** trentino italy **',
            'category' => 'fun',
            'added_by' => 'Gijs',
            'url' => 'DvwmK6gDNyA',
            'forchildren' => 1,
        ]);

        DB::table('media')->insert([
            'name' => 'MOLVENO ...relax al lago ** trentino italy **',
            'category' => 'fun',
            'added_by' => 'Gijs',
            'url' => 'DvwmK6gDNyA',
            'forchildren' => 1,
        ]);
    }
}
