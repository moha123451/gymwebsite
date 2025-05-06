{{-- resources/views/layouts/admin.blade.php --}}
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Dashboard')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>
    <div class="container-fluid vh-100">
        <div class="row h-100">
            <!-- Sidebar -->
            <nav id="sidebar" class="col-md-2 col-lg-2 d-md-block bg-dark sidebar shadow-lg">
                <div class="position-sticky pt-4">
                    <div class="sidebar-header text-center mb-4">
                        <h4 class="text-white">Admin Panel</h4>
                    </div>

                    <ul class="nav flex-column">
                        <li class="nav-item mb-2">
                            <a class="nav-link text-white d-flex align-items-center py-3 px-4 hover-effect"
                               href="{{ route('admin.dashboard') }}">
                                <i class="fas fa-tachometer-alt me-3"></i>
                                Dashboard
                            </a>
                        </li>
                        <li class="nav-item mb-2">
                            <a class="nav-link text-white d-flex align-items-center py-3 px-4 hover-effect"
                               href="{{ route('admin.subscriptions.index') }}">
                                <i class="fas fa-list-alt me-3"></i>
                                Subscriptions
                            </a>
                        </li>

                        <li class="nav-item mb-2">
                            <a class="nav-link text-white d-flex align-items-center py-3 px-4 hover-effect"
                               href="{{ route('admin.trainers.index') }}">  <!-- حنعمل الراوت بعدين -->
                                <i class="fas fa-user-tie me-3"></i>  <!-- أيقونة المدرب -->
                                Trainers
                            </a>
                        </li>
                        <li class="nav-item mb-2">
                            <a class="nav-link text-white d-flex align-items-center py-3 px-4 hover-effect"
                               href="{{ route('admin.gym-classes.index') }}">
                                <i class="fas fa-dumbbell me-3"></i> <!-- أيقونة تمارين -->
                                Gym Classes
                            </a>
                        </li>
                        <li class="nav-item mb-2">
                            <a class="nav-link text-white d-flex align-items-center py-3 px-4 hover-effect"
                               href="{{ route('admin.members.index') }}">
                                <i class="fas fa-user-friends me-3"></i> <!-- أيقونة الأعضاء -->
                                Members
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>

            <!-- Main Content -->
            <main class="col-md-10 ms-sm-auto col-lg-10 px-md-4 bg-light">
                @yield('content')
            </main>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js"></script>
</body>

</html>
