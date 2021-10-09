<?php

namespace App\Http\Controllers;

use App\Models\Session;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Facades\Auth;
use App\Models\Patient;
use App\Repositories\SessionRepository;


class SessionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    private $sessionRepository;
    
    public function __construct(SessionRepository $sessionRepository)
    {
        $this->sessionRepository = $sessionRepository;

    }


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

        $sessions = $this->sessionRepository->all();

        if ($sessions->count() == 0)
        {  
            return redirect()->route('patients');
        }

        foreach ($sessions as $session)
        {
            $patient = $session->patient;
            $note = $session->note;
           
        }
            return Inertia::render('User/Sessions/Index', ['sessions' => $sessions, 'note' => $note]);
    
            
    }
       
        return redirect()->route('dashboard');

    }

    public function delete(Session $session)
    {  
        $session = $this->sessionRepository->delete($session);
        session()->flash('message', 'The session has been successfully deleted!');
    
        return redirect()->route('sessions', $session);
    }

    public function edit($id)
    {
        $user = Auth::user();
        if ($user->isActive == true && $user->isAdmin == false)
        {
      
        $session = Session::findOrFail($id);
        return Inertia::render('User/Sessions/EditS', [ 'session' => $session, 'id' => $id]);
        }
        return redirect()->route('dashboard');
    }

    public function update(Request $request, Session $session)
    {
       
        $session->fill($request->all());
        
        $session = $this->sessionRepository->save($session);
    
        session()->flash('message', 'The session has been successfully updated!');
        return redirect()->route('sessions', ['id' => $session->id]);
              
            
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
