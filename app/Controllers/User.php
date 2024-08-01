<?php

namespace App\Controllers;

// Models
use App\Models\ModelUsers;
use App\Models\ModelPaket;
use App\Models\ModelAtribut;
use App\Models\ModelHitung;

class User extends BaseController
{
     public function __construct()
     {
          helper('form');
          $this->ModelUsers = new ModelUsers();
          $this->ModelPaket = new ModelPaket();
          $this->ModelAtribut = new ModelAtribut();
          $this->ModelHitung = new ModelHitung();
     }

     public function home()
     {
          $per_halaman = 6;
          $data = [
               'title' => "Home User",
               'validation' => \Config\Services::validation(),
               'data' => $this->ModelAtribut->getAtribut()->paginate($per_halaman, 'atribut_dasar'),
               'pager' => $this->ModelAtribut->pager,
          ];
          return view('/user/home', $data);
     }

     public function detail_paket($id_paket)
     {
          $data = [
               'title' => "Detail paket",
               'validation' => \Config\Services::validation(),
               'data' => $this->ModelAtribut->getAtribut($id_paket)
          ];
          return view('/user/detail_paket', $data);
     }

     public function rekomendasi()
     {
          $data = [
               'title' => "Rekomendasi",
               'validation' => \Config\Services::validation()
          ];
          return view('/user/rekomendasi', $data);
     }

     // Sistem Pakar dengan metode Knowledge Based algoritma CBR ( Constraint based )
     public function metode_cbr(int $id_hitung, int $id, array $input)
     {
          $hitung = $this->ModelAtribut->getAtribut($id);
          $hasil = [
               'id_hitung' => $id_hitung,
               'kategori' => $hitung['kategori'] == $input['kategori'] ? 1 : 0,
               'alamat' => $hitung['alamat'] == $input['alamat'] ? 1 : 0,
               'undangan' => $hitung['undangan'] == $input['undangan'] ? 1 : 0,
               'mc_resepsi' => $hitung['mc_resepsi'] == $input['mc_resepsi'] ? 1 : 0,
               'rias_busana' => $hitung['rias_busana'] == $input['rias_busana'] ? 1 : 0,
               'catering' => $hitung['catering'] == $input['catering'] ? 1 : 0,
               'dekorasi' => $hitung['dekorasi'] == $input['dekorasi'] ? 1 : 0,
               'dokumentasi' => $hitung['dokumentasi'] == $input['dokumentasi'] ? 1 : 0,
               'orgen_tunggal' => $hitung['orgen_tunggal'] == $input['orgen_tunggal'] ? 1 : 0,
               'harga' => $hitung['harga'] == $input['harga'] ? 1 : 0,
          ];
          $this->ModelHitung->save($hasil);
          array_shift($hasil);
          $top = count(array_filter($hasil, function ($v) {
               return $v == 1;
          }));
          $bottom = count(array_filter($input, function ($v) {
               return $v != 0 || $v != "";
          }));
          // Hasil ==> Jika sama 1, Jika beda 0
          $final = $top / $bottom;
          $this->ModelHitung->save([
               'id_hitung' => $id_hitung,
               'hasil' => $final > 1 ? 1 : $final
          ]);
     }

     public function hitung()
     {
          $input = [
               'kategori' => strtolower($this->request->getPost('kategori')),
               'alamat' => $this->request->getPost('alamat'),
               'undangan' => $this->request->getPost('undangan'),
               'mc_resepsi' => $this->request->getPost('mc') == 'Ya' ? 1 : 0,
               'rias_busana' => $this->request->getPost('rias_busana') == 'Ya' ? 1 : 0,
               'catering' => $this->request->getPost('catering') == 'Ya' ? 1 : 0,
               'dekorasi' => $this->request->getPost('dekorasi') == 'Ya' ? 1 : 0,
               'dokumentasi' => $this->request->getPost('dokumentasi') == 'Ya' ? 1 : 0,
               'orgen_tunggal' => $this->request->getPost('orgen') == 'Ya' ? 1 : 0,
               'harga' => $this->request->getPost('harga'),
          ];
          $data = $this->ModelHitung->select(['id_hitung', 'id_paket'])->get()->getResultArray();
          // Hitung hasil per row
          foreach ($data as $v) {
               $this->metode_cbr($v['id_hitung'], $v['id_paket'], $input);
          }
          session()->setFlashdata('pesan', "Menampilkan hasil rekomendasi");
          return redirect()->to('/user/hasil');
     }

     public function hasil()
     {
          $per_halaman = 6;
          $data = [
               'title' => 'Hasil Rekomendasi',
               'data' => $this->ModelHitung->join('paket', 'paket.id_paket=hitung.id_paket')->join('atribut_harga', 'atribut_harga.id_paket=hitung.id_paket')->join('atribut_dasar', 'atribut_dasar.id_paket=hitung.id_paket')->where(['hasil =' => 1])->paginate($per_halaman, 'hitung'),
               'pager' => $this->ModelHitung->pager,
               'validation' => \Config\Services::validation()
          ];
          return view('/user/hasil', $data);
     }
}
