<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    /** 
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = post::paginate(6);
        return view('posts.index',compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Post::create([
            'title' => $request->title,
            'content' => $request->content
        ]);
        return redirect('posts')->with('success', 'Formation ajoutée avec succès !');  

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
        $posts = post::findOrFail($id);
        return view('posts.edit', compact('posts'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $posts = post::findOrFail($id);
        $posts->update([
            'title' => $request->title,
            'content' => $request->content
        ]);
        return redirect('posts')->with('success', 'Formation supprimée avec succès !');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $posts = post::findOrFail($id);
        $posts->delete();
        return redirect('posts')->with('success', 'Formation supprimée avec succès !');
    }
}
