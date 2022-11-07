<?= get_header(); ?>
<main>
    <!-- event area start -->
    <section class="event__area pt-115 pb-115">
        <div class="container">
            <div class="row">
                <div class="col-xxl-12">
                    <div class="section__title-wrapper-2 text-center mb-60">
                        <h3 class="section__title-2">Lokus Stunting</h3>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xxl-12">
                    <div class="contact__form">
                        <div class="row">
                            <div class="offset-md-4 col-xxl-2 col-xl-2 col-md-2">
                                <label for="kecamatan" class="col-sm-12 control-label">Nama Kecamatan</label>
                                <div class="contact__form-input">
                                    <select class="form-control chosen chosen-select-deselect" name="kecamatan" id="kecamatan" data-placeholder="Pilih Kecamatan">
                                        <option value="">- Pilih Kecamatan -</option>
                            <?php
                                foreach ($kecamatans as $kecamatan) {
                            ?>
                                <option value="<?= $kecamatan->kecamatan_id;?>"><?= $kecamatan->kecamatan_nama;?></option>
                            <?php
                                }
                            ?>
                                    </select>
                                    <!-- <input type="text" placeholder="Your Name"> -->
                                </div>
                            </div>
                            <div class="col-xxl-2 col-xl-2 col-md-2">
                                <label for="kecamatan" class="col-sm-12 control-label">Tahun</label>
                                <div class="contact__form-input">
                                    <select class="form-control chosen chosen-select-deselect" name="tahun" id="tahun" data-placeholder="Select Tahun">
                                        <option value="">- Pilih Tahun -</option>
                                        <?php for ($i = 2018; $i < date('Y')+2; $i++){ ?> <option value="<?= $i;?>">
                                            <?= $i; ?></option>
                                        <?php }; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-xxl-4 col-xl-4 col-md-4">
                                <div class="contact__btn">
                                    <button class="tp-btn" name="tombol-cari-lokus" id="tombol-cari-lokus">Cari <i class="fal fa-search"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-25">
                <div class="col-md-12" id="hasil-lokus-stunting"></div>
            </div>
        </div>
    </section>
    <!-- event area end -->
</main>

<script src="<?= base_url();?>asset/admin-lte/plugins/jQuery/jquery-2.2.3.min.js"></script>
<script type="text/javascript">
    // $(document).ready(function(){});
    var BASE_URL    = "<?= base_url();?>";
    
    $('#tombol-cari-lokus').on('click', function(){
        var kecamatan   = $('#kecamatan').val();
        var tahun       = $('#tahun').val();

        $.ajax({
            url 		: BASE_URL + "web/hasil_lokus_stunting",
            type		: "GET",
            data		: {
                kecamatan: kecamatan,
                tahun: tahun,
            },
            beforeSend : function(){
                $("#hasil-lokus-stunting").html('<div class="error__content text-center"><i class="fa fa-refresh fa-spin"></i></div>');
            },
            success		: function(responses){
                $("#hasil-lokus-stunting").html(responses);
            },
        });

    });
</script>


<?= get_footer(); ?>