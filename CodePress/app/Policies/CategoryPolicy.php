<?php

namespace App\Policies;

use CodePress\CodeUser\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class CategoryPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function before(){
        //return true;
    }

    public function after(){
        //return true;
    }

    public function update($user, $category){
        return $user->id == $category->user->id ;
    }
}
