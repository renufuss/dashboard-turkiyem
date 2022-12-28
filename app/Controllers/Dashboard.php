<?php

namespace App\Controllers;

class Dashboard extends BaseController
{
    public function index()
    {
        $item = new Item();
        $user = new User();
        $data = [
            'title' => 'Dashboard',
            'heading' => 'Dashboard',
            'breadcrumb' => 'Dashboard',
            'totalIn' =>  $item->countLog(1),
            'totalOut' => $item->countLog(2),
            'totalItem' => $item->totalItem(),
            'totalUser' => $user->totalUser(),
        ];
        return view('Dashboard/index', $data);
    }

    public function showTable()
    {
        if ($this->request->isAJAX()) {
            $item = new Item();
            $data = [
                'items' => $item->showItem(),
            ];
            $response = [
                'tableItem' => view('Dashboard/Tables/tableItem', $data),
            ];
            return json_encode($response);
        }
    }
}
