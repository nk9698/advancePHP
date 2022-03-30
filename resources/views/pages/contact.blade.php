@extends('master')

@section('content')
    <h1>Contact Page</h1>
    @if($email == null)
        <p>No email address given</p>
    @else
        <p>My mail id is {!! $email !!}</p>
    @endif

@endsection
