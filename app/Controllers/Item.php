<?php

namespace App\Controllers;

use App\Models\ItemModel;

class Item extends BaseController
{
    protected $ItemModel;
    public function __construct()
    {
        $this->ItemModel = new ItemModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Barang',
            'heading' => 'Barang',
            'breadcrumb' => 'Barang',
        ];
        return view('Item/index', $data);
    }

    public function showTable()
    {
        if ($this->request->isAJAX()) {
            $data = [
                'items' => $this->ItemModel->showItem(),
            ];
            $response = [
                'tableItem' => view('Item/Tables/tableItem', $data),
            ];
            return json_encode($response);
        }
    }

    public function showModal()
    {
        if ($this->request->isAJAX()) {
            $itemId = $this->request->getPost('itemId');
            $unit = new Unit();
            $data['units'] = $unit->showUnit();

            if ($itemId == null) {
                $response = [
                    'addModal' => view('Item/Modals/addItem', $data),
                ];
            } else {
                $data['item'] = $this->ItemModel->find($itemId);
                $response = [
                    'editModal' => view('Item/Modals/editItem', $data),
                ];
            }

            return json_encode($response);
        }
    }

    public function save()
    {
        if ($this->request->isAJAX()) {
            $data = $this->request->getPost();

            $unit = new Unit();
            $isUnit = $unit->validateUnit($data['unit_id']);

            if (!$isUnit) {
                $response = [
                    'error' => [
                        'unit' => 'Unit tidak ditemukan'
                    ],
                    'errorMsg' => 'Gagal menyimpan barang',
                ];

                return json_encode($response);
            }

            $isValid = $this->validateData($data, $this->ItemModel->getValidationRules(['except' => ['stock']]), $this->ItemModel->getValidationMessages());

            if (!$isValid) {
                $response = [
                    'error' => $this->validator->getErrors(),
                    'errorMsg' => 'Gagal menyimpan barang',
                ];

                return json_encode($response);
            }

            $response['success'] = 'Berhasil menyimpan barang';
            $data['name'] = ucwords(strtolower($this->request->getPost('name')));

            $this->ItemModel->save($data);

            return json_encode($response);
        }
    }

    public function confirmDelete()
    {
        if ($this->request->isAJAX()) {
            $itemId = $this->request->getPost('itemId');
            $item = $this->ItemModel->find($itemId);

            if ($item == null) {
                $response['error'] = 'Data tidak ditemukan';
                return json_encode($response);
            }

            return json_encode($item);
        }
    }

    public function deleteItem()
    {
        if ($this->request->isAJAX()) {
            $itemId = $this->request->getPost('itemId');
            $item = $this->ItemModel->find($itemId);

            if ($item == null) {
                $response['error'] = 'Data tidak ditemukan';
                return json_encode($response);
            }

            $response['success'] = 'Berhasil menghapus barang';
            $this->ItemModel->delete($itemId);

            return json_encode($response);
        }
    }

    public function showModalAddStock()
    {
        if ($this->request->isAJAX()) {
            $data['items'] = $this->ItemModel->showItem();
            $response['addStockModal'] = view('Item/Modals/addStock', $data);
            return json_encode($response);
        }
    }

    public function showModalMinusStock()
    {
        if ($this->request->isAJAX()) {
            $data['items'] = $this->ItemModel->showItem();
            $response['minusStockModal'] = view('Item/Modals/minusStock', $data);
            return json_encode($response);
        }
    }

    public function showCurrentStock()
    {
        if ($this->request->isAJAX()) {
            $itemId = $this->request->getPost('itemId');
            $item = $this->ItemModel->find($itemId);

            return json_encode($item->stock);
        }
    }

    public function addStock()
    {
        if ($this->request->isAJAX()) {
            $data = $this->request->getPost();

            $isValid = $this->validateInputStock($data);

            $isItem = $this->validateItem($data['item_id']);

            if (!$isItem) {
                $response = [
                    'error' => [
                        'item' => 'item tidak ditemukan'
                    ],
                    'errorMsg' => 'Gagal menyimpan stok',
                ];

                return json_encode($response);
            }

            if ($isValid != false) {
                return json_encode($isValid);
            }

            if ($data['stock'] <= 0) {
                $response = [
                    'error' => [
                        'stock' => 'Stok harus lebih dari 0'
                    ],
                    'errorMsg' => 'Gagal menyimpan stok',
                ];

                return json_encode($response);
            }


            // Tambah Stock
            $item = $this->ItemModel->find($data['item_id']);
            $itemData = [
                'item_id' => $item->item_id,
                'stock' => ($item->stock + $data['stock']),
            ];
            $this->ItemModel->save($itemData);

            // Add To Log
            $itemData = [
                // 'user_id' => user()->id,
                'user_id' => 1,
                'item_id' => $item->item_id,
                'stock' => $data['stock'],
                'status' => 1,
                'created_at' => date('Y-m-d H:i:s')
            ];
            $this->ItemModel->InsertLog($itemData);

            $response['success'] = 'Berhasil menambahkan stock';
            return json_encode($response);
        }
    }

    public function minusStock()
    {
        if ($this->request->isAJAX()) {
            $data = $this->request->getPost();

            $isValid = $this->validateInputStock($data);

            $isItem = $this->validateItem($data['item_id']);

            if (!$isItem) {
                $response = [
                    'error' => [
                        'item' => 'item tidak ditemukan'
                    ],
                    'errorMsg' => 'Gagal menyimpan stok',
                ];

                return json_encode($response);
            }

            if ($isValid != false) {
                return json_encode($isValid);
            }

            if ($data['stock'] <= 0) {
                $response = [
                    'error' => [
                        'stock' => 'Stok harus lebih dari 0'
                    ],
                    'errorMsg' => 'Gagal menyimpan stok',
                ];

                return json_encode($response);
            }


            // Kurangi Stock
            $item = $this->ItemModel->find($data['item_id']);
            if ($data['stock'] > $item->stock) {
                $response = [
                    'error' => [
                        'stock' => 'Stok melebihi jumlah stok saat ini'
                    ],
                    'errorMsg' => 'Gagal menyimpan stok',
                ];

                return json_encode($response);
            }

            $itemData = [
                'item_id' => $item->item_id,
                'stock' => ($item->stock - $data['stock']),
            ];
            $this->ItemModel->save($itemData);

            // Add To Log
            $itemData = [
                // 'user_id' => user()->id,
                'user_id' => 1,
                'item_id' => $item->item_id,
                'stock' => $data['stock'],
                'status' => 2,
                'created_at' => date('Y-m-d H:i:s')
            ];
            $this->ItemModel->InsertLog($itemData);

            $response['success'] = 'Berhasil mengurangi stock';
            return json_encode($response);
        }
    }

    public function validateItem($itemId)
    {
        $item = $this->ItemModel->find($itemId);

        if ($item == null) {
            return false;
        }

        return true;
    }

    public function validateInputStock($data)
    {
        $isValid = $this->validateData($data, $this->ItemModel->getValidationRules(['except' => ['name', 'unit_id']]), $this->ItemModel->getValidationMessages());

        if (!$isValid) {
            $response = [
                'error' => $this->validator->getErrors(),
                'errorMsg' => 'Gagal menyimpan stok',
            ];

            return $response;
        }

        return false;
    }

    public function showLog($status = null)
    {
        return $this->ItemModel->showLog($status);
    }
}
