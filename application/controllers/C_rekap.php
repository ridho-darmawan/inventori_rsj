<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class C_rekap extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form','url'));
		$this->load->model('M_databarang');
		$this->load->library('pdf');

	}

	public function barang()
	{
		//$data['databarang']=$this->M_rekap->tampil_data()->result();
        $data['info']=$this->db->query("SELECT * FROM permohonan WHERE jenis_kerusakan = ''")->num_rows();
        $data['permohonan']=$this->db->query("SELECT * FROM permohonan WHERE lama_perbaikan = ''")->result();
		$data['main_view']='V_rekapbarang';
		$this->load->view('V_utama',$data);
	}

	public function kerusakan(){
        $data['info']=$this->db->query("SELECT * FROM permohonan WHERE jenis_kerusakan = ''")->num_rows();
        $data['permohonan']=$this->db->query("SELECT * FROM permohonan WHERE lama_perbaikan = ''")->result();
		$data['main_view']='V_rekapkerusakan';
		$this->load->view('V_utama',$data);
	}

	public function cetakbarang(){

		
		$thn=$this->input->post('tahun');
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
        $pdf->Cell(25.5, 0.7, "Laporan Data Barang", 0, 10, 'C');
        $pdf->ln(1);
        $pdf->SetFont('Arial', 'B', 10);
        $pdf->Cell(5, 0.7, "Di cetak pada : " . date("D-d/m/Y"), 0, 0, 'C');
        $pdf->ln(1);
        $pdf->SetFont('Arial', 'B', 10);
        $pdf->Cell(1, 0.8, 'NO', 1, 0, 'C');
        $pdf->Cell(2, 0.8, 'No Seri', 1, 0, 'C');
        $pdf->Cell(3, 0.8, 'Nama Barang', 1, 0, 'C');
        $pdf->Cell(3, 0.8, 'Jenis Barang', 1, 0, 'C');
        $pdf->Cell(3, 0.8, 'Jumlah Barang', 1, 0, 'C');
        $pdf->Cell(3.5, 0.8, 'Tahun Pengadaan', 1, 0, 'C');
        $pdf->Cell(3, 0.8, 'Distributor', 1, 0, 'C');
        $pdf->Cell(2.5, 0.8, 'Lokasi Barang', 1, 0, 'C');
        $pdf->Cell(2.5, 0.8, 'Hrg Barang', 1, 0, 'C');
        $pdf->Cell(3, 0.8, 'Dana Perbaikan', 1, 1, 'C');
        $pdf->SetFont('Arial', '', 10);
        $no = 1;
      
        $data=$this->db->query("SELECT * from databarang WHERE EXTRACT(YEAR FROM tahun_pengadaan) = '$thn'")->result();
        foreach ($data as $j) {
            $pdf->Cell(1, 0.8, $no, 1, 0, 'C');
            $pdf->Cell(2, 0.8, $j->no_seri, 1, 0, 'C');
            $pdf->Cell(3, 0.8, $j->nama_barang, 1, 0, 'C');
            $pdf->Cell(3, 0.8, $j->jenis_barang, 1, 0, 'C');
            $pdf->Cell(3, 0.8, $j->jumlah_barang, 1, 0, 'C');
            $pdf->Cell(3.5, 0.8, $j->tahun_pengadaan, 1, 0, 'C');
            $pdf->Cell(3, 0.8, $j->distributor, 1, 0, 'C');
            $pdf->Cell(2.5, 0.8, $j->penempatan_barang, 1, 0, 'C');
            $pdf->Cell(2.5, 0.8, number_format($j->harga_barang), 1, 0, 'C');
            $pdf->Cell(3, 0.8, $j->dana_perbaikan, 1, 1, 'C');



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
        $pdf->Output("Print_Barang.pdf","I");


	}

        public function cetakbarangrusak(){

        
        $thn=$this->input->post('tahun');
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
      
        $data=$this->db->query("SELECT * from permohonan WHERE EXTRACT(YEAR FROM tanggal) = '$thn' AND hasil_perbaikan !=''")->result();
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
        $pdf->Cell(23, 0.8, 'Mengetahui', 0, 0, 'R');
        $pdf->Cell(1, 0.8, '', 0, 0, 'C');
 
        $pdf->ln(1.5);
        $pdf->Cell(23, 0.8, ''.'ADMIN' .'', 0, 1, 'R');
        $pdf->Cell(1, 0.8, '', 0, 0, 'C');
        $pdf->Output("Print_Barang_rusak.pdf","I");


    }
	 
}

/* End of file C_rekap.php */
/* Location: ./application/controllers/C_rekap.php */ ?>