<?= get_header(); ?>

<?php
    $indikators = [];
    $cakupans   = [];
    $colors     = [];

    foreach ($details as $item) {
        $indikators[]   = $item->analisa_situasi_aksi_indikator;
        $cakupans[]     = $item->analisa_situasi_aksi_cakupan;
        $colors[]       = $item->analisa_situasi_aksi_warna;
    }

    $data = [
        $indikators,
        $cakupans,
        $colors,
    ];
?>

<main>
    <!-- event area start -->
    <section class="event__area pt-115 pb-115">
        <div class="container">
            <div class="row">
                <div class="col-xxl-12">
                    <div class="section__title-wrapper-2 text-center mb-60">
                        <h3 class="section__title-2">Analisa Situasi <?php echo $analisa->analisa_situasi_year;?></h3>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <a href="<?php echo base_url().'uploads/analisa_situasi/'.$analisa->analisa_situasi_image;?>" target="_blank">
                        <img src="<?php echo base_url().'uploads/analisa_situasi/'.$analisa->analisa_situasi_image;?>" class="img-fluid" alt="">
                    </a>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <canvas id="myChart" width="400" height="400"></canvas>
                </div>
            </div>
        </div>
    </section>
</main>

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.9.1/chart.min.js" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script type="text/javascript">
    const ctx           = document.getElementById('myChart').getContext('2d');

    const data = {
        labels: <?php echo json_encode($indikators);?>,
        datasets: [{
            label: 'Analisa Situasi '+<?php echo $analisa->analisa_situasi_year;?>,
            data: <?php echo json_encode($cakupans);?>,
            backgroundColor: <?php echo json_encode($colors);?>,
            hoverOffset: 4,
            borderColor: '#a4a4a4',
            borderWidth: 1,
        }]
    };

    const myChart = new Chart(ctx, {
        type: 'doughnut',
        data: data,
        options: {
            responsive: true,
            plugins: {
            legend: {
                position: 'right',
            },
            title: {
                display: true,
                text: 'Analisa Situasi '+<?php echo $analisa->analisa_situasi_year;?>,
            }
            }
        },
    });
</script>

<?= get_footer(); ?>