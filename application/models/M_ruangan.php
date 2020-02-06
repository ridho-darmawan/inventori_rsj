
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_ruangan extends CI_Model {

	function tampil_data()
	{
		return $this->db->get('ruangan');	//mengambil data dari database dengan nama table
	}

	function input_data($input,$table)
	{
		$this->db->insert($table,$input);
	}

	function edit_data($where,$data,$table)
	{
		$this->db->where($where);
		$this->db->update($table,$data);
		
	}

	function hapus_data($id)
	{
		$hapus = $this->db->query("DELETE FROM ruangan WHERE id_ruangan	='$id'");
		return $hapus;
	}

}
