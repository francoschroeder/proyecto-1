<?php

namespace Cinefilo\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function edit() {
    	$user = auth()->user();
    	if ($user==null)
    		return view('auth.login');

    	return view('user.editprofile');
    }

    public function update() {
    	$user = auth()->user();

    	$user->name = request('name');
    	$user->gender = request('gender');
    	$user->about = request('about');

    	$user->save();

    	return view('user.editprofile');
    }

    public function changePassword() {
        return view('user.changepassword');
    }

    public function updatePassword() {
        $user = auth()->user();

        if ($user == null)
            return view('auth.login');

        $user->password = Hash::make(request('pass'));
        $user->save();

        return redirect('/');
    }
}