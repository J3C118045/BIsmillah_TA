<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\Penerjemah_m;
use App\Models\Instansi_m;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;
use PhpOffice\PhpSpreadsheet\Style\Border;
use CodeIgniter\HTTP\IncomingRequest;
/** 
* @property IncomingRequest $request
*/

class Penerjemah extends BaseController
{
    public function __construct()
    {
        $this->penerjemah = new penerjemah_m();
        $this->instansi = new Instansi_m();
        helper('form');
    }

    public function index()
    {
        $data = [ 
            'title'     => 'Data Penerjemah',
            'penerjemah' => $this->penerjemah->getPenerjemah(),
            'instansi' => $this->instansi->getAlldata(),
        ];
        return view('penerjemah', $data);
    }

    public function detail($id)
    {
        $data = [
            'title'     => 'View Data Penerjemah',
            'vpenerjemah'    => $this->penerjemah->getDetail($id),
            'instansi' => $this->instansi->getAlldata(),
        ];
        return view('vPenerjemah', $data);
    }

    public function save()
    {
		$data = [
            'nip'                    => $this->request->getPost('nip'),
            'nama'                   => $this->request->getPost('nama'),
            'tempat'                 => $this->request->getPost('tempat'),
            'tanggal_lahir'          => $this->request->getPost('tanggal_lahir'),
            'email'                  => $this->request->getPost('email'),
            'telepon'                => $this->request->getPost('telepon'),
            'golongan'               => $this->request->getPost('golongan'),
            'tmtgol'                 => $this->request->getPost('tmtgol'),
            'jabatan'                => $this->request->getPost('jabatan'),
            'tmtjab'                 => $this->request->getPost('tmtjab'),
            'id_instansi_penerjemah' => $this->request->getPost('id_instansi_penerjemah'),
            'status'                 => $this->request->getPost('status'),
        ];
        $this->penerjemah->savePenerjemah($data);
        session()->setFlashdata('pesan', 'Data berhasil ditambahkan!!!');
		return redirect()->to(base_url('penerjemah'));
    }

    public function update()
    {
		$data = [
            'id_penerjemah'          => $this->request->getPost('id_penerjemah'),
            'nip'                    => $this->request->getPost('nip'),
            'nama'                   => $this->request->getPost('nama'),
            'tempat'                 => $this->request->getPost('tempat'),
            'tanggal_lahir'          => $this->request->getPost('tanggal_lahir'),
            'email'                  => $this->request->getPost('email'),
            'telepon'                => $this->request->getPost('telepon'),
            'golongan'               => $this->request->getPost('golongan'),
            'tmtgol'                 => $this->request->getPost('tmtgol'),
            'jabatan'                => $this->request->getPost('jabatan'),
            'tmtjab'                 => $this->request->getPost('tmtjab'),
            'id_instansi_penerjemah' => $this->request->getPost('id_instansi_penerjemah'),
            'status'                 => $this->request->getPost('status'),
        ];
        $this->penerjemah->updatePenerjemah($data);
        session()->setFlashdata('pesan', 'Data berhasil diedit !!!');
		return redirect()->to(base_url('penerjemah'));
    }

    public function delete($id)
    {
        $this->penerjemah->deletePenerjemah($id);
        session()->setFlashdata('pesan', 'Data berhasil dihapus!!!');
		return redirect()->to(base_url('penerjemah'));
    }

    

    public function update2()
    {
        $data = [
            'id_penerjemah'          => $this->request->getPost('id_penerjemah'),
            'nip'                    => $this->request->getPost('nip'),
            'nama'                   => $this->request->getPost('nama'),
            'tempat'                 => $this->request->getPost('tempat'),
            'tanggal_lahir'          => $this->request->getPost('tanggal_lahir'),
            'email'                  => $this->request->getPost('email'),
            'telepon'                => $this->request->getPost('telepon'),
            'golongan'               => $this->request->getPost('golongan'),
            'tmtgol'                 => $this->request->getPost('tmtgol'),
            'jabatan'                => $this->request->getPost('jabatan'),
            'tmtjab'                 => $this->request->getPost('tmtjab'),
            'id_instansi_penerjemah' => $this->request->getPost('id_instansi_penerjemah'),
            'status'                 => $this->request->getPost('status'),
        ];
        $this->penerjemah->updatePenerjemah($data);
        session()->setFlashdata('pesan', 'Data berhasil diedit !!!');
		return redirect()->to(base_url('penerjemah/'));
        // var_dump($data);
    }

