<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Complete Payment</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --primary-color: #fd7e14; /* Orange color */
            --secondary-color: #212529; /* Dark color */
            --light-color: #f8f9fa;
            --dark-color: #343a40;
        }

        body {
            background-color: var(--light-color);
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        .payment-card {
            max-width: 600px;
            margin: 50px auto;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
            border-radius: 10px;
            overflow: hidden;
            border: 1px solid #e9ecef;
        }
        .card-header {
            padding: 20px;
            text-align: center;
            background-color: var(--primary-color);
            color: white;
        }
        .card-body {
            padding: 30px;
            background: white;
        }
        .payment-btn {
            padding: 12px;
            font-size: 18px;
            font-weight: bold;
            transition: all 0.3s;
            background-color: var(--primary-color);
            border: none;
        }
        .payment-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(0,0,0,0.2);
            background-color: #e86103;
        }
        .payment-methods {
            margin: 20px 0;
        }
        .payment-method {
            border: 1px solid #ddd;
            border-radius: 5px;
            padding: 15px;
            margin-bottom: 10px;
            cursor: pointer;
            transition: all 0.3s;
            display: flex;
            align-items: center;
        }
        .payment-method.active {
            border-color: var(--primary-color);
            background-color: rgba(253, 126, 20, 0.1);
        }
        .payment-method:hover {
            border-color: var(--primary-color);
        }
        .payment-method i {
            font-size: 24px;
            margin-right: 10px;
            color: var(--primary-color);
        }
        .invalid-feedback {
            display: none;
            color: #dc3545;
            font-size: 0.875em;
            margin-top: 0.25rem;
        }
        .was-validated .form-control:invalid ~ .invalid-feedback,
        .was-validated .form-control:invalid ~ .invalid-tooltip {
            display: block;
        }
        .form-control.is-invalid {
            border-color: #dc3545;
            padding-right: calc(1.5em + 0.75rem);
            background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 12 12' width='12' height='12' fill='none' stroke='%23dc3545'%3e%3ccircle cx='6' cy='6' r='4.5'/%3e%3cpath stroke-linejoin='round' d='M5.8 3.6h.4L6 6.5z'/%3e%3ccircle cx='6' cy='8.2' r='.6' fill='%23dc3545' stroke='none'/%3e%3c/svg%3e");
            background-repeat: no-repeat;
            background-position: right calc(0.375em + 0.1875rem) center;
            background-size: calc(0.75em + 0.375rem) calc(0.75em + 0.375rem);
        }
        .bank-transfer-details {
            display: none;
            margin-top: 15px;
            padding: 15px;
            background-color: #f8f9fa;
            border-radius: 5px;
            border: 1px solid #dee2e6;
        }
        .cash-details {
            display: none;
            margin-top: 15px;
            padding: 15px;
            background-color: #f8f9fa;
            border-radius: 5px;
            border: 1px solid #dee2e6;
        }
    </style>
