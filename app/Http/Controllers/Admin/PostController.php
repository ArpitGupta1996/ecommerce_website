<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $blog = Blog::all();

        // return $blog;
        return view('admin.blog.index', compact('blog'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.blog.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //    dd('store function');
        // return $request;

        if($request->hasFile('image')){
            $image = $request->file('image');
            $image_name = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('images/blog'), $image_name);

            $data = Blog::create([
                'created_by' => Auth::id(),
                'title' => $request->title,
                'body' =>  $request->editorContent,
                'image' => $image_name
            ]);

        }
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
        $post_edit = Blog::where('id', $id)->first();

        // return $post_edit;

        return view('admin.blog.edit', compact('post_edit'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // dd('update fun');
        // return $request;
        // return $id;
        $post_update = Blog::where('id', $id)->update([
            'title' => $request->title,
            'body' => $request->editorContent,
        ]);

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $post = Blog::findOrfail($id);

        $post->delete();

        return redirect()->back()->with('success', 'Post deleted successfully');
    }
}
