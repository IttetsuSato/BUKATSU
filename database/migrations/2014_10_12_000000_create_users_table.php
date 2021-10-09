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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name', 32);
            $table->string('katakana', 32)->nullable();
            $table->string('attribute',32);
            $table->string('image')->nullable();
            $table->string('profile',500)->nullable();
            $table->date('birthday')->nullable();
            $table->string('sex')->nullable();
            $table->string('postal_code', 16)->nullable();
            $table->string('address', 32)->nullable();
            // $table->string('city')->nullable();
            $table->bigInteger('city_id')->nullable();
            $table->string('career',3)->nullable();
            $table->string('transportation', 32)->nullable();
            $table->string('phone', 16)->nullable();
            $table->string('final_education')->nullable();
            $table->string('graduated_from', 64)->nullable();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
