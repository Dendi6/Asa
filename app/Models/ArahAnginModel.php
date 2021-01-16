<?php

namespace App\Models;

use CodeIgniter\Model;

class ArahAnginModel extends Model
{
    protected $table      = 'arahAngin';
    protected $primaryKey = 'id';

    protected $allowedFields = ['tanggal', 'arahAngin'];

    protected $useTimestamps = true;

    public function descending()
    {
        $this->orderBy('created_at', 'DESC');
        $query = $this->get();
        $descending = $query->getResultArray();

        return $descending;
    }
}
