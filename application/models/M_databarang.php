
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_databarang extends CI_Model {

	function tampil_data()
	{
		return $this->db->get('databarang');	//mengambil data dari database dengan nama table
	}

	function input_data($input,$table)
	{
		$this->db->insert($table,$input);
	}

	function edit_data($no,$nm,$jenis,$jml,$thn,$dis,$pos,$hrg,$dana)
	{
		$edit = $this->db->query("UPDATE databarang SET no_seri='$no', nama_barang='$nm', jenis_barang='$jenis', jumlah_barang='$jml', tahun_pengadaan='$thn', distributor='$dis', penempatan_barang='$pos', harga_barang='$hrg', dana_perbaikan='$dana' WHERE no_seri='$no'");
		return $edit;
	}

	function hapus_data($no_seri_barang)
	{
		$hapus = $this->db->query("DELETE FROM databarang WHERE no_seri='$no_seri_barang'");
		return $hapus;
	}

}