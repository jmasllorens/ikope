<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Facades\Auth;
use App\Models\Seminar;

class SeminarController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        $seminars = Seminar::orderBy('date', 'desc')->paginate(10);

        if($user->isAdmin)
        {
            return Inertia::render('seminars.admin', ['seminars' => $seminars]);
        }
            return Inertia::render('seminars', ['seminars' => $seminars, 'user' => $user]);
    }
}
