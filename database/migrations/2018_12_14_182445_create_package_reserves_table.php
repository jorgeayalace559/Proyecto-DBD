<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePackageReservesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('package_reserves', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('cost');
            $table->timestamp('date');
            $table->timestamp('begin_date');
            $table->timestamp('end_date');

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
        Schema::dropIfExists('package_reserves');
    }
}