<?php @include('includes/header.php'); ?>

<head>
    <link rel="stylesheet" href="<?= base_url('/assets/front/css/single.css') ?>">
    <!-- Font Awesome for Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <!-- LazySizes for lazy loading images -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lazysizes/5.3.2/lazysizes.min.js" async></script>
    
    <style>
     .white-icon {
        filter: brightness(0) invert(1);
        width: 60px;
        height: 60px;
    }
        /* Similar Products Section */
        .similar-products .card {
            border: 1px solid #e0e0e0;
            border-radius: 8px;
            overflow: hidden;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .similar-products .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .similar-products .card-img-top {
            border-bottom: 1px solid #e0e0e0;
        }

        .similar-products .card-body {
            padding: 15px;
            display: flex;
            flex-direction: column;
        }

        .similar-products .card-title {
            font-size: 16px;
            font-weight: 600;
            color: #273B79;
            margin-bottom: 10px;
        }

        .similar-products .price-section {
            margin-bottom: 10px;
        }

        .similar-products .current-price {
            font-size: 18px;
            font-weight: 700;
            color: #273B79;
        }

        .similar-products .original-price {
            font-size: 14px;
            color: #999;
            text-decoration: line-through;
            margin-left: 8px;
        }

        .similar-products .discount {
            font-size: 14px;
            color: #28a745;
            font-weight: 600;
        }

        .similar-products .btn-primary {
            width: 100%;
            padding: 10px;
            font-size: 14px;
            font-weight: 600;
            border-radius: 4px;
        }

        /* Mobile View (Horizontal Scroll) */
        .similar-products .scrollable-container {
            overflow-x: auto;
            /* Enable horizontal scrolling */
            white-space: nowrap;
            /* Prevent wrapping */
            -webkit-overflow-scrolling: touch;
            /* Smooth scrolling on iOS */
        }

        .similar-products .scrollable-row {
            display: flex;
            gap: 15px;
            /* Space between items */
            padding-bottom: 10px;
            /* Space for scrollbar */
        }

        .similar-products .scrollable-item {
            flex: 0 0 auto;
            /* Prevent flex items from shrinking */
            width: 250px;
            /* Fixed width for each item */
        }

        /* Hide scrollbar for a cleaner look */
        .similar-products .scrollable-container::-webkit-scrollbar {
            display: none;
        }

        .similar-products .scrollable-container {
            -ms-overflow-style: none;
            /* IE and Edge */
            scrollbar-width: none;
            /* Firefox */
        }
        
        /* Similar Products Header */
.similar-products-header {
    font-size: 25px;
    color: #273B79;
    margin: 0 ;
    font-weight: 600;
    margin-top:20px;
}

/* Similar Products Container */
.similar-products-container {
    width: 100%;
    position: relative;
    padding: 0 0 20px 0; /* Reduced top padding since we now have a header */
}

/* Horizontal Scroll Container */
.similar-products-scroll {
    display: flex;
    overflow-x: auto;
    scroll-snap-type: x mandatory;
    -webkit-overflow-scrolling: touch;
    gap: 20px;
    padding: 10px 20px;
}

/* Hide scrollbar while keeping functionality */
.similar-products-scroll::-webkit-scrollbar {
    display: none;
}

.similar-products-scroll {
    -ms-overflow-style: none;
    scrollbar-width: none;
}

/* Product Item */
.similar-product-item {
    flex: 0 0 250px;
    scroll-snap-align: start;
    min-width: 250px;
}

/* Product Card */
.product-card {
    display: block;
    background: #fff;
    border-radius: 8px;
    overflow: hidden;
    transition: transform 0.3s ease, box-shadow 0.3s ease;
    text-decoration: none;
    height: 100%;
}

.product-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
}

/* Product Image Container */
.product-image-container {
    position: relative;
    padding-top: 100%;
    overflow: hidden;
}

.product-image {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    object-fit: cover;
}

/* Product Details */
.product-details {
    padding: 15px;
    text-align: center;
}

.product-name {
    font-size: 16px;
    color: #273B79;
    margin-bottom: 0px; /* Reduced from 8px to 4px */
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
    overflow: hidden;
    height: 20px; /* Reduced from 40px to 36px to match the reduced margin */
}

.product-price {
    font-size: 16px;
    color: #273B79;
    font-weight: 600;
    margin: 0;
}

/* Responsive Adjustments */
@media (max-width: 768px) {
    .similar-products-header {
        font-size: 23px;
        margin: 0;
    }

    .similar-product-item {
        flex: 0 0 200px;
        min-width: 200px;
    }

    .product-name {
        font-size: 12px;
        height: 32px; /* Adjusted for mobile */
        margin-bottom: 2px; /* Further reduced for mobile */
    }

    .product-price {
        font-size: 14px;
    }

    .similar-products-scroll {
        padding: 10px 15px;
        gap: 15px;
    }
}

/* No Products Message */
.no-products {
    width: 100%;
    text-align: center;
    padding: 20px;
    color: #666;
}
@media (max-width: 768px) {
    .carousel-inner {
        display: flex;
        flex-wrap: nowrap;
        overflow-x: auto;
        scroll-snap-type: x mandatory;
        -webkit-overflow-scrolling: touch;
    }

    .carousel-item {
        flex: 0 0 auto;
        width: 100%;
        scroll-snap-align: center;
    }

    .carousel-item .d-flex {
        display: flex;
        flex-wrap: nowrap;
        gap: 10px;
        overflow-x: auto;
        scroll-snap-type: x mandatory;
    }

    .carousel-item .col-6 {
        flex: 0 0 50%;
        max-width: 50%;
    }

    .carousel-control-prev,
    .carousel-control-next {
        display: none; /* Hide navigation buttons on mobile */
    }

    /* Hide scrollbar for cleaner look */
    .carousel-inner::-webkit-scrollbar {
        display: none;
    }
}
.carousel-inner {
    overflow: hidden;  /* This ensures no scrollbar appears */
}

.carousel-item .row {
    flex-wrap: nowrap;  /* Prevents wrapping that could cause scrollbar */
    margin-right: 0;    /* Removes default margin that could cause scrollbar */
    margin-left: 0;
}

/* Hide scrollbar for Chrome, Safari and Opera */
.carousel-item .row::-webkit-scrollbar {
    display: none;
}

