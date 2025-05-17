@extends('layouts.app')

@section('content')
<div class="trainer-profile-page">
    <!-- Back Button -->
    <div class="container mb-4">
        <a href="{{ url('/') }}" class="btn btn-outline-secondary">
            <i class="fas fa-arrow-left me-2"></i> Back to Home
        </a>
    </div>

    <!-- Trainer Profile Section -->
    <div class="container">
        <div class="row g-5">
            <!-- Trainer Image Column -->
            <div class="col-lg-5">
                <div class="trainer-image-container shadow-lg rounded-3 overflow-hidden">
                    <img src="{{ asset('storage/' . $trainer->image) }}"
                         alt="{{ $trainer->name }}"
                         class="img-fluid w-100 trainer-main-image">
                </div>

                <!-- Social Links -->
                <div class="social-links mt-4 text-center">
                    <a href="#" class="btn btn-outline-primary btn-sm mx-1">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <a href="#" class="btn btn-outline-info btn-sm mx-1">
                        <i class="fab fa-twitter"></i>
                    </a>
                    <a href="#" class="btn btn-outline-danger btn-sm mx-1">
                        <i class="fab fa-instagram"></i>
                    </a>
                    <a href="#" class="btn btn-outline-dark btn-sm mx-1">
                        <i class="fab fa-linkedin-in"></i>
                    </a>
                </div>
            </div>

            <!-- Trainer Details Column -->
            <div class="col-lg-7">
                <div class="trainer-details-card shadow-sm rounded-3 p-4">
                    <!-- Name and Role -->
                    <div class="trainer-header mb-4">
                        <h1 class="trainer-name">{{ $trainer->name }}</h1>
                        <h3 class="trainer-role text-primary">{{ $trainer->role }}</h3>
                        <div class="specialization-badge mt-2">
                            <span class="badge bg-secondary">{{ $trainer->specialization }}</span>
                        </div>
                    </div>

                    <!-- Contact Information -->
                    <div class="contact-info-section mb-5">
                        <h4 class="section-title mb-3">
                            <i class="fas fa-id-card me-2"></i> Contact Information
                        </h4>

                        <div class="row g-3">
                            <div class="col-md-6">
                                <div class="contact-item">
                                    <h6 class="contact-label">Email</h6>
                                    <p class="contact-value">
                                        <i class="fas fa-envelope me-2 text-muted"></i>
                                        {{ $trainer->email }}
                                    </p>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="contact-item">
                                    <h6 class="contact-label">Phone</h6>
                                    <p class="contact-value">
                                        <i class="fas fa-phone me-2 text-muted"></i>
                                        {{ $trainer->phone ?? 'Not provided' }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Bio Section -->
                    <div class="bio-section mb-5">
                        <h4 class="section-title mb-3">
                            <i class="fas fa-user me-2"></i> About Me
                        </h4>
                        <div class="bio-content">
                            <p>{{ $trainer->bio }}</p>
                        </div>
                    </div>

                    <!-- Classes Section -->
                    <div class="classes-section">
                        <h4 class="section-title mb-3">
                            <i class="fas fa-dumbbell me-2"></i> My Classes
                        </h4>

                        <div class="classes-list">
                            @forelse($trainer->classes as $class)
                            <div class="class-item mb-3 p-3 border rounded">
                                <div class="d-flex justify-content-between">
                                    <h5 class="class-name mb-1">{{ $class->class_name }}</h5>
                                    <span class="badge bg-{{ $class->level == 'beginner' ? 'primary' : ($class->level == 'intermediate' ? 'info' : 'warning') }}">
                                        {{ ucfirst($class->level) }}
                                    </span>
                                </div>
                                <p class="class-schedule mb-1">
                                    <i class="far fa-clock me-1"></i> {{ $class->schedule }}
                                </p>
                                <a href="{{ route('classes.show', $class->id) }}" class="btn btn-sm btn-outline-primary mt-2">
                                    View Details
                                </a>
                            </div>
                            @empty
                            <p class="text-muted">No classes assigned yet</p>
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .trainer-profile-page {
        padding: 3rem 0;
        background-color: #f8f9fa;
    }

    .trainer-image-container {
        border: 5px solid white;
        box-shadow: 0 10px 30px rgba(0,0,0,0.1);
    }

    .trainer-main-image {
        height: 500px;
        object-fit: cover;
    }

    .trainer-name {
        font-weight: 700;
        color: #2c3e50;
        margin-bottom: 0.5rem;
    }

    .trainer-role {
        font-weight: 600;
        margin-bottom: 0.5rem;
    }

    .trainer-details-card {
        background: white;
        height: 100%;
    }

    .section-title {
        font-weight: 600;
        color: #2c3e50;
        border-bottom: 2px solid #f1f1f1;
        padding-bottom: 0.5rem;
    }

    .contact-label {
        font-size: 0.8rem;
        text-transform: uppercase;
        color: #7f8c8d;
        margin-bottom: 0.3rem;
    }

    .contact-value {
        font-size: 1.1rem;
        margin-bottom: 0;
    }

    .bio-content {
        line-height: 1.8;
        color: #34495e;
    }

    .class-item {
        transition: all 0.3s ease;
    }

    .class-item:hover {
        background-color: #f8f9fa;
        transform: translateX(5px);
    }
</style>
@endsection
