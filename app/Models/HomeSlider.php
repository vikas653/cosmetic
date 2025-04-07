<?php

namespace App\Models;

use CodeIgniter\Model;

class HomeSlider extends Model{

    protected $table = 'home_slider';

    protected $primaryKey='id';

    protected $allowedFields=['name','img','platform'];
}

?>

