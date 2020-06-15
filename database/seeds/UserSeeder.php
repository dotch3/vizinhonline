
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
        // utilizanbdo a seeder para preencher informacao
        User::truncate();
        for ($i =0;$i <= 10;$i++){
            factory(User::class)->create();
        }
    }
}
