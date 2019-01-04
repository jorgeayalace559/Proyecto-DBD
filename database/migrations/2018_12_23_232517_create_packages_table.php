<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;


class CreatePackagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('packages', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('quantity');
            $table->string('name');
            $table->integer('cost');
            $table->integer('nights');

            $table->unsignedInteger('origin_id');
            $table->foreign('origin_id')->references('id')->on('cities')->onDelete('cascade');
            $table->unsignedInteger('destination_id');
            $table->foreign('destination_id')->references('id')->on('cities')->onDelete('cascade');
            $table->unsignedInteger('package_reservation_id');
            $table->foreign('package_reservation_id')->references('id')->on('package_reservations')->onDelete('cascade');

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
        Schema::dropIfExists('packages');
    }
}
