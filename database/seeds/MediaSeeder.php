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
            'name' => 'MOLVENO ...relax al lago ** trentino italy **',
            'category_id' => Category::all()->random()->id,
            'added_by' => 'Gijs',
            'url' => 'DvwmK6gDNyA',
            'forchildren' => 0,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('media')->insert([
            'name' => 'Big Hero - Molveno Bike Park',
            'category_id' => Category::all()->random()->id,
            'added_by' => 'Gijs',
            'url' => 'JQIQyso-cWY',
            'forchildren' => 0,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('media')->insert([
            'name' => 'TRENTINO, ITALY Travel VLOG #1: Hiking in Paganella Dolomites, Lunch in Mountain Hut, Molveno Lake',
            'category_id' => Category::all()->random()->id,
            'added_by' => 'Gijs',
            'url' => 'uUN2q7iC2VU',
            'forchildren' => 0,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('media')->insert([
            'name' => 'Juf Roos • Alle Afleveringen • 2 Uur Special',
            'category_id' => Category::all()->random()->id,
            'added_by' => 'Gijs',
            'url' => 'NaMBUcQQ4js',
            'forchildren' => 1,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('media')->insert([
            'name' => 'The Princess and the Goblin Full Length Movie',
            'category_id' => Category::all()->random()->id,
            'added_by' => 'Gijs',
            'url' => '9kS6fSczcZs',
            'forchildren' => 1,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('media')->insert([
            'name' => 'MOLVENO ...relax al lago ** trentino italy **',
            'category_id' => Category::all()->random()->id,
            'added_by' => 'Gijs',
            'url' => 'DvwmK6gDNyA',
            'forchildren' => 0,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('media')->insert([
            'name' => 'MOLVENO ...relax al lago ** trentino italy **',
            'category_id' => Category::all()->random()->id,
            'added_by' => 'Gijs',
            'url' => 'DvwmK6gDNyA',
            'forchildren' => 0,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
    }
}