</head>
<body>
    <div class="container py-5">
        <div class="payment-card">
            <div class="card-header">
                <h3><i class="fas fa-lock"></i> Complete Payment</h3>
            </div>

            <div class="card-body">
                <div class="text-center mb-4">
                    <h4 class="text-dark">{{ $subscription->title }}</h4>
                    <div class="d-flex justify-content-center gap-4 mt-3">
                        <span class="badge bg-dark text-white fs-6">
                            <i class="fas fa-money-bill-wave"></i>
                            {{ number_format($subscription->subscribtion_amount, 2) }} JOD
                        </span>
                        <span class="badge bg-secondary text-white fs-6">
                            <i class="fas fa-calendar-alt"></i>
                            {{ $subscription->duration }}
                        </span>
                    </div>
                </div>

                <form method="POST" action="{{ route('payment.process') }}" class="mt-4 needs-validation" novalidate>
                    @csrf
                    <input type="hidden" name="subscription_id" value="{{ $subscription->id }}">
                    <input type="hidden" name="payment_method" id="payment_method" value="credit_card">

                    <div class="payment-methods">
                        <h5 class="mb-3">Select Payment Method:</h5>

                        <div class="payment-method active" data-method="credit_card">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="payment_method_radio" id="credit_card_radio" checked>
                                <label class="form-check-label" for="credit_card_radio">
                                    <i class="fab fa-cc-visa"></i>
                                    <span>Credit/Debit Card</span>
                                    <small class="text-muted d-block">Visa, Mastercard</small>
                                </label>
                            </div>
                        </div>

                        <div class="payment-method" data-method="bank_transfer">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="payment_method_radio" id="bank_transfer_radio">
                                <label class="form-check-label" for="bank_transfer_radio">
                                    <i class="fas fa-university"></i>
                                    <span>Bank Transfer</span>
                                    <small class="text-muted d-block">Direct bank transfer</small>
                                </label>
                            </div>
                        </div>

                        <div class="payment-method" data-method="cash">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="payment_method_radio" id="cash_radio">
                                <label class="form-check-label" for="cash_radio">
                                    <i class="fas fa-money-bill-wave"></i>
                                    <span>Cash Payment</span>
                                    <small class="text-muted d-block">Pay in cash at the gym</small>
                                </label>
                            </div>
                        </div>
                    </div>

                    <!-- Credit Card Form -->
                    <div id="credit-card-form">
                        <div class="form-group mb-3">
                            <label for="card_name" class="form-label">Cardholder Name</label>
                            <input type="text" id="card_name" name="card_name" class="form-control" required>
                            <div class="invalid-feedback">Please enter cardholder name</div>
                        </div>

                        <div class="form-group mb-3">
                            <label for="card_number" class="form-label">Card Number</label>
                            <input type="text" id="card_number" name="card_number" class="form-control" placeholder="1234 5678 9012 3456" required pattern="\d{16}">
                            <div class="invalid-feedback">Please enter a valid 16-digit card number</div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label for="expiry_date" class="form-label">Expiry Date</label>
                                    <input type="text" id="expiry_date" name="expiry_date" class="form-control" placeholder="MM/YY" required pattern="\d{2}/\d{2}">
                                    <div class="invalid-feedback">Please enter valid expiry date (MM/YY)</div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label for="cvv" class="form-label">CVV</label>
                                    <input type="text" id="cvv" name="cvv" class="form-control" placeholder="123" required pattern="\d{3}">
                                    <div class="invalid-feedback">Please enter valid CVV (3 digits)</div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Bank Transfer Details -->
                    <div id="bank-transfer-details" class="bank-transfer-details">
                        <h6><i class="fas fa-info-circle"></i> Bank Transfer Instructions</h6>
                        <p>Please transfer the amount to the following bank account:</p>
                        <ul class="list-unstyled">
                            <li><strong>Bank Name:</strong> Jordan Bank</li>
                            <li><strong>Account Name:</strong> Gym Sports Club</li>
                            <li><strong>Account Number:</strong> JO84XXXXXX1234567890123456</li>
                            <li><strong>Amount:</strong> {{ number_format($subscription->subscribtion_amount, 2) }} JOD</li>
                        </ul>
                        <div class="form-group mb-3">
                            <label for="transfer_receipt" class="form-label">Transfer Receipt (Optional)</label>
                            <input type="file" id="transfer_receipt" name="transfer_receipt" class="form-control">
                        </div>
                    </div>

                    <!-- Cash Payment Details -->
                    <div id="cash-details" class="cash-details">
                        <h6><i class="fas fa-info-circle"></i> Cash Payment Details</h6>
                        <p>You have selected to pay in cash at our gym location.</p>
                        <div class="alert alert-info">
                            <strong>Amount to pay:</strong> {{ number_format($subscription->subscribtion_amount, 2) }} JOD
                        </div>
                        <p>Please visit our gym to complete your payment and membership registration.</p>
                    </div>

                    <button type="submit" class="btn btn-primary payment-btn w-100 mt-3">
                        <i class="fas fa-lock"></i> Confirm Payment
                    </button>

                    <div class="text-center mt-3">
                        <small class="text-muted">
                            <i class="fas fa-lock"></i> All payments are securely encrypted
                        </small>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Switch between payment methods
        document.querySelectorAll('.payment-method').forEach(method => {
            method.addEventListener('click', function() {
                // Update active element
                document.querySelectorAll('.payment-method').forEach(m => {
                    m.classList.remove('active');
                    m.querySelector('.form-check-input').checked = false;
                });
                this.classList.add('active');
                this.querySelector('.form-check-input').checked = true;

                // Update selected payment method
                const paymentMethod = this.dataset.method;
                document.getElementById('payment_method').value = paymentMethod;

                // Show/hide sections based on payment method
                document.getElementById('credit-card-form').style.display =
                    paymentMethod === 'credit_card' ? 'block' : 'none';
                document.getElementById('bank-transfer-details').style.display =
                    paymentMethod === 'bank_transfer' ? 'block' : 'none';
                document.getElementById('cash-details').style.display =
                    paymentMethod === 'cash' ? 'block' : 'none';
            });
        });

        // Form validation
        (function() {
            'use strict';

            // Fetch all forms that need validation
            var forms = document.querySelectorAll('.needs-validation');

            // Prevent submission if invalid
            Array.prototype.slice.call(forms)
                .forEach(function(form) {
                    form.addEventListener('submit', function(event) {
                        if (!form.checkValidity()) {
                            event.preventDefault();
                            event.stopPropagation();
                        }

                        form.classList.add('was-validated');
                    }, false);
                });
        })();
    </script>
</body>
</html>
