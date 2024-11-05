<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<div class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1 class="m-0">Pesan Pelanggan</h1>
				</div><!-- /.col -->
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="#">Home</a></li>
						<li class="breadcrumb-item active">Message</li>
					</ol>
				</div><!-- /.col -->
			</div><!-- /.row -->
		</div><!-- /.container-fluid -->
	</div>
	<!-- /.content-header -->

	<!-- Main content -->
	<section class="content">
		<div class="container-fluid">


			<!-- Main row -->
			<div class="row">
				<!-- Left col -->
				<div class="col-md-12">
					<!-- MAP & BOX PANE -->

					<!-- /.card -->
					<div class="row">
						<div class="col-md-12">
							<!-- DIRECT CHAT -->
							<div class="card direct-chat direct-chat-warning">
								<div class="card-header">
									<h3 class="card-title">Chat Pelanggan</h3>
								</div>
								<!-- /.card-header -->
								<div class="card-body">
									<!-- Conversations are loaded here -->
									<div class="direct-chat-messages">
										<?php
										foreach ($chat as $key => $value) {
											if ($value->admin_send == '0') {
										?>
												<!-- Message. Default to the left -->
												<div class="direct-chat-msg">
													<div class="direct-chat-infos clearfix">
														<span class="direct-chat-name float-left"><?= $value->nama_pelanggan ?></span>
														<span class="direct-chat-timestamp float-right"><?= $value->time ?></span>
													</div>
													<!-- /.direct-chat-infos -->
													<img class="direct-chat-img" src="<?= base_url('asset/Admin/') ?>dist/img/user4-128x128.jpg" alt="message user image">
													<!-- /.direct-chat-img -->
													<div class="direct-chat-text">
														<?= $value->pelanggan_send ?>
													</div>
													<!-- /.direct-chat-text -->
												</div>
												<!-- /.direct-chat-msg -->
											<?php
											} else {
											?>
												<!-- Message to the right -->
												<div class="direct-chat-msg right">
													<div class="direct-chat-infos clearfix">
														<span class="direct-chat-name float-right">Admin</span>
														<span class="direct-chat-timestamp float-left"><?= $value->time ?></span>
													</div>
													<!-- /.direct-chat-infos -->
													<img class="direct-chat-img" src="<?= base_url('asset/Admin/') ?>dist/img/user3-128x128.jpg" alt="message user image">
													<!-- /.direct-chat-img -->
													<div class="direct-chat-text">
														<?= $value->admin_send ?>
													</div>
													<!-- /.direct-chat-text -->
												</div>
												<!-- /.direct-chat-msg -->
										<?php
											}
										}
										?>




									</div>
									<!--/.direct-chat-messages-->

								</div>
								<!-- /.card-body -->
								<div class="card-footer">
									<form action="<?= base_url('Admin/cDashboard/send/' . $id_pelanggan) ?>" method="post">
										<div class="input-group">
											<input type="text" name="message" placeholder="Type Message ..." class="form-control" autofocus>
											<span class="input-group-append">
												<button type="submit" class="btn btn-info">Send</button>
											</span>
										</div>
									</form>
								</div>
								<!-- /.card-footer-->
							</div>
							<!--/.direct-chat -->
						</div>
						<!-- /.col -->


						<!-- /.col -->
					</div>
					<!-- /.row -->


				</div>

			</div>
			<!-- /.row -->
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
