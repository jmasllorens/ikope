<?php

namespace App\Repositories;

use App\Models\Publication;

class PublicationRepository extends BaseRepository
{
 

    public function __construct(Publication $publication)
    {
        parent::__construct($publication);
    }

    public function all()
    {
        return $this->model->orderBy('title', 'asc')->paginate(15);
    }

}