<?php

namespace App\Http\Controllers;

use App\Mail\ContactMail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class ContactController extends Controller
{
    public function contactView(){
        if (Auth::user()) {
            return redirect('/');
        }
        return view('contact');
    }

    public function sendContact(Request $request){
        $params = $request->all();
        $user = $params;
        $user['role'] = "User";
        $user['password'] = Hash::make(Str::random(8));
        User::create($user);
        Mail::to('admin@admin.com')->send(new ContactMail($params));
        return back();
    }
}
