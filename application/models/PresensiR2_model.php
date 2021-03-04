<?php

class PresensiR2_model extends CI_model
{
    public function getabsensi($id)
    {
        $sql = "SELECT *
        FROM tpengajar WHERE id_pengajar='$id'";
        $result = $this->db->query($sql);
        return $result->row_array();
    }

    public function Cek_IsiAbsen($id, $tgl)
    {
        $sql = "SELECT * FROM tabsen_pengajar WHERE id_pengajar='$id' AND tanggal='$tgl'";
        $result = $this->db->query($sql);
        return $result->result_array();
    }
}
