<?php

use Illuminate\Database\Seeder;
use App\Airplane;

class AirplanesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Airplane::class,20)->create();
    }
}
