<?php

namespace App\Controllers;

use App\Models\HasilModel;

class Home extends BaseController
{
	protected $hasilModel;
	public function __construct()
	{
		$this->hasilModel = new HasilModel();
	}

	public function index()
	{
		$data = [
			'title' => 'Data Mining'
		];

		return view('beranda/index', $data);
	}
	public function saveHasil()
	{
		$this->hasilModel->save([
			'id_user' => $this->request->getVar('id_user'),
			'jumlahTangkapan' => $this->request->getVar('jumlahTangkapan'),
			'tanggal' => $this->request->getVar('tanggal')
		]);

		session()->setFlashdata('pesan', 'Hasil anda berhasil di tambahkan cek di riwayat');

		return redirect()->to('/');
	}
	public function riwayat($id_user)
	{
		$db      = \Config\Database::connect();
		$builder = $db->table('hasil_tangkapan');

		$builder->where('id_user', $id_user);
		$builder->orderBy('created_at', 'DESC');
		$builder->limit(3);
		$query = $builder->get();
		$riwayat = $query->getResultArray();

		$data = [
			'title' => 'Riwayat',
			'riwayat' => $riwayat
		];

		return view('riwayat/index', $data);
	}
}
