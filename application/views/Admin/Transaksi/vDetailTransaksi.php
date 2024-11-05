<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1>Invoice</h1>
				</div>
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="#">Home</a></li>
						<li class="breadcrumb-item active">Invoice</li>
					</ol>
				</div>
			</div>
		</div><!-- /.container-fluid -->
	</section>

	<section class="content">
		<div class="container-fluid">
			<div class="row">
				<div class="col-12">
					<!-- Main content -->
					<div class="invoice p-3 mb-3">
						<!-- title row -->
						<div class="row">
							<div class="col-12">
								<h4>
									<i class="fas fa-globe"></i> Invoice Pelanggan
									<small class="float-right">Date: <?= $transaksi['pelanggan']->tgl_transaksi ?></small>
								</h4>
							</div>
							<!-- /.col -->
						</div>
						<!-- info row -->
						<div class="row invoice-info">
							<div class="col-sm-4 invoice-col">
								From
								<address>
									<strong><?= $transaksi['pelanggan']->nama_pelanggan ?></strong><br>
									<?= $transaksi['pelanggan']->alamat ?><br>
									<?= $transaksi['pelanggan']->alamat_pengiriman ?>
								</address>
							</div>
							<!-- /.col -->

							<!-- /.col -->
							<div class="col-sm-4 invoice-col">
								<b>Invoice #<?= $transaksi['pelanggan']->id_transaksi ?></b><br>
								<br>
								<b>Status :</b> <span class="badge bg-success font-size-12 ms-2"><?php if ($transaksi['pelanggan']->stat_transaksi == '0') {
																									?>
										Belum Bayar
									<?php
																									} else if ($transaksi['pelanggan']->stat_transaksi == '1') {
									?>
										Menunggu Konfirmasi
									<?php
																									} else if ($transaksi['pelanggan']->stat_transaksi == '2') {
									?>
										Pesanan Diproses
									<?php
																									} else if ($transaksi['pelanggan']->stat_transaksi == '3') {
									?>
										Pesanan Dikirim
									<?php
																									} else if ($transaksi['pelanggan']->stat_transaksi == '4') {
									?>
										Pesanan Selesai
									<?php
																									} ?></span><br>

							</div>
							<!-- /.col -->
							<div class="col-sm-4 mb-3">
								<p class="lead">Payment Methods: <strong> <?php if ($transaksi['pelanggan']->metode_pembayaran == '1') {
																				echo 'DANA';
																			} else {
																				echo 'OVO';
																			}  ?> </strong></p>
								<?php
								if ($transaksi['pelanggan']->stat_transaksi != '0') {
								?>
									<img style="width: 100px;" src="<?= base_url('asset/pembayaran/' . $transaksi['pelanggan']->bukti_payment) ?>">
								<?php
								}
								?>


							</div>
						</div>
						<!-- /.row -->

						<!-- Table row -->
						<div class="row">
							<div class="col-12 table-responsive">
								<table class="table table-striped">
									<thead>
										<tr>
											<th style="width: 70px;">No.</th>
											<th>Item</th>
											<th>Price</th>
											<th>Quantity</th>
											<th class="text-end" style="width: 120px;">Total</th>
										</tr>
									</thead><!-- end thead -->
									<tbody>
										<?php
										$no = 1;
										foreach ($transaksi['produk'] as $key => $value) {
										?>
											<tr>
												<th scope="row"><?= $no++ ?></th>
												<td>
													<div>
														<h5 class="text-truncate font-size-14 mb-1"><?= $value->nama_produk ?></h5>
														<p class="text-muted mb-0"><?= $value->kategori_produk ?></p>
													</div>
												</td>
												<td>Rp. <?= number_format($value->harga) ?></td>
												<td><?= $value->qty ?></td>
												<td class="text-end">Rp. <?= number_format($value->harga * $value->qty) ?></td>
											</tr>
										<?php
										}
										?>
										<tr>
											<th scope="row" colspan="4" class="text-end">Sub Total</th>
											<td class="text-end">Rp. <?= number_format($value->total_transaksi) ?></td>
										</tr>
										<!-- end tr -->

										<!-- end tr -->
										<?php
										if ($transaksi['pelanggan']->metode_pengiriman == '2') {
										?>
											<tr>
												<th scope="row" colspan="4" class="border-0 text-end">
													Ongkos Kirim :</th>
												<td class="border-0 text-end">Rp. <?= number_format($value->ongkir) ?></td>
											</tr>
										<?php
										}
										?>

										<?php
										$kupon = $transaksi['pelanggan']->id_kupon;
										if ($kupon) {
											$dt_kupon = $this->db->query("SELECT * FROM `kupon` WHERE id_kupon='" . $kupon . "'")->row();
										?>
											<tr>
												<th scope="row" colspan="4" class="border-0 text-end">
													Kupon :</th>
												<td class="border-0 text-end">Rp. <?= number_format($dt_kupon->potongan_harga) ?></td>
											</tr>
										<?php
										}
										?>
										<tr>
											<th scope="row" colspan="4" class="border-0 text-end">Total</th>
											<td class="border-0 text-end">
												<h5 class="m-0 fw-semibold">Rp. <?= number_format($value->total_pembayaran) ?></h5>
											</td>
										</tr>


									</tbody><!-- end tbody -->
								</table>
							</div>
							<!-- /.col -->
						</div>
						<!-- /.row -->





					</div>
				</div>
			</div>
		</div>
		<!-- /.card -->

		<!-- /.container-fluid -->
	</section>
	<!-- /.content -->

</div>
