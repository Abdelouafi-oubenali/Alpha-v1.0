<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder 
{
    public function run()
    {
        $admin = Role::create(['name' => 'Admin']);
        $manager = Role::create(['name' => 'Manager']);
        $employe = Role::create(['name' => 'Employe']);
        $rh = Role::create(['name' => 'RH']);
        $permissions = ['ajouter employé', 'modifier employé', 'supprimer employé', 'voir employés'];

        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }

        $admin->givePermissionTo(Permission::all());
        $manager->x(['ajouter employé', 'modifier employé', 'voir employés']);
        $employe->givePermissionTo('voir employés');
        $rh->givePermissionTo(['ajouter employé', 'modifier employé', 'voir employés']);
    }
}
