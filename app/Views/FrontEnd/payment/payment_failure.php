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

    /* Fail Section Styling */
    #fail-section {
        padding: 4rem 0;
        text-align: center;
    }

    /* Fail Heading */
    #fail-section h1 {
        font-size: 3rem;
        font-weight: 700;
        color: var(--base-color);
        margin-bottom: 1.5rem;
        animation: fadeIn 1s ease-in-out;
    }

    /* Fail Message */
    #fail-section p {
        font-size: 1.25rem;
        color: #555;
        margin-bottom: 2rem;
        animation: fadeIn 1.5s ease-in-out;
    }

    /* Button Styling */
    #fail-section .btn {
        font-size: 1rem;
        font-weight: 600;
        padding: 0.75rem 1.5rem;
        border-radius: 8px;
        transition: background-color 0.3s ease, transform 0.3s ease;
    }

    #fail-section .btn-primary {
        background-color: var(--base-color);
        border: none;
    }

    #fail-section .btn-primary:hover {
        background-color: #1c2c5a;
        transform: scale(1.05);
    }

    #fail-section .btn-secondary {
        background-color: #6c757d;
        border: none;
    }

    #fail-section .btn-secondary:hover {
        background-color: #5a6268;
        transform: scale(1.05);
    }

    /* Responsive Adjustments */
    @media (max-width: 768px) {
        #fail-section h1 {
            font-size: 2rem;
        }

        #fail-section p {
            font-size: 1rem;
        }

        #fail-section .btn {
            font-size: 0.9rem;
            padding: 0.5rem 1rem;
        }
    }
</style>

<!-- Fail Section -->
<section id="fail-section">
    <div class="container">
        <h1 class="animate__animated animate__fadeIn">Fail</h1>
        <p class="animate__animated animate__fadeIn">Oops! Something went wrong. Please try again.</p>
        <div class="mt-4">
            <a href="<?= base_url('/') ?>" class="btn btn-primary animate__animated animate__pulse animate__infinite">
                <i class="fas fa-home me-2"></i> Go Back Home
            </a>
            <a href="<?= base_url('/contact') ?>" class="btn btn-secondary">
                <i class="fas fa-envelope me-2"></i> Contact Support
            </a>
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
        const heading = document.querySelector('#fail-section h1');
        const message = document.querySelector('#fail-section p');
        const buttons = document.querySelectorAll('#fail-section .btn');

        heading.classList.add('animate__animated', 'animate__fadeIn');
        message.classList.add('animate__animated', 'animate__fadeIn');
        buttons.forEach(button => {
            button.classList.add('animate__animated', 'animate__fadeInUp');
        });
    });
</script>