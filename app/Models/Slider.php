<?php

namespace App\Models;

use CodeIgniter\Model;

class Slider extends Model{

    protected $table = 'slider';

    protected $primaryKey='id';

    protected $allowedFields=['name','image'];
}

?>

