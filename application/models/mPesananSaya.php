<?php
defined('BASEPATH') or exit('No direct script access allowed');

class mPesananSaya extends CI_Model
{
	public function transaksi($id_pelanggan)
	{
		return $this->db->query("SELECT * FROM `transaksi` JOIN pelanggan ON transaksi.id_pelanggan=pelanggan.id_pelanggan WHERE pelanggan.id_pelanggan='" . $id_pelanggan . "' ORDER BY id_transaksi DESC")->result();
	}
	public function detail_pesanan($id_transaksi)
	{
		$data['produk'] = $this->db->query("SELECT * FROM `transaksi` JOIN detail_tran ON transaksi.id_transaksi=detail_tran.id_transaksi JOIN produk ON produk.id_produk=detail_tran.id_produk WHERE transaksi.id_transaksi='" . $id_transaksi . "'")->result();
		$data['pelanggan'] = $this->db->query("SELECT *, transaksi.id_transaksi FROM `transaksi` JOIN pelanggan ON transaksi.id_pelanggan=pelanggan.id_pelanggan LEFT JOIN penilaian ON penilaian.id_transaksi=transaksi.id_transaksi WHERE transaksi.id_transaksi='" . $id_transaksi . "'")->row();
		return $data;
	}
}

/* End of file mPesananSaya.php */
