<?php


use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleAndPermissionSeeder extends Seeder
{
    public function run()
    {
        // Création des rôles
        $admin = Role::create(['name' => 'Admin']);
        $manager = Role::create(['name' => 'Manager']);
        $employe = Role::create(['name' => 'Employé']);

        // Création des permissions
        $permissions = [
            'ajouter employe',
            'modifier employe',
            'supprimer employe',
            'voir employes',
        ];

        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }

        $admin->givePermissionTo(Permission::all());
        $manager->givePermissionTo(['ajouter employé', 'modifier employé', 'voir employés']);
        $employe->givePermissionTo('voir employés'); 
    }
}

