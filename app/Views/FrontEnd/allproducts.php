<?php include 'includes/header.php'; ?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<link rel="stylesheet" href="<?= base_url('/assets/front/css/allproducts.css') ?>">

<section id="product-page">
  <div class="container-xl">
    <!-- Product Gallery Display -->
    <div id="productGrid">
      <?php 
      if (!empty($products)): 
          
        // Sort products by created_at in ascending order (oldest first)
       // Sort products by created_at in descending order (newest first)
usort($products, function ($a, $b) {
    $a_date = is_object($a) ? strtotime($a->created_at) : strtotime($a['created_at']);
    $b_date = is_object($b) ? strtotime($b->created_at) : strtotime($b['created_at']);
    return $b_date - $a_date; // Newest first
});

        

        foreach ($products as $product): 
          $status = is_object($product) ? $product->status : $product['status'];
          $category_id = is_object($product) ? $product->category_id : $product['category_id'];
          $product_images = is_object($product) ? $product->product_images : $product['product_images'];
          $product_id = is_object($product) ? $product->product_id : $product['product_id'];
          $product_name = is_object($product) ? $product->product_name : $product['product_name'];
          $category_name = is_object($product) ? $product->category_name : $product['category_name'];
          $product_price = is_object($product) ? $product->product_price : $product['product_price'];

          if ($status == 1): 
            $images = json_decode($product_images);
            $productImage = !empty($images) ? '/assets/images/upload/' . $images[0] : 'assets/images/upload/default.jpg';
      ?>
            <div class="product-item" data-category="<?= $category_id ?>">
              <a href="<?= base_url('/product/single_product/' . $product_id) ?>">
                <img src="<?= base_url($productImage) ?>" alt="<?= esc($product_name) ?>">
              </a>
              <h6><?= $product_name ?></h6>
              <h6 style="color:grey;"><?= $category_name ?></h6>
              <p class="price" style="color:black;">Rs.<?= $product_price ?></p>
            </div>
      <?php 
          endif; 
        endforeach;
      else: 
      ?>
        <p>No products found.</p>
      <?php endif; ?>
    </div>
  </div>


<?php include 'includes/footer.php'; ?>