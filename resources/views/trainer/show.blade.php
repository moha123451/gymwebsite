@extends('layouts.trainers')

@section('title', 'Trainer Details')

@section('content')
<div class="card shadow mb-4">
    <div class="card-header py-3 d-flex justify-content-between align-items-center">
        <h6 class="m-0 font-weight-bold text-primary">Trainer Details</h6>
        <div>
            <a href="{{ route('trainer.edit', $trainer->id) }}" class="btn btn-warning btn-sm">
                <i class="fas fa-edit"></i> Edit
            </a>
            <a href="{{ route('trainer.index') }}" class="btn btn-secondary btn-sm">
                <i class="fas fa-arrow-left"></i> Back
            </a>
        </div>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-8">
                <table class="table table-bordered">
                    <tr>
                        <th width="30%">Name</th>
                        <td>{{ $trainer->name }}</td>
                    </tr>
                    <tr>
                        <th>Email</th>
                        <td>{{ $trainer->email }}</td>
                    </tr>
                    <tr>
                        <th>Phone</th>
                        <td>{{ $trainer->phone ?? 'N/A' }}</td>
                    </tr>
                    <tr>
                        <th>Specialization</th>
                        <td>{{ $trainer->specialization ?? 'N/A' }}</td>
                    </tr>
                    <tr>
                        <th>Status</th>
                        <td>
                            <span class="badge badge-{{ $trainer->status == 'active' ? 'success' : 'secondary' }}">
                                {{ ucfirst($trainer->status) }}
                            </span>
                        </td>
                    </tr>
                    <tr>
                        <th>Joined Date</th>
                        <td>{{ $trainer->created_at->format('d M Y') }}</td>
                    </tr>
                </table>
            </div>
            <div class="col-md-4 text-center">
                <div class="profile-image-container mb-3">
                    <img src="https://ui-avatars.com/api/?name={{ urlencode($trainer->name) }}&size=200&background=4e73df&color=fff"
                         alt="Profile Image" class="img-fluid rounded-circle border" style="width: 200px; height: 200px;">
                </div>
            </div>
        </div>

        @if($trainer->bio)
        <div class="mt-4">
            <h5 class="font-weight-bold">Bio</h5>
            <div class="p-3 bg-light rounded">
                {!! nl2br(e($trainer->bio)) !!}
            </div>
        </div>
        @endif
    </div>
    <div class="col-md-4 text-center">
    <div class="profile-image-container mb-3">
        @if($trainer->image)
            <img src="{{ asset('storage/' . $trainer->image) }}"
                 alt="Profile Image" class="img-fluid rounded-circle border" style="width: 200px; height: 200px;">
        @else
            <img src="https://ui-avatars.com/api/?name={{ urlencode($trainer->name) }}&size=200&background=4e73df&color=fff"
                 alt="Profile Image" class="img-fluid rounded-circle border" style="width: 200px; height: 200px;">
        @endif
    </div>
</div>
</div>
@endsection
