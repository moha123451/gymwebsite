@extends('layouts.app')

@section('content')
    <section class="bmi-result-section spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="bmi-result-title">
                        <h2>Your BMI Result</h2>
                    </div>
                    <div class="bmi-result">
                        <p>Your BMI: <strong>{{ $bmi }}</strong></p>
                        <p>Weight Status: <strong>{{ $status }}</strong></p>
                    </div>
                    <a href="{{ url('/bmi-calculator') }}" class="btn btn-primary">Try Again</a>
                </div>
            </div>
        </div>
    </section>
@endsection
