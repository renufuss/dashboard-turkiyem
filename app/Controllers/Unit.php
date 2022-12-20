<?php

namespace App\Controllers;

use App\Models\UnitModel;

class Unit extends BaseController
{
    protected $UnitModel;
    public function __construct()
    {
        $this->UnitModel = new UnitModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Satuan Barang',
            'heading' => 'Satuan',
            'breadcrumb' => 'Satuan Barang',
        ];
        return view('Unit/index', $data);
    }


    public function showTable()
    {
        if ($this->request->isAJAX()) {
            $data = [
                'units' => $this->UnitModel->orderBy('unit_id', 'DESC')->findAll(),
            ];
            $response = [
                'tableUnit' => view('Unit/Tables/tableUnit', $data),
            ];
            return json_encode($response);
        }
    }

    public function showModal()
    {
        if ($this->request->isAJAX()) {
            $unitId = $this->request->getPost('unitId');

            if ($unitId == null) {
                $response = [
                    'addModal' => view('Unit/Modals/addUnit'),
                ];
            } else {
                $data['unit'] = $this->UnitModel->find($unitId);

                $response = [
                    'editModal' => view('Unit/Modals/editUnit', $data),
                ];
            }

            return json_encode($response);
        }
    }

    public function save()
    {
        if ($this->request->isAJAX()) {
            $data = $this->request->getPost();

            $isValid = $this->validateData($data, $this->UnitModel->getValidationRules(), $this->UnitModel->getValidationMessages());

            if (!$isValid) {
                $response = [
                    'error' => $this->validator->getErrors(),
                    'errorMsg' => 'Gagal menyimpan satuan',
                ];

                return json_encode($response);
            }

            $response['success'] = 'Berhasil menyimpan satuan';
            $data['name'] = ucwords(strtolower($this->request->getPost('name')));

            $this->UnitModel->save($data);

            return json_encode($response);
        }
    }

    public function confirmDelete()
    {
        if ($this->request->isAJAX()) {
            $unitId = $this->request->getPost('unitId');
            $unit = $this->UnitModel->find($unitId);

            if ($unit == null) {
                $response['error'] = 'Data tidak ditemukan';
                return json_encode($response);
            }

            return json_encode($unit);
        }
    }

    public function deleteUnit()
    {
        if ($this->request->isAJAX()) {
            $unitId = $this->request->getPost('unitId');
            $unit = $this->UnitModel->find($unitId);

            if ($unit == null) {
                $response['error'] = 'Data tidak ditemukan';
                return json_encode($response);
            }

            $response['success'] = 'Berhasil menghapus satuan';
            $this->UnitModel->delete($unitId);

            return json_encode($response);
        }
    }

    public function showUnit()
    {
        $unit = $this->UnitModel->orderBy('name', 'ASC')->findAll();
        return $unit;
    }

    public function validateUnit($unitId)
    {
        $unit = $this->UnitModel->find($unitId);

        if ($unit == null) {
            return false;
        }

        return true;
    }
}
