<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Facades\Auth;
use App\Models\Seminar;
use App\Repositories\SeminarRepository;


class SeminarController extends Controller
{   
    private $seminarRepository;
    
    public function __construct(SeminarRepository $seminarRepository)
    {
        $this->seminarRepository = $seminarRepository;

    }
    public function index()
    {   $user = Auth::user();
    
        $seminars = $this->seminarRepository->all();
        $user->seminars;
     
        foreach($seminars as $seminar) 
        {
            $users = $seminar->users;    
        }

        if ($seminars->count() > 0)
        {
            return Inertia::render('Seminars/Index', ['seminars' => $seminars, 'users' => $users]);
        }
            return Inertia::render('Seminars/Index', ['seminars' => $seminars]);
    }

    public function show($id) 
    {
        $user = Auth::user();
        $seminar = $this->seminarRepository->get($id);

        if($seminar == null)
        {
            return redirect()->route('seminars');
        }

        $seminar->users;
        $isSubscribed = $seminar->isSubscribed($user->id);


        return Inertia::render('Seminars/Show', ['seminar' => $seminar, 'isSubscribed' => $isSubscribed]);
    }

    public function subscribers($id)
    {
        $user = Auth::user();

        if ($user->isAdmin)
        {
            $seminar = $this->seminarRepository->get($id);
            $users = $this->seminarRepository->users($seminar);
        
        return Inertia::render('Admin/Seminars/Subscribers', ['id' => $id, 'seminar' => $seminar, 'users' => $users]);
        }
        return redirect()->route('seminars');
    }

    public function subscribe($id)
    {
        $user = Auth::user();
        $seminar = $this->seminarRepository->get($id);

        if($seminar->isSubscribed($user->id) == false)
        {   
            $this->seminarRepository->addUser($seminar, $user);
            $this->sendEmail($id);
    
            session()->flash('message', 'Your application has been successfully submitted!');
     
            return redirect()->route('my_seminars');
        }
            return redirect()->route('my_seminars');
    }

    public function unsubscribe($id)
    {
        $user = Auth::user();
        $seminar = $this->seminarRepository->get($id);

        if($seminar->isSubscribed($user->id) == true)
        {
            $this->seminarRepository->removeUser($seminar, $user);
            $this->sendEmail($id);
    
            if(count($user->seminars) > 0)
            {
                session()->flash('message', 'Your application has been successfully cancelled!');
            
                return redirect()->route('my_seminars');
            }

            session()->flash('message', 'Your application has been successfully cancelled!');
            return redirect()->route('seminars');
        }
            return redirect()->route('my_seminars');
    }

    public function sendEmail($id)
    {   
  
        $seminar = $this->seminarRepository->get($id);
        $this->seminarRepository->mailConfirm($seminar);

    }
    

    public function mySeminars()
    {   
        $user = Auth::user();

        $mySeminars = $this->seminarRepository->userSeminars($user);

        if ($mySeminars->count() == 0)
        {
            return redirect()->route('seminars');
        }

        return Inertia::render('Seminars/MySeminars', ['mySeminars' => $mySeminars, 'user' => $user]);
    }

    public function create() 
    {
        $user = Auth::user();

        if ($user->isAdmin == true)
        {
        return Inertia::render('Admin/Seminars/Create');
        }
        return redirect()->route('dashboard');
    }

    public function store(Request $request)
    {
        $newSeminar = new Seminar($request->except('_token'));
        $newSeminar = $this->seminarRepository->save($newSeminar);

        session()->flash('message', 'A new seminar has been successfully created!');
    
        return redirect()->route('seminars');

    }

    public function edit($id)
    {   
        $user = Auth::user();
        
        if ($user->isAdmin == true)
        {
        $seminar = $this->seminarRepository->get($id);
        return Inertia::render('Admin/Seminars/Edit', ['seminar' => $seminar]);
        }
        return redirect()->route('dashboard');
    }

    public function update(Request $request, Seminar $seminar)
    {
      
        $seminar->fill($request->all());
        $seminar = $this->seminarRepository->save($seminar);
   
        session()->flash('message', 'The seminar has been successfully updated!');

        return redirect()->route('seminars');
          
        }
    
    public function destroy(Seminar $seminar)
    { 
        $seminar = $this->seminarRepository->delete($seminar);
        
        session()->flash('message', 'The seminar has been successfully deleted!');

        return redirect()->route('seminars');
    }

}
