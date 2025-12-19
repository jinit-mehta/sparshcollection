<?php @include('includes/header.php') ?>

<head>
    <link href="https://fontawesome.com/icons/arrow-right?f=classic&s=solid" rel="stylesheet">
    <link rel="stylesheet" href="<?= base_url('/assets/front/css/home.css') ?>">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <style>
        /* Mobile View: Show About Us between videos */
    @media (max-width: 768px) {
      .video-about {
        display: flex;
        flex-direction: column;
        align-items: center;
      }
      .video-box {
        width: 100% !important; /* Full width for videos */
      }
      .mobile-only {
        display: block !important; /* Show About Us in mobile */
        padding: 20px;
      }
      .desktop-only {
        display: none !important; /* Hide desktop About Us */
      }
      video {
        height: 400px !important; /* Adjust height for mobile */
      }
    }

    /* Prevent horizontal scrolling */
    body {
      margin: 0;
      padding: 0;
      overflow-x: hidden;
    }
    
    /* Desktop View - Increased Image Size */
@media (min-width: 769px) {
    .product-img img {
        width: 100%;
        height: 400px; /* Increased height */
        object-fit: cover;
    }

    h4 {
        font-size: 1rem;
        margin-top: 12px;
    }

    .price {
        font-size: 1rem;
    }
}

/* Mobile View - Bigger Square Images */
.new-arrivals-swiper {
    padding: 15px 0;
}

.new-arrivals-swiper .swiper-slide {
    width: 70%;
    text-align: center;
}

.mobile-square img {
    width: 100%;
    height: auto;
    aspect-ratio: 1/1;
    object-fit: cover;
}

.categories-section {
    padding: 2.5rem 0;
    position: relative;
    max-width: 1200px;
    margin: auto;
}

.categories-swiper {
    max-width: 1000px;
    margin: auto;
}

.swiper-slide {
    margin: 0 -450px;
}

.category-card {
    width: 500px;
    height: 500px;
    margin: 0 auto; /* Ensure proper alignment */
    border-radius: 12px;
    overflow: hidden;
    position: relative;
    transition: transform 0.5s ease-in-out, box-shadow 0.5s ease-in-out;
}

.swiper-wrapper {
    gap: 0px;
}

.category-image img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.category-overlay h3 {
    font-size: 1.5rem;
}

.category-overlay button {
    padding: 8px 14px;
    font-size: 0.9rem;
}

.category-image {
    height: 100%;
    width: 100%;
    position: relative;
}

/* Ensure images adjust properly */
.category-image img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    display: block;
    transition: transform 0.3s ease;
}

/* Grey overlay appears only on hover */
.category-overlay {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: rgba(0, 0, 0, 0.4);
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    opacity: 0;
    transition: opacity 0.3s ease;
}

.category-card:hover .category-overlay {
    opacity: 1;
}

/* Text & button styling */
.category-overlay h3 {
    color: white;
    font-size: 2rem;
    margin-bottom: 1rem;
    text-align: center;
}

.category-overlay .btn {
    background: rgba(255, 255, 255, 0.2);
    border: 1px solid white;
    padding: 8px 15px;
    font-size: 1rem;
    color: white;
    transition: background 0.3s ease, color 0.3s ease;
}

.category-overlay .btn:hover {
    background: white;
    color: #273B79;
}

/* Removed white fade effect */
.categories-swiper::before,
.categories-swiper::after {
    display: none;
}

/* Mobile responsiveness */
@media (max-width: 1024px) {
    .category-card {
        width: 400px;
        height: 400px;
    }
}

/* Mobile responsiveness - Bigger Cards */
@media (max-width: 768px) {
    .categories-swiper {
        max-width: 100%;
        padding: 0 20px;
    }

    .swiper-slide {
        margin: 0 auto;
    }

    .category-card {
        width: 90vw; /* Make cards larger by taking 90% of the viewport width */
        height: 90vw; /* Maintain square shape */
        margin: 0 auto;
    }

    .category-overlay h3 {
        font-size: 1.8rem; /* Slightly bigger text */
    }

    .category-overlay .btn {
        font-size: 1rem;
        padding: 10px 16px;
    }
}

