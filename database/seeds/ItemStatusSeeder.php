<?php

use Illuminate\Database\Seeder;

class ItemStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('item_status')->insert([
            'name' => 'disponivel',
            'description' => 'Item disponivel para emprestimo',
            'code' => 'DISPONIVEL',
            'created_at' => now(),
            'updated_at' => now()

        ]);

        DB::table('item_status')->insert([
            'name' => 'emprestado',
            'description' => 'Item emprestado',
            'code' => 'EMPRESTADO',
            'created_at' => now(),
            'updated_at' => now()

        ]);

        DB::table('item_status')->insert([
            'name' => 'indisponivel',
            'description' => 'Item não esta disponivel para emprestimo',
            'code' => 'INDISPONIVEL',
            'created_at' => now(),
            'updated_at' => now()

        ]);
        DB::table('item_status')->insert([
            'name' => 'negociacao',
            'description' => 'Item encontra-se em processo de negociacao',
            'code' => 'NEGOCIACAO',
            'created_at' => now(),
            'updated_at' => now()

        ]);
    }
}
