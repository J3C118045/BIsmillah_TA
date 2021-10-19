<?php

namespace App\Controllers;
use App\Models\User_m;
use App\Models\Divisi_m;
use CodeIgniter\HTTP\IncomingRequest;
/** 
* @property IncomingRequest $request
*/

class Pengguna extends BaseController
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
			'title'		=> 'Pegaturan Akun Pengguna',
			'user' 	  	=> $this->user->getData(),
			'divisi' 	=> $this->divisi->getData(),
		];
		return view('user', $data);
	}

    public function save()
	{
		if ($this->validate([
			'username' => [
                'rules' => 'required|is_unique[user.username]|max_length[32]',
                'errors' => [
                    'required'      => 'Username harap diisi.',
					'is_unique'		=> 'Username telah digunakan, silahkan periksa kembali.',
                    'max_length'    => 'Maksimal 32 karakter.'
                ]
            ],
            'email' => [
                'rules' => 'required|is_unique[user.email]',
                'errors' => [
                    'required' => 'Email harap diisi.',
                    'is_unique' => 'Alamat Email telah digunakan, silahkan periksa kembali.',
                ]
            ],
            'password' => [
                'rules' => 'required|min_length[8]',
                'errors' => [
                    'required' 		=> 'Password harap diisi.',
					'min_length'	=> 'Minimal 8 karakter'
                ]
            ],
            'level' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Status pengguna harap diisi.',
                ]
            ],
            'id_divisi' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Bidang / Bagian harap diisi.',
                ]
            ],
            'foto' => [
                'rules' => 'uploaded[foto]|max_size[foto,1824]|mime_in[foto,image/png,image/jpg,image/jpeg]',
                'errors' => [
                    'uploaded' => 'Foto harap diisi.',
                    'max_size' => 'Ukuran maksimal foto 2mb.',
                    'mime_in' => 'Hanya diperbolehkan upload foto berformat png/jpg/jpeg.',
                ]
            ],
		])) {
			//upload foto
            $foto = $this->request->getFile('foto');
			//random name
            $nama_file = $foto->getRandomName();
			//if valid
			$data = array (
				'username'		=> $this->request->getPost('username'),
				'email'			=> $this->request->getPost('email'),
				'password'		=> password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
				'level'			=> $this->request->getPost('level'),
				'id_divisi'		=> $this->request->getPost('id_divisi'),
				'foto'			=> $nama_file,
			);
            $foto->move('img/ava/', $nama_file); //directory file
			$this->user->saveUser($data);
			session()->setFlashdata('pesan', 'Data akun pengguna berhasil ditambahkan.');
			return redirect()->to(base_url('pengguna'));
		} else {
			//if not valid
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
            return redirect()->to(base_url('pengguna'));
		}		
	}

	public function update($id)
	{
		if ($this->validate([
            'email' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Email harap diisi.',
                ]
            ],
            'password' => [
                'rules' => 'required|min_length[8]',
                'errors' => [
                    'required' 		=> 'Password harap diisi.',
					'min_length'	=> 'Minimal 8 karakter.'
                ]
            ],
            'level' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Status harap diisi.',
                ]
            ],
            'id_divisi' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Bidang / Bagian harap diisi.',
                ]
            ],
            'foto' => [
                'label' => 'Foto',
                'rules' => 'max_size[foto,1824]|mime_in[foto,image/png,image/jpg,image/jpeg]',
                'errors' => [
                    'uploaded' => 'Foto harap diisi.',
                    'max_size' => 'Ukuran maksimal foto 2mb.',
                    'mime_in' => 'Hanya diperbolehkan upload foto berformat png/jpg/jpeg.',
                ]
            ],
		])) {
			$foto = $this->request->getFile('foto');
			if ($foto->getError() == 4) {
				$data = array(
					'id_user'		=> $id,
					'email'			=> $this->request->getPost('email'),
					'password'		=> password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
					'level'			=> $this->request->getPost('level'),
					'id_divisi'		=> $this->request->getPost('id_divisi'),
				);
				$this->user->updateUser($data);
			} else {
				//Replace Foto
                $user = $this->user->detailData($id);
				if ($user['foto'] != "") {
					unlink('img/ava/' . $user['foto']);
				}
				//random name
				$nama_file = $foto->getRandomName();
				$data = array(
					'id_user'		=> $id,
					'email'			=> $this->request->getPost('email'),
					'password'		=> $this->request->getPost('password'),
					'level'			=> $this->request->getPost('level'),
					'id_divisi'		=> $this->request->getPost('id_divisi'),
					'foto'			=> $nama_file,
				);
				$foto->move('img/ava', $nama_file);
				$this->user->updateUser($data);
			}
			session()->setFlashdata('pesan', 'Data akun pengguna berhasil diubah.');
			return redirect()->to(base_url('pengguna'));
		} else {
			//if not valid
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
            return redirect()->to(base_url('pengguna'));
		}
		
		
	}

	public function delete($id)
	{
		$data = [
			'id_user'	=> $id,
		];
		$this->user->deleteUser($data);
		session()->setFlashdata('pesan', "Data akun pengguna berhasil dihapus.");
		return redirect()->to(base_url('pengguna'));
	}
}