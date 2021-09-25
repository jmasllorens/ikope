<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Inertia\Inertia;
use App\Models\Session;

class PatientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        
        if ($user->isActive == 1)
        {   
            $patients = Patient::orderBy('name', 'asc')->where('user_id', $user->id)->get();
           
           if ($patients->count() == 0 || $patients == null)
            { 
                return Inertia::render('User/Patients/Create');
            } 

            foreach ($patients as $patient)
            {
                $sessions = $patient->sessions;
                $notes = $patient->notes;
                
            }
   
    
        return Inertia::render('User/Patients/Index', ['patients' => $patients, 'sessions' => $sessions], 'notes', $notes); 
        
        }

        return redirect()->route('dashboard');
    }

    public function show($id) 
    {   

        $user = Auth::user();
        if($user->isActive == 1)
        {
        $patient = Patient::find($id);
        if ( $patient == null)
        {
            return redirect()->route('patients');
        }
       
        $sessions = $patient->sessions;
       
     
        $notes = $patient->notes;
  
        return Inertia::render('User/Patients/Show', ['patient' => $patient, 'sessions' => $sessions, 'notes', $notes]);}

        else {return redirect()->route('dashboard');}
    }

    public function getSessions($id)
    {
        $user = Auth::user();
        if($user->isActive == true)
        {
        $patient = Patient::find($id);
        if ( $patient == null)
        {
            return redirect()->route('patients');
        }
        $sessions = $patient->sessions;

        $notes = $patient->notes;
   
        if ($sessions->count() == 0)
        {
            return redirect()->route('sessions_create');
        }
      
        return Inertia::render('User/Patients/Sessions', ['patient' => $patient, 'sessions' => $sessions, 'notes', $notes]);}
        else {return redirect()->route('dashboard');}

    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()

    {   $user = Auth::user();

        if ($user->isActive)
        {
        return Inertia::render('User/Patients/Create');}

        return redirect()->route('dashboard');
    

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
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Patient  $patient
     * @return \Illuminate\Http\Response
     */
    public function edit(Patient $patient)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Patient  $patient
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Patient $patient)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Patient  $patient
     * @return \Illuminate\Http\Response
     */
    public function destroy(Patient $patient)
    {
        //
    }
}
