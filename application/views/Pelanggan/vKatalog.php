<!-- Hero Section Begin -->
<section class="hero">
	<div class="hero__slider owl-carousel">
		<img style="width: auto;" src="<?= base_url('asset/banner.png') ?>">
		<img style="width: auto;" src="<?= base_url('asset/banner.png') ?>">


	</div>
</section>
<!-- Hero Section End -->



<!-- Product Section Begin -->
<hr>
<?php
if ($this->session->userdata('success') != '') {
?>
	<div class="alert alert-success" role="alert">
		<?= $this->session->userdata('success') ?>
	</div>
<?php
}
?>

<section class="product spad mt-5">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<ul class="filter__controls">
					<li class="active" data-filter="*">Semua</li>
					<?php
					foreach ($kategori as $key => $value) {
						$kategori = $value->kategori_produk;
						$code = str_replace(" ", "-", $kategori);
					?>
						<li data-filter=".<?= $code ?>"><?= $value->kategori_produk ?></li>
					<?php
					}
					?>
				</ul>
			</div>
		</div>
		<div class="row product__filter">
			<?php
			foreach ($produk as $key => $value) {
				$kategori = $value->kategori_produk;
				$code = str_replace(" ", "-", $kategori);
			?>
				<div class="col-lg-3 col-md-6 col-sm-6 col-md-6 col-sm-6 mix <?= $code ?>">
					<div class="product__item">
						<div class="product__item__pic set-bg" data-setbg="<?= base_url('asset/produk/' . $value->foto) ?>">
							<ul class="product__hover">

								<li><a href="#"><img src="<?= base_url('asset/malefashion-master/') ?>img/icon/search.png" alt=""></a></li>
							</ul>
						</div>
						<div class="product__item__text">
							<h6><?= $value->nama_produk ?></h6>
							<a href="<?= base_url('Pelanggan/cKatalog/add_cart/' . $value->id_produk) ?>" class="add-cart">+ Add To Cart</a>
							<!-- <div class="rating">
								<i class="fa fa-star-o"></i>
								<i class="fa fa-star-o"></i>
								<i class="fa fa-star-o"></i>
								<i class="fa fa-star-o"></i>
								<i class="fa fa-star-o"></i>
							</div> -->
							<h5>Rp. <?= number_format($value->harga)  ?></h5>

						</div>
					</div>
				</div>
			<?php
			}
			?>


		</div>
	</div>
</section>
<!-- Product Section End -->
