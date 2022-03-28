<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        $admin = Role::create(["name"=>"Administrador"]); // este sera el admin global
        $nutri = Role::create(["name"=>"Nutricionista"]); // este sera el nutricionista
        $client = Role::create(["name"=>"Cliente"]); // este sera el cliente

        $user1 = User::create([
            "name"=>"Erick",
            "apellido"=>"Galarza",
            "email"=>'erick@gmail.com',
            "password"=>'$2y$10$Ztoy.56ZbM.7kfG60rosJuERbO4I5HDnBceACPNs7SVgADd9Xw62m',//morales98
            "telefono"=>"0988703045",
            "cedula"=>"2100463187",
            
        ]);

        $user1->assignRole('Administrador');

        $user2 = User::create([
            "name"=>"Alvaro",
            "apellido"=>'Salazar',
            "email"=>'alvaro@gmail.com',
            "password"=>'$2y$10$Ztoy.56ZbM.7kfG60rosJuERbO4I5HDnBceACPNs7SVgADd9Xw62m',//morales98
            "telefono"=>"0988703046",
            "cedula"=>"2100463188",
        ]);
        $user2->assignRole('Administrador');

        $user3 = User::create([
            "name"=>"Andres",
            "apellido"=>"Morales",
            "email"=>'andres@gmail.com',
            "password"=>'$2y$10$Ztoy.56ZbM.7kfG60rosJuERbO4I5HDnBceACPNs7SVgADd9Xw62m',//morales98
            "telefono"=>"0988703047",
            "cedula"=>"2100463189",
        ]);
        $user3->assignRole('Administrador');

        // comento para que no halla luego una duplicacion y posibleserrres

        
        $user4 = User::create([
            "name"=>"Pedro",
            "apellido"=>'Perez',
            "email"=>'pedro@gmail.com',
            "password"=>'$2y$10$Ztoy.56ZbM.7kfG60rosJuERbO4I5HDnBceACPNs7SVgADd9Xw62m',//morales98
            "telefono"=>"0988703012",
            "cedula"=>"2100463122",
        ]);

        $user4->assignRole('Nutricionista');

        $user5 = User::create([
            "name"=>"Juan",
            "apellido"=>'Jose',
            "email"=>'juan@gmail.com',
            "password"=>'$2y$10$Ztoy.56ZbM.7kfG60rosJuERbO4I5HDnBceACPNs7SVgADd9Xw62m',//morales98
            "telefono"=>"0988703034",
            "cedula"=>"2100463134",
        ]);

        $user5->assignRole('Cliente');

    }
}
