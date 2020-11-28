<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIAwcStationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('i_awc_stations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('station')->nullable();
            $table->string('latitude')->nullable();
            $table->string('longitude')->nullable();
            $table->string('wmo')->nullable();
            $table->string('elevation')->nullable();
            $table->string('site')->nullable();
            $table->string('state')->nullable();
            $table->string('country')->nullable();
            $table->text('site_type')->nullable();
            $table->text('hash')->nullable();
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
        Schema::dropIfExists('i_awc_stations');
    }
}
