<?php

namespace App\Models;

use CodeIgniter\Model;

class User extends Model{

    protected $table = 'user';

    protected $primaryKey='id';

    protected $allowedFields=['email','password'];
}

?>