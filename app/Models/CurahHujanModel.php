<?php

namespace App\Models;

use CodeIgniter\Model;

class CurahHujanModel extends Model
{
    protected $table      = 'curahHujan';
    protected $primaryKey = 'id';

    protected $allowedFields = ['tanggal', 'curahHujan'];

    protected $useTimestamps = true;

    public function descending()
    {
        $this->orderBy('created_at', 'DESC');
        $query = $this->get();
        $descending = $query->getResultArray();

        return $descending;
    }
}
