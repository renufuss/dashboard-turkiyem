<?php

namespace App\Controllers;

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Report extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Laporan',
            'heading' => 'Laporan',
            'breadcrumb' => 'Laporan',
        ];
        return view('Report/index', $data);
    }

    public function showTable()
    {
        if ($this->request->isAJAX()) {
            $item = new Item();
            $condition = [
                'status' => $this->request->getPost('status'),
                'startDate' => null,
                'endDate' => null,
            ];
            $data = [
                'logs' => $item->showLog($condition),
            ];
            $response = [
                'tableReport' => view('Report/Tables/tableReport', $data),
            ];
            return json_encode($response);
        }
    }

    public function exportToExcel()
    {
        $item = new Item();
        $condition = [
            'startDate' => $this->request->getPost('startDate'),
            'endDate' => $this->request->getPost('endDate'),
            'status' => $this->request->getPost('statusExport'),
        ];

        $isEmptyStartDate = ($condition['startDate'] == null);
        if ($isEmptyStartDate) {
            $response['errorStartDate'] = 'Tanggal awal tidak boleh kosong';
            session()->setFlashData('errorStartDate', $response['errorStartDate']);
            return redirect()->to(base_url('/laporan'));
        }

        $isEmptyEndDate = ($condition['endDate'] == null);
        if ($isEmptyEndDate) {
            $response['errorEndDate'] = 'Tanggal akhir tidak boleh kosong';
            session()->setFlashData('errorEndDate', $response['errorEndDate']);
            return redirect()->to(base_url('/laporan'));
        }

        $isValidDate = ($condition['startDate'] <= $condition['endDate']);
        if (!$isValidDate) {
            $response['error'] = 'Tanggal awal tidak boleh melebihi tanggal akhir';
            session()->setFlashData('error', $response['error']);
            return redirect()->to(base_url('/laporan'));

            return json_encode($response);
        }

        $logs = $item->showLog($condition);

        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        $sheet->setCellValue('A1', 'No');
        $sheet->setCellValue('B1', 'Tanggal');
        $sheet->setCellValue('C1', 'Nama Barang');
        $sheet->setCellValue('D1', 'Stok');
        $sheet->setCellValue('E1', 'Keterangan');
        $sheet->setCellValue('F1', 'Pengguna');

        $column = 2; //start column
        foreach ($logs as $log) {
            $sheet->setCellValue('A'.$column, ($column-1));
            $sheet->setCellValue('B'.$column, $log->logDate);
            $sheet->setCellValue('C'.$column, $log->itemName);

            $isPlus = ($log->logStatus == 1);
            if ($isPlus) {
                $stock = '+ '.$log->logStock;
            } else {
                $stock = '- '.$log->logStock;
            }

            $sheet->setCellValue('D'.$column, $stock);
            $sheet->setCellValue('E'.$column, $log->description);
            $sheet->setCellValue('F'.$column, $log->first_name . ' ' . $log->last_name);
            $column++;
        }
        $sheet->getStyle('A1:F1')->getFont()->setBold(true);
        $sheet->getStyle('A1:F1')->getFill()
        ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
        ->getStartColor()->setARGB('c8c3eb');
        $styleArray = [
            'borders' => [
                'allBorders' => [
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                    'color' => ['argb' => 'FF000000'],
                ],
            ],
        ];
        $sheet->getStyle('A1:F'.($column-1))->applyFromArray($styleArray);
        $sheet->getColumnDimension('A')->setAutoSize(true);
        $sheet->getColumnDimension('B')->setAutoSize(true);
        $sheet->getColumnDimension('C')->setAutoSize(true);
        $sheet->getColumnDimension('D')->setAutoSize(true);
        $sheet->getColumnDimension('E')->setAutoSize(true);
        $sheet->getColumnDimension('F')->setAutoSize(true);

        $writer = new Xlsx($spreadsheet);
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename=laporanKebabTurkiyem.xlsx');
        header('Cache-Control: max-age=0');
        $writer->save('php://output');
        exit();
    }
}
