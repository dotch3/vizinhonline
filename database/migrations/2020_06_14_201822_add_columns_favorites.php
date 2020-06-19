<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnsFavorites extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        if (!Schema::hasColumn('favorites', 'created_at')) {
            Schema::table('favorites', function (Blueprint $table) {
                $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));

            });
        }
        if (!Schema::hasColumn('favorites', 'updated_at')) {
            Schema::table('favorites', function (Blueprint $table) {
                $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP'));
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public
    function down()
    {
        //
        if (Schema::hasColumn('users', 'telefone')) {
            Schema::table('users', function (Blueprint $table) {
                $table->dropColumn('telefone');
            });
        }
    }
}
