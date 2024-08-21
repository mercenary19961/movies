<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'My Laravel Movies Site')</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />
    <style>
        body, html {
            height: 100%;
            margin: 0;
        }
        .wrapper {
            min-height: 100%;
            display: flex;
            flex-direction: column;
        }
        .content {
            flex: 1;
        }
        .footer {
            background-color: #343a40;
            color: white;
            padding: 20px 0;
        }
        .artist-image {
            width: 200px;
            height: 200px;
            object-fit: cover;
            border-radius: 8px;
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <header class="bg-dark text-white py-3">
            <div class="container">
                <nav class="navbar navbar-expand-lg navbar-dark">
                    <a class="navbar-brand" href="{{ url('/') }}">My Laravel Movies Site</a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav me-auto">
                            <li class="nav-item">
                                <a class="nav-link" href="{{ url('/artists') }}">Artists</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ url('/movies') }}">Movies</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ url('/scripts') }}">Scripts</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ url('/categories') }}">Categories</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ url('/dashboard') }}">Dashboard</a>
                            </li>
                        </ul>
                        <ul class="navbar-nav ms-auto">
                            @guest
                                <li class="nav-item">
                                    <a class="nav-link btn btn-primary text-white ms-2" href="{{ route('login') }}">Login</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link btn btn-success text-white ms-2" href="{{ route('register') }}">Signup</a>
                                </li>
                            @else
                                <li class="nav-item">
                                    <a class="nav-link btn btn-danger text-white ms-2" href="{{ route('logout') }}"
                                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        Logout
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                        @method('delete')
                                    </form>
                                </li>
                            @endguest
                        </ul>
                        
                    </div>
                    
                </nav>
            </div>
        </header>

        <!-- Main Content -->
        <div class="content">
            <div class="container mt-4">
                @yield('content')
            </div>
        </div>

        <!-- Footer -->
        <footer class="footer mt-auto">
            <div class="container text-center">
                <p>&copy; {{ date('Y') }} My Laravel App. All rights reserved.</p>
            </div>
        </footer>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
