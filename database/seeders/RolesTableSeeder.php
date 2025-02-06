<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //Crear roles
        $adminRole = Role::create(['name' => 'administrador']); 
        $userRole = Role::create(['name' => 'usuario']);

        //Assignación de permisos
        $adminRole->givePermissionTo('borrar libros');
    }
}
