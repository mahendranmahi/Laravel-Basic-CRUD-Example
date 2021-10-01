<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->increments('profileid');
            $table->string('name');
            $table->integer('gender');
            $table->integer('roleid');
            $table->date('dob');
            $table->string('email')->unique();
            $table->string('password');
            $table->integer('mobile');
            $table->longText('address');
            $table->string('profileimg');
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
        Schema::dropIfExists('profiles');
    }
}
