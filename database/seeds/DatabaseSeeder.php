<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        //$this->call(UserTableSeeder::class);
        $this->call(HotelsTableSeeder::class);
        $this->call(RoomsTableSeeder::class);
        $this->call(RolesTableSeeder::class);
        //$this->call(PurchaseOrdersTableSeeder::class);
        //$this->call(InsuranceReservationsTableSeeder::class);
        $this->call(InsurancesTableSeeder::class);
        $this->call(CountriesTableSeeder::class);
        $this->call(CitiesTableSeeder::class);

    }
}
