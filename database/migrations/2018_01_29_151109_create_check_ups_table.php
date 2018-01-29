<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCheckUpsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('check_ups', function (Blueprint $table) {
            $table->increments('id');
            $table->datetime('date_time')->nullable();
            $table->text('notes')->nullable();
            $table->string('bp')->nullable();
            $table->string('hr')->nullable();
            $table->string('rr')->nullable();
            $table->string('weight')->nullable();
            $table->string('height')->nullable();
            $table->boolean('pregnancy');
            $table->longText('complaints')->nullable();
            $table->longText('assessments')->nullable();
            $table->longText('treatment')->nullable();
            $table->longText('prescribed_meds')->nullable();
            $table->longText('ea_id')->nullable();
            $table->unsignedInteger('appointment_id')->nullable();
            $table->enum('status', ['active', 'done', 'canceled'])->default('active');
            $table->timestamps();

            $table->foreign('appointment_id')->references('id')->on('appointments');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('check_ups');
    }
}
