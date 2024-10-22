<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1>Data User</h1>
					<button type="button" class="btn bg-warning mt-2" data-toggle="modal" data-target="#modal-default">
						<i class="fas fa-users"></i> Tambah User
					</button>
					<div class="modal fade" id="modal-default">
						<div class="modal-dialog">
							<form action="<?= base_url('Admin/cUser/create') ?>" method="POST">
								<div class="modal-content">
									<div class="modal-header">
										<h4 class="modal-title">Masukkan Data User</h4>
										<button type="button" class="close" data-dismiss="modal" aria-label="Close">
											<span aria-hidden="true">&times;</span>
										</button>
									</div>
									<div class="modal-body">
										<div class="form-group">
											<label>Nama User</label>
											<input type="text" name="nama" class="form-control" placeholder="Masukkan Nama User" required>
										</div>
										<div class="row">
											<div class="col-lg-6">
												<div class="form-group">
													<label>Username</label>
													<input type="text" name="username" class="form-control" placeholder="Masukkan Username" required>
												</div>
											</div>
											<div class="col-lg-6">
												<div class="form-group">
													<label>Password</label>
													<input type="text" name="password" class="form-control" placeholder="Masukkan Password" required>
												</div>
											</div>
										</div>
										<div class="form-group">
											<label>Level User</label>
											<select class="form-control" name="level" required>
												<option value="">Pilih Level User</option>
												<option value="1">Admin</option>
												<option value="2">Pemilik</option>
											</select>
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
							<h3 class="card-title">Informasi User</h3>
						</div>
						<!-- /.card-header -->
						<div class="card-body">
							<table id="example1" class="table table-bordered table-striped">
								<thead>
									<tr>
										<th>No</th>
										<th>Nama User</th>
										<th>Username</th>
										<th>Password</th>
										<th>Level User</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody>
									<?php
									$no = 1;
									foreach ($user as $key => $value) {
									?>
										<tr>
											<td><?= $no++ ?>.</td>
											<td><?= $value->nama ?></td>
											<td><?= $value->username ?></td>
											<td><?= $value->password ?></td>
											<td><?php if ($value->level_user == '1') {
												?>
													<span class="badge badge-success">Admin</span>
												<?php
												} else if ($value->level_user == '2') {
												?>
													<span class="badge badge-warning">Pemilik</span>
												<?php
												}
												?>

											</td>
											<td>
												<button type="button" class="btn bg-info" data-toggle="modal" data-target="#edit<?= $value->id_user ?>">
													<i class="fas fa-edit"></i>
												</button>
												<a href="<?= base_url('Admin/cUser/delete/' . $value->id_user) ?>" class="btn btn-danger"><i class="fas fa-trash"></i></a>
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
foreach ($user as $key => $value) {
?>
	<div class="modal fade" id="edit<?= $value->id_user ?>">
		<div class="modal-dialog">
			<form action="<?= base_url('Admin/cUser/update/' . $value->id_user) ?>" method="POST">
				<div class="modal-content">
					<div class="modal-header">
						<h4 class="modal-title">Perbaharui Data User</h4>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<div class="form-group">
							<label>Nama User</label>
							<input type="text" name="nama" value="<?= $value->nama ?>" class="form-control" placeholder="Masukkan Nama User" required>
						</div>
						<div class="row">
							<div class="col-lg-6">
								<div class="form-group">
									<label>Username</label>
									<input type="text" name="username" value="<?= $value->username ?>" class="form-control" placeholder="Masukkan Username" required>
								</div>
							</div>
							<div class="col-lg-6">
								<div class="form-group">
									<label>Password</label>
									<input type="text" name="password" value="<?= $value->password ?>" class="form-control" placeholder="Masukkan Password" required>
								</div>
							</div>
						</div>
						<div class="form-group">
							<label>Level User</label>
							<select class="form-control" name="level" required>
								<option value="">Pilih Level User</option>
								<option value="1" <?php if ($value->level_user == '1') {
														echo 'selected';
													} ?>>Admin</option>
								<option value="2" <?php if ($value->level_user == '2') {
														echo 'selected';
													} ?>>Pemilik</option>
							</select>
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
