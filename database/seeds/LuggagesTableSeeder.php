<?php

use Illuminate\Database\Seeder;
use App\Luggage;

class LuggagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Luggage::class,10)->create();
    }
}
