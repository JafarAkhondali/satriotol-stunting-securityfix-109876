<link rel="stylesheet" href="<?= BASE_ASSET; ?>admin-lte/plugins/morris/morris.css">

<section class="content-header">
	<h1>
		Dashboard <small>Admin</small>
	</h1>
	<ol class="breadcrumb">
		<li><a href="javascript:void(0);"><i class="fa fa-dashboard"></i> Home</a></li>
	</ol>
</section>

<section class="content">
	<div class="row">
		<div class="col-md-4">
			<div class="box box-danger">
				<div class="box-header with-border">
					<h3 class="box-title">Data Stunting balita berdasarkan Jenis Kelamin</h3>
				</div>
				<div class="box-body chart-responsive">
					<div class="chart" id="chart-jenkel"></div>
				</div>
			</div>
		</div>
		<div class="col-md-8">
			<div class="box box-danger">
				<div class="box-header with-border">
					<h3 class="box-title">Data Stunting Balita berdasarkan Umur</h3>
				</div>
				<div class="box-body chart-responsive">
					<div class="chart" id="chart-umur"></div>
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<div class="box box-danger">
				<div class="box-header with-border">
					<h3 class="box-title">Data Stunting Balita berdasarkan Kecamatan</h3>
				</div>
				<div class="box-body chart-responsive">
					<div class="chart" id="chart-kecamatan"></div>
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<div class="box box-danger">
				<div class="box-header with-border">
					<h3 class="box-title">Data Stunting Balita berdasarkan Kelurahan</h3>
				</div>
				<div class="box-body chart-responsive">
					<div class="chart" id="chart-kelurahan"></div>
				</div>
			</div>
		</div>
	</div>
</section>

<script type="text/javascript" src="https://code.highcharts.com/highcharts.js"></script>
<script type="text/javascript" src="https://code.highcharts.com/modules/drilldown.js"></script>
<script type="text/javascript" src="https://code.highcharts.com/modules/exporting.js"></script>
<script type="text/javascript" src="https://code.highcharts.com/modules/export-data.js"></script>

