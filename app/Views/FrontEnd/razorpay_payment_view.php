<!-- Include Header -->
<?php @include('includes/header.php') ?>

<section id="checkout">
    <div class="container-xl">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Complete Your Payment</h3>
                    </div>
                    <div class="card-body">
                        <!-- Payment Details -->
                        <div class="alert alert-info">
                            <p><strong>Order ID:</strong> <?= $order['id'] ?></p>
                            <p><strong>Amount:</strong> ₹<?= number_format($order['amount'] / 100, 2) ?></p>
                            <p><strong>Currency:</strong> <?= $order['currency'] ?></p>
                        </div>

                        <!-- Customer Details -->
                        <div class="alert alert-success">
                            <p><strong>Name:</strong> <?= $customer['customer_name'] ?></p>
                            <p><strong>Email:</strong> <?= $customer['customer_email'] ?></p>
                            <p><strong>Phone:</strong> <?= $customer['customer_phone_no'] ?></p>
                        </div>

                        <!-- Razorpay Payment Button -->
                        <form action="<?= base_url('razorpay/processPayment') ?>" method="POST">
                            <script
                                src="https://checkout.razorpay.com/v1/checkout.js"
                                data-key="<?= $key ?>"
                                data-amount="<?= $order['amount'] ?>"
                                data-currency="<?= $order['currency'] ?>"
                                data-order_id="<?= $order['id'] ?>"
                                data-buttontext="Pay Now"
                                data-name="Sparsh Collection"
                                data-description="Transaction"  
                                data-prefill.name="<?= $customer['customer_name'] ?>"
                                data-prefill.email="<?= $customer['customer_email'] ?>"
                                data-prefill.contact="<?= $customer['customer_phone_no'] ?>"
                                data-theme.color="#3399cc"
                            >
                            </script>
                            <input type="hidden" name="razorpay_order_id" value="<?= $order['id'] ?>">
                        </form>

                        <!-- Back to Cart Link -->
                        <div class="mt-3">
                            <a href="<?= base_url('cart') ?>" class="btn btn-secondary">
                                <i class="fas fa-arrow-left"></i> Back to Cart
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Include Footer -->
<?php @include('includes/footer.php') ?>