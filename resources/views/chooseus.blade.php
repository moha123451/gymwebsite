@extends('layouts.app')

@section('content')
<!-- ChoseUs Section Begin -->
<section class="choseus-section spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title">
                    <span>Why choose us?</span>
                    <h2>PUSH YOUR LIMITS FORWARD</h2>
                </div>
            </div>
        </div>
        <div class="row">
            @foreach($chooseUsItems as $item)
                <div class="col-lg-3 col-sm-6">
                    <div class="cs-item">
                        <span class="{{ $item->icon_class }}"></span>
                        <h4>{{ $item->title }}</h4>
                        <p>{{ $item->description }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
<!-- ChoseUs Section End -->
@endsection
