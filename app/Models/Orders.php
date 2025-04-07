<?php

namespace App\Models;

use CodeIgniter\Model;

class Orders extends Model{

    protected $table = 'orders';

    protected $primaryKey='id';

    protected $allowedFields=['orders_id','order_no','user_id','tx_id','price','sub_total','total_tax','total_discount','status','merchant_status','courier_name','tracking_id'];
}

?>