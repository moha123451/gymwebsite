@extends('layouts.admin')

@section('title', 'Gym Classes')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card shadow-sm border-0">
                <div class="card-header bg-white d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Gym Classes</h5>
                    <a href="{{ route('admin.gym-classes.create') }}" class="btn btn-primary">
                        <i class="fas fa-plus me-2"></i>Add New Class
                    </a>
                </div>
                <div class="card-body">
                    @if (session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead class="table-light">
                                <tr>
                                    <th>#</th>
                                    <th>Image</th>
                                    <th>Class Name</th>
                                    <th>Trainer</th>
                                    <th>Schedule</th>
                                    <th>Level</th>
                                    <th>Price</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($gymClasses as $class)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>
                                        @if($class->image)
                                            <img src="{{ asset('storage/' . $class->image) }}" alt="{{ $class->class_name }}" class="rounded" width="50" height="50">
                                        @else
                                            <div class="bg-secondary rounded d-flex align-items-center justify-content-center" style="width: 50px; height: 50px;">
                                                <i class="fas fa-dumbbell text-white"></i>
                                            </div>
                                        @endif
                                    </td>
                                    <td>{{ $class->class_name }}</td>
                                    <td>{{ $class->trainer->name }}</td>
                                    <td>{{ $class->schedule }}</td>
                                    <td>
                                        <span class="badge
                                            @if($class->level == 'beginner') bg-primary
                                            @elseif($class->level == 'intermediate') bg-info
                                            @else bg-warning text-dark
                                            @endif">
                                            {{ ucfirst($class->level) }}
                                        </span>
                                    </td>
                                    <td>${{ number_format($class->price, 2) }}</td>
                                    <td>
                                        <span class="badge bg-{{ $class->is_active ? 'success' : 'danger' }}">
                                            {{ $class->is_active ? 'Active' : 'Inactive' }}
                                        </span>
                                    </td>
                                    <td>
                                        <div class="d-flex gap-2">
                                            <a href="{{ route('admin.gym-classes.show', $class->id) }}" class="btn btn-sm btn-info" title="View">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                            <a href="{{ route('admin.gym-classes.edit', $class->id) }}" class="btn btn-sm btn-primary" title="Edit">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <form action="{{ route('admin.gym-classes.destroy', $class->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this class?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger" title="Delete">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
