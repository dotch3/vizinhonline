<?php

use App\Item;
use Illuminate\Database\Seeder;

/**
 * Class ItemSeeder
 */
class ItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
//        Items::truncate();
        for ($i = 0; $i < 6; $i++) {
            factory(Item::class)->create();
        }
    }
}
