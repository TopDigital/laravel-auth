<?php

namespace TopDigital\Auth\Helpers;

use Illuminate\Support\Str;
use Hash;

use TopDigital\Auth\Models\User;

class PasswordHelper
{
    public static function checkPassword(string $password, User $user) : bool
    {
        return Hash::check($password, $user->password);
    }

    public static function generatePassword()
    {

        return Str::random(10);
    }
}
