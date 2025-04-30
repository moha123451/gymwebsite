


<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Create New Subscription</h6>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.subscriptions.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" class="form-control" id="title" name="title" required>
                </div>
                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea class="form-control" id="description" name="description" rows="3" required></textarea>
                </div>
                <div class="form-group">
                    <label for="subscription_amount">Amount (JOD)</label>
                    <input type="number" step="0.01" class="form-control" id="subscription_amount" name="subscription_amount" required>
                </div>
                <div class="form-group">
                    <label for="features">Features (One per line)</label>
                    <textarea class="form-control" id="features" name="features" rows="5"></textarea>
                </div>
                <div class="form-group">
                    <label for="duration">Duration</label>
                    <input type="text" class="form-control" id="duration" name="duration">
                </div>
                <div class="form-group form-check">
                    <input type="checkbox" class="form-check-input" id="is_active" name="is_active" value="1" checked>
                    <label class="form-check-label" for="is_active">Active</label>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>

