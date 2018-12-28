<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class FligthStateTrigger extends Migration
{
    public function up()
    {
        
        DB::statement('

        CREATE OR REPLACE FUNCTION setStateToFlight()
        RETURNS trigger AS
        $BODY$
        BEGIN
            INSERT INTO states(id, condition, flight_id, created_at, updated_at)
            VALUES (NEW.id, \'Pendiente\', NEW.id, now(), null);
            RETURN NEW;
        END
        $BODY$
        LANGUAGE plpgsql;
        ');

        DB::unprepared('
        CREATE TRIGGER tg_Flight_State AFTER INSERT ON flights FOR EACH ROW
        EXECUTE PROCEDURE setStateToFlight();
        ');

    }

    public function down()
    {

        DB::unprepared('DROP TRIGGER `tg_Flight_State`');
    
    }
}
