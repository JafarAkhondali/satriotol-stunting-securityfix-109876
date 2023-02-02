<link rel="stylesheet" href="<?= BASE_ASSET; ?>admin-lte/plugins/morris/morris.css">

<section class="content-header">
	<h1>
		Dashboard <small>Admin</small>
	</h1>
	<ol class="breadcrumb">
		<li><a href="javascript:void(0);"><i class="fa fa-dashboard"></i> Home</a></li>
	</ol>
</section>
<!-- Main content -->
<section class="content">
	<div class="row">
		<div class="col-md-6">
			<div class="box box-danger">
				<div class="box-header with-border">
					<h3 class="box-title">Data Stunting balita berdasarkan Jenis Kelamin</h3>
				</div>
				<div class="box-body chart-responsive">
					<div class="chart" id="pie-chart" style="height: 300px; position: relative;"></div>
				</div>
			</div>
		</div>
		<div class="col-md-6"></div>
	</div>
	<div class="row">
		<div class="col-md-6">
			<div class="box box-success">
				<div class="box-header with-border">
					<h3 class="box-title">Data Stunting Balita berdasarkan Umur</h3>
					<div class="box-tools pull-right">
						<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
						<button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
					</div>
				</div>
				<div class="box-body chart-responsive">
					<div class="chart" id="chart-balita" style="height: 300px;"></div>
				</div>
			</div>
		</div>
		<div class="col-md-6">
			<div class="box box-success">
				<div class="box-header with-border">
					<h3 class="box-title">Data Stunting Balita berdasarkan Kecamatan</h3>
					<div class="box-tools pull-right">
						<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
						<button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
					</div>
				</div>
				<div class="box-body chart-responsive">
					<div class="chart" id="chart-kecamatan" style="height: 300px;"></div>
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<div class="box box-success">
				<div class="box-header with-border">
					<h3 class="box-title">Data Stunting Balita berdasarkan Kelurahan</h3>
					<div class="box-tools pull-right">
						<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
						</button>
						<button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
					</div>
				</div>
				<div class="box-body chart-responsive">
					<div class="chart" id="chart-kelurahan" style="height: 300px;"></div>
				</div>
			</div>
		</div>
	</div>
</section>

<script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="<?= BASE_ASSET; ?>admin-lte/plugins/morris/morris.min.js"></script>
<script type="text/javascript">
	//DONUT CHART
	var donut = new Morris.Donut({
		element: 'pie-chart',
		resize: true,
		colors: ["#3c8dbc", "#f56954"],
		data: [
			{label: "Laki-Laki", value: 536},
			{label: "Perempuan", value: 596},
		],
		hideHover: 'auto'
	});

	var bar = new Morris.Bar({
		element: 'chart-balita',
		resize: true,
		data: [
			{ y: '1 Tahun', a: 100, b: 90 },
			{ y: '2 Tahun', a: 75, b: 65 },
			{ y: '3 Tahun', a: 50, b: 40 },
			{ y: '4 tahun', a: 75, b: 65 },
			{ y: '5 tahun', a: 50, b: 40 },
		],
		barColors: ['#00a65a', '#f56954'],
		xkey: 'y',
		ykeys: ['a', 'b'],
		labels: ['Laki-Laki', 'Perempuan'],
		hideHover: 'auto'
	});

	var bar = new Morris.Bar({
		element: 'chart-kecamatan',
		resize: true,
		data: [
			{ y: 'Semarang Barat', a: 100, b: 90 },
			{ y: 'Semarang Timur', a: 75, b: 65 },
			{ y: 'Semarang Tengah', a: 50, b: 40 },
			{ y: 'Banyumanik', a: 75, b: 65 },
			{ y: 'Candisari', a: 50, b: 40 },
			{ y: 'Gajahmungkur', a: 100, b: 90 },
			{ y: 'Gayamsari', a: 75, b: 65 },
			{ y: 'Genuk', a: 50, b: 40 },
			{ y: 'Gunungpati', a: 75, b: 65 },
			{ y: 'Mijen', a: 50, b: 40 },
			{ y: 'Ngaliyan', a: 100, b: 90 },
			{ y: 'Pedurungan', a: 75, b: 65 },
			{ y: 'Semarang Selatan', a: 50, b: 40 },
			{ y: 'Semarang Utara', a: 75, b: 65 },
			{ y: 'Tembalang', a: 50, b: 40 },
			{ y: 'Tugu', a: 50, b: 40 },
		],
		barColors: ['#00a65a', '#f56954'],
		xkey: 'y',
		ykeys: ['a', 'b'],
		labels: ['Laki-Laki', 'Perempuan'],
		hideHover: 'auto'
	});

	var bar = new Morris.Bar({
		element: 'chart-kelurahan',
		resize: true,
		data: [
			{ y: 'Semarang Barat', a: 100, b: 90 },
			{ y: 'Semarang Timur', a: 75, b: 65 },
			{ y: 'Semarang Tengah', a: 50, b: 40 },
			{ y: 'Banyumanik', a: 75, b: 65 },
			{ y: 'Candisari', a: 50, b: 40 },
			{ y: 'Gajahmungkur', a: 100, b: 90 },
			{ y: 'Gayamsari', a: 75, b: 65 },
			{ y: 'Genuk', a: 50, b: 40 },
			{ y: 'Gunungpati', a: 75, b: 65 },
			{ y: 'Mijen', a: 50, b: 40 },
			{ y: 'Ngaliyan', a: 100, b: 90 },
			{ y: 'Pedurungan', a: 75, b: 65 },
			{ y: 'Semarang Selatan', a: 50, b: 40 },
			{ y: 'Semarang Utara', a: 75, b: 65 },
			{ y: 'Tembalang', a: 50, b: 40 },
			{ y: 'Tugu', a: 50, b: 40 },
		],
		barColors: ['#00a65a', '#f56954'],
		xkey: 'y',
		ykeys: ['a', 'b'],
		labels: ['Laki-Laki', 'Perempuan'],
		hideHover: 'auto'
	});
</script>