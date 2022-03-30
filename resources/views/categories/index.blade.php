@extends('master')

@section('content')
    <h1>All Categories</h1>
    @foreach($categories as $category)
        ID : {{ $category->id }}</br>
        Name : {{ $category->name }} </br>
        Desc: {{  $category->description }} </br></br>
        <a href="{{ action('CategoryController@edit', $category->id) }}">[edit]</a><br>
        <form method="post" action="{{ action('CategoryController@destroy', $category->id) }}">
            {{ method_field('DELETE') }}
            {{ csrf_field() }}
            <input type="submit" value="Delete">
        </form>
    @endforeach

    {{ $categories->links() }}
@endsection
