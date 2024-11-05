<?php
defined('BASEPATH') or exit('No direct script access allowed');

class cDashboard extends CI_Controller
{

	public function index()
	{
		$this->load->view('Pemilik/Layouts/head');
		$this->load->view('Pemilik/Layouts/navbar');
		$this->load->view('Pemilik/Layouts/aside');
		$this->load->view('Pemilik/vDashboard');
		$this->load->view('Pemilik/Layouts/footer');
	}
}

/* End of file cDashboard.php */
