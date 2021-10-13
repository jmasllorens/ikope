<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;
use App\Models\Seminar;
use App\Models\Publication;
use App\Models\User;
use App\Models\Patient;
use App\Models\Session;
use App\Models\Note;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        
        if ($user->isAdmin)
        {   
         
            $seminars = Seminar::all();
            $publications = Publication::all();
            $users = User::all();
           
           
            return Inertia::render('Dashboard', ['seminars' => $seminars, 'publications' => $publications, 'users' => $users]);
        }

        if (!$user->isActive)
        {   
         
            $seminars = Seminar::all();
            $publications = Publication::all();
           
           
           
            return Inertia::render('Dashboard', ['seminars' => $seminars, 'publications' => $publications]);
        }

        $seminars = Seminar::all();
        $publications = Publication::all();
        $patients = Patient::all();
        $sessions = Session::all();
        $notes = Note::all();

        return Inertia::render('Dashboard', ['seminars' => $seminars, 'publications' => $publications, 'patients' => $patients, 'sessions' => $sessions, 'notes' => $notes]);


        
       
        
    }
}