<?php
defined('BASEPATH') or exit('No direct script access allowed');

class cDiskon extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('mDiskon');
		$this->load->model('mProduk');
	}

	public function index()
	{
		$data = array(
			'diskon' => $this->mDiskon->select(),
			'produk' => $this->mProduk->select()
		);
		$this->load->view('Admin/Layouts/head');
		$this->load->view('Admin/Layouts/navbar');
		$this->load->view('Admin/Layouts/aside');
		$this->load->view('Admin/Diskon/vDiskon', $data);
		$this->load->view('Admin/Layouts/footer');
	}
	public function create()
	{
		$data = array(
			'id_produk' => $this->input->post('produk'),
			'nama_diskon' => $this->input->post('nama_diskon'),
			'diskon' => $this->input->post('besar')
		);
		$this->mDiskon->insert($data);
		$this->session->set_flashdata('success', 'Data Diskon Produk berhasil disimpan!');
		redirect('Admin/cDiskon');
	}
	public function update($id)
	{
		$data = array(
			'id_produk' => $this->input->post('produk'),
			'nama_diskon' => $this->input->post('nama_diskon'),
			'diskon' => $this->input->post('besar')
		);
		$this->mDiskon->update($id, $data);
		$this->session->set_flashdata('success', 'Data Diskon Produk berhasil diperbaharui!');
		redirect('Admin/cDiskon');
	}
	public function delete($id)
	{
		$this->mDiskon->delete($id);
		$this->session->set_flashdata('success', 'Data Diskon Produk berhasil dihapus!');
		redirect('Admin/cDiskon');
	}
}

/* End of file cDiskon.php */
