<?= view('FrontEnd/includes/header') ?>

<style>
    /* General Styling */
    body {
        font-family: 'Playfair Display', serif;
        background-color: #f9f9f9;
        color: #333;
        margin: 0;
        padding: 0;
    }

    .container {
        max-width: 1200px;
        margin: 20px auto;
        padding: 20px;
    }

    h2 {
        text-align: center;
        color: #273B79; /* Blue color */
        font-size: 2.5rem;
        font-weight: bold;
        text-transform: uppercase;
        margin-bottom: 30px;
    }

    .first-line-container {
        text-align: center;
        margin-bottom: 30px;
    }

    p.first-line {
        font-size: 1.3rem;
        font-weight: bold;
        color: black;
        margin: 0;
    }

    p.second-line {
        font-size: 1.3rem;
        font-weight: bold;
        color: black;
        margin-top: 10px;
    }

    .vision-mission {
        display: flex;
        justify-content: space-between;
        align-items: stretch; /* Ensures equal height */
        gap: 30px;
        flex-wrap: wrap; /* Stacks vertically on smaller screens */
        margin-bottom: 40px;
    }

    .vision, .mission {
        flex: 1;
        min-width: 280px;
        min-height: 300px; /* Ensures equal height */
        padding: 30px;
        background-color: #ffffff;
        border: 2px solid #273B79; /* Blue border */
        border-radius: 10px;
        box-shadow: 0px 4px 12px rgba(0, 0, 0, 0.1);
        display: flex;
        flex-direction: column; /* Arranges content vertically */
        justify-content: center; /* Center content vertically */
        align-items: center; /* Center align horizontally */
        text-align: center;
    }

    .vision h3, .mission h3 {
        font-size: 2rem;
        color: #273B79; /* Updated heading color */
        margin-bottom: 15px;
    }

    .vision p, .mission p {
        font-size: 1.2rem;
        line-height: 1.8;
        color: #273B79; /* Updated paragraph color */
        margin: 0;
    }

    .quote {
        font-size: 1.8rem;
        font-style: italic;
        color: black;
        text-align: center;
        margin: 40px 20px;
        padding: 10px;
    }

    .quote-author {
        font-size: 1.8rem;
        font-weight: bold;
        text-align: center;
        color: black;
        margin-top: 20px;
    }

    .core-values {
        text-align: center;
        margin: 40px 0;
    }

    .core-values h3 {
        font-size: 2rem;
        color: #273B79;
        margin-bottom: 20px;
    }

    .core-values ul {
        list-style: none;
        padding: 0;
        display: inline-block;
        text-align: left;
    }

    .core-values ul li {
        font-size: 1.5rem;
        font-weight: bold;
        margin: 10px 0;
        color: #555;
        position: relative;
        padding-left: 20px;
    }

    .core-values ul li::before {
        content: '•';
        color: black;
        font-size: 1.5rem;
        position: absolute;
        left: 0;
        top: 0;
    }

    .history {
        margin-top: 40px;
    }

    .history h3 {
        font-size: 2rem;
        color: #273B79;
        margin-bottom: 20px;
        text-align: center;
    }

    .history p {
        font-size: 1.5rem;
        line-height: 1.8;
        color: #555;
        text-align: justify;
        margin-bottom: 20px;
    }

    .line {
        margin: 40px auto;
        width: 60%;
        height: 2px;
        background-color: #273B79; /* Blue line */
    }

    /* Responsive Design */
    @media (max-width: 768px) {
        .vision-mission {
            flex-direction: column; /* Stack Vision and Mission vertically */
        }

        .vision, .mission {
            height: auto; /* Remove fixed height for smaller screens */
            padding: 20px;
        }

        .vision p, .mission p {
            font-size: 1.1rem;
        }

        .quote-author {
            font-size: 1.3rem; /* Adjust for smaller screens */
        }
    }

    @media (max-width: 576px) {
        h2 {
            font-size: 1.8rem;
        }

        p {
            font-size: 1rem;
        }

        .quote {
            font-size: 1.3rem;
        }
    }
</style>

<section class="container">
    <!-- Header -->
    <h2>About Us</h2>
    <div class="first-line-container">
        <p class="first-line">Welcome to SPARSH Collection!</p>
        <p class="second-line">~A touch of elegance, emotions, and sustainability crafted into beautiful jewellery.</p>
    </div>

    <div class="content-wrapper">
        <!-- Vision & Mission Section -->
        <div class="vision-mission">
            <div class="vision">
                <h3>Our Vision</h3>
                <p>To create a world where elegance and sustainability coexist harmoniously, inspiring individuals to cherish jewellery that touches their hearts and respects nature,    We translate this into a collection that touches emotions and fosters a deep connection between nature and humanity       </p>
            </div>
            <div class="mission">
                <h3>Our Mission</h3>
                <p>To craft exquisite jewellery that embodies love, joy, and environmental consciousness, while empowering our customers to make mindful choices that the natural world needs to be protected for the earth to thrive, and the impact of our actions have on the environment. The SPARSH (touch) of emotions towards the environmental protection.</p>
            </div>
        </div>

        <!-- Quote Section -->
        <div class="quote">
            “SPARSH is often associated with the sense of touch & is considered a sacred act. It is believed that a gentle touch can bring healing & comfort. SPARSH is a collection of feelings, elegance, love, joy, and happiness in the form of crafted jewellery.”
        </div>
        <p class="quote-author">~Sneha & Prarthi</p>

        <!-- Core Values Section -->
        <div class="core-values">
            <h3>Our Core Values</h3>
            <ul>
                <li>Environmental Responsibility: Committed to sustainable practices that protect our planet.</li>
                <li>Elegance: Creating timeless jewellery that radiates beauty and sophistication.</li>
                <li>Craftsmanship: Honoring the art of jewellery making with precision and care.</li>
                <li>Emotion: Infusing every piece with love, joy, and a story to tell.</li>
                <li>Community: Building relationships that inspire trust, loyalty, and shared values.</li>
            </ul>
        </div>

        <!-- History Section -->
        <div class="history">
            <h3>Our Story</h3>
            <p>In English, one meaning of <span>SPARSH</span> is <span>AWARENESS</span>. At SPARSH Collection, we began with a dream: to bring awareness to environmental protection through jewellery. Our journey is inspired by the belief that nature’s beauty must be preserved for future generations. The understanding that the natural world needs to be protected for the earth 🌎 to thrive,  and the impact of our actions have on the environment. The SPARSH (touch) of emotions towards the environmental protection.</p>
            <p>SSPARSH is often associated with the sense of touch & is considered a sacred act. It is believed that a gentle touch can bring healing & comfort.SPARSH is a collection of touch of  feelings, elegance, love , joy , happiness , in the form of crafted jewellery.</p>
        </div>

        <!-- Centered Line -->
        <div class="line"></div>
    </div>
</section>

<?= view('FrontEnd/includes/footer') ?>
