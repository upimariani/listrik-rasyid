<body>
	<!-- Page Preloder -->
	<div id="preloder">
		<div class="loader"></div>
	</div>

	<!-- Offcanvas Menu Begin -->
	<div class="offcanvas-menu-overlay"></div>
	<div class="offcanvas-menu-wrapper">
		<div class="offcanvas__option">
			<div class="offcanvas__links">
				<a href="#">Sign in</a>
			</div>

		</div>
		<div class="offcanvas__nav__option">
			<a href="#" class="search-switch"><img src="<?= base_url('asset/malefashion-master/') ?>img/icon/search.png" alt=""></a>
			<a href="#"><img src="img/icon/heart.png" alt=""></a>
			<a href="#"><img src="img/icon/cart.png" alt=""> <span>0</span></a>
			<div class="price">$0.00</div>
		</div>
		<div id="mobile-menu-wrap"></div>
		<div class="offcanvas__text">
			<p>Free shipping, 30-day return or refund guarantee.</p>
		</div>
	</div>
	<!-- Offcanvas Menu End -->

	<!-- Header Section Begin -->
	<header class="header">
		<div class="header__top">
			<div class="container">
				<div class="row">
					<div class="col-lg-6 col-md-7">
						<div class="header__top__left">
							<?php
							if ($this->session->userdata('id_pelanggan') == '') {
							?>
								<p>Halo Pelanggan! Silahkan melakukan login terlebih dahulu</p>
							<?php
							} else {
							?>
								<?php
								$dt_pelanggan = $this->db->query("SELECT * FROM `pelanggan` WHERE id_pelanggan='" . $this->session->userdata('id_pelanggan') . "'")->row();
								?>
								<p>Selamat Datang <strong><?= $dt_pelanggan->nama_pelanggan ?></strong> </p>


							<?php
							}
							?>

						</div>
					</div>
					<div class="col-lg-6 col-md-5">
						<div class="header__top__right">
							<div class="header__top__links">
								<?php
								if (!$this->session->userdata('id_pelanggan')) {
								?><a href="<?= base_url('Pelanggan/cLogin') ?>">Sign in</a>

								<?php
								} else {
								?>
									<a href="<?= base_url('Pelanggan/cLogin/logout') ?>">Logout</a>
								<?php
								}
								?>

							</div>

						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="container">
			<div class="row">
				<div class="col-lg-3 col-md-3">
					<div class="header__logo">
						<a href="./index.html"><img src="img/logo.png" alt=""></a>
					</div>
				</div>
				<div class="col-lg-6 col-md-6">
					<nav class="header__menu mobile-menu">
						<ul>
							<li class="active"><a href="<?= base_url('Pelanggan/cKatalog') ?>">Home</a></li>
							<?php
							if ($this->session->userdata('id_pelanggan') != '') {
								$notif_transaksi = $this->db->query("SELECT COUNT(id_transaksi) as notif FROM `transaksi` WHERE stat_transaksi='0' AND id_pelanggan='" . $this->session->userdata('id_pelanggan') . "'")->row();
							?>

								<li><a href="<?= base_url('Pelanggan/cPesananSaya') ?>">Pesanan Saya <?php if ($notif_transaksi->notif != '0') {
																										?>
											<span class="badge badge-danger"><?= $notif_transaksi->notif ?></span>
										<?php
																										} ?></a></li>

								<li><a href="<?= base_url('Pelanggan/cChat') ?>">Pesan
										<?php
										$notif = $this->db->query("SELECT COUNT(id_chatting) as jml FROM `chatting` WHERE id_pelanggan='" . $dt_pelanggan->id_pelanggan . "' AND status='0' AND pelanggan_send is NULL")->row();
										if ($notif->jml != '0') {
										?>
											<span class="badge badge-success"><?= $notif->jml ?></span>
										<?php
										}
										?></a></li>
								<li><a href="<?= base_url('Pelanggan/cProfil') ?>">Profil</a></li>
							<?php
							}
							?>

						</ul>
					</nav>
				</div>
				<div class="col-lg-3 col-md-3">
					<?php
					$qty = 0;
					foreach ($this->cart->contents() as $key => $value) {
						$qty += $value['qty'];
					}
					if ($qty != 0) {
					?>
						<div class="header__nav__option">
							<?php
							$qty = 0;
							foreach ($this->cart->contents() as $key => $value) {
								$qty += $value['qty'];
							}
							?>
							<a href="<?= base_url('Pelanggan/cKatalog/cart') ?>"><img src="<?= base_url('asset/malefashion-master/') ?>img/icon/cart.png" alt=""> <span><?= $qty ?></span></a>
							<div class="price">Rp. <?= number_format($this->cart->total())  ?></div>
						</div>
					<?php
					}
					?>

				</div>
			</div>
			<div class="canvas__open"><i class="fa fa-bars"></i></div>
		</div>
	</header>

	<!-- Header Section End -->
