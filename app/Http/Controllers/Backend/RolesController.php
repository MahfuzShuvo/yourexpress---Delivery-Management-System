<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\User;

class RolesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles = Role::all();
        return view('backend.pages.roles.index', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $permissions = Permission::all();
        $permissionGroup = User::getPermissionGroups();

        return view('backend.pages.roles.create', compact('permissions', 'permissionGroup'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // validation 
        $request->validate([
            'name' => 'required|max:100|unique:roles'
        ],[
            'name.required' => 'Please give a role name'
        ]);
        $role = Role::create(['name' => $request->name]);

        $permission = $request->permissions;

        if (!empty($permission)) {
            $role->syncPermissions($permission);
        }

        session()->flash('success', 'New roles created successfully');
        return redirect()->route('roles.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $role = Role::find($id);
        $all_permissions = Permission::all();
        $permissionGroup = User::getPermissionGroups();

        return view('backend.pages.roles.edit', compact('role', 'all_permissions', 'permissionGroup'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // validation 
        // $request->validate([
        //     'name' => 'required|max:100|unique:roles'
        // ],[
        //     'name.required' => 'Please give a role name'
        // ]);
        $role = Role::findById($id);

        $permission = $request->permissions;

        if (!empty($permission)) {
            $role->syncPermissions($permission);
        }
        $roles = Role::all();
        session()->flash('success', 'Role '.ucfirst($role->name).' updated successfully');
        return redirect()->route('roles.index', compact('roles'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $role = Role::findById($id);

        if (!is_null($role)) {
            $role->delete();
        }

        session()->flash('success', 'Role deleted successfully');
        return redirect()->back();
    }
}
