<!-- Breadcrumb Section Begin -->
<section class="breadcrumb-option">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div class="breadcrumb__text">
					<h4>Pengiriman</h4>
					<div class="breadcrumb__links">
						<a href="./index.html">Home</a>
						<a href="./shop.html">Belanja</a>
						<span>Pengiriman</span>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- Breadcrumb Section End -->

<!-- Checkout Section Begin -->
<section class="checkout spad">
	<div class="container">
		<div class="checkout__form">
			<form action="<?= base_url('Pelanggan/cCheckout/order') ?>" method="POST">
				<div class="row">
					<div class="col-lg-8 col-md-6">

						<?php
						$dt_pelanggan = $this->db->query("SELECT * FROM `pelanggan` WHERE id_pelanggan='" . $this->session->userdata('id_pelanggan') . "'")->row();

						?>

						<h6 class="checkout__title">Billing Details</h6>
						<div class="row">
							<div class="col-lg-6">
								<div class="checkout__input">
									<p>Nama<span>*</span></p>
									<input value="<?= $dt_pelanggan->nama_pelanggan ?>" type="text" readonly>
								</div>
							</div>
							<div class="col-lg-6">
								<div class="checkout__input">
									<p>Alamat<span>*</span></p>
									<input name="alamat" value="<?= $dt_pelanggan->alamat ?>" type="text" required>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-lg-6">
								<div class="checkout__input">
									<p>Provinsi<span>*</span></p>
									<select name="provinsi" class="form-control" required>

									</select>
								</div>
							</div>
							<div class="col-lg-6">
								<div class="checkout__input">
									<p>Kota<span>*</span></p>
									<select name="kota" class="form-control mb-4" required>

									</select>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-lg-6">
								<div class="checkout__input">
									<p>Expedisi<span>*</span></p>
									<select name="expedisi" class="form-control mb-4" required>

									</select>
								</div>
							</div>
							<div class="col-lg-6">
								<div class="checkout__input">
									<p>Paket<span>*</span></p>
									<select name="paket" class="form-control mb-4" required>

									</select>
								</div>
							</div>


							<div class="col-lg-12">
								<h5 class="checkout__title">Pembayaran</h5>
								<label>Metode Pembayaran</label>
								<div class="form-group">
									<select class="form-control" name="pembayaran" required>
										<option value="">---Pilih Metode Pembayaran---</option>
										<option value="1">DANA</option>
										<option value="2">OVO</option>
									</select>
								</div>
							</div>
						</div>
					</div>
					<div class="col-lg-4 col-md-6">
						<div class="checkout__order">
							<h4 class="order__title">Order Pelanggan</h4>
							<div class="checkout__order__products">Total <span>Produk</span></div>
							<ul class="checkout__total__products">
								<?php
								foreach ($this->cart->contents() as $key => $value) {
								?>
									<li><?= $value['qty'] ?> x <?= $value['name'] ?><span>Rp. <?= number_format($value['qty'] * $value['price']) ?></span></li>
								<?php
								}
								?>

							</ul>
							<ul class="checkout__total__all">
								<li>Subtotal <span>Rp. <?= number_format($this->cart->total()) ?></span></li>
								<li>Ongkir <span id="ongkir"></span></li>
								<!-- <li>Diskon (-) <span id="diskon"></span></li> -->
								<li>Total <span id="total_bayar"></span></li>
							</ul>

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


							<button type="submit" class="site-btn">PESAN</button>
						</div>
					</div>
				</div>
				<input type="hidden" name="estimasi">
				<input type="hidden" name="ongkir">
				<input type="hidden" name="total_bayar">
				<input type="hidden" name="tot_diskon">
				<input type="hidden" name="diskon">

			</form>
		</div>
	</div>
</section>


<!-- Js Plugins -->
<script src="<?= base_url('asset/malefashion-master/') ?>js/jquery-3.3.1.min.js"></script>
<script src="<?= base_url('asset/malefashion-master/') ?>js/bootstrap.min.js"></script>
<!-- <script src="<?= base_url('asset/malefashion-master/') ?>js/jquery.nice-select.min.js"></script>
	<script src="<?= base_url('asset/malefashion-master/') ?>js/jquery.nicescroll.min.js"></script>
	<script src="<?= base_url('asset/malefashion-master/') ?>js/jquery.magnific-popup.min.js"></script>
	<script src="<?= base_url('asset/malefashion-master/') ?>js/jquery.countdown.min.js"></script>
	<script src="<?= base_url('asset/malefashion-master/') ?>js/jquery.slicknav.js"></script>
	<script src="<?= base_url('asset/malefashion-master/') ?>js/mixitup.min.js"></script>
	<script src="<?= base_url('asset/malefashion-master/') ?>js/owl.carousel.min.js"></script> -->
