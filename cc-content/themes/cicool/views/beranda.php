<?= get_header(); ?>
<style type="text/css">
	.about__list ul li {
		list-style: disc !important;
	}

	.w-img img {
		height: 300px !important;
	}
</style>

<main>
	<!-- slider area start -->
	<section class="slider__area">
		<div class="slider__active swiper-container">
			<div class="swiper-wrapper">
			<?php 
				foreach ($sliders as $slider) {
			?>
					<div class="slider__item swiper-slide p-relative slider__height slider__height-3 d-flex align-items-center z-index-1">
<?php
	if (!empty($slider->slider_url)) {
		echo '<a href="'.$slider->slider_url.'" target="blank">';
	}
?>
						
							<div class="slider__bg include-bg" data-background="<?php echo base_url(); ?>uploads/sliders/<?php echo $slider->slider_image; ?>"></div>
<?php
	if (!empty($slider->slider_title) || !empty($slider->slider_subtitle)) {
?>
							<div class="carousel-caption">
<?php
	if (!empty($slider->slider_title)) {
		echo '<h2>'.$slider->slider_title.'</h2>';
	}

	if (!empty($slider->slider_subtitle)) {
		echo '<div class="carousel-caption-description"><p>'.$slider->slider_subtitle.'</p></div>';
	}
?>
							</div>
<?php
	}

	if (!empty($slider->slider_url)) {
		echo '</a>';
	}
?>
					</div>
			<?php
				}
			?>
			</div>
<?php
	if (count($sliders) > 1) {
?>
			<div class="main-slider-paginations main-slider-paginations-2">
				<button class="slider-button-next"><i class="fa-regular fa-arrow-right"></i></button>
				<button class="slider-button-prev"><i class="fa-regular fa-arrow-left"></i></button>
			</div>
<?php
	}
