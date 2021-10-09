<?php

namespace App\Repositories;

use App\Models\Patient;
use App\Models\User;
use Illuminate\Support\Facades\Auth;


class PatientRepository extends BaseRepository
{
    

    public function __construct(Patient $patient)
    {
        parent::__construct($patient);
    }

    public function all()
    {   
        $user = Auth::user();
        
        return $this->model->orderBy('name', 'asc')->where('user_id', $user->id)->get();
    }


}
