<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRoomReserves extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('room_reserves', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('cost');
            $table->timestamp('date');
            $table->timestamp('begin_date');
            $table->timestamp('end_date');
            //$table->foreign('purchase_order_id')->references('id')->on('purchase_orders');
            //$table->foreign('package_id')->references('id')->on('packages');
            //$table->foreign('room_id')->references('id')->on('rooms');
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
        Schema::dropIfExists('room_reserves');
    }
}
