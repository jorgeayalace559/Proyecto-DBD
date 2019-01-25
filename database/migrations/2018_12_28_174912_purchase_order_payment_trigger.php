<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class PurchaseOrderPaymentTrigger extends Migration
{
    public function up()
    {
        
        DB::statement('
        
        CREATE OR REPLACE FUNCTION setPaymentToPurchase_Order()
        RETURNS trigger AS
        $BODY$
        BEGIN
            INSERT INTO payments(type, bank, count,quotas, purchase_order_id, created_at, updated_at)
            VALUES (null, null, null, 0, NEW.id, now(), null);
            RETURN NEW;
        END
        $BODY$
        LANGUAGE plpgsql;
        ');

        DB::unprepared('
        CREATE TRIGGER tg_Purchase_Order_Payment AFTER INSERT ON purchase_orders FOR EACH ROW
        EXECUTE PROCEDURE setPaymentToPurchase_Order()
        ');

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        
        DB::unprepared('DROP TRIGGER `tg_Purchase_Order_Payment`');

    }
}