@media (max-width: 480px) {
    .category-card {
        width: 95vw; /* Even larger on smaller phones */
        height: 95vw;
    }

    .category-overlay h3 {
        font-size: 1.1rem;
    }

    .category-overlay .btn {
        font-size: 0.9rem;
        padding: 8px 14px;
    }
}
    .container .key-features-marquee {
    background-color:#fff !important;; /* Soft beige with 60% transparency */
    padding: 20px !important;
    border-radius: 20px !important; /* Smooth curves */
    backdrop-filter: blur(5px); /* Adds a subtle blur effect */
    box-shadow: none !important; /* Removes any unwanted shadows */
}
    .carousel-item {
    position: relative;
    width: 100%;
    height: 100vh; /* Full viewport height */
}

.carousel-item picture,
.carousel-item img {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    object-fit: cover; /* Ensures the image covers the whole area without stretching */
  
}

@media (max-width: 767px) {
    .carousel-item {
        height: 65vh !important; /* Reduce height on mobile */
    }
    .carousel-item img {
        height: 100% !important;
        object-fit: cover;
         border-radius: 0 !important; /* Correct property name */
    }
}
@media (max-width: 768px) {
    .key-features-marquee {
        overflow: hidden;
        position: relative;
    }

    .marquee-inner {
        display: flex;
        width: max-content;
        animation: scroll-marquee 15s linear infinite;
        gap: 1.5rem;
    }

    .feature-box {
        flex: 0 0 auto;
        min-width: 100px;
        text-align: center;
    }

    @keyframes scroll-marquee {
        0% {
            transform: translateX(100%);
        }
        100% {
            transform: translateX(-100%);
        }
    }
}
       /* Desktop View Fix */
    @media (min-width: 768px) {
        .product-img {
            height: 300px; /* Fixed height for desktop */
            display: flex;
            align-items: center;
            justify-content: center;
            background: #fff;
            padding: 15px;
            border-radius: 8px;
        }
        .product-img img {
            max-height: 100%;
            max-width: 100%;
            width: auto;
            height: auto;
            object-fit: contain;
        }
    }

    /* Mobile View (keep existing styles) */
    @media (max-width: 767px) {
        .new-arrivals-section {
            overflow-x: hidden;
            padding: 0 15px;
        }
        
        .new-arrivals-swiper {
            padding: 0 5px;
        }
        
        .new-arrivals-swiper .swiper-slide {
            width: 66.66% !important;
            margin-right: 15px;
        }
        
        .swiper-wrapper {
            padding-left: 10px;
        }
    }

.new-arrivals-section {
    margin-bottom: 50px; /* Increase space below "Trending Now" */
}

.categories-section {
    margin-top: 50px; /* Increase space above "Categories" */
}

@media (max-width: 767px) {
    .new-arrivals-section {
        margin-bottom: 40px; /* Slightly smaller gap on mobile */
    }

    .categories-section {
        margin-top: 40px;
    }
}

    @media (max-width: 767px) {
        .categories-section {
            overflow: hidden;
            padding: 0 15px; /* Add horizontal padding */
        }
        
        .categories-swiper {
            overflow: visible !important;
        }
        
        .categories-swiper .swiper-slide {
            width: calc(100vw - 30px) !important; /* Full width minus padding */
            margin-right: 15px; /* Match spaceBetween value */
        }
        
        .swiper-wrapper {
            margin-left: -15px; /* Compensate for container padding */
            transform: translateX(-5px); /* Fine-tune positioning */
        }
    }
    
    .key-features-marquee {
    overflow: hidden;
    position: relative;
    width: 100%;
}

.marquee-inner {
    display: flex;
    gap: 40px;
    width: max-content;
    animation: scroll-marquee 20s linear infinite;
}

