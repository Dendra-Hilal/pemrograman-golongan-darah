<?php

class Goldar extends Controller {
	
	public function __construct()
	{	
		if($_SESSION['session_login'] != 'sudah_login') {
			Flasher::setMessage('Login','Tidak ditemukan.','danger');
			header('location: '. base_url . '/login');
			exit;
		}
	}
	
	public function index()
	{
		$data['title'] = 'Data Golongan Darah';
		$data['goldar'] = $this->model('GoldarModel')->getAllGoldar();
		$this->view('templates/header', $data);
		$this->view('templates/sidebar', $data);
		$this->view('goldar/index', $data);
		$this->view('templates/footer');
	}
	public function lihatlaporan()
	{
		$data['title'] = 'Data Laporan Golongan Darah';
		$data['goldar'] = $this->model('GoldarModel')->getAllGoldar();
		$this->view('goldar/lihatlaporan', $data);
	}

	public function laporan()
	{
		$data['goldar'] = $this->model('GoldarModel')->getAllGoldar();

			$pdf = new FPDF('p','mm','A4');
			// membuat halaman baru
			$pdf->AddPage();
			// setting jenis font yang akan digunakan
			$pdf->SetFont('Arial','B',14);
			// mencetak string 
			$pdf->Cell(190,7,'LAPORAN GOLONGAN DARAH',0,1,'C');
			 
			// Memberikan space kebawah agar tidak terlalu rapat
			$pdf->Cell(10,7,'',0,1);
			 
			$pdf->SetFont('Arial','B',10);
			$pdf->Cell(85,6,'GOLONGAN DARAH',1);
			$pdf->Cell(30,6,'JUMLAH TOTAL MASYARAKAT',1);
			$pdf->Cell(30,6,'PRESENTASI JUMLAH MASYARAKAT',1);
			$pdf->Cell(15,6,'JUMLAH LAKI-LAKI',1);
			$pdf->Cell(25,6,'PRESENTASI JUMLAH LAKI-LAKI',1);
			$pdf->Cell(15,6,'JUMLAH PEREMPUAN',1);
			$pdf->Cell(25,6,'PRESENTASI JUMLAH PEREMPUAN',1);
			$pdf->Ln();
			$pdf->SetFont('Arial','',10);
			 
			foreach($data['goldar'] as $row)
			{
				$pdf->Cell(85,6,$row['kategori_id'],1);
				$pdf->Cell(30,6,$row['jumlah_total'],1);
				$pdf->Cell(30,6,$row['persen_total'],1);
				$pdf->Cell(15,6,$row['jumlah_laki'],1); 
				$pdf->Cell(25,6,$row['persen_laki'],1);
				$pdf->Cell(15,6,$row['jumlah_perempuan'],1);
				$pdf->Cell(25,6,$row['persen_perempuan'],1);
				$pdf->Ln(); 
			}
			
			$pdf->Output('D', 'Laporan Golongan Darah.pdf', true);

	}
	public function cari()
	{
		$data['title'] = 'Data Golongan Darah';
		$data['goldar'] = $this->model('GoldarModel')->cariGoldar();
		$data['key'] = $_POST['key'];
		$this->view('templates/header', $data);
		$this->view('templates/sidebar', $data);
		$this->view('goldar/index', $data);
		$this->view('templates/footer');
	}

	public function edit($id){

		$data['title'] = 'Detail Golongan Darah';
		$data['kategori'] = $this->model('KategoriModel')->getAllKategori();
		$data['goldar'] = $this->model('GoldarModel')->getGoldarById($id);
		$this->view('templates/header', $data);
		$this->view('templates/sidebar', $data);
		$this->view('goldar/edit', $data);
		$this->view('templates/footer');
	}

	public function tambah(){
		$data['title'] = 'Tambah Golongan Darah';		
		$data['kategori'] = $this->model('KategoriModel')->getAllKategori();		
		$this->view('templates/header', $data);
		$this->view('templates/sidebar', $data);
		$this->view('goldar/create', $data);
		$this->view('templates/footer');
	}

	public function simpanGoldar(){		

		if( $this->model('GoldarModel')->tambahGoldar($_POST) > 0 ) {
			Flasher::setMessage('Berhasil','ditambahkan','success');
			header('location: '. base_url . '/goldar');
			exit;			
		}else{
			Flasher::setMessage('Gagal','ditambahkan','danger');
			header('location: '. base_url . '/goldar');
			exit;	
		}
	}

	public function updateGoldar(){	
		if( $this->model('GoldarModel')->updateDataGoldar($_POST) > 0 ) {
			Flasher::setMessage('Berhasil','diupdate','success');
			header('location: '. base_url . '/goldar');
			exit;			
		}else{
			Flasher::setMessage('Gagal','diupdate','danger');
			header('location: '. base_url . '/goldar');
			exit;	
		}
	}

	public function hapus($id){
		if( $this->model('GoldarModel')->deleteGoldar($id) > 0 ) {
			Flasher::setMessage('Berhasil','dihapus','success');
			header('location: '. base_url . '/goldar');
			exit;			
		}else{
			Flasher::setMessage('Gagal','dihapus','danger');
			header('location: '. base_url . '/goldar');
			exit;	
		}
	}
}