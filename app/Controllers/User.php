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
                'rules' => 'required',
                'errors' => [
                    'required' => 'Username harap diisi.'
                ]
            ],
			'email' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Email harap diisi.',
                    'is_unique' => 'Alamat Email pernah digunakan',
                ]
            ],
			'id_divisi' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Bidang / Bagian harap diisi.'
                ]
            ],
			'foto' => [
                'rules' => 'max_size[foto,2048]|mime_in[foto,image/png,image/jpg,image/jpeg]',
                'errors' => [
                    'max_size' => 'Max Foto 2mb.',
                    'mime_in' => 'Hanya diperbolehkan upload Foto berformat png/jpg/jpeg.',
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
			session()->setFlashdata('pesan', 'Profil berhasil diubah.');
			return redirect()->to(base_url('user'));
		} else {
			//if not valid
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
            return redirect()->to(base_url('user'));
		}
	}

	public function ganti_password($id) {
		if (!$this->validate([
			'opwd' => [
                'rules' => 'required|min_length[8]',
                'errors' => [
                    'required' => 'Password harap diisi.',
					'min_length'	=> 'Minimal 8 karakter.'
                ]
            ],
			'npwd' => [
                'rules' => 'required|min_length[8]',
                'errors' => [
                    'required' => 'Password baru harap diisi.',
					'min_length'	=> 'Minimal 8 karakter'
                ]
            ],
			'cnpwd' => [
                'rules' => 'required|matches[npwd]',
                'errors' => [
                    'required' => 'Konfirmasi password harap diisi.',
					'matches'	=> 'Pastikan password yang Anda masukkan sesuai dengan password yang Anda masukkan sebelumnya.'
                ]
            ],
		])) {
			session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
            return redirect()->to(base_url('user'));
		}
			$data = $this->user->detailData($id);
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
				
				session()->setFlashdata('pesan', 'Kata sandi berhasil diubah.');
				return redirect()->to(base_url('user'));
			} else {
				session()->setFlashdata('error', 'Kata sandi gagal diubah.');
				return redirect()->to(base_url('user'));
			}
	}

	
}