@keyframes scroll-marquee {
    0% {
        transform: translateX(0%);
    }
    100% {
        transform: translateX(-50%);
    }
}

    </style>
</head>

<body>
<!-- Carousel Section -->
<section id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel" data-bs-interval="3000">
    <div class="carousel-inner">
        <div class="carousel-item active">
            <picture>
                <!-- Mobile Image -->
                <source media="(max-width: 767px)" srcset="<?= base_url('/assets/images/upload/Banner-1.webp') ?>">
                <!-- Desktop Image -->
                <img src="<?= base_url('/assets/images/upload/Banner-1.webp') ?>" alt="Ring Image 1" class="d-block w-100">
            </picture>
        </div>
        <div class="carousel-item">
            <picture>
                <source media="(max-width: 767px)" srcset="<?= base_url('/assets/images/upload/Banner-2.webp') ?>">
                <img src="<?= base_url('/assets/images/upload/Banner-2.webp') ?>" alt="Ring Image 2" class="d-block w-100">
            </picture>
        </div>
        <div class="carousel-item">
            <picture>
                <source media="(max-width: 767px)" srcset="<?= base_url('/assets/images/upload/Banner-3.webp') ?>">
                <img src="<?= base_url('/assets/images/upload/Banner-3.webp') ?>" alt="Ring Image 3" class="d-block w-100">
            </picture>
        </div>
    </div>
</section>

    <!-- Key Features Section -->
<div class="container mt-5">
    <div class="key-features-marquee">
        <div class="marquee-inner">
            <!-- Original set -->
            <div class="feature-box">
                <img src="<?= base_url('assets/images/upload/certified.webp') ?>" alt="Silver Icon" class="feature-icon">
                <p>925 Silver</p>
            </div>
            <div class="feature-box">
                <img src="<?= base_url('assets/images/upload/diamond.webp') ?>" alt="Diamond Icon" class="feature-icon">
                <p>Lab-grown Diamond</p>
            </div>
            <div class="feature-box">
                <img src="<?= base_url('assets/images/upload/silver.webp') ?>" alt="Gold Icon" class="feature-icon">
                <p>23Kt Gold Plating</p>
            </div>
            <div class="feature-box">
                <img src="<?= base_url('assets/images/upload/quality.webp') ?>" alt="Gold Icon" class="feature-icon">
                <p>Quality Assured</p>
            </div>

            <!-- Duplicate set for seamless scroll -->
            <div class="feature-box">
                <img src="<?= base_url('assets/images/upload/certified.webp') ?>" alt="Silver Icon" class="feature-icon">
                <p>925 Silver</p>
            </div>
            <div class="feature-box">
                <img src="<?= base_url('assets/images/upload/diamond.webp') ?>" alt="Diamond Icon" class="feature-icon">
                <p>Lab-grown Diamond</p>
            </div>
            <div class="feature-box">
                <img src="<?= base_url('assets/images/upload/silver.webp') ?>" alt="Gold Icon" class="feature-icon">
                <p>23Kt Gold Plating</p>
            </div>
            <div class="feature-box">
                <img src="<?= base_url('assets/images/upload/quality.webp') ?>" alt="Gold Icon" class="feature-icon">
                <p>Quality Assured</p>
            </div>
        </div>
    </div>
</div>

    
    
