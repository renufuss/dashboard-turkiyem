<?php

namespace App\Models;

use CodeIgniter\Model;

class ItemModel extends Model
{
    protected $table      = 'items';
    protected $primaryKey = 'item_id';

    protected $useAutoIncrement = true;

    protected $returnType     = 'object';
    protected $useSoftDeletes = true;

    protected $allowedFields = ['unit_id', 'name', 'stock', 'alert'];

    protected $useTimestamps = true;
    protected $createdField  = null;
    protected $updatedField  = null;
    protected $deletedField  = 'deleted_at';

    protected $validationRules    = [
        'name' => 'required|alpha_numeric_space|is_unique[items.name,item_id,{item_id}]',
        'unit_id' => 'required',
        'stock' => 'required|numeric',
        'alert' => 'required|numeric'
    ];
    protected $validationMessages = [
        'name' => [
            'required' => 'Nama barang tidak boleh kosong.',
            'alpha_numeric_space' => 'Nama barang hanya boleh angka atau huruf.',
            'is_unique' => 'Nama sudah ada sebelumnya.'
        ],
        'unit_id' => [
            'required' => 'Satuan tidak boleh kosong'
        ],
        'stock' => [
            'required' => 'Stok tidak boleh kosong',
            'numeric' => 'Stok hanya boleh dalam bentuk angka'
        ],
        'alert' => [
            'required' => 'Stok tidak boleh kosong',
            'numeric' => 'Alert hanya boleh dalam bentuk angka'
        ],
    ];
    protected $skipValidation     = true;


    public function showItem()
    {
        $table = $this->db->table($this->table);
        $query = $table->select('item_id, items.name as itemName, units.name as unitName, stock, alert')
            ->join('units', 'items.unit_id=units.unit_id', 'left')
            ->orderBy('items.name', 'ASC')
            ->where('items.deleted_at', null);
        $data = $query->get()->getResultObject();

        return $data;
    }

    public function InsertLog($data = [])
    {
        $table = $this->db->table('item_transactions');
        $table->insert($data);

        return true;
    }

    public function showLog($condition = [])
    {
        $table = $this->db->table('item_transactions');
        $query = $table->select('items.name as itemName, users.*, item_transactions.stock as logStock, item_transactions.status as logStatus, item_transactions.created_at as logDate, item_transactions.description as description')
            ->join('items', 'item_transactions.item_id=items.item_id')
            ->join('users', 'item_transactions.user_id=users.id')
            ->orderBy('logDate', 'DESC');

        if ($condition['status'] != null) {
            $query->where('item_transactions.status', $condition['status']);
        }
        $isExport = ($condition['startDate'] != null && $condition['endDate'] != null);
        if ($isExport) {
            $query->where('DATE(item_transactions.created_at) >=', date('Y-m-d', strtotime($condition['startDate'])));
            $query->where('DATE(item_transactions.created_at) <=', date('Y-m-d', strtotime($condition['endDate'])));
        }

        $data = $query->get()->getResultObject();

        return $data;
    }

    public function countLog($status)
    {
        $table = $this->db->table('item_transactions');
        $query = $table->select('count(*) as itemCount')->where('status', $status);
        $data = $query->get()->getFirstRow()->itemCount;
        return $data;
    }
}
