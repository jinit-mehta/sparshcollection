<?php @include('includes/header.php') ?>

<style>
    /* General Styling */
    * {
        box-sizing: border-box;
        font-family: 'Playfair Display', serif;
        margin: 0;
        padding: 0;
    }

    body {
        background-color: #f4f4f4;
        color: #333;
    }

    .container {
        max-width: 1200px;
        margin: 0 auto;
        padding: 20px;
    }

    h2,
    h3 {
        color: #273B79;
        text-transform: uppercase;
    }

    /* Contact Form Section */
    .contact-section {
        padding: 50px 20px;
        display: flex;
        flex-wrap: wrap;
        gap: 30px;
        justify-content: space-between;
        align-items: flex-start;
    }

    .contact-form {
        flex: 1;
        min-width: 320px;
        max-width: 600px;
        background: white;
        border-radius: 10px;
        padding: 30px;
        box-shadow: 0px 8px 20px rgba(0, 0, 0, 0.1);
        text-align: left;
    }

    .contact-form h2 {
        margin-bottom: 15px;
        font-size: 1.8rem;
    }

    .contact-form label {
        display: block;
        margin: 15px 0 5px;
        font-weight: bold;
        color: #333;
    }

    .contact-form input,
    .contact-form textarea {
        width: 100%;
        padding: 12px;
        border: 1px solid #ddd;
        border-radius: 10px;
        font-size: 1rem;
        outline: none;
        transition: border-color 0.3s ease;
    }

    .contact-form input:focus,
    .contact-form textarea:focus {
        border-color: #273B79;
        box-shadow: 0 0 6px rgba(39, 59, 121, 0.2);
    }

    .contact-form textarea {
        min-height: 120px;
        resize: vertical;
    }

    .contact-form button {
        width: 100%;
        padding: 14px;
        background-color: #273B79;
        color: white;
        font-size: 1.2rem;
        font-weight: bold;
        border: none;
        border-radius: 10px;
        margin-top: 20px;
        cursor: pointer;
        transition: background-color 0.3s, transform 0.3s;
    }

    .contact-form button:hover {
        background-color: #1a2b5f;
        transform: translateY(-2px);
    }

    /* Company Details Section (Desktop View) */
    .company-info {
        flex: 1;
        min-width: 320px;
        background-color: #273B79;
        border-radius: 10px;
        color: white;
        padding: 20px;
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 20px;
    }

    .info-card {
        text-align: center;
    }

    .info-card i {
        font-size: 2rem;
        color: white;
        margin-bottom: 10px;
    }

    .info-card h3 {
        font-size: 1.2rem;
        margin: 10px 0;
        text-transform: uppercase;
    }

    .info-card p {
        font-size: 1rem;
        color: #ddd;
    }

    /* Mobile Specific Styles */
    @media (max-width: 768px) {
        .contact-section {
            flex-direction: column;
            align-items: center;
            padding: 20px;
        }

        .contact-form {
            width: 100%;
            max-width: 100%;
            padding: 20px;
        }

        .company-info {
            width: 100%;
            max-width: 100%;
            grid-template-columns: 1fr;
            padding: 15px;
        }

        .info-card {
            display: flex;
            align-items: center;
            justify-content: start;
            text-align: left;
            gap: 10px;
        }

        .info-card i {
            font-size: 1.8rem;
        }

        .info-card h3 {
            font-size: 1rem;
            margin: 0;
        }

        .info-card p {
            font-size: 0.9rem;
            margin: 0;
        }
    }
</style>

<!-- Contact Form and Company Info Section -->
<section class="contact-section container">
    <div class="contact-form">
        <h2>Contact Us</h2>

        <!-- Display Success Message -->
        <?php if (session()->has('success')): ?>
            <div class="alert alert-success">
                <?= session('success') ?>
            </div>
        <?php endif; ?>

        <!-- Display Error Message -->
        <?php if (session()->has('error')): ?>
            <div class="alert alert-danger">
                <?= session('error') ?>
            </div>
        <?php endif; ?>

        <!-- Display Validation Errors -->
        <?php if (session()->has('errors')): ?>
            <div class="alert alert-danger">
                <ul>
                    <?php foreach (session('errors') as $error): ?>
                        <li><?= $error ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
        <?php endif; ?>

        <form action="<?= base_url('home/submitContactForm') ?>" method="post">
            <label for="name">Name</label>
            <input type="text" id="name" name="name" required placeholder="">

            <label for="email">Email</label>
            <input type="email" id="email" name="email" required placeholder="">

            <label for="phone">Phone</label>
            <input type="tel" id="phone" name="phone" required placeholder="">

            <label for="message">Message</label>
            <textarea id="message" name="message" required placeholder=""></textarea>

            <button type="submit">Send Message</button>
        </form>
    </div>

    <div class="company-info">
        <div class="info-card">
            <i class="fa fa-map-marker-alt"></i>
            <div>
                <h3 style="color: white;">Our Location</h3>
                <p>Sparshcollection, Mumbai</p>
            </div>
        </div>
        <div class="info-card">
            <i class="fa fa-envelope"></i>
            <div>
                <h3 style="color: white;">Email Us</h3>
                <p>thesparshcollection@gmail.com</p>
            </div>
        </div>
        <div class="info-card">
            <i class="fa fa-phone-alt"></i>
            <div>
                <h3 style="color: white;">Call Us</h3>
                <p>(+91) 98200 51775</p>
            </div>
        </div>
        <div class="info-card">
            <i class="fa fa-clock"></i>
            <div>
                <h3 style="color: white;">Working Hours</h3>
                <p>Mon-Fri: 9:00 AM - 6:00 PM</p>
                <p>Sat: 10:00 AM - 4:00 PM</p>
            </div>
        </div>
    </div>
</section>

<?php @include('includes/footer.php') ?>