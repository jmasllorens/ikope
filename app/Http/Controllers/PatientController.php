<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

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
        $patients = $user->patients;
        if ($user->isActive == true)
        {
   
            foreach($patients as $patient)
            {
                $sessions = $patient->sessions;
                $notes = $patient->notes;
        
            }  
                return Inertia::render('Patients', ['patients' => $patients, 'sessions' => $sessions, 'notes' => $notes]); 
        }

        return;
    }

    public function show($id) 
    {   

        $user = Auth::user();
        if($user->isActive == true)
        {
        $patient = Patient::find($id);
        $sessions = $patient->sessions;
        $notes = $patient->notes;
  
        return Inertia::render('Patient', ['patient' => $patient, 'sessions' => $sessions, 'notes', $notes]);}
        return;
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
