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
        margin: 20px auto;
        padding: 20px;
        text-align: left;
    }

    h2 {
        text-align: center;
        color: #273B79; /* Blue color */
        font-size: 2rem;
        font-weight: bold;
        text-transform: uppercase;
        margin-bottom: 20px;
    }

    p {
        font-size: 1rem;
        color: #333;
        line-height: 1.6;
    }

    ul {
        margin: 10px 0 20px 20px;
        list-style-type: disc;
    }

    ul li {
        font-size: 1rem;
        color: #333;
        margin: 8px 0;
    }

    .contact-number {
        color: #273B79; /* Blue color */
        font-weight: bold;
    }

    blockquote {
        font-style: italic;
        margin: 30px 0;
        padding-left: 15px;
        border-left: 4px solid #273B79; /* Blue color */
        color: #333;
        
    }
</style>

<section class="container">
    <h2>Shipping Policy</h2>
    <p>At Sparsh Collection, we strive to deliver your order in the safest and most reliable way. We will do our best to get your jewellery to you as soon as possible. Here are some further details about our shipping policy:</p>
    <ul>
        <li>We process all orders within <strong>20-25 working days</strong> of receiving them, and we will do our best to get your jewellery to you as soon as possible.</li>
        <li>Please note that our shipping times may be impacted by factors such as unexpected weather events and national holidays, which may delay the delivery of your order.</li>
        <li>Each piece of jewellery is handcrafted with precision and care, and this processing time ensures the highest quality standards are maintained.</li>
        <li>Please ensure that the delivery address provided is accurate and complete. Any errors or omissions may result in delays or failed deliveries.</li>
        <li>In case of changes to the delivery address after placing the order, please contact us immediately.</li>
    </ul>
    <p>We always strive to provide the best possible shipping experience for our customers. If you have any questions about our shipping policy, please WhatsApp us on <span class="contact-number">+91 98200 51775</span>.</p>
    <blockquote>“We thank you for choosing Sparsh Collection and appreciate your trust in our brand, this beautiful jewellery is crafted in 925 silver and contains Lab Grown Diamonds (CVD). Your satisfaction is our priority, and we look forward to delivering your jewellery with care and love.”</blockquote>
</section>

<?= view('FrontEnd/includes/footer') ?>
