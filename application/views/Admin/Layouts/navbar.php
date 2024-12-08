<body class="hold-transition sidebar-mini layout-fixed">
	<div class="wrapper">



		<!-- Navbar -->
		<nav class="main-header navbar navbar-expand navbar-white navbar-light">
			<!-- Left navbar links -->
			<ul class="navbar-nav">
				<li class="nav-item">
					<a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
				</li>

			</ul>

			<!-- Right navbar links -->
			<ul class="navbar-nav ml-auto">

				<?php
				//notifikasi chat
				$notif = $this->db->query("SELECT COUNT(id_chatting) as jml FROM `chatting` WHERE status='0' AND admin_send = '0'")->row();
				//chatting reseller
				$dt = $this->db->query("SELECT * FROM `chatting` JOIN user ON user.id_user=chatting.id_user JOIN pelanggan ON pelanggan.id_pelanggan=chatting.id_pelanggan GROUP BY pelanggan.id_pelanggan")->result();
			

				?>
					<!-- Messages Dropdown Menu -->
					<li class="nav-item dropdown">
						<a class="nav-link" data-toggle="dropdown" href="#">
							<i class="far fa-comments"></i>
							<span class="badge badge-danger navbar-badge"><?php if ($notif->jml != 0) {
																				echo $notif->jml;
																			} ?></span>
						</a>
						<div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
							<?php
							foreach ($dt as $key => $value) {
								$dt_notif = $this->db->query("SELECT COUNT(id_chatting) as jml FROM `chatting` WHERE status='0' AND admin_send = '0' AND id_pelanggan='" . $value->id_pelanggan . "'")->row();
							?>

								<a href="<?= base_url('Admin/cDashboard/chat/' . $value->id_pelanggan) ?>" class="dropdown-item">
									<!-- Message Start -->
									<div class="media">
										<div class="media-body">
											<h3 class="dropdown-item-title">
												<?= $value->nama_pelanggan ?>
												<?php
												if ($dt_notif->jml != 0) {
												?>
													<span class="float-right text-sm text-danger">
														<i class="far fa-comment-dots"><?= $dt_notif->jml ?></i>
													</span>
												<?php
												}
												?>

											</h3>
											<p class="text-sm"><?= $value->no_hp ?></p>
											<p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> <?= $value->time ?></p>
										</div>
									</div>
									<!-- Message End -->
								</a>
								<div class="dropdown-divider"></div>
							<?php
							}
							?>


						</div>
					</li>
			




			</ul>
		</nav>
		<!-- /.navbar -->
