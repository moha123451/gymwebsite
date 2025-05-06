@extends('layouts.admin')

@section('title', 'Create New Subscription')

@section('content')
<!-- Include jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- Include Bootstrap Select CSS -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.18/css/bootstrap-select.min.css" rel="stylesheet">

<!-- Include Bootstrap Select JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.18/js/bootstrap-select.min.js"></script>

<div class="container-fluid">
    <div class="card shadow-lg border-0">
        <!-- Card Header -->
        <div class="card-header bg-gradient-gym py-4">
            <h3 class="m-0 font-weight-bold text-white text-center">
                <i class="fas fa-dumbbell mr-2"></i> Create New Subscription
            </h3>
        </div>

        <!-- Card Body -->
        <div class="card-body p-5">
            <form action="{{ route('admin.subscriptions.store') }}" method="POST" id="subscriptionForm">
                @csrf

                <div class="row">
                    <!-- Title -->
                    <div class="col-md-6">
                        <div class="form-group mb-4">
                            <label class="h5 text-dark">
                                <i class="fas fa-heading text-primary mr-2"></i> Subscription Name
                            </label>
                            <input type="text" class="form-control form-control-lg border-left-3 border-primary"
                                   name="title" value="{{ old('title') }}" required>
                        </div>
                    </div>

                    <!-- Amount -->
                    <div class="col-md-6">
                        <div class="form-group mb-4">
                            <label class="h5 text-dark">
                                <i class="fas fa-money-bill-wave text-success mr-2"></i> Price (JOD)
                            </label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text bg-light">JOD</span>
                                </div>
                                <input type="number" step="0.01" class="form-control form-control-lg"
                                       name="subscribtion_amount" value="{{ old('subscribtion_amount') }}" required>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Description -->
                <div class="form-group mb-4">
                    <label class="h5 text-dark">
                        <i class="fas fa-align-left text-info mr-2"></i> Description
                    </label>
                    <textarea class="form-control form-control-lg" name="description" rows="3" required>{{ old('description') }}</textarea>
                </div>

                <!-- Date & Time -->
                <div class="form-group mb-4">
                    <label class="h5 text-dark">
                        <i class="far fa-calendar-alt text-warning mr-2"></i> Date & Time
                    </label>
                    <input type="datetime-local" class="form-control form-control-lg"
                           name="date_time" value="{{ old('date_time') }}" required>
                </div>

                <!-- Duration -->
<div class="form-group mb-4">
    <label class="h5 text-dark">
        <i class="fas fa-clock text-danger mr-2"></i> Duration
    </label>
    <select class="form-control form-control-lg" name="duration" required>
        <option value="1 Month" {{ old('duration') == '1 Month' ? 'selected' : '' }}>1 Month</option>
        <option value="3 Months" {{ old('duration') == '3 Months' ? 'selected' : '' }}>3 Months</option>
        <option value="6 Months" {{ old('duration') == '6 Months' ? 'selected' : '' }}>6 Months</option>
        <option value="12 Months" {{ old('duration') == '12 Months' ? 'selected' : '' }}>12 Months</option>
    </select>
</div>


                <!-- Features -->
                <div class="form-group mb-4">
                    <label class="h5 text-dark">
                        <i class="fas fa-star text-purple mr-2"></i> Features
                    </label>
                    <textarea class="form-control form-control-lg" name="features" rows="3"
                              placeholder="Enter each feature on a new line">{{ old('features') }}</textarea>
                </div>

                <!-- Active Status -->
                <div class="form-group mb-4">
                    <div class="custom-control custom-switch">
                        <input type="checkbox" class="custom-control-input" id="is_active" name="is_active" {{ old('is_active', 1) ? 'checked' : '' }}>
                        <label class="custom-control-label h5" for="is_active">
                            <i class="fas fa-power-off text-success mr-2"></i> Activate Subscription
                        </label>
                    </div>
                </div>

                <!-- Buttons -->
                <div class="d-flex justify-content-between mt-5">
                    <a href="{{ route('admin.subscriptions.index') }}" class="btn btn-lg btn-outline-secondary">
                        <i class="fas fa-arrow-right ml-2"></i> Back
                    </a>
                    <button type="submit" class="btn btn-lg btn-primary px-5">
                        <i class="fas fa-save mr-2"></i> Save
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

    .selectpicker {
        height: calc(2.5em + 1rem + 2px) !important;
    }

    .custom-switch {
        padding-left: 3.5rem;
    }

    .custom-control-label::before {
        width: 2.5rem;
        height: 1.3rem;
        left: -3.5rem;
    }

    .custom-control-label::after {
        width: calc(1.3rem - 4px);
        height: calc(1.3rem - 4px);
        left: calc(-3.5rem + 2px);
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
</style>

<script>
    // Ensure the selectpicker is initialized
    $(document).ready(function() {
        $('.selectpicker').selectpicker();
    });
</script>

@endsection
