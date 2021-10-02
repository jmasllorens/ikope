<?php

namespace App\Repositories;

use App\Models\User;
use App\Contracts\UserRepositoryInterface;

class UserRepository extends BaseRepository implements UserRepositoryInterface
{


    public function __construct(User $user)
    {
        parent::__construct($user);
    }

    public function all()
    {
        return $this->model->orderByDesc('id')->where('isAdmin', true)->paginate(20);
    }

    

   


}