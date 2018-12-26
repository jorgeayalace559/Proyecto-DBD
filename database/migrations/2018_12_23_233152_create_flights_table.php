<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFlightsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('flights', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('platform');
            $table->timestamp('begin_date');
            $table->timestamp('end_date');

            $table->unsignedInteger('state_id');
            $table->foreign('state_id')->references('id')->on('states');

            $table->unsignedInteger('origin_id');
            $table->foreign('origin_id')->references('id')->on('cities');

            $table->unsignedInteger('destination_id');
            $table->foreign('destination_id')->references('id')->on('cities');

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
        Schema::dropIfExists('f_lights');
    }
}
