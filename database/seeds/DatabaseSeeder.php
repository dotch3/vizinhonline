<?php

use App\User;
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
            'created_at' => now(),
            'updated_at' => now()
        ]);

        $admin = User::where('name', 'like', '%AdministratorName%')->first();

        DB::table('locations')->insert([
            'building' => 'Bloco A',
            'apartment_number' => '40',
            'address' => 'Rua Administrador',
            'intercom_branch' => '40010',
            'user_id' => $admin->id,
            'created_at' => now(),
            'updated_at' => now()

        ]);

        //Fernando
        DB::table('users')->insert([
            'rg' => '323.112.334.33-1',
            'name' => 'Fernando',
            'lastname' => 'Souza',
            'email' => 'fernando@vizinhonline.com',
            'password' => bcrypt('fernando'),
            'cellphone' => '911232245',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        $fernando = User::where('name', 'like', '%Fernando%')->first();

        //Locations
        DB::table('locations')->insert([
            'building' => 'Bloco B',
            'apartment_number' => '250',
            'address' => 'Rua Central',
            'intercom_branch' => '2500',
            'user_id' => $fernando->id,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        // Image
        DB::table('images')->insert([
            'name' => 'fernando',
            'slug' => 'fernando.png',
            'format_image' => 'png',
            'user_id' => $fernando->id,
            'created_at' => now(),
            'updated_at' => now()

        ]);

        //Mauricio
        DB::table('users')->insert([
            'rg' => '201.433.011.33-1',
            'name' => 'Marcelo',
            'lastname' => 'Silva',
            'email' => 'marcelo@vizinhonline.com',
            'password' => bcrypt('marcelo'),
            'cellphone' => '151123225',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        $marcelo = User::where('name', 'like', '%Marcelo%')->first();

        //Locations
        DB::table('locations')->insert([
            'building' => 'Bloco B',
            'apartment_number' => '250',
            'address' => 'Rua Central',
            'intercom_branch' => '2500',
            'user_id' => $marcelo->id,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        // Image
        DB::table('images')->insert([
            'name' => 'marcelo',
            'slug' => 'marcelo.png',
            'format_image' => 'png',
            'user_id' => $marcelo->id,
            'created_at' => now(),
            'updated_at' => now()

        ]);

        // Lucia
        DB::table('users')->insert([
            'rg' => '203.774.334.33-3',
            'name' => 'Lucia',
            'lastname' => 'Millanes',
            'email' => 'lucia@vizinhonline.com',
            'password' => bcrypt('lucia'),
            'cellphone' => '922232650',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        $lucia = User::where('name', 'like', '%Lucia%')->first();
        DB::table('locations')->insert([
            'building' => 'Bloco A',
            'apartment_number' => '22',
            'address' => 'Rua Principal',
            'intercom_branch' => '220',
            'user_id' => $lucia->id,
            'created_at' => now(),
            'updated_at' => now()

        ]);


        DB::table('images')->insert([
            'name' => 'lucia',
            'slug' => 'lucia.png',
            'format_image' => 'png',
            'user_id' => $lucia->id,
            'created_at' => now(),
            'updated_at' => now()

        ]);


        $this->call(UserSeeder::class);
        $this->call(FavoritesSeeder::class);

        $this->call(PostSeeder::class);
        $this->call(ItemSeeder::class);

    }
}