/* Hide scrollbar for IE, Edge and Firefox */
.carousel-item .row {
    -ms-overflow-style: none;  /* IE and Edge */
    scrollbar-width: none;     /* Firefox */
}

/* Ensure container doesn't show scrollbar */
#similarProductsCarousel {
    overflow: hidden;
}

.length-selector {
    display: flex;
    flex-direction: column;
    align-items: flex-start;
    gap: 12px;
    margin-top: 10px;
}

.length-selector .d-flex {
    width: 100%;
    justify-content: space-between;
}

.length-selector label {
    font-size: 14px;
    font-weight: bold;
    color: #273B79;
    margin-bottom: 10px;
}

.length-selector .options {
    display: flex;
    gap: 12px;
}

.length-selector .option {
    width: 40px;
    height: 40px;
    display: flex;
    align-items: center;
    justify-content: center;
    border: 2px solid #999;
    border-radius: 50%;
    font-size: 14px;
    cursor: pointer;
    font-weight: normal;
    transition: all 0.3s ease;
    color: #666;
}

.length-selector .option.selected {
    border-color: #082A4D;
    font-weight: bold;
    color: #273B79;
}

.length-value {
    font-size: 14px;
    font-weight: bold;
    color: #273B79;
}

.size-guide-link-container {
    margin-top: 15px; /* Add some space between options and link */
}

.size-guide-link {
    font-size: 14px;
    color: #273B79;
    text-decoration: underline;
    cursor: pointer;
    display: flex;
    align-items: center;
}

.size-guide-icon {
    width: 20px;
    height: 20px;
    margin-right: 5px;
}


/* Existing styles */
.carousel-item img {
    width: 100%;
    max-height: 80vh; /* Changed from fixed 600px */
    height: auto;
    object-fit: contain; /* Changed from cover to show full image */
    border-radius: 8px;
}

/* Mobile-specific adjustments */
@media (max-width: 768px) {
    .carousel-item img {
        max-height: 60vh; /* Smaller height for mobile */
        object-fit: contain; /* Ensure full image is visible */
        width: 100%; /* Full width */
        padding: 10px; /* Add some spacing */
    }

    .carousel-inner {
        overflow: visible; /* Allow full image display */
    }

    .carousel-item {
        width: 100vw; /* Full viewport width */
        margin: 0 -15px; /* Counteract container padding */
    }
    
    /* Optional: Add touch scrolling */
    .carousel-inner {
        -webkit-overflow-scrolling: touch;
    }
}

.description-container {
    max-height: 0;
    overflow: hidden;
    transition: max-height 0.3s ease;
}

.active .description-container {
    /* No fixed max-height */
}

.carousel-inner {
    transition: height 0.3s ease;
}

@media (max-width: 768px) {
    .carousel-inner {
        height: auto !important; /* Ensure mobile view is not affected */
    }
}
.carousel-pagination {
    position: absolute;
    bottom: 10px;
    left: 50%;
    transform: translateX(-50%);
    display: flex;
    gap: 8px;
    z-index: 10;
}

