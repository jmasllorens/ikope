<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Contracts\UserRepositoryInterface;
use App\Repositories\UserRepository;
use Illuminate\Support\Facades\Mail;
use App\Cache\UserCache;

class UserController extends Controller
{   
    private $userRepository;


    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function indexAdmins()

    {   
        $user = Auth::user();

        if ($user->isAdmin)
        {
            $startTime = microtime(true);

            $admins = $this->userRepository->allAdmins();
    
            $sendTime = microtime(true);
    
          /*   dump($sendTime-$startTime);  */
          return Inertia::render('Admin/AdminUsers', ['users' => $admins]);
        }

        return redirect()->route('dashboard');
    }

    public function getAdmin(int $id)
    {    $admin = Auth::user();

        if ($admin->isAdmin)
        {
        $user = $this->userRepository->get($id);
        return response()->json($user); 
        }
        return redirect()->route('dashboard');
    }

    public function destroyAdmin(User $user)
    {    $admin = Auth::user();
        if ($admin->isAdmin && $admin != $user)
        {
        $user = $this->userRepository->delete($user);
      /*   return response()->json($user);  */
      session()->flash('message', 'The admin has been successfully deleted!');
        return redirect()->route('users_admin');  
        }
        return redirect()->route('dashboard');
    } 
  
    
    public function index(Request $request)
    {   $user = Auth::user();
        if ($user->isAdmin)
        {
            $users = $this->userRepository->allUsers($request);

            return Inertia::render('Admin/Users', ['users' => $users]);
        }
            return redirect()->route('dashboard');
    }

    public function show($id)
    {
        $admin = Auth::user();
        if ($admin->isAdmin)
        {
            $user = $this->userRepository->get($id);
            return response()->json($user); 
        }
        return redirect()->route('dashboard');
    }
    
    
    public function update(Request $request, User $user) 
    {
       
        $user->fill($request->all());
        $user = $this->userRepository->save($user);

        session()->flash('message', 'Your profile has been successfully updated!');
       
        return redirect()->route('dashboard');
    }

    public function delete(User $user)
    { 
        $user = $this->userRepository->delete($user);

        session()->flash('message', 'The user has been successfully deleted!');
        return redirect()->route('users');
    }

    public function deleteAll()
    { 
        $users = User::orderByDesc('id')->where('isAdmin', false)->get();
        User::destroy($users);

        session()->flash('message', 'All users have been successfully deleted!');
        return redirect()->route('users');
    }


    public function contactMail(Request $request)
    {
    
        $this->userRepository->mailConfirm($request);
        session()->flash('message', 'Your message has been successfully sent. We will contact you ASAP.');
        
        return redirect()->route('dashboard');

    }

   


}
