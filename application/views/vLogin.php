<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>LISTRIK RASYID SYIDIQ</title>

	<!-- Google Font: Source Sans Pro -->
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
	<!-- Font Awesome -->
	<link rel="stylesheet" href="<?= base_url('asset/Admin/') ?>plugins/fontawesome-free/css/all.min.css">
	<!-- icheck bootstrap -->
	<link rel="stylesheet" href="<?= base_url('asset/Admin/') ?>plugins/icheck-bootstrap/icheck-bootstrap.min.css">
	<!-- Theme style -->
	<link rel="stylesheet" href="<?= base_url('asset/Admin/') ?>dist/css/adminlte.min.css">
	<style>
		body {
			background-image: url("asset/blog.jpg");
		}
	</style>
</head>

<body class="hold-transition login-page">
	<div class="login-box">
		<!-- /.login-logo -->
		<div class="card card-outline card-success">
			<div class="card-header text-center">
				<p class="h1"><b>LISTRIK</b> RASYID SYIDIQ</p>
			</div>
			<div class="card-body">
				<p class="login-box-msg">Silahkan melakukan login untuk mendapatkan hak akses!</p>
				<?php if ($this->session->userdata('success')) {
				?>
					<div class="callout callout-success">
						<h5>Sukses!</h5>

						<p><?= $this->session->userdata('success') ?></p>
					</div>
				<?php
				} ?>
				<?php if ($this->session->userdata('error')) {
				?>
					<div class="callout callout-danger">
						<h5>Gagal!</h5>

						<p><?= $this->session->userdata('error') ?></p>
					</div>
				<?php
				} ?>
				<form action="<?= base_url('cLogin/login') ?>" method="post">
					<div class="input-group mb-3">
						<input type="text" name="username" class="form-control" placeholder="Username" required autofocus>
						<div class="input-group-append">
							<div class="input-group-text">
								<span class="fas fa-user"></span>
							</div>
						</div>
					</div>
					<div class="input-group mb-3">
						<input type="password" name="password" class="form-control" placeholder="Password" required>
						<div class="input-group-append">
							<div class="input-group-text">
								<span class="fas fa-lock"></span>
							</div>
						</div>
					</div>

					<div class="social-auth-links text-center mt-2 mb-3">
						<button type="submit" class="btn btn-block btn-success">
							<i class="fas fa-sign-in-alt"></i> Login
						</button>

					</div>
					<!-- /.social-auth-links -->
				</form>

			</div>
			<!-- /.card-body -->
		</div>
		<!-- /.card -->
	</div>
	<!-- /.login-box -->

	<!-- jQuery -->
	<script src="<?= base_url('asset/Admin/') ?>plugins/jquery/jquery.min.js"></script>
	<!-- Bootstrap 4 -->
	<script src="<?= base_url('asset/Admin/') ?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
	<!-- AdminLTE App -->
	<script src="<?= base_url('asset/Admin/') ?>dist/js/adminlte.min.js"></script>
</body>

</html>
