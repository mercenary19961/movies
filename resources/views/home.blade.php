@extends('layouts.app')

@section('title', 'Home')

@section('content')
    <div class="container mt-5">
        <div class="jumbotron text-center">
            <h1 class="display-4">Welcome to the Home Page</h1>
            <hr class="my-5">
            <p class=my-5>Explore the sections below:</p>
            <div class="d-flex justify-content-center">
                <a class="btn btn-primary btn-lg mx-2" href="{{ url('/artists') }}" role="button">Artists</a>
                <a class="btn btn-primary btn-lg mx-2" href="{{ url('/movies') }}" role="button">Movies</a>
                <a class="btn btn-primary btn-lg mx-2" href="{{ url('/scripts') }}" role="button">Scripts</a>
                <a class="btn btn-primary btn-lg mx-2" href="{{ url('/categories') }}" role="button">Categories</a>
            </div>
        </div>
    </div>
@endsection
