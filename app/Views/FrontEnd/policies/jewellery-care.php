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
        color: #273B79;
        /* Blue color */
        font-size: 2rem;
        font-weight: bold;
        text-transform: uppercase;
        margin-bottom: 30px;
    }

    .content-wrapper {
        display: flex;
        justify-content: space-between;
        align-items: flex-start;
        gap: 20px;
        flex-wrap: wrap;
        /* Enables stacking on smaller screens */
    }

    .image-container {
        flex: 1;
        min-width: 280px;
        text-align: center;
    }

    .image-container img {
        max-width: 85%;
        height: auto;
        border-radius: 10px;
        border: 2px solid #273B79;
        /* Blue border */
    }

    .instructions {
        flex: 1;
        min-width: 280px;
        padding: 20px;
        background-color: #ffffff;
        border: 2px solid #273B79;
        /* Blue border */
        border-radius: 10px;
        box-shadow: 0px 4px 12px rgba(0, 0, 0, 0.1);
        text-align: left;
    }

    .instructions p:first-child {
        font-size: 1.2rem;
        /* Larger size for emphasis */
        font-weight: bold;
        color: #273B79;
        /* Blue color */
        margin-bottom: 15px;
        text-align: center;
        /* Center-align for better focus */
    }

    .instructions ul {
        margin: 0;
        padding: 0;
        list-style-type: disc;
        padding-left: 20px;
    }

    .instructions ul li {
        margin: 8px 0;
        font-size: 1rem;
        color: #333;
    }

    blockquote {
        font-style: italic;
        font-size: 1rem;
        margin-top: 20px;
        padding: 10px 15px;
        border-left: 4px solid #273B79;
        /* Blue color */
        color: #555;
        text-align: center;
        /* Center-align the blockquote */
        background-color: #f9f9f9;
        border-radius: 5px;
        max-width: 800px;
        margin-left: auto;
        margin-right: auto;
    }

    /* Responsive Design */
    @media (max-width: 768px) {
        .content-wrapper {
            flex-direction: column;
            /* Stacks the image and instructions */
            align-items: center;
        }

        .instructions {
            text-align: center;
            /* Center-align text for smaller screens */
        }

        .instructions ul {
            text-align: left;
            /* Keep the bullet points aligned to the left */
            display: inline-block;
        }

        blockquote {
            font-size: 0.95rem;
            /* Adjust size for smaller screens */
        }
    }

    @media (max-width: 576px) {
        h2 {
            font-size: 1.6rem;
            /* Reduce heading size */
        }

        .instructions ul li {
            font-size: 0.9rem;
            /* Compact font size */
        }

        .instructions p:first-child {
            font-size: 1rem;
            /* Adjust instruction title size */
        }

        blockquote {
            font-size: 0.85rem;
            /* Compact size for blockquote */
        }
    }
</style>

<section class="container">
    <h2>Jewellery Care</h2>
    <div class="content-wrapper">
        <!-- Image Container -->
        <div class="image-container">
            <img src="<?= base_url('assets/images/upload/instruction.jpeg') ?>" alt="Jewellery Care Instructions">
        </div>
        <!-- Instructions Section -->
        <div class="instructions">
            <p>Follow these simple steps to ensure your jewellery remains beautiful and long-lasting:</p>
            <ul>
                <li>Remove your jewellery while working out or performing heavy tasks.</li>
                <li>Always take off your jewellery before sleeping to avoid damage.</li>
                <li>Use a soft dry cloth to clean your jewellery gently.</li>
                <li>Keep your jewellery dry. Avoid wearing it while bathing or swimming.</li>
                <li>Store your jewellery in a box or pouch in a cool, dry place.</li>
                <li>Avoid contact with perfumes, cosmetics, or any harsh chemicals.</li>
            </ul>
        </div>
    </div>
    <blockquote>“We thank you for choosing Sparsh Collection and appreciate your trust, This beautiful piece of
        jewellery is crafted in 925 silver and contains Lab Grown Diamonds (CVD).”</blockquote>
</section>

<?= view('FrontEnd/includes/footer') ?>