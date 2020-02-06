<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_datapengguna extends CI_Model {
	function tampil_data()
	{
		return $this->db->get('users');	//mengambil data dari database dengan nama table
	}

	function input_data($data,$table)
	{
		$this->db->insert($table,$data);
	}

	function edit_data($where,$data,$table)
	{
		$this->db->where($where);
		$this->db->update($table,$data);
		
	}

	function hapus_data($nip)
	{
		$hapus = $this->db->query("DELETE FROM users WHERE nip	='$nip'");
		return $hapus;
	}


}