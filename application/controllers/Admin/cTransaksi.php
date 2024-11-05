<?php
defined('BASEPATH') or exit('No direct script access allowed');

class cTransaksi extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('mTransaksi');
		$this->load->model('mPesananSaya');
	}

	public function index()
	{
		$data = array(
			'transaksi' => $this->mTransaksi->transaksi()
		);
		$this->load->view('Admin/Layouts/head');
		$this->load->view('Admin/Layouts/navbar');
		$this->load->view('Admin/Layouts/aside');
		$this->load->view('Admin/Transaksi/vTransaksi', $data);
		$this->load->view('Admin/Layouts/footer');
	}
	public function detail($id)
	{
		$data = array(
			'transaksi' => $this->mPesananSaya->detail_pesanan($id)
		);
		$this->load->view('Admin/Layouts/head');
		$this->load->view('Admin/Layouts/navbar');
		$this->load->view('Admin/Layouts/aside');
		$this->load->view('Admin/Transaksi/vDetailTransaksi', $data);
		$this->load->view('Admin/Layouts/footer');
	}
	public function konfirmasi($id_transaksi, $pengiriman)
	{
		if ($pengiriman == '1') {
			$status = '3';
		} else {
			$status = '2';
		}

		$data = array(
			'stat_transaksi' => $status
		);
		$this->db->where('id_transaksi', $id_transaksi);
		$this->db->update('transaksi', $data);
		$this->session->set_flashdata('success', 'Transaksi berhasil dikonfirmasi!');
		redirect('Admin/cTransaksi');
	}
}

/* End of file cTransaksi.php */
