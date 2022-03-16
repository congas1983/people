<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Role;
class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = [
            ["name" => 'Asesor', "description" => "Asesores Internos"],
            ["name" => 'coordinador', "description" => "Coordinadores"],
            ["name" => 'administrador', "description" => "Administradores"],         
        ];
        foreach ($roles as $role) {
            if (!Role::where('name', $role['name'])->exists()) {
                $role_new  = new Role();
                $role_new->name = $role['name'];
                $role_new->description = $role['description'];
                $role_new->save();
            }
        }
    }
}
