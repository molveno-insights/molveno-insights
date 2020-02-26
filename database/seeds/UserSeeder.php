<?php

use Illuminate\Database\Seeder;
use App\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (
            !getenv('MOLVENO_ADMIN_USER') ||
            !getenv('MOLVENO_ADMIN_EMAIL') ||
            !getenv('MOLVENO_ADMIN_PASSWORD')
        ) {
            throw new Exception("Admin variables not provided");
        } else {
        }

        $adminUser = new User();

        $adminUser->name = getenv('MOLVENO_ADMIN_USER');
        $adminUser->email = getenv('MOLVENO_ADMIN_EMAIL');
        $adminUser->password = Hash::make(getenv('MOLVENO_ADMIN_PASSWORD'));

        $adminUser->save();
    }
}
