@extends('layouts.app')
@section('content')

    <h5>Categoria : {{ $post->category->title }}</h5>
    <h5>Title : {{$post -> title}}</h5>
    <h5>Author:{{$post -> author}}</h5>
    <h5>Tag:</h5>
    @foreach ($post -> tags as $tag)
        #{{$tag -> title}}
    @endforeach

    <h5>Post Information : </h5>
        {{ $post->postInformation->description }}
@endsection