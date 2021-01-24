<?php

namespace App\Controllers;

use App\Models\HasilModel;
use App\Models\PrediksiModel;

class Home extends BaseController
{
	protected $hasilModel, $prediksiModel;
	public function __construct()
	{
		$this->hasilModel = new HasilModel();
		$this->prediksiModel = new PrediksiModel();
	}

	public function index()
	{
		helper('array');

		$inputan = $this->prediksiModel->last();

		$count_all = $this->prediksiModel->countAllResults();
		$p_yes = $this->prediksiModel->p('Yes');
		$p_no = $this->prediksiModel->p('No');

		//array search
		$cuaca_inputan = dot_array_search('0.cuaca', $inputan);
		$arahAngin_inputan = dot_array_search('0.arahAngin', $inputan);
		$kecepatanAngin_inputan = dot_array_search('0.kecepatanAngin', $inputan);

		//cuaca
		$cuaca_yes = $this->prediksiModel->table('cuaca', $cuaca_inputan, 'Yes');
		$cuaca_no = $this->prediksiModel->table('cuaca', $cuaca_inputan, 'No');

		//Arah Angin
		$arahAngin_yes = $this->prediksiModel->table('arahAngin', $arahAngin_inputan, 'Yes');
		$arahAngin_no = $this->prediksiModel->table('arahAngin', $arahAngin_inputan, 'No');

		//Kecepatan Angin
		$kecepatanAngin_yes = $this->prediksiModel->table('kecepatanAngin', $kecepatanAngin_inputan, 'Yes');
		$kecepatanAngin_No = $this->prediksiModel->table('kecepatanAngin', $kecepatanAngin_inputan, 'No');

		//testing satu;
		//yes
		$p_cuaca_yes = ($cuaca_yes / $p_yes);
		$p_arahAngin_yes = ($arahAngin_yes / $p_yes);
		$p_kecepatan_yes = ($kecepatanAngin_yes / $p_yes);
		$p_hasil_yes = ($p_yes / $count_all);
		//no
		$p_cuaca_no = ($cuaca_no / $p_no);
		$p_arahAngin_no = ($arahAngin_no / $p_no);
		$p_kecepatan_no = ($kecepatanAngin_No / $p_no);
		$p_hasil_no = ($p_no / $count_all);

		$phasil_x = $p_cuaca_yes * $p_arahAngin_yes * $p_kecepatan_yes * $p_hasil_yes;
		$phasil_y = $p_cuaca_no * $p_arahAngin_no * $p_kecepatan_no * $p_hasil_no;

		$px = (($cuaca_yes + $cuaca_no) / $count_all) * (($arahAngin_yes + $arahAngin_no) / $count_all) * (($kecepatanAngin_yes + $kecepatanAngin_No) / $count_all);

		//hasil mining 
		$px_yes = $phasil_x / $px;
		$px_no = $phasil_y / $px;

		if ($px_yes > $px_no) {
			$hasil = 'Bagus';
		} else {
			$hasil = 'tidak bagus';
		}

		$data = [
			'title' => 'Data Mining',
			'hasil' => $hasil
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
