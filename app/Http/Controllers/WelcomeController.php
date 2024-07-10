<?php

namespace App\Http\Controllers;

use App\Models\AboutUs;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function index(){
        // return view('welcome');

        $data = AboutUs::first();

        // return $data->body;

        // return view('layouts.footer', compact('data'));

        return view('welcome', compact('data'));
    }


    
}
