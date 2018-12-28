<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        //Jefazo
        DB::table('users')->insert(
            [
            
            'name' => 'Bruno Diaz',
            'email' => 'bruno.diaz@example.com',
            'email_verified_at' => now(),
            'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm',
            'miles' => 0,
            'rut' => "6.123.489-7",
            'remember_token' => str_random(10),
            'role_id' => 1,
            'created_at' => now(),
            'updated_at' => now()
            ]
        );

        factory(App\User::class, 10)->create()->make();

    }
}
