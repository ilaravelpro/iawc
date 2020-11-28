<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIAwcMetarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('i_awc_metars', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('station')->nullable();
            $table->text('text')->nullable();
            $table->string('latitude')->nullable();
            $table->string('longitude')->nullable();
            $table->string('altimeter')->nullable();
            $table->string('flight_cat')->nullable();
            $table->string('elevation')->nullable();
            $table->string('snow')->nullable();
            $table->string('icon')->nullable();
            $table->text('temperature')->nullable();
            $table->text('wind')->nullable();
            $table->text('visibility')->nullable();
            $table->text('wx')->nullable();
            $table->text('sky_condition')->nullable();
            $table->text('precip')->nullable();
            $table->text('quality_control_flags')->nullable();
            $table->text('hash')->nullable();
            $table->timestamp('observation_at')->nullable();
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
        Schema::dropIfExists('i_awc_metars');
    }
}
