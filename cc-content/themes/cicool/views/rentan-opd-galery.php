<?= get_header(); ?>

<link rel="stylesheet" href="<?php echo base_url();?>vendor/Magnific-Popup/dist/magnific-popup.css">

<style type="txt/css">
	.image-link {
	cursor: -webkit-zoom-in;
	cursor: -moz-zoom-in;
	cursor: zoom-in;
	}

	/* This block of CSS adds opacity transition to background */
	.mfp-with-zoom .mfp-container, .mfp-with-zoom.mfp-bg {
		opacity: 0;
		-webkit-backface-visibility: hidden;
		-webkit-transition: all 0.3s ease-out; 
		-moz-transition: all 0.3s ease-out; 
		-o-transition: all 0.3s ease-out; 
		transition: all 0.3s ease-out;
	}

	.mfp-with-zoom.mfp-ready .mfp-container {
		opacity: 1;
	}
	.mfp-with-zoom.mfp-ready.mfp-bg {
		opacity: 0.8;
	}

	.mfp-with-zoom.mfp-removing .mfp-container, .mfp-with-zoom.mfp-removing.mfp-bg {
		opacity: 0;
	}

	/* padding-bottom and top for image */
	.mfp-no-margins img.mfp-img {
		padding: 0;
	}
	/* position of shadow behind the image */
	.mfp-no-margins .mfp-figure:after {
		top: 0;
		bottom: 0;
	}
	/* padding for main container */
	.mfp-no-margins .mfp-container {
		padding: 0;
	}



	/* aligns caption to center */
	.mfp-title {
		text-align: center;
		padding: 6px 0;
	}
	.image-source-link {
		color: #DDD;
	}
</style>

<main>
	<!-- my course area start -->
	<section class="my__course pt-120 pb-90">
		<div class="container">
            <div class="row">
                <div class="col-xxl-12">
                    <div class="section__title-wrapper-2 text-center mb-60">
                        <h3>Rencana Kegiatan<br/><?php echo $galeries->opd_nama;?></h3>
                    </div>
                    <div class="section__title-wrapper-2 mb-60">
						<p style="font-size: 14pt;">Kegiatan : <?php echo $galeries->rentan_opd_kegiatan;?></p>
                    </div>
                </div>
            </div>
			<div class="row">
		<?php
			for ($i=0; $i < 14; $i++) {
		?>
				<div class="col-xxl-4 col-xl-4 col-lg-4 col-md-6">
					<div class="course__item-2 transition-3 white-bg mb-30 fix">
						<div class="course__thumb-2 w-img fix">
							<a href="https://via.placeholder.com/760x472.png?text=Image+Vendor+POP+UP+<?php echo ($i+1);?>" title="Image vendor Pop up <?php echo ($i+1);?>">
								<img src="https://via.placeholder.com/760x472.png?text=Image+Vendor+POP+UP+<?php echo ($i+1);?>">
							</a>
						</div>
					</div>
				</div>
		<?php
			}
		?>
			</div>
		</div>
	</section>
	<!-- my course area end -->
</main>

<!-- jQuery 1.7.2+ or Zepto.js 1.0+ -->
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

<!-- Magnific Popup core JS file -->
<script src="<?php echo base_url();?>vendor/Magnific-Popup/dist/jquery.magnific-popup.js"></script>

<script type="text/javascript">
	$('.w-img').magnificPopup({
		delegate: 'a', // child items selector, by clicking on it popup will open
		type: 'image',
		gallery: {
			enabled: true
		},
		closeOnContentClick: true,
		closeBtnInside: false,
		mainClass: 'mfp-with-zoom mfp-img-mobile',
		image: {
			verticalFit: true,
			titleSrc: function(item) {
				return item.el.attr('title');
			}
		},
		zoom: {
			enabled: true,
			duration: 300,
		}
	});
</script>

<?= get_footer(); ?>