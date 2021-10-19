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
use PhpOffice\PhpSpreadsheet\Worksheet\AutoFilter\Column\Rule;

/** 
* @property IncomingRequest $request
*/


class Surat_masuk extends BaseController
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
		// if (session()->get('level') == 2) {
			# code...
			$data = array(
				'title'		  	=> 'Surat Masuk',
				'surat_masuk'	=> $this->surat_masuk->getData(),
				'kategori'    	=> $this->kategori->getData(),  
				'divisi'    	=> $this->surat_masuk->getDiv(), 
			);
			return view('surat_masuk', $data);
		// } 
		// else {
		// 	$data = array(
		// 		'title'		  	=> 'surat Masuk',
		// 		'surat_masuk'	=> $this->surat_masuk->getData_forAdmin(),
		// 		'kategori'    	=> $this->kategori->getData(),  
		// 		'divisi'    	=> $this->surat_masuk->getDiv(), 
		// 	);
		// 	return view('surat_masuk', $data);
		// }
	}

	// public function detail($id)
	// {
	// 	$data = array(
	// 		'title'		  	=> 'Detail Surat Masuk',
	// 		'vmasuk'	=> $this->surat_masuk->getDetail($id),
	// 		'kategori'    	=> $this->kategori->getData(),  
	// 		'divisi'    	=> $this->surat_masuk->getDiv(),
	// 	);
	// 	return view('vsuratMasuk', $data);
	// }

	public function getKTJDivisi()
	{
		$this->surat_masuk = new Surat_masuk_m();
		$postdata = array(
			'id_divisi_tugas'	=> $this->request->getPost('id_bagian'),
		);
		$data = $this->surat_masuk->getKTJDiv($postdata);
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
				'rules'	=> 'required|is_unique[surat_masuk.no_surat]',
				'errors'	=> [
					'required'	=> 'No. Surat harap diisi.',
					'is_unique'	=> 'No. Surat sudah digunakan, silahkan periksa kembali.'
				]
			],
			'tgl_surat'	=> [
				'rules'	=> 'required',
				'errors'	=> [
					'required'	=> 'Tanggal surat harap diisi.',
				]
			],
			'tgl_diterima'	=> [
				'rules'	=> 'required',
				'errors'	=> [
					'required'	=> 'Tanggal diterima harap diisi.',
				]
			],
			'divisi'	=> [
				'rules'	=> 'required',
				'errors'	=> [
					'required'	=> 'Bidang / Bagian harap diisi.',
				]
			],
			'no_ktj'	=> [
				'rules'	=> 'required',
				'errors'	=> [
					'required'	=> 'No. KTJ harap diisi.',
				]
			],
			'kategori'	=> [
				'rules'	=> 'required',
				'errors'	=> [
					'required'	=> 'Kategori surat harap diisi.',
				]
			],
			'pengirim'	=> [
				'rules'	=> 'required',
				'errors'	=> [
					'required'	=> 'Pengirim harap diisi.',
				]
			],
			'link'	=> [
				'rules'	=> 'required',
				'errors'	=> [
					'required'	=> 'Link netbox harap diisi.',
				]
			],
			'status'	=> [
				'rules'	=> 'required',
				'errors'	=> [
					'required'	=> 'Status harap diisi.',
				]
			],
		])) {
			$data = array(
				'kategori'				=> $this->request->getPost('kategori'),
				'divisi'				=> $this->request->getPost('divisi'),
				'no_ktj'				=> $this->request->getPost('no_ktj'),
				'user'					=> session()->get('id_user'),
				'no_surat'				=> $this->request->getPost('no_surat'),
				'tgl_surat'				=> $this->request->getPost('tgl_surat'),
				'tgl_diterima'			=> $this->request->getPost('tgl_diterima'),
				'pengirim'				=> $this->request->getPost('pengirim'),
				'perihal'				=> $this->request->getPost('perihal'),
				'disposisi_waseskab'	=> $this->request->getPost('disposisi_waseskab'),
				'disposisi_deputi'		=> $this->request->getPost('disposisi_deputi'),
				'disposisi_kapus'		=> $this->request->getPost('disposisi_kapus'),
				'link'					=> $this->request->getPost('link'),
				'status'				=> $this->request->getPost('status'),
			);
			$this->surat_masuk->saveSuratMasuk($data);
			session()->setFlashdata('pesan', 'Surat Masuk berhasil ditambahkan.');
			return redirect()->to(base_url('surat_masuk'));
		} else {
			session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
            return redirect()->to(base_url('surat_masuk'));
		}
	}

	public function update()
	{
		if ($this->validate([
			'no_surat'	=> [
				'label'	=> 'No. Surat',
				'rules'	=> 'required',
				'errors'	=> [
					'required'	=> '{field} harap diisi.',
					'is_unique'	=> '{field} sudah digunakan, silahkan periksa kembali.'
				]
			],
			'tgl_surat'	=> [
				'label'	=> 'Tanggal surat',
				'rules'	=> 'required',
				'errors'	=> [
					'required'	=> '{field} harap diisi.',
				]
			],
			'tgl_diterima'	=> [
				'label'	=> 'Tanggal diterima',
				'rules'	=> 'required',
				'errors'	=> [
					'required'	=> '{field} harap diisi.',
				]
			],
			'divisi'	=> [
				'label'	=> 'Bidang / Bagian',
				'rules'	=> 'required',
				'errors'	=> [
					'required'	=> '{field} harap diisi.',
				]
			],
			'no_ktj'	=> [
				'label'	=> 'No. KTJ',
				'rules'	=> 'required',
				'errors'	=> [
					'required'	=> '{field} harap diisi.',
				]
			],
			'kategori'	=> [
				'label'	=> 'Kategori surat',
				'rules'	=> 'required',
				'errors'	=> [
					'required'	=> '{field} harap diisi.',
				]
			],
			'pengirim'	=> [
				'label'	=> 'Pengirim',
				'rules'	=> 'required',
				'errors'	=> [
					'required'	=> '{field} harap diisi.',
				]
			],
			'link'	=> [
				'label'	=> 'Link netbox',
				'rules'	=> 'required',
				'errors'	=> [
					'required'	=> '{field} harap diisi.',
				]
			],
			'status'	=> [
				'label'	=> 'Status',
				'rules'	=> 'required',
				'errors'	=> [
					'required'	=> '{field} harap diisi.',
				]
			],
		])) {
			$data = array(
				'id_suratMasuk'			=> $this->request->getPost('id_suratMasuk'),
				'kategori'				=> $this->request->getPost('kategori'),
				'divisi'				=> $this->request->getPost('divisi'),
				'no_ktj'				=> $this->request->getPost('no_ktj'),
				'user'					=> session()->get('id_user'),
				'no_surat'				=> $this->request->getPost('no_surat'),
				'tgl_surat'				=> $this->request->getPost('tgl_surat'),
				'tgl_diterima'			=> $this->request->getPost('tgl_diterima'),
				'pengirim'				=> $this->request->getPost('pengirim'),
				'perihal'				=> $this->request->getPost('perihal'),
				'disposisi_waseskab'	=> $this->request->getPost('disposisi_waseskab'),
				'disposisi_deputi'		=> $this->request->getPost('disposisi_deputi'),
				'disposisi_kapus'		=> $this-> request->getPost('disposisi_kapus'),
				'link'					=> $this->request->getPost('link'),
				'status'				=> $this->request->getPost('status'),
			);
			$this->surat_masuk->updateSuratMasuk($data);
			session()->setFlashdata('pesan', 'Surat Masuk berhasil diubah.');
			return redirect()->to(base_url('surat_masuk'));
		} else {
			session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
            return redirect()->to(base_url('surat_masuk'));
		}
		
	}

	public function delete($id)
	{
		$data = [
			'id_suratMasuk' => $id,
		];
		$this->surat_masuk->deleteSuratMasuk($data);
		session()->setFlashdata('pesan', 'Surat Masuk berhasil dihapus.');
        return redirect()->to(base_url('surat_masuk'));
	}

	public function export()
    {
        $surat_masuk = new Surat_masuk_m();
        $datasuratMasuk = $surat_masuk->getData();

        $spreadsheet = new Spreadsheet();

		$styleTitle = [
            'font' => [
                'color' => [
                    'rgb' => '000000'
                ],
                'bold'=>true,
                'size'=>14
            ],
            // 'fill'=>[
            //     'fillType' =>  fill::FILL_SOLID,
            //     'startColor' => [
            //         'rgb' => 'd7f1f5'
            //     ]
            // ],
            'alignment'=>[
                'horizontal' => Alignment::HORIZONTAL_CENTER,
				'vertical'	 => Alignment::VERTICAL_CENTER
            ], 
            /* 'borders' => [
                'bottom' => [
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN
                ]
                ],  */
        ];

		$styleJudul = [
            'font' => [
                'color' => [
                    'rgb' => '000000'
                ],
                'bold'=>true,
                'size'=>11
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

		//Style Title Excel
		$spreadsheet->getActiveSheet()
		->getStyle('A1:K1')
		->applyFromArray($styleTitle);
		$spreadsheet->getActiveSheet()
		->mergeCells('A1:K1');
		$spreadsheet->getActiveSheet()
		->setCellValue('A1', 'Rekapitulasi Data Surat Masuk');
		$spreadsheet->getActiveSheet()
		->getStyle('A2:K2')
		->applyFromArray($styleTitle);
		$spreadsheet->getActiveSheet()
		->mergeCells('A2:K2');
		$spreadsheet->getActiveSheet()
		->setCellValue('A2', date('Y'));

		//Style Judul table
		$spreadsheet->getActiveSheet()
			->getStyle('A3:K3')
			->applyFromArray($styleJudul);
		$spreadsheet->getActiveSheet()
			->getStyle('A3:K3')
			->applyFromArray($styleBorder);
    
		// tulis header/nama kolom 
        $spreadsheet->setActiveSheetIndex(0)
                    ->setCellValue('A3', 'No.')
                    ->setCellValue('B3', 'No. Surat')
                    ->setCellValue('C3', 'Tanggal Surat')
                    ->setCellValue('D3', 'Tanggal Diterima')
                    ->setCellValue('E3', 'Perihal')
                    ->setCellValue('F3', 'Pengirim')
                    ->setCellValue('G3', 'Pengolah - KTJ')
                    ->setCellValue('H3', 'Disposisi Waseskab')
                    ->setCellValue('I3', 'Disposisi Deputi')
                    ->setCellValue('J3', 'Disposisi Kapus')
                    ->setCellValue('K3', 'Link Netbox')
                    ;
        
        $column = 4;
        $i = 1;
        // tulis data mobil ke cell
        foreach($datasuratMasuk as $data) {
            $spreadsheet->setActiveSheetIndex(0)
                        ->setCellValue('A' . $column, $i++)
                        ->setCellValue('B' . $column, $data['no_surat'])
                        ->setCellValue('C' . $column, $data['tgl_surat'])
                        ->setCellValue('D' . $column, $data['tgl_diterima'])
                        ->setCellValue('E' . $column, $data['perihal'])
                        ->setCellValue('F' . $column, $data['pengirim'])
                        ->setCellValue('G' . $column, $data['nama_divisi'].' - '.$data['kode_tugas'])
                        ->setCellValue('H' . $column, $data['disposisi_waseskab'])
                        ->setCellValue('I' . $column, $data['disposisi_deputi'])
                        ->setCellValue('J' . $column, $data['disposisi_kapus'])
                        ->setCellValue('K' . $column, $data['link']);

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
			$spreadsheet->getActiveSheet()->getStyle('K' . $column)->applyFromArray($styleBorder);           
			
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
			$spreadsheet->getActiveSheet()->getColumnDimension('G')->setWidth('30');
			$spreadsheet->getActiveSheet()->getColumnDimension('H')->setWidth('30');
			$spreadsheet->getActiveSheet()->getColumnDimension('I')->setWidth('30');
			$spreadsheet->getActiveSheet()->getColumnDimension('J')->setWidth('30');
			$spreadsheet->getActiveSheet()->getColumnDimension('K')->setWidth('25');
        }
        // tulis dalam format .xlsx
        $writer = new Xlsx($spreadsheet);
        $fileName = 'Data Rekap Surat Masuk ';
		$date = date('Y-M-D');

        // Redirect hasil generate xlsx ke web client
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename='.$fileName.$date.'.xlsx');
        header('Cache-Control: max-age=0');

        $writer->save('php://output');
    }

}
