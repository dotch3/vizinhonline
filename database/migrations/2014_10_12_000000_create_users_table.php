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
        Schema::dropIfExists('users');
        if (!Schema::hasTable('users')) { // this will avoid overwrite the table created by the .sql file
            Schema::create('users', function (Blueprint $table) {
                $table->id();
                $table->string('name');
                $table->string('last_name')->nullable();
                $table->string('rg')->nullable();
                $table->string('cpf')->nullable();
                $table->string('cellphone')->nullable();
                $table->string('age')->nullable();
                $table->string('address')->nullable();
                $table->string('building')->nullable();
                $table->string('apartment_number')->nullable();
                $table->string('intercom_branch')->nullable();
                $table->string('email')->unique();
                $table->timestamp('email_verified_at')->nullable();
                $table->string('password');
                $table->rememberToken();
                $table->timestamps();
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
        Schema::dropIfExists('users');
    }
}
