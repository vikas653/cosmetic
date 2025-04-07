<?php

namespace App\Models;

use CodeIgniter\Model;

class ShippingAddress extends Model{

    protected $table = 'shipping_address';

    protected $primaryKey='id';

    protected $allowedFields=['user_id','first_name','last_name','address','district','state','pincode','phone','billing_first_name','billing_last_name','billing_address','billing_address1','billing_district','billing_state','billing_pincode','same_data'];

    public function getAddress($userId){
        return $this->where('id', $userId)->first();
    }
}

?>