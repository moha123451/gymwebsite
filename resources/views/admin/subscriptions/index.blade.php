@extends('layouts.admin')

@section('title', 'Manage Subscriptions')

@section('content')
<!-- SweetAlert2 CSS -->
<link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.3.10/dist/sweetalert2.min.css" rel="stylesheet">

<!-- SweetAlert2 JS -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.3.10/dist/sweetalert2.min.js"></script>

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
                                <a href="{{ route('admin.subscriptions.edit', $subscription->id) }}" class="btn btn-sm btn-primary hover-effect">
                                    <i class="fas fa-edit"></i> Edit
                                </a>
                                <form action="{{ route('admin.subscriptions.destroy', $subscription->id) }}" method="POST" style="display:inline;">
                                    <form action="{{ route('admin.subscriptions.destroy', $subscription->id) }}" method="POST" id="deleteForm{{ $subscription->id }}">
                                        @csrf
                                        @method('DELETE')
                                        <button type="button" class="btn btn-sm btn-danger hover-effect" onclick="deleteConfirmation({{ $subscription->id }})">
                                            <i class="fas fa-trash"></i> Delete
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
<style>
    .hover-effect {
        transition: all 0.3s ease;
        border-radius: 8px;
    }

    .hover-effect:hover {
        background: rgba(255, 255, 255, 0.1) !important;
        transform: translateX(5px);
    }

    .badge {
        font-size: 0.9rem;
        font-weight: 500;
        border-radius: 10px;
    }
</style>
<script>
    function deleteConfirmation(subscriptionId) {
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                // إنشاء النموذج وإرساله
                const form = document.createElement('form');
                form.method = 'POST';
                form.action = "{{ route('admin.subscriptions.destroy', ':id') }}".replace(':id', subscriptionId);

                // إضافة CSRF Token و Method DELETE
                const csrfToken = document.createElement('input');
                csrfToken.type = 'hidden';
                csrfToken.name = '_token';
                csrfToken.value = "{{ csrf_token() }}";
                form.appendChild(csrfToken);

                const methodField = document.createElement('input');
                methodField.type = 'hidden';
                methodField.name = '_method';
                methodField.value = 'DELETE';
                form.appendChild(methodField);

                // إضافة النموذج إلى body ثم تقديمه
                document.body.appendChild(form);
                form.submit();
            }
        });
    }
</script>

@endsection
