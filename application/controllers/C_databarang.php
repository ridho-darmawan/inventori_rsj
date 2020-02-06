
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_databarang extends CI_Controller {
public function __construct(){

	parent::__construct();
	$this->load->helper(array('form','url'));
	$this->load->model(array('M_databarang','M_ruangan'));
	$this->load->library('pdf');
}

	public function index()
	{
		$data['info']=$this->db->query("SELECT * FROM permohonan WHERE jenis_kerusakan = ''")->num_rows();
		$data['permohonan']=$this->db->query("SELECT * FROM permohonan WHERE lama_perbaikan = ''")->result();
		$data['ruangan']=$this->M_ruangan->tampil_data()->result();
		$data['databarang']=$this->M_databarang->tampil_data()->result();
		$data['main_view']='V_databarang';
		$this->load->view('V_utama',$data);
	}

	public function tambah()
	{
		$input = array(
			'no_seri' =>$this->input->post('noSeriBarang'),
			'nama_barang'=> $this->input->post('namaBarang'),
			'jenis_barang'=>$this->input->post('jenisBarang'),
			'jumlah_barang'=>$this->input->post('jumlahBarang'),
			'tahun_pengadaan'=>$this->input->post('tahunPengadaan'),
			'distributor'=>$this->input->post('distributor'),
			'penempatan_barang'=>$this->input->post('penempatanBarang'),
			'harga_barang'=>$this->input->post('hargaBarang'),
			'dana_perbaikan'=>$this->input->post('danaPerbaikan')

		);

		$this->M_databarang->input_data($input,'databarang');
		if ($input == null) {
			$this->session->set_flashdata('msg', 
				'<div class="alert alert-danger">
				<h4>Oppss</h4>
				<p>Tidak ada data yang diinput.</p>
				</div>');    
			$this->load->view('V_databarang');
		}
		else{
			$this->session->set_flashdata('msg', 
				'<div class="alert alert-success">
				<h4>Berhasil </h4>
				<p>Anda Berhasil Input Data Barang.</p>
				</div>');    
			$this->load->view('V_databarang');   
		};

		redirect('C_databarang/index');
	}


	public function edit()
	{
		$input = array(
			$no = $this->input->post('noSeriBarang') ,
			$nm = $this->input->post('namaBarang'),
			$jenis = $this->input->post('jenisBarang'),
			$jml = $this->input->post('jumlahBarang'),
			$thn = $this->input->post('tahunPengadaan'),
			$dis = $this->input->post('distributor'),
			$pos = $this->input->post('penempatanBarang'),
			$hrg = $this->input->post('hargaBarang'),
			$dana = $this->input->post('danaPerbaikan'),

		);

		// $data = array(
		// 	'no_seri' => $no,		
		// 	'nama_barang' =>$nm,
		// 	'jenis_barang' =>$jenis,
		// 	'jumlah_barang'=>$jml,
		// 	'tahun_pengadaan'=>$thn,
		// 	'distributor'=>$dis,
		// 	'penempatan_barang'=>$pos,
		// 	'harga_barang'=>$hrg,
		// 	'dana_perbaikan'=>$dana,
		// );

		//$where = array('no_seri'=>$no);


			$this->M_databarang->edit_data($no,$nm,$jenis,$jml,$thn,$dis,$pos,$hrg,$dana);
		// $this->M_databarang->edit_data($where,$data,'databarang');
		if ($input == null) {
			$this->session->set_flashdata('msg', 
				'<div class="alert alert-danger">
				<h4>Oppss</h4>	
				<p>Data Gagal Diedit</p>
				</div>');    
			$this->load->view('V_databarang');
		}else{
			$this->session->set_flashdata('msg', 
				'<div class="alert alert-success">
				<h4>Berhasil </h4>
				<p>Data Berhasil Diedit</p>
				</div>');    
			$this->load->view('V_databarang'); 
		}
		redirect('C_databarang/index');
	}

	function hapus()
	{
		$no_seri_barang=$this->input->post('noSeriBarang');
		$this->M_databarang->hapus_data($no_seri_barang);

		if ($no_seri_barang == null) {
			$this->session->set_flashdata('msg', 
				'<div class="alert alert-danger">
				<h4>Oppss</h4>
				<p>Data Gagal Dihapus</p>
				</div>');    
			$this->load->view('V_databarang');
		}else{
			$this->session->set_flashdata('msg', 
				'<div class="alert alert-success">
				<h4>Berhasil </h4>
				<p>Data Berhasil Dihapus</p>
				</div>');    
			$this->load->view('V_databarang'); 
		}
		redirect('C_databarang/index');
	}


	function cetak()
	{
		$no_seri = $this->uri->segment(3);
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
        $this->db->select('*');
        $this->db->from('databarang');
        $this->db->where('no_seri', $no_seri);
        
        $data = $this->db->get()->result();
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
        $pdf->Output("Print_peminjaman_Barang.pdf","I");


	}
}
