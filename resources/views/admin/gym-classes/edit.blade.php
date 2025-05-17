@extends('layouts.admin')

@section('title', 'Edit Class')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm border-0">
                <div class="card-header bg-white">
                    <h5 class="mb-0">Edit Class: {{ $gymClass->class_name }}</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.gym-classes.update', $gymClass->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="class_name" class="form-label">Class Name *</label>
                                <input type="text" class="form-control" id="class_name" name="class_name"
                                       value="{{ old('class_name', $gymClass->class_name) }}" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="trainer_id" class="form-label">Trainer *</label>
                                <select class="form-select" id="trainer_id" name="trainer_id" required>
                                    @foreach($trainers as $trainer)
                                        <option value="{{ $trainer->id }}"
                                            {{ $gymClass->trainer_id == $trainer->id ? 'selected' : '' }}>
                                            {{ $trainer->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="category" class="form-label">Category *</label>
                                <input type="text" class="form-control" id="category" name="category"
                                       value="{{ old('category', $gymClass->category) }}" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="level" class="form-label">Level *</label>
                                <select class="form-select" id="level" name="level" required>
                                    @foreach(['beginner' => 'Beginner', 'intermediate' => 'Intermediate', 'advanced' => 'Advanced'] as $key => $value)
                                        <option value="{{ $key }}"
                                            {{ $gymClass->level == $key ? 'selected' : '' }}>
                                            {{ $value }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="schedule" class="form-label">Schedule *</label>
                                <input type="text" class="form-control" id="schedule" name="schedule"
                                       value="{{ old('schedule', $gymClass->schedule) }}" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="duration" class="form-label">Duration *</label>
                                <input type="text" class="form-control" id="duration" name="duration"
                                       value="{{ old('duration', $gymClass->duration) }}" required>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="price" class="form-label">Price ($) *</label>
                                <input type="number" step="0.01" class="form-control" id="price" name="price"
                                       value="{{ old('price', $gymClass->price) }}" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="max_capacity" class="form-label">Max Capacity *</label>
                                <input type="number" class="form-control" id="max_capacity" name="max_capacity"
                                       value="{{ old('max_capacity', $gymClass->max_capacity) }}" required>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="description" class="form-label">Description</label>
                            <textarea class="form-control" id="description" name="description" rows="3">{{ old('description', $gymClass->description) }}</textarea>
                        </div>

                        <div class="mb-3">
                            <label for="image" class="form-label">Class Image</label>
                            @if($gymClass->image)
                                <div class="mb-2">
                                    <img src="{{ asset('storage/' . $gymClass->image) }}" alt="Current image"
                                         class="img-thumbnail" width="150">
                                    <div class="form-check mt-2">
                                        <input class="form-check-input" type="checkbox" id="remove_image" name="remove_image">
                                        <label class="form-check-label text-danger" for="remove_image">
                                            Remove current image
                                        </label>
                                    </div>
                                </div>
                            @endif
                            <input type="file" class="form-control" id="image" name="image" accept="image/*">
                        </div>

                        <div class="mb-3 form-check">
                            <input type="checkbox" class="form-check-input" id="is_active" name="is_active"
                                   {{ old('is_active', $gymClass->is_active) ? 'checked' : '' }}>
                            <label class="form-check-label" for="is_active">Active Class</label>
                        </div>

                        <div class="d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary me-2">Update Class</button>
                            <a href="{{ route('admin.gym-classes.index') }}" class="btn btn-secondary">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
