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
            return redirect()->route('sessions_create', ['id' => $patient->id]);
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
        $user = Auth::user();
        $newPatient = request()->except('_token');

        if($request->hasFile('image'))
    {
        $newPatient['image']=$request->file('image')->store('images', 'public');
    }
        $newPatient['user_id'] = $user->id;

        Patient::create($newPatient);


        $patients = Patient::orderBy('name', 'asc')->where('user_id', $user->id)->get();
    
        return redirect()->route('patients');
    }

    public function showSession($id, $sId)
    {
        $user = Auth::user();
        if($user->isActive == true)
        {
        $patient = Patient::find($id);
        if ( $patient == null)
        {
            return redirect()->route('patients');
        }

        $session = Session::find($sId);
        if ( $session == null)
        {
            return redirect()->route('patients_sessions');
        }
       
        $note = $session->note;
        if ( $note == null)
        {
            return Inertia::render('User/Sessions&Notes/Show', ['patient' => $patient, 'session' => $session]);
        }
 
       
  
        return Inertia::render('User/Sessions&Notes/Show', ['patient' => $patient, 'session' => $session, 'note', $note]);}
        
        else {return redirect()->route('dashboard');}

    }

    public function editSession($id, $sId)
    {
         
        $user = Auth::user();
        if ($user->isActive == true && $user->isAdmin == false)
        {
        $patient = Patient::findOrFail($id);
        $session = Session::findOrFail($sId);
        return Inertia::render('User/Sessions&Notes/Edit', ['patient' => $patient, 'session' => $session]);
        }
        return redirect()->route('dashboard');

   
    }

    public function createSession($id)
    {
         $user = Auth::user();
    
            if ($user->isAdmin)
            return redirect()->route('dashboard');
    
        
            if ($user->isActive && $user->patients->count() == 0)
            {  
                return Inertia::render('User/Patients/Create');}
      
            $patient = Patient::find($id);
            $sessions = $patient->sessions;
            if ($sessions == null)
            {
                return Inertia::render('User/Sessions&Notes/Create', ['patient' => $patient]);
            }
          
            return Inertia::render('User/Sessions&Notes/Create', ['patient' => $patient, 'sessions', $sessions]);
    }

    public function storeSession(Request $request, $id)
    {
        $user = Auth::user();
        $patient = Patient::find($id);

        
        $newSession = request()->except('_token');

        if($request->hasFile('image'))
    {
        $newSession['image']=$request->file('image')->store('images', 'public');
    }
        $newSession['user_id'] = $user->id;
        $newSession['patient_id'] = $patient->id;
      

        Session::create($newSession);


        $sessions = Session::orderBy('date', 'desc')->where('user_id', $user->id && 'patient_id', $patient->id)->get();
    
        return redirect()->route('patients_sessions', $patient->id);
    }

     public function createNote($id, $sId)
    {
         $user = Auth::user();
    
            if ($user->isAdmin)
            return redirect()->route('dashboard');
    
        
            if ($user->isActive && $user->patients->count() == 0)
            {  
                return Inertia::render('User/Patients/Create');}

        
            $patient = Patient::find($id);
            if ($user->isActive && $patient->sessions->count() == 0)
            {
                    return Inertia::render('User/Sessions&Notes/Create', ['patient', $patient]);
            }

            $session = Session::find($sId);
            $note = $session->note;
            if ($note == null)
            {
                return Inertia::render('User/Sessions&Notes/CreateNote', ['patient' => $patient, 'session' => $session]);
            }
          
            return Inertia::render('User/Sessions&Notes/Show', ['patient' => $patient, 'session' => $session]);
    }


    

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Patient  $patient
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
          
            $user = Auth::user();
            if ($user->isActive == true && $user->isAdmin == false)
            {
            $patient = Patient::findOrFail($id);
            return Inertia::render('User/Patients/Edit', ['patient' => $patient]);
            }
            return redirect()->route('dashboard');
    
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
