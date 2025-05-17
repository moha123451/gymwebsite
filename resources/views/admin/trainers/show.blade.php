@extends('layouts.admin')

@section('title', 'Trainer Details')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm border-0">
                <div class="card-header bg-white d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Trainer Details</h5>
                    <a href="{{ route('admin.trainers.index') }}" class="btn btn-sm btn-secondary">
                        <i class="fas fa-arrow-left me-1"></i> Back to List
                    </a>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4 text-center mb-4">
                            @if($trainer->image)
                                <img src="{{ asset('storage/' . $trainer->image) }}" alt="{{ $trainer->name }}" class="img-fluid rounded-circle mb-3" style="width: 200px; height: 200px; object-fit: cover;">
                            @else
                                <div class="bg-secondary rounded-circle d-flex align-items-center justify-content-center mx-auto mb-3" style="width: 200px; height: 200px;">
                                    <i class="fas fa-user-tie text-white" style="font-size: 3rem;"></i>
                                </div>
                            @endif
                            <h4>{{ $trainer->name }}</h4>
                            <p class="text-muted">{{ $trainer->role }}</p>
                        </div>
                        <div class="col-md-8">
                            <div class="mb-3">
                                <h6>Contact Information</h6>
                                <hr class="mt-1 mb-2">
                                <p><strong>Email:</strong> {{ $trainer->email }}</p>
                                <p><strong>Phone:</strong> {{ $trainer->phone ?? 'Not provided' }}</p>
                            </div>

                            <div class="mb-3">
                                <h6>Professional Details</h6>
                                <hr class="mt-1 mb-2">
                                <p><strong>Specialization:</strong> {{ $trainer->specialization ?? 'General' }}</p>
                                <p><strong>Bio:</strong></p>
                                <div class="bg-light p-3 rounded">
                                    {{ $trainer->bio ?? 'No bio provided' }}
                                </div>
                            </div>

                            <div class="d-flex justify-content-end mt-4">
                                <a href="{{ route('admin.trainers.edit', $trainer->id) }}" class="btn btn-primary me-2">
                                    <i class="fas fa-edit me-1"></i> Edit
                                </a>
                                <form action="{{ route('admin.trainers.destroy', $trainer->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this trainer?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">
                                        <i class="fas fa-trash me-1"></i> Delete
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
