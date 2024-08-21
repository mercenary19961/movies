@extends('layouts.app')

@section('title', 'Movie Details')

@section('content')
    <div class="container mt-5">
        <h1 class="mb-4">{{ $movie->title }}</h1>
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Release Date: {{ $movie->release_date->format('d M Y') }}</h5>
                <p>{{ $movie->description }}</p>

                <h5 class="card-title">Category</h5>
                <p>{{ $movie->category->name }}</p>

                @if($movie->image)
                    <img src="{{ asset($movie->image) }}" alt="{{ $movie->title }}" class="img-fluid" style="max-height: 300px;">
                @else
                    No Image
                @endif

                <p><strong>Created at:</strong> {{ $movie->created_at->format('d M Y') }}</p>
                <p><strong>Last Updated:</strong> {{ $movie->updated_at->format('d M Y') }}</p>

                <a href="{{ route('movies.edit', $movie->id) }}" class="btn btn-warning">Edit</a>
                <form action="{{ route('movies.destroy', $movie->id) }}" method="POST" class="d-inline-block">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
                <a href="{{ route('movies.index') }}" class="btn btn-secondary">Back to List</a>
            </div>
        </div>
    </div>
@endsection
