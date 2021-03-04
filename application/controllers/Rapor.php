<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Rapor extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Hafalan_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['title'] = 'Raport';
        // mengambil data user berdasarkan email yang ada di session
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();


        $thn = $this->input->post('th');
        $bln = $this->input->post('bln');
        // $data['detail_santri'] = $this->Hafalan_model->getDetailSantri($data['user']['id'], $id_santri);

        if (empty($thn) || empty($bln)) {
            $data['list_th'] = $this->Hafalan_model->getTahun();
            $data['list_bln'] = $this->Hafalan_model->getBln();


            $data['blnnya'] = $bln;
            $data['thn'] = $thn;

            $this->load->view('templates/headeruser', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('santri/rapor', $data);
            $this->load->view('templates/footeruser');
        } else {

            $thn = $this->input->post('th');
            $bln = $this->input->post('bln');
            $data['user'] =  $this->db->get_where('user', ['email' =>
            $this->session->userdata('email')])->row_array();

            $data['blnnya'] = $bln;
            $data['thn'] = $thn;
            // $data['nmpeng'] = $idpeng;


            $thnpilihan1 = $thn . '-' . '0' . $bln . '-' . '01';
            $thnpilihan2 = $thn . '-' . '0' . $bln . '-' . '31';
            // $id_santri = $idpeng;

            $data['rapor'] = $this->Hafalan_model->getRekapRapor($thnpilihan1, $thnpilihan2);


            // ========PUTRI REVISI=============
            $data['jumsan'] = $this->Hafalan_model->getJumSan($thnpilihan1, $thnpilihan2);
            $data['total'] = $this->Hafalan_model->getTotalHafalan($thnpilihan1, $thnpilihan2);
            // ========PUTRI REVISI=============

            $data['list_th'] = $this->Hafalan_model->getTahun();
            $data['list_bln'] = $this->Hafalan_model->getBln();
            // $data['list_nampeng'] = $this->RekapPresensi_model->getPeng();

            $this->load->view('templates/headeruser', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('santri/rapor', $data);
            $this->load->view('templates/footeruser');
        }
    }
}
