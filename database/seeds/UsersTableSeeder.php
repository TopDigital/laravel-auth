<?php

namespace TopDigital\Auth\Seeders;

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        /** @var \TopDigital\Auth\Models\User $admin */
        $admin = factory(\TopDigital\Auth\Models\User::class)
            ->create([
                'login' => 'admin',
                'password' => 'qwe123'
            ]);
        $admin->assignRole('admin');
    }
}
