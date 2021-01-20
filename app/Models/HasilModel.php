<?php

namespace App\Models;

use CodeIgniter\Model;

class HasilModel extends Model
{
    protected $table      = 'hasil_tangkapan';
    protected $primaryKey = 'id';

    protected $allowedFields = ['id_user', 'jumlahTangkapan', 'tanggal'];

    protected $useTimestamps = true;

    public function riwayatTankapan($id)
    {
        $this->where('id_user', $id);
        $this->orderBy('tanggal', 'DESC');
        $this->limit(5);
        $query = $this->get();
        $riwayat = $query->getResultArray();

        return $riwayat;
    }
}
