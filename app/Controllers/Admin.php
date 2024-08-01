<?php

namespace App\Controllers;

// Models
use App\Models\ModelUsers;
use App\Models\ModelPaket;
use App\Models\ModelAtribut;
use App\Models\ModelAtributHarga;
use App\Models\ModelHitung;

class Admin extends BaseController
{
	public function __construct()
	{
		helper('form');
		$this->ModelUsers = new ModelUsers();
		$this->ModelPaket = new ModelPaket();
		$this->ModelAtribut = new ModelAtribut();
		$this->ModelAtributHarga = new ModelAtributHarga();
		$this->ModelHitung = new ModelHitung();
	}

	public function home()
	{
		if (session()->get('user_role') != 1) {
			return redirect()->to('/auth/login');
		}
		$page_looping = $this->request->getVar('page_paket');
		$per_halaman = 10;
		$data = [
			'title' => "Home Admin",
			'data' => $this->ModelPaket->paginate($per_halaman, 'paket'),
			'pager' => $this->ModelPaket->pager,
			'validation' => \Config\Services::validation(),
			'row_count' => $this->ModelPaket->countAllResults(),
			'page_looping' => $page_looping ? $page_looping : 1,
			'per_halaman' => $per_halaman
		];
		return view('/admin/home', $data);
	}

	public function attribut_dasar()
	{
		if (session()->get('user_role') != 1) {
			return redirect()->to('/auth/login');
		}
		$page_looping = $this->request->getVar('page_atribut_dasar');
		$per_halaman = 10;
		$data = [
			'title' => "Attribut Dasar",
			'validation' => \Config\Services::validation(),
			'data' => $this->ModelAtribut->getAtribut()->paginate($per_halaman, 'atribut_dasar'),
			'pager' => $this->ModelAtribut->pager,
			'row_count' => $this->ModelAtribut->countAllResults(),
			'page_looping' => $page_looping ? $page_looping : 1,
			'per_halaman' => $per_halaman
		];
		return view('/admin/attribut_dasar', $data);
	}

	public function detail_paket($id_paket)
	{
		if (session()->get('user_role') != 1) {
			return redirect()->to('/auth/login');
		}
		if (($att = $this->ModelAtribut->join('paket', 'paket.id_paket=atribut_dasar.id_paket')->select(
			['kategori', 'nama_paket']
		)->where(
			['atribut_dasar.id_paket' => $id_paket]
		)->get()->getRowArray())['kategori'] == null) {
			session()->setFlashdata('gagal', "Silahkan melengkapi atribut sebelum melihat detail paket");
			return redirect()->to('/admin/attribut_dasar');
		};
		$data = [
			'title' => 'Detail Paket',
			'data' => $this->ModelAtribut->getAtribut($id_paket),
			'validation' => \Config\Services::validation(),
		];
		return view('/admin/detail_paket', $data);
	}

	public function akun()
	{
		if (session()->get('user_role') != 1) {
			return redirect()->to('/auth/login');
		}
		$page_looping = $this->request->getVar('page_users');
		$per_halaman = 10;
		$data = [
			'title' => 'Akun User',
			'data' => $this->ModelUsers->where(['user_role' => 2])->paginate($per_halaman, 'users'),
			'pager' => $this->ModelUsers->pager,
			'row_count' => $this->ModelUsers->where(['user_role' => 2])->countAllResults(),
			'page_looping' => $page_looping ? $page_looping : 1,
			'per_halaman' => $per_halaman,
			'validation' => \Config\Services::validation(),
		];
		return view('/admin/akun', $data);
	}

	// Live search dengan Ajax
	public function paket_search_with_ajax($key = '')
	{
		if (session()->get('user_role') != 1) {
			return redirect()->to('/admin/home');
		}
		$data = [
			'title' => 'Akun',
			'data' => $key != '' ? $this->ModelPaket->like('nama_paket', $key)->get()->getResultArray() : [],
			'validation' => \Config\Services::validation()
		];
		return view('/admin/ajax/paket_live', $data);
	}

