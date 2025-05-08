@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    <div class="card shadow-lg">
        <div class="card-header bg-dark text-white">
            <a href="{{ route('admin.members.show', $member->id) }}">View Details</a>
            <h3 class="mb-0">Member Details: {{ $member->First_Name }}</h3>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered">
                        <tr>
                            <th>First Name</th>
                            <td>{{ $member->First_Name }}</td>
                        </tr>
                        <tr>
                            <th>Last Name</th>
                            <td>{{ $member->Last_name }}</td>
                        </tr>
                        <tr>
                            <th>Email</th>
                            <td>{{ $member->email ?? 'N/A' }}</td>
                        </tr>
                        <tr>
                            <th>Phone Number</th>
                            <td>{{ $member->phone_number ?? 'N/A' }}</td>
                        </tr>
                    </table>
                </div>
                <div class="col-md-6">
                    <table class="table table-bordered">
                        <tr>
                            @if($member->created_at)
                            <div class="text-dark">{{ $member->created_at->format('d M Y') }}</div>
                            <div class="text-muted small">{{ $member->created_at->diffForHumans() }}</div>
                        @else
                            <div class="text-dark">N/A</div>
                            <div class="text-muted small">Date not available</div>
                        @endif
                        </tr>
                        <tr>
                            <th>Gender</th>
                            <td>{{ $member->Gender ?? 'N/A' }}</td>
                        </tr>
                        <tr>
                            <th>Membership Type</th>
                            <td>{{ $member->membership_type ?? 'N/A' }}</td>
                        </tr>
                        <tr>
                            <th>Registration Date</th>
                            <td>{{ $member->created_at->format('d M Y H:i') }}</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
