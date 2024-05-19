<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use App\Models\ContactInfo;
use Illuminate\Http\Request;

class ContactAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = ContactInfo::all();
        return view('admin.contact.info', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.contact.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = ContactInfo::create([
            'address' => $request->name,
            'number' => $request->number,
            'email' => $request->email
        ]);

        return redirect()->back();
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
        $datas = ContactInfo::where('id', $id)->get();

        return view('admin.contact.edit', compact('datas'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // return 'here';
        $update_info = ContactInfo::Where('id', $id)->update([
            'address' => $request->address,
            'number' => $request->number,
            'email' => $request->email
        ]);

        return redirect()->back()->with('message', 'Details Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }


    public function contactdetails(){
        // return 'here';

        $data = Contact::all();

        return view('admin.contact.contact_user_list', compact('data'));
    }
}
