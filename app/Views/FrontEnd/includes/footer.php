<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Responsive Footer with Centered Logo</title>
    <!-- Include Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="<?= base_url('/assets/front/css/footer.css') ?>">
</head>

<body>

    <!-- Full-width Background Container for Footer -->
    <div class="footer-bg">
        <!-- Footer container with even spacing and centered logo -->
        <div class="footer-container">
            <!-- Sparsh Section -->
            <div class="footer-section">
                <h5>Sparsh</h5>
                <div class="footer-links">
                    <a href="<?= base_url('/about') ?>">About Us</a>
                    <a href="<?= base_url('/allproducts') ?>">Bracelets</a>
                    <a href="<?= base_url('/allproducts') ?>">Rings</a>
                    <a href="<?= base_url('/allproducts') ?>">Earrings</a>
                    <a href="<?= base_url('/allproducts') ?>">Pendants</a>
                    <a href="<?= base_url('/#faqs') ?>">FAQs</a>
                </div>
            </div>

            <!-- Centered Logo and Instagram Icon -->
            <div class="footer-logo-container">
                <img src="<?= base_url('/assets/images/upload/logo.webp') ?>" alt="Company Logo">
                <div>
                    <a href="https://www.instagram.com/sparsh.collection/" class="fab fa-instagram instagram-icon"
                        aria-hidden="true"></a>
                </div>
            </div>


            <!-- Support Section -->
            <div class="footer-section">
                <h5>Support</h5>
                <div class="footer-links">
                    <a href="<?= base_url('/shipping-policy') ?>">Shipping Policy</a>
                    <a href="<?= base_url('/return-policy') ?>">Return Policy</a>
                    <a href="<?= base_url('/privacy-policy') ?>">Privacy Policy</a>
                    <a href="<?= base_url('/jewellery-care') ?>">Jewellery Care</a>
                    <!-- <a href="#">Shipment & Delivery</a> -->
                    <a href="<?= base_url('/contact') ?>">Contact Us</a>
                </div>
            </div>
        </div>

        <!-- Footer Bottom Section -->
        <section id="footer_b">
    <p class="mb-0" style="color: white;">© 2024 All Rights Reserved | Design by
        <a href="<?= base_url() ?>" style="color: white;">Sparsh</a>
    </p>
</section>

    </div>

</body>

</html>