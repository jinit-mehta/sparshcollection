<!-- Include Header -->
<?= view('FrontEnd/includes/header') ?>

<!-- Custom CSS for Animations and Styling -->
<style>
    /* Base Color and Font */
    :root {
        --base-color: #273B79;
        --font-family: 'Playfair Display', serif;
    }

    /* Apply Playfair Display Font */
    body {
        font-family: var(--font-family);
    }

    /* Fade-in Animation */
    @keyframes fadeIn {
        from {
            opacity: 0;
            transform: translateY(20px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    /* Card Styling */
    .card {
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        border: none;
        border-radius: 15px;
        overflow: hidden;
    }

    .card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
    }

    /* Card Header */
    .card-header {
        background-color: var(--base-color);
        color: white;
        font-size: 1.5rem;
        font-weight: 600;
        padding: 1.5rem;
        border-bottom: none;
    }

    /* Success Alert */
    .alert-success {
        background-color: #d4edda;
        color: #155724;
        border-color: #c3e6cb;
        animation: fadeIn 1s ease-in-out;
        border-radius: 10px;
        padding: 1rem;
        margin-bottom: 1.5rem;
    }

    /* List Group Styling */
    .list-group-item {
        border: none;
        padding: 1rem 1.5rem;
        font-size: 1rem;
        color: #333;
        animation: fadeIn 0.5s ease-in-out;
        animation-fill-mode: backwards;
    }

    .list-group-item:nth-child(1) {
        animation-delay: 0.2s;
    }

    .list-group-item:nth-child(2) {
        animation-delay: 0.4s;
    }

    .list-group-item:nth-child(3) {
        animation-delay: 0.6s;
    }

    .list-group-item:nth-child(4) {
        animation-delay: 0.8s;
    }

    .list-group-item:nth-child(5) {
        animation-delay: 1s;
    }

    /* Button Styling */
    .btn-primary,
    .btn-secondary {
        font-size: 1rem;
        font-weight: 600;
        padding: 0.75rem 1.5rem;
        border-radius: 8px;
        transition: background-color 0.3s ease, transform 0.3s ease;
    }

    .btn-primary {
        background-color: var(--base-color);
        border: none;
    }

    .btn-primary:hover {
        background-color: #1c2c5a;
        transform: scale(1.05);
    }

    .btn-secondary {
        background-color: #6c757d;
        border: none;
    }

    .btn-secondary:hover {
        background-color: #5a6268;
        transform: scale(1.05);
    }

    /* Download Invoice Button Animation */
    .btn-primary.animate__animated.animate__pulse {
        animation-iteration-count: infinite;
    }

    /* Section Padding */
    #payment-success {
        padding: 4rem 0;
    }

    /* Responsive Adjustments */
    @media (max-width: 768px) {
        .card-header {
            font-size: 1.25rem;
        }

        .list-group-item {
            font-size: 0.9rem;
        }

        .btn-primary,
        .btn-secondary {
            font-size: 0.9rem;
            padding: 0.5rem 1rem;
        }
    }
</style>

<!-- Payment Success Section -->
<section id="payment-success" class="py-5">
    <div class="container-xl">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow-lg animate__animated animate__fadeInUp">
                    <div class="card-header">
                        <h3 class="card-title mb-0" style="color: white;">Payment Successful</h3>
                    </div>
                    <div class="card-body">
                        <!-- Success Alert -->
                        <div class="alert alert-success animate__animated animate__fadeIn">
                            <p class="mb-0">Thank you for your payment! Your order has been successfully processed.</p>
                        </div>

                        <!-- Order Details -->
                        <h4 class="mt-4">Order Details</h4>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item"><strong>Order ID:</strong> <?= $payment_id ?></li>
                            <li class="list-group-item"><strong>Customer Name:</strong> <?= $customer_name ?></li>
                            <li class="list-group-item"><strong>Total Amount:</strong>
                                ₹<?= number_format($total_amount, 2) ?></li>
                            <li class="list-group-item"><strong>Payment Method:</strong> <?= $payment_method ?></li>
                            <li class="list-group-item"><strong>Status:</strong> <?= $status ?></li>
                        </ul>

                        <!-- Download Invoice Button -->
                        <!-- Download Invoice Button -->
<div class="mt-4 text-center">
    <a href="<?= base_url('download-invoice/' . $payment_id) ?>"
        class="btn btn-primary btn-lg animate__animated animate__pulse animate__infinite">
        <i class="fas fa-download me-2"></i> Download Invoice
    </a>
</div>

                        <!-- Continue Shopping Button -->
                        <div class="mt-3 text-center">
                            <a href="<?= base_url('/') ?>" class="btn btn-secondary btn-lg">
                                <i class="fas fa-home me-2"></i> Continue Shopping
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Include Footer -->
<?= view('FrontEnd/includes/footer') ?>

<!-- Add JavaScript for Additional Animations -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.js"></script>
<script>
    // Add additional animations on page load
    document.addEventListener('DOMContentLoaded', function () {
        const card = document.querySelector('.card');
        card.classList.add('animate__animated', 'animate__fadeInUp');
    });
</script>