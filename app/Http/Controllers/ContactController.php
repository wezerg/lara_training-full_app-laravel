<?php

namespace App\Http\Controllers;

use App\Mail\ContactMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function contactView(){
        return view('contact');
    }

    public function sendContact(Request $request){
        $params = $request->all();
        Mail::to('admin@admin.com')->send(new ContactMail($params));
        return back();
    }

    public function validUser(){
        // Modification a faire en bdd sur l'utilisateur
        // Faire booléen pour vérifier si l'utilisateur est valide
        dd('Ez');
    }
}
