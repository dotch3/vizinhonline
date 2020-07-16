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
            $table->BigIncrements('id');
            $table->string('name');
            $table->string('code')->nullable();
            $table->text('description');
            $table->float('tax_fee')->nullable();
            $table->string('internal_notes')->nullable();
            $table->integer('feedback_score')->nullable();
            $table->integer('units')->nullable();
            $table->date('loan_start_date');
            $table->date('loan_end_date');
            $table->float('replacement_cost')->nullable();
            $table->foreignId('item_status_id')->nullable();
            $table->timestamps();

            $table->foreign('item_status_id')
                ->references('id')
                ->on('item_status');
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
