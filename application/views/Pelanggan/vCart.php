<!-- Breadcrumb Section Begin -->
<section class="breadcrumb-option">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div class="breadcrumb__text">
					<h4>Keranjang</h4>
					<div class="breadcrumb__links">
						<a href="#">Home</a>
						<a href="#">Belanja</a>
						<span>Keranjang</span>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- Breadcrumb Section End -->

<!-- Shopping Cart Section Begin -->
<section class="shopping-cart spad">
	<div class="container">
		<div class="row">
			<?php
			$qty = 0;
			foreach ($this->cart->contents() as $key => $value) {
				$qty += $value['qty'];
			}
			if ($qty != 0) {
			?>
				<div class="col-lg-8">
					<?php echo form_open('Pelanggan/cKatalog/update_cart'); ?>
					<div class="shopping__cart__table">
						<table>
							<thead>
								<tr>
									<th>Produk</th>
									<th>Jumlah</th>
									<th>Total</th>
									<th></th>
								</tr>
							</thead>
							<tbody>
								<?php
								$i = 1;
								foreach ($this->cart->contents() as $key => $value) {
								?>
									<tr>
										<td class="product__cart__item">
											<div class="product__cart__item__pic">
												<img style="width: 100px;" src="<?= base_url('asset/foto-obat/' . $value['picture']) ?>" alt="">
											</div>
											<div class="product__cart__item__text">
												<h6><?= $value['name'] ?></h6>
												<h5>Rp. <?= number_format($value['price']) ?></h5>
											</div>
										</td>
										<td class="quantity__item">
											<div class="quantity">
												<input class="form-control" type="number" size="2" name="<?= $i . '[qty]' ?>" min="1" max="<?= $value['stok'] ?>" value="<?= $value['qty'] ?>">

											</div>
										</td>
										<td class="cart__price">Rp. <?= number_format($value['qty'] * $value['price']) ?></td>
										<td class="cart__close"><a href="<?= base_url('Pelanggan/cKatalog/delete/' . $value['rowid']) ?>"><i class="fa fa-close"></i></a></td>
									</tr>
								<?php
									$i++;
								}
								?>


							</tbody>
						</table>
					</div>
					<div class="row">
						<div class="col-lg-6 col-md-6 col-sm-6">
							<div class="continue__btn">
								<a href="<?= base_url('Pelanggan/cKatalog') ?>">Tetap Belanja</a>
							</div>
						</div>
						<div class="col-lg-6 col-md-6 col-sm-6">
							<div class="continue__btn update__btn">
								<button type="submit" class="primary-btn" href="#"><i class="fa fa-spinner"></i> Perbaharui Keranjang</button>
							</div>
						</div>
					</div>
				</div>
				<div class="col-lg-4">

					<div class="cart__total">
						<h6>Total Keranjang</h6>
						<ul>
							<li>Subtotal <span>Rp. <?= number_format($this->cart->total()) ?></span></li>

						</ul>
						<a href="<?= base_url('Pelanggan/cCheckout') ?>" class="primary-btn mb-3">Pengiriman</a>

						<button type="button" class="primary-btn" data-toggle="modal" data-target="#exampleModal">
							AMBIL KE TOKO
						</button>


					</div>
					<?php echo form_close(); ?>
				</div>
			<?php
			} else {
			?>
				<h5>Silahkan lihat produk di katalog...</h5>
			<?php
			}
			?>


		</div>

	</div>
</section>
<!-- Shopping Cart Section End -->

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<form action="<?= base_url('Pelanggan/cCheckout/cod') ?>" method="POST">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Ambil Ke Toko</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<label>Metode Pembayaran</label>
					<div class="form-group">
						<select class="form-control" name="pembayaran">
							<option value="">---Pilih Metode Pembayaran---</option>
							<option value="1">DANA</option>
							<option value="2">OVO</option>
							<option value="3">Via Transfer Bank</option>
						</select>
					</div>
					<br>
					<hr>
					<?php
					//menampilkan kupon pelanggan
					$dt_kupon = $this->db->query("SELECT * FROM `kupon`")->result();
					if ($dt_kupon) {
					?>
						<h4 class="order__title">Kupon</h4>
						<p>Confirm Kupon anda jika ingin digunakan!</p>
						<?php
						foreach ($dt_kupon as $key => $value) {

						?>
							<h6 class="coupon__code">
								<div>
									<input type="radio" name="kupon" value="<?= $value->id_kupon ?>" />
									<label for="huey"><?= $value->nama_kupon ?> Rp. <?= number_format($value->potongan_harga) ?></label>
									<small class="text-danger"><?= $value->deskripsi_kupon ?></small>
								</div>
							</h6>

					<?php
						}
					}
					?>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-warning">Save changes</button>
				</div>
			</div>
		</form>
	</div>
</div>
