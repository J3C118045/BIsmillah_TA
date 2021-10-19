<?php

namespace App\Controllers;
use App\Models\Divisi_m;
use CodeIgniter\HTTP\IncomingRequest;
/** 
* @property IncomingRequest $request
*/

class Divisi extends BaseController
{
	public function __construct()
	{
		$this->divisi = new Divisi_m();
		helper('form');
	}
	public function index()
	{
		$data = [
			'title'		  => 'Bidang / Bagian',
			'divisi' 	  => $this->divisi->getData(),
		];
		return view('divisi', $data);
	}

	public function save()
	{
		if ($this->validate([
			'nama_divisi' => [
				'rules'	=> 'required|is_string',
				'errors'	=> [
					'required'	=> 'Nama bidang / bagian harap diisi',
					'is_string'	=> 'Harap masukkan isian berupa huruf.'
				]
			]
		])) {
			$data = [
				'nama_divisi'	=> $this->request->getPost('nama_divisi'),
			];
			$this->divisi->saveDivisi($data);
			session()->setFlashdata('pesan', 'Data bidang / bagian berhasil ditambahkan.');
			return redirect()->to(base_url('divisi'));
		} else {
			session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
            return redirect()->to(base_url('divisi'));
		}
		
	}

	public function update($id)
	{
		$data = [
			'id_divisi'	=> $id,
			'nama_divisi'	=> $this->request->getPost('nama_divisi'),
		];
		$this->divisi->updateDivisi($data);
		session()->setFlashdata('pesan', 'Data bidang / bagian berhasil diubah.');
		return redirect()->to(base_url('divisi'));
	}

	public function delete($id)
	{
		$data = [
			'id_divisi'	=> $id,
		];
		$this->divisi->deleteDivisi($data);
		session()->setFlashdata('pesan', "Data bidang / bagian berhasil dihapus.");
		return redirect()->to(base_url('divisi'));
	}

}
