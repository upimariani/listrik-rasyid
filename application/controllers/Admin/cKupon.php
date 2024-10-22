<?php
defined('BASEPATH') or exit('No direct script access allowed');

class cKupon extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('mKupon');
	}

	public function index()
	{
		$data = array(
			'kupon' => $this->mKupon->select()
		);
		$this->load->view('Admin/Layouts/head');
		$this->load->view('Admin/Layouts/navbar');
		$this->load->view('Admin/Layouts/aside');
		$this->load->view('Admin/Kupon/vKupon', $data);
		$this->load->view('Admin/Layouts/footer');
	}
	public function create()
	{
		$data = array(
			'nama_kupon' => $this->input->post('nama'),
			'deskripsi_kupon' => $this->input->post('deskripsi'),
			'potongan_harga' => $this->input->post('potongan'),
		);
		$this->mKupon->insert($data);
		$this->session->set_flashdata('success', 'Data Kupon berhasil disimpan!');
		redirect('Admin/cKupon');
	}
	public function update($id)
	{
		$data = array(
			'nama_kupon' => $this->input->post('nama'),
			'deskripsi_kupon' => $this->input->post('deskripsi'),
			'potongan_harga' => $this->input->post('potongan'),
		);
		$this->mKupon->update($id, $data);
		$this->session->set_flashdata('success', 'Data Kupon berhasil diperbaharui!');
		redirect('Admin/cKupon');
	}
	public function delete($id)
	{
		$this->mKupon->delete($id);
		$this->session->set_flashdata('success', 'Data Kupon berhasil dihapus!');
		redirect('Admin/cKupon');
	}
}

/* End of file cKupon.php */
