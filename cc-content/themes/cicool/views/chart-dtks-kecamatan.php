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
								<li class="nav-item"> <a href="<?= base_url(); ?>chart-dtks-kecamatan" class="nav-link active">berdasarkan Jenis Kelamin per Kecamatan</a></li>
								<li class="nav-item"> <a href="<?= base_url(); ?>chart-dtks-kelurahan" class="nav-link">berdasarkan Jenis Kelamin per Kelurahan</a></li>
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
								<div class="tab-pane fade show active" id="kecamatan">
									<div class="box-body chart-responsive">
										<div class="chart" width="100%" id="chart-kecamatan"></div>
									</div>
								</div>
								<div class="tab-pane fade" id="kelurahan">
									<div class="box-body chart-responsive">
										<div class="chart" id="chart-kelurahan"></div>
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


<script src="<?= BASE_ASSET; ?>admin-lte/plugins/jQuery/jquery-2.2.3.min.js"></script>

<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/data.js"></script>
<script src="https://code.highcharts.com/modules/drilldown.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>

<script type="text/javascript">
	var kecamatan_nama 	= <?= json_encode($kecamatan_nama, JSON_NUMERIC_CHECK);?>;
	var kecamatan_male 	= <?= json_encode($kecamatan_male, JSON_NUMERIC_CHECK);?>;
	var kecamatan_female 	= <?= json_encode($kecamatan_female, JSON_NUMERIC_CHECK);?>;

	Highcharts.chart('chart-kecamatan', {
		chart: {
			type: 'column',
			zoomType: 'y',
			height: 700,
		},
		title: {
			text: 'Data DTKS berdasarkan Jenis Kelamin per Kecamatan Tahun <?= date('Y');?>',
			align: 'left',
		},
		credits: {
			text: 'Data Stunting Pemerintah Kota Semarang',
			href: 'http://119.2.50.170:9095/dashboardNew/index.php',
		},
		exporting: {
			filename: 'DTKS per Kecamatan Tahun <?= date('Y');?>',
			sourceWidth: 1920,
		},
		xAxis: {
			categories: kecamatan_nama,
			title: {
				text: null
			},
			accessibility: {
				description: 'Nama Kecamatan'
			}
		},
		yAxis: {
			title: {
				text: 'Total Data DTKS'
			},
			labels: {
				overflow: 'justify'
			}
		},
		plotOptions: {
			column: {
				dataLabels: {
					enabled: true
				}
			}
		},
		tooltip: {
			stickOnContact: true,
			backgroundColor: 'rgba(255, 255, 255, 0.93)'
		},
		legend: {
			enabled: true
		},
		series: [
			{
				name: 'Laki-Laki',
				data: kecamatan_male,
				borderColor: '#949494'
			},
			{
				name: 'Perempuan',
				data: kecamatan_female
			}
		]
	});
</script>
<?= get_footer(); ?>