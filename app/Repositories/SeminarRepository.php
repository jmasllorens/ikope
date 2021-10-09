<?php

namespace App\Repositories;

use App\Models\Seminar;
use App\Models\User;


class SeminarRepository
{
    private $model;

    public function __construct()
    {
        $this->model = new Seminar();
    }

    public function all()
    {
        return $this->model->orderBy('date', 'asc')->get();
    }

    public function get(int $id)
    {
        return $this->model->find($id);
    }

    public function save(Seminar $seminar)
    {
        $seminar->save();
        return $seminar;
    }

    public function delete(Seminar $seminar)
    {
        $seminar->delete();
        return $seminar;
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
}