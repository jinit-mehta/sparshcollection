<?php
// This code would go in your controller method
// Handle the product images in the specified order
if (isset($_FILES['product_image']) && !empty($_FILES['product_image']['name'][0])) {
    // Get uploaded files
    $files = $_FILES['product_image'];
    
    // Get the custom order from the form
    $imageOrder = $this->request->getPost('image_order');
    $orderArray = !empty($imageOrder) ? explode(',', $imageOrder) : [];
    
    // If we have no order, create a default sequential order
    if (empty($orderArray)) {
        $orderArray = range(0, count($files['name']) - 1);
    }
    
    // Track uploaded images
    $uploadedImages = [];
    
    // First pass: Upload all files and store them with their original indices
    $tempImages = [];
    
    foreach ($files['name'] as $key => $filename) {
        if (empty($filename)) continue;
        
        // Generate unique filename
        $newFilename = uniqid() . '_' . $filename;
        $uploadPath = FCPATH . 'uploads/products/' . $newFilename;
        
        if (move_uploaded_file($files['tmp_name'][$key], $uploadPath)) {
            $tempImages[$key] = [
                'path' => 'uploads/products/' . $newFilename,
                'original_name' => $filename
            ];
        }
    }
    
    // Second pass: Arrange images according to the order array
    foreach ($orderArray as $position => $originalIndex) {
        if (isset($tempImages[$originalIndex])) {
            // Add to final list in the correct order
            $uploadedImages[] = $tempImages[$originalIndex]['path'];
            
            // You can also store metadata about each image if needed
            // $imageMetadata[] = [
            //     'path' => $tempImages[$originalIndex]['path'],
            //     'original_name' => $tempImages[$originalIndex]['original_name'],
            //     'position' => $position
            // ];
        }
    }
    
    // First image in the order is the thumbnail
    $thumbnailImage = !empty($uploadedImages) ? $uploadedImages[0] : '';
    
    // Store images as a comma-separated string or JSON for more complex data
    $imageString = implode(',', $uploadedImages);
    // For storing more metadata: $imageData = json_encode($imageMetadata);
    
    // Add to product data
    $productData['product_images'] = $imageString;
    $productData['product_thumbnail'] = $thumbnailImage;
    
    // Now save the product data
    $productModel = new \App\Models\ProductModel();
    
    // Other form data
    $productData['name'] = $this->request->getPost('name');
    $productData['price'] = $this->request->getPost('price');
    // Add other fields as needed
    
    $productId = $this->request->getPost('product_id');
    
    if (!empty($productId)) {
        // Update existing product
        $productModel->update($productId, $productData);
    } else {
        // Add new product
        $productModel->insert($productData);
    }
    
    return redirect()->to('/admin/products')->with('success', 'Product saved successfully with ' . count($uploadedImages) . ' images');
}
?>