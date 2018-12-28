<?php

use Illuminate\Database\Seeder;

class PassengersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //ESTO ES DE PRUEBA

        DB::table('passengers')->insert(
            [
                'name' => 'Tommy',
                'rut' => '6.666.666-6',
                'ticket_id' => 1            
            ]
        );
    }
}
