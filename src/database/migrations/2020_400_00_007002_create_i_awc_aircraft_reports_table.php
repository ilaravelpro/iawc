<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIAwcAircraftReportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('i_awc_aircraft_reports', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('reference')->nullable();
            $table->text('text')->nullable();
            $table->string('altitude')->nullable();
            $table->string('latitude')->nullable();
            $table->string('longitude')->nullable();
            $table->string('type')->nullable();
            $table->string('icon')->nullable();
            $table->text('temperature')->nullable();
            $table->text('wind')->nullable();
            $table->text('visibility')->nullable();
            $table->text('wx')->nullable();
            $table->text('sky_condition')->nullable();
            $table->text('turbulence_condition')->nullable();
            $table->text('icing_condition')->nullable();
            $table->text('quality_control_flags')->nullable();
            $table->text('hash')->nullable();
            $table->timestamp('receipt_at')->nullable();
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
        Schema::dropIfExists('i_awc_aircraft_reports');
    }
}
