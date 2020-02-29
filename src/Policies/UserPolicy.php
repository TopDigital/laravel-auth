<?php

namespace TopDigital\Auth\Policies;

use TopDigital\Auth\Models\User;

use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;

    public function index(?User $user) : bool
    {
        return $user->can('view users');
    }

    public function view(?User $user) : bool
    {
        return $user->can('view users');
    }

    public function create(?User $user) : bool
    {
        return $user->can('create user');
    }

    public function update(?User $user, User $updatedUser) : bool
    {
        return $user->can('update user') || $user->getAuthIdentifier() === $updatedUser->getAuthIdentifier();
    }

    public function delete(?User $user, User $deletedUser) : bool
    {
        return $user->can('delete user');
    }
}
