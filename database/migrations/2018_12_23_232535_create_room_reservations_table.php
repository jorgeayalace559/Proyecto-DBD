<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRoomReservationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('room_reservations', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('cost');
            $table->timestamp('begin_date');
            $table->timestamp('end_date');

            $table->unsignedInteger('purchase_order_id');
            $table->foreign('purchase_order_id')->references('id')->on('purchase_orders')->onDelete('cascade');
            $table->unsignedInteger('package_id');
            $table->foreign('package_id')->references('id')->on('packages')->onDelete('cascade');

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
         Schema::table('room_reservations', function(Blueprint $table){
            $table->dropForeign('room_reservations_package_id_foreign');
            $table->dropColumn('package_id');
            $table->dropForeign('room_reservations_purchase_order_id_foreign');
            $table->dropColumn('purchase_order_id');
        });
    }
}
