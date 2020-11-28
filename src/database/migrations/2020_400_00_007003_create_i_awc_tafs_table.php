<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIAwcTafsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('i_awc_tafs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('station')->nullable();
            $table->text('text')->nullable();
            $table->string('latitude')->nullable();
            $table->string('longitude')->nullable();
            $table->string('elevation')->nullable();
            $table->string('remarks')->nullable();
            $table->text('hash')->nullable();
            $table->timestamp('start_at')->nullable();
            $table->timestamp('end_at')->nullable();
            $table->timestamp('issue_at')->nullable();
            $table->timestamp('bulletin_at')->nullable();
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
        Schema::dropIfExists('i_awc_tafs');
    }
}
