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
								<li class="nav-item"> <button class="nav-link active" id="jenkel-tab" data-bs-toggle="tab" data-bs-target="#jenkel" type="button"aria-selected="true">berdasarkan Jenis Kelamin</button></li>
								<li class="nav-item"> <button class="nav-link" id="umur-tab" data-bs-toggle="tab" data-bs-target="#umur" type="button"aria-selected="false">berdasarkan Umur</button></li>
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
	var data_jenkel 		= <?= json_encode($stunting_jenkel, JSON_NUMERIC_CHECK);?>;
	var kategori_umur 		= <?= json_encode($kategori_umur, JSON_NUMERIC_CHECK);?>;
	var umur_male 			= <?= json_encode($umur_male, JSON_NUMERIC_CHECK);?>;
	var umur_female 		= <?= json_encode($umur_female, JSON_NUMERIC_CHECK);?>;
	var nama_kecamatan 		= <?= json_encode($nama_kecamatan, JSON_NUMERIC_CHECK);?>;
	var male_kecamatan 		= <?= json_encode($male_kecamatan, JSON_NUMERIC_CHECK);?>;
	var female_kecamatan 	= <?= json_encode($female_kecamatan, JSON_NUMERIC_CHECK);?>;

	var statistik_kecamatan = <?= json_encode($data_stunting_kecamatan, JSON_NUMERIC_CHECK );?>;
	var statistik_kelurahan = <?= json_encode($data_stunting_kelurahan, JSON_NUMERIC_CHECK );?>;

	var colors = ['#2f7ed8', '#0d233a', '#8bbc21', '#910000', '#1aadce', '#492970', '#f28f43', '#77a1e5', '#c42525', '#a6c96a'];

	total_jenkel = 0;

	for (i = 0; i < data_jenkel.length; i++) {
		total_jenkel += data_jenkel[i].y;
	}

	Highcharts.chart('chart-jenkel', {
		colors: ['#001EFF', '#F000FF'],
		chart: {
			plotBackgroundColor: null,
			plotBorderWidth: null,
			plotShadow: false,
			type: 'pie',
		},
		title: {
			text: 'Data Stunting berdasarkan Jenis Kelamin (Tahun <?= date('Y');?>)',
			align: 'left',
		},
		credits: {
			text: 'Sumber Data : Data Stunting dari Dinas Kesehatan Kota Semarang <?= date('Y');?>',
			href: 'http://119.2.50.170:9095/dashboardNew/index.php/home/stunting?bulan=06&tahun=2023',
			style: {
				color: '#6e6e6e',
				fontSize: 14,
			},
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

	Highcharts.chart('chart-umur', {
		chart: {
			type: 'column',
			zoomType: 'y',
			height: 500,
		},
		title: {
			text: 'Data Stunting berdasarkan Umur (Tahun <?= date('Y');?>)',
			align: 'left',
		},
		credits: {
			text: 'Sumber Data : Data Stunting dari Dinas Kesehatan Kota Semarang <?= date('Y');?>',
			href: 'http://119.2.50.170:9095/dashboardNew/index.php/home/stunting?bulan=06&tahun=2023',
			style: {
				color: '#6e6e6e',
				fontSize: 14,
			},
		},
		xAxis: {
			categories: kategori_umur,
			title: {
				text: null
			},
			accessibility: {
				description: 'Data stunting berdasarkan kategori umur'
			}
		},
		yAxis: {
			title: {
				text: 'Total data stunting ('+total_jenkel+')'
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
			backgroundColor: 'rgba(255, 255, 255, 0.93)',
			crosshairs: true,
			shared: true,
		},
		legend: {
			enabled: true
		},
		series: [
			{
				name: 'Laki-Laki',
				data: umur_male,
				color: '#008744',
			},
			{
				name: 'Perempuan',
				data: umur_female,
				color: '#D62D20',
			}
		]
	});

	Highcharts.chart('chart-kecamatan', {
		colors: ['#0DB240', '#E51C3A', '#58390C', '#D0A92B', '#A3BE63', '#EE6950', '#BB6ED7', '#13284C', '#4C6DB6', '#9F6948', '#F7B801', '#F92E91', '#3D348B'],
		chart: {
			type: 'column',
			zoomType: 'y',
			height: 600,
		},
		title: {
			text: 'Data Stunting berdasarkan Jenis Kelamin per Kecamatan (Tahun <?= date('Y');?>)',
			align: 'left',
		},
		credits: {
			text: 'Sumber Data : Data Stunting dari Dinas Kesehatan Kota Semarang <?= date('Y');?>',
			href: 'http://119.2.50.170:9095/dashboardNew/index.php/home/stunting?bulan=06&tahun=2023',
			style: {
				color: '#6e6e6e',
				fontSize: 14,
			},
		},
		xAxis: {
			categories: nama_kecamatan,
			title: {
				text: null
			},
			accessibility: {
				description: 'Data stunting berdasarkan kategori kecamatan'
			}
		},
		yAxis: {
			title: {
				text: 'Total data stunting ('+total_jenkel+')'
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
			backgroundColor: 'rgba(255, 255, 255, 0.93)',
			crosshairs: true,
			shared: true,
		},
		legend: {
			enabled: true
		},
		series: [
			{
				name: 'Laki-Laki',
				colorByPoint: true,
				data: male_kecamatan,
			},
			{
				name: 'Perempuan',
				colorByPoint: true,
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
			text: 'Data Stunting Pemerintah Kota Semarang (Tahun <?= date('Y');?>)'
		},
		subtitle: {
			align: 'left',
			text: ''
		},
		credits: {
			text: 'Sumber Data : Data Stunting dari Dinas Kesehatan Kota Semarang <?= date('Y');?>',
			href: 'http://119.2.50.170:9095/dashboardNew/index.php/home/stunting?bulan=06&tahun=2023',
			style: {
				color: '#6e6e6e',
				fontSize: 14,
			},
		},
		xAxis: {
			type: 'category',
		},
		yAxis: {
			title: {
				text: 'Total data stunting ('+total_jenkel+')'
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
			},
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