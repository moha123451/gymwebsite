@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    <h1 class="mb-4">Gym Classes</h1>
    <a href="{{ route('admin.gym-classes.create') }}" class="btn btn-primary mb-3">Add New Class</a>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Class Name</th>
                <th>Trainer</th>
                <th>Category</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($gymClasses as $class)
            <tr>
                <td>{{ $class->id }}</td>
                <td>{{ $class->class_name }}</td>
                <td>{{ $class->trainer->name }}</td> <!-- عرض اسم المدرب -->
                <td>{{ $class->category }}</td>
                <td>
                    <a href="{{ route('admin.gym-classes.show', $class->id) }}" class="btn btn-info btn-sm">View</a>
                    <a href="{{ route('admin.gym-classes.edit', $class->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('admin.gym-classes.destroy', $class->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
