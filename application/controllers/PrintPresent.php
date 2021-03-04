<?php

class PrintPresent extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        // $this->load->helper(array('form', 'url'));

    }
    public function PrintPerorang($thn, $bln, $idpeng)
    {
        $this->load->model('RekapPresensi_model');
        $this->load->library('mypdf');

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

        $this->mypdf->generate('RekapAbsen/cetakperorang.php', $data);
    }

    public function PrintSemua($thn, $bln)
    {
        $this->load->model('RekapSemua_model');
        $this->load->library('mypdf');
        $data['blnnya'] = $bln;
        $data['thn'] = $thn;



        $thnpilihan1 = $thn . '-' . '0' . $bln . '-' . '01';
        $thnpilihan2 = $thn . '-' . '0' . $bln . '-' . '31';



        // var_dump($data1);
        // die;
        ///
        $data['list_th'] = $this->RekapSemua_model->getTahun();
        $data['list_bln'] = $this->RekapSemua_model->getBln();


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
        $this->mypdf->generate('RekapAbsen/cetaksemua.php', $data);
    }

    public function PrintRapor($thn, $bln)
    {
        $this->load->model('Hafalan_model');
        $this->load->library('mypdf');
        $data['blnnya'] = $bln;
        $data['thn'] = $thn;

        $thnpilihan1 = $thn . '-' . '0' . $bln . '-' . '01';
        $thnpilihan2 = $thn . '-' . '0' . $bln . '-' . '31';

        // $data['list_th'] = $this->RekapSemua_model->getTahun();
        // $data['list_bln'] = $this->RekapSemua_model->getBln();
        $data['rapor'] = $this->Hafalan_model->getRekapRapor($thnpilihan1, $thnpilihan2);
        $this->mypdf->generate('CetakRapor/cetakrapor.php', $data);
    }
}
