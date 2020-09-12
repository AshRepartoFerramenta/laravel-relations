@extends('layouts.app')
@section('content')
    <div class="container-fluid ">
    <div class="row">
        <div class="col-12">

            <form action="{{route("post.tag.create",$post->id)}}" method="post">
            @csrf
            @method("POST")
            <label for="title">Title:</label><br>
            <input type="text" name="title"><br><br>
            <label for="slug">Slug:</label><br>
            <input type="text" name="slug"><br><br>
            <button type="submit" name="submit" value="ADD">Aggiungi</button>
            </form>
            </div>
        </div>
    </div>
@endsection