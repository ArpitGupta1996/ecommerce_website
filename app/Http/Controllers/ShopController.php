<?php

namespace App\Http\Controllers;

use App\Models\Products;
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


    public function category(Request $request)
    {
        // $products = Products::all();
        $products = Products::orderBy('id', 'desc')->paginate(5);
        // return $products;
        return view('shop.category', compact('products'));
    }

    public function productdetail(Request $request, $id)
    {

        // return 'here';
        // return $id;
        $data = Products::where('id', $id)->first();
        // $data = Products::findOrFail($id);
        // return $data;
        return view('shop.productdetail', compact('data'));
    }


    public function productcheckout(Request $request)
    {
        return view('shop.checkout');
    }

    public function shoppingcart(Request $request)
    {
        return view('shop.shoppingcart');
    }

    public function shopconfirmation(Request $request)
    {
        return view('shop.confirmation');
    }

    ###from here I started the add to cart functionality
    public function addToCart(Request $request, $id)
    {
        // return 'here';die;
        $data = Products::findOrFail($id);
        // dd($data);
        $cart = session()->get('cart', []);
        // console.log('djhxshxsd');
        if (isset($cart[$id])) {
            $cart[$id]['quantity']++;
        } else {
            $cart[$id] = [
                'name' => $data->name,
                'quantity' => 1,
                'price' => $data->price,
                'image' => $data->image
            ];
        }

        session()->put('cart', $cart);
        return redirect()->back()->with('success', 'Product added to cart successfully!');
    }

    public function updatecart(Request $request){
        if($request->id && $request->quantity){
            $cart = session()->get('cart');
            $cart[$request->id]['quantity'] = $request->quantity;
            session()->put('cart', $cart);
            session()->flash('success', 'Cart updated successfully');
        }
    }
}
