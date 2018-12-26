<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSeatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('seats', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('number');
            $table->string('type');
            $table->integer('remaining');

            $table->unsignedInteger('ticket_id');
            $table->foreign('ticket_id')->references('id')->on('tickets');
            $table->unsignedInteger('airplane_id');
            $table->foreign('airplane_id')->references('id')->on('airplanes');

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
        Schema::dropIfExists('seats');
    }
}
