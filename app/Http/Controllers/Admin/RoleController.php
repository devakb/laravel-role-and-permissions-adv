<?php

namespace App\Http\Controllers\Admin;

use App\Models\Role;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreRoleRequest;
use App\Http\Requests\UpdateRoleRequest;
use App\Models\Permission;
use Illuminate\Support\Facades\Gate;

class RoleController extends Controller
{

    public function create()
    {
        abort_if(Gate::denies('role_can_create'), 403);

        return view('admin.roles.create')->with(['permissions' => Permission::all()]);
    }


    public function store(StoreRoleRequest $request)
    {
        $role = Role::create($request->validated());
        $role->permissions()->sync($request->permissions);
        return redirectRoute('admin.roles.index');
    }


    public function edit(Role $role)
    {
        abort_if(Gate::denies('role_can_update') || $role->id == 1, 403);

        return view('admin.roles.edit', compact('role'))->with(['permissions' => Permission::all()]);
    }


    public function update(UpdateRoleRequest $request, Role $role)
    {
        $role->update($request->validated());
        $role->permissions()->sync($request->permissions);

        return redirectRoute('admin.roles.index');
    }


    public function destroy(Role $role)
    {
        abort_if(Gate::denies('role_can_delete') || $role->id == 1 || $role->id == 2, 403);

        $role->delete();
        return redirectRoute('admin.roles.index');
    }
}
