<?php

namespace App\Models;

use CodeIgniter\Model;

class Products extends Model
{
    protected $table = 'products';
    protected $primaryKey = 'product_id';
    protected $returnType = 'array';
    protected $allowedFields = [
        'product_name', 'product_price', 'quantity', 'product_desc', 'category_id', 'brand_id', 'status',
        'feature_product', 'product_images', 'dia_pcs', 'dia_quality', 'dia_cts', 'silver_net_wt',
        'length_bracelet', 'pearl_piece', 'pearl_wt', 'total_price', 'created_at', 'date_added', 'style_number', 'color', 'dia_color'
    ];

    /**
     * Fetch products by category.
     *
     * @param array $selectedCategories
     * @return array
     */
    public function getProductsByCategory($selectedCategories)
    {
        $cacheKey = 'products_by_category_' . md5(serialize($selectedCategories));
        $cache = \Config\Services::cache();

        // Try to fetch from cache
        if ($cachedData = $cache->get($cacheKey)) {
            return $cachedData;
        }

        $query = $this->select('products.*, brands.brand_name, categories.category_name')
            ->join('brands', 'brands.brand_id = products.brand_id')
            ->join('categories', 'categories.category_id = products.category_id');

        if (!empty($selectedCategories)) {
            $query->whereIn('categories.category_name', $selectedCategories); // Filter by category name
        }

        $result = $query->get()->getResultArray();

        // Store in cache for 1 hour
        $cache->save($cacheKey, $result, 3600);

        return $result;
    }

    /**
     * Fetch all active products with brand and category details.
     *
     * @param int $perPage (for pagination)
     * @param int $page (for pagination)
     * @return array
     */
    public function getAllProduct($perPage = null, $page = 1)
    {
        $cacheKey = 'all_products_' . $perPage . '_' . $page;
        $cache = \Config\Services::cache();

        // Try to fetch from cache
        if ($cachedData = $cache->get($cacheKey)) {
            return $cachedData;
        }

        $query = $this->select('products.*, brands.brand_name, categories.category_name')
            ->join('brands', 'brands.brand_id = products.brand_id')
            ->join('categories', 'categories.category_id = products.category_id')
            ->where('products.status', 1); // Only fetch active products

        // Add pagination if $perPage is provided
        if ($perPage) {
            $result = $query->paginate($perPage, 'default', $page);
        } else {
            $result = $query->get()->getResultArray();
        }

        // Store in cache for 1 hour
        $cache->save($cacheKey, $result, 3600);

        return $result;
    }

    /**
     * Fetch a single product by ID with brand and category details.
     *
     * @param int $id
     * @return array|null
     */
    public function getProductById($id)
    {
        $cacheKey = 'product_by_id_' . $id;
        $cache = \Config\Services::cache();

        // Try to fetch from cache
        if ($cachedData = $cache->get($cacheKey)) {
            return $cachedData;
        }

        $result = $this->select('products.*, categories.category_name, brands.brand_name')
            ->join('categories', 'categories.category_id = products.category_id', 'left')
            ->join('brands', 'brands.brand_id = products.brand_id', 'left')
            ->where('products.product_id', $id)
            ->get()
            ->getRowArray(); // Ensures a single result as an array

        // Store in cache for 1 hour
        $cache->save($cacheKey, $result, 3600);

        return $result;
    }

    /**
     * Fetch featured products with brand and category details.
     *
     * @return array
     */
    public function getFeatureProduct()
    {
        $cacheKey = 'featured_products';
        $cache = \Config\Services::cache();

        // Try to fetch from cache
        if ($cachedData = $cache->get($cacheKey)) {
            return $cachedData;
        }

        $result = $this->select('products.*, brands.brand_name, categories.category_name')
            ->join('brands', 'brands.brand_id = products.brand_id')
            ->join('categories', 'categories.category_id = products.category_id')
            ->where('products.feature_product', 1)
            ->get()
            ->getResultArray();

        // Store in cache for 1 hour
        $cache->save($cacheKey, $result, 3600);

        return $result;
    }

    /**
     * Fetch similar products by category, excluding the current product.
     *
     * @param int $categoryId
     * @param int $currentProductId
     * @param int $limit
     * @return array
     */
    public function getSimilarProducts($categoryId, $currentProductId, $limit = 4)
    {
        $cacheKey = 'similar_products_' . $categoryId . '_' . $currentProductId . '_' . $limit;
        $cache = \Config\Services::cache();

        // Try to fetch from cache
        if ($cachedData = $cache->get($cacheKey)) {
            return $cachedData;
        }

        $result = $this->where('category_id', $categoryId)
            ->where('product_id !=', $currentProductId)
            ->where('status', 1) // Only fetch active products
            ->limit($limit)
            ->findAll();

        // Store in cache for 1 hour
        $cache->save($cacheKey, $result, 3600);

        return $result;
    }

    /**
     * Fetch the latest products.
     *
     * @param int $limit
     * @return array
     */
    public function getLatestProducts($limit = 4)
    {
        $cacheKey = 'latest_products_' . $limit;
        $cache = \Config\Services::cache();

        // Try to fetch from cache
        if ($cachedData = $cache->get($cacheKey)) {
            return $cachedData;
        }

        $result = $this->orderBy('created_at', 'DESC')
            ->limit($limit)
            ->findAll();

        // Store in cache for 1 hour
        $cache->save($cacheKey, $result, 3600);

        return $result;
    }
}
