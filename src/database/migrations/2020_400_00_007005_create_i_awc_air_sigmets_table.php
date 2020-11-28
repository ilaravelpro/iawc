<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIAwcAirSigmetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('i_awc_air_sigmets', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('text')->nullable();
            $table->text('altitude')->nullable();
            $table->text('movement')->nullable();
            $table->string('hazard')->nullable();
            $table->longText('points')->nullable();
            $table->text('hash')->nullable();
            $table->timestamp('start_at')->nullable();
            $table->timestamp('end_at')->nullable();
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
        Schema::dropIfExists('i_awc_air_sigmets');
    }
}
