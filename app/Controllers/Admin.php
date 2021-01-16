<?php

namespace App\Controllers;

use Myth\Auth\Models\UserModel;

class Admin extends BaseController
{
    protected $userModel;
    public function __construct()
    {
        $this->userModel = new UserModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Admin Data Mining',
            'user' => $this->userModel->countAllResults()
        ];

        return view('admin/beranda/index', $data);
    }

    //fungsi untuk curahHujan
    public function curahHujan()
    {
        $data = [
            'title' => 'Curah Hujan'
        ];

        return view('admin/curahHujan/index', $data);
    }
}
