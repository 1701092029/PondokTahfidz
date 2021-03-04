<?php


class RekapPresensi_model extends CI_model
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
        $sql = "SELECT tpengajar.nama_pengajar, tabsen_pengajar.id_pengajar from tpengajar,tabsen_pengajar where tpengajar.id_pengajar=tabsen_pengajar.id_pengajar GROUP BY tabsen_pengajar.id_pengajar";
        $result = $this->db->query($sql);
        return $result->result_array();
    }

    public function getRekapAbsen($tgl1, $tgl2, $id)
    {

        $sql = "SELECT tabsen_pengajar.*, tpengajar.nama_pengajar 
        FROM tpengajar,tabsen_pengajar WHERE tabsen_pengajar.id_pengajar = tpengajar.id_pengajar 
        and tabsen_pengajar.tanggal between '$tgl1' and '$tgl2' and tabsen_pengajar.id_pengajar='$id'";
        $result = $this->db->query($sql);
        return $result->result_array();
    }

    public function getJumIzin($id, $tgl1, $tgl2)
    {

        $sql = "SELECT COUNT(status_kehadiran) as tot_sakit from
         tabsen_Pengajar where tanggal between '$tgl1' and '$tgl2' and id_pengajar='$id' and status_kehadiran='Izin'";
        $result = $this->db->query($sql);
        return $result->row()->tot_sakit;
    }
    public function getJumSakit($id, $tgl1, $tgl2)
    {

        $sql = "SELECT COUNT(status_kehadiran) as tot_izin from
         tabsen_Pengajar where tanggal between '$tgl1' and '$tgl2' and id_pengajar='$id' and status_kehadiran='Sakit'";
        $result = $this->db->query($sql);
        return $result->row()->tot_izin;
    }
    public function getJumHadir($id, $tgl1, $tgl2)
    {

        $sql = "SELECT COUNT(status_kehadiran) as tot_hadir from
         tabsen_Pengajar where tanggal between '$tgl1' and '$tgl2' and id_pengajar='$id' and status_kehadiran='Complate'";
        $result = $this->db->query($sql);
        return $result->row()->tot_hadir;
    }


    public function getJumAlpa($id, $tgl1, $tgl2)
    {

        $sql = "SELECT COUNT(status_kehadiran) as tot_alpa from
         tabsen_Pengajar where tanggal between '$tgl1' and '$tgl2' and id_pengajar='$id'";
        $result = $this->db->query($sql);
        return $result->row()->tot_alpa;
    }
}
