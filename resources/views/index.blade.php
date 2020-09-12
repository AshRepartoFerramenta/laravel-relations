@extends('layouts.app')

@section('content')

<div class="row">
    <div class="col-12">
        <h1>Posts</h1>
    </div>
    <div class="col-12 text-right">
        <a class="btn-primary btn right create" href="{{ route('posts.create') }}">Aggiungi Nuovo</a>
    </div>
    <div class="col-12">
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Category Name</th>
                    <th>Description</th>
                    <th>Tags</th>
                    <th>Dettagli</th>
                    <th>Aggiorna</th>
                    {{-- <th>Add Tag</th> --}}
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($posts as $post)
                <tr>
                    <td>{{ $post->id }}</td>
                    <td>{{ $post->title }}</td>
                    <td>{{ $post->category->title }}</td>
                    <td>{{ $post->postInformation->description }}
                    </td>
                    <td>
                        
                        @foreach ($post->tags as $tag)
                    <a href="{{route("remove.tag.post",[$post->id,$tag->id])}}"><i class="fas fa-trash"></i></a>
                        <a href="{{route("tags.show", $tag-> id) }}"> #{{ $tag->title }}</a>
                        @endforeach
                        
                    </td>
                    <th><a class="btn btn-info" href="{{ route('posts.show', $post) }}">Dettagli</a></th>
                    <td>
                        <a class="btn btn-success" href="{{ route('posts.edit', $post) }}">Aggiorna</a>
                    </td>
                    {{-- <td>
                        <a class="btn btn-success" href={{route("post.tag",$post->id)}}">+Tags</a>
                    </td> --}}
                    <td>
                        <form action="{{ route('posts.destroy', $post) }}" method="post">
                            @csrf
                            @method('delete')
                            <input class="btn btn-danger" value="Elimina" type="submit">
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="col-12">
        {{ $posts->links() }}
    </div>
</div>



@endsection
