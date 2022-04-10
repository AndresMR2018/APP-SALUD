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
        Role::create(["name"=>"Administrador"]);
        Role::create(["name"=>"Nutricionista"]); // este sera el nutricionista
        Role::create(["name"=>"Paciente"]); // este sera el cliente

        $user1 = User::create([
            "email"=>"erik@gmail.com",
            "password"=>'$2y$10$Ztoy.56ZbM.7kfG60rosJuERbO4I5HDnBceACPNs7SVgADd9Xw62m'
        ]);
        $admin = $user1->administradores()->create();
        $admin->assignRole('Administrador');

        $user2 = User::create([
            "email"=>"alvaro@gmail.com",
            "password"=>'$2y$10$Ztoy.56ZbM.7kfG60rosJuERbO4I5HDnBceACPNs7SVgADd9Xw62m'
        ]);
        $nutri = $user2->nutricionistas()->create([
            "nombre"=>"Alvaro",
            "apellido"=>"Salazar",
            "cedula"=>"1234567890",
            "especialidad"=>"Terapeuta",
            "telefono"=>"0988703030",
        ]);
        $nutri->assignRole('Nutricionista');


        $user3 = User::create([
            "email"=>"andres@gmail.com",
            "password"=>'$2y$10$Ztoy.56ZbM.7kfG60rosJuERbO4I5HDnBceACPNs7SVgADd9Xw62m'
        ]);
        $paciente = $user3->pacientes()->create([
            "nombre"=>"Andres",
            "apellido"=>"Morales",
            "cedula"=>"1234567890",
            "telefono"=>"0988703030",
            "tipo_diabetes"=>1,
            "edad"=>23
        ]);
        $paciente->assignRole('Paciente');
    }
}
