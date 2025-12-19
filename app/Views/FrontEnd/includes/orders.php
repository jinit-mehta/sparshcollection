<?php @include('header.php'); ?>

<?= $this->section('content') ?>
<div class="container my-5">
    <h1 class="mb-4">Your Orders</h1>
    <?php if (!empty($orders)): ?>
        <div class="row">
            <?php foreach ($orders as $order): ?>
                <div class="col-md-4 mb-4">
                    <div class="card h-100 shadow-sm">
                        <!-- Order Image -->
                        <?php
                        // Enhanced image handling logic
                        if (!empty($order['product_image'])) {
                            // Try to decode as JSON first (handles arrays of images)
                            $decodedImages = json_decode($order['product_image'], true);
                            
                            if (is_array($decodedImages) && !empty($decodedImages)) {
                                // If it's a JSON array, use the first image
                                $productImage = '/assets/images/upload/' . $decodedImages[0];
                            } else {
                                // If it's not a JSON array but has a value, use it directly
                                $productImage = '/assets/images/upload/' . $order['product_image'];
                            }
                        } else {
                            // Fallback to placeholder
                            $productImage = 'assets/images/upload/placeholder.jpg';
                        }

                        $imageUrl = base_url($productImage);
                        ?>

                        <img src="<?= $imageUrl ?>"
                             onerror="this.onerror=null;this.src='<?= base_url('assets/images/upload/placeholder.jpg') ?>';"
                             class="card-img-top"
                             alt="<?= esc($order['product_name']) ?>"
                             style="height: 200px; object-fit: cover;">

                        <div class="card-body">
                            <!-- Product Name -->
                            <h5 class="card-title"><?= $order['product_name'] ?></h5>

                            <!-- Price -->
                            <p class="card-text text-muted">
                                <strong>Price:</strong> $<?= number_format($order['total_amount'], 2) ?>
                            </p>

                            <!-- Order Date -->
                            <p class="card-text text-muted">
                                <strong>Order Date:</strong> <?= date('M d, Y', strtotime($order['created_at'])) ?>
                            </p>
<!-- Download Invoice Button -->
<?php if (!empty($order['payment_id'])): ?>
    <a href="<?= base_url('download-invoice/' . $order['payment_id']) ?>" class="btn btn-outline-secondary">
        <i class="fa fa-download"></i> Download Invoice
    </a>
<?php else: ?>
    <button class="btn btn-outline-secondary" disabled>
        <i class="fa fa-download"></i> Invoice Not Available
    </button>
<?php endif; ?>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    <?php else: ?>
        <div class="alert alert-info" role="alert">
            No orders found. Start shopping <a href="<?= base_url('/allproducts') ?>" class="alert-link">here</a>.
        </div>
    <?php endif; ?>
</div>

<?php @include('footer.php'); ?>