<!-- Include Header -->
<?php @include('includes/header.php') ?>

<head>
    <style>
        /* Base Styles */
        body {
            font-family: 'Playfair Display', serif;
            line-height: 1.6;
            margin: 0;
            padding: 0;
        }

        .container-xl {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 1rem;
        }

        /* Color Circle Styling */
        .color-circle {
            width: 20px;
            height: 20px;
            border-radius: 50%;
            border: 2px solid #ddd;
            display: inline-block;
            cursor: pointer;
            transition: border-color 0.3s ease;
        }

        .color-circle:hover {
            border-color: #333;
        }

        /* Highlight selected color */
        .form-check-input:checked+.form-check-label .color-circle {
            border-color: #000;
            box-shadow: 0 0 0 2px rgba(0, 0, 0, 0.1);
        }

        /* Form Grid Layout */
        .checkout_1 {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 2rem;
            margin-top: 2rem;
        }

        .checkout_1l1 {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 1rem;
            margin-bottom: 1rem;
        }

        .checkout_1r {
            background: #f9f9f9;
            padding: 1.5rem;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        /* Responsive Adjustments */
        @media (max-width: 768px) {
            .checkout_1 {
                grid-template-columns: 1fr;
            }

            .checkout_1l1 {
                grid-template-columns: 1fr;
            }

            .color-circle {
                width: 15px;
                height: 15px;
            }

            .form-check-label {
                font-size: 0.875rem;
            }

            .checkout_1r {
                margin-top: 1.5rem;
            }
        }

        @media (max-width: 576px) {
            .color-circle {
                width: 12px;
                height: 12px;
            }

            .form-check-label {
                font-size: 0.75rem;
            }

            .checkout_1l1 .form-control,
            .checkout_1l1 .form-select {
                font-size: 0.875rem;
            }

            .checkout_1r {
                padding: 1rem;
            }
        }

        /* Button Styling */
        .button {
            background-color: #273B79;
            color: white;
            border: none;
            padding: 0.75rem 1.5rem;
            border-radius: 4px;
            cursor: pointer;
            font-size: 1rem;
            transition: background-color 0.3s ease;
        }

        .button:hover {
            background-color: #273B79;
        }

        /* Line Styling */
        .line {
            border: 0;
            height: 1px;
            background-color: #273B79;
            margin: 1rem 0;
        }

        /* Payment Options Styling */
        .payment-options {
            display: flex;
            gap: 1rem;
            align-items: center;
            margin-top: 1rem;
        }

        .payment-options .form-check {
            margin: 0;
        }

        /* Error Styling */
        .is-invalid {
            border-color: #dc3545 !important;
        }

        .invalid-feedback {
            color: #dc3545;
            font-size: 0.875rem;
            margin-top: 0.25rem;
        }
    </style>
</head>

<form id="paymentForm" method="POST">
   <!-- Change CSRF token input to use static name -->
<input type="hidden" name="csrf_token" value="<?= csrf_hash() ?>">
    <section id="checkout">
        <div class="container-xl">
            <div class="checkout_1">
                <!-- Left Column -->
                <div class="checkout_1l">
                    <h5>Make Your Checkout Here</h5>
                    <p>Please fill out the required information to expedite the checkout process.</p>
                    <div class="checkout_1l1">
                        <div>
                            <label for="first_name" class="font_13 fw-bold">First Name <span>*</span></label>
                            <input class="form-control" type="text" id="first_name" name="first_name" required>
                        </div>
                        <div>
                            <label for="last_name" class="font_13 fw-bold">Last Name <span>*</span></label>
                            <input class="form-control" type="text" id="last_name" name="last_name" required>
                        </div>
                    </div>
                    <div class="checkout_1l1">
                        <div>
                            <label for="email" class="font_13 fw-bold">Email Address <span>*</span></label>
                            <input class="form-control" type="email" id="email" name="email" required>
                        </div>
                        <div>
                            <label for="phone_number" class="font_13 fw-bold">Phone Number <span>*</span></label>
                            <input class="form-control" type="tel" id="phone_number" name="phone_number" required>
                        </div>
                    </div>
                    <div class="checkout_1l1">
                        <div>
                            <label for="country" class="font_13 fw-bold">Country <span>*</span></label>
                            <select class="form-select" id="country" name="country" required>
                                <option value="">Select Country</option>
                                <option>India</option>
                            </select>
                        </div>
                        <div>
                            <label for="state" class="font_13 fw-bold">State / Division <span>*</span></label>
                            <select class="form-select" id="state" name="state" required>
                                <option value="">Select State</option>
                                <option>Uttar Pradesh</option>
                                <option>Maharashtra</option>
                                <option>Madhya Pradesh</option>
                                <option>Bihar</option>
                                <option>Delhi</option>
                                <option>Jharkhand</option>
                            </select>
                        </div>
                    </div>
                    <div class="checkout_1l1">
                        <div>
                            <label for="address_line_1" class="font_13 fw-bold">Address Line 1 <span>*</span></label>
                            <input class="form-control" type="text" id="address_line_1" name="address_line_1" required>
                        </div>
                        <div>
                            <label for="address_line_2" class="font_13 fw-bold">Address Line 2 <span>*</span></label>
                            <input class="form-control" type="text" id="address_line_2" name="address_line_2" required>
                        </div>
                    </div>
                    <div class="checkout_1l1">
                        <div>
                            <label for="city" class="font_13 fw-bold">City <span>*</span></label>
                            <input class="form-control" type="text" id="city" name="city" required>
                        </div>
                        <div>
                            <label for="postal_code" class="font_13 fw-bold">Postal Code <span>*</span></label>
                            <input class="form-control" type="text" id="postal_code" name="postal_code" required>
                        </div>
                    </div>
                </div>
                <!-- Right Column -->
                <div class="checkout_1r">
    <h5>ORDER SUMMARY</h5>
    <hr class="line">
    <h6 class="fw-bold font_13">Sub Total <span class="pull-right">&#8377;<?= number_format($totalPrice, 2) ?></span></h6>
    <h6 class="fw-bold mt-3 font_13">(+) Shipping <span class="pull-right">&#8377;0.00</span></h6>
    <hr class="line">
    <input type="hidden" value="<?= number_format($totalPrice, 2) ?>" name="totalAmount">
    <h6 class="fw-bold font_13">Total <span class="pull-right">&#8377;<?= number_format($totalPrice, 2) ?></span></h6><br>
    <!-- Hidden fields for product specifications -->
    <input type="hidden" id="selectedColor" name="color" value="<?= $cartProducts[0]['color'] ?? 'N/A' ?>">
    <input type="hidden" id="length_bracelet" name="length_bracelet" value="<?= $cartProducts[0]['length_bracelet'] ?? 'N/A' ?>">
    <h5>PAYMENT METHODS</h5>
    <hr class="line">
                    <div class="payment-options">
                        <div class="form-check">
                            <input type="radio" class="form-check-input" id="cashOnDelivery" name="paymentMethod"
                                value="cashOnDelivery" required>
                            <label class="form-check-label" for="cashOnDelivery">Cash On Delivery</label>
                        </div>
                        <div class="form-check">
                            <input type="radio" class="form-check-input" id="razorpay" name="paymentMethod"
                                value="razorpay" required>
                            <label class="form-check-label" for="razorpay">Pay Online</label>
                        </div>
                    </div>
                    <button type="submit" class="button mt-3">Proceed to Payment</button>
                </div>
            </div>
        </div>
    </section>
</form>

<!-- Include Footer -->
<?php @include('includes/footer.php') ?>

<!-- Client-Side Validation and Razorpay Integration Script -->
<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const paymentForm = document.getElementById('paymentForm');
        if (paymentForm) {
            paymentForm.addEventListener('submit', function (e) {
                e.preventDefault();

                // Validate all required fields
                let isValid = true;
                const requiredFields = paymentForm.querySelectorAll('input[required], select[required]');
                                requiredFields.forEach(field => {
                    if (!field.value.trim()) {
                        isValid = false;
                        field.classList.add('is-invalid');
                        const errorMessage = document.createElement('div');
                        errorMessage.className = 'invalid-feedback';
                        errorMessage.textContent = 'This field is required.';
                        field.parentNode.appendChild(errorMessage);
                    } else {
                        field.classList.remove('is-invalid');
                        const errorMessage = field.parentNode.querySelector('.invalid-feedback');
                        if (errorMessage) {
                            errorMessage.remove();
                        }
                    }
                });

                if (!isValid) {
                    alert('Please fill out all required fields.');
                    return;
                }

                // Proceed with payment logic
                const paymentMethod = document.querySelector('input[name="paymentMethod"]:checked').value;
                const formData = {
                    first_name: document.querySelector('input[name="first_name"]').value,
                    last_name: document.querySelector('input[name="last_name"]').value,
                    email: document.querySelector('input[name="email"]').value,
                    phone_number: document.querySelector('input[name="phone_number"]').value,
                    country: document.querySelector('select[name="country"]').value,
                    state: document.querySelector('select[name="state"]').value,
                    address_line_1: document.querySelector('input[name="address_line_1"]').value,
                    address_line_2: document.querySelector('input[name="address_line_2"]').value,
                    city: document.querySelector('input[name="city"]').value,
                    postal_code: document.querySelector('input[name="postal_code"]').value,
                    color: document.querySelector('input[name="color"]').value,
                    length_bracelet: document.querySelector('input[name="length_bracelet"]').value,
                    totalAmount: document.querySelector('input[name="totalAmount"]').value
                };

                if (paymentMethod === 'cashOnDelivery') {
                    handleCashOnDelivery(formData);
                } else if (paymentMethod === 'razorpay') {
                    initiateRazorpayPayment(formData);
                }
            });
        }

        function handleCashOnDelivery(formData) {
            const form = document.getElementById('paymentForm');
            form.action = "<?= base_url('handleCashOnDelivery') ?>";
            form.submit();
        }

        function initiateRazorpayPayment(formData) {
            fetch("<?= base_url('initiateRazorpayPayment') ?>", {
                method: 'POST',
                // Update header to use static name
headers: {
    'Content-Type': 'application/json',
    'X-CSRF-TOKEN': document.querySelector('input[name="csrf_token"]').value
},
                body: JSON.stringify(formData)
            })
                .then(response => response.json())
                .then(data => {
                    if (data.status === 'success') {
                        const options = {
                            key: data.key,
                            amount: data.amount,
                            currency: data.currency,
                            order_id: data.order_id,
                            name: "Sparsh Collection",
                            description: "Transaction",
                            prefill: {
                                name: data.name,
                                email: data.email,
                                contact: data.contact
                            },
                            theme: {
                                color: "#3399cc"
                            },
                            handler: function (response) {
                                window.location.href = "<?= base_url('payment/success') ?>?payment_id=" + response.razorpay_payment_id + "&order_id=" + response.razorpay_order_id + "&signature=" + response.razorpay_signature;
                            },
                            modal: {
                                ondismiss: function () {
                                    window.location.href = "<?= base_url('payment/failed') ?>";
                                }
                            }
                        };
                        const rzp = new Razorpay(options);
                        rzp.open();
                    } else {
                        alert('Payment initiation failed: ' + data.message);
                        window.location.href = "<?= base_url('payment/failed') ?>";
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert('An error occurred. Please try again.');
                    window.location.href = "<?= base_url('payment/failed') ?>";
                });
        }
    });
</script>