<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddAiToPemeriksaanGigiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('pemeriksaan_gigi', function (Blueprint $table) {
            $table->string('gambarai1')->nullable();
            $table->string('gambarai2')->nullable();
            $table->string('gambarai3')->nullable();
            $table->string('gambarai4')->nullable();
            $table->string('gambarai5')->nullable();
            $table->string('ghasil_atas')->nullable();
            $table->string('ghasil_bawah')->nullable();
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
