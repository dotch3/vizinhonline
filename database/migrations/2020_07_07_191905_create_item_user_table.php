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
            $table->integer('items_id')->unsigned();
            $table->integer('users_id')->unsigned();
            $table->foreign('items_id')->references('id')->on('items')
                ->onDelete('cascade');
            $table->foreign('users_id')->references('id')->on('users')
                ->onDelete('cascade');
            $table->integer('lenditem_id'); //TODO: relacionar com lend_item
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
