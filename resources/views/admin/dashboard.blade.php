{{-- @extends('layouts.admin') --}}

{{-- @section('content') --}}
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
                    <!-- Additional Menu Items -->
                    <li class="nav-item mb-2">
                        <a class="nav-link text-white d-flex align-items-center py-3 px-4 hover-effect"
                           href="#">
                            <i class="fas fa-users me-3"></i>
                            Users
                        </a>
                    </li>
                </ul>
            </div>
        </nav>

        <!-- Main Content -->
        <main class="col-md-10 ms-sm-auto col-lg-10 px-md-4 bg-light">
            <!-- Header -->
            <header class="d-flex justify-content-between align-items-center pt-4 pb-3 border-bottom">
                {{-- <div>
                    <h1 class="h3 text-dark mb-0">Admin Dashboard</h1>
                    <small class="text-muted">Last login: {{ Auth::guard('member')->user()->updated_at->format('M d, Y H:i') }}</small>
                </div> --}}

                <div class="d-flex align-items-center">
                    <div class="user-info me-4">
                        <span class="d-block text-end text-dark fw-bold">{{ Auth::guard('member')->user()->First_Name }}</span>
                        <small class="text-muted">Administrator</small>
                    </div>
                    <div class="dropdown">
                        <button class="btn btn-transparent" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown">
                            <i class="fas fa-user-circle fa-2x text-primary"></i>
                        </button>
                        <ul class="dropdown-menu dropdown-menu-end shadow">
                            <li><a class="dropdown-item" href="#"><i class="fas fa-cog me-2"></i>Settings</a></li>
                            <li>
                                <a class="dropdown-item text-danger"
                                   href="{{ route('logout') }}"
                                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    <i class="fas fa-sign-out-alt me-2"></i>Logout
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </header>

            <!-- Statistics Cards -->
            <div class="row mt-4 g-4">
                <div class="col-12 col-md-6 col-xl-3">
                    <div class="card statistic-card shadow-sm border-0">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div class="icon-bg bg-primary">
                                    <i class="fas fa-users fa-2x text-white"></i>
                                </div>
                                <div class="ms-3">
                                    <h6 class="text-muted mb-0">Total Members</h6>
                                    <h3 class="mb-0">1,234</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-md-6 col-xl-3">
                    <div class="card statistic-card shadow-sm border-0">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div class="icon-bg bg-success">
                                    <i class="fas fa-dollar-sign fa-2x text-white"></i>
                                </div>
                                <div class="ms-3">
                                    <h6 class="text-muted mb-0">Total Revenue</h6>
                                    <h3 class="mb-0">$12,345</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Recent Activity Section -->
            <div class="row mt-4">
                <div class="col-12">
                    <div class="card shadow-sm border-0">
                        <div class="card-header bg-white border-0">
                            <h5 class="mb-0">Recent Activities</h5>
                        </div>
                        <div class="card-body">
                            <div class="list-group list-group-flush">
                                <div class="list-group-item d-flex align-items-center">
                                    <i class="fas fa-user-plus text-success me-3"></i>
                                    <div>
                                        <span class="d-block">New member registered</span>
                                        <small class="text-muted">2 hours ago</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
</div>

<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
    @csrf
</form>

<style>
    .hover-effect {
        transition: all 0.3s ease;
        border-radius: 8px;
    }

    .hover-effect:hover {
        background: rgba(255,255,255,0.1) !important;
        transform: translateX(5px);
    }

    .icon-bg {
        width: 50px;
        height: 50px;
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .statistic-card {
        transition: transform 0.3s ease;
    }

    .statistic-card:hover {
        transform: translateY(-5px);
    }
</style>


