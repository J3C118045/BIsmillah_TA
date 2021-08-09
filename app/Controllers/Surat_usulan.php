<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\Surat_usulan_m;
use App\Models\Kategori_m;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use PhpOffice\PhpSpreadsheet\Style\Border;
use CodeIgniter\HTTP\IncomingRequest;
/** 
* @property IncomingRequest $request
*/

class Surat_usulan extends BaseController
{
    public function __construct()
    {
        $this->usulan = new Surat_usulan_m();
        $this->kategori = new Kategori_m();
        helper('form');
    }

    public function index()
    {
        // if (session()->get('level') == 2) {
            # code...
            $data = [
                'title'		  => 'Surat Usulan',
                'usulan'       => $this->usulan->getData(),
                'kategori'    => $this->kategori->getData(), 
            ];
            return view('surat_usulan', $data);
        // } else {
        //     $data = [
        //         'title'		  => 'Surat Usulan',
        //         'arsip'       => $this->usulan->getData_forAdmin(),
        //         'kategori'    => $this->kategori->getData(), 
        //     ];
        //     return view('usulan', $data);
        // }
        // var_dump($data);
    }

    /* public function add()
    {
        $data = array(
            'title' => 'Form Tambah Surat',
            'kategori'  => $this->kategori->getData(),
        );
        return view('arsip/add', $data);
    } */

    public function getPopulate()
    {
        $query = $this->db->table('tugas')->join('divisi', 'dvisi.id_divisi=tugas.id_divisi_tugas', 'left')
        ->where('id_divisi=id_divisi_tugas')
        ->get()->getResultArray();
        return $query;
    }

    public function save()
    {
        if ($this->validate([
			'no_surat'	=> [
				'rules'	=> 'required|is_unique[surat_usulan.no_surat]',
				'errors'	=> [
					'required'	=> 'No. Surat Wajib diisi !!!',
					'is_unique'	=> 'No. Surat sudah digunakan, harap periksa kembali...'
				]
			],
			'tgl_surat'	=> [
				'rules'	=> 'required',
				'errors'	=> [
					'required'	=> 'Tanggal Surat Wajib diisi !!!',
				]
			],
			'tgl_diterima'	=> [
				'rules'	=> 'required',
				'errors'	=> [
					'required'	=> 'Tanggal Diterima Wajib diisi !!!',
				]
			],
            'kategori'	=> [
				'rules'	=> 'required',
				'errors'	=> [
					'required'	=> 'Jenis Surat Wajib diisi !!!',
				]
			],
			'pengirim'	=> [
				'rules'	=> 'required',
				'errors'	=> [
					'required'	=> 'Pengirim Wajib diisi !!!',
				]
			],
			'link'	=> [
				'rules'	=> 'required',
				'errors'	=> [
					'required'	=> 'Link Netbox Wajib diisi !!!',
				]
			],
		])) {
            $data = array(
                'no_surat'      => $this->request->getPost('no_surat'),
                'tgl_surat'     => $this->request->getPost('tgl_surat'),
                'tgl_diterima'  => $this->request->getPost('tgl_diterima'),
                'kategori'      => $this->request->getPost('kategori'),
                'divisi'        => session()->get('id_divisi'),
                'user'          => session()->get('id_user'),
                'perihal'       => $this->request->getPost('perihal'),
                'pengirim'      => $this->request->getPost('pengirim'),
                'link'          => $this->request->getPost('link'),
                'status'        => $this->request->getPost('status'),
            );
            $this->usulan->saveUsulan($data);
            session()->setFlashdata('pesan', 'Surat Usulan berhasil ditambahkan...');
            return redirect()->to(base_url('surat_usulan'));
        }
        session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
        return redirect()->to(base_url('surat_usulan'));
    }

