<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Create Admin role
        $adminRole = Role::create(['name' => 'Admin']);

        $adminPermissions = Permission::pluck('id','id')->all();

        $adminRole->syncPermissions($adminPermissions);

        // Create Sales role
        $salesRole = Role::create(['name' => 'Sales']);

        $salesPermissions = [5, 6, 7, 9];

        $salesRole->syncPermissions($salesPermissions);
    }
}