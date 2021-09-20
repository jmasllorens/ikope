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
        $user = Auth::user();
        $seminars = Seminar::orderBy('date', 'asc')->paginate(10);
        foreach($seminars as $seminar) 
        {
            $seminar->users;
        }

        if($user->isAdmin)
        {   
            return Inertia::render('Admin/Seminars', ['seminars' => $seminars]);
        }
            return Inertia::render('Seminars', ['seminars' => $seminars]);
    }

    public function show($id) 
    {
        $user = Auth::user();
        $seminar = Seminar::find($id);
        $seminar->users;
        $isSubscribed = $seminar->isSubscribed($user->id);
       
        if($user->isAdmin)
        {
            return Inertia::render('Admin/Seminar', ['seminar' => $seminar]);
        }
            return Inertia::render('Seminar', ['seminar' => $seminar, 'isSubscribed' => $isSubscribed]);
    }

    public function subscribe($id)
    {
        $user = Auth::user();
        $seminarId = Seminar::find($id);
        
        $user->seminars()->attach($seminarId);
        $this->sendEmail($id);

        session()->flash('message', 'Your application has been successfully submitted!');
 
        return redirect()->route('seminars');
    }

    public function unsubscribe($id)
    {
        $user = Auth::user();
        $seminarId = Seminar::find($id);

        $user->seminars()->detach($seminarId);
        $this->sendEmail($id);

        session()->flash('message', 'Your application has been successfully cancelled!');
        
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
    
}
