<?php

namespace App\Repositories;

use App\Models\Seminar;


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
}