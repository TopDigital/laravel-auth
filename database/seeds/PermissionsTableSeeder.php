<?php

namespace TopDigital\Auth\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Permission::create(['name' => 'view users']);
        Permission::create(['name' => 'create user']);
        Permission::create(['name' => 'update user']);
        Permission::create(['name' => 'delete user']);

        Role::create(['name' => 'admin'])
            ->givePermissionTo([
                'view users',
                'create user',
                'update user',
                'delete user',
            ]);
    }
}
