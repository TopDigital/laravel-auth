<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\User;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(\TopDigital\Auth\Models\User::class, function (Faker $faker) {
    $email = $faker->unique()->safeEmail;
    return [
        'name' => $faker->name,
        'login' => $email,
        'email' => $email,
        'email_verified_at' => now(),
        'phone' => $faker->e164PhoneNumber,
        'phone_verified_at' => now(),
        'password' => 'qwe123', // password
        'remember_token' => Str::random(10),
    ];
});
