<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Default',
            'heading' => 'Default',
            'breadcrumb' => 'Default',
        ];
        return view('Layout/index', $data);
    }
}
