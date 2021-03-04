<?php

class Hafalan extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Hafalan_model');
		$this->load->library('form_validation');
	}

	public function index()
	{
		$data['title'] = 'Hafalan';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		// $id_pengahar =
		$data['santri'] = $this->db->get_where('tsantri', ['id_pengajar' => $data['user']['id']])->result_array();


		// $data['hafalan'] = $this->Hafalan_model->getAllHafalan();
		$this->load->view('templates/headeruser', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('hafalan_pengajar/index', $data);
		$this->load->view('templates/footeruser');
	}

	public function detail($id_santri)
	{
		$data['title'] = 'Hafalan';
		$thn = $this->input->post('th');
		$bln = $this->input->post('bln');
		$idpeng = $id_santri;
		$data['id_santri'] = $id_santri;
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['detail_santri'] = $this->Hafalan_model->getDetailSantri($data['user']['id'], $id_santri);

		if (empty($thn) || empty($bln)) {
			$data['list_th'] = $this->Hafalan_model->getTahun();
			$data['list_bln'] = $this->Hafalan_model->getBln();


			$data['blnnya'] = $bln;
			$data['thn'] = $thn;

			$this->load->view('templates/headeruser', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('hafalan_pengajar/detail', $data);
			$this->load->view('templates/footeruser');
		} else {
			$data['title'] = 'Hafalan';
			$thn = $this->input->post('th');
			$bln = $this->input->post('bln');
			$data['user'] =  $this->db->get_where('user', ['email' =>
			$this->session->userdata('email')])->row_array();

			$data['blnnya'] = $bln;
			$data['thn'] = $thn;
			// $data['nmpeng'] = $idpeng;


			$thnpilihan1 = $thn . '-' . '0' . $bln . '-' . '01';
			$thnpilihan2 = $thn . '-' . '0' . $bln . '-' . '31';
			$id_santri = $idpeng;

			$data['hafalan'] = $this->Hafalan_model->getRekapSantri($thnpilihan1, $thnpilihan2, $id_santri);
			$data['id_santri'] = $id_santri;
			// var_dump($data1);
			// die;
			///
			$data['list_th'] = $this->Hafalan_model->getTahun();
			$data['list_bln'] = $this->Hafalan_model->getBln();
			// $data['list_nampeng'] = $this->RekapPresensi_model->getPeng();

			$this->load->view('templates/headeruser', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('hafalan_pengajar/detail', $data);
			$this->load->view('templates/footeruser');
		}
	}


	public function simpan_edit($id)
	{
		$data['title'] = 'Hafalan';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		// $id_pengahar =
		$data['hafalan'] = $this->db->get_where('thafalan', ['id_hafalan' => $id])->row_array();

		$jumlahsetoran = $data['hafalan']['hasil_akhir'];
		$hasilakhir = $this->input->post('hasil_akhir', true);
		$hasilakhir1 = $this->input->post('hasil_akhir1', true);
		$total = $jumlahsetoran + $hasilakhir;

		$id_santri = $data['hafalan']['id_santri'];

		if ($hasilakhir == null) {
			if ($hasilakhir1 >= 200) {
				$data = [
					"tanggal" => $this->input->post('tanggal', true),
					"hasil_akhir" => $hasilakhir1,
					"bonus_hafalan" => $this->input->post('bonus', true),
					"keterangan" => 'Lulus/GratisSPP',
				];
			} else if ($hasilakhir1 < 200) {
				$data = [
					"tanggal" => $this->input->post('tanggal', true),
					"hasil_akhir" => $hasilakhir1,
					"bonus_hafalan" => $this->input->post('bonus', true),
					"keterangan" => 'Belum Lulus',
				];
			}

			$this->db->where('id_hafalan', $id);
			$this->db->update('thafalan', $data);
		} else {
			if ($total >= 200) {
				$data = [
					"tanggal" => $this->input->post('tanggal', true),
					"hasil_akhir" => $total,
					"bonus_hafalan" => $this->input->post('bonus', true),
					"keterangan" => 'Lulus/GratisSPP',
				];
			} else if ($total < 200) {
				$data = [
					"tanggal" => $this->input->post('tanggal', true),
					"hasil_akhir" => $total,
					"bonus_hafalan" => $this->input->post('bonus', true),
					"keterangan" => 'Belum Lulus',
				];
			}

			$this->db->where('id_hafalan', $id);
			$this->db->update('thafalan', $data);
		}


		$this->session->set_flashdata('flash', 'Berhasil diedit');
		redirect('hafalan/detail/' . $id_santri);
	}

	public function simpan_tambah($id)
	{
		$data['title'] = 'Hafalan';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();



		$tanggal = $this->input->post('tanggal', true);
		$awal = $this->input->post('awal', true);
		$akhir = $this->input->post('akhir', true);
		$hasil_akhir = $this->input->post('hasil_akhir', true);

		$data = [
			"id_santri" => $id,
			"tanggal" => $tanggal,
			"surah_mulai" => $awal,
			"surah_selesai" => $akhir,
			"hasil_akhir" => $hasil_akhir,
			"keterangan" => 'Belum Lulus',
		];
		$this->db->insert('thafalan', $data);

		$this->session->set_flashdata('flash', 'Berhasil ditambahkan');
		redirect('hafalan/detail/' . $id);
	}

	public function hapus($id, $id_santri)
	{
		$this->db->where('id_hafalan', $id);
		$this->db->delete('thafalan');
		$this->session->set_flashdata('flash', 'Berhasil Dihapus');
		redirect('hafalan/detail/' . $id_santri);
	}
}
