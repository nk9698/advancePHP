@extends('master')

@section('content')
    <h1>New Category Form</h1>

    <form method="POST" action="{{action ('CategoryController@store')}}">
{{--        {{ csrf_field() }}--}}
{{--        <label for="name">Name:</label>--}}
{{--        <input name="name" type="text"><br>--}}
{{--        <label for="description">Description:</label>--}}
{{--        <input name="description" type="text"><br>--}}
{{--        <input type="submit" value="Submit"><br>--}}
        @include('partials.categoriesForm',[
            'buttonName' => 'Submit',
            'name' => old('name'),
            'description' => old('description')])
    </form>

    @include('partials.errors')

@endsection
