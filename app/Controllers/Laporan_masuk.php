<?php

namespace App\Controllers;
use App\Models\Surat_masuk_m;
use App\Models\Kategori_m;
use App\Models\KTJ_m;
use App\Models\Divisi_m;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use PhpOffice\PhpSpreadsheet\Style\Border;
use CodeIgniter\HTTP\IncomingRequest;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class Laporan_masuk extends BaseController
{
    public function __construct()
	{
		$this->surat_masuk = new Surat_masuk_m();
		$this->kategori = new Kategori_m();
		$this->ktj = new KTJ_m();
		$this->divisi = new Divisi_m();
		helper('form');
	}
	public function index()
	{
		$data = array(
			'title'		  	=> 'Laporan Surat Masuk',
			'surat_masuk'	=> $this->surat_masuk->getLaporan(),
            'kategori'    	=> $this->kategori->getData(),  
            'divisi'    	=> $this->surat_masuk->getDiv(), 
		);
		return view('laporan_masuk', $data);
	}
}