<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Imports\ProductsImport;
use App\Models\Products;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class AdminProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Products::latest()->get();

        // return $data;

        return view('admin.product.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // return 'here';
        return view('admin.product.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // return $request;

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $image_name = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('products'), $image_name);
        }

        $data = Products::create([
            'name' => $request->name,
            'price' => $request->price,
            'product_code' => $request->product_code,
            'description' => $request->description,
            'width' => $request->width,
            'height' => $request->height,
            'depth' => $request->depth,
            'weight' => $request->weight,
            'quality_checking' => $request->quality_checking,
            'quantity' => $request->quantity,
            'color' => $request->color,
            'discount' => $request->discount,
            'image' => $image_name
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
        // return $id;

        $products = Products::where('id', $id)->get()->first();

        // return $products;

        return view('admin.product.edit', compact('products'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // $product_update = Products::where('id', $id)->update([
        //     'name' => $request->name,
        //     'price' => $request->price,
        //     'product_code' => $request->product_code,
        //     'description' => $request->description,
        //     'image' => $request->image,
        //     'width' => $request->Width,
        //     'height' => $request->height,
        //     'depth' => $request->depth,
        //     'weight' => $request->weight,
        //     'quality_checking' => $request->quality_checking,
        //     'quantity' => $request->quantity,
        //     'color' => $request->color,
        //     'discount' => $request->discount
        // ]);

        $data = [];
        if ($request->has('name')) {
            $data['name'] = $request->name;
        }
        if ($request->has('price')) {
            $data['price'] = $request->price;
        }
        if ($request->has('product_code')) {
            $data['product_code'] = $request->product_code;
        }
        if ($request->has('description')) {
            $data['description'] = $request->description;
        }
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $image_name = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('products'), $image_name);
            $data['image'] = $image_name; // Add the image name to the update data
        }

        if ($request->has('width')) {
            $data['width'] = $request->width;
        }
        if ($request->has('height')) {
            $data['height'] = $request->height;
        }
        if ($request->has('depth')) {
            $data['depth'] = $request->depth;
        }
        if ($request->has('weight')) {
            $data['weight'] = $request->weight;
        }
        if ($request->has('quality_checking')) {
            $data['quality_checking'] = $request->quality_checking;
        }
        if ($request->has('quantity')) {
            $data['quantity'] = $request->quantity;
        }
        if ($request->has('color')) {
            $data['color'] = $request->color;
        }
        if ($request->has('discount')) {
            $data['discount'] = $request->discount;
        }

        if (!empty($data)) {
            $product_update = Products::where('id', $id)->update($data);
        }
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function import(Request $request){
        // $request->validate([
        //     'file' => 'required|mimes:xlsx,csv'
        // ]);

        Excel::import(new ProductsImport, $request->file('file'));

        return back()->with('success', 'All good!');
    }
}