<section class="video-about">
  <div style="max-width: 1200px; margin: 0 auto; padding: 50px 20px; display: flex; gap: 20px; justify-content: center; flex-wrap: wrap;">
    
    <!-- First Video Container -->
    <div class="video-box" style="width: 45%; background: #000;">
        <video autoplay loop muted playsinline style="width: 100%; height: 600px; display: block; object-fit: cover;">
            <source src="<?= base_url('assets/images/upload/SPRSH-BNG-005-REEL.mp4') ?>" type="video/mp4">
            Your browser does not support the video tag.
        </video>
    </div>

    <!-- About Us Text (Visible in Mobile, Hidden in Desktop) -->
    <div class="about-text mobile-only" style="display: none; max-width: 900px; margin: 20px auto; text-align: center;">
        <h2 style="font-size: 30px; margin-bottom: 30px;">The Sparsh Collection</h2>
        <p style="font-size: 18px; line-height: 1.6; color: #666; margin-bottom: 40px;">
            Sparsh is your premier destination for exquisite lab-grown diamond jewelry, combining traditional craftsmanship with modern innovation. We take pride in offering sustainable, ethically sourced diamonds that match the brilliance and quality of natural stones while being environmentally conscious.
        </p>
        <button onclick="window.location.href='<?= base_url('/allproducts') ?>'" class="btn btn-primary" style="border: 2px solid #000; background: transparent; color: #000; padding: 15px 30px; text-transform: uppercase; letter-spacing: 2px; font-weight: 600;">
            Explore The Collection <i class="fa fa-arrow-right"></i>
        </button>
    </div>

    <!-- Second Video Container -->
    <div class="video-box" style="width: 45%; background: #000;">
        <video autoplay loop muted playsinline style="width: 100%; height: 600px; display: block; object-fit: cover;">
            <source src="<?= base_url('assets/images/upload/SPRSH BR 014 -REEL.mp4') ?>" type="video/mp4">
            Your browser does not support the video tag.
        </video>
    </div>
  </div>

  <!-- Desktop About Us Section (Visible in Desktop, Hidden in Mobile) -->
  <div class="about-text desktop-only" style="max-width: 900px; margin: 0px auto; text-align: center;">
      <h2 style="font-size: 30px; margin-bottom: 30px;">The Sparsh Collection</h2>
      <p style="font-size: 18px; line-height: 1.6; color: #666; margin-bottom: 40px;">
          Sparsh is your premier destination for exquisite lab-grown diamond jewelry, combining traditional craftsmanship with modern innovation. We take pride in offering sustainable, ethically sourced diamonds that match the brilliance and quality of natural stones while being environmentally conscious.
      </p>
      <button onclick="window.location.href='<?= base_url('/allproducts') ?>'" class="btn btn-primary" style="border: 2px solid #000; background: transparent; color: #000; padding: 15px 30px; text-transform: uppercase; letter-spacing: 2px; font-weight: 600;">
          Explore The Collection <i class="fa fa-arrow-right"></i>
      </button>
  </div>
</section>

<section class="new-arrivals-section">
    <div class="container text-center">
        <h2 class="section-title" style="color:#273B79">Trending Now</h2>

        <!-- Desktop View (4 columns) -->
        <div class="row row-cols-2 row-cols-md-4 g-3 d-none d-md-flex">
            <?php if (!empty($newArrivals)): ?>
                <?php $limitedNewArrivals = array_slice($newArrivals, 0, 4); ?>
                <?php foreach ($limitedNewArrivals as $product): ?>
                    <div class="col">
                        <a href="<?= base_url('/product/single_product/' . $product['product_id']) ?>">
                            <div class="product-img">
    <?php
    $images = json_decode($product['product_images']);
    $productImage = !empty($images) ? '/assets/images/upload/' . $images[0] : '/assets/images/upload/default.jpg';
    ?>
    <img src="<?= base_url($productImage) ?>" alt="<?= esc($product['product_name']) ?>" class="img-fluid">
