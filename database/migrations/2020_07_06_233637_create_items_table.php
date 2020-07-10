<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('items', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('code')->nullable();
            $table->text('description');
            $table->float('tax_fee')->nullable();
            $table->string('internal_notes')->nullable();
            $table->integer('feedback_store')->nullable();
            $table->integer('units')->nullable();
            $table->date('loan_start_date');
            $table->date('loan_end_date');
            $table->float('replacement_cost')->nullable();
            $table->integer('itemstatus_id')->nullable(); //TODO: configurar relacionamento com item_status
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
        Schema::dropIfExists('items');
    }
}