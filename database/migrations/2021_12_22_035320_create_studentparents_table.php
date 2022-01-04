<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentparentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('studentparents', function (Blueprint $table) {
            $table->id();
            $table->string('email');
            $table->string('password');
            $table->string('father_name');
            $table->string('father_address');
            $table->string('father_phone');

            $table->unsignedBigInteger('father_nationality');
            $table->foreign('father_nationality')->references('id')->on('nationalities');

            $table->string('father_national_id');

            $table->unsignedBigInteger('father_status');
            $table->foreign('father_status')->references('id')->on('maritalstatuses');

            $table->unsignedBigInteger('father_job');
            $table->foreign('father_job')->references('id')->on('jobs');

            $table->string('mother_name');
            $table->string('mother_phone');
            $table->string('mother_address');

            $table->unsignedBigInteger('mother_nationality');
            $table->foreign('mother_nationality')->references('id')->on('nationalities');

            $table->string('mother_national_id');

            $table->unsignedBigInteger('mother_status');
            $table->foreign('mother_status')->references('id')->on('maritalstatuses');
            $table->unsignedBigInteger('mother_job');
            $table->foreign('mother_job')->references('id')->on('jobs');

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
        Schema::dropIfExists('studentparents');
    }
}
