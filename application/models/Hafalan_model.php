<?php

class Hafalan_model extends CI_model
{


    public function getDetailSantri($id, $id_santri)
    {
        $sql = "SELECT * FROM tsantri WHERE id_pengajar='$id' AND id_santri='$id_santri'";
        $result = $this->db->query($sql);
        return $result->row_array();
    }
    public function getTahun()
    {
        $this->db->select('year(tanggal) as th');
        $this->db->from('thafalan');
        $this->db->group_by('year(tanggal)');
        return $this->db->get()->result_array();
    }
    public function getBln()
    {
        $this->db->select('month(tanggal) as bln');
        $this->db->from('thafalan');
        $this->db->group_by('month(tanggal)');
        return $this->db->get()->result_array();
    }

    public function getRekapSantri($tgl1, $tgl2, $id)
    {

        $sql = "SELECT * FROM thafalan WHERE tanggal between '$tgl1' and '$tgl2' and id_santri='$id'";
        $result = $this->db->query($sql);
        return $result->row_array();
    }

    //rapor
    public function getRekapRapor($tgl1, $tgl2)
    {



        $sql = "SELECT thafalan.*, tsantri.nama_santri as namasantri, (thafalan.hasil_akhir+thafalan.bonus_hafalan) as rangking
        FROM thafalan,tsantri WHERE thafalan.id_santri = tsantri.id_santri 
        and thafalan.tanggal between '$tgl1' and '$tgl2' order by rangking desc";
        $result = $this->db->query($sql);
        return $result->result_array();
    }
    // ========PUTRI REVISI=============
    public function getTotalHafalan($tgl1, $tgl2)
    {
        $sql = "SELECT sum(hasil_akhir+bonus_hafalan) as jumlahhafalan
        FROM thafalan WHERE thafalan.tanggal between '$tgl1' and '$tgl2'";
        $result = $this->db->query($sql);
        return $result->row_array();
    }

    public function getJumSan($tgl1, $tgl2)
    {


        $sql = "SELECT count(id_santri) as jumsan 
        FROM thafalan WHERE tanggal between '$tgl1' and '$tgl2'";
        $result = $this->db->query($sql);
        return $result->row_array();
    }
    // ========PUTRI REVISI=============

}
