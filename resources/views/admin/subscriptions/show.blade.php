


<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between align-items-center">
            <h6 class="m-0 font-weight-bold text-primary">Subscription Details</h6>
            <div>
                <a href="{{ route('admin.subscriptions.edit', $subscription->id) }}" class="btn btn-sm btn-primary">
                    <i class="fas fa-edit"></i> Edit
                </a>
                <a href="{{ route('admin.subscriptions.index') }}" class="btn btn-sm btn-secondary">
                    <i class="fas fa-arrow-left"></i> Back to List
                </a>
            </div>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <tr>
                                <th width="30%">Title</th>
                                <td>{{ $subscription->title }}</td>
                            </tr>
                            <tr>
                                <th>Description</th>
                                <td>{{ $subscription->description }}</td>
                            </tr>
                            <tr>
                                <th>Price</th>
                                <td>{{ number_format($subscription->subscription_amount, 2) }} JOD</td>
                            </tr>
                            <tr>
                                <th>Duration</th>
                                <td>{{ $subscription->duration }}</td>
                            </tr>
                            <tr>
                                <th>Status</th>
                                <td>
                                    <span class="badge {{ $subscription->is_active ? 'badge-success' : 'badge-secondary' }}">
                                        {{ $subscription->is_active ? 'Active' : 'Inactive' }}
                                    </span>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <h6 class="m-0 font-weight-bold text-primary">Features</h6>
                        </div>
                        <div class="card-body">
                            <ul class="list-group">
                                @if($subscription->features)
                                    @foreach(explode("\n", $subscription->features) as $feature)
                                        @if(trim($feature))
                                            <li class="list-group-item">{{ $feature }}</li>
                                        @endif
                                    @endforeach
                                @else
                                    <li class="list-group-item text-muted">No features specified</li>
                                @endif
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <!-- تاريخ الإنشاء والتحديث -->
            <div class="mt-4 text-muted small">
                <p>Created at: {{ $subscription->created_at->format('Y-m-d H:i') }}</p>
                <p>Last updated: {{ $subscription->updated_at->format('Y-m-d H:i') }}</p>
            </div>
        </div>
    </div>
</div>

