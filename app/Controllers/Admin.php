<?php

namespace App\Controllers;

use App\Models\PrediksiModel;
use Myth\Auth\Models\UserModel;

class Admin extends BaseController
{
    protected $userModel, $prediksiModel;
    public function __construct()
    {
        $this->userModel = new UserModel();
        $this->prediksiModel = new PrediksiModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Admin Data Mining',
            'user' => $this->userModel->countAllResults()
        ];

        return view('admin/beranda/index', $data);
    }

    public function prediksiData()
    {
        $data = [
            'title' => 'prediksi data'
        ];

        return view('admin/prediksiData/index', $data);
    }

    public function savePrediksi()
    {
    }
}
