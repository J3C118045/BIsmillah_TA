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


class Surat_keluar extends BaseController
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
				'title'		  	=> 'Surat Keluar',
				'surat_keluar'	=> $this->surat_keluar->getData(),
				'kategori'    	=> $this->kategori->getData(),  
				'divisi'    	=> $this->surat_keluar->getDiv(), 
			);
			return view('surat_keluar', $data);
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


	public function getKTJDivisi()
	{
		$this->surat_keluar = new Surat_keluar_m();
		$postdata = array(
			'id_divisi_tugas'	=> $this->request->getPost('id_bagian'),
		);
		$data = $this->surat_keluar->getKTJDiv($postdata);
		echo json_encode($data);
	}

	/* public function getEdit()
	{
		$id_suratMasuk = $this->uri->segment(3);
		$data = array(
			'id_suratMasuk'		=> $id_suratMasuk,
			'divisi'			=> $this->surat_masuk->getDiv(),
		);
		$get_data = $this->surat_masuk->get_surat_byID($id_suratMasuk);
		if ($get_data->num_rows() > 0) {
			# code...
			$row = $get_data->row_array();
            $data['id_tugas'] = $row['no_ktj'];
		}
	}

	public function getEditKTJ()
	{
		$this->surat_masuk = new surat_masuk_m();
		$id_suratMasuk = array(
			'id_suratMasuk'		=> $this->request->getPost('id_suratMasuk'),
		);
		$data = $this->surat_masuk->get_surat_byID($id_suratMasuk);
		echo json_encode($data);
	} */

	

	public function save()
	{
		if ($this->validate([
			'no_surat'	=> [
				'label'	=> 'No. Surat',
				'rules'	=> 'required|is_unique[surat_keluar.no_surat]',
				'errors'	=> [
					'required'	=> '{field} Wajib diisi !!!',
					'is_unique'	=> '{field} sudah digunakan, harap periksa kembali...'
				]
			],
			'tgl_surat'	=> [
				'label'	=> 'Tanggal Surat',
				'rules'	=> 'required',
				'errors'	=> [
					'required'	=> '{field} Wajib diisi !!!',
				]
			],
			'tgl_kirim'	=> [
				'label'	=> 'Tanggal Kirim',
				'rules'	=> 'required',
				'errors'	=> [
					'required'	=> '{field} Wajib diisi !!!',
				]
			],
			'divisi'	=> [
				'label'	=> 'Bidang / Bagian',
				'rules'	=> 'required',
				'errors'	=> [
					'required'	=> '{field} Wajib diisi !!!',
				]
			],
			'no_ktj'	=> [
				'label'	=> 'No. KTJ',
				'rules'	=> 'required',
				'errors'	=> [
					'required'	=> '{field} Wajib diisi !!!',
				]
			],
			'tujuan'	=> [
				'label'	=> 'Tujuan',
				'rules'	=> 'required',
				'errors'	=> [
					'required'	=> '{field} Wajib diisi !!!',
				]
			],
			'link'	=> [
				'label'	=> 'Link Netbox',
				'rules'	=> 'required',
				'errors'	=> [
					'required'	=> '{field} Wajib diisi !!!',
				]
			],
		])) {
			$data = array(
				'tgl_kirim'				=> $this->request->getPost('tgl_kirim'),
				'tgl_surat'				=> $this->request->getPost('tgl_surat'),
				'divisi'				=> $this->request->getPost('divisi'),
				'no_ktj'				=> $this->request->getPost('no_ktj'),
				'user'					=> session()->get('id_user'),
				'no_surat'				=> $this->request->getPost('no_surat'),
				'tujuan'				=> $this->request->getPost('tujuan'),
				'perihal'				=> $this->request->getPost('perihal'),
				'disposisi_seskab'		=> $this->request->getPost('disposisi_seskab'),
				'disposisi_waseskab'	=> $this->request->getPost('disposisi_waseskab'),
				'disposisi_deputi'		=> $this->request->getPost('disposisi_deputi'),
				'disposisi_kapus'		=> $this->request->getPost('disposisi_kapus'),
				'link'					=> $this->request->getPost('link'),
			);
			$this->surat_keluar->saveSuratKeluar($data);
			session()->setFlashdata('pesan', 'Surat Keluar berhasil ditambahkan...');
			return redirect()->to(base_url('surat_keluar'));
		} else {
			session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
            return redirect()->to(base_url('surat_keluar'));
		}
		
	}

	public function update()
	{
		if ($this->validate([
			'no_surat'	=> [
				'label'	=> 'No. Surat',
				'rules'	=> 'required|is_unique[surat_masuk.no_surat]',
				'errors'	=> [
					'required'	=> '{field} Wajib diisi !!!',
					'is_unique'	=> '{field} sudah digunakan, harap periksa kembali...'
				]
			],
			'tgl_surat'	=> [
				'label'	=> 'Tanggal Surat',
				'rules'	=> 'required',
				'errors'	=> [
					'required'	=> '{field} Wajib diisi !!!',
				]
			],
			'tgl_kirim'	=> [
				'label'	=> 'Tanggal Kirim',
				'rules'	=> 'required',
				'errors'	=> [
					'required'	=> '{field} Wajib diisi !!!',
				]
			],
			'divisi'	=> [
				'label'	=> 'Bidang / Bagian',
				'rules'	=> 'required',
				'errors'	=> [
					'required'	=> '{field} Wajib diisi !!!',
				]
			],
			'no_ktj'	=> [
				'label'	=> 'No. KTJ',
				'rules'	=> 'required',
				'errors'	=> [
					'required'	=> '{field} Wajib diisi !!!',
				]
			],
			'tujuan'	=> [
				'label'	=> 'Tujuan',
				'rules'	=> 'required',
				'errors'	=> [
					'required'	=> '{field} Wajib diisi !!!',
				]
			],
			'link'	=> [
				'label'	=> 'Link Netbox',
				'rules'	=> 'required',
				'errors'	=> [
					'required'	=> '{field} Wajib diisi !!!',
				]
			],
		])) {
			$data = array(
				'id_suratKeluar'		=> $this->request->getPost('id_suratKeluar'),
				'tgl_kirim'				=> $this->request->getPost('tgl_kirim'),
				'tgl_surat'				=> $this->request->getPost('tgl_surat'),
				'divisi'				=> $this->request->getPost('divisi'),
				'no_ktj'				=> $this->request->getPost('no_ktj'),
				'user'					=> session()->get('id_user'),
				'no_surat'				=> $this->request->getPost('no_surat'),
				'tujuan'				=> $this->request->getPost('tujuan'),
				'perihal'				=> $this->request->getPost('perihal'),
				'disposisi_seskab'		=> $this->request->getPost('disposisi_seskab'),
				'disposisi_waseskab'	=> $this->request->getPost('disposisi_waseskab'),
				'disposisi_deputi'		=> $this->request->getPost('disposisi_deputi'),
				'disposisi_kapus'		=> $this->request->getPost('disposisi_kapus'),
				'link'					=> $this->request->getPost('link'),
			);
			$this->surat_keluar->updateSuratKeluar($data);
			session()->setFlashdata('pesan', 'Surat Keluar berhasil diubah...');
			return redirect()->to(base_url('surat_keluar'));
		} else {
			session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
            return redirect()->to(base_url('surat_keluar'));
		}
		
	}

	public function delete($id)
	{
		$data = [
			'id_suratKeluar' => $id,
		];
		$this->surat_keluar->deleteSuratKeluar($data);
		session()->setFlashdata('pesan', 'Surat Keluar berhasil dihapus...');
        return redirect()->to(base_url('surat_keluar'));
	}

	public function export()
    {
        $surat_keluar = new Surat_keluar_m();
        $datasuratKeluar = $surat_keluar->getData();

        $spreadsheet = new Spreadsheet();

		$styleJudul = [
            'font' => [
                'color' => [
                    'rgb' => '000000'
                ],
                'bold'=>true,
                'size'=>12
            ],
            'fill'=>[
                'fillType' =>  fill::FILL_SOLID,
                'startColor' => [
                    'rgb' => 'd7f1f5'
                ]
            ],
            'alignment'=>[
                'horizontal' => Alignment::HORIZONTAL_CENTER
            ], 
            /* 'borders' => [
                'bottom' => [
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN
                ]
                ],  */
        ];

        $styleBorder = [
            'borders' => [
                'top' => [
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                ],
                'right' => [
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                ],
                'bottom' => [
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                ],
                'left' => [
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                ],
                'inside' => [
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                ]
            ]
                ];

		//Set Default Teks
		$spreadsheet->getDefaultStyle()
		->getFont()
		->setName('Arial')
		->setSize(10);

		//Style Judul table
		$spreadsheet->getActiveSheet()
			->getStyle('A1:M1')
			->applyFromArray($styleJudul);
		$spreadsheet->getActiveSheet()
			->getStyle('A1:M1')
			->applyFromArray($styleBorder);

        // tulis header/nama kolom 
        $spreadsheet->setActiveSheetIndex(0)
                    ->setCellValue('A1', 'No.')
                    ->setCellValue('B1', 'No. Surat')
                    ->setCellValue('C1', 'Tanggal Diterima')
                    ->setCellValue('D1', 'Tanggal Kirim')
                    ->setCellValue('E1', 'Pengolah')
                    ->setCellValue('F1', 'Kegiatan Tugas Jabatan')
                    ->setCellValue('G1', 'Tujuan')
                    ->setCellValue('H1', 'Perihal')
                    ->setCellValue('I1', 'Disposisi Seskab')
                    ->setCellValue('J1', 'Disposisi Waseskab')
                    ->setCellValue('K1', 'Disposisi Deputi')
                    ->setCellValue('L1', 'Disposisi Kapus')
                    ->setCellValue('M1', 'Link Netbox')
                    ;
        
        $column = 2;
        $i = 1;
        // tulis data mobil ke cell
        foreach($datasuratKeluar as $data) {
            $spreadsheet->setActiveSheetIndex(0)
                        ->setCellValue('A' . $column, $i++)
                        ->setCellValue('B' . $column, $data['no_surat'])
                        ->setCellValue('C' . $column, $data['tgl_diterima'])
                        ->setCellValue('D' . $column, $data['tgl_kirim'])
                        ->setCellValue('E' . $column, $data['username'].' - '.$data['nama_divisi'])
                        ->setCellValue('F' . $column, $data['kode_tugas'])
                        ->setCellValue('G' . $column, $data['tujuan'])
                        ->setCellValue('H' . $column, $data['perihal'])
                        ->setCellValue('I' . $column, $data['disposisi_seskab'])
                        ->setCellValue('J' . $column, $data['disposisi_waseskab'])
                        ->setCellValue('K' . $column, $data['disposisi_deputi'])
                        ->setCellValue('L' . $column, $data['disposisi_kapus'])
                        ->setCellValue('M' . $column, $data['link']);
			
			$spreadsheet->getActiveSheet()->getStyle('A' . $column)->applyFromArray($styleBorder);
			$spreadsheet->getActiveSheet()->getStyle('B' . $column)->applyFromArray($styleBorder);
			$spreadsheet->getActiveSheet()->getStyle('C' . $column)->applyFromArray($styleBorder);
			$spreadsheet->getActiveSheet()->getStyle('D' . $column)->applyFromArray($styleBorder);
			$spreadsheet->getActiveSheet()->getStyle('E' . $column)->applyFromArray($styleBorder);   
			$spreadsheet->getActiveSheet()->getStyle('F' . $column)->applyFromArray($styleBorder);
			$spreadsheet->getActiveSheet()->getStyle('G' . $column)->applyFromArray($styleBorder);
			$spreadsheet->getActiveSheet()->getStyle('H' . $column)->applyFromArray($styleBorder);
			$spreadsheet->getActiveSheet()->getStyle('I' . $column)->applyFromArray($styleBorder);       
			$spreadsheet->getActiveSheet()->getStyle('J' . $column)->applyFromArray($styleBorder);       
			$spreadsheet->getActiveSheet()->getStyle('k' . $column)->applyFromArray($styleBorder);       
			$spreadsheet->getActiveSheet()->getStyle('L' . $column)->applyFromArray($styleBorder);       
			$spreadsheet->getActiveSheet()->getStyle('M' . $column)->applyFromArray($styleBorder);       
			
			$spreadsheet->getActiveSheet()->getStyle($column)->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);
			$spreadsheet->getActiveSheet()->getStyle('A' . $column)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
			$spreadsheet->getActiveSheet()->getStyle($column)->getAlignment()->setWrapText(true);
            $column++;

			// style lebar kolom
            $spreadsheet->getActiveSheet()->getColumnDimension('A')->setWidth('5');
            $spreadsheet->getActiveSheet()->getColumnDimension('B')->setWidth('25');
            $spreadsheet->getActiveSheet()->getColumnDimension('C')->setWidth('25');
            $spreadsheet->getActiveSheet()->getColumnDimension('D')->setWidth('25');
            $spreadsheet->getActiveSheet()->getColumnDimension('E')->setWidth('25');
            $spreadsheet->getActiveSheet()->getColumnDimension('F')->setWidth('25');
            $spreadsheet->getActiveSheet()->getColumnDimension('G')->setWidth('25');
            $spreadsheet->getActiveSheet()->getColumnDimension('H')->setWidth('25');
            $spreadsheet->getActiveSheet()->getColumnDimension('I')->setWidth('30');
			$spreadsheet->getActiveSheet()->getColumnDimension('J')->setWidth('30');
			$spreadsheet->getActiveSheet()->getColumnDimension('K')->setWidth('30');
			$spreadsheet->getActiveSheet()->getColumnDimension('L')->setWidth('30');
			$spreadsheet->getActiveSheet()->getColumnDimension('M')->setWidth('25');
        }
        // tulis dalam format .xlsx
        $writer = new Xlsx($spreadsheet);
        $fileName = 'Data Rekap Surat Keluar ';
		$date = date('Y-M-D');

        // Redirect hasil generate xlsx ke web client
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename='.$fileName.$date.'.xlsx');
        header('Cache-Control: max-age=0');

        $writer->save('php://output');
    }
}
