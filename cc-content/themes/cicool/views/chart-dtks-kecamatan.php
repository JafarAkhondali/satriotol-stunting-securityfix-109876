<div class="chart" id="chart-kecamatan"></div>


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
			width: 1920,
		},
		title: {
			text: 'Data Stunting berdasarkan Jenis Kelamin per Kecamatan Tahun <?= date('Y');?>',
			align: 'left',
		},
		credits: {
			text: 'Data Stunting Pemerintah Kota Semarang',
			href: 'http://119.2.50.170:9095/dashboardNew/index.php',
		},
		exporting: {
			filename: 'DTKS per Kecamatan Tahun <?= date('Y');?>',
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