?>
		</div>
	</section>
	<!-- slider area end -->


	<section class="slider__area slider__height-2 include-bg d-flex align-items-center pt-75" data-background="<?= base_url();?>assets_stunting/img/slider/2/slider-2-bg.jpg">
		<div class="container">
			<div class="row align-items-center">
				<div class="col-xxl-6 col-lg-6">
					<div class="slider__content-2 mt-30">
						<h3 class="slider__title-2">Kata Pengantar</h3>
						<p><?php echo $about->about_description; ?></p>
					</div>
				</div>
				<div class="col-xxl-6 col-lg-6">
					<div class="slider__thumb-2 p-relative">
						<span class="slider__thumb-mask" style="display: block !important; position: inherit !important; border-radius: 0;">
							<img src="<?= base_url().'uploads/about/'.$about->about_image;?>" alt="Foto Walikota Semarang">
						</span>
					</div>
				</div>
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
						<p><?php echo $about->about_pengertian; ?></p>
					</div>
				</div>
				<div class="col-xxl-6 col-xl-6 col-lg-6">
					<div class="about__thumb-wrapper d-sm-flex mr-20 p-relative">
						<div class="about__shape">
							<img class="about__shape-1 d-none d-sm-block" src="<?php echo base_url(); ?>assets_stunting/img/about/about-shape-1.png" alt="">
							<img class="about__shape-2 d-none d-sm-block" src="<?php echo base_url(); ?>assets_stunting/img/about/about-shape-2.png" alt="">
							<img class="about__shape-3" src="<?php echo base_url(); ?>assets_stunting/img/about/about-shape-3.png" alt="">
						</div>
						<div class="about__thumb-2 mb-10">
							<img src="<?php echo base_url().'uploads/about/'.$about->about_image_pengertian;?>" alt="Gambar Pengertian Stunting" style="width: 100%; border-radius: 20px; box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;">
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<section id="penyebab-stunting" class="about__area pb-120 p-relative">
		<div class="container">
			<div class="row">
				<div class="col-xxl-6 col-xl-6 col-lg-6">
					<div class="about__thumb-wrapper d-sm-flex mr-20 p-relative">
						<div class="about__shape">
							<img class="about__shape-1 d-none d-sm-block" src="<?php echo base_url(); ?>assets_stunting/img/about/about-shape-1.png" alt="">
							<img class="about__shape-2 d-none d-sm-block" src="<?php echo base_url(); ?>assets_stunting/img/about/about-shape-2.png" alt="">
							<img class="about__shape-3" src="<?php echo base_url(); ?>assets_stunting/img/about/about-shape-3.png" alt="">
						</div>
						<div class="about__thumb-2 mb-10">
							<img src="<?php echo base_url().'uploads/about/'.$about->about_image_penyebab;?>" alt="Penyebab Stunting" style="width: 100%; border-radius: 20px; box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;">
						</div>
					</div>
				</div>
				<div class="col-xxl-6 col-xl-6 col-lg-6">
					<div class="about__content pl-25 pr-25">
						<div class="section__title-wrapper mb-15">
							<h2 class="section__title">Penyebab Stunting</h2>
						</div>
						<div class="about__list mb-40">
							<p><?php echo $about->about_penyebab; ?></p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<!-- certificate area end -->
	<section class="research__area research__border grey-bg-3 pt-115 pb-90 p-relative z-index-1">
		<div class="research__shape">
			<img class="research__shape-1 d-none d-sm-block" src="<?php echo base_url(); ?>assets_stunting/img/research/research-shape-1.png" alt="">
			<img class="research__shape-2 d-none d-sm-block" src="<?php echo base_url(); ?>assets_stunting/img/research/research-shape-2.png" alt="">
			<img class="research__shape-3" src="<?php echo base_url(); ?>assets_stunting/img/research/research-shape-3.png" alt="">
		</div>
	<!-- <section id="berita-terbaru" class="course__area pt-115 pb-90 grey-bg-3"> -->
		<div class="container">
			<div class="row">
				<div class="col-xxl-12">
					<div class="section__title-wrapper text-center mb-60">
						<h2 class="section__title section__title-44">Program Kegiatan</h2>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-xxl-12">
					<div class="course__filter text-center mb-30">
						<nav>
							<div class="nav nav-tabs justify-content-center" id="course-tab" role="tablist">
								<?php foreach ($categories as $category) { ?>
									<a href="<?= base_url().'blog/category/'.$category->category_id; ?>" target="blank" class="nav-link"><?= $category->category_name; ?></a>
								<?php } ?>

							</div>
						</nav>
					</div>
				</div>
			</div>
			<div class="row">
				<?php foreach ($blogs as $blog) { ?>
					<div class="col-xxl-4 col-xl-4 col-lg-6 col-md-6">
						<div class="course__item-2 transition-3 white-bg mb-30 fix">
							<div class="course__thumb-2 w-img fix">
								<a href="<?= base_url() . 'blog/' . $blog->slug; ?>">
								<?php
									if (!empty($blog->image)) {
										$file = FCPATH . 'uploads/blog/' . $blog->image;

										if (is_image($blog->image)) {
											if (file_exists($file)) {
												echo '<img src="' . base_url() . 'uploads/blog/' . $blog->image . '" alt="">';
											} else {
												$title = str_replace(' ', '+', $blog->title);

												echo '<img src="https://via.placeholder.com/760x405.png?text=' . $title . '" alt="">';
											}
										} else {
											$title = str_replace(' ', '+', $blog->title);

											echo '<img src="https://via.placeholder.com/760x405.png?text=' . $title . '" alt="">';
										}
									} else {
										$title = str_replace(' ', '+', $blog->title);

										echo '<img src="https://via.placeholder.com/760x405.png?text=' . $title . '" alt="">';
									}
								?>
								</a>
							</div>
							<div class="course__content-2">
								<div class="course__top-2 d-flex align-items-center justify-content-between">
									<div class="course__tag-2">
										<a href="<?= base_url().'blog/category/'.$blog->kategori_id; ?>"><?= $blog->nama_kategori; ?></a>
									</div>
								</div>
								<h3 class="course__title-2">
									<a href="<?= base_url() . 'blog/' . $blog->slug; ?>">
										<?php
										if (strlen($blog->title) < 50) {
											echo $blog->title;
										} else {
											echo substr($blog->title, 0, 50) . '...';
										}
										?>
									</a>
								</h3>
								<div class="course__bottom-2 d-flex align-items-center justify-content-between">
									<div class="course__action">
										<ul>
											<li>
												<div class="course__action-item d-flex align-items-center">
													<div class="course__action-icon mr-5">
														<span><svg width="10" height="12" viewBox="0 0 10 12" fill="none" xmlns="http://www.w3.org/2000/svg">
																<path d="M5.00004 5.5833C6.28592 5.5833 7.32833 4.5573 7.32833 3.29165C7.32833 2.02601 6.28592 1 5.00004 1C3.71416 1 2.67175 2.02601 2.67175 3.29165C2.67175 4.5573 3.71416 5.5833 5.00004 5.5833Z" stroke="#5F6160" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
																<path d="M9 11.0001C9 9.22632 7.20722 7.79175 5 7.79175C2.79278 7.79175 1 9.22632 1 11.0001" stroke="#5F6160" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
															</svg></span>
													</div>
													<div class="course__action-content"><span><?= $blog->user_username; ?></span></div>
												</div>
											</li>
											<li>
												<div class="course__action-item d-flex align-items-center">
													<div class="course__action-icon mr-5">
														<span><svg width="14" height="12" viewBox="0 0 14 12" fill="none" xmlns="http://www.w3.org/2000/svg">
																<path d="M9.01232 5.95416C9.01232 7.06709 8.11298 7.96642 7.00006 7.96642C5.88713 7.96642 4.98779 7.06709 4.98779 5.95416C4.98779 4.84123 5.88713 3.94189 7.00006 3.94189C8.11298 3.94189 9.01232 4.84123 9.01232 5.95416Z" stroke="#5F6160" stroke-width="1.3" stroke-linecap="round" stroke-linejoin="round" />
																<path d="M7 10.6026C8.98416 10.6026 10.8334 9.43342 12.1206 7.40991C12.6265 6.61737 12.6265 5.28523 12.1206 4.49269C10.8334 2.46919 8.98416 1.30005 7 1.30005C5.01584 1.30005 3.16658 2.46919 1.87941 4.49269C1.37353 5.28523 1.37353 6.61737 1.87941 7.40991C3.16658 9.43342 5.01584 10.6026 7 10.6026Z" stroke="#5F6160" stroke-width="1.3" stroke-linecap="round" stroke-linejoin="round" />
															</svg></span>
													</div>
													<div class="course__action-content">
														<span><?= $blog->viewers; ?></span>
													</div>
												</div>
											</li>
										</ul>
									</div>
									<div class="course__tutor-2">
										<a href="#">
											<img src="<?= base_url(); ?>assets_stunting/img/course/tutor/course-tutor-1.jpg" alt="">
										</a>
									</div>
								</div>
							</div>
						</div>
					</div>
				<?php } ?>
			</div>
		</div>
	</section>
	<!-- course area start -->


	<!-- Kebijakan get Started in here -->



	<!-- faq area start -->
	<section class="faq__area pt-20 pb-130">
		<div class="container">
			<div class="row">
				<div class="col-xxl-5 col-xl-5 col-lg-5">
					<div class="faq__wrapper pt-45 pr-25">
						<div class="section__title-wrapper mb-5">
							<!-- <span class="section__title-pre-3">Stunting Kota Semarang</span> -->
							<h2 class="section__title section__title-44">Pertanyaan Sering Ditanyakan</h2>
						</div>
						<p>Semarang Semakin Hebat</p>
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
										<h2 class="accordion-header" id="faq<?= $no; ?>">
											<button class="accordion-button <?= $no != '1' ?  'collapsed' : ''; ?>" type="button" data-bs-toggle="collapse" data-bs-target="#collapse<?= $no; ?>" aria-expanded="true" aria-controls="collapse<?= $no; ?>">
												<?= $faq->faq_question; ?>
											</button>
										</h2>
										<div id="collapse<?= $no; ?>" class="accordion-collapse collapse <?= $no == '1' ?  'show' : ''; ?>" aria-labelledby="faq<?= $no; ?>" data-bs-parent="#faqaccordion">
											<div class="accordion-body">
												<p><?= $faq->faq_answer; ?></p>
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