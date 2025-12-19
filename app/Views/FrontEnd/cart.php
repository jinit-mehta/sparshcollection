<!-- Include Header -->
<?php @include('includes/header.php') ?>

<head>
    <link rel="stylesheet" href="<?= base_url('/assets/front/css/cart.css') ?>">
    <meta name="csrf-token" content="<?= csrf_token() ?>"> <!-- Add CSRF token for AJAX requests -->
    <style>
        /* Black Horizontal Lines */
        .black-line {
            border-color: black;
        }

        /* Remove Link Styling */
        .remove-link {
            color: #273B79;
            text-decoration: none;
            font-size: 18px;
            margin-top: 20px;
        }

        .remove-link:hover {
            text-decoration: underline;
        }

        /* Continue Shopping Link Styling */
        .continue-shopping-link {
            font-size: 20px;
            color: #273B79;
            text-decoration: none;
        }

        .continue-shopping-link:hover {
            text-decoration: underline;
        }

        /* BUY NOW Link Styling */
        .buy-now-link {
            font-size: 20px;
            color: white;
            background-color: #273B79;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 5px;
            display: inline-block;
            margin-top: 10px;
        }

        .buy-now-link:hover {
            color: white;
            background-color: #1c2a5e;
        }

        /* Subtotal Styling */
        .subtotal {
            font-size: 20px;
            font-weight: bold;
            color: #273B79;
        }

        /* Quantity Box Styling */
        .quantity-box {
            display: flex;
            align-items: center;
            justify-content: flex-start;
        }

        .quantity-btn {
            background-color: #273B79;
            color: white;
            border: none;
            padding: 8px 12px;
            cursor: pointer;
            font-size: 16px;
            height: 40px;
        }

        .quantity-input {
            width: 50px;
            text-align: center;
            border: 1px solid #ced4da;
            font-size: 14px;
            height: 40px;
            background-color: #273B79;
            color: white;
        }

        /* JavaScript Messages Styling */
        .alert-success,
        .alert-danger {
            background-color: #273B79;
            color: white;
            border: none;
            padding: 10px;
            border-radius: 5px;
            margin-bottom: 15px;
        }

        /* Empty Cart Message Styling */
        .empty-cart-message {
            text-align: center;
            font-size: 24px;
            color: #273B79;
            margin-top: 50px;
        }
    </style>
