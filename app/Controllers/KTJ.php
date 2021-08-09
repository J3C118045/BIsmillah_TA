<?php

namespace App\Controllers;
use App\Models\KTJ_m;
use CodeIgniter\HTTP\IncomingRequest;
/** 
* @property IncomingRequest $request
*/

class KTJ extends BaseController
{
    public function __construct()
    {
        $this->ktj = new KTJ_m();
		helper('form');
    }

    public function index()
    {
        $data = [
            'title'     => 'Kegiatan Tugas Jabatan',
            'ktj'       => $this->ktj->getData(),
        ];
        return view('ktj', $data);
    }

    public function save()
    {
        $data = [
            'kode_tugas'    => $this->request->getPost('kode_tugas'),
            'list_tugas'    => $this->request->getPost('list_tugas'),
        ];
        $this->ktj->saveKTJ($data);
        session()->setFlashdata('pesan', 'Data Berhasil ditambahkan!!!');
        return redirect()->to(base_url('ktj'));
    }

    public function update($id)
    {
        $data = [
            'id_tugas'      => $id,
            'kode_tugas'    => $this->request->getPost('kode_tugas'),
            'list_tugas'    => $this->request->getPost('list_tugas'),
        ];
        $this->ktj->updateKTJ($data);
        session()->setFlashdata('pesan', 'Data Berhasil diubah...');
        return redirect()->to(base_url('ktj'));
    }

    public function delete($id)
    {
        $data = [
            'id_tugas'  => $id,
        ];
        $this->ktj->deleteKTJ($data);
        session()->setFlashdata('pesan', 'Data Berhasil dihapus...');
        return redirect()->to(base_url('ktj'));
    }
}