</div>
                            <h4><?= esc($product['product_name']) ?></h4>
                            <p>
                                <span class="price">Rs. <?= number_format($product['product_price'], 2) ?> INR</span>
                            </p>
                        </a>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <p>No new arrivals found.</p>
            <?php endif; ?>
        </div>

        <!-- Mobile View (Horizontal Carousel with Bigger Square Images) -->
        <div class="swiper-container new-arrivals-swiper d-block d-md-none">
            <div class="swiper-wrapper">
                <?php if (!empty($newArrivals)): ?>
                    <?php $limitedNewArrivals = array_slice($newArrivals, 0, 4); ?>
                    <?php foreach ($limitedNewArrivals as $product): ?>
                        <div class="swiper-slide">
                            <a href="<?= base_url('/product/single_product/' . $product['product_id']) ?>">
                                <div class="product-img mobile-square">
                                    <?php
                                    $images = json_decode($product['product_images']);
                                    $productImage = !empty($images) ? '/assets/images/upload/' . $images[0] : '/assets/images/upload/default.jpg';
                                    ?>
                                    <img src="<?= base_url($productImage) ?>" alt="<?= esc($product['product_name']) ?>" class="img-fluid">
                                </div>
                                <h5><?= esc($product['product_name']) ?></h5>
                                <p class="mb-0">
                                    <span class="price">Rs. <?= number_format($product['product_price'], 2) ?> INR</span>
                                </p>
                            </a>
                        </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <p>No new arrivals found.</p>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>

<!-- SwiperJS for Mobile Carousel -->
<script>
document.addEventListener("DOMContentLoaded", function () {
    var swiper = new Swiper('.new-arrivals-swiper', {
        slidesPerView: 2,
        spaceBetween: 15,
        loop: true,
        autoplay: {
            delay: 2500,
            disableOnInteraction: false,
        },
    });
});
</script>

<!-- Categories Section -->
<section class="categories-section">
    <div class="container-fluid px-0">
        <h2 class="section-title text-center" style="color:#273B79;margin: 0;margin-bottom: 15px;">CATEGORIES</h2>
        <div class="swiper-container categories-swiper">
            <div class="swiper-wrapper">
                <?php if (!empty($categories)): ?>
                    <?php foreach ($categories as $category): ?>
                        <div class="swiper-slide">
                            <div class="category-card">
                                <a href="<?= base_url('/allproducts?category=' . urlencode($category['category_name'])) ?>">
                                    <div class="category-image">
                                        <?php $imagePath = 'assets/images/upload/' . $category['category_image']; ?>
                                        <img src="<?= base_url($imagePath) ?>" 
                                             alt="<?= esc($category['category_name']) ?>" 
                                             class="img-fluid">
                                        <div class="category-overlay">
                                            <h3><?= esc($category['category_name']) ?></h3>
                                            <button class="btn btn-outline-light">View Collection</button>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <p class="text-center">No categories found.</p>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>

<style>
/* Only adding styles to center the categories */
.swiper-container.categories-swiper {
    overflow: visible;
}

.swiper-slide {
    display: flex;
    justify-content: center;
    align-items: center;
}

.category-card {
    width: 100%;
    display: flex;
    justify-content: center;
}

.category-image {
    display: flex;
    justify-content: center;
    align-items: center;
}
</style>

<script>
const swiper = new Swiper('.categories-swiper', {
    slidesPerView: 'auto',
    centeredSlides: true, /* Set to true for both mobile and desktop */
    spaceBetween: 15,
    loop: true,
    speed: 6000,
    autoplay: {
        delay: 1,
        disableOnInteraction: false,
    },
    breakpoints: {
        768: {
            slidesPerView: 'auto',
            centeredSlides: true,
            spaceBetween: 30,
            loop: true
        }
    },
    allowTouchMove: true
});
</script>

<!-- Best Sellers Section -->
<section class="best-sellers-section mt-5">
    <div class="container text-center position-relative">
        <h2 class="section-title" style="color: #273B79;">Best Sellers</h2>
