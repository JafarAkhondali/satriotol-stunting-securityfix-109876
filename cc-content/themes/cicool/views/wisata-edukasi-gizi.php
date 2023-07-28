<?= get_header(); ?>

<link rel="stylesheet" href="<?= base_url(); ?>assets_stunting/css/owl-carousel.css">

<style type="text/css">
	.outer {
		margin: 0 auto;
		max-width: 100%;
	}
	#big .item {
		margin: 2px;
		color: #fff;
		border-radius: 3px;
		text-align: center;
	}
	#big .item img {
		height: 500px;
		object-fit: fill;
		width: 100%;
		border-radius: 5px;
	}

	#thumbs .item {
		background: #c9c9c9;
		height: 150px;
		line-height: 70px;
		padding: 0px;
		margin: 2px;
		color: #fff;
		border-radius: 3px;
		text-align: center;
		cursor: pointer;
	}
	#thumbs .item h1 {
		font-size: 18px;
	}
	#thumbs .item img{
		object-fit: cover;
    	height: 100%;
	}
	#thumbs .current .item {
		background: #ff5722;
	}
	#thumbs .owl-nav {
		text-align: center;
	}
	.owl-theme .owl-nav [class*="owl-"] {
		-webkit-transition: all 0.3s ease;
		transition: all 0.3s ease;
		color: #FFF;
		font-size: 14px;
		margin: 5px;
		padding: 4px 7px;
		background: #D6D6D6;
		display: inline-block;
		cursor: pointer;
		-webkit-border-radius: 3px;
		-moz-border-radius: 3px;
		border-radius: 3px;
	}
	.owl-theme .owl-nav [class*="owl-"].disabled:hover {
		background-color: #d6d6d6;
	}
	.owl-theme .owl-nav {
		margin-top: 10px;
		text-align: center;
		-webkit-tap-highlight-color: transparent;
	}

	#thumbs.owl-theme .owl-next, #thumbs.owl-theme .owl-prev {
		background: #333;
	}
</style>

<main>
	<section class="event__area pt-55 pb-15">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="section__title-wrapper-2 text-center mb-60">
						<h3 class="section__title-2">Wisata-Edukasi Gizi</h3>
					</div>
				</div>
			</div>
		</div>
	</section>

	<section class="certificate__area pb-120 pt-30">
		<div class="container">
			<div class="certificate__inner grey-bg-9 p-relative" style="padding: 35px 45px;">
				<div class="row">
					<div class="col-md-12">
						<div class="certificate__content">
							<div class="outer">
								<div id="big" class="owl-carousel owl-theme">
<?php
	for ($i=0; $i < 2; $i++) {
?>
									<div class="item">
										<img src="<?= base_url().'uploads/wisata-edukasi-gizi/slide-'.($i+1);?>"/>
									</div>
<?php
	}
?>
								</div>
								<div id="thumbs" class="owl-carousel owl-theme">
<?php
	for ($i=0; $i < 2; $i++) {
?>
									<div class="item">
										<img src="<?= base_url().'uploads/wisata-edukasi-gizi/slide-'.($i+1);?>"/>
									</div>
<?php
	}
