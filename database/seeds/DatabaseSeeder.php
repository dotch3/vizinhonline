<?php

use App\User;
use App\Locations;
use App\Images;
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
            'rg' => '000000',
            'name' => 'AdministratorName',
            'lastname' => 'AdministratorLastName',
            'email' => 'admin@vizinhonline.com',
            'password' => bcrypt('rootadmin'),
            'cellphone' => '900000000',
        ]);


        DB::table('users')->insert([
            'rg' => '323.112.334.33-1',
            'name' => 'Fernando',
            'lastname' => 'Souza',
            'email' => 'fernando@vizinhonline.com',
            'password' => bcrypt('fernando'),
            'cellphone' => '911232245',
        ]);


        DB::table('users')->insert([
            'rg' => '201.433.011.33-1',
            'name' => 'Marcelo',
            'lastname' => 'Silva',
            'email' => 'marcelo@vizinhonline.com',
            'password' => bcrypt('marcelo'),
            'cellphone' => '151123225',
        ]);

        DB::table('users')->insert([
            'rg' => '203.774.334.33-3',
            'name' => 'Lucia',
            'lastname' => 'Millanes',
            'email' => 'lucia@vizinhonline.com',
            'password' => bcrypt('lucia'),
            'cellphone' => '922232650',
        ]);

//        DB::table('locations')->insert([
//            'building' => 'Bloco B',
//            'apartment_number' => '250',
//            'address' => 'Rua Central',
//            'intercom_branch' => '2500',
//            'user_id' => User::Where('name', 'like', '%Fernando%'),
//        ]);
//
//        DB::table('locations')->insert([
//            'building' => 'Bloco A',
//            'apartment_number' => '40',
//            'address' => 'Rua Administrador',
//            'intercom_branch' => '40010',
//            'user_id' => User::Where('name', 'like', '%Marcelo%'),
//        ]);
//
//        DB::table('locations')->insert([
//            'building' => 'Bloco A',
//            'apartment_number' => '22',
//            'address' => 'Rua Principal',
//            'intercom_branch' => '220',
//            'user_id' => User::Where('name', 'like', '%Lucia%'),
//        ]);

//        DB::table('images')->insert([
//            'name' => 'fernando',
//            'slug' => 'fernando.png',
//            'format_image' => 'png',
//            'user_id' => User::Where('name', 'like', '%Marcelo%'),
//        ]);
//        DB::table('images')->insert([
//            'name' => 'marcelo',
//            'slug' => 'marcelo.png',
//            'format_image' => 'png',
//            'user_id' => User::Where('name', 'like', '%Marcelo%'),
//        ]);
//
//        DB::table('images')->insert([
//            'name' => 'lucia',
//            'slug' => 'lucia.png',
//            'format_image' => 'png',
//            'user_id' => User::Where('name', 'like', '%Lucia%'),
//        ]);


        $this->call(UserSeeder::class);
        $this->call(FavoritesSeeder::class);

    }
}
