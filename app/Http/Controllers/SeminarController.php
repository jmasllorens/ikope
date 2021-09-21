<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Facades\Auth;
use App\Models\Seminar;
use Illuminate\Support\Facades\Mail;
use Http\Controllers\Storage;

class SeminarController extends Controller
{
    public function index()
    {
        $seminars = Seminar::orderBy('date', 'asc')->paginate(20);
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

        Mail::raw('Your application in regard with our seminar "'.$seminarId->title.'" has been successfully submitted.', function ($m) {

        $user = Auth::user();
            
        $m->from('ikope@ikope.com', 'I-KOPE');

        $m->to($user->email, $user->name)->subject('You have a new notification from I-KOPE');
        });
    }

    public function create() 
    {
        return Inertia::render('Admin/Seminars/Create');
    }

    public function store(Request $request)
    {
        $newSeminar = request()->except('_token');

        if($request->hasFile('image'))
    {
        $newEvent['image']=$request->file('image')->store('images', 'public');
    }
        Seminar::create($newSeminar);

        $seminars = Seminar::paginate(20);
    
       return redirect()->route('seminars');

    }

    public function edit($id)
    {   
        $seminar = Seminar::findOrFail($id);

        return Inertia::render('Admin/Seminars/Edit');
    }

    public function update(Request $request, $id)
    {
        $changesSeminar = request()->except(['_token', '_method']);
    
            if($request->hasFile('image'))
            {
            $seminar=Seminar::findOrFail($id);
            Storage::delete('public/'.$seminar->image);
            $changesSeminar['image']=$request->file('image')->store('images', 'public');
            }
  
            Seminar::where('id', '=', $id)->update($changesSeminar);
           
            $seminar = Seminar::findOrFail($id);

            return redirect()->route('seminars', compact('seminar'));
            //return view('dashboard', compact('event'));
        }
    
    public function delete($id)
    {
        Seminar::destroy($id);

        return redirect()->route('seminars');
    }

}
