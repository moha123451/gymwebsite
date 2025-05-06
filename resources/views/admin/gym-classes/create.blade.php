@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    <div class="card shadow">
        <div class="card-header">
            <h5 class="mb-0">Add New Class</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.gym-classes.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="class_name" class="form-label">Class Name</label>
                            <input type="text" class="form-control" id="class_name" name="class_name" required>
                        </div>

                        <div class="mb-3">
                            <label for="trainer_id" class="form-label">Trainer</label>
                            <select class="form-select" id="trainer_id" name="trainer_id" required>
                                <option value="">Select Trainer</option>
                                @foreach($trainers as $trainer)
                                <option value="{{ $trainer->id }}">{{ $trainer->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="category" class="form-label">Category</label>
                            <input type="text" class="form-control" id="category" name="category" required>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="image" class="form-label">Class Image</label>
                            <input type="file" class="form-control" id="image" name="image">
                            <small class="text-muted">Max 2MB (JPEG, PNG, JPG)</small>
                        </div>

                        <div class="mb-3">
                            <label for="bio" class="form-label">Description</label>
                            <textarea class="form-control" id="bio" name="bio" rows="4"></textarea>
                        </div>
                    </div>
                </div>

                <div class="d-flex justify-content-end gap-2">
                    <a href="{{ route('admin.gym-classes.index') }}" class="btn btn-secondary">
                        <i class="fas fa-arrow-left"></i> Cancel
                    </a>
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save"></i> Save Class
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
