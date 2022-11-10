<?= get_header(); ?>
<main>
    <!-- event area start -->
    <section class="event__area pt-115 pb-115">
        <div class="container">
            <div class="row">
                <div class="col-xxl-12">
                    <div class="section__title-wrapper-2 text-center mb-60">
                        <h3 class="section__title-2">Analisa Stunting</h3>
                    </div>
                </div>
            </div>
            <div class="row">
        <?php
            foreach ($analisas as $analisa) {
        ?>
                <div class="col-xxl-4">
                    <div class="event__item white-bg mb-10 transition-3 p-relative d-lg-flex align-items-center justify-content-between">
                        <div class="event__left d-sm-flex align-items-center">
                            <div class="event__date">
                                <h4><?php echo $analisa->analisa_situasi_year;?></h4>
                            </div>
                        </div>
                        <div class="event__right d-sm-flex align-items-center">
                            <div class="event__more ml-30">
                                <a href="<?= base_url() . 'analisa-situasi-detail/'.$analisa->analisa_situasi_id;?>" class="tp-btn-5 tp-btn-7">Detail</a>
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