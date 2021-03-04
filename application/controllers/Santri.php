<?php

class Santri extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Santri_model');
		$this->load->library('form_validation');
	}

	public function index()
	{
		$data['title'] = 'Santri';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

		$data['santri'] = $this->Santri_model->getAllSantri();
		$this->load->view('templates/headeruser', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('santri/index', $data);
		$this->load->view('templates/footeruser');
	}

	public function info_edit($id)
	{
		$data['title'] = 'Santri';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

		$data['santri'] = $this->Santri_model->getDetailSantri($id);

		$this->load->view('templates/headeruser', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('santri/detail', $data);
		$this->load->view('templates/footeruser');
	}

	function tambah()
	{
		$data['title'] = 'Santri';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['pengajar1'] = $this->db->get('tpengajar')->result_array();

		$config['upload_path']          = './gambar/foto_santri/';
		$config['allowed_types']        = 'gif|jpg|png|PNG';
		$config['max_size']             = 10000;
		$config['max_width']            = 10000;
		$config['max_height']           = 10000;
		$this->load->library('upload', $config);
		$this->form_validation->set_rules('nama_santri', 'nama_santri', 'required', [
			'required' => 'nama belum diisi!'
		]);

		$this->form_validation->set_rules('jk', 'jk', 'required', [
			'required' => 'jenis kelamin belum diisi!'
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

		$this->form_validation->set_rules('tahun_masuk', 'tahun_masuk', 'required', [
			'required' => 'tahun masuk belum diisi!'
		]);

		$this->form_validation->set_rules('nama_ayah', 'nama_ayah', 'required', [
			'required' => 'nama ayah belum diisi!'
		]);

		$this->form_validation->set_rules('nama_ibu', 'nama_ibu', 'required', [
			'required' => 'nama ibu belum diisi!'
		]);

		$this->form_validation->set_rules('pekerjaan_ayah', 'pekerjaan_ayah', 'required', [
			'required' => 'pekerjaan ayah belum diisi!'
		]);

		$this->form_validation->set_rules('pekerjaan_ibu', 'pekerjaan_ibu', 'required', [
			'required' => 'pekerjaan ibu belum diisi!'
		]);

		$this->form_validation->set_rules('kontak_ortu', 'kontak_ortu', 'required', [
			'required' => 'kontak ortu belum diisi!'
		]);

		$this->form_validation->set_rules('email_ortu', 'email_ortu', 'required', [
			'required' => 'email ortu belum diisi!'
		]);


		if ($this->form_validation->run() == false) {
			$this->load->view('templates/headeruser', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('santri/tambah', $data);
			$this->load->view('templates/footeruser');
		} else {
			if (!$this->upload->do_upload('foto_santri')) {
				$error = array('error' => $this->upload->display_errors());
				$this->load->view('santri/tambah', $error);
			} else {
				$gambar = $this->upload->data();
				$gambar = $gambar['file_name'];
				$nama_santri = $this->input->post('nama_santri', true);
				$jk = $this->input->post('jk', true);
				$tempat_lahir = $this->input->post('tempat_lahir', true);
				$tanggal_lahir = $this->input->post('tanggal_lahir', true);
				$alamat = $this->input->post('alamat', true);
				$tahun_masuk = $this->input->post('tahun_masuk', true);
				$nama_ayah = $this->input->post('nama_ayah', true);
				$nama_ibu = $this->input->post('nama_ibu', true);
				$pekerjaan_ayah = $this->input->post('pekerjaan_ayah', true);
				$pekerjaan_ibu = $this->input->post('pekerjaan_ibu', true);
				$kontak_ortu = $this->input->post('kontak_ortu', true);
				$email_ortu = $this->input->post('email_ortu', true);
				$pengajar = $this->input->post('pengajar', true);

				$data = array(
					'nama_santri' => $nama_santri,
					'jk' => $jk,
					'nama_santri' => $nama_santri,
					'tempat_lahir' => $tempat_lahir,
					'tanggal_lahir' => $tanggal_lahir,
					'alamat' => $alamat,
					'tahun_masuk' => $tahun_masuk,
					'nama_ayah' => $nama_ayah,
					'nama_ibu' => $nama_ibu,
					'pekerjaan_ayah' => $pekerjaan_ayah,
					'pekerjaan_ibu' => $pekerjaan_ibu,
					'kontak_ortu' => $kontak_ortu,
					'email_ortu' => $email_ortu,
					'id_pengajar' => $pengajar,
					'foto_santri' => $gambar,

				);
				$this->db->insert('tsantri', $data);
				$this->session->set_flashdata('flash', ' Berhasil Ditambahkan');
				redirect('santri');
			}
		}
	}

	public function edit($id)
	{
		$data['title'] = 'Santri';
		$data['user'] =  $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['santri'] =  $this->db->get_where('tsantri', ['id_santri' => $id])->row_array();
		$data['jk'] = ['Laki-Laki', 'Perempuan'];
		$data['pengajar1'] = $this->db->get('tpengajar')->result_array();


		$this->form_validation->set_rules('nama_santri', 'nama_santri', 'required', [
			'required' => 'nama belum diisi!'
		]);



		if ($this->form_validation->run() == false) {
			$this->load->view('templates/headeruser', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('santri/edit', $data);
			$this->load->view('templates/footeruser');
		} else {
			$upload_image = $_FILES['foto_santri']['name'];
			if ($upload_image) {
				$config['upload_path']          = './gambar/foto_santri/';
				$config['allowed_types']        = 'gif|jpg|png|PNG';
				$config['max_size']             = 10000;
				$config['max_width']            = 10000;
				$config['max_height']           = 10000;
				$this->load->library('upload', $config);

				if ($this->upload->do_upload('foto_santri')) {
					$new_image = $this->upload->data('file_name');
					$data = $this->db->set('foto_santri', $new_image);
				} else {
					echo $this->upload->display_errors();
				}
			}

			$data = [
				"nama_santri" => $this->input->post('nama_santri', true),
				"jk" => $this->input->post('jk', true),
				"tempat_lahir" => $this->input->post('tempat_lahir', true),
				"tanggal_lahir" => $this->input->post('tanggal_lahir', true),
				"alamat" => $this->input->post('alamat', true),
				"tahun_masuk" => $this->input->post('tahun_masuk', true),
				"nama_ayah" => $this->input->post('nama_ayah', true),
				"nama_ibu" => $this->input->post('nama_ibu', true),
				"pekerjaan_ayah" => $this->input->post('pekerjaan_ayah', true),
				"pekerjaan_ibu" => $this->input->post('pekerjaan_ibu', true),
				"kontak_ortu" => $this->input->post('kontak_ortu', true),
				"email_ortu" => $this->input->post('email_ortu', true),
				"id_pengajar" => $this->input->post('pengajar', true)
			];



			$this->db->where('id_santri', $this->input->post('id'));
			$this->db->update('tsantri', $data);

			// $this->Berita_model->editDataBerita();
			$this->session->set_flashdata('flash', 'Berhasil diedit');
			redirect('santri');
		}
	}


	public function hapus($id)
	{


		$this->db->where('id_santri', $id);
		$this->db->delete('tsantri');
		$this->session->set_flashdata('flash', 'Berhasil Dihapus');
		redirect('santri');
	}
}
