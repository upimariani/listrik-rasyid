<!-- Main Footer -->
<footer class="main-footer">
	<strong>LISTRIK</strong>
	RASYID SYIDIQ
	<div class="float-right d-none d-sm-inline-block">
		<b>ARIEF</b> E - COMMERCE
	</div>
</footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->
<!-- jQuery -->
<script src="<?= base_url('asset/Admin/') ?>plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="<?= base_url('asset/Admin/') ?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- overlayScrollbars -->
<script src="<?= base_url('asset/Admin/') ?>plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="<?= base_url('asset/Admin/') ?>dist/js/adminlte.js"></script>

<!-- PAGE PLUGINS -->
<!-- jQuery Mapael -->
<script src="<?= base_url('asset/Admin/') ?>plugins/jquery-mousewheel/jquery.mousewheel.js"></script>
<script src="<?= base_url('asset/Admin/') ?>plugins/raphael/raphael.min.js"></script>
<script src="<?= base_url('asset/Admin/') ?>plugins/jquery-mapael/jquery.mapael.min.js"></script>
<script src="<?= base_url('asset/Admin/') ?>plugins/jquery-mapael/maps/usa_states.min.js"></script>
<!-- ChartJS -->
<script src="<?= base_url('asset/Admin/') ?>plugins/chart.js/Chart.min.js"></script>

<!-- AdminLTE for demo purposes -->
<!-- <script src="<?= base_url('asset/Admin/') ?>dist/js/demo.js"></script> -->
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="<?= base_url('asset/Admin/') ?>dist/js/pages/dashboard2.js"></script>
<!-- DataTables  & Plugins -->
<script src="<?= base_url('asset/Admin/') ?>plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url('asset/Admin/') ?>plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?= base_url('asset/Admin/') ?>plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?= base_url('asset/Admin/') ?>plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="<?= base_url('asset/Admin/') ?>plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="<?= base_url('asset/Admin/') ?>plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="<?= base_url('asset/Admin/') ?>plugins/jszip/jszip.min.js"></script>
<script src="<?= base_url('asset/Admin/') ?>plugins/pdfmake/pdfmake.min.js"></script>
<script src="<?= base_url('asset/Admin/') ?>plugins/pdfmake/vfs_fonts.js"></script>
<script src="<?= base_url('asset/Admin/') ?>plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="<?= base_url('asset/Admin/') ?>plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="<?= base_url('asset/Admin/') ?>plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<!-- Summernote -->
<script src="<?= base_url('asset/Admin/') ?>plugins/summernote/summernote-bs4.min.js"></script>
<script>
	$(function() {
		$("#example1").DataTable({
			"responsive": true,
			"lengthChange": false,
			"autoWidth": false,
			"buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
		}).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
		$('#example2').DataTable({
			"paging": true,
			"lengthChange": false,
			"searching": false,
			"ordering": true,
			"info": true,
			"autoWidth": false,
			"responsive": true,
		});
		$('.example1').DataTable({
			"paging": true,
			"lengthChange": false,
			"searching": false,
			"ordering": true,
			"info": true,
			"autoWidth": false,
			"responsive": true,
		});
	});
</script>
<script>
	$(function() {
		// Summernote
		$('#summernote').summernote()

		// CodeMirror

	})
</script>
<script>
	<?php
	$data_transaksi = $this->db->query("SELECT SUM(total_transaksi) as total, MONTH(tgl_transaksi) as bulan, YEAR(tgl_transaksi) as tahun  FROM `transaksi` WHERE stat_transaksi='3' GROUP BY MONTH(tgl_transaksi) AND YEAR(tgl_transaksi)")->result();
	foreach ($data_transaksi as $key => $value) {
		$total[] = $value->total;
		$tgl[] = 'Bln. ' . $value->bulan . 'Thn. ' . $value->tahun;
	}

	?>
	var ctx = document.getElementById('transaksi');
	var grafik = new Chart(ctx, {
		type: 'line',
		data: {
			labels: <?= json_encode($tgl) ?>,
			datasets: [{
				label: 'Grafik Penjualan Per Bulan',
				data: <?= json_encode($total) ?>,
				backgroundColor: 'rgba(127, 111, 134, 0.5)',
				borderColor: 'rgba(127, 111, 134, 0.5)',
				color: '#666',
				fill: false,
				borderWidth: 1
			}]
		},
		options: {
			scales: {
				yAxes: [{
					ticks: {
						beginAtZero: true
					}
				}]
			}
		}
	});
</script>
<script>
	<?php
	$dt_produk = $this->db->query("SELECT SUM(qty) as qty, nama_produk FROM `detail_tran` JOIN produk ON detail_tran.id_produk=produk.id_produk GROUP BY produk.id_produk")->result();
	foreach ($dt_produk as $key => $value) {
		$qty_produk[] = $value->qty;
		$nm_produk[] = $value->nama_produk;
	}

	?>
	var ctx = document.getElementById('produk');
	var grafik = new Chart(ctx, {
		type: 'bar',
		data: {
			labels: <?= json_encode($nm_produk) ?>,
			datasets: [{
				label: 'Grafik Penjualan Produk',
				data: <?= json_encode($qty_produk) ?>,
				backgroundColor: '#9C5555',
				borderColor: '#9C5555',
				color: '#666',
				fill: false,
				borderWidth: 1
			}]
		},
		options: {
			scales: {
				yAxes: [{
					ticks: {
						beginAtZero: true
					}
				}]
			}
		}
	});
</script>
</body>

</html>