<!--<div class="swiper-nav-buttons position-absolute top-0 end-0 d-md-none mt-2 me-3">-->
<!--    <button class="btn btn-outline-primary btn-sm rounded-circle me-2 swiper-button-prev-custom" style="color: #273B79; border-color: #273B79;">-->
<!--        ❮-->
<!--    </button>-->
<!--    <button class="btn btn-outline-primary btn-sm rounded-circle swiper-button-next-custom" style="color: #273B79; border-color: #273B79;">-->
<!--        ❯-->
<!--    </button>-->
<!--</div>-->

        <!-- Desktop View (Grid Layout) -->
        <div class="row row-cols-2 row-cols-md-4 g-4 d-none d-md-flex">
            <div class="col">
                <a href="https://sparshcollection.in/product/single_product/116">
                    <img src="/assets/images/upload/BS1.webp" alt="Best Seller 1" class="img-fluid" style="width: 100%; max-height: 300px; object-fit: cover;">
                </a>
                <h4>Moonlit Wings</h4>
            </div>
            <div class="col">
                <a href="#">
                    <img src="/assets/images/upload/BS3.webp" alt="Best Seller 2" class="img-fluid" style="width: 100%; max-height: 300px; object-fit: cover;">
                </a>
                <h4>Orbit Elegance</h4>
            </div>
            <div class="col">
                <a href= "https://sparshcollection.in/product/single_product/127 ">
                    <img src="/assets/images/upload/BS4.webp" alt="Best Seller 3" class="img-fluid" style="width: 100%; max-height: 300px; object-fit: cover;">
                </a>
                <h4>HeartLine Tennis Bracelet</h4>
            </div>
            <div class="col">
                <a href="https://sparshcollection.in/product/single_product/120">
                    <img src="/assets/images/upload/BS5.webp" alt="Best Seller 4" class="img-fluid" style="width: 100%; max-height: 300px; object-fit: cover;">
                </a>
                <h4>Radiance Arc Hoops</h4>
            </div>
        </div>

 <!-- Mobile View (Swiper Carousel) -->
        <div class="swiper-container best-sellers-swiper d-block d-md-none">
            <div class="swiper-wrapper">
                <div class="swiper-slide">
                    <a href="https://sparshcollection.in/product/single_product/116">
                        <div class="product-img mobile-square">
                            <img src="/assets/images/upload/BS1.webp" alt="Best Seller 1" class="img-fluid">
                        </div>
                        <h4>Moonlit Wings</h4>
                    </a>
                </div>
                <div class="swiper-slide">
                    <a href="#">
                        <div class="product-img mobile-square">
                            <img src="/assets/images/upload/BS3.webp" alt="Best Seller 2" class="img-fluid">
                        </div>
                        <h4>Orbit Elegance</h4>
                    </a>
                </div>
                <div class="swiper-slide">
                    <a href="https://sparshcollection.in/product/single_product/127 ">
                        <div class="product-img mobile-square">
                            <img src="/assets/images/upload/BS4.webp" alt="Best Seller 3" class="img-fluid">
                        </div>
                        <h4>HeartLine Tennis Bracelet</h4>
                    </a>
                </div>
                <div class="swiper-slide">
                    <a href="https://sparshcollection.in/product/single_product/120">
                        <div class="product-img mobile-square">
                            <img src="/assets/images/upload/BS5.webp" alt="Best Seller 4" class="img-fluid">
                        </div>
                        <h4>Radiance Arc Hoops</h4>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<style>
    /* Desktop styles */
    @media (min-width: 768px) {
        .best-sellers-section .row .col img {
            height: 650px;
            object-fit: cover;
        }
        .best-sellers-section .row .col h4 {
            font-size: 18px;
            margin-top: 15px;
        }
    }

    /* Mobile Carousel styles */
    @media (max-width: 767.98px) {
        .carousel-item {
            padding: 0 15px;
            text-align: center;
        }
        .carousel-item img {
            height: 250px;
            width: 100%;
            object-fit: cover;
            border-radius: 8px;
        }
        .carousel-item h4 {
            font-size: 16px;
            margin-top: 15px;
            padding: 0 10px;
        }
        .carousel-control-prev,
        .carousel-control-next {
            width: 8%;
            filter: invert(1);
        }
        .carousel-control-prev {
            left: -5%;
        }
        .carousel-control-next {
            right: -5%;
        }
    }
