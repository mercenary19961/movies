@extends('layouts.app')

@section('title', 'Artists')

@section('content')
    <h1 class="mb-4">Artists</h1>
    <a href="{{ route('artists.create') }}" class="btn btn-primary mb-3">Add New Artist</a>

    <table class="table table-bordered table-striped table-hover">
        <thead>
            <tr>
                <th>Image</th>
                <th>Name</th>
                <th>Role</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($artists as $artist)
                <tr>
                    <td>
                        @if ($artist->image)
                            <img src="{{ asset('storage/' . $artist->image) }}" alt="{{ $artist->name }}" class="img-thumbnail" style="width: 50px; height: 50px; object-fit: cover;">
                        @else
                            <p>No image available</p>
                        @endif
                    </td>
                    <td>{{ $artist->name }}</td>
                    <td>{{ $artist->role }}</td>
                    <td>
                        <a href="{{ route('artists.show', $artist->id) }}" class="btn btn-info btn-sm">View</a>
                        <a href="{{ route('artists.edit', $artist->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('artists.destroy', $artist->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
