<!DOCTYPE html>
<html lang="en" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Trainer Management System')</title>

    <!-- Bootstrap 5 RTL -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-rtl@5.3.0/dist/css/bootstrap-rtl.min.css" rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- Custom CSS -->
    <style>
        :root {
            --sidebar-width: 250px;
            --primary-color: #4e73df;
            --secondary-color: #f8f9fc;
        }

        body {
            background-color: #f8f9fc;
            font-family: 'Tajawal', sans-serif;
        }

        #sidebar {
            width: var(--sidebar-width);
            height: 100vh;
            position: fixed;
            background: linear-gradient(180deg, var(--primary-color) 0%, #224abe 100%);
            transition: all 0.3s;
            box-shadow: 4px 0 10px rgba(0, 0, 0, 0.1);
        }

        #sidebar .sidebar-header {
            padding: 20px;
            background: rgba(0, 0, 0, 0.1);
        }

        #sidebar ul.components {
            padding: 20px 0;
        }

        #sidebar ul li a {
            padding: 12px 20px;
            font-size: 1.1em;
            display: block;
            color: rgba(255, 255, 255, 0.8);
            transition: all 0.3s;
        }

        #sidebar ul li a:hover {
            color: #fff;
            background: rgba(255, 255, 255, 0.1);
            text-decoration: none;
        }

        #sidebar ul li.active > a {
            color: #fff;
            background: rgba(255, 255, 255, 0.2);
        }

        #content {
            width: calc(100% - var(--sidebar-width));
            min-height: 100vh;
            margin-right: var(--sidebar-width);
            transition: all 0.3s;
        }

        .card {
            border: none;
            border-radius: 10px;
            box-shadow: 0 0.15rem 1.75rem 0 rgba(58, 59, 69, 0.15);
        }

        .card-header {
            background-color: #f8f9fc;
            border-bottom: 1px solid #e3e6f0;
            font-weight: 600;
        }

        .stat-card {
            border-left: 4px solid var(--primary-color);
        }

        .stat-card .card-body {
            padding: 1.5rem;
        }

        .stat-card i {
            font-size: 2rem;
            opacity: 0.7;
        }

        @media (max-width: 768px) {
            #sidebar {
                margin-right: -250px;
            }
            #sidebar.active {
                margin-right: 0;
            }
            #content {
                width: 100%;
                margin: 0;
            }
            #content.active {
                margin-right: 250px;
            }
        }
    </style>
</head>
<body>
    <!-- Sidebar -->
    <nav id="sidebar">
        <div class="sidebar-header text-center">
            <h4 class="text-white">Trainer System</h4>
        </div>

        <ul class="list-unstyled components">
            <li class="{{ request()->routeIs('trainer.dashboard') ? 'active' : '' }}">
                <a href="{{ route('trainer.dashboard') }}">
                    <i class="fas fa-fw fa-tachometer-alt me-2"></i>
                    Dashboard
                </a>
            </li>
            <li class="{{ request()->routeIs('trainer.index') ? 'active' : '' }}">
                <a href="{{ route('trainer.index') }}">
                    <i class="fas fa-fw fa-users me-2"></i>
                    All Trainers
                </a>
            </li>
            <li class="{{ request()->routeIs('trainer.create') ? 'active' : '' }}">
                <a href="{{ route('trainer.create') }}">
                    <i class="fas fa-fw fa-user-plus me-2"></i>
                    Add Trainer
                </a>
            </li>
            <li>
                <a href="#">
                    <i class="fas fa-fw fa-cog me-2"></i>
                    Settings
                </a>
            </li>
        </ul>
    </nav>

    <!-- Page Content -->
    <div id="content">
        <!-- Top Navbar -->
        <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm">
            <div class="container-fluid">
                <button type="button" id="sidebarCollapse" class="btn btn-primary d-lg-none">
                    <i class="fas fa-bars"></i>
                </button>

                <div class="d-flex align-items-center ms-auto">
                    <div class="dropdown">
                        <a class="dropdown-toggle d-flex align-items-center" href="#" role="button"
                           id="userDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                            <div class="me-3 d-none d-lg-inline text-gray-600 small">
                                {{ Auth::user()->name ?? 'treiner' }}
                            </div>
                                <a class="dropdown-item" href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    <i class="fas fa-sign-out-alt fa-sm me-2"></i> Logout
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </nav>

        <!-- Main Content -->
        <div class="container-fluid py-4">
            @yield('content')
        </div>
    </div>

    <!-- JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <!-- Custom Script -->
    <script>
        $(document).ready(function () {
            $('#sidebarCollapse').on('click', function () {
                $('#sidebar').toggleClass('active');
                $('#content').toggleClass('active');
            });

            // Active menu item
            $('ul.components li').on('click', function() {
                $('li').removeClass('active');
                $(this).addClass('active');
            });
        });
    </script>

    @stack('scripts')
</body>
</html>
