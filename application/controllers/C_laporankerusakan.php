<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_laporankerusakan extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->helper(array('form','url'));
		$this->load->model(array('M_laporankerusakan','M_permohonan','M_ruangan'));
		$this->load->library('pdf');

	}

	public function index()
	{
		$data['info']=$this->db->query("SELECT * FROM permohonan WHERE jenis_kerusakan = ''")->num_rows();
		$data['permohonan']=$this->db->query("SELECT * FROM permohonan WHERE lama_perbaikan = ''")->result();
		//$data['laporanKerusakan']=$this->M_laporankerusakan->tampil_data()->result();
		$data['ruangan']=$this->M_ruangan->tampil_data()->result();
		$data['permohonan']=$this->M_permohonan->tampil_data_admin()->result();
		$data['main_view']='V_laporankerusakan';
		$this->load->view('V_utama',$data);
	}
	public function tindak_lanjut(){

		$input=array(
			$id = $this->input->post('id_pemohon'),
			$lp = $this->input->post('lamaPerbaikan'),
			$jp = $this->input->post('jadwalPerbaikan'),
			$jk = $this->input->post('jenisKerusakan'),
			$bd = $this->input->post('bahanDigunakan'),
			$bp = $this->input->post('biayaPerbaikan'),
			$ps = $this->input->post('pelaksanaan'),
			$hp = $this->input->post('hasilPerbaikan')

		);


		$this->M_permohonan->input_data_lanjut($id,$lp,$jp,$jk,$bd,$bp,$ps,$hp);
		if($input==null){
				$this->session->set_flashdata('msg', 
				'<div class="alert alert-danger">
				<h4>Oppss</h4>
				<p>maaf tidak ada yang diinput</p>
				</div>');    
			
			$this->load->view("V_laporankerusakan");

		}else{
			$this->session->set_flashdata('msg', 
				'<div class="alert alert-success">
				<h4>Berhasil </h4>
				<p>selamat anda berhasil input data</p>
				</div>');    
		
			$this->load->view("V_laporankerusakan");
		};
		redirect("C_laporankerusakan/index");
	}

	function edit()
	{
		$input = array(
			$id = $this->input->post('idKerusakan') ,
			$lp = $this->input->post('lamaPerbaikan'),
			$jp = $this->input->post('jadwalPerbaikan'),
			$jk = $this->input->post('jenisKerusakan'),
			$bd = $this->input->post('bahanDigunakan'),
			$bp = $this->input->post('biayaPerbaikan'),
			$ps = $this->input->post('pelaksanaan'),
			$hp = $this->input->post('hasilPerbaikan')
			

		);

		$this->M_laporankerusakan->edit_data($id,$lp,$jp,$jk,$bd,$bp,$bp,$ps,$hp);
		if ($input == null) {
			$this->session->set_flashdata('msg', 
				'<div class="alert alert-danger">
				<h4>Oppss</h4>	
				<p>Data Gagal Diedit</p>
				</div>');    
			$this->load->view('V_laporankerusakan');
		}else{
			$this->session->set_flashdata('msg', 
				'<div class="alert alert-success">
				<h4>Berhasil </h4>
				<p>Data Berhasil Diedit</p>
				</div>');    
			$this->load->view('V_laporankerusakan'); 
		}
		redirect('C_laporankerusakan/index');
	}

function hapus()
	{
		$id_laporan_kerusakan=$this->input->post('id_pemohon');
		$this->M_laporankerusakan->hapus_data($id_laporan_kerusakan);

		if ($id_laporan_kerusakan == null) {
			$this->session->set_flashdata('msg', 
				'<div class="alert alert-danger">
				<h4>Oppss</h4>
				<p>Data Gagal Dihapus</p>
				</div>');    
			$this->load->view('V_laporankerusakan');
		}else{
			$this->session->set_flashdata('msg', 
				'<div class="alert alert-success">
				<h4>Berhasil </h4>
				<p>Data Berhasil Dihapus</p>
				</div>');    
			$this->load->view('V_laporankerusakan'); 
		}
		redirect('C_laporankerusakan/index');
	}

	function konfirmasi($id_pemohon)
	{
		if($this->M_laporankerusakan->konfirmasi_proses($id_pemohon)){
			$this->session->set_flashdata('msg', 
				'<div class="alert alert-success">
				<h4>Konfirmasi Berhasil </h4>
				</div>'); 
			redirect('C_laporankerusakan/index');
		}else{
			exit('Data unknown!');
		}
	}

	function cetak()
	{
		$id_pemohon = $this->uri->segment(3);
		$pdf = new FPDF("L", "cm", "A4");
		$pdf->SetMargins(2, 1, 1);
        $pdf->AliasNbPages();
        $pdf->AddPage();
        $pdf->SetFont('Times', 'B', 11);
        $pdf->Image('asset/rsj.jpg',1.5,0.7,2,2);
        $pdf->SetX(4);
        $pdf->MultiCell(19.5,0.5,'RS Jiwa Tampan',0,'L');
        $pdf->SetX(4);
        $pdf->MultiCell(19.5,0.5,'Telp : +076163240',0,'L');
        $pdf->SetFont('Arial', 'B', 10);
        $pdf->SetX(4);
        $pdf->MultiCell(19.5,0.5,'Website : www.rsjiwatampan.riau.go.id' ,0,'L');
        $pdf->SetX(4);
        $pdf->MultiCell(26.5,0.5,'Email : info@rsjtampan.com',0,'L');
        $pdf->Line(1, 3.1, 28.5, 3.1);
        $pdf->SetLineWidth(0.1);
        $pdf->Line(1, 3.2, 28.5, 3.2);
        $pdf->SetLineWidth(0);
        $pdf->ln(1);
        $pdf->SetFont('Arial', 'B', 14);
        $pdf->Cell(25.5, 0.7, "Laporan Data Barang Pernah Rusak", 0, 10, 'C');
        $pdf->ln(1);
        $pdf->SetFont('Arial', 'B', 10);
        $pdf->Cell(5, 0.7, "Di cetak pada : " . date("D-d/m/Y"), 0, 0, 'C');
        $pdf->ln(1);
        $pdf->SetFont('Arial', 'B', 9);
        $pdf->Cell(1, 0.8, 'NO', 1, 0, 'C');
        $pdf->Cell(2, 0.8, 'Nama Brg', 1, 0, 'C');
        $pdf->Cell(1.5, 0.8, 'Jumlah', 1, 0, 'C');
        $pdf->Cell(4, 0.8, 'Jenis Kerusakan', 1, 0, 'C');
        $pdf->Cell(3, 0.8, 'Bahan Perbaikan', 1, 0, 'C');
        $pdf->Cell(3, 0.8, 'Biaya Perbaikan', 1, 0, 'C');
        
         $pdf->Cell(2.5, 0.8, 'Pelaksanaan', 1, 0, 'C');
         $pdf->Cell(2.5, 0.8, 'Hasil Perbaikan', 1, 0, 'C');
         $pdf->Cell(2.5, 0.8, 'Nama Pemohon', 1, 0, 'C');
         $pdf->Cell(2, 0.8, 'NIP', 1, 0, 'C');
         $pdf->Cell(2, 0.8, 'Ruangan', 1, 1, 'C');
        $pdf->SetFont('Arial', '', 8);
        $no = 1;
        $this->db->select('*');
        $this->db->from('permohonan');
        $this->db->where('id_pemohon', $id_pemohon);
        
        $data = $this->db->get()->result();
        foreach ($data as $j) {
           $pdf->Cell(1, 0.8, $no, 1, 0, 'C');
            $pdf->Cell(2, 0.8, $j->uraian_perbaikan, 1, 0, 'C');
            $pdf->Cell(1.5, 0.8, $j->jumlah, 1, 0, 'C');
            $pdf->Cell(4, 0.8, $j->jenis_kerusakan, 1, 0, 'C');
            $pdf->Cell(3, 0.8, $j->bahan_digunakan, 1, 0, 'C');
            $pdf->Cell(3, 0.8, $j->biaya_perbaikan, 1, 0, 'C');
            
             $pdf->Cell(2.5, 0.8, $j->pelaksanaan, 1, 0, 'C');
             $pdf->Cell(2.5, 0.8, $j->hasil_perbaikan, 1, 0, 'C');
             $pdf->Cell(2.5, 0.8, $j->nama, 1, 0, 'C');
             $pdf->Cell(2, 0.8, $j->nip, 1, 0, 'C');
             $pdf->Cell(2, 0.8, $j->ruangan, 1, 1, 'C');
            $no++;
        }
        $name= $this->db->get_where('users')->row_Array();
        $pdf->ln(0.5);
        $pdf->Cell(8, 0.8, 'Mengetahui', 0, 0, 'C');
        $pdf->Cell(1, 0.8, '', 0, 0, 'C');
 //       $pdf->Cell(8, 0.8, 'Penerima', 0, 1, 'C');
         $pdf->ln(1.5);
         $pdf->Cell(8, 0.8, ''.'TIM' .'', 0, 1, 'C');
       //  $pdf->Cell(8, 0.8, '(' .$name['nip'] . ')', 0, 0, 'C');
         $pdf->Cell(1, 0.8, '', 0, 0, 'C');
//        $pdf->Cell(8.5, 0.8, '(................................)', 0, 1, 'C');
        $pdf->Output("Print_Barang_rusak.pdf","I");


	}


}
