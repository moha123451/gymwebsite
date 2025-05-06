@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    <div class="card shadow">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Class Details: {{ $gymClass->class_name }}</h5>
            <div class="d-flex gap-2">
                <a href="{{ route('admin.gym-classes.edit', $gymClass->id) }}" class="btn btn-warning btn-sm">
                    <i class="fas fa-edit"></i> Edit
                </a>
                <form action="{{ route('admin.gym-classes.destroy', $gymClass->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm delete-btn">
                        <i class="fas fa-trash"></i> Delete
                    </button>
                </form>
            </div>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-4">
                    @if($gymClass->image)
                    <img src="{{ asset('storage/'.$gymClass->image) }}" class="img-fluid rounded mb-3">
                    @else
                    <div class="bg-light p-5 text-center text-muted rounded mb-3">
                        <i class="fas fa-image fa-3x mb-2"></i>
                        <p>No Image Available</p>
                    </div>
                    @endif
                </div>
                <div class="col-md-8">
                    <table class="table table-bordered">
                        <tr>
                            <th width="30%">Class Name</th>
                            <td>{{ $gymClass->class_name }}</td>
                        </tr>
                        <tr>
                            <th>Trainer</th>
                            <td>{{ $gymClass->trainer->name ?? 'N/A' }}</td>
                        </tr>
                        <tr>
                            <th>Category</th>
                            <td>{{ $gymClass->category }}</td>
                        </tr>
                        <tr>
                            <th>Description</th>
                            <td>{{ $gymClass->bio ?? 'No description available' }}</td>
                        </tr>
                        <tr>
                            <th>Created At</th>
                            <td>{{ $gymClass->created_at->format('d M Y, h:i A') }}</td>
                        </tr>
                        <tr>
                            <th>Last Updated</th>
                            <td>{{ $gymClass->updated_at->format('d M Y, h:i A') }}</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    // SweetAlert for delete confirmation
    document.querySelector('.delete-btn').addEventListener('click', function(e) {
        e.preventDefault();
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                this.closest('form').submit();
            }
        })
    });
</script>
@endsection
