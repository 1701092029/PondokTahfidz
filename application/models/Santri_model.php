<?php

class Santri_model extends CI_model
{
	public function getAllSantri()
	{
		return $this->db->get('tsantri')->result_array();
	}

	public function getDetailSantri($id)
	{
		return $this->db->get_where('tsantri', ['id_santri' => $id])->row_array();
	}
}
