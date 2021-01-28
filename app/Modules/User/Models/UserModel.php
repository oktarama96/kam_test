<?php 

namespace App\Modules\User\Models;
use CodeIgniter\Model;
 
class UserModel extends Model{
    protected $table = 'login';
    protected $allowedFields = ['name','email','password','created_at'];
}

?>