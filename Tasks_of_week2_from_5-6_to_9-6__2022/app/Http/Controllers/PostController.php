<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{



    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //GET
        $data = Post::all();
        return view('Posts_CRUD.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //GET
        return view('Posts_CRUD.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //POST
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'active' => ['required','integer'],
        ]);

        $post = new Post();
        $post->title = strip_tags($request->post('title'));
        $post->description = strip_tags($request->post('description'));
        $post->active = strip_tags($request->post('active'));
        $post->save();

        return redirect()->route('posts.index')->withSuccess(__('Post updated successfully.'));;




    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //GET
        return view('Posts_CRUD.singlePost', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        //GET
        return view('Posts_CRUD.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        //POST
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'active' => ['required','integer'],
        ]);
        $post->title = strip_tags($request->post('title'));
        $post->description = strip_tags($request->post('description'));
        $post->active = strip_tags($request->post('active'));
        $post->save();

        return redirect()->route('posts.edit',$post->id)->withSuccess(__('Post updated successfully.'));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        //
        $post->delete();
        return redirect()->route('posts.index')->withSuccess(__('Post delete successfully.'));
    }
}
