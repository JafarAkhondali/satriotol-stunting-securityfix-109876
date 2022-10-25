<?= get_header(); ?>

<main>
	<!-- slider area start -->
	<section class="slider__area">
		<div class="slider__active swiper-container">
			<div class="swiper-wrapper">
				<?php foreach ($sliders as $slider) { ?>
				<div
					class="slider__item swiper-slide p-relative slider__height slider__height-3 d-flex align-items-center z-index-1">
					<div class="slider__bg slider__overlay slider__overlay-3 include-bg"
						data-background="<?php echo base_url(); ?>uploads/sliders/<?php echo $slider->slider_image; ?>">
					</div>
					<div class="carousel-caption">
						<h2><?php echo $slider->slider_title; ?></h2>
						<div class="carousel-caption-description">
							<p><?php echo $slider->slider_subtitle; ?></p>
						</div>
					</div>
				</div>
				<?php } ?>
			</div>
			<div class="main-slider-paginations main-slider-paginations-2">
				<button class="slider-button-next"><i class="fa-regular fa-arrow-right"></i></button>
				<button class="slider-button-prev"><i class="fa-regular fa-arrow-left"></i></button>
			</div>
		</div>
	</section>
	<!-- slider area end -->
	<!-- certificate area start -->
	<section class="certificate__area pb-120 pt-120">
		<div class="container">
			<div class="certificate__inner grey-bg-9 p-relative">
				<div class="certificate__thumb">
					<img src="<?= base_url();?>assets_stunting/img/certificate/certificate.png" alt="">
				</div>
				<div class="row">
					<div class="col-xxl-6">
						<div class="certificate__content">
							<div class="section__title-wrapper mb-10">
								<span class="section__title-pre-3">Stunting Kota Semarang</span>
								<h2 class="section__title section__title-44">Kata Pengantar</h2>
							</div>
							<p><?php echo $about->about_description;?></p>
							<div class="certificate__links d-sm-flex align-items-center">
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<section class="research__area research__border grey-bg-3 pt-115 pb-90 p-relative z-index-1">
		<div class="research__shape">
			<img class="research__shape-1 d-none d-sm-block" src="<?php echo base_url();?>assets_stunting/img/research/research-shape-1.png" alt="">
			<img class="research__shape-2 d-none d-sm-block" src="<?php echo base_url();?>assets_stunting/img/research/research-shape-2.png" alt="">
			<img class="research__shape-3" src="<?php echo base_url();?>assets_stunting/img/research/research-shape-3.png" alt="">
		</div>
		<div class="container">
			<div class="row">
				<a href="#pengertian-stunting" class="col-xxl-3 col-xl-3 col-lg-3 col-md-6">
					<div class="research__item research__item-border text-center mb-30 transition-3">
						<div class="research__thumb mb-35" style="font-size: 100pt;">
							<i class="fa-light fa-users"></i>
						</div>
						<div class="research__content">
							<h3 class="research__title">Pengertian Stunting</h3>
						</div>
					</div>
				</a>
				<a href="#penyebab-stunting" class="col-xxl-3 col-xl-3 col-lg-3 col-md-6">
					<div class="research__item research__item-border text-center mb-30 transition-3">
						<div class="research__thumb mb-35" style="font-size: 100pt; transform: rotate(-90deg);">
							<i class="fa-light fa-shoe-prints"></i>
						</div>
						<div class="research__content">
							<h3 class="research__title">Penyebab Stunting</h3>
						</div>
					</div>
				</a>
				<a href="javascript:void(0);" class="col-xxl-3 col-xl-3 col-lg-3 col-md-6">
					<div class="research__item research__item-border text-center mb-30 transition-3">
						<div class="research__thumb mb-35" style="font-size: 100pt;">
							<i class="fa-light fa-head-side-cough"></i>
						</div>
						<div class="research__content">
							<h3 class="research__title">Percepatan Penurunan Stunting</h3>
						</div>
					</div>
				</a>
				<a href="javascript:void(0);" class="col-xxl-3 col-xl-3 col-lg-3 col-md-6">
					<div class="research__item text-center mb-30 transition-3">
						<div class="research__thumb mb-35" style="font-size: 100pt;">
							<i class="fa-light fa-map-location-dot"></i>
						</div>
						<div class="research__content">
							<h3 class="research__title">Kota Semarang</h3>
						</div>
					</div>
				</a>
			</div>
		</div>
	</section>

	<!-- About Page -->
	<section id="pengertian-stunting" class="about__area pt-120 pb-120 p-relative">
		<div class="container">
			<div class="row">
				<div class="col-xxl-6 col-xl-6 col-lg-6">
					<div class="about__content pl-70 pr-25">
						<div class="section__title-wrapper mb-15">
							<h2 class="section__title">Pengertian Stunting</h2>
						</div>
						<p><?php echo $about->about_pengertian;?></p>
					</div>
				</div>
				<div class="col-xxl-6 col-xl-6 col-lg-6">
					<div class="about__thumb-wrapper d-sm-flex mr-20 p-relative">
						<div class="about__shape">
							<img class="about__shape-1 d-none d-sm-block" src="<?php echo base_url();?>assets_stunting/img/about/about-shape-1.png" alt="">
							<img class="about__shape-2 d-none d-sm-block" src="<?php echo base_url();?>assets_stunting/img/about/about-shape-2.png" alt="">
							<img class="about__shape-3" src="<?php echo base_url();?>assets_stunting/img/about/about-shape-3.png" alt="">
						</div>
						<div class="about__thumb-2 mb-10">
							<img src="<?php echo base_url();?>assets_stunting/stunting/pengertian.jpg" alt="Pengertian Stunting" style="width: 580px; border-radius: 20px;">
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<section id="penyebab-stunting" class="about__area pt-120 pb-120 p-relative">
		<div class="container">
			<div class="row">
				<div class="col-xxl-6 col-xl-6 col-lg-6">
					<div class="about__thumb-wrapper d-sm-flex mr-20 p-relative">
						<div class="about__shape">
							<img class="about__shape-1 d-none d-sm-block" src="<?php echo base_url();?>assets_stunting/img/about/about-shape-1.png" alt="">
							<img class="about__shape-2 d-none d-sm-block" src="<?php echo base_url();?>assets_stunting/img/about/about-shape-2.png" alt="">
							<img class="about__shape-3" src="<?php echo base_url();?>assets_stunting/img/about/about-shape-3.png" alt="">
						</div>
						<div class="about__thumb-2 mb-10">
							<img src="<?php echo base_url();?>assets_stunting/stunting/penyebab.jpg" alt="Penyebab Stunting" style="width: 580px; border-radius: 20px;">
						</div>
					</div>
				</div>
				<div class="col-xxl-6 col-xl-6 col-lg-6">
					<div class="about__content pl-25 pr-25">
						<div class="section__title-wrapper mb-15">
							<h2 class="section__title">Penyebab Stunting</h2>
						</div>
						<div class="about__list mb-40">
							<p><?php echo $about->about_penyebab;?></p>
                        </div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<!-- certificate area end -->
	<section id="berita-terbaru" class="course__area pt-115 pb-90 grey-bg-3">
		<div class="container">
			<div class="row">
				<div class="col-xxl-12">
					<div class="section__title-wrapper text-center mb-60">
						<h2 class="section__title section__title-44">Berita Terbaru</h2>
					</div>
				</div>
			</div>
			<div class="row">
				<?php foreach ($blogs as $blog) { ?>
				<div class="col-xxl-4 col-xl-4 col-lg-6 col-md-6">
					<div class="course__item white-bg transition-3 mb-30">
						<div class="course__thumb w-img fix">
							<a href="course-details.html">
								<img src="<?php echo base_url();?>uploads/blog/<?= $blog->image;?>" alt="">
							</a>
						</div>
						<div class="course__content p-relative">
							<div class="course__tag">
								<a href="#"><?= $blog->nama_kategori;?></a>
							</div>
							<h3 class="course__title">
								<a href="course-details.html"><?php echo $blog->title; ?></a>
							</h3>
							<p>
						<?php
							if (strlen($blog->content) < 120) {
								echo strip_tags($blog->content);
							}else{
								echo strip_tags(substr($blog->content, 0, 120)).'...';
							}
						?>
							</p>

							<div class="course__bottom d-sm-flex align-items-center justify-content-between">
								<div class="course__tutor">
									<a href="javascript:void(0);"><i class="fa fa-user"></i> <?= ucwords(strtolower($blog->user_username));?></a>
								</div>
						<?php
							if (strlen($blog->content) > 120) {
								echo '<div class="course__lesson"><a href="javascript:void(0);">Read more</a></div>';
							}
						?>
							</div>
						</div>
					</div>
				</div>
				<?php } ?>
			</div>
		</div>
	</section>
	<!-- course area start -->
	<!-- faq area start -->
	<section class="faq__area pt-20 pb-130">
		<div class="container">
			<div class="row">
				<div class="col-xxl-5 col-xl-5 col-lg-5">
					<div class="faq__wrapper pt-45 pr-25">
						<div class="section__title-wrapper mb-5">
							<span class="section__title-pre-3">Learn how to get started</span>
							<h2 class="section__title section__title-44">Frequently Asked Questions</h2>
						</div>
						<p>Join our club member community now to get free updates and also a lot of freebies are
							waiting for you or <a href="contact.html">Contact Us</a></p>
					</div>
				</div>
				<div class="col-xxl-7 col-xl-7 col-lg-7">
					<div class="faq__item-wrapper pl-100">
						<div class="faq__accordion">
							<div class="accordion" id="faqaccordion">
						<?php
							$no = '1';
							foreach ($faqs as $faq) {
						?>
							<div class="accordion-item">
								<h2 class="accordion-header" id="faq<?= $no;?>">
									<button class="accordion-button <?= $no != '1' ?  'collapsed' : '';?>" type="button" data-bs-toggle="collapse" data-bs-target="#collapse<?= $no;?>" aria-expanded="true" aria-controls="collapse<?= $no;?>">
										<?= $faq->faq_question;?>
									</button>
								</h2>
								<div id="collapse<?= $no;?>" class="accordion-collapse collapse <?= $no == '1' ?  'show' : '';?>" aria-labelledby="faq<?= $no;?>" data-bs-parent="#faqaccordion">
									<div class="accordion-body">
										<p><?= $faq->faq_answer;?></p>
									</div>
								</div>
							</div>
						<?php
								$no++;
							}
						?>
								
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- faq area end -->

</main>
<?= get_footer(); ?>