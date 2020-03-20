<?php

use Illuminate\Database\Seeder;
use App\User;
use Spatie\Permission\Models\Role;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Create admin user
        $adminUser = User::create([
            'name' => 'Inya Johnson',
            'email' => 'intoajohnson@gmail.com',
            'password' => bcrypt('123456')
        ]);

        $adminRole = Role::where('name', 'Admin')->first();

        $adminUser->assignRole([$adminRole->id]);

        // Create sales user
        // $salesUser = User::create([
        //     'name' => 'Inya Tochukwu',
        //     'email' => 'tochukwu@gmail.com',
        //     'password' => bcrypt('123456')
        // ]);

        // $salesRole = Role::where('name', 'Sales')->get();

        // $salesUser->assignRole([$salesRole->id]);
    }
}