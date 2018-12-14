<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInsuranceReserves extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('insurance_reserves', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('cost');
            $table->timestamp('date');
            $table->timestamp('begin_date');
            $table->timestamp('end_date');
            //$table->foreign('purchase_order_id')->references('id')->on('purchase_orders');
            //$table->foreign('insurance_id')->references('id')->on('insurances');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('insurance_reserves');
    }
}
