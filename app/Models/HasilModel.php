<?php

namespace App\Models;

use CodeIgniter\Model;

class HasilModel extends Model
{
    protected $table      = 'hasil_tangkapan';
    protected $primaryKey = 'id';

    protected $allowedFields = ['id_user', 'jumlahTangkapan', 'tanggal'];

    protected $useTimestamps = true;
}
