

<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>Manage Subscriptions</h2>
        <a href="{{ route('admin.subscriptions.create') }}" class="btn btn-primary">
            <i class="fas fa-plus"></i> Add New Subscription
        </a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Title</th>
                            <th>Amount (JOD)</th>
                            <th>Duration</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($subscriptions as $subscription)
                        <tr>
                            <td>{{ $subscription->title }}</td>
                            <td>{{ number_format($subscription->subscribtion_amount, 2) }}</td>
                            <td>{{ $subscription->duration }}</td>
                            <td>
                                <span class="badge {{ $subscription->is_active ? 'bg-success' : 'bg-secondary' }}">
                                    {{ $subscription->is_active ? 'Active' : 'Inactive' }}
                                </span>
                            </td>
                            <td>
                                <a href="{{ route('admin.subscriptions.edit', $subscription->id) }}" class="btn btn-sm btn-primary">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{ route('admin.subscriptions.destroy', $subscription->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

