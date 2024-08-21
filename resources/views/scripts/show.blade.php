@extends('layouts.app')

@section('title', 'Script Details')

@section('content')
    <div class="container mt-5">
        <h1 class="mb-4">{{ $script->title }}</h1>
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Content</h5>
                <p>{{ $script->content }}</p>

                <h5 class="card-title">Associated Artist</h5>
                @if ($script->artist)
                    <p><strong>Name:</strong> {{ $script->artist->name }}</p>
                    <p><strong>Role:</strong> {{ $script->artist->role }}</p>
                @else
                    <p>No artist associated.</p>
                @endif

                <p><strong>Created at:</strong> {{ $script->created_at->format('d M Y') }}</p>
                <p><strong>Last Updated:</strong> {{ $script->updated_at->format('d M Y') }}</p>

                <a href="{{ route('scripts.edit', $script->id) }}" class="btn btn-warning">Edit</a>
                <form action="{{ route('scripts.destroy', $script->id) }}" method="POST" class="d-inline-block">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
                <a href="{{ route('scripts.index') }}" class="btn btn-secondary">Back to List</a>
            </div>
        </div>
    </div>
@endsection
