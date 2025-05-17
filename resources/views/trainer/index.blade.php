@extends('layouts.trainers')

@section('title', 'All Trainers')

@section('content')
<div class="card shadow mb-4">
    <div class="card-header py-3 d-flex justify-content-between align-items-center">
        <h6 class="m-0 font-weight-bold text-primary">Trainers List</h6>
        <a href="{{ route('trainer.create') }}" class="btn btn-primary btn-sm">
            <i class="fas fa-plus"></i> Add New
        </a>
    </div>
    <div class="card-body">
        @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        @endif

        <div class="table-responsive">
            <table class="table table-bordered table-hover" id="trainersTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Specialization</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($trainers as $trainer)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $trainer->name }}</td>
                        <td>{{ $trainer->email }}</td>
                        <td>{{ $trainer->phone ?? 'N/A' }}</td>
                        <td>{{ $trainer->specialization ?? 'N/A' }}</td>
                        <td>
                            <span class="badge badge-{{ $trainer->status == 'active' ? 'success' : 'secondary' }}">
                                {{ ucfirst($trainer->status) }}
                            </span>
                        </td>
                        <td>
                            <a href="{{ route('trainer.show', $trainer->id) }}" class="btn btn-info btn-sm" title="View">
                                <i class="fas fa-eye"></i>
                            </a>
                            <a href="{{ route('trainer.edit', $trainer->id) }}" class="btn btn-warning btn-sm" title="Edit">
                                <i class="fas fa-edit"></i>
                            </a>
                            <form action="{{ route('trainer.destroy', $trainer->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" title="Delete" onclick="return confirm('Are you sure?')">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                    <td>
    @if($trainer->image)
        <img src="{{ asset('storage/' . $trainer->image) }}" class="rounded-circle" width="40" height="40">
    @else
        <img src="https://ui-avatars.com/api/?name={{ urlencode($trainer->name) }}&background=4e73df&color=fff"
             class="rounded-circle" width="40" height="40">
    @endif
</td>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    $(document).ready(function() {
        $('#trainersTable').DataTable({
            responsive: true,
            dom: '<"top"f>rt<"bottom"lip><"clear">',
            language: {
                search: "_INPUT_",
                searchPlaceholder: "Search...",
            }
        });
    });
</script>
@endsection
