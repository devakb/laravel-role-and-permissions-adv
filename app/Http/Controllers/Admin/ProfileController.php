<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index(){
        return view('admin.profile', ['user' => auth()->user()]);
    }

    public function update(Request $request){

        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,'.auth()->id(),
            'password' => 'nullable|confirmed'
        ]);


        User::query()
        ->whereId(auth()->id())
        ->update($request->only(['name','email','password']));

        return redirectRoute('admin.profile');
    }
}
