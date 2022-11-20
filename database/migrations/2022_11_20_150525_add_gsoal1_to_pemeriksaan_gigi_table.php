<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddGsoal1ToPemeriksaanGigiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('pemeriksaan_gigi', function (Blueprint $table) {
            $table->string('gsoal1')->nullable();
            $table->string('gsoal2')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('pemeriksaan_gigi', function (Blueprint $table) {
            //
        });
    }
}