    public function update()
    {
        if ($this->validate([
			'no_surat'	=> [
				'label'	=> 'No. Surat',
				'rules'	=> 'required',
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
			'tgl_diterima'	=> [
				'label'	=> 'Tanggal Diterima',
				'rules'	=> 'required',
				'errors'	=> [
					'required'	=> '{field} Wajib diisi !!!',
				]
			],
            'kategori'	=> [
				'label'	=> 'Jenis Surat',
				'rules'	=> 'required',
				'errors'	=> [
					'required'	=> '{field} Wajib diisi !!!',
				]
			],
			'pengirim'	=> [
				'label'	=> 'Pengirim',
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
            $data = [
                'id_suratUsulan'    => $this->request->getPost('id_suratUsulan'), 
                'no_surat'          => $this->request->getPost('no_surat'),
                'kategori'          => $this->request->getPost('kategori'),
                'perihal'               => $this->request->getPost('perihal'),
                // 'tgl_update'        => date('Y-m-d-H:i'),
                'pengirim'          => $this->request->getPost('pengirim'),
                'tgl_diterima'      => $this->request->getPost('tgl_diterima'),
                'tgl_surat'         => $this->request->getPost('tgl_surat'),
                'divisi'            => session()->get('id_divisi'),
                'user'              => session()->get('id_user'),
                'link'              => $this->request->getPost('link'),
                'status'            => $this->request->getPost('status'),
               ];
            $this->usulan->updateUsulan($data);
            session()->setFlashdata('pesan', 'Surat Usulan berhasil diubah...');
            return redirect()->to(base_url('surat_usulan'));
        } else {
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
            return redirect()->to(base_url('surat_usulan'));
        }
               
    }
    
    public function delete($id)
    {
        $data = [
            'id_suratUsulan'  => $id,
        ];
        $this->usulan->deleteUsulan($data);
        session()->setFlashdata('pesan', 'Surat Usulan berhasil dihapus...');
        return redirect()->to(base_url('surat_usulan'));
    }

    public function export()
    {
        $usulan = new Surat_usulan_m();
        
        if (session()->get('level') == 2) {
            # code...
            $dataUsulan = $usulan->getData();
        } else {
            $dataUsulan = $usulan->getData_forAdmin();
        }

        $spreadsheet = new Spreadsheet();

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
            ]
                ];

        //Set Default Teks
		$spreadsheet->getDefaultStyle()
		->getFont()
		->setName('Arial')
		->setSize(10);

		//Style Judul table
		$spreadsheet->getActiveSheet()
			->getStyle('A1:I1')
			->applyFromArray($styleJudul);
        // tulis header/nama kolom 
        $spreadsheet->setActiveSheetIndex(0)
                    ->setCellValue('A1', 'No.')
                    ->setCellValue('B1', 'No. Surat')
                    ->setCellValue('C1', 'Tanggal Surat')
                    ->setCellValue('D1', 'Tanggal Diterima')
                    ->setCellValue('E1', 'Perihal')
                    ->setCellValue('F1', 'Pengirim')
                    ->setCellValue('G1', 'Pengolah')
                    ->setCellValue('H1', 'Link Netbox')
                    ->setCellValue('I1', 'Keterangan');
        
        $column = 2;
        $i = 1;
        // tulis data mobil ke cell
        foreach($dataUsulan as $data) {
            $spreadsheet->setActiveSheetIndex(0)
                        ->setCellValue('A' . $column, $i++)
                        ->setCellValue('B' . $column, $data['no_surat'])
                        ->setCellValue('C' . $column, $data['tgl_surat'])
                        ->setCellValue('D' . $column, $data['tgl_diterima'])
                        ->setCellValue('E' . $column, $data['perihal'])
                        ->setCellValue('F' . $column, $data['pengirim'])
                        ->setCellValue('G' . $column, $data['username'].' - '.$data['nama_divisi'])
                        ->setCellValue('H' . $column, $data['link'])
                        ->setCellValue('I' . $column, $data['keterangan']);

                        $spreadsheet->getActiveSheet()->getStyle('A' . $column)->applyFromArray($styleBorder);
                        $spreadsheet->getActiveSheet()->getStyle('B' . $column)->applyFromArray($styleBorder);
                        $spreadsheet->getActiveSheet()->getStyle('C' . $column)->applyFromArray($styleBorder);
                        $spreadsheet->getActiveSheet()->getStyle('D' . $column)->applyFromArray($styleBorder);
                        $spreadsheet->getActiveSheet()->getStyle('E' . $column)->applyFromArray($styleBorder);   
                        $spreadsheet->getActiveSheet()->getStyle('F' . $column)->applyFromArray($styleBorder);
                        $spreadsheet->getActiveSheet()->getStyle('G' . $column)->applyFromArray($styleBorder);
                        $spreadsheet->getActiveSheet()->getStyle('H' . $column)->applyFromArray($styleBorder);
                        $spreadsheet->getActiveSheet()->getStyle('I' . $column)->applyFromArray($styleBorder);

                        $spreadsheet->getActiveSheet()->getStyle($column)->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);
                        $spreadsheet->getActiveSheet()->getStyle($column)->getAlignment()->setWrapText(true);
                        // $spreadsheet->getActiveSheet()->getColumnDimension($column)->setAutoSize(true);
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
			$spreadsheet->getActiveSheet()->getColumnDimension('H')->setWidth('25');
        }
        // tulis dalam format .xlsx
        $writer = new Xlsx($spreadsheet);
        $fileName = 'Data Rekap Usulan ';
        $date = date('Y-M-D');

        // Redirect hasil generate xlsx ke web client
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename='.$fileName.$date.'.xlsx');
        header('Cache-Control: max-age=0');

        $writer->save('php://output');
    }
}