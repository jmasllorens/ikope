<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Contracts\UserRepositoryInterface;
use App\Repositories\UserRepository;
use Illuminate\Support\Facades\Mail;

class UserController extends Controller
{   
    private $userRepository;


    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function indexAdmins()

    {   
        $user = Auth::user();

        if ($user->isAdmin)
        {
            $startTime = microtime(true);

            $admins = $this->userRepository->all();
    
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
        return redirect()->route('users_admin');  
        }
        return redirect()->route('dashboard');
    } 

  

    
    
    public function index(Request $request)
    {   $user = Auth::user();
        if ($user->isAdmin)
        {
            $users = User::orderByDesc('id')->where('isAdmin', false)->when($request->term, function($query, $term){
                $query->where('name', 'LIKE', '%'. $term .'%');
            })->paginate(20);

            return Inertia::render('Admin/Users', ['users' => $users]);
        }
            return redirect()->route('dashboard');
    }
    
    
    public function update($id) 
    {
        $changesUser = request()->except(['_token', '_method']);
        User::where('id', '=', $id)->update($changesUser);
        $user = User::findOrFail($id);
        session()->flash('message', 'Your profile has been successfully updated!');
       
        return redirect()->route('dashboard');
    }

    public function delete($id)
    { 
        User::destroy($id);
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
    
        Mail::raw('Message: '.$request->message.'.', function ($m) {

        $user = Auth::user();
            
        $m->from($user->email, $user->name);

        $m->to('ikope@ikope.com', 'I-KOPE')->subject($user->name.' sent you a new message');
        });

        session()->flash('message', 'Your message has been successfully sent!');
    
       return redirect()->route('dashboard');

    }

   


}
