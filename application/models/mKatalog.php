<?php
defined('BASEPATH') or exit('No direct script access allowed');

class mKatalog extends CI_Model
{
	public function kategori()
	{
		return $this->db->query("SELECT * FROM `produk` GROUP by kategori_produk")->result();
	}
	public function produk()
	{
		return $this->db->query("SELECT * FROM `produk` ")->result();
	}
	public function detail_produk($id)
	{
		return $this->db->query("SELECT * FROM `produk` WHERE id_produk='" . $id . "'")->row();
	}
}

/* End of file mKatalog.php */
