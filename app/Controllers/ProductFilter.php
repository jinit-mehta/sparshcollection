<?php

namespace App\Controllers;

use App\Models\Products;

class ProductFilter extends BaseController
{
    public function filterByCategory()
    {
        $selectedCategories = $this->request->getJSON()->categories ?? [];

        $productModel = new Products();
        $filteredProducts = $productModel->getProductsByCategory($selectedCategories);

        return $this->response->setJSON($filteredProducts);
    }
}
