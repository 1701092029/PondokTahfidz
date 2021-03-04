<?php

class Pengajar extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Pengajar_model');
		$this->load->library('form_validation');
	}

	public function index()
	{
		$data['title'] = 'Pengajar';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

		$data['pengajar'] = $this->Pengajar_model->getAllPengajar();
		$this->load->view('templates/headeruser', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('pengajar/index', $data);
		$this->load->view('templates/footeruser');
	}

	public function detail($id)
	{
		$data['title'] = 'Pengajar';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['pengajar'] =  $this->db->get_where('tpengajar', ['id_pengajar' => $id])->row_array();


		$this->load->view('templates/headeruser', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('pengajar/detail', $data);
		$this->load->view('templates/footeruser');
	}

	function tambah()
	{
		$data['title'] = 'Pengajar';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();


		$this->form_validation->set_rules('nip', 'nip', 'required', [
			'required' => 'nip belum diisi!'
		]);
		$this->form_validation->set_rules('nama_pengajar', 'nama_pengajar', 'required', [
			'required' => 'nama pengajar belum diisi!'
		]);
		$this->form_validation->set_rules('tempat_lahir', 'tempat_lahir', 'required', [
			'required' => 'tempat lahir belum diisi!'
		]);
		$this->form_validation->set_rules('tanggal_lahir', 'tanggal_lahir', 'required', [
			'required' => 'tanggal lahir belum diisi!'
		]);
		$this->form_validation->set_rules('alamat', 'alamat', 'required', [
			'required' => 'alamat belum diisi!'
		]);
		$this->form_validation->set_rules('jk', 'jk', 'required', [
			'required' => 'jenis kelamin belum diisi!'
		]);
		$this->form_validation->set_rules('status_kawin', 'status_kawin', 'required', [
			'required' => 'status kawin belum diisi!'
		]);
		$this->form_validation->set_rules('pendidikan_terakhir', 'pendidikan_terakhir', 'required', [
			'required' => 'pendidikan terakhir belum diisi!'
		]);
		$this->form_validation->set_rules('email', 'email', 'required', [
			'required' => 'email belum diisi!'
		]);
		$this->form_validation->set_rules('nohp', 'nohp', 'required', [
			'required' => 'nomor hp belum diisi!'
		]);
		$this->form_validation->set_rules('tahun_masuk', 'tahun_masuk', 'required', [
			'required' => 'tahun masuk belum diisi!'
		]);


		if ($this->form_validation->run() == false) {
			$this->load->view('templates/headeruser', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('pengajar/tambah', $data);
			$this->load->view('templates/footeruser');
		} else {
			$nip = $this->input->post('nip', true);
			$nama_pengajar = $this->input->post('nama_pengajar', true);
			$tempat_lahir = $this->input->post('tempat_lahir', true);
			$tanggal_lahir = $this->input->post('tanggal_lahir', true);
			$alamat = $this->input->post('alamat', true);
			$jk = $this->input->post('jk', true);
			$status_kawin = $this->input->post('status_kawin', true);
			$pendidikan_terakhir = $this->input->post('pendidikan_terakhir', true);
			$email = $this->input->post('email', true);
			$nohp = $this->input->post('nohp', true);
			$tahun_masuk = $this->input->post('tahun_masuk', true);

			$data = array(
				'id_pengajar' => $nip,
				'jk' => $jk,
				'nama_pengajar' => $nama_pengajar,
				'tempat_lahir' => $tempat_lahir,
				'tanggal_lahir' => $tanggal_lahir,
				'alamat' => $alamat,
				'tahun_masuk' => $tahun_masuk,
				'status_kawin' => $status_kawin,
				'pendidikan_terakhir' => $pendidikan_terakhir,
				'email' => $email,
				'nohp' => $nohp,
			);
			$this->db->insert('tpengajar', $data);
			$this->session->set_flashdata('flash', ' Berhasil Ditambahkan');
			redirect('pengajar');
		}
	}

	public function edit($id)
	{
		$data['title'] = 'Pengajar';
		$data['user'] =  $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['pengajar'] =  $this->db->get_where('tpengajar', ['id_pengajar' => $id])->row_array();
		$data['jk'] = ['Laki-Laki', 'Perempuan'];

		$this->form_validation->set_rules('nama_pengajar', 'nama_pengajar', 'required', [
			'required' => 'nama belum diisi!'
		]);



		if ($this->form_validation->run() == false) {
			$this->load->view('templates/headeruser', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('pengajar/edit', $data);
			$this->load->view('templates/footeruser');
		} else {

			$data = [

				"jk" => $this->input->post('jk', true),
				"nama_pengajar" => $this->input->post('nama_pengajar', true),
				"tempat_lahir" => $this->input->post('tempat_lahir', true),
				"tanggal_lahir" => $this->input->post('tanggal_lahir', true),
				"alamat" => $this->input->post('alamat', true),
				"tahun_masuk" => $this->input->post('tahun_masuk', true),
				"status_kawin" => $this->input->post('status_kawin', true),
				"pendidikan_terakhir" => $this->input->post('pendidikan_terakhir', true),
				"email" => $this->input->post('email', true),
				"nohp" => $this->input->post('nohp', true)
			];


			$this->db->where('id_pengajar', $this->input->post('nip'));
			$this->db->update('tpengajar', $data);


			$this->session->set_flashdata('flash', 'Berhasil diedit');
			redirect('pengajar');
		}
	}


	public function hapus($id)
	{
		$this->db->where('nip', $id);
		$this->db->delete('tpengajar');
		$this->session->set_flashdata('flash', 'Berhasil Dihapus');
		redirect('pengajar');
	}
}
