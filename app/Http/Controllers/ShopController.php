<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\CartItem;
use App\Models\ProductReview;
use App\Models\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        $products = Products::orderBy('id', 'desc')->paginate(6);
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
        // return Auth::id();

        if (Auth::user()) {
            $user_id = Auth::id();

            // return $user_id;

            $cart = Cart::where('user_id', $user_id)
                ->with(['items.product'])
                ->first();

            // return $cart;

            // return $cart->items['0']['product']['name'];

            if (!$cart) {
                return response()->json(['message' => 'No order Yet !!'], 404);
            }

            //above one is incorrect
            // foreach ($cart as $c) { incorrect ones
            //     return $c->items['0']['product']['name'];
            // }

            //below one is correct
            // foreach ($cart->items as $item) {
            //     // You can access the product name here
            //     echo $item->product->name;
            // }





            return view('shop.shoppingcart', compact('cart'));
        } else {
            return view('shop.shoppingcart');
        }
    }

    public function shopconfirmation(Request $request)
    {
        return view('shop.confirmation');
    }

    ###from here I started the add to cart functionality
    public function addToCartold(Request $request, $id)
    {
        // return 'here';die;
        $data = Products::findOrFail($id);
        $cart = session()->get('cart', []);
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

    public function addToCart(Request $request, $id)
    {
        // return 'here';die;

        if (Auth::user()) {
            $data = Products::findOrFail($id);
            $user = Auth::user();

            // return $user->id;

            $cart = Cart::firstOrCreate(
                [
                    // 'user_id' => $user->id
                    'user_id' => $user->id
                ],
                [
                    'created_at' => now(),
                    'updated_at' => now()
                ]
            );

            $cartItem = CartItem::where('cart_id', $cart->id)->where('product_id', $id)->first();

            if ($cartItem) {
                $cartItem->quantity += 1;
                $cartItem->save();
            } else {
                CartItem::create([
                    'cart_id' => $cart->id,
                    'product_id' => $data->id,
                    'quantity' => 1,
                    'price' => $data->price,
                ]);
            }


            return redirect()->back()->with('success', 'Product added to cart successfully!');
        } else {
            return redirect()->route('login');
        }
    }

    public function updatecart(Request $request)
    {
        if ($request->id && $request->quantity) {
            $cart = session()->get('cart');
            $cart[$request->id]['quantity'] = $request->quantity;
            session()->put('cart', $cart);
            session()->flash('success', 'Cart updated successfully');
        }
    }


    #review functionality starts from here
    public function review(Request $request, $id)
    {

        // return 'hedj';

        // return $id;
        if (Auth::user()) {
            $data = Products::where('id', $id)->first();

            // return $data;
            // return $request;

            $data = ProductReview::create([
                'user_id' => Auth::id(),
                'product_id' => $data->id,
                'name' => $request->name,
                'email' => $request->email,
                'number' => $request->number,
                'message' => $request->message
            ]);
        } else {
            return redirect()->back()->with('message', 'Kindly login first');
        }

        return redirect()->back();
    }
}
