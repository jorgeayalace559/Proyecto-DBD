<?php

use Illuminate\Database\Seeder;
use App\Passenger;

class PassengersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Passenger::class,100)->create();
    }
}