	// Live search dengan Ajax
	public function akun_search_with_ajax($key = '')
	{
		if (session()->get('user_role') != 1) {
			return redirect()->to('/admin/home');
		}
		$data = [
			'title' => 'Akun',
			'data' => $key != '' ? $this->ModelUsers->where(['user_role' => 2])->like('username', $key)->get()->getResultArray() : [],
			'validation' => \Config\Services::validation()
		];
		return view('/admin/ajax/akun_live', $data);
	}

	// Live search dengan Ajax
	public function atribut_search_with_ajax($key = '')
	{
		if (session()->get('user_role') != 1) {
			return redirect()->to('/admin/home');
		}
		$data = [
			'data' => $key != '' ? $this->ModelAtribut->join('paket', 'paket.id_paket=atribut_dasar.id_paket')->join('atribut_harga', 'atribut_dasar.id_paket=atribut_harga.id_paket')->like('nama_paket', $key)->get()->getResultArray() : [],
			'validation' => \Config\Services::validation()
		];
		return view('/admin/ajax/atribut_dasar_live', $data);
	}

	public function save_user($email)
	{
		if (session()->get('user_role') != 1) {
			return redirect()->to('/auth/login');
		}
		// Url response => untuk kembali ke Url sebelumnya
		$url = $this->request->getPost('url_before_this');
		$rule_password = $this->request->getPost('password') == null
			? 'matches[repassword]' : "min_length[8]|matches[repassword]";
		$rule_repassword = $this->request->getPost('repassword') == null
			? 'matches[password]' : "min_length[8]|matches[password]";
		if (!$this->validate([
			'nama' => [
				'rules' => 'required',
				'errors' => [
					'required' => 'Nama harus diisi'
				]
			],
			'email' => [
				'rules' => 'required|valid_email',
				'errors' => [
					'required' => 'Email harus diisi',
					'valid_email' => 'Masukan email valid'
				]
			],
			'password' => [
				'rules' => $rule_password,
				'errors' => [
					'min_length' => 'Minimal 8 karakter',
					'matches' => 'Password tidak sama'
				]
			],
			'repassword' => [
				'rules' => $rule_repassword,
				'errors' => [
					'min_length' => 'Minimal 8 karakter',
					'matches' => 'Password tidak sama'
				]
			]
		])) {
			// Jika validasi gagal
			session()->setFlashdata('gagal', 'Gagal, Silahkan priksa kembali');
			return redirect()->to('/' . $url)->withInput();
		} else {
			$id = $this->ModelUsers->select('id_user')->where(['email' => $email])->get()->getRowArray();
			$add = [
				'id_user' => $id,
				'username' => htmlspecialchars($this->request->getPost('nama')),
				'email' => htmlspecialchars($this->request->getPost('email')),
			];
			$add_with_password = [
				'password' =>  password_hash($this->request->getPost('repassword'), PASSWORD_DEFAULT)
			];
			$this->ModelUsers->save(
				$this->request->getPost('password') == null ? $add : array_merge($add, $add_with_password)
			);
			session()->setFlashdata('pesan', 'Berhasil, Silahkan Login Kembali');
			return  redirect()->to('/auth/logout');
		}
	}

