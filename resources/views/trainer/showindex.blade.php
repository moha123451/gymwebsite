@extends('layouts.app') {{-- غيّرها حسب القالب اللي بتستخدمه --}}

@section('content')
<div class="container mt-5">
    <div class="row">
        <div class="col-md-4">
            <img src="{{ asset('storage/' . $trainer->image) }}" class="img-fluid rounded" alt="{{ $trainer->name }}">
        </div>
        <div class="col-md-8">
            <h2>{{ $trainer->name }}</h2>
          
            <p><strong>Email:</strong> {{ $trainer->email }}</p>
            <p><strong>Bio:</strong></p>
            <p>{{ $trainer->bio }}</p>
        </div>
    </div>
</div>
@endsection
