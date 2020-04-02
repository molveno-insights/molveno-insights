<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Category;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserSeeder::class);
        $this->call(CategorySeeder::class);
        $this->call(MediaSeeder::class);
        //$this->call(GuestSeeder::class);
        $faker = Faker::create();
    	foreach (range(1,10) as $index) {
	        DB::table('guests')->insert([
                'roomnumber' => Category::all()->random()->id,
                'name' => $faker->firstName,
                'surname' => $faker->name,
                'email' => $faker->email,
                'phonenumber' => $faker->phoneNumber
	        ]);
	    }

    }
}
