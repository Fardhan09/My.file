<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelPaket extends Model
{
     protected $table = 'paket';
     protected $useTimestamps = false;
     protected $primaryKey = 'id_paket';
     protected $allowedFields = ['nama_paket', 'alamat'];

     public function getPaket($id_paket = false)
     {
          if ($id_paket == false) {
               return $this->findAll();
          }
          return $this->where(['id_paket' => $id_paket])->get()->getRowArray();
     }
}
