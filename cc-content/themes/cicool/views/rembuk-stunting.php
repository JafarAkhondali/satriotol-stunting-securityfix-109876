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
						<h3 class="section__title-2">Rembuk Stunting <?= date('Y', strtotime('-1 year'));;?></h3>
					</div>
				</div>
			</div>
		</div>
	</section>

	<section class="certificate__area pb-120 pt-30">
		<div class="container">
			<div class="certificate__inner grey-bg-9 p-relative" style="padding: 35px 45px;">
				<div class="row">
					<div class="col-md-6">
						<div class="certificate__content">
							<div class="outer">
								<div id="big" class="owl-carousel owl-theme">
							<?php
								for ($i=0; $i < 10; $i++) {
							?>
									<div class="item">
										<img src="https://swiperjs.com/demos/images/nature-<?php echo $i+1;?>.jpg" />
									</div>
							<?php
								}
							?>
								</div>
								<div id="thumbs" class="owl-carousel owl-theme">
							<?php
								for ($i=0; $i < 10; $i++) {
							?>
									<div class="item">
										<img src="https://swiperjs.com/demos/images/nature-<?php echo $i+1;?>.jpg" />
									</div>
							<?php
								}
							?>
								</div>
							</div>


						<!-- 	<swiper-container style="--swiper-navigation-color: #fff; --swiper-pagination-color: #fff" class="mySwiper" thumbs-swiper=".mySwiper2" loop="true" space-between="10" navigation="true">
								<swiper-slide>
								<img src="https://swiperjs.com/demos/images/nature-1.jpg" />
								</swiper-slide>
								<swiper-slide>
								<img src="https://swiperjs.com/demos/images/nature-2.jpg" />
								</swiper-slide>
								<swiper-slide>
								<img src="https://swiperjs.com/demos/images/nature-3.jpg" />
								</swiper-slide>
								<swiper-slide>
								<img src="https://swiperjs.com/demos/images/nature-4.jpg" />
								</swiper-slide>
								<swiper-slide>
								<img src="https://swiperjs.com/demos/images/nature-5.jpg" />
								</swiper-slide>
								<swiper-slide>
								<img src="https://swiperjs.com/demos/images/nature-6.jpg" />
								</swiper-slide>
								<swiper-slide>
								<img src="https://swiperjs.com/demos/images/nature-7.jpg" />
								</swiper-slide>
								<swiper-slide>
								<img src="https://swiperjs.com/demos/images/nature-8.jpg" />
								</swiper-slide>
								<swiper-slide>
								<img src="https://swiperjs.com/demos/images/nature-9.jpg" />
								</swiper-slide>
								<swiper-slide>
								<img src="https://swiperjs.com/demos/images/nature-10.jpg" />
								</swiper-slide>
							</swiper-container>

							<swiper-container class="mySwiper2" loop="true" space-between="10" slides-per-view="4" free-mode="true" watch-slides-progress="true">
								<swiper-slide>
								<img src="https://swiperjs.com/demos/images/nature-1.jpg" />
								</swiper-slide>
								<swiper-slide>
								<img src="https://swiperjs.com/demos/images/nature-2.jpg" />
								</swiper-slide>
								<swiper-slide>
								<img src="https://swiperjs.com/demos/images/nature-3.jpg" />
								</swiper-slide>
								<swiper-slide>
								<img src="https://swiperjs.com/demos/images/nature-4.jpg" />
								</swiper-slide>
								<swiper-slide>
								<img src="https://swiperjs.com/demos/images/nature-5.jpg" />
								</swiper-slide>
								<swiper-slide>
								<img src="https://swiperjs.com/demos/images/nature-6.jpg" />
								</swiper-slide>
								<swiper-slide>
								<img src="https://swiperjs.com/demos/images/nature-7.jpg" />
								</swiper-slide>
								<swiper-slide>
								<img src="https://swiperjs.com/demos/images/nature-8.jpg" />
								</swiper-slide>
								<swiper-slide>
								<img src="https://swiperjs.com/demos/images/nature-9.jpg" />
								</swiper-slide>
								<swiper-slide>
								<img src="https://swiperjs.com/demos/images/nature-10.jpg" />
								</swiper-slide>
							</swiper-container> -->

							<!-- <div class="swiper">
								<div class="swiper-wrapper">
									<div class="swiper-slide">Slide 1</div>
									<div class="swiper-slide">Slide 2</div>
									<div class="swiper-slide">Slide 3</div>
								</div>
								<div class="swiper-pagination"></div>
							</div> -->
						</div>
					</div>
					<div class="col-md-6">
						<div class="certificate__content">
							<p><?php echo $about->about_description; ?></p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>


	<!-- <section class="event__area pt-115 pb-115">
		<div class="container">
			<div class="row">
				<div class="col-xxl-12">
					<div class="section__title-wrapper-2 text-center mb-60">
						<h3 class="section__title-2">Rembuk Stunting <?= date('Y', strtotime('-1 year'));;?></h3>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="project-details-area default-padding">
					<div class="container">
						<div class="project-details-items">
							<div class="thumb">
								<img src="assets/img/1500x700.png" alt="Thumb">
							</div>
							<div class="top-info">
								<div class="row">
									<div class="col-lg-12">
										<h2>Business Planing & Solution</h2>
										<p>
											New had happen unable uneasy. Drawings can followed improved out sociable not. Earnestly so do instantly pretended. See general few civilly amiable pleased account carried. Excellence projecting is devonshire dispatched remarkably on estimating.
										</p>
										<p>
											Netus lorem rutrum arcu dignissim at sit morbi phasellus nascetur eget urna potenti cum vestibulum cras. Tempor nonummy metus lobortis. Sociis velit etiam, dapibus. Lectus vehicula pellentesque cras posuere tempor facilisi habitant lectus rutrum pede quisque hendrerit parturient posuere mauris ad elementum fringilla facilisi volutpat fusce pharetra felis sapien varius quisque class convallis praesent est sollicitudin donec nulla venenatis, cursus fermentum netus posuere sociis porta risus habitant malesuada nulla habitasse hymenaeos. Viverra curabitur nisi vel sollicitudin dictum natoqu.
										</p>
									</div>
								</div>
							</div>

							<div class="main-content">
								
								<p>
									Give lady of they such they sure it. Me contained explained my education. Vulgar as hearts by garret. Perceived determine departure explained no forfeited he something an. Contrasted dissimilar get joy you instrument out reasonably. Again keeps at no meant stuff. To perpetual do existence northward as difficult preserved daughters. Continued at up to zealously necessary breakfast. Surrounded sir motionless she end literature. Gay direction neglected but supported yet her.  Facilisis inceptos nec, potenti nostra aenean lacinia varius semper ant nullam nulla primis placerat facilisis. Netus lorem rutrum arcu dignissim at sit morbi phasellus nascetur eget urna potenti cum vestibulum cras. Tempor nonummy metus lobortis. Sociis velit etiam, dapibus. Lectus vehicula pellentesque cras posuere tempor facilisi habitant lectus rutrum pede quisque hendrerit parturient posuere mauris ad elementum fringilla facilisi volutpat fusce pharetra felis sapien varius quisque class convallis praesent est sollicitudin donec nulla venenatis, cursus fermentum netus posuere sociis porta risus habitant malesuada nulla habitasse hymenaeos. Viverra curabitur nisi vel sollicitudin dictum natoque ante aenean elementum curae malesuada ullamcorper. vivamus nonummy nisl posuere rutrum
								</p>
								<div class="row">
									<div class="col-lg-6 col-md-6">
										<img src="assets/img/800x600.png" alt="Thumb">
									</div>
									<div class="col-lg-6 col-md-6">
										<img src="assets/img/800x600.png" alt="Thumb">
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section> -->
	<!-- event area end -->
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