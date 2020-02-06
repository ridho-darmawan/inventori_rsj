<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_laporankerusakan extends CI_Model {


	function hapus_data($id_laporan_kerusakan)
	{
		$hapus = $this->db->query("DELETE FROM permohonan WHERE id_pemohon='$id_laporan_kerusakan'");
		return $hapus;
	}

	function konfirmasi_proses($id_pemohon){
			$data = [
			'status' => '1'
		];
		//sintaks edit data
		$this->db->where('id_pemohon',$id_pemohon);
		$this->db->update('permohonan',$data);
		return true;
	}

}