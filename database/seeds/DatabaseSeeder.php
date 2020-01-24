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
        factory(\Topdigital\Auth\Models\User::class)
            ->create([
                'email' => 'admin@user.com',
                'password' => 'qwe123'
            ]);
    }
}
