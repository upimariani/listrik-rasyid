<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<div class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1 class="m-0">Dashboard</h1>
				</div><!-- /.col -->
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="#">Home</a></li>
						<li class="breadcrumb-item active">Dashboard</li>
					</ol>
				</div><!-- /.col -->
			</div><!-- /.row -->
		</div><!-- /.container-fluid -->
	</div>
	<!-- /.content-header -->
	<?php
	$user = $this->db->query("SELECT COUNT(id_user) as jml FROM `user`")->row();
	$pelanggan = $this->db->query("SELECT COUNT(id_pelanggan) as jml FROM `pelanggan`")->row();
	$produk = $this->db->query("SELECT COUNT(id_produk) as jml FROM `produk`")->row();
	$penilaian = $this->db->query("SELECT COUNT(id_penilaian) as jml FROM `penilaian`")->row();
	?>
	<!-- Main content -->
	<section class="content">
		<div class="container-fluid">
			<!-- Info boxes -->
			<div class="row">
				<div class="col-12 col-sm-6 col-md-3">
					<div class="info-box">
						<span class="info-box-icon bg-info elevation-1"><i class="fas fa-cog"></i></span>

						<div class="info-box-content">
							<span class="info-box-text">User</span>
							<span class="info-box-number">
								<?= $user->jml ?>
								<small>akun</small>
							</span>
						</div>
						<!-- /.info-box-content -->
					</div>
					<!-- /.info-box -->
				</div>
				<!-- /.col -->
				<div class="col-12 col-sm-6 col-md-3">
					<div class="info-box mb-3">
						<span class="info-box-icon bg-danger elevation-1"><i class="fas fa-thumbs-up"></i></span>

						<div class="info-box-content">
							<span class="info-box-text">Pelanggan Regist</span>
							<span class="info-box-number"><?= $pelanggan->jml ?></span>
						</div>
						<!-- /.info-box-content -->
					</div>
					<!-- /.info-box -->
				</div>
				<!-- /.col -->

				<!-- fix for small devices only -->
				<div class="clearfix hidden-md-up"></div>

				<div class="col-12 col-sm-6 col-md-3">
					<div class="info-box mb-3">
						<span class="info-box-icon bg-success elevation-1"><i class="fas fa-shopping-cart"></i></span>

						<div class="info-box-content">
							<span class="info-box-text">Produk</span>
							<span class="info-box-number"><?= $produk->jml ?></span>
						</div>
						<!-- /.info-box-content -->
					</div>
					<!-- /.info-box -->
				</div>
				<!-- /.col -->
				<div class="col-12 col-sm-6 col-md-3">
					<a class="text-info" href="<?= base_url('Admin/cDashboard/detail_penilaian') ?>">
						<div class="info-box mb-3">
							<span class="info-box-icon bg-warning elevation-1"><i class="fas fa-users"></i></span>

							<div class="info-box-content">
								<span class="info-box-text">Penilaian</span>
								<span class="info-box-number"> <small>Klik Detail Penilaian!</small></span>

							</div>
							<!-- /.info-box-content -->
						</div>
					</a>
					<!-- /.info-box -->
				</div>
				<?php
				//notifikasi
				$belum_bayar = $this->db->query("SELECT COUNT(id_transaksi) as jml FROM `transaksi` WHERE stat_transaksi='0'")->row();
				$menunggu = $this->db->query("SELECT COUNT(id_transaksi) as jml FROM `transaksi` WHERE stat_transaksi='1'")->row();
				$dikirim = $this->db->query("SELECT COUNT(id_transaksi) as jml FROM `transaksi` WHERE stat_transaksi='2'")->row();
				$selesai = $this->db->query("SELECT COUNT(id_transaksi) as jml FROM `transaksi` WHERE stat_transaksi='3'")->row();
				?>
				<div class="col-md-12">
					<!-- Info Boxes Style 2 -->
					<div class="row">
						<div class="col-lg-3">
							<div class="info-box mb-3 bg-warning">
								<span class="info-box-icon"><i class="fas fa-tag"></i></span>

								<div class="info-box-content">
									<span class="info-box-text">Belum Bayar</span>
									<span class="info-box-number"><?= $belum_bayar->jml ?></span>
								</div>
								<!-- /.info-box-content -->
							</div>
						</div>
						<div class="col-lg-3">
							<div class="info-box mb-3 bg-success">
								<span class="info-box-icon"><i class="far fa-heart"></i></span>

								<div class="info-box-content">
									<span class="info-box-text">Menunggu Konfirmasi</span>
									<span class="info-box-number"><?= $menunggu->jml ?></span>
								</div>
								<!-- /.info-box-content -->
							</div>
						</div>
						<div class="col-lg-3">
							<div class="info-box mb-3 bg-danger">
								<span class="info-box-icon"><i class="fas fa-cloud-download-alt"></i></span>

								<div class="info-box-content">
									<span class="info-box-text">Pesanan Dikirim</span>
									<span class="info-box-number"><?= $dikirim->jml ?></span>
								</div>
								<!-- /.info-box-content -->
							</div>
						</div>
						<div class="col-lg-3">
							<div class="info-box mb-3 bg-info">
								<span class="info-box-icon"><i class="far fa-comment"></i></span>

								<div class="info-box-content">
									<span class="info-box-text">Pesanan Selesai</span>
									<span class="info-box-number"><?= $selesai->jml ?></span>
								</div>
								<!-- /.info-box-content -->
							</div>
						</div>
					</div>

					<!-- /.info-box -->

					<!-- /.info-box -->

					<!-- /.info-box -->

					<!-- /.info-box -->
					<!-- /.col -->

				</div>
				<!-- /.row -->
				<div class="col-6 table-responsive">
					<div class="card bg-light">
						<div class="card-header">
							<h3>Grafik Penjualan Per Bulan</h3>
						</div>
						<div class="card-body">
							<canvas id="transaksi" height="150"></canvas>


						</div>
					</div>
				</div>
				<div class="col-6 table-responsive">
					<div class="card bg-light">
						<div class="card-header">
							<h3>Grafik Penjualan Produk</h3>
						</div>
						<div class="card-body">
							<canvas id="produk" height="150"></canvas>


						</div>
					</div>
				</div>

			</div>
			<!--/. container-fluid -->
	</section>
	<!-- /.content -->
</div>
<!-- /.content-wrapper -->

<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
	<!-- Control sidebar content goes here -->
</aside>
<!-- /.control-sidebar -->