<script type="text/javascript">
	var dataJenkel 				= [];
	var dataUmur 				= [];
	var dataCtegoryKecamatan 	= [];
	var dataSeriesKecamatan 	= [];

	$.ajax({
		url: '<?= BASE_URL."administrator/dashboard/data_jumlah_jenkel";?>',
		method: 'GET',
		dataType: 'json',
		success: function(data) {
			dataJenkel = data;

			createHighchartsJenkel(dataJenkel);
		},
		error: function(error) {
			console.error('Terjadi kesalahan: ', error);
		}
	});

	$.ajax({
		url: '<?= BASE_URL."administrator/dashboard/data_jumlah_umur";?>',
		method: 'GET',
		dataType: 'json',
		success: function(data) {
			dataUmur = data.jenkel;

			createHighchartsUmur(dataUmur, data.kategoriUmur, data.totalJenkel);
		},
		error: function(error) {
			console.error('Terjadi kesalahan: ', error);
		}
	});

	$.ajax({
		url: '<?= BASE_URL."administrator/dashboard/data_jumlah_kecamatan";?>',
		method: 'GET',
		dataType: 'json',
		success: function(data) {
			dataCategoryKecamatan 	= data.kecamatan;
			dataSeriesKecamatan 	= data.data_usia;
			dataTotal 				= data.total_data;

			createHighchartsKecamatan(dataCategoryKecamatan, dataSeriesKecamatan, dataTotal);
		},
		error: function(error) {
			console.error('Terjadi kesalahan: ', error);
		}
	});

	$.ajax({
		url: '<?= BASE_URL."administrator/dashboard/data_jumlah_kelurahan";?>',
		method: 'GET',
		dataType: 'json',
		success: function(data) {
			dataTotal 		= data.data_total;
			dataSeries 		= data.data_series;
			dataDrilldown 	= data.data_drilldown;

			createHighchartsKelurahan(dataSeries, dataDrilldown, dataTotal);
		},
		error: function(error) {
			console.error('Terjadi kesalahan: ', error);
		}
	});

	function createHighchartsJenkel(data_jenkel) {
		Highcharts.chart('chart-jenkel', {
			chart: {
				type: 'pie',
			},
			title: {
				text: 'Data Stunting berdasarkan Jenis Kelamin (Tahun <?= date("Y");?>)',
				align: 'left',
			},
			credits: {
				text: 'Sumber Data : Data Stunting dari Dinas Kesehatan Kota Semarang <?= date("Y");?>',
				href: 'http://119.2.50.170:9095/dashboardNew/index.php/home/stunting?bulan=<?= date("m");?>&tahun=<?= date("Y");?>',
				style: {
					color: '#6e6e6e',
					fontSize: 10,
				},
			},
			tooltip: {
				pointFormat: '{series.name}: <b>{point.y}</b>',
				style: {
					fontSize: 12,
				}
			},
			plotOptions: {
				pie: {
					cursor: 'pointer',
				}
			},
			series: data_jenkel,
		});
	}

	function createHighchartsUmur(data_umur, kategori_umur, total_umur) {
		Highcharts.chart('chart-umur', {
			colors: ['#0077B6', '#FB6F92'],
			chart: {
				type: 'column',
				zoomType: 'y',
				height: 500,
			},
			title: {
				text: 'Data Stunting berdasarkan Umur (Tahun <?= date("Y");?>)',
				align: 'left',
			},
			credits: {
				text: 'Sumber Data : Data Stunting dari Dinas Kesehatan Kota Semarang <?= date("Y");?>',
				href: 'http://119.2.50.170:9095/dashboardNew/index.php/home/stunting?bulan=<?= date("m");?>&tahun=<?= date("Y");?>',
				style: {
					color: '#6e6e6e',
					fontSize: 10,
				},
			},
			xAxis: {
				categories: kategori_umur,
				title: {
					text: 'Umur',
					style: {
						color: '#000',
						fontSize: 14,
					}
				},
				labels: {
					overflow: 'justify',
					style: {
						fontSize: 10,
					}
				},
				accessibility: {
					description: 'Data stunting berdasarkan kategori umur'
				}
			},
			yAxis: {
				title: {
					text: 'Total data stunting (<span style="font-weight: bold;">'+total_umur+'</span>)',
					style: {
						color: '#000',
						fontSize: 14,
					}
				},
				labels: {
					overflow: 'justify',
					style: {
						fontSize: 10,
					}
				}
			},
			plotOptions: {
				column: {
					dataLabels: {
						style: {
							fontSize: 14,
						},
						enabled: true
					}
				}
			},
			tooltip: {
				style: {
					fontSize: 16,
				}
			},
			legend: {
				itemStyle: {
					fontSize: "10pt",
					fontWeight: "bold",
					textOverflow: "ellipsis",
				},
			},
			series: data_umur
		});
	}

	function createHighchartsKecamatan(dataCategory, dataSeries, totalData) {
		Highcharts.chart('chart-kecamatan', {
			chart: {
				type: 'column'
			},
			title: {
				align: 'left',
				text: 'Data Stunting Pemerintah Kota Semarang (Tahun <?= date("Y");?>)'
			},
			subtitle: {
				align: 'left',
				text: ''
			},
			credits: {
				text: 'Sumber Data : Data Stunting dari Dinas Kesehatan Kota Semarang <?= date("Y");?>',
				href: 'http://119.2.50.170:9095/dashboardNew/index.php/home/stunting?bulan=<?= date("m");?>&tahun=<?= date("Y");?>',
				style: {
					color: '#6e6e6e',
					fontSize: 10,
				},
			},
			xAxis: {
				categories: dataCategory,
				labels: {
					style: {
						fontSize: 14,
					}
				},
			},
			yAxis: {
				title: {
					text: 'Total data stunting (<span style="font-weight: bold;">'+totalData+'</span>)',
					style: {
						color: '#000',
						fontSize: 14,
					}
				},
				labels: {
					overflow: 'justify',
					style: {
						fontSize: 10,
					}
				},
				stackLabels: {
					enabled: true,
					style: {
						fontSize: '10pt',
						color: 'blue',
						fontWeight: 'normal'
					}
				}
			},
			legend: {
				itemStyle: {
					fontSize: "10pt",
					fontWeight: "bold",
					textOverflow: "ellipsis",
				},
			},
			tooltip: {
				headerFormat: '<b>{point.x}</b><br/>',
				pointFormat: 'Usia {series.name}: {point.y}<br/>Total data : {point.stackTotal}',
				style: {
					fontSize: '10pt',
				},
			},
			plotOptions: {
				column: {
					stacking: 'normal',
					dataLabels: {
						enabled: true,
						style: {
							fontSize: '10pt'
						},
					},
					label: {
						style: {
							fontSize: '10pt',
						}
					}
				}
			},
			series: dataSeries,
		});
	}

	function createHighchartsKelurahan(dataSeries, dataDrilldown, totalData) {
		Highcharts.chart('chart-kelurahan', {
			chart: {
				type: 'column'
			},
			title: {
				align: 'left',
				text: 'Data Stunting Pemerintah Kota Semarang (Tahun <?= date("Y");?>)'
			},
			subtitle: {
				align: 'left',
				text: ''
			},
			credits: {
				text: 'Sumber Data : Data Stunting dari Dinas Kesehatan Kota Semarang <?= date("Y");?>',
				href: 'http://119.2.50.170:9095/dashboardNew/index.php/home/stunting?bulan=<?= date("m");?>&tahun=<?= date("Y");?>',
				style: {
					color: '#6e6e6e',
					fontSize: 10,
				},
			},
			xAxis: {
				type: 'category',
				labels: {
					style: {
						fontSize: 12,
					}
				},
			},
			yAxis: {
				title: {
					text: 'Total data stunting (<span style="font-weight: bold;">'+totalData+'</span>)',
					style: {
						color: '#000',
						fontSize: 14,
					}
				},
			},
			legend: {
				enabled: false,
				itemStyle: {
					fontSize: "10pt",
					fontWeight: "bold",
					textOverflow: "ellipsis",
				},
			},
			plotOptions: {
				column: {
					dataLabels: {
						enabled: true,
						style: {
							fontSize: '10pt'
						},
					},
					label: {
						style: {
							fontSize: '10pt',
						}
					}
				}
			},
			tooltip: {
				headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
				pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y}</b>'
			},

			series: [{
				name: 'Kecamatan',
				colorByPoint: true,
				data: dataSeries,
			}],
			drilldown: {
				breadcrumbs: {
					position: {
						align: 'right'
					}
				},
				series: dataDrilldown,
			}
		});
	}
</script>