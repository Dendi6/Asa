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
		$data = [
			'title' => 'Riwayat',
			'riwayat' => $this->hasilModel->riwayatTankapan($id_user)
		];

		return view('riwayat/index', $data);
	}
	public function hapusRiwayat($id)
	{
		$this->hasilModel->delete($id);

		session()->setFlashdata('delete', 'Riwayat dan data hasil tanggapan berhasil di hapus');

		return redirect()->to('/');
	}
	public function editRiwayat($id)
	{
		$data = [
			'title' => 'edit riwayat',
			'riwayat' => $this->hasilModel->find($id)
		];

		return view('riwayat/edit', $data);
	}
	public function updateRiwayat($id)
	{
		$this->hasilModel->save([
			'id' => $id,
			'jumlahTangkapan' => $this->request->getVar('jumlahTangkapan'),
			'tanggal' => $this->request->getVar('tanggal')
		]);

		session()->setFlashdata('pesan', 'Riwayat dan data tangkapan berhasil di update');


		return redirect()->to('/');
	}
}
