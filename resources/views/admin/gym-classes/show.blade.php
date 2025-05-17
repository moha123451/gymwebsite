@extends('layouts.admin')

@section('title', 'Class Details')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm border-0">
                <div class="card-header bg-white d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Class Details: {{ $gymClass->class_name }}</h5>
                    <a href="{{ route('admin.gym-classes.index') }}" class="btn btn-sm btn-secondary">
                        <i class="fas fa-arrow-left me-1"></i> Back to List
                    </a>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4 text-center mb-4">
                            @if($gymClass->image)
                                <img src="{{ asset('storage/' . $gymClass->image) }}" alt="{{ $gymClass->class_name }}"
                                     class="img-fluid rounded mb-3" style="max-height: 200px;">
                            @else
                                <div class="bg-secondary rounded d-flex align-items-center justify-content-center mx-auto mb-3"
                                     style="width: 100%; height: 200px;">
                                    <i class="fas fa-dumbbell text-white" style="font-size: 3rem;"></i>
                                </div>
                            @endif
                            <h4>{{ $gymClass->class_name }}</h4>
                            <span class="badge bg-{{ $gymClass->is_active ? 'success' : 'danger' }}">
                                {{ $gymClass->is_active ? 'Active' : 'Inactive' }}
                            </span>
                        </div>
                        <div class="col-md-8">
                            <div class="mb-3">
                                <h6>Basic Information</h6>
                                <hr class="mt-1 mb-2">
                                <p><strong>Category:</strong> {{ $gymClass->category }}</p>
                                <p><strong>Trainer:</strong> {{ $gymClass->trainer->name }}</p>
                                <p><strong>Level:</strong>
                                    <span class="badge
                                        @if($gymClass->level == 'beginner') bg-primary
                                        @elseif($gymClass->level == 'intermediate') bg-info
                                        @else bg-warning text-dark
                                        @endif">
                                        {{ ucfirst($gymClass->level) }}
                                    </span>
                                </p>
                            </div>

                            <div class="mb-3">
                                <h6>Schedule & Pricing</h6>
                                <hr class="mt-1 mb-2">
                                <p><strong>Schedule:</strong> {{ $gymClass->schedule }}</p>
                                <p><strong>Duration:</strong> {{ $gymClass->duration }}</p>
                                <p><strong>Price:</strong> ${{ number_format($gymClass->price, 2) }}</p>
                                <p><strong>Max Capacity:</strong> {{ $gymClass->max_capacity }} members</p>
                            </div>

                            <div class="mb-3">
                                <h6>Description</h6>
                                <hr class="mt-1 mb-2">
                                <div class="bg-light p-3 rounded">
                                    {{ $gymClass->description ?? 'No description provided' }}
                                </div>
                            </div>

                            <div class="d-flex justify-content-end mt-4">
                                <a href="{{ route('admin.gym-classes.edit', $gymClass->id) }}" class="btn btn-primary me-2">
                                    <i class="fas fa-edit me-1"></i> Edit
                                </a>
                                <form action="{{ route('admin.gym-classes.destroy', $gymClass->id) }}" method="POST"
                                      onsubmit="return confirm('Are you sure you want to delete this class?')">
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
