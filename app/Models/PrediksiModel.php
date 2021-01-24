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

    public function last()
    {
        $this->orderBy('id', 'DESC');
        $this->limit(1);
        $query = $this->get();

        $desc = $query->getResultArray();

        return $desc;
    }

    public function p($key)
    {
        $this->where('kelasData', $key);
        $query = $this->countAllResults();

        return $query;
    }

    public function table($atribute, $nilaiAtribut, $key)
    {
        $this->where($atribute, $nilaiAtribut);
        $this->where('kelasData', $key);
        $table = $this->countAllResults();

        return $table;
    }
}
