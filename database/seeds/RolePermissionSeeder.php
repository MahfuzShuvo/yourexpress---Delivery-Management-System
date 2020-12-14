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
        $roleSuperAdmin = Role::create(['name' => 'SuperAdmin']);
        $roleAdmin = Role::create(['name' => 'Admin']);
        $roleMerchant = Role::create(['name' => 'Merchant']);
        $roleUser = Role::create(['name' => 'User']);

        // permission list as array
        $permissions = [

            // dashboard permissions
            [
                'group_name' => 'dashboard',
                'permissions' => [
                    'dashboard.view',
                ]
            ],
        	
            // admin permissions
            [
                'group_name' => 'admin',
                'permissions' => [
                    'admin.create',
                    'admin.view',
                    'admin.edit',
                    'admin.delete',
                    'admin.approve',
                ]
            ],
        	
            // role permissions
            [
                'group_name' => 'role',
                'permissions' => [
                    'role.create',
                    'role.view',
                    'role.edit',
                    'role.delete',
                    'role.approve',
                ]
            ],

        	// profile permissions
            [
                'group_name' => 'profile',
                'permissions' => [
                    'profile.create',
                    'profile.view',
                    'profile.edit',
                    'profile.delete',
                    'profile.approve',
                ]
            ]
        ];

        // craete & assign permissions
        for ($i=0; $i < count($permissions); $i++) {

            $permissionGroup = $permissions[$i]['group_name'];

            for ($j=0; $j < count($permissions[$i]['permissions']); $j++) { 
                // create permission
                $permission = Permission::create(['name' => $permissions[$i]['permissions'][$j], 'group_name' => $permissionGroup]);

                // assign permission
                $roleSuperAdmin->givePermissionTo($permission);
                $permission->assignRole($roleSuperAdmin);
            }
        } 
    }
}
