<?php

use Illuminate\Database\Seeder;
use App\Favorite;

class FavoritesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Favorite::truncate();
        for ($i=0;$i<=5;$i++){
            factory(Favorite::class)->create();
        }
    }
}
