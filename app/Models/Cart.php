<?php

namespace App\Models;

use CodeIgniter\Model;

class Cart extends Model {

    protected $table = 'cart';
    protected $primaryKey = 'id';
    protected $allowedFields = ['product_id', 'product_title', 'selected_size', 'product_price', 'qty', 'customer_id', 'product_image', 'discount', 'tax', 'session_id','size_name','write_up'];

    public function countItems($session_id) {
        // Use CodeIgniter's Query Builder to count items in the cart
        return $this->where('session_id', $session_id)->countAllResults();
    }

    public function viewCart($session_id) {
        return $this->where('session_id', $session_id)->get()->getResultArray();
    }

    public function cartByUserId($userId) {
        return $this->where('customer_id', $userId)->get()->getResultArray();
    }

    public function getCartItem($cartId) {
        return $this->where('id', $cartId)->first();
    }

    public function updateCart($cartId, $data) {
        return $this->update($data, ['id' => $cartId, 'customer_id' => session()->get('user_id')]);
    }

}

?>