.carousel-pagination button {
    width: 10px;
    height: 10px;
    border-radius: 50%;
    border: 1px solid #fff;
    background-color: light-gray;
    padding: 0;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

.carousel-pagination button.active {
    background-color: gray;
}

.carousel-pagination button:hover {
    background-color: rgba(255, 255, 255, 0.5);
}





    </style>
</head>

<!-- Product Details Section -->
<section id="prod_pg" class="pt-4 pb-4">
    <div class="container-xl">
        <div class="row prod_pg1">
            <div class="col-md-12">
                <div class="prod_pg1r">
                    <div class="prod_pg1rd1 row">
<!-- Product Image Carousel -->
<div class="col-md-6">
    <div class="prod_pg1rd1l position-relative">
        <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
            <!-- Carousel Inner -->
            <div class="carousel-inner">
                <?php
                $images = !empty($product['product_images']) ? json_decode($product['product_images'], true) : [];
                if (is_array($images) && !empty($images)): ?>
                    <?php foreach ($images as $index => $image): ?>
                        <div class="carousel-item <?= $index === 0 ? 'active' : '' ?>">
                            <img src="placeholder.jpg"
                                data-src="<?= base_url('/assets/images/upload/' . $image) ?>"
                                loading="lazy" class="d-block w-100 rounded lazyload"
                                style="height: 600px; object-fit: cover;"
                                alt="<?= esc($product['product_name']) ?>">
                        </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <div class='alert alert-warning'>No images available for this product.</div>
                <?php endif; ?>
            </div>

            <!-- Pagination Dots -->
            <?php if (count($images) > 1): ?>
                <div class="carousel-pagination">
                    <?php foreach ($images as $index => $image): ?>
                        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="<?= $index ?>"
                            class="<?= $index === 0 ? 'active' : '' ?>" aria-current="<?= $index === 0 ? 'true' : 'false' ?>"
                            aria-label="Slide <?= $index + 1 ?>"></button>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>

            <!-- Carousel Controls -->
            <?php if (count($images) > 1): ?>
                <button class="carousel-control-prev" type="button"
                    data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button"
                    data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            <?php endif; ?>
        </div>
    </div>
</div>

                        <!-- Product Details Section -->
                        <div class="col-md-6">
                            <div class="prod_pg1rd1r">
                                <!-- Product Name -->
                                <h4 class="fs-5 font-weight-bold" style="color: #273B79;">
                                    <?= $product['product_name'] ?>
                                </h4>
<h6 class="font-12 mt-2" style="font-size: 1em; color: #273B79; font-weight: bold;">
                                    <?= isset($product['style_number']) ? $product['style_number'] : 'No Category' ?>
                                </h6>
                                <!-- Category Name -->
                                <h6 class="font-12 mt-2" style="font-size: 1.2em; color: grey; font-weight: bold;">
                                    <?= isset($product['category_name']) ? $product['category_name'] : 'No Category' ?>
                                </h6>

                                <!-- Product Price -->
                                <h4 class="fs-5 mt-2" style="color: #273B79;">Rs.
                                    <?= number_format($product['product_price'], 2) ?>
                                </h4>

                                <!-- Product Description -->
                                <p class="mt-4 font-15" style="font-size: 14px !important;"><?= $product['product_desc'] ?></p>

                                <!-- Color Choice Section -->
                                <div class="color-choice-section mt-4">
                                    <div class="d-flex align-items-center gap-3">
                                        <!-- Color Heading -->
                                        <h5 class="mb-0">Metal Color:</h5>
                                        <!-- Color Options -->
                                        <div class="d-flex gap-3">
                                            <!-- White Gold -->
                                            <div class="color-option">
                                                <div class="color-label" data-color="White Gold"
                                                    style="background-color: #e5e4e2;"></div>
                                            </div>
                                            <!-- Rose Gold -->
                                            <div class="color-option">
                                                <div class="color-label" data-color="Rose Gold"
                                                    style="background-color: #ffd4d3;"></div>
                                            </div>
                                            <!-- Yellow Gold -->
                                            <div class="color-option">
                                                <div class="color-label" data-color="Yellow Gold"
                                                    style="background-color: #ffec61;"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
<div class="length-selector" id="lengthSelector" style="display: none;">
    <div class="d-flex align-items-center justify-content-between">
        <label> LENGTH (IN AANI) : <span class="length-value">6.5</span></label>
    </div>
    <div class="d-flex flex-column align-items-start">
        <div class="options mr-3">
            <div class="option selected" data-value="6.7">6.7</div>
            <div class="option" data-value="7.1">7.1</div>
            <div class="option" data-value="7.5">7.5</div>
            <div class="option" data-value="7.8">7.8</div>
            <div class="option" data-value="8.2">8.2</div>
            <div class="option" data-value="8.6">8.6</div>
            <div class="option" data-value="9.0">9.0</div>
        </div>
        <div class="size-guide-link-container mt-3">
    <a href="<?= base_url('assets/images/upload/size.pdf') ?>" class="size-guide-link" data-bs-toggle="modal" data-bs-target="#sizeGuideModal">
        <i class="fas fa-ruler size-guide-icon" style="font-size: 18px;"></i>
        Size Guide
    </a>
</div>

<!-- Modal -->
<div class="modal fade" id="sizeGuideModal" tabindex="-1" aria-labelledby="sizeGuideModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="sizeGuideModalLabel">Size Guide</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <iframe src="<?= base_url('assets/images/upload/size.pdf') ?>" width="100%" height="500px"></iframe>
            </div>
        </div>
    </div>
</div>

    </div>
</div>

                                <!-- Add to Cart and Buy Now Buttons -->
                                <div class="mt-4 d-flex gap-2">
                                    <?php if (session()->has('customer_id')): ?>
<form action="<?= base_url('/cart/add/' . $product['product_id']) ?>" method="post">
    <input type="hidden" name="product_id" value="<?= $product['product_id'] ?>">
    <input type="hidden" name="color" id="selectedColor" value="">
    <input type="hidden" name="length" id="selectedLength" value="">
    <button type="submit" class="btn btn-primary p-3 action-button">
        <i class="fa fa-shopping-cart"></i> Add to Cart
    </button>
</form>

<!-- Buy Now Form -->
<form action="<?= base_url('/buy-now/' . $product['product_id'])?>" method="post">
    <input type="hidden" name="product_id" value="<?= $product['product_id'] ?>">
    <input type="hidden" id="selectedColor" name="color" value="">
    <input type="hidden" name="length" id="selectedLength" value="">
    <button id="buyNowButton" class="btn btn-success p-3 action-button" onclick="redirectToCheckout()">
    <i class="fa fa-bolt"></i> Buy Now
</button>
</form>
                                    <?php else: ?>
                                        <a href="<?= base_url('/customer/login') ?>" class="btn btn-primary p-3"
                                            style="background-color: #273B79; border: none; width: 50%;">
                                            <i class="fa fa-shopping-cart"></i> Add to Cart
                                        </a>
                                        <a href="<?= base_url('/customer/login') ?>" class="btn btn-success p-3"
                                            style="background-color: #273B79; border: none; width: 50%; height: 50%;">
                                            <i class="fa fa-bolt"></i> Buy Now
                                        </a>
                                    <?php endif; ?>
                                </div>
<div class="shipment-timeline-container mt-4">
    <p id="dispatch-date" class="mb-2"></p>
    <p id="delivery-date" class="mb-0"></p>
</div>

<!-- Product Description Section -->
                    <?php
                    $hasDescription = !empty($product['dia_quality']) || !empty($product['dia_pcs']) || !empty($product['dia_cts']) ||
                        !empty($product['silver_net_wt']) || !empty($product['pearl_piece']) || !empty($product['pearl_wt']) ||
                        (isset($product['category_name']) && strtolower($product['category_name']) === 'bracelet' && !empty($product['length_bracelet']));
                    ?>

                    <?php if ($hasDescription): ?>
                        <!-- Product Description Section -->
                        <div class="price-breakup-section mt-4">
                            <h4 onclick="togglePriceBreakdown(this)">
                                Product Description
                                <i class="fas fa-chevron-down"></i>
                            </h4>
                            <div class="description-container">
                                <!-- Dia Quality -->
                                <?php if (!empty($product['dia_quality'])): ?>
                                    <div class="description-item">
                                        <span class="label">Diamond Quality:</span>
                                        <span class="value"><?= $product['dia_quality'] ?></span>
                                    </div>
                                <?php endif; ?>
                                
                                <!-- Dia Color -->
                                <?php if (!empty($product['dia_color'])): ?>
                                    <div class="description-item">
                                        <span class="label">Diamond Color:</span>
                                        <span class="value"><?= $product['dia_color'] ?></span>
                                    </div>
                                <?php endif; ?>

                                <!-- Dia Pcs -->
                                <?php if (!empty($product['dia_pcs'])): ?>
                                    <div class="description-item">
                                        <span class="label">Diamond Pcs:</span>
                                        <span class="value"><?= $product['dia_pcs'] ?></span>
                                    </div>
                                <?php endif; ?>
                                
                                

                                <!-- Dia Cts -->
                                <?php if (!empty($product['dia_cts'])): ?>
                                    <div class="description-item">
                                        <span class="label">Diamond Cts:</span>
                                        <span class="value"><?= $product['dia_cts'] ?></span>
                                    </div>
                                <?php endif; ?>

                                <!-- Silver Net Wt -->
                                <?php if (!empty($product['silver_net_wt'])): ?>
    <div class="description-item">
        <span class="label">Silver Net Wt:</span>
        <span class="value"><?= $product['silver_net_wt'] ?> gms</span>
    </div>
<?php endif; ?>


                                <!-- Pearl Details (Only show if pearl fields are present) -->
                                <!-- Pearl Pieces -->
                                <?php if (!empty($product['pearl_piece'])): ?>
                                    <div class="description-item">
                                        <span class="label">Pearl Pieces:</span>
                                        <span class="value"><?= $product['pearl_piece'] ?></span>
                                    </div>
                                <?php endif; ?>

                                <!-- Pearl Weight -->
                                <?php if (!empty($product['pearl_wt'])): ?>
                                    <div class="description-item">
                                        <span class="label">Pearl Weight:</span>
                                        <span class="value"><?= $product['pearl_wt'] ?></span>
                                    </div>
                                <?php endif; ?>
                                <!-- Length Bracelet (Only show if category is "Bracelet") -->
                                <?php if (isset($product['category_name']) && strtolower($product['category_name']) === 'bracelet' && !empty($product['length_bracelet'])): ?>
                                    <div class="description-item">
                                        <span class="label">Length:</span>
                                        <span class="value"><?= $product['length_bracelet'] ?> Inches</span>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    <?php endif; ?>
                            </div>
                        </div>
                    </div>
<div class="new-section">
    <div class="row">
        <!-- Free Shipping -->
        <div class="col-6 col-md-3 text-center">
            <div class="icon-container">
                <i class="fas fa-truck"></i>
            </div>
            <p>Free Shipping</p>
        </div>
        <!-- 12hrs Exchange -->
        <div class="col-6 col-md-3 text-center">
            <div class="icon-container">
                <i class="fas fa-exchange-alt"></i>
            </div>
            <p>12hrs Exchange</p>
        </div>
        <!-- Skin Safe Jewellery -->
        <div class="col-6 col-md-3 text-center">
            <div class="icon-container">
                <i class="fas fa-gem"></i>
            </div>
            <p>Skin Safe Jewellery</p>
        </div>
        <!-- Certified Jewellery -->
        <div class="col-6 col-md-3 text-center">
            <div class="icon-container">
                <img src="<?= base_url('/assets/images/upload/high-quality_5733221.png') ?>"
                    loading="lazy" alt="Certified Jewellery"
                    style="width: 50px; height: 50px; filter: brightness(0) saturate(100%) invert(15%) sepia(50%) saturate(2000%) hue-rotate(220deg);">
            </div>
            <p>Certified Jewellery</p>
        </div>
    </div>
</div>

<style>
    @media (min-width: 768px) { /* Apply only for desktop view */
    .price-breakup-section {
        margin-bottom: 0 !important; /* Remove extra space */
        padding-bottom: 0 !important;
    }

    .description-container {
        display: none;
        margin-bottom: 0 !important;
        padding-bottom: 0 !important;
    }

    .price-breakup-section.active .description-container {
        display: block;
    }

    .new-section {
        margin-top: 10px !important; /* Reduce top margin */
    }
}

</style>
              

<!-- Similar Products Section -->
<h2 class="similar-products-header">Similar Products</h2>
<div class="similar-products-container">
    <div class="similar-products-scroll">
        <?php if (!empty($similarProducts)): ?>
            <?php foreach ($similarProducts as $similarProduct): ?>
                <div class="similar-product-item">
                    <a href="<?= base_url('product/single_product/' . $similarProduct['product_id']) ?>" class="product-card">
                        <div class="product-image-container">
                            <img src="placeholder.jpg"
                                 data-src="<?= base_url('/assets/images/upload/' . json_decode($similarProduct['product_images'])[0]) ?>"
                                 class="product-image lazyload"
                                 alt="<?= $similarProduct['product_name'] ?>"
                                 loading="lazy">
                        </div>
                        <div class="product-details">
                            <h5 class="product-name"><?= $similarProduct['product_name'] ?></h5>
                            <p class="product-price">Rs. <?= number_format($similarProduct['product_price'], 2) ?></p>
                        </div>
                    </a>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <div class="no-products">
                <p>No similar products found.</p>
            </div>
        <?php endif; ?>
    </div>
</div>
                    <!-- Review Section -->
                    <div class="review-section mt-4">
                        <h2 class="mb-3" style="color: #273B79;">Customer Reviews</h2>

                        <!-- Write Review Button and Cumulative Rating -->
                        <div class="review-header">
                            <button class="write-review-btn" onclick="openReviewModal()">Write Review</button>
                            <div>
                                <div class="cumulative-rating"><?= number_format($averageRating, 1) ?></div>
                                <div class="rating-stars">
                                    <?php for ($i = 1; $i <= 5; $i++): ?>
                                        <i class="fas fa-star"
                                            style="color: <?= $i <= $averageRating ? '#FFD700' : '#ddd'; ?>"></i>
                                    <?php endfor; ?>
                                </div>
                            </div>
                        </div>

                        <!-- Display Reviews -->
                        <div class="reviews-list">
                            <?php if (!empty($reviews)): ?>
                                <?php foreach ($reviews as $review): ?>
                                    <div class="review-item mb-3 p-3 border rounded">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div>
                                                <strong><?= esc($review['customer_name']) ?></strong>
                                                <div class="rating">
                                                    <?php for ($i = 1; $i <= 5; $i++): ?>
                                                        <i class="fas fa-star"
                                                            style="color: <?= $i <= $review['rating'] ? '#FFD700' : '#ddd'; ?>"></i>
                                                    <?php endfor; ?>
                                                </div>
                                            </div>
                                            <small
                                                class="text-muted"><?= date('M d, Y', strtotime($review['created_at'])) ?></small>
                                        </div>
                                        <p class="mt-2"><?= esc($review['comment']) ?></p>

                                        <!-- Display Review Images -->
                                        <?php if (!empty($review['images'])): ?>
                                            <div class="review-images mt-3">
                                                <?php
                                                $images = json_decode($review['images'], true);
                                                if (is_array($images) && !empty($images)):
                                                    foreach ($images as $image):
                                                        if (!empty($image)):
                                                            ?>
                                                            <img src="<?= base_url('assets/images/reviews/' . $image) ?>" alt="Review Image"
                                                                loading="lazy" style="max-width: 100px; margin-right: 10px; margin-top: 10px;">
                                                            <?php
                                                        endif;
                                                    endforeach;
                                                else:
                                                    echo '<p>No images available for this review.</p>';
                                                endif;
                                                ?>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <p>No reviews yet. Be the first to review this product!</p>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Sticky Circle -->
<div class="side-stick" onclick="toggleStickyOptions()">
    <img class="white-icon" src="https://img.icons8.com/dotty/80/diamond-care-1.png" alt="Diamond Care Icon"/>
</div>

<!-- Sticky Options Modal -->
<div id="stickyOptionsModal" class="sticky-modal" onclick="closeStickyOptions(event)">
    <div class="sticky-modal-content">
        <div id="initialOptions">
            <div class="sticky-option" onclick="showPopup('Jewellery Care')">Jewellery Care</div>
            <div class="sticky-option" onclick="showPopup('Shipping & Return')">Shipping & Return</div>
        </div>
    </div>
</div>

<!-- Overlay for background transparency -->
<div id="overlay" class="overlay" onclick="closeStickyOptions(event)"></div>

<!-- Popup for Information -->
<div id="infoPopup" class="popup-modal" onclick="closePopup(event)">
    <div class="popup-content">
        <span class="close-btn" onclick="closePopup(event)">&times;</span>
        <p id="popupText"></p>
    </div>
</div>

<!-- Review Popup Modal -->
<div id="reviewModal" class="popup-modal" onclick="closePopup(event)">
    <div class="popup-content">
        <span class="close-btn" onclick="closeReviewModal()">&times;</span>
        <form id="reviewForm" action="<?= base_url('/submit-review') ?>" method="post" enctype="multipart/form-data">
            <input type="hidden" name="product_id" value="<?= $product['product_id'] ?>">

            <!-- Step 1: Rating -->
            <div id="step1" class="review-step">
                <div class="form-group">
                    <h3 style="color: #273B79;">Your Rating</h3>
                    <div class="rating-stars-popup">
                        <span class="star" data-value="1">★</span>
                        <span class="star" data-value="2">★</span>
                        <span class="star" data-value="3">★</span>
                        <span class="star" data-value="4">★</span>
                        <span class="star" data-value="5">★</span>
                    </div>
                    <input type="hidden" id="reviewRating" name="rating" required>
                </div>
            </div>

            <!-- Step 2: Review Comment -->
            <div id="step2" class="review-step">
                <div class="form-group" style="width: 100%; max-width: 800px; margin: 0 auto;">
                    <h3 style="color: #273B79;">Your Review</h3>
                    <textarea class="form-control" id="reviewComment" name="comment" rows="8"
                        placeholder="write your review..." required
                        style="font-size: 16px; padding: 15px; width: 100%;"></textarea>
                </div>
                <div class="d-flex justify-content-between mt-4" style="width: 100%; max-width: 800px; margin: 0 auto;">
                    <button type="button" class="btn btn-primary prev-btn" onclick="prevStep(1)"
                        style="background-color: #273B79; border: none;">Previous</button>
                    <button type="button" class="btn btn-primary next-btn" onclick="nextStep(3)"
                        style="background-color: #273B79; border: none;">Next</button>
                </div>
            </div>

            <!-- Step 3: Name and Email -->
            <div id="step3" class="review-step">
                <div class="form-group">
                    <h3 style="color: #273B79;">Your Details</h3><br>
                    <div class="row">
                        <div class="col-md-12">
                            <label for="reviewName" style="font-weight: bold; color: #273B79;">Your Name</label>
                            <input type="text" class="form-control" id="reviewName" name="name" required>
                        </div>
                        <div class="col-md-12 mt-3">
                            <label for="reviewEmail" style="font-weight: bold; color: #273B79;">Your Email</label>
                            <input type="email" class="form-control" id="reviewEmail" name="email" required>
                        </div>
                    </div>
                </div>
                <div class="d-flex justify-content-between mt-4" style="width: 100%; max-width: 800px; margin: 0 auto;">
                    <button type="button" class="btn btn-primary prev-btn" onclick="prevStep(2)"
                        style="background-color: #273B79; border: none;">Previous</button>
                    <button type="button" class="btn btn-primary next-btn" onclick="nextStep(4)"
                        style="background-color: #273B79; border: none;">Next</button>
                </div>
            </div>

            <!-- Step 4: Upload Photos -->
            <div id="step4" class="review-step">
                <h3 style="color: #273B79;">Upload Photos</h3><br>
                <div class="form-group text-center">
                    <div class="photo-icon mb-3">
                        <i class="fas fa-camera" style="font-size: 4rem; color: #273B79;"></i>
                    </div>
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="reviewImages" name="images[]" accept="image/*"
                            multiple>
                        <label class="custom-file-label" for="reviewImages">Choose files</label>
                    </div>
                </div>
                <div class="d-flex flex-column align-items-center mt-4">
                    <button type="submit" class="btn btn-primary mb-2 w-100"
                        style="background-color: #273B79; border: none;">Submit</button>
                    <button type="button" class="btn btn-primary prev-btn w-100" onclick="prevStep(3)"
                        style="background-color: #273B79; border: none;">Previous</button>
                </div>
            </div>
        </form>
    </div>
</div>

<script>
    // Toggle sticky options modal
    function toggleStickyOptions() {
        const modal = document.getElementById('stickyOptionsModal');
        const overlay = document.getElementById('overlay');
        if (modal.style.display === 'block') {
            modal.style.display = 'none';   
            overlay.style.display = 'none';
        } else {
            modal.style.display = 'block';
            overlay.style.display = 'block';
        }
    }

    // Close sticky options modal when clicking outside
    function closeStickyOptions(event) {
        const modal = document.getElementById('stickyOptionsModal');
        const overlay = document.getElementById('overlay');
        if (event.target === overlay) {
            modal.style.display = 'none';
            overlay.style.display = 'none';
        }
    }

    // Show popup with information
    function showPopup(option) {
        const popup = document.getElementById('infoPopup');
        const popupText = document.getElementById('popupText');

        // Clear previous content
        popupText.innerHTML = '';

        // Set the content based on the selected option
        if (option === 'Jewellery Care') {
            popupText.innerHTML = `
                <strong>Jewellery Care Tips:</strong><br>
                <img src="<?= base_url('/assets/images/upload/instruction.jpeg') ?>" alt="Jewellery Care Instructions" style="width: 100%; margin-top: 15px; border-radius: 8px;">`;
        } else if (option === 'Shipping & Return') {
            popupText.innerHTML = `
                <div style="text-align: left; padding-left: 20px;">
                    <strong>Shipping & Return Policy:</strong><br><br>
                    1. At Sparsh Collection, we strive to deliver your order in the safest and most reliable way:<br>
                    &nbsp;&nbsp;&nbsp;&nbsp;- We process all orders within<br> 20-25 working days of receiving them, and we will do our best to get your jewellery to you as soon as possible.<br><br>
                    2. We at Sparsh Collection do not offer a return policy.<br><br>
                    3. Exchanges will only be accepted if the request is submitted within 12 hours of receiving your package. Please include an unboxing video along with your complaint ticket for a quick resolution.<br><br>
                    4. For more details check out our RETURN & EXCHANGE POLICY.
                </div>`;
        }

        // Show the popup
        popup.style.display = 'block';
        // Close the sticky options modal
        closeStickyOptions(event);
    }

    // Close the popup when clicking outside or on the close button
    function closePopup(event) {
        const popup = document.getElementById('infoPopup');
        if (event.target === popup || event.target.classList.contains('close-btn')) {
            popup.style.display = 'none';
        }
    }

    // Multi-Step Review Popup Functions
    function nextStep(step) {
        if (step === 2 && !document.getElementById('reviewRating').value) {
            alert('Please select a rating before proceeding.');
            return;
        }
        if (step === 3 && !document.getElementById('reviewComment').value.trim()) {
            alert('Please fill out your review before proceeding.');
            return;
        }
        document.querySelectorAll('.review-step').forEach(step => step.style.display = 'none');
        document.getElementById(`step${step}`).style.display = 'flex'; /* Use flex for active step */
    }

    function prevStep(step) {
        document.querySelectorAll('.review-step').forEach(step => step.style.display = 'none');
        document.getElementById(`step${step}`).style.display = 'flex'; /* Use flex for active step */
    }

    function openReviewModal() {
        const modal = document.getElementById('reviewModal');
        const overlay = document.getElementById('overlay');
        modal.style.display = 'block';
        overlay.style.display = 'block';
        nextStep(1); // Show the first step
    }

    function closeReviewModal() {
        const modal = document.getElementById('reviewModal');
        const overlay = document.getElementById('overlay');
        modal.style.display = 'none';
        overlay.style.display = 'none';
    }

    // Star Rating System
    const stars = document.querySelectorAll('.rating-stars-popup .star');
    const ratingInput = document.getElementById('reviewRating');

    stars.forEach(star => {
        star.addEventListener('click', () => {
            const value = star.getAttribute('data-value');
            ratingInput.value = value;

            stars.forEach(s => {
                if (s.getAttribute('data-value') <= value) {
                    s.classList.add('selected');
                } else {
                    s.classList.remove('selected');
                }
            });

            // Automatically proceed to the next step after selecting a rating
            nextStep(2);
        });
    });

    // File Input Label Update for Multiple Files
    document.getElementById('reviewImages').addEventListener('change', function (e) {
        const files = e.target.files;
        let fileNames = [];
        for (let i = 0; i < files.length; i++) {
            fileNames.push(files[i].name);
        }
        document.querySelector('.custom-file-label').textContent = fileNames.join(', ');
    });

    // Initialize the color selection functionality
    window.onload = function () {
        setDates();
    };

    function setDates() {
    const dispatchDateElement = document.getElementById('dispatch-date');
    const deliveryDateElement = document.getElementById('delivery-date');

    const formatDate = (date) => {
        const days = ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'];
        const months = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];
        const day = days[date.getDay()];
        const month = months[date.getMonth()];
        const dateNum = date.getDate();
        return `${day}, ${month} ${dateNum}`;
    };

    const currentDate = new Date();

    // Calculate dispatch date (23 days from today)
    const dispatchDate = new Date(currentDate);
    dispatchDate.setDate(dispatchDate.getDate() + 15);

    // Calculate delivery date (25 days from today)
    const deliveryDate = new Date(currentDate);
    deliveryDate.setDate(deliveryDate.getDate() + 17);

    // Update dispatch date text
    dispatchDateElement.innerHTML = `
        Ships by <strong>${formatDate(dispatchDate)}</strong> | 
        Delivers by <strong>${formatDate(deliveryDate)}</strong> | 
    `;

    // Update delivery date text
    deliveryDateElement.innerHTML = `
        Free Insured Shipping. 
    `;

    // Ensure left alignment and font size
    dispatchDateElement.style.textAlign = 'left';
    deliveryDateElement.style.textAlign = 'left';
    dispatchDateElement.style.fontSize = '16px';
    deliveryDateElement.style.fontSize = '16px';
    dispatchDateElement.style.color = '#273B79';
    deliveryDateElement.style.color = '#273B79';
}

    function togglePriceBreakdown(element) {
        const section = element.parentElement;
        section.classList.toggle('active');
        const icon = element.querySelector('i');
        icon.classList.toggle('fa-chevron-down');
        icon.classList.toggle('fa-chevron-up');
    }

