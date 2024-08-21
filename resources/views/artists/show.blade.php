@extends('layouts.app')

@section('title', 'Artist Details')

@section('content')
    <div class="container mt-5">
        <h1 class="mb-4">{{ $artist->name }}</h1> <!-- Display the artist's name -->
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Role: {{ $artist->role }}</h5>
                
                @if ($artist->image)
                    <img src="{{ asset('storage/' . $artist->image) }}" alt="{{ $artist->name }}" class="artist-image mb-4">
                @else
                    <p>No image available</p>
                @endif

                <p><strong>Created at:</strong> {{ $artist->created_at->format('d M Y') }}</p>
                <p><strong>Last Updated:</strong> {{ $artist->updated_at->format('d M Y') }}</p>

                <a href="{{ route('artists.edit', $artist->id) }}" class="btn btn-warning">Edit</a>
                <form action="{{ route('artists.destroy', $artist->id) }}" method="POST" class="d-inline-block">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
                <a href="{{ route('artists.index') }}" class="btn btn-secondary">Back to List</a>
            </div>
        </div>
    </div>
@endsection
