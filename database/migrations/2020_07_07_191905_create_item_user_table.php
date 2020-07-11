<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItemUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('item_user', function (Blueprint $table) {
            $table->BigIncrements('id');
            $table->foreignId('item_id')->unsigned();
            $table->foreignId('user_id')->unsigned();

            $table->foreign('item_id')->references('id')->on('items')
                ->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')
                ->onDelete('cascade');

//            $table->foreignId('lend_item_id')->nullable(); //TODO: relacionar com lend_item, chave do item_user vai para o lend_item
////            $table->foreign('lend_item_id')->references('id')->on('lend_item');


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('item_user');
    }
}
