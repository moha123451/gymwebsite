@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    <div class="card shadow-lg">
        <div class="card-header bg-dark text-white d-flex justify-content-between align-items-center">
            <h3 class="mb-0">
                <i class="fas fa-users"></i> Members Management
                <span class="badge bg-primary ms-2">{{ $members->total() }}</span>
            </h3>
            <div>
                <a href="{{ route('admin.members.create') }}" class="btn btn-primary">
                    <i class="fas fa-plus-circle"></i> Add New Member
                </a>
            </div>
        </div>

        <div class="card-body">
            <!-- فلترة البحث -->
            <div class="card mb-4 border-0 shadow-sm">
                <div class="card-body p-3">
                    <form action="{{ route('admin.members.index') }}" method="GET">
                        <div class="row g-3 align-items-end">
                            <div class="col-md-3">
                                <label class="form-label small text-muted">Search</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="fas fa-search"></i></span>
                                    <input type="text" name="search" class="form-control" placeholder="Name or Email..."
                                           value="{{ request('search') }}">
                                </div>
                            </div>

                            <div class="col-md-2">
                                <label class="form-label small text-muted">Status</label>
                                <select name="status" class="form-select">
                                    <option value="">All Statuses</option>
                                    <option value="active" {{ request('status') == 'active' ? 'selected' : '' }}>Active</option>
                                    <option value="inactive" {{ request('status') == 'inactive' ? 'selected' : '' }}>Inactive</option>
                                </select>
                            </div>

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

                            <div class="col-md-2">
                                <label class="form-label small text-muted">Sort By</label>
                                <select name="sort" class="form-select">
                                    <option value="newest" {{ request('sort') == 'newest' ? 'selected' : '' }}>Newest First</option>
                                    <option value="oldest" {{ request('sort') == 'oldest' ? 'selected' : '' }}>Oldest First</option>
                                    <option value="name_asc" {{ request('sort') == 'name_asc' ? 'selected' : '' }}>Name (A-Z)</option>
                                    <option value="name_desc" {{ request('sort') == 'name_desc' ? 'selected' : '' }}>Name (Z-A)</option>
                                </select>
                            </div>

                            <div class="col-md-2">
                                <button type="submit" class="btn btn-primary w-100">
                                    <i class="fas fa-filter"></i> Apply
                                </button>
                            </div>

                            <div class="col-md-1">
                                <a href="{{ route('admin.members.index') }}" class="btn btn-outline-secondary w-100" title="Reset">
                                    <i class="fas fa-sync-alt"></i>
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <!-- جدول الأعضاء -->
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
                                    <div class="symbol symbol-40px me-3">
                                        <span class="symbol-label bg-light-primary text-primary fs-4 fw-bold">
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
                                <span class="badge bg-{{ $member->membership_type == 'Premium' ? 'warning' : 'info' }}">
                                    {{ $member->membership_type ?? 'N/A' }}
                                </span>
                            </td>
                            <td>
                                <span class="badge bg-{{ $member->status == 'active' ? 'success' : 'danger' }}">
                                    {{ ucfirst($member->status) }}
                                </span>
                            </td>
                            <td>
                                <div class="text-dark">{{ $member->created_at->format('d M Y') }}</div>
                                <div class="text-muted small">{{ $member->created_at->diffForHumans() }}</div>
                            </td>
                            <td>
                                <div class="d-flex gap-2">
                                    <a href="{{ route('admin.members.show', $member->id) }}"
                                       class="btn btn-sm btn-icon btn-info" title="View">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <a href="{{ route('admin.members.edit', $member->id) }}"
                                       class="btn btn-sm btn-icon btn-warning" title="Edit">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form action="{{ route('admin.members.destroy', $member->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-icon btn-danger"
                                                title="Delete" onclick="return confirm('Are you sure?')">
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
                                    <a href="{{ route('admin.members.create') }}" class="btn btn-sm btn-primary mt-2">
                                        <i class="fas fa-plus"></i> Add New Member
                                    </a>
                                </div>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <!-- الترقيم -->
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
<script>
    // Dynamic status update
    document.querySelectorAll('.status-toggle').forEach(toggle => {
        toggle.addEventListener('change', function() {
            const memberId = this.dataset.id;
            const status = this.checked ? 'active' : 'inactive';

            fetch(`/admin/members/${memberId}/status`, {
                method: 'PUT',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN':
