<?php

namespace App\Models;

use CodeIgniter\Model;

class ItemModel extends Model
{
    protected $table      = 'items';
    protected $primaryKey = 'item_id';

    protected $useAutoIncrement = true;

    protected $returnType     = 'object';
    protected $useSoftDeletes = false;

    protected $allowedFields = ['unit_id', 'name', 'stock'];

    protected $useTimestamps = false;
    protected $createdField  = null;
    protected $updatedField  = null;
    protected $deletedField  = null;

    protected $validationRules    = [
        'name' => 'required|alpha_numeric_space|is_unique[items.name,item_id,{item_id}]',
        'unit_id' => 'required',
        'stock' => 'required|numeric',
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
        ]
    ];
    protected $skipValidation     = true;


    public function showItem()
    {
        $table = $this->db->table($this->table);
        $query = $table->select('item_id, items.name as itemName, units.name as unitName, stock')
            ->join('units', 'items.unit_id=units.unit_id')
            ->orderBy('items.name', 'ASC');
        $data = $query->get()->getResultObject();

        return $data;
    }

    public function InsertLog($data = [])
    {
        $table = $this->db->table('item_transactions');
        $table->insert($data);

        return true;
    }
}
