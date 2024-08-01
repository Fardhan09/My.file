<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelUsers extends Model
{
     protected $table = 'users';
     protected $useTimestamps = false;
     protected $primaryKey = 'id_user';
     protected $allowedFields = ['username', 'email', 'phone', 'password', 'user_role'];

     public function getUser($email = false)
     {
          if ($email == false) {
               return $this->findAll();
          }
          return $this->where(['email' => $email])->get()->getRowArray();
     }
}
