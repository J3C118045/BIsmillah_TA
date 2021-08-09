<?php

namespace App\Controllers;
use App\Models\Surat_keluar_m;
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
/** 
* @property IncomingRequest $request
*/


class Laporan_keluar extends BaseController
{
    public function __construct()
	{
		$this->surat_keluar = new Surat_keluar_m();
		$this->kategori = new Kategori_m();
		$this->ktj = new KTJ_m();
		$this->divisi = new Divisi_m();
		helper('form');
	}
	public function index()
	{
		// if (session()->get('level') == 2) {
			$data = array(
				'title'		  	=> 'Laporan Surat Keluar',
				'surat_keluar'	=> $this->surat_keluar->getLaporan(),
				'kategori'    	=> $this->kategori->getData(),  
				'divisi'    	=> $this->surat_keluar->getDiv(), 
			);
			return view('laporan_keluar', $data);
		// } else {
		// 	$data = array(
		// 		'title'		  	=> 'surat Keluar',
		// 		'surat_keluar'	=> $this->surat_keluar->getData_forAdmin(),
		// 		'kategori'    	=> $this->kategori->getData(),  
		// 		'divisi'    	=> $this->surat_keluar->getDiv(), 
		// 	);
		// 	return view('surat_keluar', $data);
		// }
	}
}