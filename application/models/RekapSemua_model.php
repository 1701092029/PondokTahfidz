<?php


class RekapSemua_model extends CI_model
{


    public function getTahun()
    {
        $this->db->select('year(tanggal) as th');
        $this->db->from('tabsen_pengajar');
        $this->db->group_by('year(tanggal)');
        return $this->db->get()->result_array();
    }
    public function getBln()
    {
        $this->db->select('month(tanggal) as bln');
        $this->db->from('tabsen_pengajar');
        $this->db->group_by('month(tanggal)');
        return $this->db->get()->result_array();
    }
    public function getPeng()
    {
        // $this->db->select('id_pengajar as bln');
        // $this->db->from('tabsen_pengajar');
        // $this->db->group_by('month(tanggal)');
        // return $this->db->get()->result_array();
        $sql = "SELECT tpengajar.nama_pengajar, tabsen_pengajar.id_pengajar from tpengajar,tabsen_pengajar where tpengajar.id_pengajar=tabsen_pengajar.id_pengajar GROUP BY tabsen_pengajar.id_pengajar";
        $result = $this->db->query($sql);
        return $result->result_array();
    }

    public function getRekapAbsen($tgl1, $tgl2)
    {

        $sql = "SELECT tabsen_pengajar.id_pengajar, tpengajar.nama_pengajar
        FROM tpengajar,tabsen_pengajar WHERE tabsen_pengajar.id_pengajar = tpengajar.id_pengajar 
        and tabsen_pengajar.tanggal between '$tgl1' and '$tgl2' Group By tabsen_pengajar.id_pengajar";
        $result = $this->db->query($sql);
        return $result->result_array();
    }

    public function getJumIzin($tgl1, $tgl2)
    {
        $sql = "SELECT COUNT(status_kehadiran) as jumizin, tpengajar.nama_pengajar  from
         tabsen_Pengajar, tpengajar where tabsen_pengajar.id_pengajar = tpengajar.id_pengajar 
         and tanggal between '$tgl1' and '$tgl2' and status_kehadiran='Izin' group by tabsen_Pengajar.id_pengajar";
        $result = $this->db->query($sql);
        return $result->result_array();
    }

    public function getJumSakit($tgl1, $tgl2)
    {
        $sql = "SELECT COUNT(status_kehadiran) as jumsakit, tpengajar.nama_pengajar  from
         tabsen_Pengajar, tpengajar where tabsen_pengajar.id_pengajar = tpengajar.id_pengajar  
         and tanggal between '$tgl1' and '$tgl2' and status_kehadiran='Sakit' group by tabsen_Pengajar.id_pengajar";
        $result = $this->db->query($sql);
        return $result->result_array();
    }
    public function getJumHadir($tgl1, $tgl2)
    {

        $sql = "SELECT COUNT(status_kehadiran) as tot_hadir , tpengajar.nama_pengajar  from
        tabsen_Pengajar, tpengajar where tabsen_pengajar.id_pengajar = tpengajar.id_pengajar and tanggal between '$tgl1' and '$tgl2' and status_kehadiran='Complate' group by tabsen_Pengajar.id_pengajar";
        $result = $this->db->query($sql);
        return $result->result_array();
    }


    public function getJumAlpa($tgl1, $tgl2)
    {

        $sql = "SELECT COUNT(status_kehadiran) as tot_alpa , tpengajar.nama_pengajar  from
        tabsen_Pengajar, tpengajar where tabsen_pengajar.id_pengajar = tpengajar.id_pengajar and tanggal between '$tgl1' and '$tgl2' group by id_pengajar";
        $result = $this->db->query($sql);
        return $result->row()->tot_alpa;
    }
}
