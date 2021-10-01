<?php

namespace App\Repositories;

use App\Models\User;

class UserRepository extends BaseRepository
{


    public function __construct(User $user)
    {
        parent::__construct($user);
    }

    public function all()
    {
        return $this->model->orderByDesc('id')->paginate(20);
    }

   


}