<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateImageItemTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('image_item', function (Blueprint $table) {
            $table->integer('items_id')->unsigned();
            $table->integer('images_id')->unsigned();
            $table->foreign('items_id')->references('id')->on('items')
                ->onDelete('cascade');
            $table->foreign('images_id')->references('id')->on('images')
                ->onDelete('cascade');
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
        Schema::dropIfExists('image_item');
    }
}
