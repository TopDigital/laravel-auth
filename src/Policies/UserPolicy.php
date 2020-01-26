<?php

namespace TopDigital\Auth\Policies;

use TopDigital\Auth\Models\User;

use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;

    public function index(?User $user) : bool
    {
        return $this->checkMainPolicy($user);
    }

    public function view(?User $user) : bool
    {
        return $this->checkMainPolicy($user);
    }

    public function create(?User $user) : bool
    {
        return $this->checkMainPolicy($user);
    }

    public function update(?User $user, User $updatedUser) : bool
    {
        return $this->checkMainPolicy($user);
    }

    public function delete(?User $user, User $deletedUser) : bool
    {
        return $this->checkMainPolicy($user);
    }

    public function checkMainPolicy(?User $user) : bool
    {
//        return !!$user && $user->isAdmin();
        return true;
    }
}
