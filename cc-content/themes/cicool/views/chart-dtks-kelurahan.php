<div class="chart" id="chart-kelurahan"></div>

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