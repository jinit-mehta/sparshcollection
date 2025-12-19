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
        max-width: 800px;
        margin: 15px auto; /* Reduced margin */
        padding: 15px; /* Reduced padding */
        text-align: left;
    }

    h2 {
        text-align: center;
        color: #273B79; /* Blue color */
        font-size: 1.8rem; /* Slightly smaller */
        font-weight: bold;
        text-transform: uppercase;
        margin-bottom: 15px; /* Reduced spacing */
    }

    h3 {
        color: #273B79; /* Blue color */
        font-size: 1.3rem; /* Slightly smaller */
        font-weight: bold;
        margin-top: 15px; /* Reduced spacing */
        margin-bottom: 8px; /* Reduced spacing */
    }

    p {
        font-size: 0.95rem; /* Slightly smaller font */
        color: #333;
        line-height: 1.5; /* Slightly tighter spacing */
        margin-bottom: 10px; /* Reduced spacing */
    }

    ul {
        margin: 5px 0 15px 20px; /* Reduced spacing */
        list-style-type: disc;
    }

    ul li {
        font-size: 0.95rem; /* Slightly smaller font */
        color: #333;
        margin: 5px 0; /* Reduced spacing between items */
    }

    .contact-number {
        color: #273B79; /* Blue color */
        font-weight: bold;
    }

    blockquote {
        font-style: italic;
        margin: 15px 0; /* Reduced spacing */
        padding-left: 10px; /* Reduced padding */
        border-left: 3px solid #273B79; /* Blue color */
        color: #333;
    }

    /* Responsive Design */
    @media (max-width: 768px) {
        .container {
            padding: 10px; /* Reduced padding for smaller screens */
        }

        h2 {
            font-size: 1.6rem; /* Adjusted font size for smaller screens */
        }

        h3 {
            font-size: 1.2rem; /* Adjusted font size for smaller screens */
        }

        p, ul li {
            font-size: 0.9rem; /* Adjusted font size for smaller screens */
        }

        blockquote {
            padding-left: 8px;
            margin: 10px 0;
        }
    }

    @media (max-width: 576px) {
        .container {
            padding: 8px; /* Compact padding for extra small screens */
        }

        h2 {
            font-size: 1.5rem; /* Further reduced font size */
        }

        h3 {
            font-size: 1.1rem; /* Further reduced font size */
        }

        p, ul li {
            font-size: 0.85rem; /* Compact font size */
        }
    }
</style>

<section class="container">
    <h2>Return & Exchange Policy</h2>

    <h3>No Return Policy</h3>
    <p>We at Sparsh Collection do not offer a return policy.</p>

    <h3>Exchange Policy</h3>
    <p>We at Sparsh Collection offer an exchange of the same products. Exchanges will only be accepted if the request is submitted within <strong>24 hours</strong> of receiving your package. Please include an unboxing video along with your complaint ticket for a quick resolution.</p>
    <p>Exchanges will be accepted for the following reasons:</p>
    <ul>
        <li>Size or fitting issue.</li>
        <li>In case of damaged or missing product.</li>
        <li>Items must be returned in original condition with tags and packaging.</li>
        <li>Reverse pickup is not offered by Sparsh Collection.</li>
        <li>SPARSH reserves the right to process refunds after checking returned items.</li>
        <li>Products damaged or tarnished due to usage cannot be exchanged.</li>
    </ul>

    <h3>No Cancellations</h3>
    <p>Once an order is placed, it cannot be cancelled. We process orders promptly to ensure timely delivery.</p>

    <p>If you have any questions or concerns regarding your order, please WhatsApp us on <span class="contact-number">+91 98200 51775</span>.</p>
    
    <blockquote>“We thank you for choosing Sparsh Collection and appreciate your trust in our brand, this beautiful jewellery is crafted in 925 silver and contains Lab Grown Diamonds (CVD). Your satisfaction is our priority, and we are always here to assist you.”</blockquote>
</section>

<?= view('FrontEnd/includes/footer') ?>
