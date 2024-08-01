<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelAtributHarga extends Model
{
     protected $table = 'atribut_harga';
     protected $useTimestamps = false;
     protected $primaryKey = 'id_atribut_harga';
     protected $allowedFields = ['id_paket', 'harga'];

     public function getAtributHarga($id_atribut_harga = false)
     {
          if ($id_atribut_harga == false) {
               return $this->findAll();
          }
          return $this->where(['id_atribut_harga' => $id_atribut_harga])->get()->getRowArray();
     }
}
