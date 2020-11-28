<?php

use iLaravel\iAWC\Vendor\Models\Methods\Altitude;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIAwcGAirMetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('i_awc_g_air_mets', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('product')->nullable();
            $table->string('tag')->nullable();
            $table->string('hazard')->nullable();
            $table->text('altitude')->nullable();
            $table->string('forecast_hour')->nullable();
            $table->string('geometry')->nullable();
            $table->longText('points')->nullable();
            $table->text('hash')->nullable();
            $table->timestamp('receipt_at')->nullable();
            $table->timestamp('issue_at')->nullable();
            $table->timestamp('valid_at')->nullable();
            $table->timestamp('expire_at')->nullable();
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
        Schema::dropIfExists('i_awc_g_air_mets');
    }
}
