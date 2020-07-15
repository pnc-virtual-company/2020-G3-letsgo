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
            $table->string('firstname');
            $table->string('lastname');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('picture')->default('user.jpg');
            $table->string('password');
            $table->integer('role')->default(0);
            $table->rememberToken();
            $table->timestamps();
        });
        DB::table('users')->insert(
            array(
                'firstname'=>'Admin',
                'lastname'=>'user',
                'email'=>'admin@example.com',
                'picture'=>'admin',
                'password'=>bcrypt('password'),
                'role'=> 1,
                'remember_token'=>Str::random(10)
        )
    );
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