	// Fungsi untuk tambah paket dan Edit paket
	public function save_paket($segment) /* $segment = tambah || edit */
	{
		if (session()->get('user_role') != 1) {
			return redirect()->to('/auth/login');
		}
		$func = ($segment == 'tambah') ? '' : 'edit_';
		$pesan_flash = ($segment == 'tambah') ? 'disimpan' : 'diubah';
		if (!$this->validate([
			$func . 'nama_paket' => [
				'rules' => 'required|is_unique[paket.nama_paket]',
				'errors' => [
					'required' => 'Nama paket harus diisi',
					'is_unique' => 'Nama paket sudah terdaftar'
				]
			],
			$func . 'alamat' => [
				'rules' => 'required',
				'errors' => [
					'required' => 'Alamat harus diisi'
				]
			],
		])) {
			// Jika validasi gagal
			session()->setFlashdata('gagal', "Paket gagal $pesan_flash, Silahkan periksa kembali");
			return redirect()->to('/admin/home')->withInput();
		} else {
			$id_paket = $this->request->getPost('id_paket');
			// Cari id auto increment selanjutnya dari tabel paket
			$db = \Config\Database::connect();
			$query = $db->query("SHOW TABLE STATUS WHERE `Name` = 'paket'");
			$result = $query->getResult();
			foreach ($result as $row) {
				$next_id = $row->Auto_increment;
			}
			// Save to hitung
			$this->ModelHitung->save([
				'id_paket' => $next_id,
				'kategori' => 0,
				'alamat' => 0,
				'undangan' => 0,
				'mc_resepsi' => 0,
				'rias_busana' => 0,
				'catering' => 0,
				'dekorasi' => 0,
				'dokumentasi' => 0,
				'orgen_tunggal' => 0,
				'harga' => 0,
			]);
			// Save to atribut paket
			$this->ModelAtribut->save([
				'id_paket' => $next_id,
				'undangan' => 0,
				'mc_resepsi' => 0,
				'dekorasi' => 0,
				'catering' => 0,
				'dokumentasi' => 0,
				'orgen_tunggal' => 0,
				'gambar' => 'default.png'
			]);
			// Save to atribut harga
			$this->ModelAtributHarga->save([
				'id_paket' => $next_id,
				'harga' => 0
			]);
			// Save to paket
			$to_update = ['id_paket' => $id_paket];
			$to_add = [
				'nama_paket' => $this->request->getPost($func . 'nama_paket'),
				'alamat' => $this->request->getPost($func . 'alamat')
			];
			$this->ModelPaket->save($segment == 'tambah' ? $to_add : array_merge($to_update, $to_add));
			// Return
			session()->setFlashdata('pesan', "Paket berhasil $pesan_flash");
			return redirect()->to('/admin/home');
		}
	}

