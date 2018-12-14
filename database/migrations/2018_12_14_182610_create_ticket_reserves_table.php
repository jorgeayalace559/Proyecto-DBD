<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTicketReservesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ticket_reserves', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('cost');
            $table->timestamp('date');

            $table->unsignedInteger('purchase_order_id');
            $table->foreign('purchase_order_id')->references('id')->on('purchase_orders');
            $table->unsignedInteger('package_id');
            $table->foreign('package_id')->references('id')->on('packages');

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
        Schema::dropIfExists('ticket_reserves');
    }
}
