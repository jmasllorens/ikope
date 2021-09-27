<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Inertia\Inertia;
use App\Models\Session;
use App\Models\Note;
use Illuminate\Support\Facades\Storage;

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
   
            $sessionsU = $user->sessions;
        return Inertia::render('User/Patients/Index', ['patients' => $patients, 'sessions' => $sessions, 'sessionsU' => $sessionsU, 'notes', $notes]); 
        
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

    public function create()

    {   $user = Auth::user();

        if ($user->isActive)
        {
        return Inertia::render('User/Patients/Create');}

        return redirect()->route('dashboard');
    

    }

    public function store(Request $request)
    {
        $user = Auth::user();
        $newPatient = request()->except('_token');

        Patient::create($newPatient);

        $patients = Patient::orderBy('name', 'asc')->where('user_id', $user->id)->get();
    
        return redirect()->route('patients');
    }

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

    public function update(Request $request, $id)
    {
        $changesPatient = request()->except(['_token', '_method']);
    
            Session::where('patient_id', $id)->update(array('patient_name' => 'name', 'patient_name' => $changesPatient['name']));
            
            Patient::where('id', '=', $id)->update($changesPatient);
          
           
            $patient = Patient::findOrFail($id);
            return redirect()->route('patients');
          
        }
    
    public function delete($id)
    {
        Patient::destroy($id);
    
        return redirect()->route('patients');
    }


    public function getSessions($id)
    {
        $user = Auth::user();
        if($user->isActive == true)
        {
        $patient = Patient::find($id);
        if ( $patient == null)
        {
            return redirect()->route('patients', [$patient->id]);
        }
        $sessions = $patient->sessions;
      
    
        if ($sessions->count() == 0 )
        {   
            return redirect()->route('sessions_create', ['id' => $patient->id]);
        }

        $notes = $patient->notes;
    

        if ($notes->count() == 0)
        { return Inertia::render('User/Patients/Sessions', ['id' => $patient->id, 'patient', $patient, 'sessions' => $patient->sessions]);}
      
        return Inertia::render('User/Patients/Sessions', ['id' => $patient->id, 'patient' => $patient, 'sessions' => $patient->sessions, 'notes' => $notes]);}
        
        else {return redirect()->route('dashboard');}

    }
  

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    
     

    

    public function showSession($id, $sId)
    {
        $user = Auth::user();
        if($user->isActive == true)
        {
        $patient = Patient::find($id);
        if ( $patient == null)
        {
            return redirect()->route('patients', ['user' => $user->id]);
        }

        $session = Session::find($sId);
        if ( $session == null)
        {
            return redirect()->route('patients_sessions', $id);
        }
       
        $note = $session->note;
        if ( $note == null)
        {
            return Inertia::render('User/Sessions/Show', ['patient' => $patient, 'session' => $session]);
        }
 
       
  
        return Inertia::render('User/Sessions/Show', ['patient' => $patient, 'session' => $session, 'note', $note]);}
        
        else {return redirect()->route('dashboard');}

    }

    public function editSession($id, $sId)
    {
         
        $user = Auth::user();
        if ($user->isActive == true && $user->isAdmin == false)
        {
        $patient = Patient::findOrFail($id);
        $session = Session::findOrFail($sId);
        return Inertia::render('User/Sessions/Edit', ['patient' => $patient, 'session' => $session]);
        }
        return redirect()->route('dashboard');

   
    }

    public function updateSession(Request $request, $id, $sId)
    {
        $changesSession = request()->except(['_token', '_method']);
    
            Session::where('id', '=', $sId)->update($changesSession);
          
           
            $patient = Patient::findOrFail($id);
            $session = Session::findOrFail($sId);
            return redirect()->route('patients_sessions', ['id' => $id, 'session' => $session]);
          
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
                return Inertia::render('User/Sessions/Create', ['patient' => $patient]);
            }
          
            return Inertia::render('User/Sessions/Create', ['patient' => $patient, 'sessions', $sessions]);
    }

    public function storeSession(Request $request, $id)
    {
        $user = Auth::user();
        $patient = Patient::find($id);

        
        $newSession = request()->except('_token');

        $newSession['user_id'] = $user->id;
        $newSession['patient_id'] = $patient->id;
        $newSession['patient_name'] = $patient->name;
      

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
                    return Inertia::render('User/Sessions/Create', ['patient', $patient]);
            }

            $session = Session::find($sId);
            $note = $session->note;
            if ($note == null)
            {
                return Inertia::render('User/Sessions/CreateNote', ['patient' => $patient, 'session' => $session]);
            }
          
            return Inertia::render('User/Sessions/Show', ['patient' => $patient, 'session' => $session]);
    }

    public function storeNote(Request $request, $id, $sId)
    {
        $user = Auth::user();
        $patient = Patient::find($id);
        $session = Session::find($sId);

        
        $newNote = request()->except('_token');

        $newNote['user_id'] = $user->id;
        $newNote['patient_id'] = $patient->id;
        $newNote['session_id'] = $session->id;
      
        Note::create($newNote);
   
        $note = Note::all()->where('user_id', $user->id, 'patient_id', $patient->id, 'session_id', $session->id);
    
        return redirect()->route('sessions_show', [$patient->id, $session->id]);
    }

    public function editNote($id, $sId, $nId)
    {   
            $user = Auth::user();
            if ($user->isActive == true && $user->isAdmin == false)
            {
            $patient = Patient::findOrFail($id);
            $session = Session::findOrFail($sId);
            $note = Note::findOrFail($nId);
            return Inertia::render('User/Sessions/EditNote', ['patient' => $patient, 'session' => $session, 'note' => $note]);
            }
            return redirect()->route('dashboard');
    
    }

    public function updateNote($id, $sId, $nId)
    {
        $changesNote = request()->except(['_token', '_method']);
    
            Note::where('id', '=', $nId)->update($changesNote);
          
            $patient = Patient::findOrFail($id);
            $session = Session::findOrFail($sId);
            $note = Note::findOrFail($nId);
            return redirect()->route('patients_sessions', ['id' => $id, 'session' => $session, 'note' => $note]);
          
        }

        public function deleteSessions($id)
        {  
            $session = Session::findOrFail($id);
            $patient = $session->patient;
            Session::destroy($id);
        
            return redirect()->route('patients_sessions', ['id' => $patient->id]);
        }

        public function deleteNotes($id)

        {  
            $note = Note::findOrFail($id);
            $patient = $note->patient;
            $session = $note->session;
            Note::destroy($id);
        
            return redirect()->route('sessions_show', ['id' => $patient->id, 'sId' => $session->id]);
        }
        

       

    

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Patient  $patient
     * @return \Illuminate\Http\Response
     */
   

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Patient  $patient
     * @return \Illuminate\Http\Response
     */
   

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