	public function save_atribut()
	{
		if (session()->get('user_role') != 1) {
			return redirect()->to('/auth/login');
		}
		if (!$this->validate([
			'kategori' => [
				'rules' => 'required',
				'errors' => [
					'required' => 'Kategori harus dipilih'
				]
			],
			'deskripsi' => [
				'rules' => 'required',
				'errors' => [
					'required' => 'Deskripsi harus diisi'
				]
			],
			'undangan' => [
				'rules' => 'required',
				'errors' => [
					'required' => 'Undangan harus diisi'
				]
			],
			'lokasi' => [
				'rules' => 'required',
				'errors' => [
					'required' => 'Lokasi harus diisi'
				]
			],
			'mc_resepsi' => [
				'rules' => 'required',
				'errors' => [
					'required' => 'MC Resepsi harus diisi'
				]
			],
			'rias_busana' => [
				'rules' => 'required',
				'errors' => [
					'required' => 'Rias dan Busana harus diisi'
				]
			],
			'catering' => [
				'rules' => 'required',
				'errors' => [
					'required' => 'Catering harus diisi'
				]
			],
			'dekorasi' => [
				'rules' => 'required',
				'errors' => [
					'required' => 'Dekorasi harus diisi'
				]
			],
			'dokumentasi' => [
				'rules' => 'required',
				'errors' => [
					'required' => 'Dokumentasi harus diisi'
				]
			],
			'orgen_tunggal' => [
				'rules' => 'required',
				'errors' => [
					'required' => 'Hiburan Orgen Tunggal harus diisi'
				]
			],
			'harga' => [
				'rules' => 'required',
				'errors' => [
					'required' => 'Harga Paket harus diisi'
				]
			],
		])) {
			// Jika validasi gagal
			session()->setFlashdata('gagal', "Gagal memperbarui atribut, Silahkan periksa kembali");
			return redirect()->to('/admin/attribut_dasar')->withInput();
		} else {
			$foto_baru = $this->request->getFile('foto');
			if ($foto_baru->getError() == 4) {
				$foto = $this->request->getVar('foto_lama');
			} else {
				$foto = $foto_baru->getRandomName();
				$foto_baru->move('gmb/paket/', $foto);
				//hapus foto lama
				if ($this->request->getVar('foto_lama') != 'default.png') {
					unlink('gmb/paket/' . $this->request->getVar('foto_lama'));
				}
			}
			$this->ModelAtribut->save([
				'id_atribut_dasar' => $this->request->getPost('id_atribut'),
				'id_paket' => $this->request->getPost('id_paket'),
				'kategori' => $this->request->getPost('kategori') == 'Indoor' ? 'indoor' : 'outdoor',
				'undangan' => $this->request->getPost('undangan'),
				'lokasi' => $this->request->getPost('lokasi'),
				'deskripsi' => $this->request->getPost('deskripsi'),
				'rias_busana' => ($ya_rias = $this->request->getPost('rias_busana')) == 'Tidak' ? 0 : 1,
				'paket_rias_busana' => $ya_rias == 'Ya' ? $this->request->getPost('paket_rias_busana') : null,
				'dekorasi' => ($ya_dekorasi = $this->request->getPost('dekorasi')) == 'Tidak' ? 0 : 1,
				'paket_dekorasi' => $ya_dekorasi == 'Ya' ? $this->request->getPost('paket_dekorasi') : null,
				'catering' => ($ya_catering = $this->request->getPost('catering')) == 'Tidak' ? 0 : 1,
				'paket_catering' => $ya_catering == 'Ya' ? $this->request->getPost('paket_catering') : null,
				'mc_resepsi' => $this->request->getPost('mc_resepsi') == 'Tidak' ? 0 : 1,
				'dokumentasi' => ($ya_dokumen = $this->request->getPost('dokumentasi')) == 'Tidak' ? 0 : 1,
				'paket_dokumentasi' => $ya_dokumen == 'Ya' ? $this->request->getPost('paket_dokumentasi') : null,
				'orgen_tunggal' => $this->request->getPost('orgen_tunggal') == 'Tidak' ? 0 : 1,
				'gambar' => $foto
			]);
			$this->ModelAtributHarga->save([
				'id_atribut_harga' => $this->request->getPost('id_atribut_harga'),
				'harga' => $this->request->getPost('harga')
			]);
			session()->setFlashdata('pesan', "Atribut berhasil diperbarui");
			return redirect()->to('/admin/attribut_dasar');
		}
	}

	public function delete_paket()
	{
		if (session()->get('user_role') != 1) {
			return redirect()->to('/auth/login');
		}
		$id_paket = $this->request->getPost('id_paket');
		// Delete foto
		$foto = $this->ModelAtribut->select('gambar')->where(['id_paket' => $id_paket])->get()->getRowArray();
		if ($foto['gambar'] != 'default.png') {
			unlink('gmb/paket/' . $foto['gambar']);
		}
		// Delete From Hitung
		$this->ModelHitung->delete($this->ModelHitung->select('id_hitung')->where(['id_paket' => $id_paket])->get()->getRowArray()['id_hitung']);
		// Delete From Atibut Dasar
		$this->ModelAtribut->delete($this->ModelAtribut->select('id_atribut_dasar')->where(['id_paket' => $id_paket])->get()->getRowArray()['id_atribut_dasar']);
		// Delete From Atribut Harga
		$this->ModelAtributHarga->delete($this->ModelAtributHarga->select('id_atribut_harga')->where(['id_paket' => $id_paket])->get()->getRowArray()['id_atribut_harga']);
		// Delete From Paket
		$this->ModelPaket->delete($id_paket);
		session()->setFlashdata('pesan', 'Data paket berhasil dihapus');
		return redirect()->to('/admin/home');
	}

	//--------------------------------------------------------------------

}
