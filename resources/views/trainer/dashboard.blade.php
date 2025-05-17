@extends('layouts.trainers')

@section('title', 'Trainer Dashboard')

@section('content')
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
    </div>

    <!-- Stats Cards -->
    <div class="row">
        <!-- Total Trainers Card -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                TOTAL TRAINERS</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $totalTrainers }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-users fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- New This Month Card -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                NEW THIS MONTH</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $newThisMonth }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Specializations Card -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                SPECIALIZATIONS</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $specializationsCount }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-tags fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@foreach($recentTrainers as $trainer)
<tr>
    <td>
        @if($trainer->image)
            <img src="{{ asset('storage/' . $trainer->image) }}" class="rounded-circle me-2" width="30" height="30">
        @else
            <img src="https://ui-avatars.com/api/?name={{ urlencode($trainer->name) }}&background=4e73df&color=fff"
                 class="rounded-circle me-2" width="30" height="30">
        @endif
        {{ $trainer->name }}
    </td>
    <td>{{ $trainer->specialization ?? 'N/A' }}</td>
    <td>{{ $trainer->created_at->diffForHumans() }}</td>
</tr>
@endforeach
@endsection

@section('styles')
<style>
    .card {
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }
    .card:hover {
        transform: translateY(-5px);
        box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15) !important;
    }
    .text-primary {
        color: #4e73df !important;
    }
    .text-info {
        color: #36b9cc !important;
    }
    .text-warning {
        color: #f6c23e !important;
    }
    .border-left-primary {
        border-left: 0.25rem solid #4e73df !important;
    }
    .border-left-info {
        border-left: 0.25rem solid #36b9cc !important;
    }
    .border-left-warning {
        border-left: 0.25rem solid #f6c23e !important;
    }
</style>
@endsection
