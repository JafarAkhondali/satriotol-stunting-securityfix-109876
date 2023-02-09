<?= get_header(); ?>
<main>
    <!-- event area start -->
    <section class="event__area pt-115 pb-115">
        <div class="container">
            <div class="row">
                <div class="col-xxl-12">
                    <div class="section__title-wrapper-2 text-center mb-60">
                        <h3 class="section__title-2">Pengukuran dan Publikasi Stunting </h3>
                    </div>
                </div>
            </div>
            <div class="row">
        <?php
            if (count($pustu) > 0) {
                foreach ($pustu as $item) {
        ?>
                <div class="col-xxl-12">
                    <div class="event__item white-bg mb-10 transition-3 p-relative d-lg-flex align-items-center justify-content-between">
                        <div class="event__left d-sm-flex align-items-center">
                            <div class="event__title">
                                <a href="<?php echo base_url().'pengukuran-dan-publikasi-stunting?id='.$item->pustun_id;?>"><?php echo $item->pustun_judul;?></a>
                            </div>
                        </div>
                        <div class="event__right d-sm-flex align-items-center">
                            <div class="event__more ml-30">
                                <a href="<?php echo base_url().'pengukuran-dan-publikasi-stunting?id='.$item->pustun_id;?>" class="tp-btn-5 tp-btn-7">Detail</a>
                            </div>
                        </div>
                    </div>
                </div>
<?php
                }
            }else{
?>
                        <div class="error__content text-center">
							<div class="error__thumb m-img">
								<img src="<?= base_url();?>assets_stunting/img/error/file-not-found.webp" alt="">
							</div>
							<div class="error__content">
								<h3 class="error__title">Data Not Available</h3>
								<p>Oops! The data you are looking for does not available.</p>
							</div>
						</div>
<?php
            }
        ?>
            </div>
        </div>
    </section>
    <!-- event area end -->
</main>
<?= get_footer(); ?>