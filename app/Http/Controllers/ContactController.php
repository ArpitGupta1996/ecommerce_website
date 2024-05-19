<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\ContactInfo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\MailContact;


class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = ContactInfo::get();
        // return $data;
        return view('contact', compact('data'));
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
        // return $request;
        // $request->validate([
        //     'name' => 'required|string',
        //     'email' => 'required|email',
        //     'subject' => 'required|string',
        //     'message' => 'required|string',
        // ]);

        // $data = Contact::create([
        //     'name' => $request->name,
        //     'email' => $request->email,
        //     'subject' =>  $request->subject,
        //     'message' => $request->message
        // ]);

        $validatedData = $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'subject' => 'required|string',
            'message' => 'required|string',
        ]);
        // return $request;
        // Create the Contact
        $data = Contact::create($validatedData);

        Mail::to('arpitgupta19aug1996@gmail.com')->send(new MailContact($data));


        return redirect()->back()->with('success', 'Your details send to admin');
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
