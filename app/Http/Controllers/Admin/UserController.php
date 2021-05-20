<?php

namespace App\Http\Controllers\Admin;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;
use App\Http\Requests\StoreUserRequest;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\UpdateUserRequest;

class UserController extends Controller
{

    public function show(User $user)
    {
        abort_if(Gate::denies('user_can_read'), 403);

        return view('admin.users.show', compact('user'));
    }


    public function create()
    {
        abort_if(Gate::denies('user_can_create'), 403);

        return view('admin.users.create')->with(['roles' => Role::pluck('name', 'id')]);
    }

    public function store(StoreUserRequest $request)
    {
        User::create($request->validated() + ['approved' => 1]);
        return redirectRoute('admin.users.index');
    }

    public function edit(User $user)
    {
        abort_if(Gate::denies('user_can_update'), 403);

        return view('admin.users.edit', compact('user'))->with(['roles' => Role::pluck('name', 'id')]);
    }


    public function update(User $user, UpdateUserRequest $request)
    {
        $user->update($request->validated());
        return redirectRoute('admin.users.show', $user->id);
    }


    public function destroy(User $user)
    {
        abort_if(Gate::denies('user_can_delete') || $user->id != auth()->id(), 403);

        $user->delete();
        return redirectRoute('admin.users.index');
    }

    public function export()
    {
        abort_if(Gate::denies('user_can_read'), 403);
        return \PDF::loadView('admin.users.export',['users' => User::orderby('id')->get()])->setPaper('A4', 'landscape')->setOptions(['setEncryption' => ['copy'], 'isPhpEnabled' => true, 'defaultFont' => 'sans-serif'])->stream();
    }

    public function updateApprovalStatus(User $user){

        abort_if(Gate::denies('user_can_approve'), 403);

        if($user->approved){
            $user->approved = 0;
            Session::flash('showInfoMessage', 'The user is marked as not approved.');
        }else{
            $user->approved = 1;
            Session::flash('showInfoMessage', 'The user is marked as approved.');
        }
        $user->save();

        return back();
    }
}
