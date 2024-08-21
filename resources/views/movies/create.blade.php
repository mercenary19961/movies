@extends('layouts.app')

@section('title', 'Create Movie')

@section('content')
    <div class="container mt-5">
        <h1 class="mb-4">Create a New Movie</h1>
        <form action="{{ route('movies.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" class="form-control" id="title" name="title" value="{{ old('title') }}" required>
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea class="form-control" id="description" name="description" rows="5" required>{{ old('description') }}</textarea>
            </div>
            <div class="mb-3">
                <label for="release_date" class="form-label">Release Date</label>
                <input type="date" class="form-control" id="release_date" name="release_date" value="{{ old('release_date') }}" required>
            </div>
            <div class="mb-3">
                <label for="category_id" class="form-label">Category</label>
                <select class="form-control" id="category_id" name="category_id" required>
                    <option value="">Select a category</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="artists" class="form-label">Artists</label>
                <div id="artists">
                    @foreach($artists as $artist)
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="artists[]" value="{{ $artist->id }}" id="artist{{ $artist->id }}" {{ in_array($artist->id, old('artists', [])) ? 'checked' : '' }}>
                            <label class="form-check-label" for="artist{{ $artist->id }}">
                                {{ $artist->name }}
                            </label>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="mb-3">
                <label for="image" class="form-label">Movie Image</label>
                <input type="file" class="form-control" id="image" name="image">
            </div>
            <button type="submit" class="btn btn-primary">Create Movie</button>
        </form>
    </div>
@endsection

<script>
    $(document).ready(function() {
        $('#artists').select2({
            placeholder: "Select artists",
            allowClear: true
        });
    });
</script>
