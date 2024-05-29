<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Comment;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $blog = Blog::all();
        $blog = Blog::orderBy('id','desc')->paginate(5);


        // return $blog;
        return view('blog.index', compact('blog'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // dd('here');
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


    public function blogdetail(Request $request, $id)
    {
        $data = Blog::where('id', $id)->get();
        return view('blog.blogdetail', compact('data'));
    }

    public function search(Request $request)
    {
        // $search = Blog::where('title','LIKE','%search%')->get();

        // return $search;

        $searchTerm = $request->input('search'); // Get the search term from the request
        $results = Blog::where('title', 'LIKE', '%' . $searchTerm . '%')->get();
        // $blog = Blog::paginate(2);
        // return $results;

        // return redirect()->back();

        return view('blog.index', compact(['searchTerm','results']));
    }


    public function comment(Request $request, $id){
        // return $id;

        $comment_data = Comment::create([
            'post_id' => $id,
            'name' => $request->name,
            'email' => $request->email,
            'subject' => $request->subject,
            'message' => $request->message
        ]);

        return redirect()->back();
    }
}
