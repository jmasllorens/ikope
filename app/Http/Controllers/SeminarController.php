<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Facades\Auth;
use App\Models\Seminar;
use Illuminate\Support\Facades\Mail;

class SeminarController extends Controller
{
    public function index()
    {
        $seminars = Seminar::orderBy('date', 'asc')->paginate(10);;
        foreach($seminars as $seminar) 
        {
            $seminar->users;
        }
            return Inertia::render('Seminars', ['seminars' => $seminars]);
    }

    public function show($id) 
    {
        $user = Auth::user();
        $seminar = Seminar::find($id);
        $seminar->users;
        $isSubscribed = $seminar->isSubscribed($user->id);

        return Inertia::render('Seminar', ['seminar' => $seminar, 'isSubscribed' => $isSubscribed]);
    }

    public function subscribe($id)
    {
        $user = Auth::user();
        $seminar = Seminar::find($id);

        if($seminar->isSubscribed($user->id) == false)
        {
            $user->seminars()->attach($seminar);
            $this->sendEmail($id);
    
            session()->flash('message', 'Your application has been successfully submitted!');
     
            return redirect()->route('seminars');
        }
            return redirect()->route('seminars');
    }

    public function unsubscribe($id)
    {
        $user = Auth::user();
        $seminar = Seminar::find($id);

        if($seminar->isSubscribed($user->id) == true)
        {
            $user->seminars()->detach($seminar);
            $this->sendEmail($id);
    
            session()->flash('message', 'Your application has been successfully cancelled!');
            
            return redirect()->route('seminars');
        }
            return redirect()->route('seminars');
    }

    public function sendEmail($id)
    {   
        $seminarId = Seminar::find($id);

        Mail::raw('You have been successfully unsubscribed from our seminar "'.$seminarId->title.'".', function ($m) {

        $user = Auth::user();
            
        $m->from('ikope@ikope.com', 'I-KOPE');

        $m->to($user->email, $user->name)->subject('You have a new notification');
        });
    }

    public function create() 
    {
        return Inertia::render('Admin/Seminars/Create');
    }

    public function store()
    {

    }

    public function edit($id)
    {
        return Inertia::render('Admin/Seminars/Edit');
    }
}
