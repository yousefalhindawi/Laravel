<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

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

        $data = Post::with('tags')->paginate(3);
        // $data = Post::with('tags')->get();
        // $data = Post::all();
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
        $tags = Tag::all();
        return view('Posts_CRUD.create' , compact('tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->post());
        $tags = $request->post('tags')?? 1;
        // var_dump($tags);
        //POST
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'active' => ['required','integer'],
            'image' => ['required','image','mimes:jpg,png,jpeg,gif,svg','max:2048']
            // 'image' => ['required','image','mimes:jpg,png,jpeg,gif,svg','max:2048','dimensions:min_width=100,min_height=100,max_width=1000,max_height=1000']
        ]);
// dd($request);
        $imageName = time().'-'.$request->post('title').'-'.$request->file('image')->extension();
        $request->file('image')->move(public_path('PostsImage'), $imageName);


        $post = new Post();
        $post->title = strip_tags($request->post('title'));
        $post->description = strip_tags($request->post('description'));
        $post->active = strip_tags($request->post('active'));
        $post->image = $imageName;
        $post->save();

        $tagsData = Tag::find($tags);
        $post->tags()->attach($tagsData);
        return redirect()->route('posts.index')->withSuccess(__('Post created successfully.'));




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
        $tags = Tag::all();
        return view('Posts_CRUD.singlePost', compact('post', 'tags'));
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
        $tags = Tag::all();
        return view('Posts_CRUD.edit', compact('post','tags'));
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
    //    dd($request->post());
    //    $tags = $request->post('tags')?? 1;
       // var_dump($tags);
       //POST
       $request->validate([
           'title' => 'required',
           'description' => 'required',
           'active' => ['required','integer'],
        //    'image' => ['required','image','mimes:jpg,png,jpeg,gif,svg','max:2048']
           // 'image' => ['required','image','mimes:jpg,png,jpeg,gif,svg','max:2048','dimensions:min_width=100,min_height=100,max_width=1000,max_height=1000']
       ]);
       if($request->hasfile('image')) {
       $imageName = time().'-'.$request->post('title').'-.'.$request->file('image')->extension();
       $request->file('image')->move(public_path('PostsImage'), $imageName);
       $destination = public_path("PostsImage/$post->image");
       if(File::exists($destination)){
        File::delete($destination);
    }
}else {
    $imageName = $post->image;
}
// dd($imageName);
// dd($imagePath);
// $destination = public_path('PostsImage').$post->image;
    //    dd(File::exists(public_path("PostsImage/$post->image")));

       $post->title = strip_tags($request->post('title'));
       $post->description = strip_tags($request->post('description'));
       $post->active = strip_tags($request->post('active'));
       $post->image = $imageName;
       $post->update();

    // //    $tagsData = Tag::find($tags);
    // //    $post->tags()->attach($tagsData);


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

        $destination = public_path("PostsImage/$post->image");
        if(File::exists($destination)){
         File::delete($destination);
        }

        return redirect()->route('posts.index')->withSuccess(__('Post delete successfully.'));
    }

    public function getName(Request $request) {

        $searchInput = strip_tags($request->get('searchPost'));

        $post = Post::where('title','like',"%$searchInput%")->orWhere('description' , 'like', "%$searchInput%")->get();

        return view('Posts_CRUD.search', compact('post'));
    }
}
