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

    /* Highlight Sparsh Collection */
    .highlight {
        color: #273B79; /* Blue color */
        font-weight: bold;
    }

    /* Prevent line break for WhatsApp text */
    .whatsapp-text {
        white-space: nowrap; /* Prevents text from breaking into a new line */
    }
</style>

<section class="container">
    <h2>Privacy Policy</h2>
    <p>At <span class="highlight">Sparsh Collection</span>, we are committed to protecting your privacy and ensuring the security of your personal information. This Privacy Policy outlines how we collect, use, and safeguard your data when you interact with our website or purchase our products.</p>
    <ul>
        <li><strong>Information We Collect:</strong> We collect personal details (name, email, phone, address), order information (products, payment details), and communication data (feedback, reviews).</li>
        <li><strong>How We Use Your Data:</strong> Your information is used to process orders, provide customer support, personalize your shopping experience, send promotional offers (with your consent), improve our website, and comply with legal obligations.</li>
        <li><strong>Data Security:</strong> We protect your data through encryption (SSL), secure storage with restricted access, and regular security audits.</li>
        <li><strong>Sharing Your Information:</strong> We do not sell your data. We may share it with trusted service providers (e.g., shipping, payment processors) and legal authorities when required.</li>
        <li><strong>Your Rights:</strong> You can access, correct, or delete your data and opt-out of marketing communications.</li>
        <li><strong>Third-Party Links:</strong> We are not responsible for the privacy practices of third-party websites linked on our site.</li>
        <li><strong>Policy Updates:</strong> We may update this policy. Changes will be posted on this page.</li>
    </ul>
    <p>If you have any questions or concerns about our Privacy Policy, please <span class="whatsapp-text">WhatsApp us on <span class="contact-number">+91 98200 51775</span>.</span></p>
    <blockquote>“We thank you for choosing Sparsh Collection and appreciate your trust in our brand. Your satisfaction is our priority, and we are dedicated to safeguarding your privacy.”</blockquote>
</section>

<?= view('FrontEnd/includes/footer') ?>