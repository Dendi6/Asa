<?php

namespace App\Models;

use CodeIgniter\Model;

class PrediksiModel extends Model
{
    protected $table      = 'prediksidata';
    protected $primaryKey = 'id';

    protected $allowedFields = ['tanggal', 'curahHujan', 'cuaca', 'kecepatanAngin', 'arahAngin', 'hasilTangkapan', 'kelasData'];

    public function descending()
    {
        $this->orderBy('id', 'DESC');
        $query = $this->get();

        $desc = $query->getResultArray();

        return $desc;
    }
}
