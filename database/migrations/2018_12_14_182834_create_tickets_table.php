<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTicketsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tickets', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('cost');
            $table->integer('quantity_passengers');

            $table->unsignedInteger('ticket_reserve_id');
            $table->foreign('ticket_reserve_id')->references('id')->on('ticket_reserves');
            $table->unsignedInteger('flight_id');
            $table->foreign('flight_id')->references('id')->on('flights');

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
        Schema::dropIfExists('tickets');
    }
}
