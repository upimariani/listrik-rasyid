<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1>Data Produk</h1>
					<button type="button" class="btn bg-warning mt-2" data-toggle="modal" data-target="#modal-default">
						<i class="fas fa-th"></i> Tambah Produk
					</button>
					<div class="modal fade" id="modal-default">
						<div class="modal-dialog">
							<?= form_open_multipart('Admin/cProduk/create') ?>
							<div class="modal-content">
								<div class="modal-header">
									<h4 class="modal-title">Masukkan Data Produk</h4>
									<button type="button" class="close" data-dismiss="modal" aria-label="Close">
										<span aria-hidden="true">&times;</span>
									</button>
								</div>
								<div class="modal-body">
									<div class="row">
										<div class="col-lg-6">
											<div class="form-group">
												<label>Nama Produk</label>
												<input type="text" name="nama" class="form-control" placeholder="Masukkan Nama Produk" required>
											</div>
										</div>
										<div class="col-lg-6">
											<div class="form-group">
												<label>Keterangan</label>
												<input type="text" name="keterangan" class="form-control" placeholder="Masukkan Keterangan" required>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-lg-6">
											<div class="form-group">
												<label>Kategori Produk</label>
												<input type="text" name="kategori" class="form-control" placeholder="Masukkan Kategori" required>
											</div>
										</div>
										<div class="col-lg-6">
											<div class="form-group">
												<label>Harga</label>
												<input type="text" name="harga" class="form-control" placeholder="Masukkan Harga" required>
											</div>
										</div>
									</div>
									<div class="form-group">
										<label>Deskripsi</label>
										<textarea class="form-control" name="deskripsi" placeholder="Masukkan Deskripsi" required></textarea>
									</div>
									<div class="form-group">
										<label>Stok</label>
										<input type="text" name="stok" class="form-control" placeholder="Masukkan Stok" required>
									</div>
									<div class="form-group">
										<label>Gambar</label>
										<input type="file" name="gambar" class="form-control" required>
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
				<div class="col-12">
					<div class="card">
						<div class="card-header">
							<h3 class="card-title">Informasi Produk</h3>
						</div>
						<!-- /.card-header -->
						<div class="card-body">
							<table class="example1 table table-bordered table-striped">
								<thead>
									<tr>
										<th>No</th>
										<th>Nama Produk</th>
										<th>Deskripsi</th>
										<th>Harga</th>
										<th>Stok</th>
										<th class="text-center">Action</th>
									</tr>
								</thead>
								<tbody>
									<?php
									$no = 1;
									foreach ($produk as $key => $value) {
									?>
										<tr>
											<td><?= $no++ ?>.</td>
											<td><img style="width: 100px;" src="<?= base_url('asset/produk/' . $value->foto) ?>"><br>
												<?= $value->nama_produk ?> / <span class="badge badge-success"><?= $value->keterangan ?></span></td>
											<td><?= $value->deskripsi ?></td>
											<td>Rp. <?= number_format($value->harga)  ?></td>
											<td><?= number_format($value->stok)  ?></td>
											<td class="text-center">
												<button type="button" class="btn bg-info" data-toggle="modal" data-target="#edit<?= $value->id_produk ?>">
													<i class="fas fa-edit"></i>
												</button>
												<a href="<?= base_url('Admin/cProduk/delete/' . $value->id_produk) ?>" class="btn btn-danger"><i class="fas fa-trash"></i></a>
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
foreach ($produk as $key => $value) {
?>
	<div class="modal fade" id="edit<?= $value->id_produk ?>">
		<div class="modal-dialog">
			<?= form_open_multipart('Admin/cProduk/update/' . $value->id_produk) ?>
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title">Perbaharui Data Produk</h4>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<div class="row">
						<div class="col-lg-6">
							<div class="form-group">
								<label>Nama Produk</label>
								<input type="text" value="<?= $value->nama_produk ?>" name="nama" class="form-control" placeholder="Masukkan Nama Produk" required>
							</div>
						</div>
						<div class="col-lg-6">
							<div class="form-group">
								<label>Keterangan</label>
								<input type="text" name="keterangan" value="<?= $value->keterangan ?>" class="form-control" placeholder="Masukkan Keterangan" required>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-lg-6">
							<div class="form-group">
								<label>Kategori Produk</label>
								<input type="text" name="kategori" value="<?= $value->kategori_produk ?>" class="form-control" placeholder="Masukkan Kategori" required>
							</div>
						</div>
						<div class="col-lg-6">
							<div class="form-group">
								<label>Harga</label>
								<input type="text" name="harga" value="<?= $value->harga ?>" class="form-control" placeholder="Masukkan Harga" required>
							</div>
						</div>
					</div>
					<div class="form-group">
						<label>Deskripsi</label>
						<textarea class="form-control" name="deskripsi" placeholder="Masukkan Deskripsi" required><?= $value->deskripsi ?></textarea>
					</div>
					<div class="form-group">
						<label>Stok</label>
						<input type="text" name="stok" value="<?= $value->stok ?>" class="form-control" placeholder="Masukkan Stok" required>
					</div>
					<div class="form-group">
						<label>Gambar</label><br>
						<img style="width: 150px;" src="<?= base_url('asset/produk/' . $value->foto) ?>">
						<input type="file" name="gambar" class="form-control">
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