    public function export()
    {
        $penerjemah = new Penerjemah_m();
        $dataPenerjemah = $penerjemah->getLaporan();

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
			->getStyle('A1:L1')
			->applyFromArray($styleJudul);
        $spreadsheet->getActiveSheet()
			->getStyle('A1:L1')
			->applyFromArray($styleBorder);

        // tulis header/nama kolom 
        $spreadsheet->setActiveSheetIndex(0)
                    ->setCellValue('A1', 'No.')
                    ->setCellValue('B1', 'Nama')
                    ->setCellValue('C1', 'NIP', 'number')
                    ->setCellValue('D1', 'TTL')
                    ->setCellValue('E1', 'Email')
                    ->setCellValue('F1', 'No. Telepon')
                    ->setCellValue('G1', 'PANGKAT/GOLONGAN/TMT')
                    ->setCellValue('H1', 'JABATAN/TMT')
                    ->setCellValue('I1', 'INSTANSI')
                    ->setCellValue('J1', 'UNIT KERJA')
                    ->setCellValue('K1', 'ALAMAT')
                    ->setCellValue('L1', 'WILAYAH')
                    ;
        
        $column = 2;
        $i = 1;
        // tulis data mobil ke cell
        foreach($dataPenerjemah as $data) {
            $spreadsheet->setActiveSheetIndex(0)
                        ->setCellValue('A' . $column, $i++)
                        ->setCellValue('B' . $column, $data['nama'])
                        ->setCellValue('C' . $column, "'".$data['nip'])
                        ->setCellValue('D' . $column, $data['tempat'].'/'.$data['tanggal_lahir'])
                        ->setCellValue('E' . $column, $data['email'])
                        ->setCellValue('F' . $column, $data['telepon'])
                        ->setCellValue('G' . $column, $data['golongan'].'/'.$data['tmtgol'])
                        ->setCellValue('H' . $column, $data['jabatan'].'/'.$data['tmtjab'])
                        ->setCellValue('I' . $column, $data['instansi'])
                        ->setCellValue('J' . $column, $data['unit_kerja'])
                        ->setCellValue('K' . $column, $data['alamat'])
                        ->setCellValue('L' . $column, $data['wilayah']);

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
            $spreadsheet->getActiveSheet()->getStyle('L' . $column)->applyFromArray($styleBorder); 
            
            $spreadsheet->getActiveSheet()->getStyle($column)->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);
            $spreadsheet->getActiveSheet()->getStyle('A' . $column)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
            $spreadsheet->getActiveSheet()->getStyle('C' . $column)->getNumberFormat()->setFormatCode(NumberFormat::FORMAT_NUMBER);
            $spreadsheet->getActiveSheet()->getStyle($column)->getAlignment()->setWrapText(true);
            $column++;

            // style lebar kolom
            $spreadsheet->getActiveSheet()
            ->getColumnDimension('A')
            ->setWidth('5');

            $spreadsheet->getActiveSheet()
            ->getColumnDimension('B')
            ->setWidth('30');

            $spreadsheet->getActiveSheet()
            ->getColumnDimension('C')
            ->setWidth('30');

            $spreadsheet->getActiveSheet()
            ->getColumnDimension('D')
            ->setWidth('30');
            $spreadsheet->getActiveSheet()
            ->getColumnDimension('E')
            ->setWidth('30');
            $spreadsheet->getActiveSheet()
            ->getColumnDimension('F')
            ->setWidth('20');
            $spreadsheet->getActiveSheet()
            ->getColumnDimension('G')
            ->setWidth('30');

            $spreadsheet->getActiveSheet()
            ->getColumnDimension('H')
            ->setWidth('30');

            $spreadsheet->getActiveSheet()
            ->getColumnDimension('I')
            ->setWidth('30');

            $spreadsheet->getActiveSheet()
            ->getColumnDimension('J')
            ->setWidth('30');

            $spreadsheet->getActiveSheet()
            ->getColumnDimension('K')
            ->setWidth('38');

            $spreadsheet->getActiveSheet()
            ->getColumnDimension('L')
            ->setWidth('25');
        }
        // tulis dalam format .xlsx
        $writer = new Xlsx($spreadsheet);
        $fileName = 'Data Penerjemah';