<script src="<?= base_url('asset/malefashion-master/') ?>js/main.js"></script>
<script>
	$(document).ready(function() {
		$.ajax({
			type: "POST",
			url: "http://localhost/listrik-rasyid/Pelanggan/Ongkir/provinsi",
			success: function(hasil_provinsi) {
				console.log(hasil_provinsi);
				$("select[name=provinsi]").html(hasil_provinsi);
			}
		});
		$("select[name=provinsi]").on("change", function() {
			var id_provinsi_terpilih = $("option:selected", this).attr("id_provinsi");
			$.ajax({
				type: "POST",
				url: "http://localhost/listrik-rasyid/pelanggan/ongkir/kota",
				data: 'id_provinsi=' + id_provinsi_terpilih,
				success: function(hasil_kota) {
					$("select[name=kota]").html(hasil_kota);
				}
			});
		});

		$("select[name=kota]").on("change", function() {
			$.ajax({
				type: "POST",
				url: "http://localhost/listrik-rasyid/pelanggan/ongkir/expedisi",
				success: function(hasil_expedisi) {
					$("select[name=expedisi]").html(hasil_expedisi);
				}
			});
		});


		$("select[name=expedisi]").on("change", function() {
			//mendapatkan expedisi terpilih
			var expedisi_terpilih = $("select[name=expedisi]").val()

			//mendapatkan id kota tujuan terpilih
			var id_kota_tujuan_terpilih = $("option:selected", "select[name=kota]").attr('id_kota');

			//alert(total_berat);
			$.ajax({
				type: "POST",
				url: "http://localhost/listrik-rasyid/pelanggan/ongkir/paket",
				data: 'expedisi=' + expedisi_terpilih + '&id_kota=' + id_kota_tujuan_terpilih + '&berat=1000',
				success: function(hasil_paket) {
					$("select[name=paket]").html(hasil_paket);
				}
			});
		});


		$("select[name=paket]").on("change", function() {
			//menampilkan ongkir
			var dataongkir = $("option:selected", this).attr('ongkir');
			var reverse = dataongkir.toString().split('').reverse().join(''),
				ribuan_ongkir = reverse.match(/\d{1,3}/g);
			ribuan_ongkir = ribuan_ongkir.join(',').split('').reverse().join('');
			//alert(dataongkir);
			$("#ongkir").html("Rp. " + ribuan_ongkir)
			//menghitung total bayar
			var ongkir = $("option:selected", this).attr('ongkir');
			var total_bayar = parseInt(ongkir) + parseInt(<?= $this->cart->total() ?>);

			// //pelanggan istimewa
			var level = $("#level_member").val();
			if (level == '2') {
				var disc = Math.round(10 / 100 * parseInt(total_bayar), 0);
				var tot_disc = parseInt(total_bayar) - (10 / 100 * parseInt(total_bayar));
			} else if (level == '1') {
				var disc = Math.round(15 / 100 * parseInt(total_bayar, 0));
				var tot_disc = parseInt(total_bayar) - (15 / 100 * parseInt(total_bayar));
			} else {
				var disc = 0;
				var tot_disc = total_bayar;
			}


			var diskon = disc.toString().split('').reverse().join(''),
				ribuan_totdiskon = diskon.match(/\d{1,3}/g);
			ribuan_totdiskon = ribuan_totdiskon.join(',').split('').reverse().join('');
			$("#diskon").html("Rp. " + ribuan_totdiskon);

			var reverse2 = tot_disc.toString().split('').reverse().join(''),
				ribuan_total = reverse2.match(/\d{1,3}/g);
			ribuan_total = ribuan_total.join(',').split('').reverse().join('');
			$("#total_bayar").html("Rp. " + ribuan_total);

			//estimasi dan ongkir
			var estimasi = $("option:selected", this).attr('estimasi');
			$("input[name=estimasi]").val(estimasi);
			$("input[name=ongkir]").val(dataongkir);
			$("input[name=total_bayar]").val(tot_disc);
			$("input[name=tot_diskon]").val(tot_disc);
			$("input[name=diskon]").val(disc);
		});

	});
</script>
</body>

</html>
