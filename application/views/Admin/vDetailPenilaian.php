<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1>Penilaian Produk</h1>

					<!-- /.modal -->
				</div>
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="#">Home</a></li>
						<li class="breadcrumb-item active">User</li>
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
				<div class="col-12">
					<div class="card">
						<div class="card-header">
							<h3 class="card-title">Informasi Penilaian Produk</h3>
						</div>
						<!-- /.card-header -->
						<div class="card-body">
							<table class="example1 table table-bordered table-striped">
								<thead>
									<tr>
										<th>No</th>
										<th>Nama Produk</th>
										<th>Nama Pelanggan</th>
										<th>Review</th>
										<th>Rating</th>
										<th>Time</th>
									</tr>
								</thead>
								<tbody>
									<?php
									$no = 1;
									foreach ($penilaian as $key => $value) {
									?>
										<tr>
											<td><?= $no++ ?>.</td>
											<td><?= $value->nama_produk ?></td>
											<td><?= $value->nama_pelanggan ?></td>
											<td><?= $value->review ?></td>
											<td>
												<?php for ($i = 0; $i < $value->rating; $i++) {
												?>
													<i style="color: orange;" class="fa fa-star"></i>
												<?php
												} ?>

											</td>
											<td><?= $value->time ?></td>

										</tr>
									<?php
									}
									?>


								</tbody>

							</table>
						</div>
						<!-- /.card-body -->
					</div>
					<!-- /.card -->
				</div>
				<!-- /.col -->
			</div>
			<!-- /.row -->
		</div>
		<!-- /.container-fluid -->
	</section>
	<!-- /.content -->
</div>
