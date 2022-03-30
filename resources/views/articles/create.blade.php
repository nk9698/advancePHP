@extends('master')

@section('content')
    <h1>New Article</h1>

    <form method="POST" action="{{ action('ArticleController@store') }}">
        {{ csrf_field() }}
        <label for="name">Name:</label>
        <input name="name" type="text"><br>

        <label for="body">Body:</label>
        <input name="body" type="text"><br>

        <label for="category_id">Gallery</label>
        <select name="category_id">
            @foreach($categories as $id => $category)
                <option value="{{$id}}">{{$category}}</option>
            @endforeach
        </select><br>

        <label for="tags">Tags</label>
        <select multiple name="tags[]">
            @foreach($tags as $id => $tag)
                <option value="{{$id}}">{{$tag}}</option>
            @endforeach
        </select><br>

        <label for="file">File(image only):</label>
        <input type="file" name="file" accept="image/*"><br>

        <input type="submit" value="Create"><br>
    </form>
    @include('partials.errors')
@endsection
