<?php

namespace App\Controllers;

use App\Models\HasilModel;
use App\Models\PrediksiModel;
use Myth\Auth\Models\UserModel;

class Admin extends BaseController
{
    protected $userModel, $prediksiModel, $hasilTangkapan;
    public function __construct()
    {
        $this->userModel = new UserModel();
        $this->prediksiModel = new PrediksiModel();
        $this->hasilTangkapan = new HasilModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Dashboard',
            'user' => $this->userModel->countAllResults()
        ];

        return view('admin/beranda/index', $data);
    }

    public function prediksiData()
    {
        $data = [
            'title' => 'Data',
            'data' => $this->prediksiModel->descending()
        ];

        return view('admin/prediksiData/index', $data);
    }

    public function saveData()
    {
        helper('array');

        $tanggal = $this->request->getVar('tanggal');
        $curahhujan = $this->request->getVar('curahHujan');
        $rata = $this->hasilTangkapan->rataRata($tanggal);

        $stringConvert = dot_array_search('0.jumlahTangkapan', $rata);

        if ($stringConvert > 1) {
            $kelas = 'Yes';
        } else {
            $kelas = 'No';
        }

        if ($curahhujan >= 0 && $curahhujan < 5) {
            $cuaca = 'Berawan';
        } else if ($curahhujan >= 5 && $curahhujan < 20) {
            $cuaca = 'Hujan Rigan';
        } else if ($curahhujan >= 20 && $curahhujan < 50) {
            $cuaca = 'Hujan Sedang';
        } else if ($curahhujan >= 50 && $curahhujan < 100) {
            $cuaca = 'Hujan Lebat';
        } else if ($curahhujan >= 100 && $curahhujan < 150) {
            $cuaca = 'Hujan Sangat Lebat';
        } else {
            $cuaca = 'Hujan Ekstrem';
        }

        $this->prediksiModel->save([
            'tanggal' => $tanggal,
            'curahHujan' => $curahhujan,
            'cuaca' => $cuaca,
            'kecepatanAngin' => $this->request->getVar('kecepatanAngin'),
            'arahAngin' => $this->request->getVar('arahAngin'),
            'hasilTangkapan' => $stringConvert,
            'kelasData' => $kelas
        ]);

        session()->setFlashdata('pesan', 'data berhasil di simpan');

        return redirect()->to('/admin/prediksiData');
    }
    public function hapusData($id)
    {
        $this->prediksiModel->delete($id);

        session()->setFlashdata('delete', 'Data berhasil di hapus');

        return redirect()->to('/admin/prediksiData');
    }
}
