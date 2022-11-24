<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProspectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prospects', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 45);
            $table->string('surname', 45);
            $table->string('second_surname', 45)->nullable();
            $table->string('status', 1);
            $table->string('street', 45);
            $table->string('house_number', 45);
            $table->string('colony', 45);
            $table->string('postal_code', 45);
            $table->string('phone_number', 45);
            $table->string('rfc', 45);
            $table->string('observations', 255)->nullable();
            $table->unsignedInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
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
        Schema::dropIfExists('prospects');
    }
}
