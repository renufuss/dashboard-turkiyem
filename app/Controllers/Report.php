<?php

namespace App\Controllers;

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
            $status = $this->request->getPost('status');
            $data = [
                'logs' => $item->showLog($status),
            ];
            $response = [
                'tableReport' => view('Report/Tables/tableReport', $data),
            ];
            return json_encode($response);
        }
    }
}
