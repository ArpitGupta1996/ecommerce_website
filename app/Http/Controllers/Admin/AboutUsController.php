<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AboutUs;
use Illuminate\Http\Request;

class AboutUsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // return 'here';
        $data = AboutUs::all();
        return view('admin.aboutus.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.aboutus.create');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // return $request;
        $data = AboutUs::create([
            'body' =>  $request->editorContent,
        ]);

        return redirect('admin/aboutus');
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
        $post_edit = AboutUs::where('id', $id)->first();

        // return $post_edit;

        return view('admin.aboutus.edit', compact('post_edit'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        // return $request;
        $post_update = AboutUs::where('id', $id)->update([
            'body' => $request->editorContent
        ]);

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function getaboutus(Request $request){
        // dd('here');
        $about_us = AboutUs::all();
        // dd($about_us);

        return view('layouts.footer', compact('about_us'));
    }
}
