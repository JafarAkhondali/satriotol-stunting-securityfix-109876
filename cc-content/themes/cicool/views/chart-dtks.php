<?= get_header(); ?>

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
								<li class="nav-item active"> <a href="<?= base_url(); ?>web/data_dtks" class="nav-link active">berdasarkan Jenis Kelamin</a></li>
								<li class="nav-item"> <a href="<?= base_url(); ?>web/chart_dtks_kecamatan" class="nav-link">berdasarkan Jenis Kelamin per Kecamatan</a></li>
								<li class="nav-item"> <a href="<?= base_url(); ?>web/chart_dtks_kelurahan" class="nav-link">berdasarkan Jenis Kelamin per Kelurahan</a></li>
							</ul>
							<div class="tab-content pt-2" id="myTabContent">
								<div class="tab-pane fade show active" id="jenkel">
									<div class="box-body chart-responsive">
										<div class="chart" id="chart-jenkel"></div>
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
	var data_jenkel 		= <?= json_encode($dtks_jenkel, JSON_NUMERIC_CHECK);?>;

	Highcharts.chart('chart-jenkel', {
		chart: {
			plotBackgroundColor: null,
			plotBorderWidth: null,
			plotShadow: false,
			type: 'pie'
		},
		title: {
			text: 'Data DTKS berdasarkan Jenis Kelamin <?= date("Y");?>',
			align: 'left',
		},
		credits: {
			text: '- Data DTKS Pemerintah Kota Semarang <?= date("Y");?> -',
			href: 'http://119.2.50.170:9095/dashboardNew/index.php/home/stunting?bulan=06&tahun=2023',
			style: {
				color: '#6e6e6e',
				fontSize: 14,
			},
		},
		exporting: {
			filename: 'DTKS berdasarkan Jenis Kelamin <?= date('Y');?>',
		},
		tooltip: {
			pointFormat: '{series.name}: <b>{point.y}</b>'
		},
		accessibility: {
			point: {
				valueSuffix: '%'
			}
		},
		plotOptions: {
			pie: {
				allowPointSelect: true,
				cursor: 'pointer',
				dataLabels: {
					enabled: true,
					format: '<b>{point.name}</b>: {point.y}'
				}
			}
		},
		series: [{
			name: 'Jumlah ',
			colorByPoint: true,
			data: data_jenkel
		}]
	});
</script>
<?= get_footer(); ?>