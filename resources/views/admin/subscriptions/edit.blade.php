@extends('layouts.admin')

@section('title', 'Edit Subscription')

@section('content')
<div class="container-fluid">
    <div class="card shadow-lg mb-4">
        <div class="card-header bg-gradient-gym py-4">
            <h6 class="m-0 font-weight-bold text-white text-center">Edit Subscription</h6>
        </div>
        <div class="card-body p-5">
            <form action="{{ route('admin.subscriptions.update', $subscription->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="row">
                    <!-- Title -->
                    <div class="col-md-6">
                        <div class="form-group mb-4">
                            <label for="title" class="h5 text-dark">
                                <i class="fas fa-heading text-primary mr-2"></i> Subscription Name
                            </label>
                            <input type="text" class="form-control form-control-lg border-left-3 border-primary"
                                   id="title" name="title" value="{{ old('title', $subscription->title) }}" required>
                        </div>
                    </div>

                    <!-- Amount -->
                    <div class="col-md-6">
                        <div class="form-group mb-4">
                            <label for="subscription_amount" class="h5 text-dark">
                                <i class="fas fa-money-bill-wave text-success mr-2"></i> Price (JOD)
                            </label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text bg-light">JOD</span>
                                </div>
                                <input type="number" step="0.01" class="form-control form-control-lg"
                                       id="subscription_amount" name="subscription_amount" value="{{ old('subscription_amount', $subscription->subscribtion_amount) }}" required>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Description -->
                <div class="form-group mb-4">
                    <label for="description" class="h5 text-dark">
                        <i class="fas fa-align-left text-info mr-2"></i> Description
                    </label>
                    <textarea class="form-control form-control-lg" id="description" name="description" rows="3" required>{{ old('description', $subscription->description) }}</textarea>
                </div>

                <!-- Features -->
                <div class="form-group mb-4">
                    <label for="features" class="h5 text-dark">
                        <i class="fas fa-star text-purple mr-2"></i> Features (One per line)
                    </label>
                    <textarea class="form-control form-control-lg" id="features" name="features" rows="5">{{ old('features', $subscription->features) }}</textarea>
                </div>

                <!-- Duration -->
                <div class="form-group mb-4">
                    <label for="duration" class="h5 text-dark">
                        <i class="fas fa-clock text-danger mr-2"></i> Duration
                    </label>
                    <input type="text" class="form-control form-control-lg" id="duration" name="duration" value="{{ old('duration', $subscription->duration) }}">
                </div>

                <!-- Date and Time -->
                <div class="form-group mb-4">
                    <label for="date_time" class="h5 text-dark">
                        <i class="far fa-calendar-alt text-warning mr-2"></i> Date & Time
                    </label>
                    <input type="datetime-local" class="form-control form-control-lg"
                           id="date_time" name="date_time" value="{{ \Carbon\Carbon::parse($subscription->date_time)->format('Y-m-d\TH:i') }}" required>
                </div>

                {{-- <!-- Active Status -->
                <div class="form-group form-check mb-4">
                    <input type="checkbox" class="form-check-input" id="is_active" name="is_active" value="1" {{ old('is_active', $subscription->is_active) ? 'checked' : '' }}>
                    <label class="form-check-label h5" for="is_active">
                        <i class="fas fa-power-off text-success mr-2"></i> Active
                    </label>
                </div> --}}

                <!-- Buttons -->
                <div class="d-flex justify-content-between mt-4">
                    <a href="{{ route('admin.subscriptions.index') }}" class="btn btn-lg btn-outline-secondary">
                        <i class="fas fa-arrow-left mr-2"></i> Back
                    </a>
                    <button type="submit" class="btn btn-lg btn-primary px-5">
                        <i class="fas fa-save mr-2"></i> Update
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Custom Styles for Dynamic Design -->
<style>
    .bg-gradient-gym {
        background: linear-gradient(135deg, #ff7e5f 0%, #feb47b 100%);
    }

    .border-left-3 {
        border-left: 3px solid !important;
    }

    .form-control-lg {
        height: calc(2.5em + 1rem + 2px);
        font-size: 1.1rem;
    }

    .btn-lg {
        padding: 0.8rem 2rem;
        font-size: 1.1rem;
        border-radius: 0.5rem;
    }

    .card {
        border-radius: 15px;
        overflow: hidden;
    }

    .form-check-label {
        font-size: 1rem;
        font-weight: 500;
    }

    /* Add a transition effect for hover on the buttons */
    .btn:hover {
        transform: scale(1.05);
        transition: 0.3s ease-in-out;
    }

    .form-group {
        margin-bottom: 1.5rem;
    }
</style>

@endsection
