@extends('layouts.app')

@section('title', 'Movies')

@section('content')
    <h1 class="mb-4">Movies</h1>

    <!-- Search and Filter Form -->
    <form action="{{ route('movies.index') }}" method="GET" class="mb-4 p-3 border border-secondary rounded">
        <div class="row">
            <div class="col-md-3">
                <div class="input-group">
                    <input type="text" name="search" class="form-control" placeholder="Search by movie title..." value="{{ request('search') }}">
                </div>
            </div>
            <div class="col-md-2">
                <select name="category_id" class="form-control">
                    <option value="">All Categories</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}" {{ request('category_id') == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-1">
                <button type="submit" class="btn btn-primary w-100">Search</button>
            </div>
            <div class="col-md-1">
                <a href="{{ route('movies.index') }}" class="btn btn-secondary w-100">Clear</a>
            </div>
            <div class="col-md-2 ms-auto">
                <a href="{{ route('movies.create') }}" class="btn btn-dark mb-3">Add New Movie</a>
            </div>
        </div>
    </form>

    

    <table class="table table-bordered table-striped table-hover">
        <thead>
            <tr>
                <th>Title</th>
                <th>Release Date</th>
                <th>Category</th>
                <th>Image</th>
                <th>Artists</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($movies as $movie)
                <tr>
                    <td>{{ $movie->title }}</td>
                    <td>{{ $movie->release_date->format('d M Y') }}</td>
                    <td>{{ $movie->category->name }}</td>
                    <td>
                        @if($movie->image)
                            <img src="{{ asset($movie->image) }}" alt="{{ $movie->title }}" class="img-fluid" style="max-height: 50px;">
                        @else
                            No Image
                        @endif
                    </td>
                    <td>
                        <div class="dropdown">
                            <button class="btn btn-secondary btn-sm dropdown-toggle" type="button" id="artistsDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                                Artists
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="artistsDropdown">
                                @foreach($movie->artists as $artist)
                                    <li><a class="dropdown-item">{{ $artist->name }}</a></li>
                                @endforeach
                            </ul>
                        </div>
                    </td>
                    <td>
                        <a href="{{ route('movies.show', $movie->id) }}" class="btn btn-info btn-sm">View</a>
                        <a href="{{ route('movies.edit', $movie->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('movies.destroy', $movie->id) }}" method="POST" class="d-inline">
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
