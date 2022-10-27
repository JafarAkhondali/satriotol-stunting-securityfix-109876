<!doctype html>
<html class="no-js" lang="zxx">

<head>
	<meta charset="utf-8">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<title>Administrator Web Stunting| Log in</title>
	<meta name="description" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- Place favicon.ico in the root directory -->
	<link rel="apple-touch-icon" sizes="180x180" href="<?= base_url();?>assets_stunting/favicon/apple-touch-icon.png">
	<link rel="icon" type="image/png" sizes="32x32" href="<?= base_url();?>assets_stunting/favicon/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="16x16" href="<?= base_url();?>assets_stunting/favicon/favicon-16x16.png">
	<link rel="manifest" href="<?= base_url();?>assets_stunting/favicon/site.webmanifest">
	<link rel="mask-icon" href="<?= base_url();?>assets_stunting/favicon/safari-pinned-tab.svg" color="#5bbad5">
	<meta name="msapplication-TileColor" content="#da532c">
	<meta name="theme-color" content="#ffffff">

	<!-- CSS here -->
	<link rel="stylesheet" href="<?php echo base_url();?>assets_stunting/css/bootstrap.css">
	<link rel="stylesheet" href="<?php echo base_url();?>assets_stunting/css/meanmenu.css">
	<link rel="stylesheet" href="<?php echo base_url();?>assets_stunting/css/animate.css">
	<link rel="stylesheet" href="<?php echo base_url();?>assets_stunting/css/owl-carousel.css">
	<link rel="stylesheet" href="<?php echo base_url();?>assets_stunting/css/swiper-bundle.css">
	<link rel="stylesheet" href="<?php echo base_url();?>assets_stunting/css/backtotop.css">
	<link rel="stylesheet" href="<?php echo base_url();?>assets_stunting/css/magnific-popup.css">
	<link rel="stylesheet" href="<?php echo base_url();?>assets_stunting/css/nice-select.css">
	<link rel="stylesheet" href="<?php echo base_url();?>assets_stunting/css/font-awesome-pro.css">
	<link rel="stylesheet" href="<?php echo base_url();?>assets_stunting/css/spacing.css">
	<link rel="stylesheet" href="<?php echo base_url();?>assets_stunting/css/style.css">
</head>

