<?php

namespace App\Models;

use CodeIgniter\Model;

class Products extends Model {

    protected $table = "tbl_product";
    protected $primaryKey = 'product_id';
    protected $allowedFields = ['product_title', 'product_image', 'product_price', 'product_mrp', 'discount'];

    public function productdetail($url) {
        $this->join('categories', 'categories.id = tbl_product.product_category', 'INNER');
        $this->join('brand', 'brand.id = tbl_product.product_brand', 'INNER');
        $this->select('categories.*');
        $this->select('brand.name as b_name, brand.url, brand.image');
        $this->select('tbl_product.*');
        $this->where('product_url', $url);
        $result = $this->first();
        return $result;
    }

    public function relatedProduct($id, $product_category) {
        $query = $this->table('tbl_product')
                ->select('*')
                ->where('status', '1')
                ->where('product_category', $product_category)
                ->where('product_id !=', $id)
                ->orderBy('product_id', 'desc')
                ->limit(10)
                ->get();

        $result = $query->getResultArray(); //this will return the result in to array form
        return $result;
    }

    public function filterProducts($type) {
        $this->table('tbl_product');
        $this->select('*');

        // Add filtering conditions based on the provided $type
        switch ($type) {
            case 'name':
                $this->orderBy('product_title', 'asc');
                break;
            case 'price':
                $this->orderBy('product_price', 'asc');
                break;
            case 'latest':
                $this->orderBy('published_date', 'desc');
                break;
            default:
                $this->orderBy('product_id', 'asc');
        }

        $result = $this->get()->getResultArray();
        return $result;
    }

    public function getProductPrice($productId) {
        $product = $this->table('tbl_product')->where('product_id', $productId)->get()->getRowArray();
        return $product;
    }
    public function getProductPrices($productId) {
        $product = $this->table('product_sizes')->where('product_id', $productId)->get()->getRowArray();
        return $product;
    }
    public function getProduct($productId) {
        $product = $this->table('tbl_product')->where('product_id', $productId)->first();
        return $product;
    }

    public function getLatestProducts() {
        $this->data['latest'] = $this->orderBy('product_id', 'desc')
                ->limit(10)
                ->findAll();
    }

}

?>