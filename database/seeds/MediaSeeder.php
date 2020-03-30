<?php
require 'vendor/autoload.php';
use Illuminate\Database\Seeder;
use App\Category;
use Carbon\Carbon;

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
            'name' => 'Lago di Molveno, Italy',
            'category_id' => 12,
            'added_by' => 'Andries',
            'url' => 'KmQnNWNlIac',
            'forchildren' => 0,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('media')->insert([
            'name' => 'Big Hero - Molveno Bike Park',
            'category_id' => 9,
            'added_by' => 'Gijs',
            'url' => 'JQIQyso-cWY',
            'forchildren' => 0,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('media')->insert([
            'name' => 'TRENTINO, ITALY Travel VLOG #1: Hiking in Paganella Dolomites, Lunch in Mountain Hut, Molveno Lake',
            'category_id' => 10,
            'added_by' => 'Gijs',
            'url' => 'uUN2q7iC2VU',
            'forchildren' => 0,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('media')->insert([
            'name' => 'Juf Roos • Alle Afleveringen • 2 Uur Special',
            'category_id' => 8,
            'added_by' => 'Gijs',
            'url' => 'NaMBUcQQ4js',
            'forchildren' => 1,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('media')->insert([
            'name' => 'The Princess and the Goblin Full Length Movie',
            'category_id' => 7,
            'added_by' => 'Gijs',
            'url' => '9kS6fSczcZs',
            'forchildren' => 1,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('media')->insert([
            'name' => 'MOLVENO ....sera e mattina * trentino italy *',
            'category_id' => 11,
            'added_by' => 'Andries',
            'url' => '9loRi9rPLvA',
            'forchildren' => 0,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('media')->insert([
            'name' => 'MOLVENO ...relax al lago ** trentino italy **',
            'category_id' => 12,
            'added_by' => 'Gijs',
            'url' => 'DvwmK6gDNyA',
            'forchildren' => 0,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('media')->insert([
            'name' => 'Trapito de Vogelverschrikker',
            'category_id' => 7,
            'added_by' => 'Andries',
            'url' => 'mdlzOxb1pK4',
            'forchildren' => 1,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('media')->insert([
            'name' => 'Teddy Ruxpin aflevering 1',
            'category_id' => 8,
            'added_by' => 'Andries',
            'url' => 'J4JC-cRWd9w',
            'forchildren' => 1,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('media')->insert([
            'name' => 'Teddy Ruxpin aflevering 2',
            'category_id' => 8,
            'added_by' => 'Andries',
            'url' => 'l98lcYEMmKc',
            'forchildren' => 1,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('media')->insert([
            'name' => 'Lago di Molveno, Italy',
            'category_id' => 12,
            'added_by' => 'Andries',
            'url' => 'wb11oLIn8Xc',
            'forchildren' => 0,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('media')->insert([
            'name' => 'MOLVENO & PAGANELLA BIKE PARK',
            'category_id' => 9,
            'added_by' => 'Andries',
            'url' => 'eSDAxRp0CGo',
            'forchildren' => 0,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('media')->insert([
            'name' => 'Molveno MTB Trails',
            'category_id' => 9,
            'added_by' => 'Andries',
            'url' => 'DuDoSu8Gudg',
            'forchildren' => 0,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('media')->insert([
            'name' => 'Molveno = Topo-Aktief',
            'category_id' => 9,
            'added_by' => 'Andries',
            'url' => 'Grr1Q3tAYz0',
            'forchildren' => 0,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
    }
}
