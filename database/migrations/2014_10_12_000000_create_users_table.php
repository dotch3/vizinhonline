<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable('users')) {
            Schema::dropIfExists('users');
        }


        Schema::create('users', function (Blueprint $table) {
            $table->BigIncrements('id');
            $table->string('name');
            $table->string('lastname');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('cellphone')->nullable();
            $table->string('rg')->nullable();
            $table->string('cpf')->nullable();
            $table->integer('age')->nullable();
            $table->decimal('ranking',5,2)->nullable();
            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes();
        });
//        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
