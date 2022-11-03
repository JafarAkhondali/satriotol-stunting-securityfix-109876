<?= get_header(); ?>
<main>
    <!-- event area start -->
    <section class="event__area pt-115 pb-115">
        <div class="container">
            <div class="row">
                <div class="col-xxl-12">
                    <div class="section__title-wrapper-2 text-center mb-60">
                        <h3 class="section__title-2">Analisa Stunting <?php echo $analisa->analisa_situasi_year;?></h3>
                    </div>
                    <div class="row">
                        <div class="col-md-5">
                            <a href="<?php echo base_url().'uploads/analisa_situasi/'.$analisa->analisa_situasi_image;?>" target="_blank">
                                <img src="<?php echo base_url().'uploads/analisa_situasi/'.$analisa->analisa_situasi_image;?>" class="img-fluid" alt="">
                            </a>
                        </div>
                        <div class="col-md-7">
                            <div class="table-content table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Indikator</th>
                                            <th>Cakupan</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                <?php
                                    foreach ($details as $detail) {
                                ?>
                                        <tr>
                                            <td><?php echo $detail->analisa_situasi_aksi_indikator;?></td>
                                            <td><?php echo $detail->analisa_situasi_aksi_cakupan;?></td>
                                        </tr>
                                <?php
                                    }
                                ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
<?= get_footer(); ?>