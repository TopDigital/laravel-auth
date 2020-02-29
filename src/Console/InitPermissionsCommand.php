<?php

namespace TopDigital\Auth\Console;

use Illuminate\Console\Command;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class InitPermissionsCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'permissions:init';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Initialize permissions';

    /**
     * Execute the console command.
     *
     * @return void
     */
    public function handle()
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
