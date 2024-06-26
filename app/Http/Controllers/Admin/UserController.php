<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Imports\UsersImport;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Maatwebsite\Excel\Facades\Excel;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = User::orderBy('id', 'desc')->get();

        // return $data;

        return view('admin.user.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.user.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // return 'here';
        // return $request;
        $validator = Validator::make($request->all(), [
            'name' => 'required|string',
            'email' => 'required|email|unique:users,email',
            'address' => 'required',
            'password' => 'required|string|min:8',
            'c_password' => 'required|string|min:8|same:password',
            'role' => ['required', Rule::in(['1', '2'])],
            'number' => 'numeric | required | unique:users,number'
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator) // Pass validation errors to the view
                ->withInput(); // Pass old input data back to the view
        } else {

            User::create([
                'name' => $request->name,
                'email' => $request->email,
                'address' => $request->address,
                'password' => Hash::make($request->password),
                'user_type' => $request->role,
                'number' => $request->number,
                'remember_token' => Hash::make($request->email)
            ]);
        }

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = User::where('id', $id)->get();

        return view('admin.user.show', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = User::where('id', $id)->get();

        // return $data;

        return view('admin.user.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = User::where('id', $id)->update([
            'name' => $request->name,
            'password' => Hash::make($request->password),
            'number' => $request->number
        ]);

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = User::where('id', $id)->delete();

        return redirect()->back();
    }

    public function import(Request $request)
    {
        // $request->validate([
        //     'file' => 'required|mimes:xlsx,csv'
        // ]);

        Excel::import(new UsersImport, $request->file('file'));

        return back()->with('success', 'All good!');
    }

    public function profile(Request $request)
    {
        // return 'here';

        // return Auth::id();

        $user = Auth::id();

        // return $user;

        $data = User::where('id', $user)->first();

        // return $data;
        return view('admin.user.profile', compact('data'));
    }
}
