<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelAtribut extends Model
{
     protected $table = 'atribut_dasar';
     protected $useTimestamps = false;
     protected $primaryKey = 'id_atribut_dasar';
     protected $allowedFields = ['id_paket', 'kategori', 'undangan', 'lokasi', 'deskripsi', 'dekorasi', 'paket_dekorasi', 'catering', 'paket_catering', 'mc_resepsi', 'rias_busana', 'paket_rias_busana', 'dokumentasi', 'paket_dokumentasi', 'orgen_tunggal', 'gambar'];

     public function getAtribut($id_atribut_dasar = false)
     {
          if ($id_atribut_dasar == false) {
               return $this->join('paket', 'paket.id_paket=atribut_dasar.id_paket')->join('atribut_harga', 'atribut_dasar.id_paket=atribut_harga.id_paket');
          }
          return $this->join('paket', 'paket.id_paket=atribut_dasar.id_paket')->join('atribut_harga', 'atribut_dasar.id_paket=atribut_harga.id_paket')->where(['id_atribut_dasar' => $id_atribut_dasar])->get()->getRowArray();
     }
}
