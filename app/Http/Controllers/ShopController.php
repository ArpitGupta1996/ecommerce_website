<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ShopController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // return 'here';
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


    public function category(Request $request){
        return view('shop.category');
    }

    public function productdetail(Request $request){
        return view('shop.productdetail');
    }


    public function productcheckout(Request $request){
        return view('shop.checkout');
    }

    public function shoppingcart(Request $request){
        return view('shop.shoppingcart');
    }

    public function shopconfirmation(Request $request){
        return view('shop.confirmation');
    }
}
