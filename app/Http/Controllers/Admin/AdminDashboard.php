<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Products;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AdminDashboard extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // return 'here';
        $users = User::count();

        $new_user = User::whereMonth('created_at', Carbon::now()->month())->count();

        $products = Products::count();
        // return $products;

        // return $new_user;
        // return $users;
        return view('admin.dashboard.index', compact('users','new_user','products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
