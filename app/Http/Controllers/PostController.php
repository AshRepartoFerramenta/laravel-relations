<?php

namespace App\Http\Controllers;
use App\Tag;
use App\Post;
use App\Category;
use App\PostInformation;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Requests\PostRequest;
class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /* $post_information = PostInformation::all(); */
        $posts = Post::paginate();
        return view('index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $categories = Category::all();
        $tags = Tag::all();
        return view('pages.postStore', compact("categories","tags"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostRequest $request)
    {   

        $validatedData = $request -> validated();
        $post = Post::create($validatedData);
         $post -> tags() -> attach($validatedData['tag_id']);
        $postInformation = new PostInformation;
         $postInformation -> description = $validatedData['description'];
      $postInformation -> slug = Str::slug($post -> title);
      $postInformation -> post() -> associate($post);
      $postInformation -> save();
        return redirect() -> route('posts.index'); 
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        $categories = Category::all();
        $post = Post::findOrFail($post -> id);
        return view('pages.postShow', compact("post" ,"categories"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $data = [
            'categories' => Category::all(),
            'post' => $post
        ];

        return view('edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(PostRequest $request, Post $post)
    {
        $validatedData = $request -> validated();

        //aggiorno il post con tutti i data (lui prenderà solo quelli che interessano alla tabella posts, attraverso la variabile fillable che abbiamo messo nel model)
        $post->update($validatedData);

        //Stessa cosa per i postinformation
        $post->postInformation->update($validatedData);
        $post-> tags()-> sync($validatedData['tag_id']);;

        //ritorniamo alla home
        return redirect()->route('posts.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        //Prima cancello la tabella associata, altrimenti non potrei cancellare post che è la tabella padre
        $post = Post::findOrFail($post -> id);
        if($post->postInformation){

            $post->postInformation->delete();
        }
        $post -> tags() -> sync([]);

        $post->delete();

        return redirect()-> route('posts.index');
    }
}