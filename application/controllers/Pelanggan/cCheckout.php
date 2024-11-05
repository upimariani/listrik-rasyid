<?php
defined('BASEPATH') or exit('No direct script access allowed');

class cCheckout extends CI_Controller
{

	public function index()
	{
		$this->load->view('Pelanggan/Layouts/head');
		$this->load->view('Pelanggan/Layouts/header');
		$this->load->view('Pelanggan/vCheckout');
	}
	public function cod()
	{
		$data = array(
			'id_pelanggan' => $this->session->userdata('id_pelanggan'),
			'id_kupon' => $this->input->post('kupon'),
			'tgl_transaksi' => date('Y-m-d'),
			'total_transaksi' => $this->cart->total(),
			'total_pembayaran' => $this->cart->total(),
			'ongkir' => '0',
			'stat_transaksi' => '0',
			'bukti_payment' => '0',
			'metode_pembayaran' => $this->input->post('pembayaran'),
			'metode_pengiriman' => '1',
			'alamat_pengiriman' => 'COD'
		);
		$this->db->insert('transaksi', $data);



		//mengurangi stok produk
		foreach ($this->cart->contents() as $key => $value) {
			$produk = $this->db->query("SELECT * FROM `produk` WHERE id_produk='" . $value['id'] . "'")->row();
			$ss = $produk->stok;
			$qty = $value['qty'];
			$st = $ss - $qty;

			$dt_stok = array(
				'stok' => $st
			);
			$this->db->where('id_produk', $produk->id_produk);
			$this->db->update('produk', $dt_stok);
		}

		//detail obat
		$id = $this->db->query("SELECT MAX(id_transaksi) as id_transaksi FROM `transaksi`")->row();
		foreach ($this->cart->contents() as $key => $value) {
			$item = array(
				'id_transaksi' => $id->id_transaksi,
				'id_produk' => $value['id'],
				'qty' => $value['qty']
			);
			$this->db->insert('detail_tran', $item);
		}
		$this->cart->destroy();
		$this->session->set_flashdata('success', 'Anda berhasil melakukan transaksi!');
		redirect('Pelanggan/cKatalog');
	}
	public function order()
	{
		$data = array(
			'id_pelanggan' => $this->session->userdata('id_pelanggan'),
			'id_kupon' => $this->input->post('kupon'),
			'tgl_transaksi' => date('Y-m-d'),
			'total_transaksi' => $this->cart->total(),
			'total_pembayaran' => $this->input->post('total_bayar'),
			'ongkir' => $this->input->post('ongkir'),
			'stat_transaksi' => '0',
			'bukti_payment' => '0',
			'metode_pembayaran' => $this->input->post('pembayaran'),
			'metode_pengiriman' => '2',
			'alamat_pengiriman' => 'Kota ' . $this->input->post('kota') . ' Prov. ' . $this->input->post('provinsi') . 'Expedisi. ' . $this->input->post('expedisi') . $this->input->post('paket')
		);
		$this->db->insert('transaksi', $data);



		//mengurangi stok produk
		foreach ($this->cart->contents() as $key => $value) {
			$produk = $this->db->query("SELECT * FROM `produk` WHERE id_produk='" . $value['id'] . "'")->row();
			$ss = $produk->stok;
			$qty = $value['qty'];
			$st = $ss - $qty;

			$dt_stok = array(
				'stok' => $st
			);
			$this->db->where('id_produk', $produk->id_produk);
			$this->db->update('produk', $dt_stok);
		}

		//detail obat
		$id = $this->db->query("SELECT MAX(id_transaksi) as id_transaksi FROM `transaksi`")->row();
		foreach ($this->cart->contents() as $key => $value) {
			$item = array(
				'id_transaksi' => $id->id_transaksi,
				'id_produk' => $value['id'],
				'qty' => $value['qty']
			);
			$this->db->insert('detail_tran', $item);
		}
		$this->cart->destroy();
		$this->session->set_flashdata('success', 'Anda berhasil melakukan transaksi!');
		redirect('Pelanggan/cKatalog');
	}
}

/* End of file cCheckout.php */
