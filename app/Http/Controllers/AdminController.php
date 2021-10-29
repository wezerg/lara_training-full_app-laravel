<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;
use App\Mail\ValideMail;
use App\Models\Category;
use App\Models\Type;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function dashboardView(){
        if (Auth::user() && Auth::user()->role === "Admin") {
            $category = Category::all();
            $type = Type::all();
            $usersActive = User::all()->where('role', '!=', 'Admin')->where('activate', '=', true);
            $usersInactive = User::all()->where('role', '!=', 'Admin')->where('activate' , '=', false);
            return view('dashboard', compact(['usersActive', 'usersInactive', 'category', 'type']));
        } else {
            return redirect('/');
        }
    }

    public function validUser($id){
        $user = User::find($id);
        $pass = Str::random('8');
        $email = [
            "name" => $user->name, 
            "firstname" => $user->name,
            "password" => $pass
        ];
        $user->update([
            "password" => Hash::make($pass), 
            "activate" => 1
        ]);
        Mail::to($user->email)->send(new ValideMail($email));
        return back();
    }

}