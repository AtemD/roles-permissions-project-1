<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Role;
use App\Http\Controllers\Controller;
use App\Models\Permission;

class AdminPermissionsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth'); // You can also have a role or permission middleware here.
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $permissions = Permission::with([
            'roles' => function ($query) {
                $query->orderBy('name', 'asc');
            }
        ])->orderBy('name', 'asc')->paginate(30);

        $roles = Role::all();

        return view('dashboard/admin/permissions/index', compact(
            'permissions',
            'roles'
        ));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::all();

        return view('dashboard/admin/permissions/create', compact(
            'roles'
        ));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'roles' => 'required'
        ]);

        $permission = Permission::create([
            'name' => $request->name
        ]);

        $permission->roles()->sync($request->roles);

        return redirect()->route('admin.permissions.index')->with('success', 'Permission: ' . $permission->name. ' Created Successfully');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Permission $permission
     * @return \Illuminate\Http\Response
     */
    public function edit(Permission $permission)
    {
        $permission = $permission->load('roles');
        $roles = Role::all();

        return view('dashboard/admin/permissions/edit', compact(
            'permission',
            'roles'
        ));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Permission $permission
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Permission $permission)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'roles' => 'nullable'
        ]);

        $permission->update([
            'name' => $request->name,
        ]);
        
        $permission->roles()->sync($request->roles);

        return redirect()->route('admin.permissions.index')->with('success', 'Permission: ' . $permission->name. ' Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Permission $permission
     * @return \Illuminate\Http\Response
     */
    public function destroy(Permission $permission)
    {
        $permission->delete();

        return redirect()->route('admin.permissions.index')->with('success', 'Permission: ' . $permission->name. ' Deleted Successfully');
    }
}
