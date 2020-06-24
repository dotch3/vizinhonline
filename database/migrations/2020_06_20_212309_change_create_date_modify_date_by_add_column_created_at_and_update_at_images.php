<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeCreateDateModifyDateByAddColumnCreatedAtAndUpdateAtImages extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasColumn('images', 'create_date')) {
            Schema::table('images', function (Blueprint $table) {
                $table->renameColumn('create_date', 'created_at');
//                $table->timestamps('created_at')->change();
            });
        }

        if (Schema::hasColumn('images', 'modify_date')) {
            Schema::table('images', function (Blueprint $table) {
                $table->renameColumn('modify_date', 'updated_at');
//                $table->timestamps('updated_at')->change();
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
        if (!Schema::hasColumn('images', 'created_at')) {
            Schema::table('images', function (Blueprint $table) {
                $table->renameColumn('created_at', 'create_date');
//                $table->timestamps('create_date')->change();
            });
        }

        if (!Schema::hasColumn('images', 'modify_date')) {
            Schema::table('images', function (Blueprint $table) {
                $table->renameColumn('updated_at', 'modify_date');
//                $table->timestamps('modify_date')->change();
            });
        }
    }
}
