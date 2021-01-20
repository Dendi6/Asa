<?php

namespace App\Models;

use CodeIgniter\Model;

class KecepatanAnginModel extends Model
{
    protected $table      = 'kecepatanAngin';
    protected $primaryKey = 'id';

    protected $allowedFields = ['tanggal', 'kecepatanAngin'];

    protected $useTimestamps = true;

    public function descending()
    {
        $this->orderBy('created_at', 'DESC');
        $query = $this->get();
        $descending = $query->getResultArray();

        return $descending;
    }
}
