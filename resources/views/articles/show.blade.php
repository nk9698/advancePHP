@extends('master')

@section('content')
    <h1> Article {{ $article->id }}</h1>

    Name : {{ $article->name }} </br>
    Body : {{  $article->body }} </br>
    Author ID : {{ $article->author_id }}</br>
    Category ID : {{ $article->category_id }}</br>
    </br>
    Category Name: {{$article->category->name}}</br>
    Category Desc: {{$article->category->description}}</br></br>

    Tags:
    @foreach($article->tags as $tag)
        {{$tag->name}}
    @endforeach

    <h4>Image</h4>
    @isset($image->file)
        <img src="{{ asset('storage/' . $image->file) }}"
             width="100px" height="100px"><br>
    @endisset

@endsection
