<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\Instansi_m;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use PhpOffice\PhpSpreadsheet\Style\Border;
use CodeIgniter\HTTP\IncomingRequest;
/** 
* @property IncomingRequest $request
*/

class Instansi extends BaseController
{
    public function __construct()
    {
        $this->instansi = new Instansi_m();
        helper('form');
    }

    public function index()
    {
        $data = [
            'title'     => 'Data Instansi',
            'instansi'=>$this->instansi->getAlldata(),
        ];
        return view('instansi', $data);
    }

    public function save()
    {
        $data = [
            'instansi'      => $this->request->getPost('instansi'),
            'unit_kerja'    => $this->request->getPost('unit_kerja'),
            'alamat'        => $this->request->getPost('alamat'),
            'wilayah'       => $this->request->getPost('wilayah'),
        ];
        $this->instansi->saveInstansi($data);
        session()->setFlashdata('pesan', 'Data berhasil ditambahkan!!!');
		return redirect()->to(base_url('instansi'));
    }

    public function update($id)
    {
        $data = [
            'instansi'      => $this->request->getPost('instansi'),
            'unit_kerja'    => $this->request->getPost('unit_kerja'),
            'alamat'        => $this->request->getPost('alamat'),
            'wilayah'       => $this->request->getPost('wilayah'),
        ];
        $this->instansi->updateInstansi($data, $id);
        session()->setFlashdata('pesan', 'Data berhasil diubah!!!');
		return redirect()->to(base_url('instansi'));
    }

    public function delete($id)
    {
        $this->instansi->deleteInstansi($id);
        session()->setFlashdata('pesan', 'Data berhasil dihapus!!!');
		return redirect()->to(base_url('instansi'));
    }

    public function export()
    {
        $instansi = new Instansi_m();
        $dataInstansi = $instansi->getAlldata();

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

        // tulis header/nama kolom 
        $spreadsheet->setActiveSheetIndex(0)
                    ->setCellValue('A1', 'No.')
                    ->setCellValue('B1', 'Instansi')
                    ->setCellValue('C1', 'Unit Kerja')
                    ->setCellValue('D1', 'Alamat')
                    ->setCellValue('E1', 'Wilayah');
        
        $column = 2;
        $i = 1;
        // tulis data mobil ke cell
        foreach($dataInstansi as $data) {
            $spreadsheet->setActiveSheetIndex(0)
                        ->setCellValue('A' . $column, $i++)
                        ->setCellValue('B' . $column, $data['instansi'])
                        ->setCellValue('C' . $column, $data['unit_kerja'])
                        ->setCellValue('D' . $column, $data['alamat'])
                        ->setCellValue('E' . $column, $data['wilayah']);

            $spreadsheet->getActiveSheet()->getStyle('A' . $column)->applyFromArray($styleBorder);
            $spreadsheet->getActiveSheet()->getStyle('B' . $column)->applyFromArray($styleBorder);
            $spreadsheet->getActiveSheet()->getStyle('C' . $column)->applyFromArray($styleBorder);
            $spreadsheet->getActiveSheet()->getStyle('D' . $column)->applyFromArray($styleBorder);
            $spreadsheet->getActiveSheet()->getStyle('E' . $column)->applyFromArray($styleBorder);            
            
            $spreadsheet->getActiveSheet()->getStyle($column)->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);
            $spreadsheet->getActiveSheet()->getStyle('A' . $column)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
            $spreadsheet->getActiveSheet()->getStyle($column)->getAlignment()->setWrapText(true);

            $column++;

            // style lebar kolom
            $spreadsheet->getActiveSheet()->getColumnDimension('A')->setWidth('5');
            $spreadsheet->getActiveSheet()->getColumnDimension('B')->setWidth('30');
            $spreadsheet->getActiveSheet()->getColumnDimension('C')->setWidth('30');
            $spreadsheet->getActiveSheet()->getColumnDimension('D')->setWidth('38');
            $spreadsheet->getActiveSheet()->getColumnDimension('E')->setWidth('25');
        }
        // tulis dalam format .xlsx
        $writer = new Xlsx($spreadsheet);
        $fileName = 'Data Instansi';

        // Redirect hasil generate xlsx ke web client
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename='.$fileName.'.xlsx');
        header('Cache-Control: max-age=0');

        $writer->save('php://output');
    }
}