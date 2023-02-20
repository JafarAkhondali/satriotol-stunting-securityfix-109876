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
								<li class="nav-item"> <button class="nav-link active" id="jenkel-tab" data-bs-toggle="tab" data-bs-target="#jenkel" type="button"aria-selected="true">berdasarkan Jenis Kelamin</button></li>
								<!-- <li class="nav-item"> <button class="nav-link" id="umur-tab" data-bs-toggle="tab" data-bs-target="#umur" type="button"aria-selected="false">berdasarkan Umur</button></li> -->
								<li class="nav-item"> <button class="nav-link" id="kecamatan-tab" data-bs-toggle="tab" data-bs-target="#kecamatan" type="button" aria-selected="false">berdasarkan Jenis Kelamin per Kecamatan</button></li>
								<li class="nav-item"> <button class="nav-link" id="kelurahan-tab" data-bs-toggle="tab" data-bs-target="#kelurahan" type="button" aria-selected="false">berdasarkan Jenis Kelamin per Kelurahan</button></li>
							</ul>
							<div class="tab-content pt-2" id="myTabContent">
								<div class="tab-pane fade show active" id="jenkel">
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
	var data_jenkel 		= <?= json_encode($dtks_jenkel, JSON_NUMERIC_CHECK);?>;
	var kategori_umur 		= <?= json_encode($kategori_umur, JSON_NUMERIC_CHECK);?>;
	var umur_male 			= <?= json_encode($umur_male, JSON_NUMERIC_CHECK);?>;
	var umur_female 		= <?= json_encode($umur_female, JSON_NUMERIC_CHECK);?>;
	var nama_kecamatan 		= <?= json_encode($nama_kecamatan, JSON_NUMERIC_CHECK);?>;
	var male_kecamatan 		= <?= json_encode($male_kecamatan, JSON_NUMERIC_CHECK);?>;
	var female_kecamatan 	= <?= json_encode($female_kecamatan, JSON_NUMERIC_CHECK);?>;

	var statistik_kecamatan = <?= json_encode($data_dtks_kecamatan, JSON_NUMERIC_CHECK );?>;
	var statistik_kelurahan = <?= json_encode($data_dtks_kelurahan, JSON_NUMERIC_CHECK );?>;

	Highcharts.chart('chart-jenkel', {
		chart: {
			plotBackgroundColor: null,
			plotBorderWidth: null,
			plotShadow: false,
			type: 'pie'
		},
		title: {
			text: 'Data DTKS berdasarkan Jenis Kelamin',
			align: 'left',
		},
		credits: {
			text: 'Data DTKS Pemerintah Kota Semarang',
			href: 'http://119.2.50.170:9095/dashboardNew/index.php',
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

	/* Highcharts.chart('chart-umur', {
		chart: {
			type: 'column',
			zoomType: 'y',
		},
		title: {
			text: 'Data Stunting berdasarkan Umur',
			align: 'left',
		},
		credits: {
			text: 'Data Stunting Pemerintah Kota Semarang',
			href: 'http://119.2.50.170:9095/dashboardNew/index.php',
		},
		xAxis: {
			categories: kategori_umur,
			title: {
				text: null
			},
			accessibility: {
				description: 'Countries'
			}
		},
		yAxis: {
			title: {
				text: 'Jumlah'
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
				data: umur_male,
				borderColor: '#949494'
			},
			{
				name: 'Perempuan',
				data: umur_female
			}
		]
	}); */

	Highcharts.chart('chart-kecamatan', {
		chart: {
			type: 'column',
			zoomType: 'y',
			height: 600
		},
		title: {
			text: 'Data Stunting berdasarkan Jenis Kelamin per Kecamatan',
			align: 'left',
		},
		credits: {
			text: 'Data Stunting Pemerintah Kota Semarang',
			href: 'http://119.2.50.170:9095/dashboardNew/index.php',
		},
		xAxis: {
			categories: nama_kecamatan,
			title: {
				text: null
			},
			accessibility: {
				description: 'Countries'
			}
		},
		yAxis: {
			title: {
				text: 'Jumlah'
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
				data: male_kecamatan,
				borderColor: '#949494'
			},
			{
				name: 'Perempuan',
				data: female_kecamatan
			}
		]
	});

	Highcharts.chart('chart-kelurahan', {
		chart: {
			type: 'column',
			height: 600,
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