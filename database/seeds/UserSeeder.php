<?php

use Illuminate\Database\Seeder;
use App\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        //using the factory to fulfill test users
        //User::truncate(); //We dont want to delete the administrator created
        for ($i = 0; $i < 20; $i++) {
            factory(User::class)->create();
        }
    }
}
