
	<!-- footer area start -->
	<footer>
		<div class="footer__area">
			<div class="footer__top grey-bg-4 pt-95 pb-45">
				<div class="container">
					<div class="row">
						<div class="col-xxl-4 col-xl-4 col-lg-4 col-md-6 col-sm-7">
							<div class="footer__widget footer__widget-3 footer-col-3-1 mb-50">
								<div class="footer__logo">
									<div class="logo">
										<a href="index.html">
											<img src="<?= base_url().'uploads/about/'.$about->about_logo;?>" alt="logo">
										</a>
									</div>
								</div>
								<div class="footer__widget-content">
									<div class="footer__widget-info">
										<div class="footer__subscribe footer__subscribe-3">
											<p>Semarang Semakin HEBAT.</p>
										</div>
									</div>
								</div>
							</div>
						</div>

						<div class="col-xxl-2 col-xl-2 col-lg-2 col-md-3 col-sm-5"></div>

						<div class="col-xxl-3 col-xl-2 col-lg-2 col-md-3 col-sm-5">
							<div class="footer__widget footer__widget-3 footer-col-3-3 mb-50">
								<h3 class="footer__widget-title footer__widget-title-3">Link Terkait</h3>
								<div class="footer__widget-content">
									<ul>
								<?php
									foreach ($links as $link) {
										echo '<li><a href="'.base_url().$link->link.'">'.$link->label.'</a></li>';
									}
								?>
									</ul>
								</div>
							</div>
						</div>
						<div class="col-xxl-3 col-xl-4 col-lg-4 col-md-6 col-sm-7">
							<div class="footer__widget footer__widget-3 footer-col-3-4 mb-50">
								<h3 class="footer__widget-title footer__widget-title-3">Information</h3>

								<div class="footer__contact">
									<ul>
										<li>
											<p>Alamat Kami</p>
											<h4><?php echo $about->about_address;?></h4>
										</li>
									</ul>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="footer__bottom grey-bg-4">
				<div class="container">
					<div class="footer__bottom-inner">
						<div class="row">
							<div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6">
								<div class="footer__bottom-link">
									<ul>
										<li><a href="javascript:void(0);">Disclaimer & Copyright</a></li>
										<li><a href="https://semarangkota.go.id/">Kota Semarang</a></li>
										<li><a href="https://diskominfo.semarangkota.go.id/">Diskominfo Kota Semarang</a></li>
									</ul>
								</div>
							</div>
							<div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6">
								<div class="footer__social footer__social-3 text-md-end">
									<ul>
										<li><a href="#"><i class="fa-brands fa-facebook-f"></i></a></li>
										<li><a href="#"><i class="fa-brands fa-twitter"></i></a></li>
										<li><a href="#"><i class="fa-brands fa-linkedin-in"></i></a></li>
									</ul>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</footer>
	<!-- footer area end -->

	<!-- JS here -->
	<script type="text/javascript" src="<?= base_url();?>assets_stunting/js/vendor/jquery.js"></script>
	<script type="text/javascript" src="<?= base_url();?>assets_stunting/js/vendor/waypoints.js"></script>
	<script type="text/javascript" src="<?= base_url();?>assets_stunting/js/bootstrap-bundle.js"></script>
	<script type="text/javascript" src="<?= base_url();?>assets_stunting/js/meanmenu.js"></script>
	<script type="text/javascript" src="<?= base_url();?>assets_stunting/js/swiper-bundle.js"></script>
	<script type="text/javascript" src="<?= base_url();?>assets_stunting/js/owl-carousel.js"></script>
	<script type="text/javascript" src="<?= base_url();?>assets_stunting/js/magnific-popup.js"></script>
	<script type="text/javascript" src="<?= base_url();?>assets_stunting/js/parallax.js"></script>
	<script type="text/javascript" src="<?= base_url();?>assets_stunting/js/backtotop.js"></script>
	<script type="text/javascript" src="<?= base_url();?>assets_stunting/js/nice-select.js"></script>
	<script type="text/javascript" src="<?= base_url();?>assets_stunting/js/counterup.js"></script>
	<script type="text/javascript" src="<?= base_url();?>assets_stunting/js/wow.js"></script>
	<script type="text/javascript" src="<?= base_url();?>assets_stunting/js/isotope-pkgd.js"></script>
	<script type="text/javascript" src="<?= base_url();?>assets_stunting/js/imagesloaded-pkgd.js"></script>
	<script type="text/javascript" src="<?= base_url();?>assets_stunting/js/ajax-form.js"></script>
	<script type="text/javascript" src="<?= base_url();?>assets_stunting/js/main.js"></script>
	<script type="text/javascript">
		$('#pilih-berita').on('change', function (e) {
			var optionSelected = $("option:selected", this);
			var valueSelected = this.value;
			
			window.location.href = "<?php echo base_url().'blog/category/';?>"+valueSelected;
		});
	</script>
</body>

</html>