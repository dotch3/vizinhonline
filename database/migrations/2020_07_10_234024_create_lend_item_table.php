<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLendItemTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lend_item', function (Blueprint $table) {
            $table->BigIncrements('id');

            $table->string('status')->default('active');
            $table->dateTime('lend_start_date');
            $table->dateTime('lend_end_date');

            $table->foreignId('item_user');


            $table->foreignId('user_id');

            $table->foreign('item_user')
                ->references('id')
                ->on('item_user')
                ->onDelete('cascade');

            $table->foreign('user_id')
                ->references('id')
                ->on('users')
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
        Schema::dropIfExists('lend_item');
    }
}
