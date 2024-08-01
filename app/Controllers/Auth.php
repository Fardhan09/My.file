<?php

namespace App\Controllers;

// Models
use App\Models\ModelUsers;

class Auth extends BaseController
{

     public function __construct()
     {
          helper('form');
          $this->ModelUsers = new ModelUsers();
     }

     public function register()
     {
          $data = [
               'title' => 'Register',
               'validation' => \Config\Services::validation()
          ];
          return view('auth/register', $data);
     }

     public function save_akun()
     {
          if (!$this->validate([
               'username' => [
                    'rules' => 'required',
                    'errors' => [
                         'required' => 'Nama harus diisi'
                    ]
               ],
               'email' => [
                    'rules' => "required|is_unique[users.email]|valid_email",
                    'errors' => [
                         'required' => 'Email harus diisi',
                         'is_unique' => 'Email sudah terdaftar',
                         'valid_email' => 'Masukan Email Valid'
                    ]
               ],
               'phone' => [
                    'rules' => 'required|integer',
                    'errors' => [
                         'required' => 'No HP harus diisi',
                         'integer' => 'Masukan no telepon'
                    ]
               ],
               'password' => [
                    'rules' => "required|min_length[8]",
                    'errors' => [
                         'required' => 'Password harus diisi',
                         'min_length' => 'Masukan minimal 8 karakter'
                    ]
               ],
               'repassword' => [
                    'rules' => "required|min_length[8]|matches[password]",
                    'errors' => [
                         'required' => 'Konfirmasi harus diisi',
                         'min_length' => 'Masukan minimal 8 karakter',
                         'matches' => 'Password tidak sama'
                    ]
               ]
          ])) {
               // Jika validasi gagal
               session()->setFlashdata('gagal', 'Data gagal disimpan');
               return redirect()->to('/auth/register')->withInput();
          } else {
               // Save data user
               // User Role ==> 1 = Admin, 2 = User Biasa
               $this->ModelUsers->save([
                    'username' => htmlspecialchars($this->request->getPost('username')),
                    'email' => $this->request->getPost('email'),
                    'phone' => $this->request->getPost('phone'),
                    'password' => password_hash($this->request->getPost('repassword'), PASSWORD_DEFAULT),
                    'user_role' => 2
               ]);
               session()->setFlashdata('pesan', 'Data berhasil disimpan');
               return redirect()->to('/auth/login');
          }
     }

     public function login()
     {
          $data = [
               'title' => 'login',
               'validation' => \Config\Services::validation()
          ];
          return view('auth/login', $data);
     }

     public function cek_login()
     {
          if (!$this->validate([
               'email' => [
                    'rules' => 'required',
                    'errors' => [
                         'required' => 'Nama harus diisi'
                    ]
               ],
               'password' => [
                    'rules' => 'required',
                    'errors' => [
                         'required' => 'Password harus diisi'
                    ]
               ]
          ])) {
               // Jika validasi gagal
               session()->setFlashdata('gagal', 'Silahkan periksa kembali');
               return redirect()->to('/auth/login')->withInput();
          } else {
               // User role = [ 1 => "Admin", 2 => "User" ];
               $email = $this->request->getPost('email');
               $pass = $this->request->getPost('password');
               $data_user = $this->ModelUsers->getUser($email);
               if ($data_user) {
                    $sesi_login = [
                         'username' => $data_user['username'],
                         'email' => $data_user['email'],
                         'user_role' => $data_user['user_role'],
                         'phone' => $data_user['phone']
                    ];
                    // Admin
                    if ($data_user['user_role'] == 1) {
                         if (password_verify($pass, $data_user['password'])) {
                              session()->set($sesi_login);
                              session()->set('admin', true);
                              session()->setFlashdata('pesan', 'Selamat Datang Admin');
                              return redirect()->to('/admin/home');
                         } else {
                              session()->setFlashdata('gagal', 'Password Salah');
                              return redirect()->to('/auth/login');
                         }
                    }
                    // User
                    else {
                         if (password_verify($pass, $data_user['password'])) {
                              session()->set($sesi_login);
                              session()->set('user', true);
                              session()->setFlashdata('pesan', "Selamat datang $data_user[username]");
                              return redirect()->to('/user/home');
                         } else {
                              session()->setFlashdata('gagal', 'Password Salah');
                              return redirect()->to('/auth/login');
                         }
                    }
               } else {
                    session()->setFlashdata('gagal', 'Email Salah');
                    return redirect()->to('/auth/login');
               }
          }
     }

     public function logout()
     {
          //Hancurkan semua sesi login
          session()->remove([
               'username', 'email', 'phone', 'user_role'
          ]);
          session()->setFlashdata('pesan', 'Berhasil Keluar...!');
          return redirect()->to('/auth/login');
     }

     //--------------------------------------------------------------------

}
