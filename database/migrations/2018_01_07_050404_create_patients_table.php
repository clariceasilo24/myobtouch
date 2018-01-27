<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePatientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patients', function (Blueprint $table) {
            $table->increments('id');
            $table->string('firstname');
            $table->string('nickname')->nullable();
            $table->string('lastname');
            $table->string('email')->unique();
            $table->date('birthdate');
            $table->enum('gender',['Male', 'Female']);
            $table->enum('status',['Single', 'Married']); 
            $table->string('address')->nullable();
            $table->string('occupation')->nullable();
            $table->integer('pregnancy')->nullable();
            $table->string('p_firstname')->nullable(); 
            $table->string('p_lastname')->nullable();
            $table->string('reffered_by')->nullable();
            $table->string('mobile_no')->nullable();
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
        Schema::dropIfExists('patients');
    }
}
