<?php

use Illuminate\Database\Seeder;

class CountriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        //Paises
        DB::table('countries')->insert(
            [
                'name' => 'Chile'
            ]
        );
        DB::table('countries')->insert(
            [
                'name' => 'Peru'
            ]
        );
        DB::table('countries')->insert(
            [
                'name' => 'Argentina'
            ]
        );
        DB::table('countries')->insert(
            [
                'name' => 'Brasil'
            ]
        );
        DB::table('countries')->insert(
            [
                'name' => 'Estados Unidos'
            ]
        );
    }
}
