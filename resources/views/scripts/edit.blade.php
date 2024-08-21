@extends('layouts.app')

@section('title', 'Edit Script')

@section('content')
    <div class="container mt-5">
        <h1 class="mb-4">Edit Script</h1>
        <form action="{{ route('scripts.update', $script->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" class="form-control" id="title" name="title" value="{{ old('title', $script->title) }}" required>
            </div>
            <div class="mb-3">
                <label for="content" class="form-label">Content</label>
                <textarea class="form-control" id="content" name="content" rows="5" required>{{ old('content', $script->content) }}</textarea>
            </div>
            <div class="mb-3">
                <label for="artist_id" class="form-label">Associated Artist</label>
                <select class="form-control" id="artist_id" name="artist_id" required>
                    <option value="">Select an artist</option>
                    @foreach($availableArtists as $artist)
                        <option value="{{ $artist->id }}"
                            {{ isset($script) && $script->artist_id == $artist->id ? 'selected' : '' }}>
                            {{ $artist->name }} - {{ $artist->role }}
                        </option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Update Script</button>
        </form>
    </div>
@endsection
