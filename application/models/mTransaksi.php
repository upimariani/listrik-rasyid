<?php
defined('BASEPATH') or exit('No direct script access allowed');

class mTransaksi extends CI_Model
{
	public function transaksi()
	{
		return $this->db->query("SELECT * FROM `transaksi` JOIN pelanggan ON pelanggan.id_pelanggan=transaksi.id_pelanggan")->result();
	}
}

/* End of file mTransaksi.php */
