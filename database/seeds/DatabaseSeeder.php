<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(PermissionsTableSeeder::class);
        $this->command->info('Permissions Table seeded :)');

        $this->call(RolesTableSeeder::class);
        $this->command->info('Roles Table seeded :)');

        $this->call(UsersTableSeeder::class);
        $this->command->info('Users Table seeded :)');
    }
}