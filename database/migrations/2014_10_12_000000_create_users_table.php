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
            $table->string('username')->unique()->index();
            $table->string('password');
            $table->string('first_name')->nullable(); 
            $table->string('middle_name')->nullable();
            $table->string('last_name')->nullable(); 
            $table->text('avatar')->nullable();
            $table->string('contact_number')->nullable();  
            $table->string('email')->nullable();
            $table->string('user_role_id')->nullable()->index();
            $table->integer('online')->default(0);
            $table->integer('status')->default(0);
            $table->integer('deleted')->default(0);
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
