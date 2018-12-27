<?php

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        //Roles
        DB::table('roles')->insert(
            [
                'type' => 'Gerente',
                'description' => 'Jefe del aeropuerto'
            ]
        );
        DB::table('roles')->insert(
            [
                'type' => 'Administrador',
                'description' => 'Jefe/s encargado/s del personal del aeropuerto'
            ]
        );
        DB::table('roles')->insert(
            [
                'type' => 'Trabajador',
                'description' => 'Trabajador/es del aeropuerto'
            ]
        );
        

    }
}
