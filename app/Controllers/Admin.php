<?php

namespace App\Controllers;

class Admin extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Admin Data Mining'
        ];

        return view('admin/beranda/index', $data);
    }
}
