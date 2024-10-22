<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1><strong>Data Kupon</strong> (Potongan Harga Transaksi)</h1>
					<button type="button" class="btn bg-warning mt-2" data-toggle="modal" data-target="#modal-default">
						<i class="fas fa-percent"></i> Tambah Kupon
					</button>
					<div class="modal fade" id="modal-default">
						<div class="modal-dialog">
							<form action="<?= base_url('Admin/cKupon/create') ?>" method="POST">
								<div class="modal-content">
									<div class="modal-header">
										<h4 class="modal-title">Masukkan Data Kupon</h4>
										<button type="button" class="close" data-dismiss="modal" aria-label="Close">
											<span aria-hidden="true">&times;</span>
										</button>
									</div>
									<div class="modal-body">

										<div class="row">
											<div class="col-lg-6">
												<div class="form-group">
													<label>Nama Kupon</label>
													<input type="text" name="nama" class="form-control" placeholder="Masukkan Nama Kupon" required autofocus>
												</div>
											</div>
											<div class="col-lg-6">
												<div class="form-group">
													<label>Potongan Harga</label>
													<input type="text" name="potongan" class="form-control" placeholder="Masukkan Potongan Harga" required>
												</div>
											</div>
										</div>
										<div class="form-group">
											<label>Deskripsi Kupon</label>
											<textarea class="form-control" name="deskripsi" required></textarea>
										</div>
									</div>
									<div class="modal-footer justify-content-between">
										<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
										<button type="submit" class="btn btn-warning">Save changes</button>
									</div>
								</div>
							</form>
							<!-- /.modal-content -->
						</div>
						<!-- /.modal-dialog -->
					</div>
					<!-- /.modal -->
				</div>
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="#">Home</a></li>
						<li class="breadcrumb-item active">Kupon</li>
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
				<div class="col-10">
					<div class="card">
						<div class="card-header">
							<h3 class="card-title">Informasi Kupon</h3>
						</div>
						<!-- /.card-header -->
						<div class="card-body">
							<table id="example1" class="table table-bordered table-striped">
								<thead>
									<tr>
										<th>No</th>
										<th>Nama Kupon</th>
										<th>Deskripsi Kupon</th>
										<th>Potongan Harga</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody>
									<?php
									$no = 1;
									foreach ($kupon as $key => $value) {
									?>
										<tr>
											<td><?= $no++ ?>.</td>
											<td><?= $value->nama_kupon ?></td>
											<td><span class="badge badge-info"><?= $value->deskripsi_kupon ?></span></td>
											<td>Rp. <?= number_format($value->potongan_harga)  ?></td>
											<td>
												<button type="button" class="btn bg-info" data-toggle="modal" data-target="#edit<?= $value->id_kupon ?>">
													<i class="fas fa-edit"></i>
												</button>
												<a href="<?= base_url('Admin/cKupon/delete/' . $value->id_kupon) ?>" class="btn btn-danger"><i class="fas fa-trash"></i></a>
											</td>
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
<?php
foreach ($kupon as $key => $value) {
?>
	<div class="modal fade" id="edit<?= $value->id_kupon ?>">
		<div class="modal-dialog">
			<form action="<?= base_url('Admin/cKupon/update/' . $value->id_kupon) ?>" method="POST">
				<div class="modal-content">
					<div class="modal-header">
						<h4 class="modal-title">Perbaharui Data Kupon</h4>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">

						<div class="row">
							<div class="col-lg-6">
								<div class="form-group">
									<label>Nama Kupon</label>
									<input type="text" name="nama" value="<?= $value->nama_kupon ?>" class="form-control" placeholder="Masukkan Nama Kupon" required autofocus>
								</div>
							</div>
							<div class="col-lg-6">
								<div class="form-group">
									<label>Potongan Harga</label>
									<input type="text" name="potongan" value="<?= $value->potongan_harga ?>" class="form-control" placeholder="Masukkan Potongan Harga" required>
								</div>
							</div>
						</div>
						<div class="form-group">
							<label>Deskripsi Kupon</label>
							<textarea class="form-control" name="deskripsi" required><?= $value->deskripsi_kupon ?></textarea>
						</div>
					</div>
					<div class="modal-footer justify-content-between">
						<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
						<button type="submit" class="btn btn-warning">Save changes</button>
					</div>
				</div>
			</form>
			<!-- /.modal-content -->
		</div>
		<!-- /.modal-dialog -->
	</div>
<?php
}
?>