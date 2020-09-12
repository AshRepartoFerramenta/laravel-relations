@extends('layouts.app')
@section('content')
<h5>I post che hanno associato il tag "{{$tag -> title}}" sono ({{$tag -> posts -> count()}}):</h5>
    @foreach ($tag -> posts as $post)
        <p>{{$post -> title}}</p>
    @endforeach
@endsection