<?php

use App\Images;
use App\Post;
use App\User;
use Illuminate\Database\Seeder;

use Faker\Generator as Faker;


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
            'age'=>45,
            'email' => 'fernando@vizinhonline.com',
            'password' => bcrypt('fernando'),
            'cellphone' => '911232245',
            'cpf' => '201.958.864-22',
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
            'age'=>31,
            'email' => 'marcelo@vizinhonline.com',
            'password' => bcrypt('marcelo'),
            'cellphone' => '151123225',
            'cpf' => '321.221.12-44',
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
            'age'=>23,
            'password' => bcrypt('lucia'),
            'cellphone' => '922232650',
            'cpf' => '110.221.12-77',
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


        // Creating posts for demo:


        DB::table('posts')->insert([
            'title' => "Post_demo_guitarra",
            'comment' => "Procurando aulas de guitarra?, me contacte!",
            'user_id' => $fernando->id,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('posts')->insert([
            'title' => "Post_demo_bateria",
            'comment' => "Conserto baterias!",
            'user_id' => $fernando->id,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('posts')->insert([
            'title' => "Post_demo_impressora",
            'comment' => "Alguem tem uma  impressora para me emprestar?",
            'user_id' => $marcelo->id,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('posts')->insert([
            'title' => "Post_demo_ferramentas.",
            'comment' => "Ferramentas??, eu tenho!!",
            'user_id' => $marcelo->id,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('posts')->insert([
            'title' => "Post_demo_mala",
            'comment' => "Empresto essa linda bolsa linda, otima para viajar!",
            'user_id' => $lucia->id,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        //Images for posts
        $postFerramenta = Post::where('title', 'like', '%ferramentas%')->first();
        DB::table('images')->insert([
            'name' => 'ferramentas',
            'slug' => 'ferramentas.png',
            'format_image' => 'png',
            'post_id' => $postFerramenta->id,
            'created_at' => now(),
            'updated_at' => now()

        ]);
        $postMala = Post::where('title', 'like', '%mala%')->first();
        DB::table('images')->insert([
            'name' => 'mala',
            'slug' => 'mala.png',
            'format_image' => 'png',
            'post_id' => $postMala->id,
            'created_at' => now(),
            'updated_at' => now()

        ]);

        $postGuitarra = Post::where('title', 'like', '%guitarra%')->first();
        DB::table('images')->insert([
            'name' => 'guitar',
            'slug' => 'guitar.jpeg',
            'format_image' => 'jpeg',
            'post_id' => $postGuitarra->id,
            'created_at' => now(),
            'updated_at' => now()

        ]);

        $postImpressora = Post::where('title', 'like', '%impressora%')->first();
        DB::table('images')->insert([
            'name' => 'impressora',
            'slug' => 'impressora.jpg',
            'format_image' => 'jpg',
            'post_id' => $postImpressora->id,
            'created_at' => now(),
            'updated_at' => now()

        ]);

        $postBateria = Post::where('title', 'like', '%bateria%')->first();
        DB::table('images')->insert([
            'name' => 'bateria',
            'slug' => 'bateria.png',
            'format_image' => 'png',
            'post_id' => $postBateria->id,
            'created_at' => now(),
            'updated_at' => now()

        ]);

        $this->call(UserSeeder::class);
        $this->call(FavoritesSeeder::class);

//        $this->call(PostSeeder::class);

//        $this->Call(ItemStatusSeeder::class);
//        $this->call(ItemSeeder::class);

    }
}