document.addEventListener("DOMContentLoaded", function () {
    // Handle color selection
    const colorLabels = document.querySelectorAll('.color-label');
    const selectedColorInput = document.getElementById('selectedColor');

    colorLabels.forEach(label => {
        label.addEventListener('click', () => {
            // Remove 'selected' class from all labels
            colorLabels.forEach(item => item.classList.remove('selected'));

            // Add 'selected' class to clicked label
            label.classList.add('selected');

            // Update hidden input value
            const selectedColor = label.getAttribute('data-color');
            selectedColorInput.value = selectedColor;
            console.log('Selected Color:', selectedColor); // Debugging
        });
    });

    // Handle length selection
    const lengthOptions = document.querySelectorAll('.length-selector .option');
    const selectedLengthInput = document.getElementById('selectedLength');
    const lengthValueDisplay = document.querySelector('.length-selector .length-value');

    lengthOptions.forEach(option => {
        option.addEventListener('click', () => {
            // Remove 'selected' class from all length options
            lengthOptions.forEach(item => item.classList.remove('selected'));

            // Add 'selected' class to clicked option
            option.classList.add('selected');

            // Update hidden input value and displayed value
            const selectedLength = option.getAttribute('data-value');
            selectedLengthInput.value = selectedLength;
            lengthValueDisplay.textContent = selectedLength;
            console.log('Selected Length:', selectedLength); // Debugging
        });
    });

    // Debug form submission
    const buyNowForm = document.querySelector('form');
    buyNowForm.addEventListener('submit', function (e) {
        console.log('Form submitted with:', {
            color: selectedColorInput.value,
            length: selectedLengthInput.value
        });
    });
});

    // Function to submit the review form via AJAX
    function submitReviewForm(event) {
        event.preventDefault(); // Prevent the default form submission

        const form = document.getElementById('reviewForm');
        const formData = new FormData(form);

        fetch('<?= base_url('/submit-review') ?>', {
            method: 'POST',
            body: formData,
        })
            .then(response => response.json())
            .then(data => {
                if (data.status === 'success') {
                    // Update the reviews section
                    updateReviews(data.reviews, data.averageRating);
                    // Close the review modal
                    closeReviewModal();
                    // Show success message
                    alert(data.message);
                } else {
                    // Show error message
                    alert(data.message);
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('An error occurred while submitting the review.');
            });
    }

    // Function to update the reviews section
    function updateReviews(reviews, averageRating) {
        const reviewsList = document.querySelector('.reviews-list');
        const cumulativeRating = document.querySelector('.cumulative-rating');
        const ratingStars = document.querySelector('.rating-stars');

        // Update the average rating
        cumulativeRating.textContent = parseFloat(averageRating).toFixed(1);

        // Update the rating stars
        ratingStars.innerHTML = '';
        for (let i = 1; i <= 5; i++) {
            const star = document.createElement('i');
            star.classList.add('fas', 'fa-star');
            star.style.color = i <= averageRating ? '#FFD700' : '#ddd';
            ratingStars.appendChild(star);
        }

        // Clear existing reviews
        reviewsList.innerHTML = '';

        // Add new reviews
        if (reviews.length > 0) {
            reviews.forEach(review => {
                const reviewItem = document.createElement('div');
                reviewItem.classList.add('review-item', 'mb-3', 'p-3', 'border', 'rounded');

                reviewItem.innerHTML = `
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <strong>${review.customer_name}</strong>
                            <div class="rating">
                                ${Array.from({ length: 5 }, (_, i) => `
                                    <i class="fas fa-star" style="color: ${i < review.rating ? '#FFD700' : '#ddd'}"></i>
                                `).join('')}
                            </div>
                        </div>
                        <small class="text-muted">${new Date(review.created_at).toLocaleDateString()}</small>
                    </div>
                    <p class="mt-2">${review.comment}</p>
                    ${review.images ? `
                        <div class="review-images mt-3">
                            ${JSON.parse(review.images).map(image => `
                                <img src="<?= base_url('assets/images/reviews/') ?>${image}" 
                                     alt="Review Image" 
                                     loading="lazy" 
                                     style="max-width: 100px; margin-right: 10px; margin-top: 10px;">
                            `).join('')}
                        </div>
                    ` : ''}
                `;

                reviewsList.appendChild(reviewItem);
            });
        } else {
            reviewsList.innerHTML = '<p>No reviews yet. Be the first to review this product!</p>';
        }
    }

    // Attach the submitReviewForm function to the form's submit event
    document.getElementById('reviewForm').addEventListener('submit', submitReviewForm);

    // Function to validate the review form
    function validateReviewForm(step) {
        let isValid = true;
        let errorMessage = '';

        switch (step) {
            case 1: // Validate Rating
                const rating = document.getElementById('reviewRating').value;
                if (!rating) {
                    errorMessage = 'Please select a rating before proceeding.';
                    isValid = false;
                }
                break;

            case 2: // Validate Review Comment
                const comment = document.getElementById('reviewComment').value.trim();
                if (!comment) {
                    errorMessage = 'Please write your review before proceeding.';
                    isValid = false;
                }
                break;

            case 3: // Validate Name and Email
                const name = document.getElementById('reviewName').value.trim();
                const email = document.getElementById('reviewEmail').value.trim();
                if (!name) {
                    errorMessage = 'Please enter your name before proceeding.';
                    isValid = false;
                } else if (!email) {
                    errorMessage = 'Please enter your email before proceeding.';
                    isValid = false;
                } else if (!validateEmail(email)) {
                    errorMessage = 'Please enter a valid email address.';
                    isValid = false;
                }
                break;

            case 4: // Validate Uploaded Photos (Optional)
                const files = document.getElementById('reviewImages').files;
                if (files.length === 0) {
                    errorMessage = 'Please upload at least one photo before submitting.';
                    isValid = false;
                }
                break;
        }

        if (!isValid) {
            alert(errorMessage); // Show error message
            return false;
        }

        return true;
    }

    // Function to validate email format
    function validateEmail(email) {
        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        return emailRegex.test(email);
    }

    // Function to proceed to the next step
    function nextStep(step) {
        if (!validateReviewForm(step - 1)) {
            return; // Stop if validation fails
        }

        document.querySelectorAll('.review-step').forEach(step => step.style.display = 'none');
        document.getElementById(`step${step}`).style.display = 'flex'; // Show the next step
    }

    // Function to go back to the previous step
    function prevStep(step) {
        document.querySelectorAll('.review-step').forEach(step => step.style.display = 'none');
        document.getElementById(`step${step}`).style.display = 'flex'; // Show the previous step
    }

    // Function to submit the review form
    function submitReviewForm(event) {
        event.preventDefault(); // Prevent the default form submission

        // Validate the final step (Step 4)
        if (!validateReviewForm(4)) {
            return; // Stop if validation fails
        }

        const form = document.getElementById('reviewForm');
        const formData = new FormData(form);

        fetch('<?= base_url('/submit-review') ?>', {
            method: 'POST',
            body: formData,
        })
            .then(response => response.json())
            .then(data => {
                if (data.status === 'success') {
                    // Update the reviews section
                    updateReviews(data.reviews, data.averageRating);
                    // Close the review modal
                    closeReviewModal();
                    // Show success message
                    alert(data.message);
                } else {
                    // Show error message
                    alert(data.message);
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('An error occurred while submitting the review.');
            });
    }

    // Attach the submitReviewForm function to the form's submit event
    document.getElementById('reviewForm').addEventListener('submit', submitReviewForm);
    


document.addEventListener("DOMContentLoaded", function () {
    var carousel = document.querySelector("#similarProductsCarousel");
    if (carousel) {
        var hammer = new Hammer(carousel);
        hammer.on("swipeleft", function () {
            var nextButton = document.querySelector("#similarProductsCarousel .carousel-control-next");
            if (nextButton) nextButton.click();
        });
        hammer.on("swiperight", function () {
            var prevButton = document.querySelector("#similarProductsCarousel .carousel-control-prev");
            if (prevButton) prevButton.click();
        });
    }
});

        document.addEventListener("DOMContentLoaded", function () {
            const options = document.querySelectorAll(".length-selector .option");
            const lengthValue = document.querySelector(".length-selector .length-value");

            options.forEach(option => {
                option.addEventListener("click", function () {
                    // Remove selected class from all options
                    options.forEach(opt => opt.classList.remove("selected"));
                    
                    // Add selected class to clicked option
                    this.classList.add("selected");

                    // Update the displayed length value
                    lengthValue.textContent = this.getAttribute("data-value");
                });
            });
        });

    document.addEventListener('DOMContentLoaded', function() {
        // Dynamically set the category based on the product's category
        const category = "<?= isset($product['category_name']) ? strtolower($product['category_name']) : '' ?>"; 
        const lengthSelector = document.getElementById('lengthSelector');

        // Only show the length selector if the category is "bracelet"
        if (category === "bangles") {
            lengthSelector.style.display = 'block';
        } else {
            lengthSelector.style.display = 'none'; // Ensure it's hidden for other categories
        }

        // Other existing JavaScript code...
    });
    
 function togglePriceBreakdown(element) {
    const section = element.parentElement;
    const descriptionContainer = section.querySelector('.description-container');
    const icon = element.querySelector('i');
    const imageCarousel = document.querySelector('.carousel-inner');
    const isDesktopView = window.innerWidth > 768; // Check if the viewport is wider than 768px (desktop view)

    if (section.classList.contains('active')) {
        // Collapse
        descriptionContainer.style.maxHeight = '0';
        icon.classList.remove('fa-chevron-up');
        icon.classList.add('fa-chevron-down');
        if (isDesktopView) {
            imageCarousel.style.height = '600px'; // Reset image height
        }
        console.log('Collapsed');
    } else {
        // Expand
        descriptionContainer.style.maxHeight = '1000px'; // Set max-height to a large value to ensure all content is visible
        icon.classList.remove('fa-chevron-down');
        icon.classList.add('fa-chevron-up');
        if (isDesktopView) {
            imageCarousel.style.height = '600px'; // Expand image height
        }
        console.log('Expanded');
    }

    section.classList.toggle('active');
}
const carousel = document.getElementById('carouselExampleCaptions');
carousel.addEventListener('slide.bs.carousel', (event) => {
    console.log('Slide changed to:', event.to);
});



document.addEventListener("DOMContentLoaded", function () {
    var carousel = document.querySelector("#carouselExampleCaptions");
    var paginationButtons = document.querySelectorAll(".carousel-pagination button");

    carousel.addEventListener("slid.bs.carousel", function (event) {
        // Remove "active" class from all pagination dots
        paginationButtons.forEach(button => button.classList.remove("active"));

        // Add "active" class to the current slide's pagination dot
        paginationButtons[event.to].classList.add("active");
    });
});
   function redirectToCheckout() {
        const selectedColor = document.querySelector('.color-label.selected').getAttribute('data-color');
        if (!selectedColor) {
            alert('Please select a color before proceeding.');
            return;
        }

        // Redirect to checkout with the selected color
        window.location.href = `<?= base_url('checkout') ?>?color=${encodeURIComponent(selectedColor)}`;
    }

    // Handle color selection
    document.querySelectorAll('.color-label').forEach(label => {
        label.addEventListener('click', () => {
            // Remove 'selected' class from all labels
            document.querySelectorAll('.color-label').forEach(item => item.classList.remove('selected'));

            // Add 'selected' class to clicked label
            label.classList.add('selected');

            // Update hidden input value
            document.getElementById('selectedColor').value = label.getAttribute('data-color');
        });
    });
    
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
                color: document.querySelector('input[name="color"]').value, // Include selected color
                totalAmount: parseFloat(document.querySelector('input[name="totalAmount"]').value.replace(/[^0-9.-]+/g, ""))
            };

            if (paymentMethod === 'cashOnDelivery') {
                handleCashOnDelivery(formData);
            } else if (paymentMethod === 'razorpay') {
                initiateRazorpayPayment(formData);
            }
        });
    }
});
</script>


