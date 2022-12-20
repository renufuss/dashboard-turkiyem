<?php

namespace App\Models;

use CodeIgniter\Model;

class UnitModel extends Model
{
    protected $table      = 'units';
    protected $primaryKey = 'unit_id';

    protected $useAutoIncrement = true;

    protected $returnType     = 'object';
    protected $useSoftDeletes = false;

    protected $allowedFields = ['name'];

    protected $useTimestamps = false;
    protected $createdField  = null;
    protected $updatedField  = null;
    protected $deletedField  = null;

    protected $validationRules    = [
        'name' => 'required|alpha_numeric|is_unique[units.name,unit_id,{unit_id}]',
    ];
    protected $validationMessages = [
        'name' => [
            'required' => 'Nama satuan tidak boleh kosong.',
            'alpha_numeric' => 'Nama satuan hanya boleh angka atau huruf.',
            'is_unique' => 'Nama sudah ada sebelumnya.'
        ],
    ];
    protected $skipValidation     = false;
}
