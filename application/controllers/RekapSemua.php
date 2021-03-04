<?php

class RekapSemua extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation'); //membuat sebuah validation
        // $this->load->helper(array('form', 'url'));
        $this->load->model('RekapSemua_model');
    }

    public function index()
    {

        $thn = $this->input->post('th');
        $bln = $this->input->post('bln');

        $data['title'] = 'Rekap Semua';
        $data['user'] =  $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        if (empty($thn) || empty($bln)) {
            $data['list_th'] = $this->RekapSemua_model->getTahun();
            $data['list_bln'] = $this->RekapSemua_model->getBln();


            $data['blnnya'] = $bln;
            $data['thn'] = $thn;

            $this->load->view('templates/headeruser', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('RekapAbsen/indexsemua', $data);
            $this->load->view('templates/footeruser');
        } else {
            $data['title'] = 'Rekap Semua';
            $data['user'] =  $this->db->get_where('user', ['email' =>
            $this->session->userdata('email')])->row_array();

            $data['blnnya'] = $bln;
            $data['thn'] = $thn;



            $thnpilihan1 = $thn . '-' . '0' . $bln . '-' . '01';
            $thnpilihan2 = $thn . '-' . '0' . $bln . '-' . '31';



            // var_dump($data1);
            // die;
            ///
            $data['list_th'] = $this->RekapSemua_model->getTahun();
            $data['list_bln'] = $this->RekapSemua_model->getBln();
            $data['list_nampeng'] = $this->RekapSemua_model->getPeng();

            ///mencari jumlah izin, sakit dan alpa
            $data['rekapabsen'] = $this->RekapSemua_model->getRekapAbsen($thnpilihan1, $thnpilihan2);
            // var_dump($data);
            // die;

            $data['jum_izin'] = $this->RekapSemua_model->getJumIzin($thnpilihan1, $thnpilihan2);
            // var_dump($data1);
            // die;
            $data['jum_sakit'] = $this->RekapSemua_model->getJumSakit($thnpilihan1, $thnpilihan2);
            $data['jum_hadir'] = $this->RekapSemua_model->getJumHadir($thnpilihan1, $thnpilihan2);

            $tanggalpilihan = $thn . '-'  . $bln . '-' . '1';
            $hari_ini = date($tanggalpilihan);

            $tgl_ahir = date('Y-m-t', strtotime($hari_ini));

            // total alpa
            $pecah1 = explode("-", $tgl_ahir);
            $date1 = $pecah1[2];
            $data['tgl_akhir_bulan_ini'] = $date1;
            // $data['tot_alpa'] = $this->RekapPresensi_model->getJumAlpa($thnpilihan1, $thnpilihan2);
            // $data['tot_hadir'] = $this->RekapPresensi_model->getJumHadir($thnpilihan1, $thnpilihan2);
            // 

            $this->load->view('templates/headeruser', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('RekapAbsen/indexsemua', $data);
            $this->load->view('templates/footeruser');
        }
    }
}