<script>
document.addEventListener("DOMContentLoaded", function() {
    // Fix for mobile scrolling issue
    if (window.innerWidth <= 768) {
        // Disable any height transitions that might cause jumping
        const carouselInner = document.querySelector('.carousel-inner');
        if (carouselInner) {
            carouselInner.style.transition = 'none';
        }
        
        // Lock the carousel height to prevent recalculations
        const carouselItems = document.querySelectorAll('.carousel-item');
        carouselItems.forEach(item => {
            item.style.height = 'auto';
        });

        // Prevent any dynamic height adjustments
        window.addEventListener('scroll', function() {
            // This empty handler prevents other scripts from interfering with scroll
        }, { passive: true });
    }

    // Rest of your existing JavaScript...
});
</script>

<style>
@media (max-width: 768px) {
    /* Add these styles to prevent layout shifts */
    .carousel-inner {
        height: auto !important;
        min-height: 300px; /* Adjust based on your needs */
        overflow: hidden;
    }
    
    .carousel-item {
        height: auto;
        min-height: 300px; /* Match carousel-inner */
    }
    
    .carousel-item img {
        height: auto;
        max-height: 60vh;
        width: 100%;
        object-fit: contain;
    }
    
    /* Disable any transitions that might cause jumps */
    .carousel-inner, 
    .carousel-item, 
    .description-container {
        transition: none !important;
    }
    
    /* Prevent any layout recalculations */
    .prod_pg1rd1l {
        position: relative;
        overflow: hidden;
    }
}
</style>


<?php @include('includes/footer.php'); ?>

