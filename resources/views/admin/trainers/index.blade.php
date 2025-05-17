@extends('layouts.admin')

@section('title', 'Manage Trainers')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card shadow-sm border-0">
                <div class="card-header bg-white d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Trainers List</h5>
                    <a href="{{ route('admin.trainers.create') }}" class="btn btn-primary">
                        <i class="fas fa-plus me-2"></i>Add New Trainer
                    </a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead class="table-light">
                                <tr>
                                    <th>#</th>
                                    <th>Image</th>
                                    <th>Name</th>
                                    <th>Specialization</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Role</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($trainers as $trainer)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>
                                        @if($trainer->image)
                                            <img src="{{ asset('storage/' . $trainer->image) }}" alt="{{ $trainer->name }}" class="rounded-circle" width="40" height="40">
                                        @else
                                            <div class="bg-secondary rounded-circle d-flex align-items-center justify-content-center" style="width: 40px; height: 40px;">
                                                <i class="fas fa-user-tie text-white"></i>
                                            </div>
                                        @endif
                                    </td>
                                    <td>{{ $trainer->name }}</td>
                                    <td>{{ $trainer->specialization ?? 'General' }}</td>
                                    <td>{{ $trainer->email }}</td>
                                    <td>{{ $trainer->phone ?? '-' }}</td>
                                    <td>{{ $trainer->role }}</td>
                                    <td>
                                        <div class="d-flex gap-2">
                                            <a href="{{ route('admin.trainers.show', $trainer->id) }}" class="btn btn-sm btn-info">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                            <a href="{{ route('admin.trainers.edit', $trainer->id) }}" class="btn btn-sm btn-primary">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <form action="{{ route('admin.trainers.destroy', $trainer->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this trainer?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger">
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
