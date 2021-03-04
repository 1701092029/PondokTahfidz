<?php

class PresensiR1_model extends CI_model
{


    public function getAllPengajar()
    {
        $sql = "SELECT * FROM tpengajar";
        $result = $this->db->query($sql);
        return $result->result_array();
    }

    public function getPengajar($id)
    {
        // $sql = "SELECT * FROM tabsen_pengajar where id_pengajar='$id'";
        $sql = "SELECT tabsen_pengajar.*, tpengajar.nama_pengajar  FROM tpengajar,tabsen_pengajar where tabsen_pengajar.id_pengajar=
        tpengajar.id_pengajar  AND tabsen_pengajar.id_pengajar='$id'";
        $result = $this->db->query($sql);
        return $result->result_array();
    }

    public function Cek_IsiAbsen($id, $tgl)
    {
        $sql = "SELECT * FROM tabsen_pengajar WHERE id_pengajar='$id' AND tanggal='$tgl'";
        $result = $this->db->query($sql);
        return $result->result_array();
    }

    public function AmbilIDAbsen($id, $tgl)
    {
        $sql = "SELECT id_absen as id_ab FROM tabsen_pengajar WHERE id_pengajar='$id' AND tanggal='$tgl'";
        $result = $this->db->query($sql);
        return $result->row()->id_ab;
    }
}
