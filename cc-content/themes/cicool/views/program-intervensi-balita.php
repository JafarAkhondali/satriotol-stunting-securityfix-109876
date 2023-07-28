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
						<h3 class="section__title-2">Program Intervensi Balita</h3>
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
										<img src="<?= base_url().'uploads/program-intervensi-balita/Slide-'.($i+1);?>.jpg"/>
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
										<img src="<?= base_url().'uploads/program-intervensi-balita/Slide-'.($i+1);?>.jpg"/>
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
							<p>Program intervensi untuk balita adalah upaya khusus yang dilakukan untuk meningkatkan kesehatan, nutrisi, dan perkembangan anak-anak pada usia balita, yaitu antara 1 hingga 5 tahun. Program ini bertujuan untuk mencegah masalah kesehatan dan pertumbuhan yang potensial pada masa kanak-kanak yang penting ini. Berikut beberapa contoh program intervensi untuk balita:</p>

							<ol>
								<li>
								<p>Pemberian ASI Eksklusif: Program ini mendorong ibu untuk memberikan Air Susu Ibu (ASI) secara eksklusif selama 6 bulan pertama kehidupan bayi. ASI mengandung semua nutrisi yang diperlukan untuk pertumbuhan dan perkembangan yang optimal.</p>
								</li>
								<li>
								<p>Pemberian Makanan Pendamping ASI (MP-ASI): Program ini membantu orang tua dan pengasuh dalam memberikan makanan tambahan yang sesuai dan bergizi kepada bayi setelah usia 6 bulan. MP-ASI harus mengandung makanan yang bervariasi dan kaya gizi untuk memenuhi kebutuhan anak pada masa pertumbuhan ini.</p>
								</li>
								<li>
								<p>Pemantauan Pertumbuhan dan Gizi: Program ini melibatkan pemantauan rutin pertumbuhan dan status gizi anak secara berkala. Jika terdapat masalah pertumbuhan atau gizi, tindakan koreksi dapat diambil lebih awal.</p>
								</li>
								<li>
								<p>Imunisasi: Program imunisasi balita memastikan anak-anak menerima vaksinasi yang diperlukan untuk mencegah penyakit menular yang berbahaya.</p>
								</li>
								<li>
								<p>Pendidikan Kesehatan dan Gizi: Program ini memberikan pendidikan kepada orang tua dan pengasuh tentang pola makan sehat, pencegahan penyakit, dan pentingnya perawatan kesehatan untuk anak-anak.</p>
								</li>
								<li>
								<p>Stimulasi dan Perkembangan Anak: Program ini bertujuan untuk mendorong perkembangan fisik, mental, dan emosional balita melalui rangsangan dan aktivitas yang sesuai dengan usia.</p>
								</li>
								<li>
								<p>Pemberian Suplemen Gizi: Pemberian suplemen gizi, seperti tablet tambahan zat besi (TTD) atau vitamin, dapat diberikan untuk mencegah kekurangan nutrisi yang mungkin terjadi pada balita.</p>
								</li>
								<li>
								<p>Bimbingan dan Dukungan Keluarga: Program ini memberikan bimbingan dan dukungan kepada keluarga dalam merawat dan memberikan perhatian yang baik pada anak-anak balita.</p>
								</li>
							</ol>

							<p>Program intervensi balita dilaksanakan oleh pemerintah, lembaga kesehatan, organisasi masyarakat, dan lembaga non-pemerintah lainnya untuk memastikan bahwa anak-anak mendapatkan perawatan dan lingkungan yang mendukung pertumbuhan dan perkembangan yang sehat.</p>
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