<?php

namespace App\Repositories;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;


class UserRepository extends BaseRepository
{


    public function __construct(User $user)
    {
        parent::__construct($user);
    }

    public function allAdmins()
    {
        return $this->model->orderByDesc('id')->where('isAdmin', true)->paginate(20);
    }

    public function allUsers(Request $request)
    {
        return $this->model->where('isAdmin', false)->when($request->term, function($query, $term){
            $query->where('name', 'LIKE', '%'. $term .'%');
        })->paginate(20);
    }

    public function mailConfirm(Request $request)
    {
        Mail::raw('Message: '.$request->message.'.', function ($m) {

            $user = Auth::user();
                
            $m->from($user->email, $user->name);
    
            $m->to('ikope@ikope.com', 'I-KOPE')->subject($user->name.' sent you a message');
            });
    
           
    }

   

    

   

    

   


}