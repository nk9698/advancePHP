@extends('master')


@section('content')
    <h1>Edit Category Form</h1>

    <form method="POST" action="
        {{ action('CategoryController@update', $category->id) }}">
        {{ method_field('PATCH') }}
{{--        {{ csrf_field() }}--}}
{{--        <label for="name">Name:</label>--}}
{{--        <input name="name" type="text"--}}
{{--               value="{{ $category->name }}"><br>--}}
{{--        <label for="description">Description:</label>--}}
{{--        <input name="description" type="text"--}}
{{--               value="{{$category->description}}"><br>--}}
{{--        <input type="submit" value="Update"><br>--}}
        @include('partials.categoriesForm',[
            'buttonName' => 'Update',
            'name' => $category->name,
            'description' => $category->description])
    </form>

    @include('partials.errors')
@endsection
