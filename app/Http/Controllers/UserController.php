<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserUpdateRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function removeUser($id){
        $user = User::find($id);
        $user->delete();
        return back();
    }

    public function profileView(){
        $user = User::find(Auth::user()->id);
        return view('users.profile', compact('user'));
    }

    public function editUser(UserUpdateRequest $request){
        $user = User::find(Auth::user()->id);
        $params = $request->validated();
        if ($params['password']) {
            $params['password'] = Hash::make($params['password']);
        }
        else{
            $params['password'] = $user->password;
        }
        $user->update($params);
        return back();
    }
}
