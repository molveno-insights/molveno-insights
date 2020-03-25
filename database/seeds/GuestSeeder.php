<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GuestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('guest')->insert([
            'roomnumber' => 12,
            'name' => 'Gijs',
            'surname' => 'Machielsen',
            'email' => 'g.machielsen@gmail.com',
            'phonenumber' => '06-11864118',
        ]);

    }
}
