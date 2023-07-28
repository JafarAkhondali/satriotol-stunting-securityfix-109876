<?= get_header(); ?>

<link rel="stylesheet" href="<?= base_url(); ?>assets_stunting/css/owl-carousel.css">

<style type="text/css">
	.outer {
		margin: 0 auto;
		max-width: 100%;
	}
	#big .item {
		/* background: #ec6e46;
		padding: 120px 0px; */
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
	/* #big.owl-theme {
		position: relative;
	} */
	/* #big.owl-theme .owl-next,
	#big.owl-theme .owl-prev {
		background: #333;
		width: 22px;
		line-height: 40px;
		height: 40px;
		margin-top: -20px;
		position: absolute;
		text-align: center;
		top: 50%;
	} */
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

	/* 
	#big.owl-theme .owl-prev {
		left: 10px;
	}
	#big.owl-theme .owl-next {
		right: 10px;
	}
	*/
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
						<h3 class="section__title-2">Percepatan Penurunan Stunting</h3>
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
	for ($i=0; $i < 5; $i++) {
?>
									<div class="item">
										<img src="<?= base_url().'uploads/penurunan-percepatan-stunting/Slide-'.($i+1);?>.jpg"/>
									</div>
<?php
	}
?>
								</div>
								<div id="thumbs" class="owl-carousel owl-theme">
<?php
	for ($i=0; $i < 5; $i++) {
?>
									<div class="item">
										<img src="<?= base_url().'uploads/penurunan-percepatan-stunting/Slide-'.($i+1);?>.jpg"/>
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
							<p>Percepatan penurunan stunting merupakan upaya untuk mengurangi tingkat stunting pada anak-anak di bawah usia lima tahun secara lebih cepat dan efektif. Stunting adalah kondisi gagal tumbuh pada anak yang disebabkan oleh kekurangan gizi kronis, terutama pada periode 1.000 hari pertama kehidupan anak, yaitu sejak masa kehamilan hingga usia 2 tahun.</p>

							<p>Berikut beberapa informasi tentang percepatan penurunan stunting:</p>

							<ol>
								<li>
								<p>Peningkatan Akses pada Gizi yang Baik: Salah satu langkah penting dalam percepatan penurunan stunting adalah meningkatkan akses masyarakat terhadap makanan bergizi dan ketersediaan sumber gizi yang berkualitas. Ini termasuk promosi dan pendampingan untuk memberikan akses pada makanan yang mengandung zat besi, protein, vitamin, mineral, dan gizi penting lainnya.</p>
								</li>
								<li>
								<p>Peningkatan Praktik Pemberian ASI Eksklusif: ASI eksklusif (Air Susu Ibu) selama 6 bulan pertama kehidupan adalah salah satu cara paling efektif untuk mencegah stunting dan memberikan nutrisi yang diperlukan bagi pertumbuhan bayi. Meningkatkan kesadaran dan dukungan terhadap praktik ASI eksklusif merupakan bagian penting dalam percepatan penurunan stunting.</p>
								</li>
								<li>
								<p>Perbaikan Pola Makan pada Anak Balita: Makanan pendamping ASI (MP-ASI) yang diberikan setelah 6 bulan harus mencakup makanan yang bergizi dan bervariasi. Perbaikan pola makan pada anak balita dapat membantu memenuhi kebutuhan gizi mereka untuk tumbuh dan berkembang dengan baik.</p>
								</li>
								<li>
								<p>Penyuluhan dan Edukasi: Memberikan penyuluhan dan edukasi kepada masyarakat, khususnya ibu hamil dan ibu menyusui, tentang pentingnya gizi yang baik dan praktik makan yang sehat dapat membantu meningkatkan kesadaran dan perubahan perilaku terkait gizi.</p>
								</li>
								<li>
								<p>Deteksi Dini dan Intervensi Medis: Deteksi dini kasus stunting dan intervensi medis yang tepat pada anak-anak yang berisiko dapat membantu mengurangi dampak buruk dari stunting dan meningkatkan pertumbuhan mereka.</p>
								</li>
								<li>
								<p>Keterlibatan Komunitas dan Pemerintah: Percepatan penurunan stunting memerlukan kerja sama dari berbagai pihak, termasuk pemerintah, lembaga kesehatan, masyarakat, dan sektor swasta. Kolaborasi dan keterlibatan aktif semua pihak adalah kunci untuk mencapai hasil yang maksimal dalam mengatasi masalah stunting.</p>
								</li>
							</ol>

							<p>Percepatan penurunan stunting adalah upaya bersama yang kompleks dan berkelanjutan. Program dan strategi yang berfokus pada aspek kesehatan, gizi, pendidikan, dan kesejahteraan masyarakat secara keseluruhan dapat membantu mencapai penurunan tingkat stunting yang signifikan dan berkelanjutan.</p>

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
		//var totalslides = 10;
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





	/* const swiper = new Swiper('.mySwiper', {
		loop: true,
		autoplay: {
			delay: 2000,
			disableOnInteraction: false,
		},
	}); */
</script>

<?= get_footer(); ?>