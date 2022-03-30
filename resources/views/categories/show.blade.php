@extends('master')

@section('content')
    <h1> Category {{ $category->id }}</h1>
    ID : {{ $category->id }} </br>
    Name : {{ $category->name }} </br>
    Desc : {{  $category->description }} </br></br>


    <h3>Articles</h3>
    @foreach($category->articles as $article)
        Article ID : {{$article->id}}</br>
        Article Name: {{$article->name}}</br>
        Article Body: {{ $article->body }}</br>
        Author ID : {{ $article->author_id }}</br></br>

    @endforeach
@endsection
