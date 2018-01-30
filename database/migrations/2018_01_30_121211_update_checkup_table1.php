<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateCheckupTable1 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('check_ups', function (Blueprint $table) {
            $table->longText('cases')->nullable();
            $table->longText('services_availed')->nullable();
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
            $table->dropColumn('cases');
            $table->dropColumn('services_availed');
        });
    }
}
