@extends('layouts.admin')

@section('title', 'Create New Class')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm border-0">
                <div class="card-header bg-white">
                    <h5 class="mb-0">Create New Class</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.gym-classes.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="class_name" class="form-label">Class Name *</label>
                                <input type="text" class="form-control" id="class_name" name="class_name" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="trainer_id" class="form-label">Trainer *</label>
                                <select class="form-select" id="trainer_id" name="trainer_id" required>
                                    <option value="">Select Trainer</option>
                                    @foreach($trainers as $trainer)
                                        <option value="{{ $trainer->id }}">{{ $trainer->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="category" class="form-label">Category *</label>
                                <input type="text" class="form-control" id="category" name="category" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="level" class="form-label">Level *</label>
                                <select class="form-select" id="level" name="level" required>
                                    <option value="">Select Level</option>
                                    @foreach(['beginner' => 'Beginner', 'intermediate' => 'Intermediate', 'advanced' => 'Advanced'] as $key => $value)
                                        <option value="{{ $key }}">{{ $value }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="schedule" class="form-label">Schedule *</label>
                                <input type="text" class="form-control" id="schedule" name="schedule" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="duration" class="form-label">Duration *</label>
                                <input type="text" class="form-control" id="duration" name="duration" required>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="price" class="form-label">Price ($) *</label>
                                <input type="number" step="0.01" class="form-control" id="price" name="price" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="max_capacity" class="form-label">Max Capacity *</label>
                                <input type="number" class="form-control" id="max_capacity" name="max_capacity" required>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="description" class="form-label">Description</label>
                            <textarea class="form-control" id="description" name="description" rows="3"></textarea>
                        </div>

                        <div class="mb-3">
                            <label for="image" class="form-label">Class Image</label>
                            <input type="file" class="form-control" id="image" name="image" accept="image/*">
                        </div>

                        <div class="form-check">
    <input type="checkbox" class="form-check-input" id="is_active" name="is_active"
           {{ old('is_active', isset($gymClass) && $gymClass->is_active ? 'checked' : '' }}>
    <label class="form-check-label" for="is_active">Active Class</label>
    </div>
                        <div class="d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary">Create Class</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
