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
			$level = $dt->level_user;

			$array = array(
				'id_user' => $dt->id_user
			);

			$this->session->set_userdata($array);

			if ($level == '1') {
				redirect('Admin/cDashboard');
			} else if ($level == '2') {
				redirect('Pemilik/cDashboard');
			}
		} else {
			$this->session->set_flashdata('error', 'Username dan Password Anda Salah!');
			redirect('cLogin');
		}
	}
	public function logout()
	{
		$this->session->unset_userdata('id_user');
		$this->session->set_flashdata('success', 'Anda berhasil logout!');
		redirect('cLogin');
	}
}

/* End of file cLogin.php */
