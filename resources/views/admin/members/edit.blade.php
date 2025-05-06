@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    <div class="card shadow-lg">
        <div class="card-header bg-dark text-white">
            <h3 class="mb-0">Edit Member: {{ $member->First_Name }}</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.members.update', $member->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label">First Name</label>
                            <input type="text" class="form-control" name="First_Name"
                                   value="{{ old('First_Name', $member->First_Name) }}" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Last Name</label>
                            <input type="text" class="form-control" name="Last_name"
                                   value="{{ old('Last_name', $member->Last_name) }}" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Email</label>
                            <input type="email" class="form-control" name="email"
                                   value="{{ old('email', $member->email) }}">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">New Password</label>
                            <input type="password" class="form-control" name="password">
                            <small class="text-muted">Leave empty to keep current password</small>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label">Phone Number</label>
                            <input type="text" class="form-control" name="phone_number"
                                   value="{{ old('phone_number', $member->phone_number) }}">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Date of Birth</label>
                            <input type="date" class="form-control" name="date_of_birth"
                                   value="{{ old('date_of_birth', $member->date_of_birth) }}">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Gender</label>
                            <select class="form-select" name="Gender">
                                <option value="">Select Gender</option>
                                <option value="Male" {{ $member->Gender == 'Male' ? 'selected' : '' }}>Male</option>
                                <option value="Female" {{ $member->Gender == 'Female' ? 'selected' : '' }}>Female</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Membership Type</label>
                            <input type="text" class="form-control" name="membership_type"
                                   value="{{ old('membership_type', $member->membership_type) }}">
                        </div>
                    </div>
                </div>

                <div class="d-flex justify-content-end gap-2">
                    <a href="{{ route('admin.members.index') }}" class="btn btn-secondary">
                        <i class="fas fa-times"></i> Cancel
                    </a>
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save"></i> Update Member
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
