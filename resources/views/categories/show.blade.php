@extends('layouts.app')

@section('title', 'Category Details')

@section('content')
    <div class="container mt-5">
        <h1 class="mb-4">{{ $category->name }}</h1>
        <div class="card">
            <div class="card-body">
                <p><strong>Created at:</strong> {{ $category->created_at->format('d M Y') }}</p>
                <p><strong>Last Updated:</strong> {{ $category->updated_at->format('d M Y') }}</p>

                <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-warning">Edit</a>
                <form action="{{ route('categories.destroy', $category->id) }}" method="POST" class="d-inline-block">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
                <a href="{{ route('categories.index') }}" class="btn btn-secondary">Back to List</a>
            </div>
        </div>
    </div>
@endsection
