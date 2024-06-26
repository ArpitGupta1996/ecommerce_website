<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use DB;

class RoleController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:role-list|role-create|role-edit|role-delete', ['only' => ['index', 'store']]);

        $this->middleware('permission:role-create', ['only' => ['create', 'store']]);

        $this->middleware('permission:role-edit', ['only' => ['edit', 'update']]);

        $this->middleware('permission:role-delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $role = Role::orderBy('id', 'desc')->paginate(5);

        // return $role;

        return view('admin.roles.index', compact('role'))->with('i', ($request->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $permission = Permission::get();
        // echo "<pre>"; print_r($permission);die;

        return view('admin.roles.create', compact('permission'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|unique:roles,name',
            'permission' => 'required'
        ]);

        $role = Role::create(['name' => $request->input('name')]);

        $role->syncPermissions($request->input('permission'));

        return redirect()->route('roles.index')->with('success', 'Role Created SUccessfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $role = Role::find($id);

        $rolePermissions = Permission::join('role_has_permission', 'role_has_permissions.permission_id', '=', 'permissions.id')
            ->where('role_has_permission.role_id', $id)
            ->get();

        // return $rolePermissions;

        return view('roles.show', compact('role', 'rolePermissions'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $role = Role::find($id);

        $permission = Permission::get();

        $rolePermissions = DB::table("role_has_permissions")->where("role_has_permissions.role_id", $id)

            ->pluck('role_has_permissions.permission_id', 'role_has_permissions.permission_id')

            ->all();

        return view('roles.edit', compact('role', 'permission', 'rolePermissions'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->validate($request, [

            'name' => 'required',

            'permission' => 'required',

        ]);



        $role = Role::find($id);

        $role->name = $request->input('name');

        $role->save();



        $role->syncPermissions($request->input('permission'));



        return redirect()->route('roles.index')

            ->with('success', 'Role updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Roles::where('id', $id)->delete();

        return redirect()->route('roles.index')

            ->with('success', 'Role deleted successfully');
    }
}
