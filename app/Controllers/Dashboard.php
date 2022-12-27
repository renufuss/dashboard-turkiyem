<?php

namespace App\Controllers;

class Dashboard extends BaseController
{
    public function index()
    {
        $item = new Item();
        $data = [
            'title' => 'Dashboard',
            'heading' => 'Dashboard',
            'breadcrumb' => 'Dashboard',
            'totalIn' =>  $item->countLog(1),
            'totalOut' => $item->countLog(2),
            'totalItem' => $item->totalItem(),
        ];
        return view('Dashboard/index', $data);
    }
}
