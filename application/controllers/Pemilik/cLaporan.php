<?php
defined('BASEPATH') or exit('No direct script access allowed');

class cLaporan extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('mTransaksi');
	}
	public function index()
	{
		$data = array(
			'transaksi' => $this->mTransaksi->transaksi()
		);
		$this->load->view('Pemilik/Layouts/head');
		$this->load->view('Pemilik/Layouts/navbar');
		$this->load->view('Pemilik/Layouts/aside');
		$this->load->view('Pemilik/vLaporan', $data);
		$this->load->view('Pemilik/Layouts/footer');
	}
	public function cetak()
	{
		require('asset/fpdf/fpdf.php');

		// intance object dan memberikan pengaturan halaman PDF
		$pdf = new FPDF('P', 'mm', 'A4');
		$pdf->AddPage();


		$pdf->SetFont('Times', 'B', 14);
		// $pdf->Image('asset/logosmp.png', 3, 3, 40);
		$pdf->Cell(200, 5, 'LISTRIK RASYID SYIDIQ', 0, 1, 'C');
		$pdf->SetFont('Times', '', 10);
		$pdf->Cell(200, 20, 'Kuningan, Jawa Barat', 0, 0, 'C');

		$pdf->SetLineWidth(1);
		$pdf->Line(10, 43, 200, 43);
		$pdf->SetLineWidth(0);
		$pdf->Line(10, 42, 200, 42);
		$pdf->Cell(10, 30, '', 0, 1);

		$pdf->SetFont('Times', 'B', 14);
		$pdf->Cell(190, 10, 'LAPORAN TRANSAKSI PELANGGAN', 0, 1, 'C');


		$pdf->Cell(10, 15, '', 0, 1);
		$pdf->SetFont('Times', 'B', 9);
		$pdf->Cell(10, 7, 'No', 1, 0, 'C');
		$pdf->Cell(45, 7, 'Tanggal', 1, 0, 'C');
		$pdf->Cell(40, 7, 'Nama Pelanggan', 1, 0, 'C');
		$pdf->Cell(35, 7, 'Metode Pembayaran', 1, 0, 'C');
		$pdf->Cell(60, 7, 'Total Pembayaran', 1, 1, 'C');

		$pdf->SetFont('Times', '', 9);
		$no = 1;
		$tot = 0;
		$bulan = $this->input->post('bulan');
		$tahun = $this->input->post('tahun');
		$dt = $this->db->query("SELECT * FROM `transaksi` JOIN pelanggan ON transaksi.id_pelanggan=pelanggan.id_pelanggan WHERE stat_transaksi='3' AND MONTH(tgl_transaksi) = '" . $bulan . "' AND YEAR(tgl_transaksi)='" . $tahun . "'")->result();
		foreach ($dt as $key => $value) {
			if ($value->metode_pembayaran == '1') {
				$mtd = 'DANA';
			} else {
				$mtd = 'OVO';
			}
			$tot += $value->total_pembayaran;
			$pdf->Cell(10, 7, $no++, 1, 0, 'C');
			$pdf->Cell(45, 7, $value->tgl_transaksi, 1, 0, 'C');
			$pdf->Cell(40, 7, $value->nama_pelanggan, 1, 0, 'C');
			$pdf->Cell(35, 7, $mtd, 1, 0, 'C');
			$pdf->Cell(60, 7, 'Rp.' . number_format($value->total_pembayaran), 1, 1, 'R');
		}


		$pdf->SetFont('Times', 'B', 12);
		$pdf->Cell(190, 7, 'Jumlah: Rp.' . number_format($tot), 1, 1, 'R');

		$pdf->SetFont('Times', '', 9);
		$pdf->Cell(40, 7, '', 0, 1, 'C');
		$pdf->Cell(40, 7, '', 0, 1, 'C');



		$pdf->Cell(95, 7, 'Kuningan, ' . date('j F Y'), 0, 1, 'C');

		$pdf->Cell(95, 7, 'Pemilik Listrik Rasyid Syidiq', 0, 1, 'C');
		$pdf->Cell(95, 10, '', 0, 1, 'C');

		$pdf->SetFont('Times', 'B', 9);

		$pdf->Cell(95, 7, '(....................)', 0, 0, 'C');

		$pdf->Output();
	}
}

/* End of file cLaporan.php */
