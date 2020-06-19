<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateColumnsCategories extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Schema::create('columns_categories', function (Blueprint $table) {
        //     $table->id();
        //     $table->timestamps();
        // });

        if (!Schema::hasColumn('categories', 'created_at')) {
            Schema::table('categories', function (Blueprint $table) {
                $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));

            });
        }
        if (!Schema::hasColumn('categories', 'updated_at')) {
            Schema::table('categories', function (Blueprint $table) {
                $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP'));
            });
        }

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Schema::dropIfExists('columns_categories');
    }
}
