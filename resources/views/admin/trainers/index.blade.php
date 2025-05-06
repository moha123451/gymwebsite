
@extends('layouts.admin')

@section('content')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<div class="container-fluid">
    <h1 class="mb-4">Trainers List</h1>
    <a href="{{ route('admin.trainers.create') }}" class="btn btn-primary mb-3">Add New Trainer</a>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Role</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($trainers as $trainer)
            <tr>
                <td>{{ $trainer->id }}</td>
                <td>{{ $trainer->name }}</td>
                <td>{{ $trainer->email }}</td>
                <td>{{ $trainer->role }}</td>
                <td>
                    <a href="{{ route('admin.trainers.show', $trainer->id) }}" class="btn btn-info btn-sm">View</a>
                    <a href="{{ route('admin.trainers.edit', $trainer->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('admin.trainers.destroy', $trainer->id) }}" method="POST" class="d-inline" id="delete-form-{{ $trainer->id }}">
                        @csrf
                        @method('DELETE')
                        <button
                            type="button"
                            class="btn btn-danger btn-sm"
                            onclick="confirmDelete({{ $trainer->id }})"
                        >
                            Delete
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
<script>
    function confirmDelete(id) {
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById(`delete-form-${id}`).submit();
            }
        });
    }
    </script>
@endsection
