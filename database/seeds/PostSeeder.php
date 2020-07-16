<?php

use App\Post;
use Illuminate\Database\Seeder;

/**
 * Class PostSeeder
 */
class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 0; $i < 4; $i++) {
            factory(Post::class)->create();
        }
    }
}
