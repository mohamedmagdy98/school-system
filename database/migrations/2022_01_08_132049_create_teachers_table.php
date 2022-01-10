<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTeachersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teachers', function (Blueprint $table) {
            $table->id();
            $table->string('email');
            $table->string('password');
            $table->string('name');
            $table->string('national_id');
            $table->string('address');
            $table->date('birthdate');
            $table->unsignedBigInteger('nationality_id');
            $table->unsignedBigInteger('speciality_id');
            $table->unsignedBigInteger('maritalstatus_id');
            $table->unsignedBigInteger('');
            
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
        Schema::dropIfExists('teachers');
    }
}
