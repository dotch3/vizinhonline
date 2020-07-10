<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable('images')) {
            Schema::dropIfExists('images');
        }
        Schema::create('images', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->nullable()->unsigned();
            $table->integer('post_id')->nullable()->unsigned();
            $table->string('name')->nullable();
            $table->string('path_location')->nullable();
            $table->string('format_image')->nullable();
            $table->double('size_image',15,4)->nullable();
            $table->string('slug')->nullable();

            $table->timestamps();

            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');

            $table->foreign('post_id')
                ->references('id')
                ->on('posts')
                ->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('images');
    }
}
