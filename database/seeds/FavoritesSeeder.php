<?php

use Illuminate\Database\Seeder;
use App\Favorite;
use Illuminate\Support\Facades\DB;

class FavoritesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('favorites')->insert([
           'name' =>'ITEM_FAVORITE',
            'description'=>'Item favorite',
            'code'=>'ITEM_FAV',
            'status'=>'active'

        ]);

        DB::table('favorites')->insert([
            'name' =>'POST_FAVORITE',
            'description'=>'Post favorite',
            'code'=>'POST_FAV',
            'status'=>'active'

        ]);

        DB::table('favorites')->insert([
            'name' =>'NEIGHBOR_FAVORITE',
            'description'=>'neighbor favorite',
            'code'=>'NEIGH_FAV',
            'status'=>'inactive'

        ]);
    }
}