/* Mobile Swiper Carousel - Fixed Overflow */
.best-sellers-swiper {
    padding: 15px 0;
    overflow: hidden; /* Contain swiper slides */
    width: 100vw; /* Full viewport width */
    margin-left: -15px; /* Counteract container padding */
    margin-right: -15px; /* Counteract container padding */
}

.best-sellers-swiper .swiper-slide {
    width: calc(100vw - 30px); /* Full width minus margins */
    max-width: 400px; /* Maximum slide width */
    text-align: center;
    margin: 0 15px; /* Add space between slides */
}

.best-sellers-swiper .swiper-wrapper {
    transition-timing-function: cubic-bezier(0.4, 0, 0.2, 1);
    display: flex; /* Better slide alignment */
}

/* Keep existing other styles */
.best-sellers-swiper .mobile-square img {
    width: 100%;
    height: 40vh;
    aspect-ratio: 1/1;
    object-fit: cover;
    border-radius: 8px;
}

.swiper-container {
    -webkit-overflow-scrolling: touch;
    overflow: hidden; /* Prevent any overflow */
}

/* Adjust breakpoints for larger screens */
@media (min-width: 480px) {
    .best-sellers-swiper .swiper-slide {
        width: calc(50% - 20px); /* Two slides with spacing */
        margin: 0 10px;
    }
}
 /* Mobile Swiper Carousel - Improved Version */
    @media (max-width: 767.98px) {
        .best-sellers-swiper {
            padding: 15px 0 30px;
            overflow: hidden;
            width: 100%;
            margin: 0;
        }

        .best-sellers-swiper .swiper-wrapper {
            transition-timing-function: cubic-bezier(0.25, 0.46, 0.45, 0.94);
        }

        .best-sellers-swiper .swiper-slide {
            width: 75%;
            max-width: 320px;
            margin: 0 10px;
            transition: transform 0.6s ease, opacity 0.4s ease;
            opacity: 0.9;
            transform: scale(0.98);
            border-radius: 12px;
            overflow: hidden;
        }

        .best-sellers-swiper .swiper-slide-active {
            opacity: 1;
            transform: scale(1);
            z-index: 2;
        }

        .best-sellers-swiper .mobile-square img {
            width: 100%;
            height: 50vh;
            max-height: 400px;
            aspect-ratio: 1/1;
            object-fit: cover;
            border-radius: 8px;
            transition: transform 0.4s ease;
        }

        .best-sellers-swiper .swiper-slide:hover img {
            transform: scale(1.02);
        }

        .best-sellers-swiper h4 {
            font-size: 16px;
            margin-top: 15px;
            transition: color 0.3s ease;
        }

        /* Modern Navigation Arrows */
        .swiper-button-next-custom,
        .swiper-button-prev-custom {
            background: rgba(255, 255, 255, 0.9);
            width: 36px;
            height: 36px;
            border-radius: 50%;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
            transition: all 0.3s ease;
            backdrop-filter: blur(2px);
        }

        .swiper-button-next-custom::after,
        .swiper-button-prev-custom::after {
            font-size: 1rem;
            color: #333;
        }

        @media (min-width: 480px) {
            .best-sellers-swiper .swiper-slide {
                width: 65%;
                max-width: 360px;
            }
        }
    }
</style>

