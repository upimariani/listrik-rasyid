<!-- Shop Details Section Begin -->
<section class="shop-details">
	<div class="product__details__pic">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="product__details__breadcrumb">
						<a href="./index.html">Home</a>
						<a href="./shop.html">Shop</a>
						<span>Product Details</span>
					</div>
				</div>
			</div>

		</div>
	</div>
	<div class="product__details__content">
		<div class="container">
			<div class="row d-flex justify-content-center">
				<div class="col-lg-4">
					<div class="product__details__pic__item">
						<img src="<?= base_url('asset/produk/' . $detail->foto) ?>" alt="">
					</div>
				</div>
				<div class="col-lg-8">
					<div class="product__details__text">
						<h4><?= $detail->nama_produk ?></h4>
						<p>Stok : <?= $detail->stok ?></p>

						<h3>Rp. <?= number_format($detail->harga) ?></h3>
						<p><?= $detail->deskripsi ?></p>
						<?php
						if ($this->session->userdata('id_pelanggan')) {
						?>
							<form action="<?= base_url('Pelanggan/cKatalog/addtocart_detail/' . $detail->id_produk) ?>" method="POST">
								<div class="product__details__cart__option">
									<div class="quantity">
										<div class="pro-qty">
											<input type="number" name="qty" min="1" value="1">
										</div>
									</div>
									<button type="submit" class="primary-btn">add to cart</button>
								</div>
							</form>
						<?php
						}
						?>

					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-12">
					<div class="product__details__tab">
						<ul class="nav nav-tabs" role="tablist">

							<li class="nav-item">
								<a class="nav-link active" data-toggle="tab" href="#tabs-6" role="tab">
									Ulasan Pelanggan</a>
							</li>
						</ul>
						<div class="tab-content">
							<?php
							$review = $this->db->query("SELECT * FROM `detail_tran` JOIN transaksi ON detail_tran.id_transaksi=transaksi.id_transaksi JOIN produk ON produk.id_produk=detail_tran.id_produk JOIN pelanggan ON pelanggan.id_pelanggan=transaksi.id_pelanggan JOIN penilaian ON penilaian.id_transaksi=transaksi.id_transaksi WHERE produk.id_produk='" . $detail->id_produk . "'")->result();
							?>
							<div class="tab-pane active" id="tabs-6" role="tabpanel">
								<div class="product__details__tab__content">
									<div class="product__details__tab__content__item">
										<?php
										foreach ($review as $key => $value) {
										?>
											<h5><?= $value->nama_pelanggan ?> <small><?= $value->time ?></small></h5>
											<div class="rating">
												<?php
												for ($i = 0; $i < $value->rating; $i++) {
												?>
													<i class="fa fa-star checked"></i>
												<?php
												}
												?>
											</div>

											<p><?= $value->review ?></p>
											<hr>
										<?php
										}
										?>


									</div>

									<div class="product__details__tab__content__item">

									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- Shop Details Section End -->