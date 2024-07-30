<?php

namespace App\Http\Controllers;

use App\Models\AboutUs;
use App\Models\FrontPageImage;
use App\Models\Products;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function index(){
        // return view('welcome');

        $data = AboutUs::first();

        // return $data->body;

        // return view('layouts.footer', compact('data'));

        $latest_products = Products::orderBy('id','desc')->take(8)->get();

        // return $latest_products;

        $front_image = FrontPageImage::all();

        // return $front_image;

        return view('welcome', compact('data','latest_products', 'front_image'));
    }


}
