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
                'name' => 'Chile',
                'created_at' => 'now',
                'updated_at' => 'now'
            ]
        );
        DB::table('countries')->insert(
            [
                'name' => 'Peru',
                'created_at' => 'now',
                'updated_at' => 'now'
            ]
        );
        DB::table('countries')->insert(
            [
                'name' => 'Argentina',
                'created_at' => 'now',
                'updated_at' => 'now'
            ]
        );
        DB::table('countries')->insert(
            [
                'name' => 'Brasil',
                'created_at' => 'now',
                'updated_at' => 'now'
            ]
        );
        DB::table('countries')->insert(
            [
                'name' => 'Estados Unidos',
                'created_at' => 'now',
                'updated_at' => 'now'
            ]
        );
    }
}
