<?= '<?xml version="1.0" encoding="UTF-8"?>' ?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">

    <!-- Home Page -->
    <url>
        <loc><?= base_url() ?></loc>
        <lastmod><?= date('Y-m-d') ?></lastmod>
        <changefreq>daily</changefreq>
        <priority>1.0</priority>
    </url>

    <!-- Important Static Pages -->
    <?php 
    $staticPages = [
        'about' => '0.9',
        'contact' => '0.9',
        'return-policy' => '0.7',
        'shipping-policy' => '0.7',
        'privacy-policy' => '0.7',
        'jewellery-care' => '0.8'
    ];
    
    foreach ($staticPages as $page => $priority): ?>
        <url>
            <loc><?= base_url($page) ?></loc>
            <lastmod><?= date('Y-m-d') ?></lastmod>
            <changefreq>weekly</changefreq>
            <priority><?= $priority ?></priority>
        </url>
    <?php endforeach; ?>

    <!-- Dynamic Product Pages -->
    <?php foreach ($products as $product): ?>
        <url>
            <loc><?= base_url('product/single_product/' . $product['id']) ?></loc>
            <lastmod><?= date('Y-m-d', strtotime($product['updated_at'])) ?></lastmod>
            <changefreq>weekly</changefreq>
            <priority>0.9</priority>
        </url>
    <?php endforeach; ?>

    <!-- Dynamic Categories -->
    <?php foreach ($categories as $category): ?>
        <url>
            <loc><?= base_url('productfilter/filterbycategory?category=' . urlencode($category['name'])) ?></loc>
            <lastmod><?= date('Y-m-d') ?></lastmod>
            <changefreq>weekly</changefreq>
            <priority>0.8</priority>
        </url>
    <?php endforeach; ?>

    <!-- Dynamic Brands -->
    <?php foreach ($brands as $brand): ?>
        <url>
            <loc><?= base_url('products/filterByBrands?brand=' . urlencode($brand['name'])) ?></loc>
            <lastmod><?= date('Y-m-d') ?></lastmod>
            <changefreq>weekly</changefreq>
            <priority>0.8</priority>
        </url>
    <?php endforeach; ?>

    <!-- Customer Account Pages -->
    <?php 
    $customerPages = [
        'customer/register' => '0.6',
        'customer/login' => '0.6',
        'customer/orders' => '0.7'
    ];
    
    foreach ($customerPages as $page => $priority): ?>
        <url>
            <loc><?= base_url($page) ?></loc>
            <lastmod><?= date('Y-m-d') ?></lastmod>
            <changefreq>monthly</changefreq>
            <priority><?= $priority ?></priority>
        </url>
    <?php endforeach; ?>

</urlset>
