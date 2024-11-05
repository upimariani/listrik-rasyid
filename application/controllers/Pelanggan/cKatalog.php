<?php
defined('BASEPATH') or exit('No direct script access allowed');

class cKatalog extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('mKatalog');
	}

	public function index()
	{
		$data = array(
			'kategori' => $this->mKatalog->kategori(),
			'produk' => $this->mKatalog->produk()
		);
		$this->load->view('Pelanggan/Layouts/head');
		$this->load->view('Pelanggan/Layouts/header');
		$this->load->view('Pelanggan/vKatalog', $data);
		$this->load->view('Pelanggan/Layouts/footer');
	}
	public function detail($id_produk)
	{
		$data = array(
			'detail' => $this->mKatalog->detail_produk($id_produk)
		);
		$this->load->view('Pelanggan/Layouts/head');
		$this->load->view('Pelanggan/Layouts/header');
		$this->load->view('Pelanggan/vDetailKatalog', $data);
		$this->load->view('Pelanggan/Layouts/footer');
	}

	//CART----------------------------
	public function add_cart($id_produk)
	{
		$produk = $this->db->query("SELECT *, produk.id_produk FROM `produk` LEFT JOIN diskon ON diskon.id_produk=produk.id_produk WHERE produk.id_produk='" . $id_produk . "'")->row();
		if ($produk->diskon) {
			$hrg = $produk->harga - (($produk->diskon / 100) * $produk->harga);
		} else {
			$hrg = $produk->harga;
		}

		$data = array(
			'id' => $produk->id_produk,
			'name' => $produk->nama_produk,
			'price' => $hrg,
			'qty' => '1',
			'stok' => $produk->stok,
			'picture' => $produk->foto
		);
		$this->cart->insert($data);
		$this->session->set_flashdata('success', 'Produk berhasil dimasukkan ke keranjang!');
		redirect('Pelanggan/cKatalog');
	}
	public function addtocart_detail($id_produk)
	{
		$produk = $this->db->query("SELECT *, produk.id_produk FROM `produk` LEFT JOIN diskon ON diskon.id_produk=produk.id_produk WHERE produk.id_produk='" . $id_produk . "'")->row();
		if ($produk->diskon) {
			$hrg = $produk->harga - (($produk->diskon / 100) * $produk->harga);
		} else {
			$hrg = $produk->harga;
		}

		$data = array(
			'id' => $produk->id_produk,
			'name' => $produk->nama_produk,
			'price' => $hrg,
			'qty' => $this->input->post('qty'),
			'stok' => $produk->stok,
			'picture' => $produk->foto
		);
		$this->cart->insert($data);
		$this->session->set_flashdata('success', 'Produk berhasil dimasukkan ke keranjang!');
		redirect('Pelanggan/cKatalog');
	}
	public function cart()
	{
		$this->load->view('Pelanggan/Layouts/head');
		$this->load->view('Pelanggan/Layouts/header');
		$this->load->view('Pelanggan/vCart');
		$this->load->view('Pelanggan/Layouts/footer');
	}
	public function delete($rowid)
	{
		$this->cart->remove($rowid);
		redirect('Pelanggan/cKatalog/cart');
	}
	public function update_cart()
	{
		$i = 1;
		foreach ($this->cart->contents() as $items) {
			$data = array(
				'rowid'  => $items['rowid'],
				'qty'    => $this->input->post($i . '[qty]')
			);
			$this->cart->update($data);
			$i++;
		}
		redirect('Pelanggan/cKatalog/cart');
	}
}

/* End of file cKatalog.php */
