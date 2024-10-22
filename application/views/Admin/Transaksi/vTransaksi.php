<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1>
						Transaksi Produk <b>Keripik Pedas Hikmah</b>
						<small>Reseller</small>
					</h1>
				</div>
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="#">Home</a></li>
						<li class="breadcrumb-item active">Transaksi Produk</li>
					</ol>
				</div>
			</div>
			<?php if ($this->session->userdata('success')) {
			?>
				<div class="callout callout-success">
					<h5>Sukses!</h5>

					<p><?= $this->session->userdata('success') ?></p>
				</div>
			<?php
			} ?>
		</div><!-- /.container-fluid -->
	</section>

	<!-- Main content -->
	<section class="content">
		<div class="container-fluid">
			<div class="row">
				<div class="col-12 col-sm-12">
					<div class="card card-info card-outline card-tabs">
						<div class="card-header p-0 pt-1 border-bottom-0">
							<ul class="nav nav-tabs" id="custom-tabs-three-tab" role="tablist">
								<?php
								//notifikasi
								$belum_bayar = $this->db->query("SELECT COUNT(id_tranbj) as jml FROM `transaksi_bj` WHERE status='0'")->row();
								$menunggu = $this->db->query("SELECT COUNT(id_tranbj) as jml FROM `transaksi_bj` WHERE status='1'")->row();
								$dikirim = $this->db->query("SELECT COUNT(id_tranbj) as jml FROM `transaksi_bj` WHERE status='2'")->row();
								$selesai = $this->db->query("SELECT COUNT(id_tranbj) as jml FROM `transaksi_bj` WHERE status='3' AND stat_selesai='0'")->row();
								?>
								<li class="nav-item">
									<a class="nav-link active btn-danger" id="custom-tabs-three-home-tab" data-toggle="pill" href="#custom-tabs-three-home" role="tab" aria-controls="custom-tabs-three-home" aria-selected="true">Pesanan Belum Bayar <span class="badge badge-warning"><?= $belum_bayar->jml ?></span></a>
								</li>
								<li class="nav-item">
									<a class="nav-link btn-warning" id="custom-tabs-three-profile-tab" data-toggle="pill" href="#custom-tabs-three-profile" role="tab" aria-controls="custom-tabs-three-profile" aria-selected="false">Menunggu Konfirmasi <span class="badge badge-danger"><?= $menunggu->jml ?></span></a>
								</li>
								<li class="nav-item">
									<a class="nav-link btn-info" id="custom-tabs-three-messages-tab" data-toggle="pill" href="#custom-tabs-three-messages" role="tab" aria-controls="custom-tabs-three-messages" aria-selected="false">Pesanan Dikirim <span class="badge badge-success"><?= $dikirim->jml ?></span></a>
								</li>
								<li class="nav-item">
									<a class="nav-link btn-success" id="custom-tabs-three-settings-tab" data-toggle="pill" href="#custom-tabs-three-settings" role="tab" aria-controls="custom-tabs-three-settings" aria-selected="false">Selesai <span class="badge badge-info"><?= $selesai->jml ?></span></a>
								</li>
							</ul>
						</div>
						<div class="card-body">
							<div class="tab-content" id="custom-tabs-three-tabContent">
								<div class="tab-pane fade show active" id="custom-tabs-three-home" role="tabpanel" aria-labelledby="custom-tabs-three-home-tab">
									<div class="card-body">
										<table class="example1 table table-bordered table-striped">
											<thead>
												<tr>
													<th>No</th>
													<th>Tanggal Transaksi</th>
													<th>Total Pembayaran</th>
													<th>Status</th>
													<th>Produk</th>
												</tr>
											</thead>
											<tbody>
												<?php
												$no = 1;
												foreach ($transaksi as $key => $value) {
													if ($value->status == '0') {
												?>
														<tr>
															<td><?= $no++ ?>.</td>
															<td><?= $value->tgl_transaksi ?></td>
															<td>Rp. <?= number_format($value->total_pembayaran)  ?></td>
															<td><?php if ($value->status == '0') {
																?>
																	<span class="badge badge-danger">Belum Bayar</span>
																<?php
																} else if ($value->status == '1') {
																?>
																	<span class="badge badge-warning">Menunggu Konfirmasi</span>
																<?php
																} else if ($value->status == '2') {
																?>
																	<span class="badge badge-info">Pesanan Dikirim</span>
																<?php
																} else if ($value->status == '3') {
																?>
																	<span class="badge badge-success">Selesai</span>
																<?php
																} ?>
															</td>
															<td>
																<?php
																// bahan baku yang dipesan
																$bj = $this->db->query("SELECT * FROM `transaksi_bj` JOIN detail_transaksibj ON transaksi_bj.id_tranbj=detail_transaksibj.id_tranbj JOIN bahan_jadi ON bahan_jadi.id_bj=detail_transaksibj.id_bj WHERE transaksi_bj.id_tranbj='" . $value->id_tranbj . "'")->result();
																foreach ($bj as $key => $value) {
																?>
																	<?= $value->nama_bj ?> (<?= $value->qty_bj ?>x)
																<?php
																}
																?>
															</td>

														</tr>
												<?php
													}
												}
												?>


											</tbody>

										</table>
									</div>
								</div>
								<div class="tab-pane fade" id="custom-tabs-three-profile" role="tabpanel" aria-labelledby="custom-tabs-three-profile-tab">
									<?php
									$data = array(
										'stat_selesai' => '1'
									);
									$this->db->where('status=3');
									$this->db->update('transaksi_bj', $data);

									?>
									<div class="card-body">
										<table class="example1 table table-bordered table-striped">
											<thead>
												<tr>
													<th>No</th>
													<th>Tanggal Transaksi</th>
													<th>Total Pembayaran</th>
													<th>Status</th>
													<th>Produk</th>
												</tr>
											</thead>
											<tbody>
												<?php
												$no = 1;
												foreach ($transaksi as $key => $value) {
													if ($value->status == '1') {
												?>
														<tr>
															<td><?= $no++ ?>.</td>
															<td><?= $value->tgl_transaksi ?></td>
															<td>Rp. <?= number_format($value->total_pembayaran)  ?></td>
															<td><?php if ($value->status == '0') {
																?>

																	<span class="badge badge-danger">Belum Bayar</span>

																<?php
																} else if ($value->status == '1') {
																?>
																	<span class="badge badge-warning">Menunggu Konfirmasi</span><br>
																	<a class="btn btn-warning" href="<?= base_url('Gudang/cTransaksi/konfirmasi/' . $value->id_tranbj) ?>"><i class="fas fa-hand-point-right"></i> Konfirmasi Pembayaran</a>
																<?php
																} else if ($value->status == '2') {
																?>
																	<span class="badge badge-info">Pesanan Dikirim</span>
																<?php
																} else if ($value->status == '3') {
																?>
																	<span class="badge badge-success">Selesai</span>
																<?php
																} ?>
															</td>
															<td>
																<?php
																// bahan baku yang dipesan
																$bj = $this->db->query("SELECT * FROM `transaksi_bj` JOIN detail_transaksibj ON transaksi_bj.id_tranbj=detail_transaksibj.id_tranbj JOIN bahan_jadi ON bahan_jadi.id_bj=detail_transaksibj.id_bj WHERE transaksi_bj.id_tranbj='" . $value->id_tranbj . "'")->result();
																foreach ($bj as $key => $value) {
																?>
																	<?= $value->nama_bj ?> (<?= $value->qty_bj ?>x)
																<?php
																}
																?>
															</td>

														</tr>
												<?php
													}
												}
												?>


											</tbody>

										</table>
									</div>
								</div>
								<div class="tab-pane fade" id="custom-tabs-three-messages" role="tabpanel" aria-labelledby="custom-tabs-three-messages-tab">
									<div class="card-body">
										<table class="example1 table table-bordered table-striped">
											<thead>
												<tr>
													<th>No</th>
													<th>Tanggal Transaksi</th>
													<th>Total Pembayaran</th>
													<th>Status</th>
													<th>Produk</th>
												</tr>
											</thead>
											<tbody>
												<?php
												$no = 1;
												foreach ($transaksi as $key => $value) {
													if ($value->status == '2') {
												?>
														<tr>
															<td><?= $no++ ?>.</td>
															<td><?= $value->tgl_transaksi ?></td>
															<td>Rp. <?= number_format($value->total_pembayaran)  ?></td>
															<td><?php if ($value->status == '0') {
																?>

																	<span class="badge badge-danger">Belum Bayar</span>

																<?php
																} else if ($value->status == '1') {
																?>
																	<span class="badge badge-warning">Menunggu Konfirmasi</span>
																<?php
																} else if ($value->status == '2') {
																?>
																	<span class="badge badge-info">Pesanan Dikirim</span>
																<?php
																} else if ($value->status == '3') {
																?>
																	<span class="badge badge-success">Selesai</span>
																<?php
																} ?>
															</td>
															<td>
																<?php
																// bahan baku yang dipesan
																$bj = $this->db->query("SELECT * FROM `transaksi_bj` JOIN detail_transaksibj ON transaksi_bj.id_tranbj=detail_transaksibj.id_tranbj JOIN bahan_jadi ON bahan_jadi.id_bj=detail_transaksibj.id_bj WHERE transaksi_bj.id_tranbj='" . $value->id_tranbj . "'")->result();
																foreach ($bj as $key => $value) {
																?>
																	<?= $value->nama_bj ?> (<?= $value->qty_bj ?>x)
																<?php
																}
																?>
															</td>

														</tr>
												<?php
													}
												}
												?>


											</tbody>

										</table>
									</div>
								</div>
								<div class="tab-pane fade" id="custom-tabs-three-settings" role="tabpanel" aria-labelledby="custom-tabs-three-settings-tab">
									<div class="card-body">
										<table class="example1 table table-bordered table-striped">
											<thead>
												<tr>
													<th>No</th>
													<th>Tanggal Transaksi</th>
													<th>Total Pembayaran</th>
													<th>Status</th>
													<th>Produk</th>
												</tr>
											</thead>
											<tbody>
												<?php
												$no = 1;
												foreach ($transaksi as $key => $value) {
													if ($value->status == '3') {
												?>
														<tr>
															<td><?= $no++ ?>.</td>
															<td><?= $value->tgl_transaksi ?></td>
															<td>Rp. <?= number_format($value->total_pembayaran)  ?></td>
															<td><?php if ($value->status == '0') {
																?>

																	<span class="badge badge-danger">Belum Bayar</span>

																<?php
																} else if ($value->status == '1') {
																?>
																	<span class="badge badge-warning">Menunggu Konfirmasi</span>
																<?php
																} else if ($value->status == '2') {
																?>
																	<span class="badge badge-info">Pesanan Dikirim</span>
																<?php
																} else if ($value->status == '3') {
																?>
																	<span class="badge badge-success">Selesai</span>
																<?php
																} ?>
															</td>
															<td>
																<?php
																// bahan baku yang dipesan
																$bj = $this->db->query("SELECT * FROM `transaksi_bj` JOIN detail_transaksibj ON transaksi_bj.id_tranbj=detail_transaksibj.id_tranbj JOIN bahan_jadi ON bahan_jadi.id_bj=detail_transaksibj.id_bj WHERE transaksi_bj.id_tranbj='" . $value->id_tranbj . "'")->result();
																foreach ($bj as $key => $value) {
																?>
																	<?= $value->nama_bj ?> (<?= $value->qty_bj ?>x)
																<?php
																}
																?>
															</td>

														</tr>
												<?php
													}
												}
												?>


											</tbody>

										</table>
									</div>
								</div>
							</div>
						</div>
						<!-- /.card -->
					</div>
				</div>

			</div>

			<!-- /.card -->
		</div>
		<!-- /.container-fluid -->
	</section>
	<!-- /.content -->
</div>