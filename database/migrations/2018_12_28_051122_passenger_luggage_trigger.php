<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class PassengerLuggageTrigger extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        
        DB::statement('
        
        CREATE OR REPLACE FUNCTION setLuggageToPassenger()
        RETURNS trigger AS
        $BODY$
        BEGIN
            INSERT INTO luggages(weight, cost, type, passenger_id, created_at, updated_at)
            VALUES (0, 0, \'No posee equipaje\', NEW.id, now(), null);
            RETURN NEW;
        END
        $BODY$
        LANGUAGE plpgsql;
        ');

        DB::unprepared('
        CREATE TRIGGER tg_Passenger_Luggage AFTER INSERT ON passengers FOR EACH ROW
        EXECUTE PROCEDURE setLuggageToPassenger();
        ');

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        
        DB::unprepared('DROP TRIGGER ` tg_Passenger_Luggage`');

    }
}
