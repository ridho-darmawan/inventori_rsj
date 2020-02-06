<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_permohonan extends CI_Model {

	function tampil_data()
	{
		$this->db->order_by('tanggal','DESC');
		$this->db->where('ruangan',$this->session->userdata('ses_ruangan'));
		
		return $this->db->get('permohonan');	

		//mengambil data dari database dengan nama table
	}

	function tampil_data_admin()
	{
		$this->db->order_by('tanggal','DESC');
				
		return $this->db->get('permohonan');	
	}

	function input_data($input,$table)
	{
		$this->db->insert($table,$input);
	}

	function input_data_lanjut($id,$lp,$jp,$jk,$bd,$bp,$ps,$hp)
	{
		$a = $this->db->query("UPDATE permohonan SET  lama_perbaikan='$lp', jadwal_perbaikan='$jp', jenis_kerusakan='$jk', bahan_digunakan='$bd', biaya_perbaikan='$bp', pelaksanaan='$ps', hasil_perbaikan='$hp', status='0' WHERE id_pemohon='$id'");
		return $a;
		
	}


}