</head>
<section id="cart_page" class="cart pt-4 pb-4">
    <div class="container-xl">
        <div class="cart_2 row align-items-center">
            <div class="col-md-12 text-center">
                <h3 style="color:#273B79">MY CART</h3> <!-- Increased "MY CART" size -->
            </div>
        </div>
        <div class="cart_3 row mt-3">
            <div class="col-md-12">
                <div class="cart_3l">
                    <h5 style="color:#273B79">PRODUCT</h5>
                    <hr class="black-line">
                </div>
                <?php if (session()->has('success')): ?>
                    <div class="alert alert-success">
                        <?= session('success') ?>
                    </div>
                <?php endif; ?>
                <?php if (session()->has('error')): ?>
                    <div class="alert alert-danger">
                        <?= session('error') ?>
                    </div>
                <?php endif; ?>

                <?php if (empty($cartProducts)): ?>
                    <!-- Display "Cart is empty!" message if no products -->
                    <div class="empty-cart-message">
                        <p>Your cart is empty!</p>
                        <a class="continue-shopping-link" href="<?= base_url('/') ?>">Continue Shopping →</a>
                    </div>
                <?php else: ?>
                    <!-- Loop through cart products if cart is not empty -->
                    <?php foreach ($cartProducts as $cartProduct): ?>
                        <div class="cart_3l1 mt-3 row align-items-center ms-0 me-0">
                            <!-- Product Image -->
                            <div class="col-md-3 col-12 ps-0">
                                <div class="cart_3l1i">
                                    <?php
                                    $images = isset($cartProduct['product_images']) ? json_decode($cartProduct['product_images'], true) : [];
                                    $productImage = !empty($images) ? '/assets/images/upload/' . $images[0] : 'assets/images/upload/placeholder.jpg';
                                    $imageUrl = base_url($productImage);
                                    ?>
                                    <a href="#">
                                        <img src="<?= $imageUrl ?>"
                                            onerror="this.onerror=null;this.src='<?= base_url('assets/images/upload/placeholder.jpg') ?>';"
                                            alt="<?= esc($cartProduct['product_name']) ?>" class="w-100"
                                            style="object-fit: cover; height: 250px;"> <!-- Increased image size -->
                                    </a>
                                </div>
                            </div>
                            <!-- Product Details -->
                            <div class="col-md-6 col-12">
                                <div class="cart_3l1i1">
                                    <h6 class="fw-bold"><a href="<?= base_url('/product/single_product/' . $cartProduct['product_id']) ?>" style="font-size:20px"><?= esc($cartProduct['product_name']) ?></a></h6>
                                    <?php if (!empty($cartProduct['style_number'])): ?>
                                     <h6 class="fw-bold"><a href="#" style="font-size:20px"><?= esc($cartProduct['style_number']) ?></a></h6>           
                                     <?php endif; ?>
                                    <?php if (!empty($cartProduct['selected_color'])): ?>
                                        <p class="mb-1">Color: <?= esc($cartProduct['selected_color']) ?></p>
                                    <?php endif; ?>
                                    <?php if (!empty($cartProduct['selected_size'])): ?>
                                        <p class="mb-1">Size: <?= esc($cartProduct['selected_size']) ?></p>
                                    <?php endif; ?>
                                    <?php if (!empty($cartProduct['length_bracelet'])): ?>
                                        <p class="mb-1">Bracelet Length: <?= esc($cartProduct['length_bracelet']) ?></p>
                                    <?php endif; ?>
                                    <h5 class="col_oran mt-2">
                                        <span class="fw-bold">&#8377;<?= esc($cartProduct['product_price']) ?></span>
                                    </h5>
                                    <!-- Quantity Box -->
                                    <div class="quantity-box mt-3">
                                        <form method="post" action="<?= base_url('cart/update/' . $cartProduct['cart_id']) ?>"
                                            class="d-flex align-items-center">
                                            <button type="button" class="quantity-btn minus"
                                                onclick="updateQuantity(<?= $cartProduct['cart_id'] ?>, -1)">-</button>
                                            <input type="number" min="0" value="<?= esc($cartProduct['quantity']) ?>"
                                                class="quantity-input" name="quantity" readonly
                                                data-cart-id="<?= esc($cartProduct['cart_id']) ?>">
                                            <button type="button" class="quantity-btn plus"
                                                onclick="updateQuantity(<?= $cartProduct['cart_id'] ?>, 1)">+</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <!-- Remove Button at the Rightmost -->
                            <div class="col-md-3 col-12 text-end align-self-end">
                                <a class="remove-link"
                                    href="<?= base_url('cart/remove/' . $cartProduct['cart_id']) ?>"><u>REMOVE</u></a>
                            </div>
                        </div>
                        <!-- Black Horizontal Line Below Each Product -->
                        <hr class="black-line mt-3 mb-3">
                    <?php endforeach; ?>

                    <!-- Continue Shopping Link -->
                    <div class="text-center mt-4">
                        <a class="continue-shopping-link" href="<?= base_url('/') ?>">Continue Shopping →</a>
                    </div>

                    <!-- Order Summary -->
                    <div class="row mt-4">
                        <div class="col-md-6">
                            <h4 class="subtotal">Subtotal: &#8377;<?= number_format($totalPrice, 2) ?></h4>
                            <a class="buy-now-link" href="<?= base_url('/checkout') ?>">BUY NOW</a>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>

<!-- Include Footer -->
<?php @include('includes/footer.php') ?>

<!-- JavaScript for Quantity Update -->
<script>
    function updateQuantity(cartId, change) {
        const quantityInput = document.querySelector(`input[name="quantity"][data-cart-id="${cartId}"]`);
        let newQuantity = parseInt(quantityInput.value) + change;

        if (newQuantity < 1) {
            newQuantity = 1; // Prevent quantity from going below 1
        }

        // Send AJAX request to update quantity
        fetch(`/cart/update/${cartId}`, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-Requested-With': 'XMLHttpRequest',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            },
            body: JSON.stringify({ quantity: newQuantity })
        })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    // Update the quantity input
                    quantityInput.value = newQuantity;

                    // If quantity is 0, remove the product from the DOM
                    if (newQuantity === 0) {
                        const productRow = quantityInput.closest('.cart_3l1');
                        productRow.remove();
                    }

                    // Update the subtotal
                    document.querySelector('.subtotal').innerText = `Subtotal: ₹${data.totalPrice.toFixed(2)}`;
                } else {
                    alert('Failed to update quantity');
                }
            })
            .catch(error => {
                console.error('Error:', error);
            });
    }
</script>