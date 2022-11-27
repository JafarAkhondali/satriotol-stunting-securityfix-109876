<?php
    $tahun_cakupans   = [];
    // $colors     = [];

    foreach ($analisa as $item) {
        $tahun_cakupans[] = [
            'name'  => $item->tahun,
            'y'     => (float)$item->cakupan,
        ];
    }
?>

<?= get_header(); ?>

<main>
    <!-- event area start -->
    <section class="event__area pt-115 pb-115">
        <div class="container">
            <div class="row">
                <div class="col-xxl-12">
                    <div class="section__title-wrapper-2 text-center mb-60">
                        <h4 class="section__title-2">Indikator Analisa Situasi</h4>
                    </div>
                </div>
            </div>
            <div class="row mt-20">
                <div class="col-md-12">
                    <figure class="highcharts-figure">
                        <div id="container"></div>
                    </figure>
                </div>
            </div>
            <div class="row mt-20">
                <div class="col-md-12">
                    <?php echo $indikator->analisa_situasi_indikator_deskripsi;?>
                </div>
            </div>
        </div>
    </section>
</main>

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets_stunting/js/highcharts.js"></script>
<script type="text/javascript">
    Highcharts.chart('container', {
        chart: {
            type: 'column'
        },
        title: {
            align: 'left',
            text: '<?php echo $indikator->analisa_situasi_indikator_nama;?>'
        },
        accessibility: {
            announceNewData: {
                enabled: true
            }
        },
        xAxis: {
            type: 'category',
            title: {
                text: 'Tahun'
            }
        },
        yAxis: {
            title: {
                text: 'Tingkat Persentase'
            }
        },
        legend: {
            enabled: false
        },
        plotOptions: {
            series: {
                borderWidth: 0,
                dataLabels: {
                    enabled: true,
                    format: '{point.y:.1f}'
                }
            }
        },
        tooltip: {
            headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
            pointFormat: '<span>{point.name}</span> : <b>{point.y:.2f}</b><br/>'
        },
        series: [
            {
                name: "<?php echo $indikator->analisa_situasi_indikator_nama;?>",
                colorByPoint: true,
                data : <?php echo json_encode($tahun_cakupans);?>
            }
        ],
    });
</script>

<?= get_footer(); ?>