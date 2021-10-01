<?php

namespace App\Repositories;

use App\Models\Publication;

class PublicationRepository
{
    private $model;

    public function __construct()
    {
        $this->model = new Publication();
    }

    public function all()
    {
        return $this->model->orderBy('title', 'asc')->paginate(20);
    }

    public function get(int $id)
    {
        return $this->model->find($id);
    }

    public function save(Publication $publication)
    {
        $publication->save();
        return $publication;
        
    }
    public function delete(Publication $publication)
    {
        $publication->delete($publication);
        return $publication;
    }
}