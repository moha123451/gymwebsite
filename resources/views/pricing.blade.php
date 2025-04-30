<!-- Pricing Section Begin -->
<section class="pricing-section service-pricing spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title">
                    <span>Our Plan</span>
                    <h2>Choose your pricing plan</h2>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            @foreach($plans as $plan)
                <div class="col-lg-4 col-md-8">
                    <div class="ps-item">
                        <h3>{{ $plan->name }}</h3>
                        <div class="pi-price">
                            <h2>${{ $plan->price }}</h2>
                            <span>{{ $plan->duration }}</span>
                        </div>
                        <ul>
                            @foreach($plan->features as $feature)
                                <li>{{ $feature }}</li>
                            @endforeach
                        </ul>
                        <a href="{{ route('plan.enroll', $plan->id) }}" class="primary-btn pricing-btn">Enroll now</a>
                        <a href="{{ route('plan.details', $plan->id) }}" class="thumb-icon"><i class="fa fa-picture-o"></i></a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
<!-- Pricing Section End -->
