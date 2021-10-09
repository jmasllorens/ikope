<?php

namespace App\Repositories;

use App\Models\Seminar;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;


class SeminarRepository extends BaseRepository
{
    

    public function __construct(Seminar $seminar)
    {
        parent::__construct($seminar);
    }

    public function all()
    {
        return $this->model->orderBy('date', 'asc')->get();
    }


    public function users(Seminar $seminar)
    {
        $users = $seminar->users;
        return $users;
    }

    public function addUser(Seminar $seminar, User $user)
    {   
        $user->seminars()->attach($seminar);
    }

    public function removeUser(Seminar $seminar, User $user)
    {
        $user->seminars()->detach($seminar);
    }

    public function mailConfirm(Seminar $seminar)
    {
        Mail::raw('Your application in regard with our seminar "'.$seminar->title.'" has been successfully submitted.', function ($m) {

            $user = Auth::user();

            $m->from('ikope@ikope.com', 'I-KOPE');
    
            $m->to($user->email, $user->name)->subject($user->name.', you have a new notification');
            });
    }

    public function userSeminars(User $user)
    {
        $seminars = $user->seminars;
        return $seminars;
    }
}