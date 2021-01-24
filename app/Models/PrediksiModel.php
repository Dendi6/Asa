<?php

namespace App\Models;

use CodeIgniter\Model;

class PrediksiModel extends Model
{
    protected $table      = 'prediksidata';
    protected $primaryKey = 'id';

    protected $allowedFields = ['tanggal', 'curahHujan', 'kecepatanAngin', 'arahAngin', 'hasilTangkapan'];
}
