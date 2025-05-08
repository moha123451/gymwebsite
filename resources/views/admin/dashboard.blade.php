{{-- resources/views/admin/dashboard.blade.php --}}
@extends('layouts.admin')

@section('title', 'Admin Dashboard')

@section('content')
<div class="container-fluid">
    <div class="row mt-4">
        <!-- Header -->
        <header class="d-flex justify-content-between align-items-center pt-4 pb-3 border-bottom">
            <div class="d-flex align-items-center">
                <div class="user-info me-4">
                    {{-- <span class="d-block text-end text-dark fw-bold">{{ Auth::guard('admin')->user()->name }}</span> --}}
                    <small class="text-muted">Administrator</small>
                </div>
                <div class="dropdown">
                    <button class="btn btn-transparent" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown">
                        <i class="fas fa-user-circle fa-2x text-primary"></i>
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end shadow">
                        <li><a class="dropdown-item" href="#"><i class="fas fa-cog me-2"></i>Settings</a></li>
                        <li><a class="dropdown-item text-danger" href="{{ route('logout') }}"
                               onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                               <i class="fas fa-sign-out-alt me-2"></i>Logout
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </header>

       <!-- Stats Cards -->
<div class="row mt-4 g-4">
    <!-- Members Card -->
    <div class="col-12 col-md-6 col-xl-3">
        <div class="card statistic-card shadow-sm border-0">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div class="icon-bg bg-primary">
                        <i class="fas fa-users fa-2x text-white"></i>
                    </div>
                    <div class="ms-3">
                        <h6 class="text-muted mb-0">Total Members</h6>
                        <h3 class="mb-0">{{ number_format($stats['total_members']) }}</h3>
                        <small class="text-success">+{{ $stats['recent_members']->count() }} new this week</small>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Revenue Card -->
    <div class="col-12 col-md-6 col-xl-3">
        <div class="card statistic-card shadow-sm border-0">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div class="icon-bg bg-success">
                        <i class="fas fa-dollar-sign fa-2x text-white"></i>
                    </div>
                    <div class="ms-3">
                        <h6 class="text-muted mb-0">Total Revenue</h6>
                        <h3 class="mb-0">${{ number_format($stats['total_revenue']) }}</h3>
                        {{-- <small class="text-success">{{ $stats['active_subscriptions'] }} active subscriptions</small> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Classes Card -->
    <div class="col-12 col-md-6 col-xl-3">
        <div class="card statistic-card shadow-sm border-0">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div class="icon-bg bg-info">
                        <i class="fas fa-dumbbell fa-2x text-white"></i>
                    </div>
                    <div class="ms-3">
                        <h6 class="text-muted mb-0">Total Classes</h6>
                        <h3 class="mb-0">{{ number_format($stats['total_classes']) }}</h3>
                        {{-- <small class="text-muted">{{ GymClass::where('status', 'active')->count() }} active</small> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Trainers Card -->
    <div class="col-12 col-md-6 col-xl-3">
        <div class="card statistic-card shadow-sm border-0">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div class="icon-bg bg-warning">
                        <i class="fas fa-user-tie fa-2x text-white"></i>
                    </div>
                    <div class="ms-3">
                        <h6 class="text-muted mb-0">Total Trainers</h6>
                        <h3 class="mb-0">{{ number_format($stats['total_trainers']) }}</h3>
                        {{-- <small class="text-muted">{{ Trainer::where('status', 'active')->count() }} active</small> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
        <!-- Recent Activity -->
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
    </div>
</div>
<!-- بعد قسم الكاردز -->
<div class="card mt-4">
    <div class="card-header">
        <h5>Recent Members</h5>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table">
                @foreach($stats['recent_members'] as $member)
                <tr>
                    <td>{{ $member->First_Name }} {{ $member->Last_name }}</td>
                    <td>{{ $member->email }}</td>
                    <td>{{ $member->created_at->diffForHumans() }}</td>
                </tr>
                @endforeach
            </table>
        </div>
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
    .statistic-card {
    transition: transform 0.3s ease;
    border-radius: 10px;
}

.statistic-card:hover {
    transform: translateY(-5px);
}

.icon-bg {
    width: 50px;
    height: 50px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
}
</style>
@endsection
