<?php

namespace App\Http\Controllers;
use App\Tag;
use App\Post;
use App\Category;
use App\PostInformation;
use App\Http\Requests\TagRequest;
use Illuminate\Http\Request;

class MyController extends Controller
{
    /* public function tagPost($id){
      $post = Post::findOrFail($id);  

      return view("pages.postTag" , compact("post"));
    }

    public function tagPostCreate(TagRequest $request , $id){
        $validatedData = $request -> validated();
        $tag = Tag::make($validatedData);
        $post = Post::findOrFail($id);
        $tag -> posts() -> associate($post);
        $tag -> save();
        return redirect() -> route('posts.index');
    } */

    public function removeTagFromPost($idP,$idT){
        $post = Post::findOrFail($idP);
        $tag = Tag::findOrFail($idT);
        $post -> tags() -> detach($tag);

        return redirect()->route("posts.index");
    }
}
