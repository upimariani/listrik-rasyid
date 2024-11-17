<?php
defined('BASEPATH') or exit('No direct script access allowed');

class cDashboard extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('mChat');
	}

	public function index()
	{
		$this->load->view('Admin/Layouts/head');
		$this->load->view('Admin/Layouts/navbar');
		$this->load->view('Admin/Layouts/aside');
		$this->load->view('Admin/vDashboard');
		$this->load->view('Admin/Layouts/footer');
	}
	public function chat($id_pelanggan)
	{
		//notif dihilangkan
		$a = '0';
		$stat = array(
			'status' => '1'
		);
		$this->db->where('id_pelanggan', $id_pelanggan);
		$this->db->where('admin_send', $a);
		$this->db->update('chatting', $stat);


		$data = array(
			'chat' => $this->mChat->view_chat($id_pelanggan),
			'id_pelanggan' => $id_pelanggan
		);
		$this->load->view('Admin/Layouts/head');
		$this->load->view('Admin/Layouts/navbar');
		$this->load->view('Admin/Layouts/aside');
		$this->load->view('Admin/vViewChat', $data);
		$this->load->view('Admin/Layouts/footer');
	}
	public function send($id_pelanggan)
	{
		$data = array(
			'id_pelanggan' => $id_pelanggan,
			'id_user' => '1',
			'admin_send' => $this->input->post('message')
		);
		$this->db->insert('chatting', $data);
		$this->session->set_flashdata('success', 'Pesan Berhasil dikirim!');
		redirect('Admin/cDashboard/chat/' . $id_pelanggan);
	}
	public function detail_penilaian()
	{
		$data = array(
			'penilaian' => $this->db->query("SELECT * FROM `penilaian` JOIN transaksi ON penilaian.id_transaksi=transaksi.id_transaksi JOIN detail_tran ON detail_tran.id_transaksi=transaksi.id_transaksi JOIN produk ON produk.id_produk=detail_tran.id_produk JOIN pelanggan ON pelanggan.id_pelanggan=transaksi.id_pelanggan")->result()
		);
		$this->load->view('Admin/Layouts/head');
		$this->load->view('Admin/Layouts/navbar');
		$this->load->view('Admin/Layouts/aside');
		$this->load->view('Admin/vDetailPenilaian', $data);
		$this->load->view('Admin/Layouts/footer');
	}
}

/* End of file cDashboard.php */