<script>
document.addEventListener("DOMContentLoaded", function () {
    const bestSellersSwiper = new Swiper('.best-sellers-swiper', {
        slidesPerView: 'auto',
        centeredSlides: true,
        loop: true,
        speed: 800,
        grabCursor: true,
        spaceBetween: 10,
        resistanceRatio: 0.7,
        touchAngle: 30,
        keyboard: {
            enabled: true,
            onlyInViewport: true,
        },
        autoplay: {
            delay: 5000,
            disableOnInteraction: true,
        },
        navigation: {
            nextEl: '.swiper-button-next-custom',
            prevEl: '.swiper-button-prev-custom',
        },
        breakpoints: {
            480: {
                spaceBetween: 15,
                slidesPerView: 'auto',
                centeredSlides: true
            }
        },
        on: {
            init: function () {
                this.slides.forEach(slide => {
                    slide.style.willChange = 'transform, opacity';
                });
            },
        }
    });

    window.addEventListener('resize', () => {
        bestSellersSwiper.update();
    });
});
</script>
    <!-- FAQ Section -->
    <h1 style="text-align: center; margin: 50px 0; font-size: 2rem; color: #273B79;">Frequently Asked Questions</h1>

    <div class="faqs-container" id="faqs">
        <div class="faq">
            <div class="faq-title">Will CVD pass a diamond tester?</div>
            <div class="faq-text">A CVD diamond will pass the test as the diamond produced by this method is mostly
                categorized as type JTA.</div>
        </div>

        <div class="faq">
            <div class="faq-title">How is CVD made?</div>
            <div class="faq-text">The Chemical Vapor Deposition (CVD) method involves filling a vacuum chamber with
                carbon-containing gas that crystallizes on a synthetic diamond seed.</div>
        </div>

        <div class="faq">
            <div class="faq-title">How pure are lab-grown diamonds?</div>
            <div class="faq-text">Both natural and lab-grown diamonds are pure carbon, so technically and chemically,
                they are identical.</div>
        </div>

        <div class="faq">
            <div class="faq-title">Can CVD Diamonds be detected?</div>
            <div class="faq-text">It is not possible to distinguish a CVD diamond from a natural diamond without
                specialist laboratory equipment.</div>
        </div>

        <div class="faq">
            <div class="faq-title">Can you wear lab-grown diamonds every day?</div>
            <div class="faq-text">Yes, lab-grown diamonds are as durable as natural diamonds and can be worn every day.
            </div>
        </div>

        <div class="faq">
            <div class="faq-title">Are CVD diamonds real or fake?</div>
            <div class="faq-text">CVD diamonds are genuine diamonds made through human processes but are chemically
                identical to natural diamonds.</div>
        </div>
    </div>


    <!-- Floating Button -->
    <a href="<?= base_url('/contact') ?>">
        <button class="floating-btn">
            Get in Touch
        </button>
    </a>

    <!-- Footer -->
    <?php @include('includes/footer.php') ?>

   <script>
    document.addEventListener('DOMContentLoaded', () => {
        // FAQ Toggle Functionality
        const faqItems = document.querySelectorAll('.faq');
        
        faqItems.forEach(faq => {
            const faqTitle = faq.querySelector('.faq-title');
            const faqText = faq.querySelector('.faq-text');

            faqTitle.addEventListener('click', () => {
                // Collapse all other FAQs
                faqItems.forEach(item => {
                    if (item !== faq) {
                        item.classList.remove('expanded');
                        item.querySelector('.faq-text').style.display = 'none';
                    }
                });

                // Toggle the clicked FAQ
                const isExpanded = faq.classList.contains('expanded');
                if (isExpanded) {
                    faq.classList.remove('expanded');
                    faqText.style.display = 'none';
                } else {
                    faq.classList.add('expanded');
                    faqText.style.display = 'block';
                }
            });
        });

        // Initialize the Bootstrap Carousel (if needed)
        const carousel = new bootstrap.Carousel('#carouselExampleCaptions', {
            interval: 7000, // Transition every 7 seconds
            ride: 'carousel', // Automatically start
            pause: false // Disable pausing on hover
        });
    });
</script>

<script>
    // Initialize Swiper
    var swiper = new Swiper('.categories-swiper', {
        slidesPerView: 1,
        spaceBetween: 20,
        loop: true,
        autoplay: {
            delay: 3000,
            disableOnInteraction: false,
        },
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
        breakpoints: {
            640: {
                slidesPerView: 2,
                spaceBetween: 20,
            },
            992: {
                slidesPerView: 3,
                spaceBetween: 30,
            },
            1200: {
                slidesPerView: 4,
                spaceBetween: 40,
            }
        }
    });
</script>

</body>