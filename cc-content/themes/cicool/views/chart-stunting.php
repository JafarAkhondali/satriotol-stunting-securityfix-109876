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
							<h5 class="card-title">Grafik Data Stunting</h5>
							<ul class="nav nav-tabs" id="myTab">
								<li class="nav-item"> <button class="nav-link active" id="kecamatan-tab" data-bs-toggle="tab" data-bs-target="#kecamatan" type="button" aria-selected="false">berdasarkan Jenis Kelamin per Kecamatan</button></li>
								<li class="nav-item"> <button class="nav-link" id="kelurahan-tab" data-bs-toggle="tab" data-bs-target="#kelurahan" type="button" aria-selected="false">berdasarkan Jenis Kelamin per Kelurahan</button></li>
								<li class="nav-item"> <button class="nav-link" id="jenkel-tab" data-bs-toggle="tab" data-bs-target="#jenkel" type="button"aria-selected="true">berdasarkan Jenis Kelamin</button></li>
								<li class="nav-item"> <button class="nav-link" id="umur-tab" data-bs-toggle="tab" data-bs-target="#umur" type="button"aria-selected="false">berdasarkan Umur</button></li>
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
										<div class="row">
											<div class="col-md-12">
												<div class="chart" id="chart-kecamatan"></div>
											</div>
										</div>
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
				height: 600,
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
				type: 'column',
				height: 600,
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
				type: 'column',
				height: 600,
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
<?= get_footer(); ?>