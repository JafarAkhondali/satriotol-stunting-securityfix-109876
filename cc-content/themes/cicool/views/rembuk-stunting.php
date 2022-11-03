<?= get_header(); ?>
<main>
    <!-- event area start -->
    <section class="event__area pt-115 pb-115">
        <div class="container">
            <div class="row">
                <div class="col-xxl-12">
                    <div class="section__title-wrapper-2 text-center mb-60">
                        <h3 class="section__title-2">Rembuk Stunting</h3>
                    </div>
                </div>
            </div>
            <div class="row">
        <?php
            foreach ($rembuks as $rembuk) {
        ?>
                <div class="col-xxl-12">
                    <div class="event__item white-bg mb-10 transition-3 p-relative d-lg-flex align-items-center justify-content-between">
                        <div class="event__left d-sm-flex align-items-center">
                            <div class="event__date">
                                <h4><?php echo $rembuk->rembuk_stunting_year;?></h4>
                            </div>
                            <div class="event__content">
                                <h3 class="event__title">
                                    <a href="javascript:void(0);">Galeri</a>
                                </h3>
                                <div class="row">
                            <?php
                                $images = explode(',', $rembuk->rembuk_stunting_galery_image);

                                for ($i=0; $i < count($images); $i++) {
                             ?>
                                    <div class="col-md-2 mb-1">
                                        <a href="<?php echo base_url().'uploads/rembuk_stunting_galery/'.$images[$i];?>" target="_blank">
                                            <img class="img-fluid h-100" src="<?php echo base_url().'uploads/rembuk_stunting_galery/'.$images[$i];?>" alt="">
                                        </a>
                                    </div>
                             <?php
                                }
                            ?>
                                </div>
                            </div>
                        </div>
                        <div class="event__right d-sm-flex align-items-center">
                            <div class="event__more ml-30">
                                <a href="<?php echo base_url().'uploads/rembuk_stuntings/'.$rembuk->rembuk_stunting_file;?>" target="_blank" class="tp-btn-5 tp-btn-7">Lihat File </a>
                            </div>
                        </div>
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