<?php

namespace App\Controllers;
use App\Controllers\post;
use App\Models\User_m;
use App\Models\Divisi_m;
use CodeIgniter\HTTP\Request;
/** 
* @property IncomingRequest $request
*/

class User extends BaseController
{
    public function __construct()
	{
		$this->user = new User_m();
		$this->divisi = new Divisi_m();
		helper('form');
	}
	public function index()
	{
		$data = [
			'title'		=> 'Profil Pengguna',
			'user' 	  	=> $this->user->getID(),
			'divisi' 	=> $this->divisi->getData(),
		];
		return view('user_profil', $data);
	}

    // public function save()
	// {
	// 	$data = [
	// 		'username'		=> $this->request->getPost('username'),
	// 		'email'			=> $this->request->getPost('email'),
	// 		'password'		=> $this->request->getPost('password'),
	// 		'level'			=> $this->request->getPost('level'),
	// 		'id_divisi'		=> $this->request->getPost('id_divisi'),
	// 	];
	// 	$this->user->saveUser($data);
	// 	session()->setFlashdata('pesan', 'Data berhasil ditambahkan!!!');
	// 	return redirect()->to(base_url('pengguna'));
	// }

	public function edit() {
		$data = [
			'title'		=> 'Edit Profil Pengguna',
			'user' 	  	=> $this->user->getID(),
			'divisi' 	=> $this->divisi->getData(),
		];
		return view('edit_user', $data);
	}

	public function update($id)
	{
		if ($this->validate([
			'username' => [
                'label' => 'Username',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib diisi !!!'
                ]
            ],
			'email' => [
                'label' => 'Email',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib diisi !!!',
                    'is_unique' => 'Alamat Email pernah digunakan',
                ]
            ],
			'id_divisi' => [
                'label' => 'Bidang / Bagian',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib diisi !!!'
                ]
            ],
			'foto' => [
                'label' => 'Foto',
                'rules' => 'max_size[foto,2048]|mime_in[foto,image/png,image/jpg,image/jpeg]',
                'errors' => [
                    'max_size' => 'Max {field} 2mb',
                    'mime_in' => 'Hanya diperbolehkan upload {field} berformat png/jpg/jpeg',
                ]
            ],
		])) {
			$foto = $this->request->getFile('foto');
			if ($foto->getError() == 4) {
				$data = array(
					'id_user'		=> $id,
					'username'		=> $this->request->getPost('username'),
					'email'			=> $this->request->getPost('email'),
					'password'		=> $this->request->getPost('password'),
					'id_divisi'		=> $this->request->getPost('id_divisi'),
				);
				$this->user->updateUser($data);
			} else {
				// Replace foto
				$user = $this->user->getID();
				if ($user['foto'] != "") {
					unlink('img/ava/' . $user['foto']);
				}
				// random name
				$nama_file = $foto->getRandomName();
                $data = array(
                    'id_user' 	=> $id,
                    'username' 	=> $this->request->getPost('username'),
                    // 'password' 	=> $this->request->getPost('password'),
                    'id_divisi' => $this->request->getPost('id_divisi'),
                    'foto' 		=> $nama_file,
                );
                $foto->move('img/ava/', $nama_file); //directory file
                $this->user->updateUser($data);
			}
			// $this->user->updateUser($data);
			session()->setFlashdata('pesan', 'Data berhasil diubah...');
			return redirect()->to(base_url('user'));
		} else {
			//if not valid
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
            return redirect()->to(base_url('user'));
		}
	}

	// public function ganti_password() {
	// 	$data = [];
	// 	$data['user_data'] = $this->user->getID();
		
	// 	if ($this->request->getMethod() == 'post') {
	// 		$rules = [
	// 			'opwd'	=> 'required',
	// 			'npwd'	=>'required|min_length[8]', 
	// 			'cnpwd'	=> 'required|matches[npwd]',
	// 			];
	// 			if ($this->validate($rules)) {
	// 				$opwd = $this->request->getVar('opwd');
	// 				$npwd = $this->request->getVar('npwd');

	// 				if(password_verify($opwd, $data['user_data']->password)){

	// 				} else {

	// 				}
	// 			} else {
	// 				$data['validation'] = $this->validator;
	// 			}
	// 	}
	// }

	public function ganti_password($id) {
		if (!$this->validate([
			'opwd' => [
                'rules' => 'required|min_length[8]',
                'errors' => [
                    'required' => 'Kata Sandi Wajib diisi !!!',
					'min_length'	=> 'Minimal 8 karakter'
                ]
            ],
			'npwd' => [
                'rules' => 'required|min_length[8]',
                'errors' => [
                    'required' => 'Kata Sandi Wajib diisi !!!',
					'min_length'	=> 'Minimal 8 karakter'
                ]
            ],
			'cnpwd' => [
                'rules' => 'required|matches[npwd]',
                'errors' => [
                    'required' => 'Kata Sandi Wajib diisi !!!',
					'matches'	=> 'Kata Sandi Harus Sama'
                ]
            ],
		])) {
			session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
            return redirect()->to(base_url('user'));
		}
			$data = $this->user->detailData(21);
			$opwd = $this->request->getVar('opwd');
			$npwd = password_hash($this->request->getVar('npwd'), PASSWORD_DEFAULT);
			// die(var_dump($data));
			if (password_verify($this->request->getVar('opwd'),$data['password'])) {
				// $data = [
				// 	'id_user'	=> $this->request->getVar('id_user'),
				// 	'password'	=> password_hash($npwd, PASSWORD_DEFAULT)
				// ];
				$this->user->updatePass(
					$id,
					password_hash($this->request->getVar('npwd'), PASSWORD_DEFAULT)
				);
				
				session()->setFlashdata('pesan', 'Kata sandi berhasil diubah...');
				return redirect()->to(base_url('user'));
			} else {
				session()->setFlashdata('error', 'Kata sandi gagal diubah...');
				return redirect()->to(base_url('user'));
			}
	}

	// public function delete($id)
	// {
	// 	$data = [
	// 		'id_user'	=> $id,
	// 	];
	// 	$this->user->deleteUser($data);
	// 	session()->setFlashdata('pesan', "Data berhasil dihapus...");
	// 	return redirect()->to(base_url('pengguna'));
	// }
}