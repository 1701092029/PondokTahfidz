<?php

class Pengajar_model extends CI_model
{
	public function getAllPengajar()
	{
		return $this->db->get('tpengajar')->result_array();
	}
}
