<?php

class PresensiR2 extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('PresensiR2_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['title'] = 'Harian';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->view('templates/headeruser', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('PresensiR2/index', $data);
        $this->load->view('templates/footeruser');
    }

    public function absensi()
    {
        $no_bp = $this->input->post('nim', true);
        $hari = $this->input->post('hari', true);
        $waktu = $this->input->post('waktu', true);

        $dataabsen = $this->PresensiR2_model->getabsensi($no_bp);


        date_default_timezone_set('Asia/Jakarta');
        $date = new DateTime('now');
        $cektgl = $date->format('Y-m-d');

        // var_dump($cektgl);
        // die;


        // //cekapakah sudah isi absen masuk atau suda
        // $cekmakulaktif = $this->absensi_model->getcekmakulaktif($no_bp, $cektgl);

        // //cekapakah sudah isi absen masuk atau suda
        $datacekkeluar = $this->PresensiR2_model->Cek_IsiAbsen($no_bp, $cektgl);


        foreach ($datacekkeluar as $cekdata) {
            $id_absensi = $cekdata['id_absen'];
        }

        if ($datacekkeluar == null) {


            if ($waktu >= '07:00:00') {
                // echo 'telat';
                redirect('PresensiR2');
            } else {

                // $nama = $dataabsen['nama_pengajar'];

                $status = 'masuk';
                date_default_timezone_set('Asia/Jakarta');
                $date = new DateTime('now');
                $tanggal = $date->format('Y-m-d');
            }

            // echo 'data benar';

            $data = array(
                'id_pengajar' => $no_bp,
                // 'nama_pengajar' => $nama,
                'status_kehadiran' => $status,
                'tanggal' => $tanggal,
            );

            $this->db->insert('tabsen_pengajar', $data);
            $this->session->set_flashdata('flash', ' Berhasil Ditambahkan');
            redirect('PresensiR2/index');
        } else {


            if ($waktu <= '19:00:00') {
                // echo 'telat';
                redirect('PresensiR2');
            } else {
                $status = 'Complate';
            }
            // echo 'data benar';
        }
        $data = array(
            'status_kehadiran' => $status,
        );
        $this->db->where('id_absen', $id_absensi);
        $this->db->update('tabsen_pengajar', $data);
        redirect('PresensiR2');
    }
}
