@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    <h1 class="mb-4">Trainer Details</h1>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">{{ $trainer->name }}</h5>
            <p class="card-text"><strong>Email:</strong> {{ $trainer->email }}</p>
            <p class="card-text"><strong>Role:</strong> {{ $trainer->role }}</p>
            <p class="card-text"><strong>Bio:</strong> {{ $trainer->bio }}</p>
            <a href="{{ route('admin.trainers.edit', $trainer->id) }}" class="btn btn-warning">Edit</a>
            <form action="{{ route('admin.trainers.destroy', $trainer->id) }}" method="POST" class="d-inline">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
            </form>
        </div>
    </div>
</div>
@endsection
