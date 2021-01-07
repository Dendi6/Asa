<?php

namespace App\Controllers;

use Myth\Auth\Models\UserModel;

class Profil extends BaseController
{
    protected $userModel;
    public function __construct()
    {
        $this->userModel = new UserModel();
    }

    //fungsi index
    public function index($id_user)
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('hasil_tangkapan');

        $builder->where('id_user', $id_user);
        $builder->orderBy('created_at', 'DESC');
        $builder->limit(3);
        $query = $builder->get();
        $riwayat = $query->getResultArray();

        $data = [
            'title' => 'Profil',
            'riwayat' => $riwayat
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

        return redirect()->to('/profil');
    }
}
