<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Vaccination System')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        body {
            background-color: #f8f9fa;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        .navbar {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }
        .navbar-brand {
            font-weight: bold;
            color: white !important;
        }
        .nav-link {
            color: rgba(255,255,255,0.8) !important;
            transition: color 0.3s;
        }
        .nav-link:hover {
            color: white !important;
        }
        .card {
            border: none;
            border-radius: 15px;
            box-shadow: 0 4px 20px rgba(0,0,0,0.1);
            transition: transform 0.3s, box-shadow 0.3s;
        }
        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 30px rgba(0,0,0,0.15);
        }
        .card-header {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            border-radius: 15px 15px 0 0 !important;
            border: none;
        }
        .btn-primary {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border: none;
            border-radius: 25px;
            padding: 10px 20px;
            transition: all 0.3s;
        }
        .btn-primary:hover {
            transform: scale(1.05);
            box-shadow: 0 4px 15px rgba(102, 126, 234, 0.4);
        }
        .table {
            border-radius: 10px;
            overflow: hidden;
        }
        .table thead th {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            border: none;
        }
        .manage-link {
            color: #667eea;
            text-decoration: none;
            font-weight: bold;
        }
        .manage-link:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container">
            <a class="navbar-brand" href="/"><i class="fas fa-syringe"></i> Vaccination System</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto">
                    @auth
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('batches.index') }}"><i class="fas fa-boxes"></i> Batches</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('patients.index') }}"><i class="fas fa-users"></i> Patients</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('health_workers.index') }}"><i class="fas fa-user-md"></i> Health Workers</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('vaccines.index') }}"><i class="fas fa-vial"></i> Vaccines</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('schedules.index') }}"><i class="fas fa-calendar-alt"></i> Schedules</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('vaccination_records.index') }}"><i class="fas fa-clipboard-list"></i> Records</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/test"><i class="fas fa-tachometer-alt"></i> Dashboard</a>
                        </li>
                    @endauth
                </ul>
                <ul class="navbar-nav ms-auto">
                    <!-- Debug: {{ auth()->check() ? 'LOGGED IN' : 'NOT LOGGED IN' }} -->
                    @guest
                        <li class="nav-item">
                            <a class="nav-link text-white fw-bold" href="{{ route('login') }}"><i class="fas fa-sign-in-alt"></i> Login</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white fw-bold" href="{{ route('register') }}"><i class="fas fa-user-plus"></i> Register</a>
                        </li>
                    @else
                        <li class="nav-item">
                            <a class="nav-link text-white" href="/test"><i class="fas fa-tachometer-alt"></i> Dashboard</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown">
                                <i class="fas fa-user"></i> {{ Auth::user()->name }}
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="fas fa-sign-out-alt"></i> Logout</a></li>
                            </ul>
                        </li>
                    @endguest
                </ul>
                @auth
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                @endauth
            </div>
        </div>
    </nav>
    <div class="container mt-4">
        @yield('content')
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>