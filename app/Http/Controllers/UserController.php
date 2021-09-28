<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class UserController extends Controller
{
    public function update($id) 
    {
        $changesUser = request()->except(['_token', '_method']);
        User::where('id', '=', $id)->update($changesUser);
        $seminar = User::findOrFail($id);
       
        return redirect()->route('dashboard');
    }

   


}
