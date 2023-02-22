<?= get_header(); ?>

<link rel="stylesheet" href="<?= BASE_ASSET; ?>admin-lte/plugins/morris/morris.css">

<main>
    <!-- event area start -->
    <section class="event__area pt-115 pb-115">
        <div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="card">
						<div class="card-body">
							<h5 class="card-title">Grafik Data Terpadu Kesejahteraan Sosial (DTKS)</h5>
							<ul class="nav nav-tabs" id="myTab">
								<li class="nav-item"> <a href="<?= base_url(); ?>data-dtks" class="nav-link">berdasarkan Jenis Kelamin</a></li>
								<!-- <li class="nav-item"> <a href="<?= base_url(); ?>chart-dtks-jenkel" target="_blank" class="nav-link">berdasarkan Umur</a></li> -->
								<li class="nav-item"> <a href="<?= base_url(); ?>chart-dtks-kecamatan" class="nav-link">berdasarkan Jenis Kelamin per Kecamatan</a></li>
								<li class="nav-item"> <a href="<?= base_url(); ?>chart-dtks-kelurahan" class="nav-link active">berdasarkan Jenis Kelamin per Kelurahan</a></li>
							</ul>
							<div class="tab-content pt-2" id="myTabContent">
								<div class="tab-pane fade" id="jenkel">
									<div class="box-body chart-responsive">
										<div class="chart" id="chart-jenkel"></div>
									</div>
								</div>
								<div class="tab-pane fade" id="umur">
									<div class="box-body chart-responsive">
										<div class="chart" id="chart-umur"></div>
									</div>
								</div>
								<div class="tab-pane fade" id="kecamatan">
									<div class="box-body chart-responsive">
										<div class="chart" id="chart-kecamatan"></div>
									</div>
								</div>
								<div class="tab-pane fade show active" id="kelurahan">
									<div class="box-body chart-responsive">
										<div class="chart" width="100%" id="chart-kelurahan"></div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
        </div>
    </section>
</main>

<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/data.js"></script>
<script src="https://code.highcharts.com/modules/drilldown.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>

<script type="text/javascript">
	var statistik_kecamatan = <?= json_encode($data_dtks_kecamatan, JSON_NUMERIC_CHECK );?>;
	var statistik_kelurahan = <?= json_encode($data_dtks_kelurahan, JSON_NUMERIC_CHECK );?>;

	Highcharts.chart('chart-kelurahan', {
		chart: {
			type: 'column',
			height: 700,
			spacingBottom: 30,
			marginTop: 50,
		},
		title: {
			align: 'left',
			text: 'Data DTKS Pemerintah Kota Semarang <?= date('Y');?>'
		},
		credits: {
			text: 'Data Stunting Pemerintah Kota Semarang',
			href: 'http://119.2.50.170:9095/dashboardNew/index.php',
		},
		exporting: {
			filename: 'DTKS per Kelurahan Tahun <?= date('Y');?>',
			sourceWidth: 1920,
		},
		xAxis: {
			type: 'category',
		},
		yAxis: {
			title: {
				text: 'Total Data DTKS'
			}
		},
		legend: {
			enabled: false,
		},
		plotOptions: {
			series: {
				borderWidth: 0,
				dataLabels: {
					enabled: true,
					format: '{point.y}'
				}
			}
		},
		tooltip: {
			headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
			pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y}</b> data<br/>',
			crosshairs: true,
			shared: true,
		},
		series: [
			{
				name: 'Kecamatan',
				colorByPoint: true,
				data: statistik_kecamatan,
			}
		],
		drilldown: {
			allowPointDrilldown: false,
			breadcrumbs: {
				position: {
					align: 'right',
					y: -50,
				}
			},
			series: statistik_kelurahan,
		}
	});
</script>
<?= get_footer(); ?>