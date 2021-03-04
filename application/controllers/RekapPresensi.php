<?php

class RekapPresensi extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation'); //membuat sebuah validation
        // $this->load->helper(array('form', 'url'));
        $this->load->model('RekapPresensi_model');
    }

    public function index()
    {

        $thn = $this->input->post('th');
        $bln = $this->input->post('bln');
        $idpeng = $this->input->post('id_pengajar');
        $data['title'] = 'Rekap Presensi';
        $data['user'] =  $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        if (empty($thn) || empty($bln) || empty($idpeng)) {
            $data['list_th'] = $this->RekapPresensi_model->getTahun();
            $data['list_bln'] = $this->RekapPresensi_model->getBln();
            $data['list_nampeng'] = $this->RekapPresensi_model->getPeng();

            $data['blnnya'] = $bln;
            $data['thn'] = $thn;
            $data['nmpeng'] = $idpeng;

            $this->load->view('templates/headeruser', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('RekapAbsen/index', $data);
            $this->load->view('templates/footeruser');
        } else {
            $data['title'] = 'Rekap Presensi';
            $data['user'] =  $this->db->get_where('user', ['email' =>
            $this->session->userdata('email')])->row_array();

            $data['blnnya'] = $bln;
            $data['thn'] = $thn;
            $data['nmpeng'] = $idpeng;


            $thnpilihan1 = $thn . '-' . '0' . $bln . '-' . '01';
            $thnpilihan2 = $thn . '-' . '0' . $bln . '-' . '31';
            $id_pengajar = $idpeng;

            $data['rekapabsen'] = $this->RekapPresensi_model->getRekapAbsen($thnpilihan1, $thnpilihan2, $id_pengajar);
            // var_dump($data1);
            // die;
            ///
            $data['list_th'] = $this->RekapPresensi_model->getTahun();
            $data['list_bln'] = $this->RekapPresensi_model->getBln();
            $data['list_nampeng'] = $this->RekapPresensi_model->getPeng();

            ///mencari jumlah izin, sakit dan alpa
            $data['jum_izin'] = $this->RekapPresensi_model->getJumIzin($idpeng, $thnpilihan1, $thnpilihan2);
            $data['jum_sakit'] = $this->RekapPresensi_model->getJumSakit($idpeng, $thnpilihan1, $thnpilihan2);

            $tanggalpilihan = $thn . '-'  . $bln . '-' . '1';
            $hari_ini = date($tanggalpilihan);

            $tgl_ahir = date('Y-m-t', strtotime($hari_ini));




            // total alpa
            $pecah1 = explode("-", $tgl_ahir);
            $date1 = $pecah1[2];
            $data['tgl_akhir_bulan_ini'] = $date1;
            $data['tot_alpa'] = $this->RekapPresensi_model->getJumAlpa($idpeng, $thnpilihan1, $thnpilihan2);
            $data['tot_hadir'] = $this->RekapPresensi_model->getJumHadir($idpeng, $thnpilihan1, $thnpilihan2);



            // 




            $this->load->view('templates/headeruser', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('RekapAbsen/index', $data);
            $this->load->view('templates/footeruser');
        }
    }
}
