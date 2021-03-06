@extends('layouts.app')
@section('content')
    <div class="row">
    <div class="col-12">
        <h1>Create Post</h1>
    </div>
    <div class="col-12">
        <form action="{{ route('posts.store') }}" method="post">
            @csrf
            @method('POST')

            <div class="form-group">
                <label for="title">Title</label>
                <input value="" class="form-control" name="title" type="text" placeholder="Inserisci un titolo" />
            </div>

            <div class="form-group">
                <label for="author">Autore</label>
                <input value="" class="form-control" name="author" type="text" placeholder="Inserisci un autore" />
            </div>

            <div class="form-group">
                <label for="category_id">Categoria</label>
                <select class="form-control" name="category_id">
                    <option>---</option>
                    @foreach($categories as $category)

                        <option value="{{ $category->id }}">{{ $category->title }}</option>

                    @endforeach
                </select>
            </div>
             <label for="tag_id">Tags:</label>
            <select name="tag_id[]" class="custom-select" multiple>
              @foreach ($tags as $tag)
                <option value="{{$tag -> id}}">{{$tag -> title}}</option>
              @endforeach
            </select>

            <h3>Post Information Data</h3>
            <div class="form-group">
                <label for="description">Descrizione</label>
                <textarea class="form-control" name="description" type="text" placeholder="Inserisci una descrizione">
                    
                </textarea>
            </div>
            
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Crea" />
            </div>
        </form>
    </div>

</div>
@endsection