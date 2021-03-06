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
			$data = array(
				'title'		  	=> 'Surat Keluar',
				'surat_keluar'	=> $this->surat_keluar->getData(),
				'kategori'    	=> $this->kategori->getData(),  
				'divisi'    	=> $this->surat_keluar->getDiv(), 
			);
			return view('surat_keluar', $data);
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
					'required'	=> '{field} harap diisi.',
					'is_unique'	=> '{field} sudah digunakan, silahkan periksa kembali.'
				]
			],
			'tgl_surat'	=> [
				'label'	=> 'Tanggal Surat',
				'rules'	=> 'required',
				'errors'	=> [
					'required'	=> '{field} harap diisi.',
				]
			],
			'tgl_kirim'	=> [
				'label'	=> 'Tanggal Kirim',
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
			'tujuan'	=> [
				'label'	=> 'Tujuan',
				'rules'	=> 'required',
				'errors'	=> [
					'required'	=> '{field} harap diisi.',
				]
			],
			'link'	=> [
				'label'	=> 'Link Netbox',
				'rules'	=> 'required',
				'errors'	=> [
					'required'	=> '{field} harap diisi.',
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
			session()->setFlashdata('pesan', 'Surat Keluar berhasil ditambahkan.');
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
				'rules'	=> 'required',
				'errors'	=> [
					'required'	=> '{field} harap diisi.',
					'is_unique'	=> '{field} sudah digunakan, silahkan periksa kembali.'
				]
			],
			'tgl_surat'	=> [
				'label'	=> 'Tanggal Surat',
				'rules'	=> 'required',
				'errors'	=> [
					'required'	=> '{field} harap diisi.',
				]
			],
			'tgl_kirim'	=> [
				'label'	=> 'Tanggal Kirim',
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
			'tujuan'	=> [
				'label'	=> 'Tujuan',
				'rules'	=> 'required',
				'errors'	=> [
					'required'	=> '{field} harap diisi.',
				]
			],
			'link'	=> [
				'label'	=> 'Link Netbox',
				'rules'	=> 'required',
				'errors'	=> [
					'required'	=> '{field} harap diisi.',
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
			session()->setFlashdata('pesan', 'Surat Keluar berhasil diubah.');
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
		session()->setFlashdata('pesan', 'Surat Keluar berhasil dihapus.');
        return redirect()->to(base_url('surat_keluar'));
	}

	public function export()
    {
        $surat_keluar = new Surat_keluar_m();
        $datasuratKeluar = $surat_keluar->getData();

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

		//Style Title Excel
		$spreadsheet->getActiveSheet()
		->getStyle('A1:L1')
		->applyFromArray($styleTitle);
		$spreadsheet->getActiveSheet()
		->mergeCells('A1:L1');
		$spreadsheet->getActiveSheet()
		->setCellValue('A1', 'Rekapitulasi Data Surat Keluar');
		$spreadsheet->getActiveSheet()
		->getStyle('A2:L2')
		->applyFromArray($styleTitle);
		$spreadsheet->getActiveSheet()
		->mergeCells('A2:L2');
		$spreadsheet->getActiveSheet()
		->setCellValue('A2', date('Y'));

		//Style Judul table
		$spreadsheet->getActiveSheet()
			->getStyle('A3:L3')
			->applyFromArray($styleJudul);
		$spreadsheet->getActiveSheet()
			->getStyle('A3:L3')
			->applyFromArray($styleBorder);

        // tulis header/nama kolom 
        $spreadsheet->setActiveSheetIndex(0)
                    ->setCellValue('A3', 'No.')
                    ->setCellValue('B3', 'No. Surat')
                    ->setCellValue('C3', 'Tanggal Surat')
                    ->setCellValue('D3', 'Tanggal Kirim')
                    ->setCellValue('E3', 'Pengolah - KTJ')
                    ->setCellValue('F3', 'Perihal')
                    ->setCellValue('G3', 'Tujuan')
                    ->setCellValue('H3', 'Disposisi Seskab')
                    ->setCellValue('I3', 'Disposisi Waseskab')
                    ->setCellValue('J3', 'Disposisi Deputi')
                    ->setCellValue('K3', 'Disposisi Kapus')
                    ->setCellValue('L3', 'Link Netbox')
                    ;
        
        $column = 4;
        $i = 1;
        // tulis data mobil ke cell
        foreach($datasuratKeluar as $data) {
            $spreadsheet->setActiveSheetIndex(0)
                        ->setCellValue('A' . $column, $i++)
                        ->setCellValue('B' . $column, $data['no_surat'])
                        ->setCellValue('C' . $column, $data['tgl_surat'])
                        ->setCellValue('D' . $column, $data['tgl_kirim'])
                        ->setCellValue('E' . $column, $data['nama_divisi'].' - '.$data['kode_tugas'])
                        ->setCellValue('F' . $column, $data['perihal'])
                        ->setCellValue('G' . $column, $data['tujuan'])
                        ->setCellValue('H' . $column, $data['disposisi_seskab'])
                        ->setCellValue('I' . $column, $data['disposisi_waseskab'])
                        ->setCellValue('J' . $column, $data['disposisi_deputi'])
                        ->setCellValue('K' . $column, $data['disposisi_kapus'])
                        ->setCellValue('L' . $column, $data['link']);
			
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
			
			$spreadsheet->getActiveSheet()->getStyle($column)->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);
			$spreadsheet->getActiveSheet()->getStyle('A' . $column)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
			$spreadsheet->getActiveSheet()->getStyle($column)->getAlignment()->setWrapText(true);
            $column++;

			// style lebar kolom
            $spreadsheet->getActiveSheet()->getColumnDimension('A')->setWidth('5');
            $spreadsheet->getActiveSheet()->getColumnDimension('B')->setWidth('25');
            $spreadsheet->getActiveSheet()->getColumnDimension('C')->setWidth('25');
            $spreadsheet->getActiveSheet()->getColumnDimension('D')->setWidth('25');
            $spreadsheet->getActiveSheet()->getColumnDimension('E')->setWidth('30');
            $spreadsheet->getActiveSheet()->getColumnDimension('F')->setWidth('25');
            $spreadsheet->getActiveSheet()->getColumnDimension('G')->setWidth('25');
            $spreadsheet->getActiveSheet()->getColumnDimension('H')->setWidth('30');
            $spreadsheet->getActiveSheet()->getColumnDimension('I')->setWidth('30');
			$spreadsheet->getActiveSheet()->getColumnDimension('J')->setWidth('30');
			$spreadsheet->getActiveSheet()->getColumnDimension('K')->setWidth('30');
			$spreadsheet->getActiveSheet()->getColumnDimension('L')->setWidth('25');
        }
        // tulis dalam format .xlsx
        $writer = new Xlsx($spreadsheet);
        $fileName = 'Data Rekap Surat Keluar ';
		// $date = date('Y-M-D');

        // Redirect hasil generate xlsx ke web client
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename='.$fileName.'.xlsx');
        header('Cache-Control: max-age=0');

        $writer->save('php://output');
    }
}
