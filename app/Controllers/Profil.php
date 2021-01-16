<?php

namespace App\Controllers;

use App\Models\HasilModel;
use Myth\Auth\Models\UserModel;

class Profil extends BaseController
{
    protected $userModel, $hasilModel;
    public function __construct()
    {
        $this->userModel = new UserModel();
        $this->hasilModel = new HasilModel();
    }

    //fungsi index
    public function index($id_user)
    {
        $data = [
            'title' => 'Profil',
            'riwayat' => $this->hasilModel->riwayatTankapan($id_user)
        ];

        return view('profil/index', $data);
    }

    //fungsi delete
    public function delete($id)
    {
        $this->userModel->delete($id);

        return redirect()->to('/logout');
    }

    //fungsi edit
    public function edit()
    {
        $data = [
            'title' => 'Edit Pofil'
        ];

        return view('profil/edit', $data);
    }

    //funngsi update
    public function update($id)
    {
        $fileSampul = $this->request->getFile('sampul');

        //cek gambar, apakah berubah atau gambar lama,
        if ($fileSampul->getError() == 4) {
            $namasampul = $this->request->getVar('sampulLama');
        } else {
            //generate file random
            $namasampul = $fileSampul->getRandomName();

            $fileSampul->move('images/profil/', $namasampul);

            //cek jik gambar default
            if ($this->request->getVar('sampulLama') != "default.jpg") {
                //hapus gambar
                unlink('images/profil/' . $this->request->getVar('sampulLama'));
            }
        }

        $this->userModel->save([
            'id' => $id,
            'email' => $this->request->getVar('email'),
            'username' => $this->request->getVar('nama'),
            'sampul' => $namasampul
        ]);

        session()->setFlashdata('pesan', 'Profil Berhasil di Update');

        return redirect()->to('/profil/' . $id);
    }
}