?>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="row mt-45" style="text-align: justify;">
					<div class="col-md-12">
						<div class="certificate__content">
							<p>Wisata Edukasi Gizi adalah jenis wisata yang menawarkan pengalaman belajar tentang gizi dan pola makan sehat melalui interaksi langsung dengan berbagai aspek terkait gizi, makanan, dan kehidupan sehat. Tujuan dari wisata edukasi gizi adalah untuk meningkatkan kesadaran dan pengetahuan tentang pentingnya gizi yang baik dan pola makan sehat bagi kesehatan dan kualitas hidup.</p>
							<p>Berikut adalah beberapa contoh tempat atau bentuk wisata edukasi gizi:</p>
							<ol>
								<li>
								<p>Pabrik Makanan atau Pertanian Organik: Kunjungan ke pabrik makanan atau pertanian organik memungkinkan peserta untuk melihat bagaimana makanan diproduksi dengan cara yang sehat dan alami. Mereka dapat mempelajari tentang proses pengolahan makanan yang sehat dan mengenali manfaat dari makanan organik.</p>
								</li>
								<li>
								<p>Kebun atau Taman Pendidikan Gizi: Beberapa tempat memiliki kebun atau taman pendidikan gizi di mana pengunjung dapat belajar tentang berbagai jenis makanan, sumber nutrisi, dan bagaimana menanam makanan yang sehat di rumah.</p>
								</li>
								<li>
								<p>Pameran Gizi dan Sentra Pelayanan Gizi: Beberapa pusat kesehatan atau pameran gizi menyediakan informasi dan materi edukasi tentang gizi sehat, perilaku makan yang baik, dan menu makanan seimbang. Pengunjung dapat berkonsultasi dengan ahli gizi dan mendapatkan tips tentang cara memilih dan mempersiapkan makanan sehat.</p>
								</li>
								<li>
								<p>Kunjungan ke Pasar Tradisional atau Supermarket: Peserta dapat diajak untuk mengunjungi pasar tradisional atau supermarket dan mempelajari cara memilih bahan makanan yang segar dan bergizi, membaca label gizi pada kemasan produk makanan, serta memahami cara membedakan makanan olahan dan makanan alami.</p>
								</li>
								<li>
								<p>Workshop Memasak Sehat: Mengikuti workshop memasak sehat memungkinkan peserta untuk belajar cara memasak makanan dengan cara yang sehat dan menyenangkan. Mereka dapat mempelajari resep makanan bergizi dan cara memadukan berbagai bahan makanan untuk menciptakan hidangan sehat.</p>
								</li>
								<li>
								<p>Taman atau Pusat Interaktif Gizi: Beberapa tempat memiliki taman atau pusat interaktif yang didesain khusus untuk edukasi gizi. Pengunjung dapat berpartisipasi dalam permainan dan aktivitas interaktif yang mengajarkan tentang gizi dan pentingnya pola makan sehat.</p>
								</li>
							</ol>

							<p>Wisata edukasi gizi merupakan cara yang menyenangkan dan interaktif untuk meningkatkan pemahaman tentang gizi dan pentingnya pola makan sehat. Ini juga dapat menjadi kesempatan untuk melibatkan keluarga, anak-anak, dan masyarakat secara lebih luas dalam upaya meningkatkan kesadaran tentang pentingnya gaya hidup sehat dan pola makan yang baik.</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
</main>


<script type="text/javascript" src="<?= base_url();?>/assets_stunting/js/vendor/jquery.js"></script>
<script type="text/javascript" src="<?= base_url();?>/assets_stunting/js/vendor/waypoints.js"></script>
<script type="text/javascript" src="<?= base_url();?>/assets_stunting/js/bootstrap-bundle.js"></script>
<script type="text/javascript" src="<?= base_url();?>/assets_stunting/js/meanmenu.js"></script>
<script type="text/javascript" src="<?= base_url();?>/assets_stunting/js/swiper-bundle.js"></script>
<script type="text/javascript" src="<?= base_url();?>/assets_stunting/js/owl-carousel.js"></script>

<script type="text/javascript">
	$(document).ready(function() {
		var bigimage 	= $("#big");
		var thumbs 		= $("#thumbs");

		var syncedSecondary = true;

		bigimage
			.owlCarousel({
				items: 1,
				// slideSpeed: 2500,
				nav: false,
				autoplay: true,
				autoplayTimeout: 4000,
				dots: false,
				loop: true,
				responsiveRefreshRate: 120,
			})
			.on("changed.owl.carousel", syncPosition);

		thumbs
			.on("initialized.owl.carousel", function() {
				thumbs
					.find(".owl-item")
					.eq(0)
					.addClass("current");
			})
			.owlCarousel({
				// items: 4,
				dots: true,
				nav: false,
				navText: [
					'<i class="fa fa-arrow-left"></i>',
					'<i class="fa fa-arrow-right"></i>'
				],
				smartSpeed: 300,
				slideSpeed: 300,
				// slideBy: 2,
				responsiveRefreshRate: 120
			})
			.on("changed.owl.carousel", syncPosition2);

		function syncPosition(el) {
			//if loop is set to false, then you have to uncomment the next line
			//var current = el.item.index;

			//to disable loop, comment this block
			var count = el.item.count - 1;
			var current = Math.round(el.item.index - el.item.count / 2 - 0.5);

			if (current < 0) {
				current = count;
			}
			if (current > count) {
				current = 0;
			}
			//to this
			thumbs
				.find(".owl-item")
				.removeClass("current")
				.eq(current)
				.addClass("current");
			var onscreen = thumbs.find(".owl-item.active").length - 1;
			var start = thumbs
				.find(".owl-item.active")
				.first()
				.index();
			var end = thumbs
				.find(".owl-item.active")
				.last()
				.index();
			if (current > end) {
				thumbs.data("owl.carousel").to(current, 100, true);
			}
			if (current < start) {
				thumbs.data("owl.carousel").to(current - onscreen, 100, true);
			}
		}

		function syncPosition2(el) {
			if (syncedSecondary) {
				var number = el.item.index;
				bigimage.data("owl.carousel").to(number, 100, true);
			}
		}

		thumbs.on("click", ".owl-item", function(e) {
			e.preventDefault();
			var number = $(this).index();
			bigimage.data("owl.carousel").to(number, 300, true);
		});
	});
</script>

<?= get_footer(); ?>