<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // create roles
        $roleSuperAdmin = Role::create(['name' => 'superadmin']);
        $roleAdmin = Role::create(['name' => 'admin']);
        $roleMerchant = Role::create(['name' => 'merchant']);
        $roleUser = Role::create(['name' => 'user']);

        // permission list as array
        $permissions = [
        	// dashboard permissions
        	'dashboard.view',

        	// admin permissions
        	'admin.create',
        	'admin.view',
        	'admin.edit',
        	'admin.delete',
        	'admin.approve',

        	// role permissions
        	'role.create',
        	'role.view',
        	'role.edit',
        	'role.delete',
        	'role.approve',

        	// profile permissions
        	'profile.view',
        	'profile.edit'
        ];

        // craete & assign permissions
        for ($i=0; $i < count($permissions); $i++) { 
        	// create permission
        	$permission = Permission::create(['name' => $permissions[$i]]);

        	// assign permission
        	$roleSuperAdmin->givePermissionTo($permission);
			$permission->assignRole($roleSuperAdmin);
        }

    }
}
