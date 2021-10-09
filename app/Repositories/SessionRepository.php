<?php

namespace App\Repositories;

use App\Models\Session;
use Illuminate\Support\Facades\Auth;


class SessionRepository extends BaseRepository
{
    

    public function __construct(Session $session)
    {
        parent::__construct($session);
    }

    public function all()
    {   
        $user = Auth::user();
        
        return $this->model->orderBy('date', 'desc')->where('user_id', $user->id)->get();
    }

}