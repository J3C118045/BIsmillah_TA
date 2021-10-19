<?php

namespace App\Controllers;
use App\Models\Kategori_m;
use CodeIgniter\HTTP\IncomingRequest;
/** 
* @property IncomingRequest $request
*/

class Kategori extends BaseController
{
	public function __construct()
	{
		$this->kategori = new Kategori_m();
		helper('form');
	}
	public function index()
	{
		$data = [
			'title'		  => 'Kategori Surat',
			'kategori' 	  => $this->kategori->getData(),
		];
		return view('kategori', $data);
	}

	public function save()
	{
		if ($this->validate([
			'nama_kategori' => [
				'rules' => 'required|is_string',
				'errors' => [
					'required'	=> 'Nama kategori harap diisi.',
					'is_string'	=> 'Harap masukkan isian berupa huruf.'
				]
			]
		])) {
			$data = [
				'nama_kategori'	=> $this->request->getPost('nama_kategori'),
			];
			$this->kategori->saveKategori($data);
			session()->setFlashdata('pesan', 'Data kategori surat berhasil ditambahkan.');
			return redirect()->to(base_url('kategori'));
		} else {
			session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
            return redirect()->to(base_url('kategori'));
		}
		
	}

	public function update($id)
	{
		$data = [
			'id_kategori'	=> $id,
			'nama_kategori'	=> $this->request->getPost('nama_kategori'),
		];
		$this->kategori->updateKategori($data);
		session()->setFlashdata('pesan', 'Data berhasil diubah.');
		return redirect()->to(base_url('kategori'));
	}

	public function delete($id)
	{
		$data = [
			'id_kategori'	=> $id,
		];
		$this->kategori->deleteKategori($data);
		session()->setFlashdata('pesan', "Data berhasil dihapus.");
		return redirect()->to(base_url('kategori'));
	}

}