<body>
	<!--[if lte IE 9]>
      <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
      <![endif]-->
	<!-- pre loader area start -->
	<div id="loading">
        <div id="loading-center">
            <div id="loading-center-absolute">
                <img src="<?= base_url();?>assets_stunting/favicon/android-chrome-192x192.png" alt="">
            </div>
        </div>
    </div>
	<!-- pre loader area end -->

	<!-- back to top start -->
	<div class="progress-wrap">
		<svg class="progress-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
			<path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" />
		</svg>
	</div>
	<!-- back to top end -->
	<div class="body-overlay"></div>
	<!-- offcanvas area end -->
	<main>
		<!-- sign up area start -->
		<section class="signup__area p-relative z-index-1 pt-20">
			<div class="sign__shape">
				<img class="man-1" src="<?php echo base_url();?>assets_stunting/img/icon/sign/man-1.png" alt="">
				<img class="man-2" src="<?php echo base_url();?>assets_stunting/img/icon/sign/man-2.png" alt="">
				<img class="circle" src="<?php echo base_url();?>assets_stunting/img/icon/sign/circle.png" alt="">
				<img class="zigzag" src="<?php echo base_url();?>assets_stunting/img/icon/sign/zigzag.png" alt="">
				<img class="dot" src="<?php echo base_url();?>assets_stunting/img/icon/sign/dot.png" alt="">
				<img class="bg" src="<?php echo base_url();?>assets_stunting/img/icon/sign/sign-up.png" alt="">
			</div>

			<div class="container">
				<div class="row">
					<div class="col-xxl-8 offset-xxl-2 col-xl-8 offset-xl-2">
						<div class="section__title-wrapper text-center mb-35">
							<img src="<?= base_url();?>assets_stunting/logo-semarang-simpul.png" alt="logo" class="w-100 mb-10">
							<h2 class="section__title"><?= cclang('login'); ?></b>&nbsp;<?= get_option('site_name'); ?></h2>
							<p><?= cclang('sign_to_start_your_session'); ?></p>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-xxl-6 offset-xxl-3 col-xl-6 offset-xl-3 col-lg-8 offset-lg-2">
						<div class="sign__wrapper white-bg">
							<div class="sign__form">
						<?= 
							form_open('', [
								'name'    => 'form_login', 
								'id'      => 'form_login', 
								'method'  => 'POST'
							]);
						?>
									<div class="sign__input-wrapper mb-25 has-feedback <?= form_error('username') ? 'has-error' :''; ?>">
										<h5>Email</h5>
										<div class="sign__input">
											<input  type="email" class="form-control" name="username" value="<?= set_value('username', 'admin@admin.com'); ?>" placeholder="Masukkan alamat E-mail">
											<i class="fal fa-envelope"></i>
										</div>
									</div>
									<div class="sign__input-wrapper mb-10">
										<h5>Password</h5>
										<div class="sign__input">
											<input type="password" class="form-control" placeholder="Password" name="password" value="admin123" placeholder="Masukkan Password">
											<i class="fal fa-lock"></i>
										</div>
									</div>
									<div class="sign__action d-sm-flex justify-content-between mb-30">
										<div class="sign__agree d-flex align-items-center">
											<input class="m-check-input" type="checkbox" id="m-agree" name="remember" value="1">
											<label class="m-check-label" for="m-agree"><?= cclang('remember_me'); ?></label>
										</div>
									</div>
									<button class="tp-btn w-100"> <span></span><?= cclang('sign_in'); ?></button>
								<?php
									if(isset($error) AND !empty($error)){
								?>
									<div class="sign__new mt-20 text-white">
										<div class="alert alert-danger">
											<p><?= cclang('error'); ?>!</p>
											<p><?= $error; ?></p>
										</div>
									</div>
								<?php
									}

									$message 	= $this->session->flashdata('f_message'); 
									$type 		= $this->session->flashdata('f_type');

									if ($message){
								?>
									<div class="sign__new mt-20">
										<div class="alert alert-<?php echo $type;?>">
											<p><?= $message; ?></p>
										</div>
									</div>
								<?php
									}
								
								echo form_close(); ?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
		<!-- sign up area end -->
	</main>
	<!-- JS here -->
	<script src="<?php echo base_url();?>assets_stunting/js/vendor/jquery.js"></script>
	<script src="<?php echo base_url();?>assets_stunting/js/vendor/waypoints.js"></script>
	<script src="<?php echo base_url();?>assets_stunting/js/bootstrap-bundle.js"></script>
	<script src="<?php echo base_url();?>assets_stunting/js/meanmenu.js"></script>
	<script src="<?php echo base_url();?>assets_stunting/js/swiper-bundle.js"></script>
	<script src="<?php echo base_url();?>assets_stunting/js/owl-carousel.js"></script>
	<script src="<?php echo base_url();?>assets_stunting/js/magnific-popup.js"></script>
	<script src="<?php echo base_url();?>assets_stunting/js/parallax.js"></script>
	<script src="<?php echo base_url();?>assets_stunting/js/backtotop.js"></script>
	<script src="<?php echo base_url();?>assets_stunting/js/nice-select.js"></script>
	<script src="<?php echo base_url();?>assets_stunting/js/counterup.js"></script>
	<script src="<?php echo base_url();?>assets_stunting/js/wow.js"></script>
	<script src="<?php echo base_url();?>assets_stunting/js/isotope-pkgd.js"></script>
	<script src="<?php echo base_url();?>assets_stunting/js/imagesloaded-pkgd.js"></script>
	<script src="<?php echo base_url();?>assets_stunting/js/ajax-form.js"></script>
	<script src="<?php echo base_url();?>assets_stunting/js/main.js"></script>
</body>

</html>