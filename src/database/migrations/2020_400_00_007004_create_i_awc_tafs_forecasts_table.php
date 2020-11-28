<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIAwcTafsForecastsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('i_awc_tafs_forecasts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('taf_id')->unsigned()->nullable();
            $table->foreign('taf_id')->references('id')->on('i_awc_tafs')->onDelete('cascade');
            $table->text('text')->nullable();
            $table->string('change_indicator')->nullable();
            $table->string('probability')->nullable();
            $table->string('not_decoded')->nullable();
            $table->text('temperature')->nullable();
            $table->text('wind')->nullable();
            $table->text('visibility')->nullable();
            $table->text('wx')->nullable();
            $table->text('sky_condition')->nullable();
            $table->text('turbulence_condition')->nullable();
            $table->text('icing_condition')->nullable();
            $table->text('hash')->nullable();
            $table->timestamp('start_at')->nullable();
            $table->timestamp('end_at')->nullable();
            $table->timestamp('becoming_at')->nullable();
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
        Schema::dropIfExists('i_awc_tafs_forecasts');
    }
}
