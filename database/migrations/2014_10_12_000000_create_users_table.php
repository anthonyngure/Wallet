<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');
            $table->string('name');
	        $table->string('email')->nullable()->unique();
	        $table->string('email_verification_code')->nullable();
	        $table->string('avatar')->default('users/default.png');
	        $table->unsignedTinyInteger('email_verified', false)->default(0);
	        $table->string('phone')->unique();
	        $table->string('phone_verification_code')->nullable();
	        $table->unsignedTinyInteger('phone_verified', false)->default(0);
	        $table->string('password')->nullable();
	        $table->string('password_recovery_code')->nullable();
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