        // Redirect hasil generate xlsx ke web client
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename='.$fileName.'.xlsx');
        header('Cache-Control: max-age=0');

        $writer->save('php://output');
    }

    public function exportLabel()
    {
        $penerjemah = new Penerjemah_m();
        $dataPenerjemah = $penerjemah->getLaporan();

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
			->getStyle('A1:E1')
			->applyFromArray($styleJudul);
        $spreadsheet->getActiveSheet()
			->getStyle('A1:E1')
			->applyFromArray($styleBorder);
        

        //style data
        

        // tulis header/nama kolom 
        $spreadsheet->setActiveSheetIndex(0)
                    ->setCellValue('A1', 'No.')
                    ->setCellValue('B1', 'Nama')
                    ->setCellValue('C1', 'UNIT KERJA')
                    ->setCellValue('D1', 'INSTANSI')
                    ->setCellValue('E1', 'ALAMAT')
                    ;
        
        $column = 2;
        $i = 1;
        // tulis data mobil ke cell
        foreach($dataPenerjemah as $data) {
            $spreadsheet->setActiveSheetIndex(0)
                        ->setCellValue('A' . $column, $i++)
                        ->setCellValue('B' . $column, $data['nama'])
                        ->setCellValue('C' . $column, $data['unit_kerja'])
                        ->setCellValue('D' . $column, $data['instansi'])
                        ->setCellValue('E' . $column, $data['alamat']);
            
            $spreadsheet->getActiveSheet()->getStyle('A' . $column)->applyFromArray($styleBorder);
            $spreadsheet->getActiveSheet()->getStyle('B' . $column)->applyFromArray($styleBorder);
            $spreadsheet->getActiveSheet()->getStyle('C' . $column)->applyFromArray($styleBorder);
            $spreadsheet->getActiveSheet()->getStyle('D' . $column)->applyFromArray($styleBorder);
            $spreadsheet->getActiveSheet()->getStyle('E' . $column)->applyFromArray($styleBorder); 

            $spreadsheet->getActiveSheet()->getStyle($column)->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);
            $spreadsheet->getActiveSheet()->getStyle('A' . $column)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
            $spreadsheet->getActiveSheet()->getStyle($column)->getAlignment()->setWrapText(true);
            /* $spreadsheet->getActiveSheet()
            ->getStyle($column)
            ->applyFromArray($styleBorder); */
            $column++;

            // style lebar kolom
                $spreadsheet->getActiveSheet()
                ->getColumnDimension('A')
                ->setWidth('5');
            
                $spreadsheet->getActiveSheet()
                ->getColumnDimension('B')
                ->setWidth('30');

                $spreadsheet->getActiveSheet()
                ->getColumnDimension('C')
                ->setWidth('30');

                $spreadsheet->getActiveSheet()
                ->getColumnDimension('D')
                ->setWidth('30');

                $spreadsheet->getActiveSheet()
                ->getColumnDimension('E')
                ->setWidth('38');
        }
        
        // tulis dalam format .xlsx
        $writer = new Xlsx($spreadsheet);
        $fileName = 'Data Label untuk Penerjemah';

        // Redirect hasil generate xlsx ke web client
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename='.$fileName.'.xlsx');
        header('Cache-Control: max-age=0');

        $writer->save('php://output');
    }
    
    
    //BARU UNTUK DEBUGGING
    /* public function debug()
    {
        $data = [
            'id_penerjemah'          => $this->request->getVar('id_penerjemah'),
            'nip'                    => $this->request->getPost('nip'),
            'nama'                   => $this->request->getPost('nama'),
            'tempat'                 => $this->request->getPost('tempat'),
            'tanggal_lahir'          => $this->request->getPost('tanggal_lahir'),
            'email'                  => $this->request->getPost('email'),
            'telepon'                => $this->request->getPost('telepon'),
            'golongan'               => $this->request->getPost('golongan'),
            'tmtgol'                 => $this->request->getPost('tmtgol'),
            'jabatan'                => $this->request->getPost('jabatan'),
            'tmtjab'                 => $this->request->getPost('tmtjab'),
            'id_instansi_penerjemah' => $this->request->getPost('id_instansi_penerjemah'),
        ];

        var_dump($data);
    } */
}
            