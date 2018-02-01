<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnCheckupTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('check_ups', function (Blueprint $table) {
            $table->date('last_menstruation_date')->nullable();
            $table->date('edc')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('check_ups', function (Blueprint $table) {
            $table->dropColumn('last_menstruation_date');
            $table->dropColumn('edc');

        });
    }
}
