@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    <div class="card shadow-lg">
        <div class="card-header bg-dark text-white d-flex justify-content-between align-items-center">
            <h3 class="mb-0">
                <i class="fas fa-users"></i> Members Management
                <span class="badge bg-primary ms-2">{{ $members->count() }}</span>
            </h3>
            <div>
                <a href="{{ route('admin.members.create') }}" class="btn btn-primary">
                    <i class="fas fa-plus-circle"></i> Add New Member
                </a>
            </div>
        </div>

        <div class="card-body">
            <!-- Search and Filter Card -->
            <div class="card mb-4 border-0 shadow-sm">
                <div class="card-body p-3">
                    <form action="{{ route('admin.members.index') }}" method="GET">
                        <div class="row g-3 align-items-end">
                            <!-- Search Field -->
                            <div class="col-md-4">
                                <label class="form-label small text-muted">Search</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="fas fa-search"></i></span>
                                    <input type="text" name="search" class="form-control"
                                           placeholder="Name, Email or Phone..." value="{{ request('search') }}">
                                </div>
                            </div>

                            <!-- Status Filter -->
                            <div class="col-md-2">
                                <label class="form-label small text-muted">Status</label>
                                <select name="status" class="form-select">
                                    <option value="">All Statuses</option>
                                    <option value="active" {{ request('status') == 'active' ? 'selected' : '' }}>Active</option>
                                    <option value="inactive" {{ request('status') == 'inactive' ? 'selected' : '' }}>Inactive</option>
                                    <option value="suspended" {{ request('status') == 'suspended' ? 'selected' : '' }}>Suspended</option>
                                </select>
                            </div>

                            <!-- Membership Type Filter -->
                            <div class="col-md-2">
                                <label class="form-label small text-muted">Membership</label>
                                <select name="membership_type" class="form-select">
                                    <option value="">All Types</option>
                                    @foreach(['Basic', 'Premium', 'VIP'] as $type)
                                        <option value="{{ $type }}" {{ request('membership_type') == $type ? 'selected' : '' }}>
                                            {{ $type }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <!-- Sort Options -->
                            <div class="col-md-2">
                                <label class="form-label small text-muted">Sort By</label>
                                <select name="sort" class="form-select">
                                    <option value="newest" {{ request('sort') == 'newest' ? 'selected' : '' }}>Newest First</option>
                                    <option value="oldest" {{ request('sort') == 'oldest' ? 'selected' : '' }}>Oldest First</option>
                                    <option value="name_asc" {{ request('sort') == 'name_asc' ? 'selected' : '' }}>Name (A-Z)</option>
                                    <option value="name_desc" {{ request('sort') == 'name_desc' ? 'selected' : '' }}>Name (Z-A)</option>
                                </select>
                            </div>

                            <!-- Action Buttons -->
                            <div class="col-md-2">
                                <button type="submit" class="btn btn-primary w-100">
                                    <i class="fas fa-filter"></i> Apply Filters
                                </button>
                            </div>

                            <div class="col-md-2">
                                <a href="{{ route('admin.members.index') }}" class="btn btn-outline-secondary w-100">
                                    <i class="fas fa-sync-alt"></i> Reset
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Members Table -->
            <div class="table-responsive">
                <table class="table table-hover align-middle">
                    <thead class="table-light">
                        <tr>
                            <th width="5%">ID</th>
                            <th width="20%">Member</th>
                            <th width="20%">Contact</th>
                            <th width="15%">Membership</th>
                            <th width="15%">Status</th>
                            <th width="15%">Join Date</th>
                            <th width="10%">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($members as $member)
                        <tr>
                            <td class="fw-bold">#{{ $member->id }}</td>
                            <td>
                                <div class="d-flex align-items-center">
                                    <div class="avatar avatar-md me-3">
                                        <span class="avatar-label bg-primary text-white">
                                            {{ substr($member->First_Name, 0, 1) }}{{ substr($member->Last_name, 0, 1) }}
                                        </span>
                                    </div>
                                    <div>
                                        <div class="fw-bold">{{ $member->First_Name }} {{ $member->Last_name }}</div>
                                        <div class="text-muted small">{{ $member->email ?? 'No email' }}</div>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="text-dark fw-bold">{{ $member->phone_number ?? 'N/A' }}</div>
                                <div class="text-muted small">{{ $member->Adress ?? 'No address' }}</div>
                            </td>
                            <td>
                                <span class="badge bg-{{ $member->membership_type == 'Premium' ? 'warning' : ($member->membership_type == 'VIP' ? 'purple' : 'info') }}">
                                    {{ $member->membership_type ?? 'N/A' }}
                                </span>
                            </td>
                            <td>
                                <span class="badge bg-{{ $member->status == 'active' ? 'success' : ($member->status == 'inactive' ? 'secondary' : 'danger') }}">
                                    {{ ucfirst($member->status) }}
                                </span>
                            </td>
                            <td>
                                @if($member->created_at)
        <div class="text-dark">{{ $member->created_at->format('d M Y') }}</div>
        <div class="text-muted small">{{ $member->created_at->diffForHumans() }}</div>
    @else
        <div class="text-dark">N/A</div>
        <div class="text-muted small">Date not available</div>
    @endif
                            </td>
                            <td>
                                <div class="d-flex gap-2">
                                    <a href="{{ route('admin.members.show', $member->id) }}"
                                       class="btn btn-sm btn-icon btn-info" title="View Details"
                                       data-bs-toggle="tooltip" data-bs-placement="top">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <a href="{{ route('admin.members.edit', $member->id) }}"
                                       class="btn btn-sm btn-icon btn-warning" title="Edit Member"
                                       data-bs-toggle="tooltip" data-bs-placement="top">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form action="{{ route('admin.members.destroy', $member->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-icon btn-danger"
                                                title="Delete Member" data-bs-toggle="tooltip" data-bs-placement="top"
                                                onclick="return confirm('Are you sure you want to delete this member?')">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="7" class="text-center py-5">
                                <div class="d-flex flex-column align-items-center">
                                    <i class="fas fa-users-slash fs-1 text-muted mb-3"></i>
                                    <h5 class="text-muted">No members found</h5>
                                    @if(request()->hasAny(['search', 'status', 'membership_type', 'sort']))
                                        <a href="{{ route('admin.members.index') }}" class="btn btn-sm btn-outline-primary mt-2">
                                            <i class="fas fa-sync-alt"></i> Reset Filters
                                        </a>
                                    @else
                                        <a href="{{ route('admin.members.create') }}" class="btn btn-sm btn-primary mt-2">
                                            <i class="fas fa-plus"></i> Add New Member
                                        </a>
                                    @endif
                                </div>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <!-- Pagination -->
            @if($members->hasPages())
            <div class="d-flex justify-content-between align-items-center mt-4">
                <div class="text-muted small">
                    Showing {{ $members->firstItem() }} to {{ $members->lastItem() }} of {{ $members->total() }} entries
                </div>
                <div>
                    {{ $members->appends(request()->query())->links('pagination::bootstrap-5') }}
                </div>
            </div>
            @endif
        </div>
    </div>
</div>
@endsection

@section('scripts')
@parent
<script>
    // Initialize tooltips
    document.addEventListener('DOMContentLoaded', function() {
        var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
        var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl)
        });
    });

    // Dynamic status update (if you implement status toggles)
    document.querySelectorAll('.status-toggle').forEach(toggle => {
        toggle.addEventListener('change', function() {
            const memberId = this.dataset.id;
            const status = this.checked ? 'active' : 'inactive';

            fetch(`/admin/members/${memberId}/status`, {
                method: 'PUT',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    'Accept': 'application/json'
                },
                body: JSON.stringify({ status: status })
            })
            .then(response => response.json())
            .then(data => {
                if(data.success) {
                    Toast.fire({
                        icon: 'success',
                        title: 'Member status updated successfully'
                    });
                }
            })
            .catch(error => {
                console.error('Error:', error);
            });
        });
    });
</script>
@endsection

@section('styles')
<style>
    .avatar {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        border-radius: 50%;
    }
    .avatar-md {
        width: 40px;
        height: 40px;
        font-size: 1rem;
    }
    .avatar-label {
        display: flex;
        align-items: center;
        justify-content: center;
        width: 100%;
        height: 100%;
        border-radius: 50%;
    }
    .badge.bg-purple {
        background-color: #6f42c1;
        color: white;
    }
    .table-hover tbody tr:hover {
        background-color: rgba(0, 0, 0, 0.02);
    }
</style>
@endsection
