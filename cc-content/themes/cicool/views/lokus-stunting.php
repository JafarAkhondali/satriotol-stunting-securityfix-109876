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

                    <!-- <div id="mapid" style="width: 1200px; height: 720px; z-index: 1;"></div> -->

                    <div class="contact__form">
                        <div class="row">
                            <div class="offset-md-4 col-xxl-4 col-xl-4 col-md-4">
                                <label for="kecamatan" class="control-label">Tahun</label>
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

<script type="text/javascript" src="<?= BASE_ASSET;?>admin-lte/plugins/jQuery/jquery-2.2.3.min.js"></script>

<script type="text/javascript">
    var BASE_URL    = "<?= base_url();?>";

    // $(document).ready(function(){});
    
    $('#tombol-cari-lokus').on('click', function(){
        // var kecamatan   = $('#kecamatan').val();
        var tahun       = $('#tahun').val();

        if (tahun == '') {
            alert('Pilih tahun terlebih dahulu !');
            return false;
        }

        $.ajax({
            url 		: BASE_URL + "web/hasil_lokus_stunting",
            type		: "GET",
            data		: {
                // kecamatan: kecamatan,
                tahun: tahun,
            },
            beforeSend : function(){
                // $("#hasil-lokus-stunting").html('<div class="error__content text-center"><i class="fa fa-refresh fa-spin"></i></div>');
                $("#hasil-lokus-stunting").html('<div class="row"><div class="col-xxl-12">'+
                                                '<div class="section__title-wrapper text-center mb-60">' +
                                                    '<h2 class="section__title section__title-44">Pencarian Data...</h2>' +
                                                    '<p>Lorem ipsum dolor sit amet, consectetur adipiscing aelit, sed do eiusmod</p>' +
                                                '</div></div></div><div class="text-center"><div class="spinner-border"></div></div>');
            },
            success		: function(responses){
                $("#hasil-lokus-stunting").html(responses);
            },
        });
    });
</script>


<?= get_footer(); ?>