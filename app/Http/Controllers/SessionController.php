<?php

namespace App\Http\Controllers;

use App\Models\Session;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Facades\Auth;
use App\Models\Patient;

class SessionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function index()
    {
        $user = Auth::user();
        if($user->isActive == true)
        {

      
        $patients = Patient::orderBy('name', 'asc')->where('user_id', $user->id)->get();

        if ($patients->count() == 0)
        {
            return redirect()->route('patients_create');
        }

        $sessions = Session::orderBy('date', 'desc')->where('user_id', $user->id)->get();

        if ($sessions->count() == 0)
        {  
            return redirect()->route('patients');
        }

        foreach ($sessions as $session)
        {
            $patient = $session->patient;
            $note = $session->note;
        }
        
    
            return Inertia::render('User/Sessions/Index', ['sessions' => $sessions]);
    }
       
        return redirect()->route('dashboard');

    }

    public function delete($id)
    {  
        Session::findOrFail($id);
        Session::destroy($id);
        session()->flash('message', 'The session has been successfully deleted!');
    
        return redirect()->route('sessions');
    }

    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {  
        

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Session  $session
     * @return \Illuminate\Http\Response
     */
  

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Session  $session
     * @return \Illuminate\Http\Response
     */
    

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Session  $session
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Session $session)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Session  $session
     * @return \Illuminate\Http\Response
     */
    public function destroy(Session $session)
    {
        //
    }
}
