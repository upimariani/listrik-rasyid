<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1>Data Diskon Produk</h1>
					<button type="button" class="btn bg-warning mt-2" data-toggle="modal" data-target="#modal-default">
						<i class="fas fa-users"></i> Tambah Diskon Produk
					</button>
					<div class="modal fade" id="modal-default">
						<div class="modal-dialog">
							<form action="<?= base_url('Admin/cDiskon/create') ?>" method="POST">
								<div class="modal-content">
									<div class="modal-header">
										<h4 class="modal-title">Masukkan Data Diskon Produk</h4>
										<button type="button" class="close" data-dismiss="modal" aria-label="Close">
											<span aria-hidden="true">&times;</span>
										</button>
									</div>
									<div class="modal-body">
										<div class="form-group">
											<label>Nama Produk</label>
											<select class="form-control" name="produk" required>
												<option value="">Pilih Produk</option>
												<?php
												foreach ($produk as $key => $value) {
												?>
													<option value="<?= $value->id_produk ?>"><?= $value->nama_produk ?></option>
												<?php
												}
												?>
											</select>
										</div>
										<div class="row">
											<div class="col-lg-6">
												<div class="form-group">
													<label>Nama Diskon</label>
													<input type="text" name="nama_diskon" class="form-control" placeholder="Masukkan Username" required>
												</div>
											</div>
											<div class="col-lg-6">
												<div class="form-group">
													<label>Besar Diskon</label>
													<input type="text" name="besar" class="form-control" placeholder="Masukkan Password" required>
												</div>
											</div>
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
				<div class="col-10">
					<div class="card">
						<div class="card-header">
							<h3 class="card-title">Informasi Diskon Produk</h3>
						</div>
						<!-- /.card-header -->
						<div class="card-body">
							<table id="example1" class="table table-bordered table-striped">
								<thead>
									<tr>
										<th>No</th>
										<th>Nama Produk</th>
										<th>Nama Diskon</th>
										<th>Besar Diskon</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody>
									<?php
									$no = 1;
									foreach ($diskon as $key => $value) {
									?>
										<tr>
											<td><?= $no++ ?>.</td>
											<td><?= $value->nama_produk ?></td>
											<td><?= $value->nama_diskon ?></td>
											<td><?= $value->diskon ?>%<br>
												<span class="badge badge-warning">Harga Awal: Rp. <?= number_format($value->harga) ?></span><br>
												<span class="badge badge-info">Harga Setelah Diskon: Rp. <?= number_format($value->harga - (($value->diskon / 100) * $value->harga)) ?></span>
											</td>
											<td>
												<button type="button" class="btn bg-info" data-toggle="modal" data-target="#edit<?= $value->id_diskon ?>">
													<i class="fas fa-edit"></i>
												</button>
												<a href="<?= base_url('Admin/cDiskon/delete/' . $value->id_diskon) ?>" class="btn btn-danger"><i class="fas fa-trash"></i></a>
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
foreach ($diskon as $key => $value) {
?>
	<div class="modal fade" id="edit<?= $value->id_diskon ?>">
		<div class="modal-dialog">
			<form action="<?= base_url('Admin/cDiskon/update/' . $value->id_diskon) ?>" method="POST">
				<div class="modal-content">
					<div class="modal-header">
						<h4 class="modal-title">Perbaharui Data Diskon Produk</h4>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<div class="form-group">
							<label>Nama Produk</label>
							<select class="form-control" name="produk" required>
								<option value="">Pilih Produk</option>
								<?php
								foreach ($produk as $key => $item) {
								?>
									<option value="<?= $item->id_produk ?>" <?php if ($value->id_produk == $item->id_produk) {
																				echo 'selected';
																			} ?>><?= $item->nama_produk ?></option>
								<?php
								}
								?>
							</select>
						</div>
						<div class="row">
							<div class="col-lg-6">
								<div class="form-group">
									<label>Nama Diskon</label>
									<input type="text" name="nama_diskon" value="<?= $value->nama_diskon ?>" class="form-control" placeholder="Masukkan Username" required>
								</div>
							</div>
							<div class="col-lg-6">
								<div class="form-group">
									<label>Besar Diskon</label>
									<input type="text" name="besar" value="<?= $value->diskon ?>" class="form-control" placeholder="Masukkan Password" required>
								</div>
							</div>
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