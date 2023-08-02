
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
										echo '<li><a href="'.$link->link.'" target="_blank">'.$link->label.'</a></li>';
									}
								?>
									</ul>
								</div>
							</div>
						</div>
						<div class="col-xxl-3 col-xl-4 col-lg-4 col-md-6 col-sm-7">
							<div class="footer__widget footer__widget-3 footer-col-3-4 mb-50">
								<h3 class="footer__widget-title footer__widget-title-3">Informasi</h3>

								<div class="footer__contact">
									<ul>
										<li>
											<p>Alamat Kami</p>
											<h4><?php echo $about->about_address;?></h4>
										</li>
										<li>
											  <!-- Histats.com  (div with counter) --><div id="histats_counter"></div>
												<!-- Histats.com  START  (aync)-->
												<script type="text/javascript">var _Hasync= _Hasync|| [];
												_Hasync.push(['Histats.start', '1,4789278,4,2048,280,25,00001010']);
												_Hasync.push(['Histats.fasi', '1']);
												_Hasync.push(['Histats.track_hits', '']);
												(function() {
												var hs = document.createElement('script'); hs.type = 'text/javascript'; hs.async = true;
												hs.src = ('//s10.histats.com/js15_as.js');
												(document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(hs);
												})();</script>
												<noscript><a href="/" target="_blank"><img  src="//sstatic1.histats.com/0.gif?4789278&101" alt="" border="0"></a></noscript>
												<!-- Histats.com  END  -->
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
							<div class="col-xxl-8 col-xl-8 col-lg-8 col-md-8">
								<div class="footer__bottom-link">
									<ul>
										<li><a href="javascript:void(0);">Disclaimer & Copyright &copy;<?= date('Y');?></a></li>
										<li><a href="https://semarangkota.go.id/">Kota Semarang</a></li>
										<li><a href="https://diskominfo.semarangkota.go.id/">Diskominfo Kota Semarang</a></li>
									</ul>
								</div>
							</div>
							<div class="col-xxl-4 col-xl-4 col-lg-4 col-md-4">
								<div class="footer__social footer__social-3 text-md-end">
									<ul>
								<?php
									foreach ($kontaks as $kontak) {
								?>
									<li><a href="<?php echo $kontak->contact_url;?>"><i class="fa-brands <?php echo $kontak->contact_image;?>"></i></a></li>
								<?php
									}
								?>
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
	<script src="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.6.2/chosen.jquery.min.js"></script>

	<script type="text/javascript">
		$('#pilih-berita').on('change', function (e) {
			var optionSelected = $("option:selected", this);
			var valueSelected = this.value;
			
			window.location.href = "<?php echo base_url().'blog/category/';?>"+valueSelected;
		});
	</script>
</body>

</html>