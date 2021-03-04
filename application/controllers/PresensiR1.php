<?php

class PresensiR1 extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('PresensiR1_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['title'] = 'Presensi';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['pengajar'] =  $this->PresensiR1_model->getAllPengajar();

        $this->load->view('templates/headeruser', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('PresensiR1/index', $data);
        $this->load->view('templates/footeruser');
    }

    public function absensi($id)
    {


        $data['title'] = 'Presensi';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();


        $this->form_validation->set_rules('nim', 'nim', 'required', [
            'required' => 'nim belum diisi!'
        ]);

        $this->form_validation->set_rules('waktu', 'waktu', 'required', [
            'required' => 'waktu belum diisi!'
        ]);
        $data['pengajar'] =  $this->PresensiR1_model->getPengajar($id);
        $data['id_peng'] =  $id;


        if ($this->form_validation->run() == false) {
            $this->load->view('templates/headeruser', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('PresensiR1/presensi', $data);
            $this->load->view('templates/footeruser');
        } else {

            // $no_bp = $this->input->post('nim', true);
            // $hari = $this->input->post('hari', true);
            // $waktu = $this->input->post('waktu', true);
            date_default_timezone_set('Asia/Jakarta');
            $date = new DateTime('now');
            $waktu = $date->format('yy-m-d');

            $datacekkeluar = $this->PresensiR1_model->Cek_IsiAbsen($id, $waktu);

            $idabsen = $this->PresensiR1_model->AmbilIDAbsen($id, $waktu);

            if ($datacekkeluar == null) {
                $data = array(
                    'id_pengajar' => $id,
                    'tanggal' => $waktu,
                    // 'nama_pengajar' => $tgl,
                    'status_kehadiran' => 'Complate',
                );
                $this->db->insert('tabsen_pengajar', $data);
                $this->session->set_flashdata('flash', ' Berhasil Ditambahkan');
                redirect('PresensiR1/absensi/' . $id);
            } else {
                $data = array(

                    'tanggal' => $waktu,
                    // 'nama_pengajar' => $tgl,
                    'status_kehadiran' => 'Complate',
                );
                $this->db->where('id_absen', $idabsen);
                $this->db->update('tabsen_pengajar', $data);
                $this->session->set_flashdata('flash', ' Berhasil Ditambahkan');
                redirect('PresensiR1/absensi/' . $id);
            }
        }
    }

    public function lainnya($id)
    {

        $data['title'] = 'Presensi';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $status_kehadiran = $this->input->post('status_kehadiran', true);
        $hari = $this->input->post('hari', true);
        // $waktu = $this->input->post('waktu', true);

        date_default_timezone_set('Asia/Jakarta');
        $date = new DateTime('now');
        $waktu = $date->format('yy-m-d');
        $datacekkeluar = $this->PresensiR1_model->Cek_IsiAbsen($id, $waktu);
        $idabsen = $this->PresensiR1_model->AmbilIDAbsen($id, $waktu);

        if ($datacekkeluar == null) {
            $data = array(
                'id_pengajar' => $id,
                'tanggal' => $waktu,
                // 'nama_pengajar' => $tgl,
                'status_kehadiran' => $status_kehadiran,
            );
            $this->db->insert('tabsen_pengajar', $data);
            $this->session->set_flashdata('flash', ' Berhasil Ditambahkan');
            redirect('PresensiR1/absensi/' . $id);
        } else {
            $data = array(
                'id_pengajar' => $id,
                'tanggal' => $waktu,
                // 'nama_pengajar' => $tgl,
                'status_kehadiran' => $status_kehadiran,
            );
            $this->db->where('id_absen', $idabsen);
            $this->db->update('tabsen_pengajar', $data);
            $this->session->set_flashdata('flash', ' Berhasil Diperbarui');
            redirect('PresensiR1/absensi/' . $id);
        }
    }
}
