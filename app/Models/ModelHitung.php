<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelHitung extends Model
{
     protected $table = 'hitung';
     protected $useTimestamps = false;
     protected $primaryKey = 'id_hitung';
     protected $allowedFields = ['id_paket', 'kategori', 'alamat', 'undangan', 'mc_resepsi', 'rias_busana',
      'catering', 'dekorasi', 'dokumentasi', 'orgen_tunggal', 'harga', 'hasil'];
}
