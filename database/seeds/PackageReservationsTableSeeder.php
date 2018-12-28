<?php

use Illuminate\Database\Seeder;
use App\PackageReservation;

class PackageReservationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\PackageReservation::class, 50)->create();
    }
}
