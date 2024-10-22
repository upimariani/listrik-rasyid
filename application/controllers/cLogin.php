<?php
defined('BASEPATH') or exit('No direct script access allowed');

class cLogin extends CI_Controller
{

	public function index()
	{
		$this->load->view('vLogin');
	}
	public function login()
	{
		$username = $this->input->post('username');
		$password = $this->input->post('password');

		$dt = $this->db->query("SELECT * FROM `user` WHERE username='" . $username . "' AND password='" . $password . "'")->row();
		if ($dt) {
			$level = $dt->lev_user;

			$array = array(
				'id_user' => $dt->id_user
			);

			$this->session->set_userdata($array);

			if ($level == '1') {
				redirect('Admin/cDashboard');
			} else if ($level == '2') {
				redirect('Gudang/cDashboard');
			} else if ($level == '3') {
				redirect('Supplier/cPemesanan');
			} else if ($level == '4') {
				redirect('Pemilik/cDashboard');
			}
		} else {
			$dt_reseller = $this->db->query("SELECT * FROM `reseller` WHERE username='" . $username . "' AND password='" . $password . "'")->row();
			if ($dt_reseller) {

				$array = array(
					'id_reseller' => $dt_reseller->id_reseller
				);

				$this->session->set_userdata($array);

				redirect('Reseller/cProfile');
			} else {
				$this->session->set_flashdata('error', 'Username dan Password Anda Salah!');
				redirect('cLogin');
			}
		}
	}
	public function logout()
	{
		$this->session->unset_userdata('id_user');
		$this->session->unset_userdata('id_reseller');
		$this->cart->destroy();
		$this->session->set_flashdata('success', 'Anda berhasil logout!');
		redirect('cLogin');
	}
	public function registrasi()
	{
		$this->load->view('vRegistrasi');
	}
	public function regist()
	{
		$data = array(
			'nama_reseller' => $this->input->post('nama'),
			'alamat' => $this->input->post('alamat'),
			'no_hp' => $this->input->post('no_hp'),
			'username' => $this->input->post('username'),
			'password' => $this->input->post('password')
		);
		$this->db->insert('reseller', $data);
		$this->session->set_flashdata('success', 'Reseller berhasil registrasi! Silahkan login!');
		redirect('cLogin');
	}
}

/* End of file cLogin.php */
