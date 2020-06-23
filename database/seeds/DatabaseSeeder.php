<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //Let's create the administrator
        DB::table('users')->insert([
            'name' => 'AdministratorName',
            'lastname' => 'AdministratorLastName',
            'email' => 'admin@vizinhonline.com',
            'password' => bcrypt('rootadmin'),
        ]);
        $this->call(UserSeeder::class);
        $this->call(FavoritesSeeder::class);

    }
}
