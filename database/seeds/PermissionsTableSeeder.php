<?php


use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;


class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
            'role-list',
            'role-create',
            'role-edit',
            'role-delete',
            'lead-list',
            'lead-create',
            'lead-edit',
            'lead-delete',
            'product-list',
            'product-create',
            'product-edit',
            'product-delete',
            'status-list',
            'status-create',
            'status-edit',
            'status-delete',
            'user-list',
            'user-create',
            'user-edit',
            'user-delete',
        ];


        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }
    }
}

