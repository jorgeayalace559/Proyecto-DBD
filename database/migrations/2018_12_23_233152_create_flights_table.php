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
            $table->integer('cost');
            $table->timestamp('begin_date')->nullable();
            $table->timestamp('end_date')->nullable();

            $table->unsignedInteger('origin_id');
            $table->foreign('origin_id')->references('id')->on('cities')->onDelete('cascade');

            $table->unsignedInteger('airplane_id');
            $table->foreign('airplane_id')->references('id')->on('airplanes')->onDelete('cascade');

            $table->unsignedInteger('destination_id');
            $table->foreign('destination_id')->references('id')->on('cities')->onDelete('cascade');

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
        Schema::table('flights', function(Blueprint $table){
            $table->dropForeign('flights_origin_id_foreign');
            $table->dropColumn('origin_id');
            $table->dropForeign('flights_destination_id_foreign');
            $table->dropColumn('destination_id');
        });
    }
}
