<?php

use Illuminate\Database\Seeder;

class CitiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        //Ciudades
        DB::table('cities')->insert(
            [
                'name' => 'Santiago',
                'airport_name' => 'Arturo Merino Benitez',
                'country_id' => 1
            ]
        );
        DB::table('cities')->insert(
            [
                'name' => 'Temuco',
                'airport_name' => 'Aeropuerto Internacional La Araucania',
                'country_id' => 1
            ]
        );
        //Ciudades
        DB::table('cities')->insert(
            [
                'name' => 'Jauja',
                'airport_name' => 'Francisco Carlé',
                'country_id' => 2
            ]
        );
        DB::table('cities')->insert(
            [
                'name' => 'Lima',
                'airport_name' => 'Jorge Chávez ',
                'country_id' => 2
            ]
        );
        //Ciudades
        DB::table('cities')->insert(
            [
                'name' => 'Buenos Aires',
                'airport_name' => 'Aeropuerto Internacional Ezeiza',
                'country_id' => 3
            ]
        );
        DB::table('cities')->insert(
            [
                'name' => 'San Carlos de Bariloche',
                'airport_name' => 'Aeropuerto Internacional de Bariloche Tte. Luis Candelaria',
                'country_id' => 3
            ]
        );
        //Ciudades
        DB::table('cities')->insert(
            [
                'name' => 'Rio de Janeiro',
                'airport_name' => 'Aeropuerto Internacional de Galeão',
                'country_id' => 4
            ]
        );
        DB::table('cities')->insert(
            [
                'name' => 'Brasilia',
                'airport_name' => 'Aeropuerto Internacional Presidente Juscelino Kubitschek',
                'country_id' => 4
            ]
        );
        //Ciudades
        DB::table('cities')->insert(
            [
                'name' => 'New York',
                'airport_name' => 'Aeropuerto Internacional John F. Kennedy',
                'country_id' => 5
            ]
        );
        DB::table('cities')->insert(
            [
                'name' => 'Los Angeles',
                'airport_name' => 'Aeropuerto Internacional de Los Angeles',
                'country_id' => 5
            ]
        );
    }
}
