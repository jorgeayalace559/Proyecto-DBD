<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInsuranceReservesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('insurance_reservation', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('cost');
            $table->timestamp('date');
            $table->timestamp('begin_date');
            $table->timestamp('end_date');

            $table->unsignedInteger('purchase_order_id');
            $table->foreign('purchase_order_id')->references('id')->on('purchase_orders');

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
        Schema::dropIfExists('insurance__reserves');
    }
}
