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
		$data = [
			'nama_kategori'	=> $this->request->getPost('nama_kategori'),
		];
		$this->kategori->saveKategori($data);
		session()->setFlashdata('pesan', 'Data berhasil ditambahkan!!!');
		return redirect()->to(base_url('kategori'));
	}

	public function update($id)
	{
		$data = [
			'id_kategori'	=> $id,
			'nama_kategori'	=> $this->request->getPost('nama_kategori'),
		];
		$this->kategori->updateKategori($data);
		session()->setFlashdata('pesan', 'Data berhasil diubah...');
		return redirect()->to(base_url('kategori'));
	}

	public function delete($id)
	{
		$data = [
			'id_kategori'	=> $id,
		];
		$this->kategori->deleteKategori($data);
		session()->setFlashdata('pesan', "Data berhasil dihapus...");
		return redirect()->to(base_url('kategori'));
	}

}
