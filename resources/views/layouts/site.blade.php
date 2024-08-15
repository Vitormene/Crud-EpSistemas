<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>EP Sistemas</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Styles -->
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
    <link rel="shortcut icon" type="image/png" href="{{ asset('assets/images/favicon.png') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <style>
        /* Custom styles for sidebar */
        .sidebar {
            position: fixed;
            top: 0;
            left: 0;
            height: 100%;
            width: 250px;
            transform: translateX(-250px);
            transition: transform 0.3s ease;
        }

        .sidebar.show {
            transform: translateX(0);
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 15px;
            background-color: #343a40;
            color: #fff;
        }

        .header_toggle {
            display: flex;
            align-items: center;
        }

        .header_toggle .navbar-toggler {
            border: none;
            /* Remove a borda padrão */
            background: transparent;
            /* Fundo transparente para não afetar o layout */
        }
    </style>
</head>

<body class="bg-secondary-subtle">
    <header class="header navbar-dark bg-dark">
        <div class="container d-flex justify-content-between align-items-center">
            <div class="header_toggle">
                <button class="navbar-toggler" type="button" aria-controls="navbarToggleExternalContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
            </div>
        </div>
    </header>

    <div class="sidebar bg-dark text-white vh-100 show" id="navbarToggleExternalContent">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark flex-column">
            <a href="#" class="navbar-brand d-flex align-items-center mb-4">
                <img src="{{ asset('assets/images/logo.png') }}" width="40px" class="img-fluid me-2"
                    alt="EP Sistemas">
                <span class="fw-bold text-uppercase fs-5">EP Sistemas</span>
            </a>
            <p class="text-primary mb-3 text-uppercase fs-6">Your company</p>
            <ul class="navbar-nav flex-column">
                <li class="nav-item">
                    <a class="nav-link active" href="#"><i class="fas fa-edit me-2"></i> Atendimento</a>
                </li>
            </ul>
        </nav>
    </div>

    <div id="app">
        <main class="col-md-9 ms-sm-auto col-lg-12 px-4">
            <div class="container mt-4">
                @yield('content')
            </div>
        </main>
    </div>

    <footer class="site__footer-container">
        <!-- Footer content -->
    </footer>

    <!-- Custom JS -->
    <script src="{{ mix('js/app.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{mix('js/main.js')}}"></script>    
</body>

</html>
