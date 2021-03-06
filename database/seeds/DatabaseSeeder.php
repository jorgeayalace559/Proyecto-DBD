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

        $this->call(RolesTableSeeder::class);
        $this->call(UserTableSeeder::class);
        $this->call(CountriesTableSeeder::class);
        $this->call(CitiesTableSeeder::class);
        $this->call(HotelsTableSeeder::class);
        $this->call(PurchaseOrdersTableSeeder::class);
        $this->call(AirplanesTableSeeder::class);
        $this->call(FlightsTableSeeder::class);
        $this->call(PackageReservationsTableSeeder::class);
        $this->call(RoomsTableSeeder::class);
        $this->call(RoomReservationsTableSeeder::class);
        $this->call(InsuranceReservationsTableSeeder::class);
        $this->call(InsurancesTableSeeder::class);
        $this->call(TicketReservationsTableSeeder::class);
        $this->call(TicketsTableSeeder::class);
        $this->call(PassengersTableSeeder::class);
        $this->call(SeatsTableSeeder::class);
        $this->call(CarsTableSeeder::class);
        $this->call(CarReservationsTableSeeder::class);
        $this->call(PackagesTableSeeder::class);
        
        


    }
}
