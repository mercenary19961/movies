@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('success'))
                        <div class="alert alert-success" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif

                    <p>You are logged in as Admin.</p>

                    <nav>
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('artists.index') }}">Artists</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('movies.index') }}">Movies</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('categories.index') }}">Categories</a>
                            </li>
                            <!-- Add more links as needed -->
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
