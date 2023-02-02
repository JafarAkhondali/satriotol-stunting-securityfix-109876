<?= get_header(); ?>

<link rel="stylesheet" href="<?= BASE_ASSET; ?>admin-lte/plugins/morris/morris.css">

<main>
    <!-- event area start -->
    <section class="event__area pt-115 pb-115">
        <div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="box box-danger">
						<div class="box-header with-border">
							<h3 class="box-title">Data Stunting balita berdasarkan Jenis Kelamin</h3>
						</div>
						<div class="box-body chart-responsive">
							<div class="chart" id="chart-jenkel"></div>
						</div>
					</div>
				</div>
			</div>
			<div class="row" style="margin-top: 30px;">
				<div class="col-md-12">
					<div class="box box-success">
						<div class="box-header with-border">
							<h3 class="box-title">Data Stunting Balita berdasarkan Umur</h3>
						</div>
						<div class="box-body chart-responsive">
							<div class="chart" id="chart-balita" style="height: 300px;"></div>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12" style="margin-top: 30px;">
					<div class="box box-success">
						<div class="box-header with-border">
							<h3 class="box-title">Data Stunting Balita berdasarkan Kecamatan</h3>
						</div>
						<div class="box-body chart-responsive">
							<div class="chart" id="chart-kecamatan" style="height: 300px;"></div>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12" style="margin-top: 30px;">
					<div class="box box-success">
						<div class="box-header with-border">
							<h3 class="box-title">Data Stunting Balita berdasarkan Kelurahan</h3>
						</div>
						<div class="box-body chart-responsive">
							<div class="chart" id="chart-kelurahan"></div>
						</div>
					</div>
				</div>
			</div>
        </div>
    </section>
</main>



<script src="<?= BASE_ASSET; ?>admin-lte/plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js" crossorigin="anonymous" referrerpolicy="no-referrer"></script> -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="<?= BASE_ASSET; ?>admin-lte/plugins/morris/morris.min.js"></script>

<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/data.js"></script>
<script src="https://code.highcharts.com/modules/drilldown.js"></script>

<!-- <script type="text/javascript" src="<?php echo base_url();?>assets_stunting/js/highcharts.js"></script> -->

<script type="text/javascript">
	var data_jenkel = <?= json_encode($stunting_jenkel, JSON_NUMERIC_CHECK);?>;
	var data_umur 	= <?= json_encode($stunting_umur, JSON_NUMERIC_CHECK);?>;
	var data_kecamatan 	= <?= json_encode($stunting_kecamatan, JSON_NUMERIC_CHECK);?>;
	// var data_kelurahan 	= <?//= json_encode($stunting_kelurahan, JSON_NUMERIC_CHECK);?>;

	var statistik_kecamatan = <?= json_encode($data_stunting_kecamatan, JSON_NUMERIC_CHECK );?>;
	var statistik_kelurahan = <?= json_encode($data_stunting_kelurahan, JSON_NUMERIC_CHECK );?>;

	var donut = new Morris.Donut({
		element: 'chart-jenkel',
		resize: true,
		colors: ["#3c8dbc", "#f56954"],
		data: data_jenkel,
		hideHover: 'auto'
	});
	
	var bar = new Morris.Bar({
		element: 'chart-balita',
		resize: true,
		data: data_umur,
		barColors: ['#00a65a', '#f56954'],
		xkey: 'label',
		ykeys: ['male', 'female'],
		labels: ['Laki-Laki', 'Perempuan'],
		hideHover: 'auto'
	});
	
	var bar = new Morris.Bar({
		element: 'chart-kecamatan',
		resize: true,
		data: data_kecamatan,
		barColors: ['#00a65a', '#f56954'],
		xkey: 'label',
		ykeys: ['male', 'female'],
		labels: ['Laki-Laki', 'Perempuan'],
		hideHover: 'auto'
	});
	
	
	// var bar = new Morris.Bar({
	// 	element: 'chart-kelurahan',
	// 	// resize: true,
	// 	data: data_kelurahan,
	// 	barColors: ['#00a65a', '#f56954'],
	// 	xkey: 'label',
	// 	ykeys: ['male', 'female'],
	// 	labels: ['Laki-Laki', 'Perempuan'],
	// 	hideHover: 'auto',
	// 	stacked: true
	// });

	Highcharts.chart('chart-kelurahan', {
	chart: {
		type: 'column',
		height: 500,
		spacingBottom: 30,
		marginTop: 50,
	},
	title: {
		align: 'left',
		text: 'Data Stunting Pemerintah Kota Semarang <?= date('Y');?>'
	},
	subtitle: {
		align: 'left',
		text: ''
	},
	credits: {
		text: 'Data Stunting Pemerintah Kota Semarang',
        href: 'http://119.2.50.170:9095/dashboardNew/index.php',
	},
	xAxis: {
		type: 'category',
	},
	yAxis: {
		title: {
			text: 'Total Data Stunting'
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
		pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y}</b> data<br/>'
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