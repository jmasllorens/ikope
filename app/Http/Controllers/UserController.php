<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class UserController extends Controller
{
    
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
        $seminar = User::findOrFail($id);
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

   


}
