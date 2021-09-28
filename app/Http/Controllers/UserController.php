<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class UserController extends Controller
{
    
    public function index()
    {   $user = Auth::user();
        if ($user->isAdmin)
        {
            $users = User::orderByDesc('id')->where('isAdmin', false)->paginate(20);
            return Inertia::render('Admin/Users', ['users' => $users]);
        }
            return redirect()->route('dashboard');
    }
    
    
    public function update($id) 
    {
        $changesUser = request()->except(['_token', '_method']);
        User::where('id', '=', $id)->update($changesUser);
        $seminar = User::findOrFail($id);
       
        return redirect()->route('dashboard');
    }

   


}
