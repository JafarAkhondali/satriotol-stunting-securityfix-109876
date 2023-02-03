<?= get_header(); ?>

<!-- <link href="https://cdn.jsdelivr.net/npm/swiper@9.0.0/swiper.min.css" rel="stylesheet"> -->
<!-- <link href="https://cdn.jsdelivr.net/npm/swiper@9.0.0/swiper-bundle.min.css" rel="stylesheet"> -->
<!-- <link href="https://cdn.jsdelivr.net/npm/swiper@9.0.0/swiper-element.min.css" rel="stylesheet"> -->
<!-- <link href="https://cdn.jsdelivr.net/npm/swiper@9.0.0/swiper-element-bundle.min.css" rel="stylesheet"> -->

<link rel="stylesheet" href="<?= base_url(); ?>assets_stunting/css/owl-carousel.css">

<style type="text/css">
	.outer {
		margin: 0 auto;
		max-width: 800px;
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
		height: 300px;
		object-fit: cover;
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
		height: 70px;
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






	/* .swiper {
		height: 300px;
	} */

    swiper-slide {
      text-align: center;
      font-size: 18px;
      background: #fff;
      display: flex;
      justify-content: center;
      align-items: center;
    }

swiper-slide img {
  /* display: sw </swiper-slidek; */
  width: 100%;
  height: 100%;
  object-fit: cover;
}

swiper-slide {
  background-size: cover;
  background-position: center;
}

.mySwiper2 swiper-slide {
  width: 25%;
  height: 100%;
  opacity: 0.4;
}

.mySwiper2 .swiper-slide-thumb-active {
  opacity: 1;
}

swiper-slide img {
  /* display: sw </swiper-slidek; */
  width: 100%;
  height: 100%;
  object-fit: cover;
}
</style>

<main>
	<section class="event__area pt-55 pb-15">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="section__title-wrapper-2 text-center mb-60">
						<h3 class="section__title-2">Rembuk Stunting <?= $rembuks->rembuk_stunting_year;?></h3>
					</div>
				</div>
			</div>
		</div>
	</section>

	<?php
		if (!empty($rembuks->rembuk_stunting_id)) {
	?>
	<section class="certificate__area pb-120 pt-30">
		<div class="container">
			<div class="certificate__inner grey-bg-9 p-relative" style="padding: 35px 45px;">
				<div class="row">
			<?php
				if (!empty($rembuks->rembuk_stunting_galery_image) || $rembuks->rembuk_stunting_galery_image != NULL) {
					$expl_galery = explode(',', $rembuks->rembuk_stunting_galery_image);
			?>
					<div class="col-md-6">
						<div class="certificate__content">
							<div class="outer">
								<div id="big" class="owl-carousel owl-theme">
			<?php

					for ($i=0; $i < count($expl_galery); $i++) {
			?>
									<div class="item">
										<img src="<?= base_url()."uploads/rembuk_stunting_galery".$expl_galery[$i];?>" />
									</div>
			<?php
					}
			?>
								</div>
								<div id="thumbs" class="owl-carousel owl-theme">
			<?php

					for ($i=0; $i < count($expl_galery); $i++) {
			?>
									<div class="item">
										<img src="<?= base_url()."uploads/rembuk_stunting_galery".$expl_galery[$i];?>" />
									</div>
			<?php
					}
			?>
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-6">
			<?php
				}else{
			?>
					<div class="col-md-12">
			<?php
				}
			?>
						<div class="certificate__content">
							<p><?php echo $rembuks->rembuk_stunting_deskripsi; ?></p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<?php
		}
	?>
</main>


	<script type="text/javascript" src="<?= base_url();?>/assets_stunting/js/vendor/jquery.js"></script>
	<script type="text/javascript" src="<?= base_url();?>/assets_stunting/js/vendor/waypoints.js"></script>
	<script type="text/javascript" src="<?= base_url();?>/assets_stunting/js/bootstrap-bundle.js"></script>
	<script type="text/javascript" src="<?= base_url();?>/assets_stunting/js/meanmenu.js"></script>
	<script type="text/javascript" src="<?= base_url();?>/assets_stunting/js/swiper-bundle.js"></script>
	<script type="text/javascript" src="<?= base_url();?>/assets_stunting/js/owl-carousel.js"></script>



<!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/swiper@9.0.0/swiper-bundle.min.js"></script> -->
<!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/swiper@9.0.0/swiper-element.min.js"></script> -->
<!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/swiper@9.0.0/swiper-element-bundle.min.js"></script> -->
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
				autoplayTimeout: 3000,
				dots: false,
				loop: true,
				responsiveRefreshRate: 200,
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
				smartSpeed: 200,
				slideSpeed: 200,
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