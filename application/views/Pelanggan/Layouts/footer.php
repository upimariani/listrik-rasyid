<!-- Footer Section Begin -->
<footer class="footer">
	<div class="container">

		<div class="row">
			<div class="col-lg-12 text-center">
				<div class="footer__copyright__text">
					<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
					<p>Copyright ©
						<script>
							document.write(new Date().getFullYear());
						</script>
						LISTRIK RASYID SYIDIQ | KUNINGAN <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">ARIEF</a>
					</p>
					<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
				</div>
			</div>
		</div>
	</div>
</footer>
<!-- Footer Section End -->



<!-- Js Plugins -->
<script src="<?= base_url('asset/malefashion-master/') ?>js/jquery-3.3.1.min.js"></script>
<script src="<?= base_url('asset/malefashion-master/') ?>js/bootstrap.min.js"></script>
<script src="<?= base_url('asset/malefashion-master/') ?>js/jquery.nice-select.min.js"></script>
<script src="<?= base_url('asset/malefashion-master/') ?>js/jquery.nicescroll.min.js"></script>
<script src="<?= base_url('asset/malefashion-master/') ?>js/jquery.magnific-popup.min.js"></script>
<script src="<?= base_url('asset/malefashion-master/') ?>js/jquery.countdown.min.js"></script>
<script src="<?= base_url('asset/malefashion-master/') ?>js/jquery.slicknav.js"></script>
<script src="<?= base_url('asset/malefashion-master/') ?>js/mixitup.min.js"></script>
<script src="<?= base_url('asset/malefashion-master/') ?>js/owl.carousel.min.js"></script>
<script src="<?= base_url('asset/malefashion-master/') ?>js/main.js"></script>
<script>
	function highlightStar(obj, id) {
		removeHighlight(id);
		$('#rate-' + id + ' li').each(function(index) {
			$(this).addClass('highlight');
			if (index == $('#rate-' + id + ' li').index(obj)) {
				return false;
			}
		});
	}

	// event yang terjadi pada saat kita mengarahkan kursor kita ke sebuah object
	function removeHighlight(id) {
		$('#rate-' + id + ' li').removeClass('selected');
		$('#rate-' + id + ' li').removeClass('highlight');
	}

	function addRating(obj, id) {
		$('#rate-' + id + ' li').each(function(index) {
			$(this).addClass('selected');
			$('#rate-' + id + ' #rating').val((index + 1));
			if (index == $('#rate-' + id + ' li').index(obj)) {
				return false;
			}
		});
		$.ajax({
			url: "<?php echo base_url('berita/tambah_rating'); ?>",
			data: 'id=' + id + '&rating=' + $('#rate-' + id + ' #rating').val(),
			type: "POST"
		});
	}

	function resetRating(id) {
		if ($('#rate-' + id + ' #rating').val() != 0) {
			$('#rate-' + id + ' li').each(function(index) {
				$(this).addClass('selected');
				if ((index + 1) == $('#rate-' + id + ' #rating').val()) {
					return false;
				}
			});
		}
	}
</script>
</body>

</html>
