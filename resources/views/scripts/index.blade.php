@extends('layouts.app')

@section('title', 'Scripts')

@section('content')
    <h1 class="mb-4">Scripts</h1>
    <a href="{{ route('scripts.create') }}" class="btn btn-primary mb-3">Add New Script</a>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>Title</th>
                <th>Content</th>
                <th>Associated Artist</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($scripts as $script)
                <tr>
                    <td>{{ $script->title }}</td>
                    <td>{{ Str::limit($script->content, 50) }}</td>
                    <td>
                        @if ($script->artist)
                            <p>{{ $script->artist->name }} - {{ $script->artist->role }}</p>
                        @else
                            <p>No artist associated</p>
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('scripts.show', $script->id) }}" class="btn btn-info btn-sm">View</a>
                        <a href="{{ route('scripts.edit', $script->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('scripts.destroy', $script->id) }}" method="POST" class="d-inline">
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
