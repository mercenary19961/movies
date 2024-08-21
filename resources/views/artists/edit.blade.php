@extends('layouts.app')

@section('title', 'Edit Artist')

@section('content')
    <div class="container mt-5">
        <h1 class="mb-4">Edit Artist</h1>
        <form action="{{ route('artists.update', $artist->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $artist->name) }}" required>
            </div>
            <div class="mb-3">
                <label for="role" class="form-label">Role</label>
                <input type="text" class="form-control" id="role" name="role" value="{{ old('role', $artist->role) }}" required>
            </div>
            <div class="mb-3">
                <label for="image" class="form-label">Image</label>
                <input type="file" class="form-control" id="image" name="image" accept="image/*">
                @if ($artist->image)
                    <img src="{{ asset('storage/' . $artist->image) }}" alt="{{ $artist->name }}" class="img-thumbnail mt-2" width="150">
                @endif
            </div>
            <button type="submit" class="btn btn-primary">Update Artist</button>
        </form>
    </div>
@endsection
