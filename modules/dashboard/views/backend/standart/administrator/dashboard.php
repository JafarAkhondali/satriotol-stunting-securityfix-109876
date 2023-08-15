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
					<h3 class="box-title">Data Stunting Balita berdasarkan Kecamatan</h3>
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
	var colors_kelurahan = ['#D81159', '#F9844A', '#F94144', '#F3722C', '#F8961E', '#F9C74F', '#90BE6D', '#43AA8B', '#4D908E', '#577590', '#9B2226', '#BB3E03', '#AE2012', '#CA6702', '#EE9B00', '#E9D8A6', '#94D2BD', '#0A9396', '#005F73', '#001219'];
	var colors_kecamatan = ['#780116', '#F6AA1C', '#BC3908', '#E76F51', '#0F4C5C', '#2A9D8F', '#E36414', '#FB8B24', '#3D348B', '#7678ED', '#003049', '#9E2A2B', '#D62828', '#606C38', '#BC6C25', '#B6465F', '#EC7D10', '#DA9F93', '#495867', '#ECC8AF'];

	var data_jenkel 		= [{"name":"Laki-Laki","y":629,"dataLabels": {"enabled": true,"distance": -165,"format": 'Total {point.total} anak',"style": {"fontSize": '12pt',},}},{"name":"Perempuan","y":640}];
	var kategori_umur 		= ["1 Tahun","2 Tahun","3 Tahun","4 Tahun","5 Tahun"];
	var umur_male 			= [144,167,175,135,8];
	var umur_female 		= [95,148,210,168,19];
	var nama_kecamatan 		= ["Banyumanik","Candisari","Gajahmungkur","Gayamsari","Genuk","Gunungpati","Mijen","Ngaliyan","Pedurungan","Semarang Barat","Semarang Selatan","Semarang Tengah","Semarang Timur","Semarang Utara","Tembalang","Tugu"];
	var male_kecamatan 		= [44,21,18,16,19,40,37,54,47,71,42,34,43,91,37,15];
	var female_kecamatan 	= [41,10,19,22,25,51,39,50,59,61,40,40,39,101,32,11];

	var statistik_kecamatan = [{"name":"Banyumanik","y":85,"drilldown":4},{"name":"Candisari","y":31,"drilldown":5},{"name":"Gajahmungkur","y":37,"drilldown":6},{"name":"Gayamsari","y":38,"drilldown":7},{"name":"Genuk","y":44,"drilldown":8},{"name":"Gunungpati","y":91,"drilldown":9},{"name":"Mijen","y":76,"drilldown":10},{"name":"Ngaliyan","y":104,"drilldown":11},{"name":"Pedurungan","y":106,"drilldown":12},{"name":"Semarang Barat","y":132,"drilldown":1},{"name":"Semarang Selatan","y":82,"drilldown":13},{"name":"Semarang Tengah","y":74,"drilldown":3},{"name":"Semarang Timur","y":82,"drilldown":2},{"name":"Semarang Utara","y":192,"drilldown":14},{"name":"Tembalang","y":69,"drilldown":15},{"name":"Tugu","y":26,"drilldown":16}];
	var statistik_kelurahan = [{"name":"Banyumanik","id":4,"data":[{"name":"Banyumanik","y":12,"drilldown":"Banyumanik49"},{"name":"Gedawang","y":4,"drilldown":"Gedawang48"},{"name":"Jabungan","y":18,"drilldown":"Jabungan52"},{"name":"Ngesrep","y":9,"drilldown":"Ngesrep45"},{"name":"Padangsari","y":10,"drilldown":"Padangsari46"},{"name":"Pedalangan","y":8,"drilldown":"Pedalangan44"},{"name":"Pudakpayung","y":5,"drilldown":"Pudakpayung42"},{"name":"Srondol Kulon","y":2,"drilldown":"SrondolKulon47"},{"name":"Srondol Wetan","y":6,"drilldown":"SrondolWetan43"},{"name":"Sumurboto","y":4,"drilldown":"Sumurboto51"},{"name":"Tinjomoyo","y":7,"drilldown":"Tinjomoyo50"}]},{"name":"Candisari","id":5,"data":[{"name":"Candi","y":2,"drilldown":"Candi55"},{"name":"Jatingaleh","y":6,"drilldown":"Jatingaleh56"},{"name":"Jomblang","y":17,"drilldown":"Jomblang53"},{"name":"Karanganyar Gunung","y":4,"drilldown":"KaranganyarGunung57"},{"name":"Tegalsari","y":2,"drilldown":"Tegalsari54"}]},{"name":"Gajahmungkur","id":6,"data":[{"name":"Bendan Duwur","y":4,"drilldown":"BendanDuwur67"},{"name":"Bendungan","y":1,"drilldown":"Bendungan66"},{"name":"Gajahmungkur","y":14,"drilldown":"Gajahmungkur60"},{"name":"Karangrejo","y":8,"drilldown":"Karangrejo64"},{"name":"Lempongsari","y":5,"drilldown":"Lempongsari63"},{"name":"Petompon","y":1,"drilldown":"Petompon62"},{"name":"Sampangan","y":4,"drilldown":"Sampangan61"}]},{"name":"Gayamsari","id":7,"data":[{"name":"Gayamsari","y":5,"drilldown":"Gayamsari70"},{"name":"Kaligawe","y":12,"drilldown":"Kaligawe69"},{"name":"Pandean Lamper","y":5,"drilldown":"PandeanLamper68"},{"name":"Sambirejo","y":6,"drilldown":"Sambirejo73"},{"name":"Sawah Besar","y":2,"drilldown":"SawahBesar72"},{"name":"Siwalan","y":1,"drilldown":"Siwalan74"},{"name":"Tambakrejo","y":7,"drilldown":"Tambakrejo71"}]},{"name":"Genuk","id":8,"data":[{"name":"Bangetayu Kulon","y":6,"drilldown":"BangetayuKulon76"},{"name":"Bangetayu Wetan","y":4,"drilldown":"BangetayuWetan77"},{"name":"Banjardowo","y":5,"drilldown":"Banjardowo81"},{"name":"Genuksari","y":6,"drilldown":"Genuksari78"},{"name":"Karangroto","y":8,"drilldown":"Karangroto75"},{"name":"Kudu","y":2,"drilldown":"Kudu82"},{"name":"Muktiharjo Lor","y":2,"drilldown":"MuktiharjoLor84"},{"name":"Penggaron Lor","y":7,"drilldown":"PenggaronLor83"},{"name":"Sembungharjo","y":3,"drilldown":"Sembungharjo79"},{"name":"Terboyo Kulon","y":1,"drilldown":"TerboyoKulon87"}]},{"name":"Gunungpati","id":9,"data":[{"name":"Cepoko","y":6,"drilldown":"Cepoko102"},{"name":"Gunungpati","y":1,"drilldown":"Gunungpati90"},{"name":"Jatirejo","y":3,"drilldown":"Jatirejo103"},{"name":"Kalisegoro","y":13,"drilldown":"Kalisegoro100"},{"name":"Kandri","y":2,"drilldown":"Kandri94"},{"name":"Mangunsari","y":2,"drilldown":"Mangunsari95"},{"name":"Ngijo","y":11,"drilldown":"Ngijo98"},{"name":"Nongkosawit","y":1,"drilldown":"Nongkosawit97"},{"name":"Pakintelan","y":3,"drilldown":"Pakintelan96"},{"name":"Patemon","y":11,"drilldown":"Patemon99"},{"name":"Plalangan","y":1,"drilldown":"Plalangan101"},{"name":"Pongangan","y":2,"drilldown":"Pongangan93"},{"name":"Sadeng","y":1,"drilldown":"Sadeng89"},{"name":"Sekaran","y":15,"drilldown":"Sekaran91"},{"name":"Sukorejo","y":18,"drilldown":"Sukorejo88"},{"name":"Sumurrejo","y":1,"drilldown":"Sumurrejo92"}]},{"name":"Mijen","id":10,"data":[{"name":"Bubakan","y":6,"drilldown":"Bubakan113"},{"name":"Cangkiran","y":4,"drilldown":"Cangkiran107"},{"name":"Jatibarang","y":4,"drilldown":"Jatibarang114"},{"name":"Jatisari","y":8,"drilldown":"Jatisari104"},{"name":"Karangmalang","y":9,"drilldown":"Karangmalang116"},{"name":"Mijen","y":3,"drilldown":"Mijen108"},{"name":"Ngadirgo","y":12,"drilldown":"Ngadirgo106"},{"name":"Polaman","y":4,"drilldown":"Polaman117"},{"name":"Purwosari","y":16,"drilldown":"Purwosari112"},{"name":"Wonolopo","y":9,"drilldown":"Wonolopo105"},{"name":"Wonoplumbon","y":1,"drilldown":"Wonoplumbon110"}]},{"name":"Ngaliyan","id":11,"data":[{"name":"Bambankerep","y":3,"drilldown":"Bambankerep127"},{"name":"Bringin","y":6,"drilldown":"Bringin118"},{"name":"Gondoriyo","y":3,"drilldown":"Gondoriyo124"},{"name":"Kalipancur","y":16,"drilldown":"Kalipancur121"},{"name":"Ngaliyan","y":1,"drilldown":"Ngaliyan123"},{"name":"Podorejo","y":8,"drilldown":"Podorejo125"},{"name":"Purwoyoso","y":17,"drilldown":"Purwoyoso122"},{"name":"Tambakaji","y":18,"drilldown":"Tambakaji120"},{"name":"Wates","y":1,"drilldown":"Wates126"},{"name":"Wonosari","y":31,"drilldown":"Wonosari119"}]},{"name":"Pedurungan","id":12,"data":[{"name":"Gemah","y":5,"drilldown":"Gemah133"},{"name":"Kalicari","y":1,"drilldown":"Kalicari136"},{"name":"Muktiharjo Kidul","y":21,"drilldown":"MuktiharjoKidul129"},{"name":"Palebon","y":14,"drilldown":"Palebon134"},{"name":"Pedurungan Kidul","y":9,"drilldown":"PedurunganKidul135"},{"name":"Pedurungan Lor","y":5,"drilldown":"PedurunganLor137"},{"name":"Pedurungan Tengah","y":14,"drilldown":"PedurunganTengah130"},{"name":"Penggaron Kidul","y":8,"drilldown":"PenggaronKidul139"},{"name":"Plamongan Sari","y":7,"drilldown":"PlamonganSari131"},{"name":"Tlogomulyo","y":10,"drilldown":"Tlogomulyo132"},{"name":"Tlogosari Kulon","y":5,"drilldown":"TlogosariKulon128"},{"name":"Tlogosari Wetan","y":7,"drilldown":"TlogosariWetan138"}]},{"name":"Semarang Barat","id":1,"data":[{"name":"Bojong Salaman","y":5,"drilldown":"BojongSalaman14"},{"name":"Bongsari","y":14,"drilldown":"Bongsari15"},{"name":"Cabean","y":1,"drilldown":"Cabean2"},{"name":"Gisikdrono","y":16,"drilldown":"Gisikdrono13"},{"name":"Kalibanteng Kidul","y":3,"drilldown":"KalibantengKidul4"},{"name":"Kalibanteng Kulon","y":7,"drilldown":"KalibantengKulon7"},{"name":"Karangayu","y":6,"drilldown":"Karangayu5"},{"name":"Kembangarum","y":21,"drilldown":"Kembangarum12"},{"name":"Krapyak","y":4,"drilldown":"Krapyak8"},{"name":"Krobokan","y":14,"drilldown":"Krobokan10"},{"name":"Manyaran","y":11,"drilldown":"Manyaran11"},{"name":"Ngemplak Simongan","y":14,"drilldown":"NgemplakSimongan16"},{"name":"Salaman Mloyo","y":3,"drilldown":"SalamanMloyo3"},{"name":"Tambakharjo","y":3,"drilldown":"Tambakharjo1"},{"name":"Tawang Mas","y":9,"drilldown":"TawangMas9"},{"name":"Tawang Sari","y":1,"drilldown":"TawangSari6"}]},{"name":"Semarang Selatan","id":13,"data":[{"name":"Barusari","y":4,"drilldown":"Barusari149"},{"name":"Bulustalan","y":5,"drilldown":"Bulustalan146"},{"name":"Lamper Kidul","y":2,"drilldown":"LamperKidul148"},{"name":"Lamper Lor","y":9,"drilldown":"LamperLor147"},{"name":"Lamper Tengah","y":16,"drilldown":"LamperTengah145"},{"name":"Mugasari","y":6,"drilldown":"Mugasari140"},{"name":"Peterongan","y":5,"drilldown":"Peterongan143"},{"name":"Pleburan","y":5,"drilldown":"Pleburan142"},{"name":"Randusari","y":19,"drilldown":"Randusari144"},{"name":"Wonodri","y":11,"drilldown":"Wonodri141"}]},{"name":"Semarang Tengah","id":3,"data":[{"name":"Bangunharjo","y":2,"drilldown":"Bangunharjo33"},{"name":"Brumbungan","y":1,"drilldown":"Brumbungan39"},{"name":"Gabahan","y":4,"drilldown":"Gabahan30"},{"name":"Jagalan","y":4,"drilldown":"Jagalan41"},{"name":"Karangkidul","y":5,"drilldown":"Karangkidul34"},{"name":"Kauman","y":4,"drilldown":"Kauman35"},{"name":"Kembangsari","y":8,"drilldown":"Kembangsari29"},{"name":"Kranggan","y":7,"drilldown":"Kranggan31"},{"name":"Miroto","y":2,"drilldown":"Miroto27"},{"name":"Pandansari","y":5,"drilldown":"Pandansari37"},{"name":"Pekunden","y":1,"drilldown":"Pekunden32"},{"name":"Pendrikan Kidul","y":7,"drilldown":"PendrikanKidul38"},{"name":"Pendrikan Lor","y":13,"drilldown":"PendrikanLor28"},{"name":"Purwodinatan","y":10,"drilldown":"Purwodinatan40"},{"name":"Sekayu","y":1,"drilldown":"Sekayu36"}]},{"name":"Semarang Timur","id":2,"data":[{"name":"Bugangan","y":1,"drilldown":"Bugangan19"},{"name":"Karangturi","y":2,"drilldown":"Karangturi23"},{"name":"Kemijen","y":36,"drilldown":"Kemijen18"},{"name":"Mlatibaru","y":14,"drilldown":"Mlatibaru20"},{"name":"Mlatiharjo","y":5,"drilldown":"Mlatiharjo25"},{"name":"Rejomulyo","y":6,"drilldown":"Rejomulyo26"},{"name":"Rejosari","y":8,"drilldown":"Rejosari17"},{"name":"Sarirejo","y":10,"drilldown":"Sarirejo21"}]},{"name":"Semarang Utara","id":14,"data":[{"name":"Bandarharjo","y":48,"drilldown":"Bandarharjo156"},{"name":"Bulu Lor","y":5,"drilldown":"BuluLor154"},{"name":"Dadapsari","y":15,"drilldown":"Dadapsari153"},{"name":"Kuningan","y":25,"drilldown":"Kuningan155"},{"name":"Panggung Kidul","y":1,"drilldown":"PanggungKidul157"},{"name":"Panggung Lor","y":2,"drilldown":"PanggungLor150"},{"name":"Plombokan","y":5,"drilldown":"Plombokan158"},{"name":"Purwosari","y":3,"drilldown":"Purwosari152"},{"name":"Tanjung Mas","y":88,"drilldown":"TanjungMas151"}]},{"name":"Tembalang","id":15,"data":[{"name":"Bulusan","y":5,"drilldown":"Bulusan168"},{"name":"Jangli","y":2,"drilldown":"Jangli167"},{"name":"Kedungmundu","y":2,"drilldown":"Kedungmundu164"},{"name":"Kramas","y":2,"drilldown":"Kramas170"},{"name":"Meteseh","y":17,"drilldown":"Meteseh160"},{"name":"Rowosari","y":12,"drilldown":"Rowosari166"},{"name":"Sambiroto","y":3,"drilldown":"Sambiroto163"},{"name":"Sendangguwo","y":5,"drilldown":"Sendangguwo162"},{"name":"Sendangmulyo","y":7,"drilldown":"Sendangmulyo159"},{"name":"Tandang","y":13,"drilldown":"Tandang161"},{"name":"Tembalang","y":1,"drilldown":"Tembalang169"}]},{"name":"Tugu","id":16,"data":[{"name":"Jerakah","y":2,"drilldown":"Jerakah171"},{"name":"Karanganyar","y":4,"drilldown":"Karanganyar174"},{"name":"Mangkang Kulon","y":3,"drilldown":"MangkangKulon173"},{"name":"Mangkang Wetan","y":7,"drilldown":"MangkangWetan177"},{"name":"Mangunharjo","y":4,"drilldown":"Mangunharjo175"},{"name":"Tugurejo","y":6,"drilldown":"Tugurejo176"}]},{"name":"Jenis Kelamin","id":"Banyumanik49","data":[["Laki-Laki",3],["Perempuan",9]]},{"name":"Jenis Kelamin","id":"Gedawang48","data":[["Laki-Laki",1],["Perempuan",3]]},{"name":"Jenis Kelamin","id":"Jabungan52","data":[["Laki-Laki",10],["Perempuan",8]]},{"name":"Jenis Kelamin","id":"Ngesrep45","data":[["Laki-Laki",5],["Perempuan",4]]},{"name":"Jenis Kelamin","id":"Padangsari46","data":[["Laki-Laki",6],["Perempuan",4]]},{"name":"Jenis Kelamin","id":"Pedalangan44","data":[["Laki-Laki",3],["Perempuan",5]]},{"name":"Jenis Kelamin","id":"Pudakpayung42","data":[["Laki-Laki",4],["Perempuan",1]]},{"name":"Jenis Kelamin","id":"SrondolKulon47","data":[["Laki-Laki",1],["Perempuan",1]]},{"name":"Jenis Kelamin","id":"SrondolWetan43","data":[["Laki-Laki",5],["Perempuan",1]]},{"name":"Jenis Kelamin","id":"Sumurboto51","data":[["Laki-Laki",2],["Perempuan",2]]},{"name":"Jenis Kelamin","id":"Tinjomoyo50","data":[["Laki-Laki",4],["Perempuan",3]]},{"name":"Jenis Kelamin","id":"Candi55","data":[["Perempuan",2]]},{"name":"Jenis Kelamin","id":"Jatingaleh56","data":[["Laki-Laki",4],["Perempuan",2]]},{"name":"Jenis Kelamin","id":"Jomblang53","data":[["Laki-Laki",11],["Perempuan",6]]},{"name":"Jenis Kelamin","id":"KaranganyarGunung57","data":[["Laki-Laki",4]]},{"name":"Jenis Kelamin","id":"Tegalsari54","data":[["Laki-Laki",2]]},{"name":"Jenis Kelamin","id":"BendanDuwur67","data":[["Laki-Laki",2],["Perempuan",2]]},{"name":"Jenis Kelamin","id":"Bendungan66","data":[["Perempuan",1]]},{"name":"Jenis Kelamin","id":"Gajahmungkur60","data":[["Laki-Laki",5],["Perempuan",9]]},{"name":"Jenis Kelamin","id":"Karangrejo64","data":[["Laki-Laki",5],["Perempuan",3]]},{"name":"Jenis Kelamin","id":"Lempongsari63","data":[["Laki-Laki",4],["Perempuan",1]]},{"name":"Jenis Kelamin","id":"Petompon62","data":[["Laki-Laki",1]]},{"name":"Jenis Kelamin","id":"Sampangan61","data":[["Laki-Laki",1],["Perempuan",3]]},{"name":"Jenis Kelamin","id":"Gayamsari70","data":[["Laki-Laki",3],["Perempuan",2]]},{"name":"Jenis Kelamin","id":"Kaligawe69","data":[["Laki-Laki",7],["Perempuan",5]]},{"name":"Jenis Kelamin","id":"PandeanLamper68","data":[["Laki-Laki",1],["Perempuan",4]]},{"name":"Jenis Kelamin","id":"Sambirejo73","data":[["Laki-Laki",1],["Perempuan",5]]},{"name":"Jenis Kelamin","id":"SawahBesar72","data":[["Laki-Laki",2]]},{"name":"Jenis Kelamin","id":"Siwalan74","data":[["Laki-Laki",1]]},{"name":"Jenis Kelamin","id":"Tambakrejo71","data":[["Laki-Laki",1],["Perempuan",6]]},{"name":"Jenis Kelamin","id":"BangetayuKulon76","data":[["Laki-Laki",2],["Perempuan",4]]},{"name":"Jenis Kelamin","id":"BangetayuWetan77","data":[["Laki-Laki",1],["Perempuan",3]]},{"name":"Jenis Kelamin","id":"Banjardowo81","data":[["Laki-Laki",3],["Perempuan",2]]},{"name":"Jenis Kelamin","id":"Genuksari78","data":[["Laki-Laki",1],["Perempuan",5]]},{"name":"Jenis Kelamin","id":"Karangroto75","data":[["Laki-Laki",3],["Perempuan",5]]},{"name":"Jenis Kelamin","id":"Kudu82","data":[["Laki-Laki",1],["Perempuan",1]]},{"name":"Jenis Kelamin","id":"MuktiharjoLor84","data":[["Laki-Laki",1],["Perempuan",1]]},{"name":"Jenis Kelamin","id":"PenggaronLor83","data":[["Laki-Laki",4],["Perempuan",3]]},{"name":"Jenis Kelamin","id":"Sembungharjo79","data":[["Laki-Laki",2],["Perempuan",1]]},{"name":"Jenis Kelamin","id":"TerboyoKulon87","data":[["Laki-Laki",1]]},{"name":"Jenis Kelamin","id":"Cepoko102","data":[["Laki-Laki",2],["Perempuan",4]]},{"name":"Jenis Kelamin","id":"Gunungpati90","data":[["Perempuan",1]]},{"name":"Jenis Kelamin","id":"Jatirejo103","data":[["Laki-Laki",1],["Perempuan",2]]},{"name":"Jenis Kelamin","id":"Kalisegoro100","data":[["Laki-Laki",7],["Perempuan",6]]},{"name":"Jenis Kelamin","id":"Kandri94","data":[["Laki-Laki",1],["Perempuan",1]]},{"name":"Jenis Kelamin","id":"Mangunsari95","data":[["Perempuan",2]]},{"name":"Jenis Kelamin","id":"Ngijo98","data":[["Laki-Laki",6],["Perempuan",5]]},{"name":"Jenis Kelamin","id":"Nongkosawit97","data":[["Laki-Laki",1]]},{"name":"Jenis Kelamin","id":"Pakintelan96","data":[["Laki-Laki",1],["Perempuan",2]]},{"name":"Jenis Kelamin","id":"Patemon99","data":[["Laki-Laki",3],["Perempuan",8]]},{"name":"Jenis Kelamin","id":"Plalangan101","data":[["Laki-Laki",1]]},{"name":"Jenis Kelamin","id":"Pongangan93","data":[["Laki-Laki",1],["Perempuan",1]]},{"name":"Jenis Kelamin","id":"Sadeng89","data":[["Perempuan",1]]},{"name":"Jenis Kelamin","id":"Sekaran91","data":[["Laki-Laki",9],["Perempuan",6]]},{"name":"Jenis Kelamin","id":"Sukorejo88","data":[["Laki-Laki",7],["Perempuan",11]]},{"name":"Jenis Kelamin","id":"Sumurrejo92","data":[["Perempuan",1]]},{"name":"Jenis Kelamin","id":"Bubakan113","data":[["Laki-Laki",2],["Perempuan",4]]},{"name":"Jenis Kelamin","id":"Cangkiran107","data":[["Laki-Laki",1],["Perempuan",3]]},{"name":"Jenis Kelamin","id":"Jatibarang114","data":[["Laki-Laki",3],["Perempuan",1]]},{"name":"Jenis Kelamin","id":"Jatisari104","data":[["Laki-Laki",4],["Perempuan",4]]},{"name":"Jenis Kelamin","id":"Karangmalang116","data":[["Laki-Laki",4],["Perempuan",5]]},{"name":"Jenis Kelamin","id":"Mijen108","data":[["Laki-Laki",2],["Perempuan",1]]},{"name":"Jenis Kelamin","id":"Ngadirgo106","data":[["Laki-Laki",5],["Perempuan",7]]},{"name":"Jenis Kelamin","id":"Polaman117","data":[["Laki-Laki",2],["Perempuan",2]]},{"name":"Jenis Kelamin","id":"Purwosari112","data":[["Laki-Laki",9],["Perempuan",7]]},{"name":"Jenis Kelamin","id":"Wonolopo105","data":[["Laki-Laki",5],["Perempuan",4]]},{"name":"Jenis Kelamin","id":"Wonoplumbon110","data":[["Perempuan",1]]},{"name":"Jenis Kelamin","id":"Bambankerep127","data":[["Laki-Laki",2],["Perempuan",1]]},{"name":"Jenis Kelamin","id":"Bringin118","data":[["Laki-Laki",2],["Perempuan",4]]},{"name":"Jenis Kelamin","id":"Gondoriyo124","data":[["Laki-Laki",2],["Perempuan",1]]},{"name":"Jenis Kelamin","id":"Kalipancur121","data":[["Laki-Laki",12],["Perempuan",4]]},{"name":"Jenis Kelamin","id":"Ngaliyan123","data":[["Laki-Laki",1]]},{"name":"Jenis Kelamin","id":"Podorejo125","data":[["Laki-Laki",5],["Perempuan",3]]},{"name":"Jenis Kelamin","id":"Purwoyoso122","data":[["Laki-Laki",9],["Perempuan",8]]},{"name":"Jenis Kelamin","id":"Tambakaji120","data":[["Laki-Laki",7],["Perempuan",11]]},{"name":"Jenis Kelamin","id":"Wates126","data":[["Laki-Laki",1]]},{"name":"Jenis Kelamin","id":"Wonosari119","data":[["Laki-Laki",13],["Perempuan",18]]},{"name":"Jenis Kelamin","id":"Gemah133","data":[["Laki-Laki",2],["Perempuan",3]]},{"name":"Jenis Kelamin","id":"Kalicari136","data":[["Laki-Laki",1]]},{"name":"Jenis Kelamin","id":"MuktiharjoKidul129","data":[["Laki-Laki",5],["Perempuan",16]]},{"name":"Jenis Kelamin","id":"Palebon134","data":[["Laki-Laki",5],["Perempuan",9]]},{"name":"Jenis Kelamin","id":"PedurunganKidul135","data":[["Laki-Laki",4],["Perempuan",5]]},{"name":"Jenis Kelamin","id":"PedurunganLor137","data":[["Laki-Laki",4],["Perempuan",1]]},{"name":"Jenis Kelamin","id":"PedurunganTengah130","data":[["Laki-Laki",8],["Perempuan",6]]},{"name":"Jenis Kelamin","id":"PenggaronKidul139","data":[["Laki-Laki",4],["Perempuan",4]]},{"name":"Jenis Kelamin","id":"PlamonganSari131","data":[["Laki-Laki",4],["Perempuan",3]]},{"name":"Jenis Kelamin","id":"Tlogomulyo132","data":[["Laki-Laki",5],["Perempuan",5]]},{"name":"Jenis Kelamin","id":"TlogosariKulon128","data":[["Perempuan",5]]},{"name":"Jenis Kelamin","id":"TlogosariWetan138","data":[["Laki-Laki",5],["Perempuan",2]]},{"name":"Jenis Kelamin","id":"BojongSalaman14","data":[["Laki-Laki",3],["Perempuan",2]]},{"name":"Jenis Kelamin","id":"Bongsari15","data":[["Laki-Laki",9],["Perempuan",5]]},{"name":"Jenis Kelamin","id":"Cabean2","data":[["Perempuan",1]]},{"name":"Jenis Kelamin","id":"Gisikdrono13","data":[["Laki-Laki",4],["Perempuan",12]]},{"name":"Jenis Kelamin","id":"KalibantengKidul4","data":[["Laki-Laki",2],["Perempuan",1]]},{"name":"Jenis Kelamin","id":"KalibantengKulon7","data":[["Laki-Laki",5],["Perempuan",2]]},{"name":"Jenis Kelamin","id":"Karangayu5","data":[["Laki-Laki",4],["Perempuan",2]]},{"name":"Jenis Kelamin","id":"Kembangarum12","data":[["Laki-Laki",14],["Perempuan",7]]},{"name":"Jenis Kelamin","id":"Krapyak8","data":[["Laki-Laki",1],["Perempuan",3]]},{"name":"Jenis Kelamin","id":"Krobokan10","data":[["Laki-Laki",6],["Perempuan",8]]},{"name":"Jenis Kelamin","id":"Manyaran11","data":[["Laki-Laki",9],["Perempuan",2]]},{"name":"Jenis Kelamin","id":"NgemplakSimongan16","data":[["Laki-Laki",7],["Perempuan",7]]},{"name":"Jenis Kelamin","id":"SalamanMloyo3","data":[["Laki-Laki",1],["Perempuan",2]]},{"name":"Jenis Kelamin","id":"Tambakharjo1","data":[["Perempuan",3]]},{"name":"Jenis Kelamin","id":"TawangMas9","data":[["Laki-Laki",6],["Perempuan",3]]},{"name":"Jenis Kelamin","id":"TawangSari6","data":[["Perempuan",1]]},{"name":"Jenis Kelamin","id":"Barusari149","data":[["Laki-Laki",1],["Perempuan",3]]},{"name":"Jenis Kelamin","id":"Bulustalan146","data":[["Perempuan",5]]},{"name":"Jenis Kelamin","id":"LamperKidul148","data":[["Perempuan",2]]},{"name":"Jenis Kelamin","id":"LamperLor147","data":[["Laki-Laki",6],["Perempuan",3]]},{"name":"Jenis Kelamin","id":"LamperTengah145","data":[["Laki-Laki",5],["Perempuan",11]]},{"name":"Jenis Kelamin","id":"Mugasari140","data":[["Laki-Laki",2],["Perempuan",4]]},{"name":"Jenis Kelamin","id":"Peterongan143","data":[["Laki-Laki",3],["Perempuan",2]]},{"name":"Jenis Kelamin","id":"Pleburan142","data":[["Laki-Laki",2],["Perempuan",3]]},{"name":"Jenis Kelamin","id":"Randusari144","data":[["Laki-Laki",14],["Perempuan",5]]},{"name":"Jenis Kelamin","id":"Wonodri141","data":[["Laki-Laki",9],["Perempuan",2]]},{"name":"Jenis Kelamin","id":"Bangunharjo33","data":[["Laki-Laki",1],["Perempuan",1]]},{"name":"Jenis Kelamin","id":"Brumbungan39","data":[["Perempuan",1]]},{"name":"Jenis Kelamin","id":"Gabahan30","data":[["Laki-Laki",3],["Perempuan",1]]},{"name":"Jenis Kelamin","id":"Jagalan41","data":[["Laki-Laki",1],["Perempuan",3]]},{"name":"Jenis Kelamin","id":"Karangkidul34","data":[["Laki-Laki",2],["Perempuan",3]]},{"name":"Jenis Kelamin","id":"Kauman35","data":[["Laki-Laki",2],["Perempuan",2]]},{"name":"Jenis Kelamin","id":"Kembangsari29","data":[["Laki-Laki",6],["Perempuan",2]]},{"name":"Jenis Kelamin","id":"Kranggan31","data":[["Laki-Laki",3],["Perempuan",4]]},{"name":"Jenis Kelamin","id":"Miroto27","data":[["Laki-Laki",1],["Perempuan",1]]},{"name":"Jenis Kelamin","id":"Pandansari37","data":[["Laki-Laki",3],["Perempuan",2]]},{"name":"Jenis Kelamin","id":"Pekunden32","data":[["Perempuan",1]]},{"name":"Jenis Kelamin","id":"PendrikanKidul38","data":[["Laki-Laki",1],["Perempuan",6]]},{"name":"Jenis Kelamin","id":"PendrikanLor28","data":[["Laki-Laki",6],["Perempuan",7]]},{"name":"Jenis Kelamin","id":"Purwodinatan40","data":[["Laki-Laki",5],["Perempuan",5]]},{"name":"Jenis Kelamin","id":"Sekayu36","data":[["Perempuan",1]]},{"name":"Jenis Kelamin","id":"Bugangan19","data":[["Perempuan",1]]},{"name":"Jenis Kelamin","id":"Karangturi23","data":[["Perempuan",2]]},{"name":"Jenis Kelamin","id":"Kemijen18","data":[["Laki-Laki",17],["Perempuan",19]]},{"name":"Jenis Kelamin","id":"Mlatibaru20","data":[["Laki-Laki",8],["Perempuan",6]]},{"name":"Jenis Kelamin","id":"Mlatiharjo25","data":[["Laki-Laki",5]]},{"name":"Jenis Kelamin","id":"Rejomulyo26","data":[["Laki-Laki",5],["Perempuan",1]]},{"name":"Jenis Kelamin","id":"Rejosari17","data":[["Laki-Laki",2],["Perempuan",6]]},{"name":"Jenis Kelamin","id":"Sarirejo21","data":[["Laki-Laki",6],["Perempuan",4]]},{"name":"Jenis Kelamin","id":"Bandarharjo156","data":[["Laki-Laki",26],["Perempuan",22]]},{"name":"Jenis Kelamin","id":"BuluLor154","data":[["Laki-Laki",4],["Perempuan",1]]},{"name":"Jenis Kelamin","id":"Dadapsari153","data":[["Laki-Laki",5],["Perempuan",10]]},{"name":"Jenis Kelamin","id":"Kuningan155","data":[["Laki-Laki",11],["Perempuan",14]]},{"name":"Jenis Kelamin","id":"PanggungKidul157","data":[["Perempuan",1]]},{"name":"Jenis Kelamin","id":"PanggungLor150","data":[["Laki-Laki",2]]},{"name":"Jenis Kelamin","id":"Plombokan158","data":[["Laki-Laki",4],["Perempuan",1]]},{"name":"Jenis Kelamin","id":"Purwosari152","data":[["Laki-Laki",1],["Perempuan",2]]},{"name":"Jenis Kelamin","id":"TanjungMas151","data":[["Laki-Laki",38],["Perempuan",50]]},{"name":"Jenis Kelamin","id":"Bulusan168","data":[["Laki-Laki",3],["Perempuan",2]]},{"name":"Jenis Kelamin","id":"Jangli167","data":[["Laki-Laki",1],["Perempuan",1]]},{"name":"Jenis Kelamin","id":"Kedungmundu164","data":[["Laki-Laki",1],["Perempuan",1]]},{"name":"Jenis Kelamin","id":"Kramas170","data":[["Laki-Laki",1],["Perempuan",1]]},{"name":"Jenis Kelamin","id":"Meteseh160","data":[["Laki-Laki",7],["Perempuan",10]]},{"name":"Jenis Kelamin","id":"Rowosari166","data":[["Laki-Laki",9],["Perempuan",3]]},{"name":"Jenis Kelamin","id":"Sambiroto163","data":[["Laki-Laki",3]]},{"name":"Jenis Kelamin","id":"Sendangguwo162","data":[["Laki-Laki",4],["Perempuan",1]]},{"name":"Jenis Kelamin","id":"Sendangmulyo159","data":[["Laki-Laki",5],["Perempuan",2]]},{"name":"Jenis Kelamin","id":"Tandang161","data":[["Laki-Laki",3],["Perempuan",10]]},{"name":"Jenis Kelamin","id":"Tembalang169","data":[["Perempuan",1]]},{"name":"Jenis Kelamin","id":"Jerakah171","data":[["Laki-Laki",2]]},{"name":"Jenis Kelamin","id":"Karanganyar174","data":[["Laki-Laki",2],["Perempuan",2]]},{"name":"Jenis Kelamin","id":"MangkangKulon173","data":[["Perempuan",3]]},{"name":"Jenis Kelamin","id":"MangkangWetan177","data":[["Laki-Laki",4],["Perempuan",3]]},{"name":"Jenis Kelamin","id":"Mangunharjo175","data":[["Laki-Laki",3],["Perempuan",1]]},{"name":"Jenis Kelamin","id":"Tugurejo176","data":[["Laki-Laki",4],["Perempuan",2]]}];

	total_jenkel = 0;

	for (i = 0; i < data_jenkel.length; i++) {
		total_jenkel += data_jenkel[i].y;
	}

	Highcharts.setOptions({
		colors: Highcharts.map(Highcharts.getOptions().colors, function (color) {
			return {
				radialGradient: {
					cx: 0.5,
					cy: 0.3,
					r: 0.7
				},
				stops: [
					[0, color],
					[1, Highcharts.color(color).brighten(-0.3).get('rgb')] // darken
				]
			};
		})
	});

	Highcharts.chart('chart-jenkel', {
		chart: {
			type: 'pie',
		},
		title: {
			text: 'Data Stunting berdasarkan Jenis Kelamin (Tahun 2023)',
			align: 'left',
		},
		credits: {
			text: 'Sumber Data : Data Stunting dari Dinas Kesehatan Kota Semarang 2023',
			href: 'http://119.2.50.170:9095/dashboardNew/index.php/home/stunting?bulan=06&tahun=2023',
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
				dataLabels: {
					enabled: true,
					distance: 50,
					format: 'Total : {point.total} anak',
					style: {
						fontSize: '12pt'
					}
				}
				// dataLabels: {
				// 	enabled: true,
				// 	format: '<span style="font-size: 8pt"><b>{point.name}</b> : {y}</span>',
				// 	connectorColor: 'silver'
				// }
			}
		},
		series: [{
			name: 'Jumlah',
			innerSize: '70%',
			dataLabels: {
				enabled: false,
				style: {
					fontSize: 12
				}
			},
			data: data_jenkel,
		}]
	});

	Highcharts.chart('chart-umur', {
		colors: ['#0077B6', '#FB6F92'],
		chart: {
			type: 'column',
			zoomType: 'y',
			height: 500,
		},
		title: {
			text: 'Data Stunting berdasarkan Umur (Tahun 2023)',
			align: 'left',
		},
		credits: {
			text: 'Sumber Data : Data Stunting dari Dinas Kesehatan Kota Semarang 2023',
			href: 'http://119.2.50.170:9095/dashboardNew/index.php/home/stunting?bulan=06&tahun=2023',
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
				text: 'Total data stunting (<span style="font-weight: bold;">'+total_jenkel+'</span>)',
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
		series: [
			{
				name: 'Laki-Laki',
				dataLabels: {
					style: {
						fontSize: 14
					}
				},
				data: umur_male,
			},
			{
				name: 'Perempuan',
				dataLabels: {
					style: {
						fontSize: 14
					}
				},
				data: umur_female,
			}
		]
	});

	Highcharts.chart('chart-kecamatan', {
		colors: colors_kelurahan,
		chart: {
			type: 'column',
			zoomType: 'y',
			height: 600,
		},
		title: {
			text: 'Data Stunting berdasarkan Jenis Kelamin per Kecamatan (Tahun 2023)',
			align: 'left',
		},
		credits: {
			text: 'Sumber Data : Data Stunting dari Dinas Kesehatan Kota Semarang 2023',
			href: 'http://119.2.50.170:9095/dashboardNew/index.php/home/stunting?bulan=06&tahun=2023',
			style: {
				color: '#6e6e6e',
				fontSize: 10,
			},
		},
		xAxis: {
			categories: nama_kecamatan,
			title: {
				text: 'Nama Kecamatan',
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
				description: 'Data stunting berdasarkan kategori kecamatan'
			}
		},
		yAxis: {
			title: {
				text: 'Total data stunting (<span style="font-weight: bold;">'+total_jenkel+'</span>)',
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
		series: [
			{
				name: 'Laki-Laki',
				dataLabels: {
					style: {
						fontSize: 14
					}
				},
				data: male_kecamatan,
			},
			{
				name: 'Perempuan',
				dataLabels: {
					style: {
						fontSize: 14
					}
				},
				data: female_kecamatan
			}
		]
	});

	Highcharts.chart('chart-kelurahan', {
		colors: colors_kecamatan,
		chart: {
			type: 'column',
			height: 600,
		},
		title: {
			align: 'left',
			text: 'Data Stunting Pemerintah Kota Semarang (Tahun 2023)'
		},
		subtitle: {
			align: 'left',
			text: ''
		},
		credits: {
			text: 'Sumber Data : Data Stunting dari Dinas Kesehatan Kota Semarang 2023',
			href: 'http://119.2.50.170:9095/dashboardNew/index.php/home/stunting?bulan=06&tahun=2023',
			style: {
				color: '#6e6e6e',
				fontSize: 10,
			},
		},
		xAxis: {
			type: 'category',
			title: {
				text: null,
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
		},
		yAxis: {
			title: {
				text: 'Total data stunting (<span style="font-weight: bold;">'+total_jenkel+'</span>)',
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
		legend: {
			itemStyle: {
				fontSize: "10pt",
				fontWeight: "bold",
				textOverflow: "ellipsis",
			},
		},
		plotOptions: {
			column: {
				dataLabels: {
					style: {
						fontSize: 14,
					},
					enabled: true
				}
			},
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
				name: 'Nama Kecamatan',
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



	//DONUT CHART
	// var donut = new Morris.Donut({
	// 	element: 'pie-chart',
	// 	resize: true,
	// 	colors: ["#3c8dbc", "#f56954"],
	// 	data: [
	// 		{label: "Laki-Laki", value: 629},
	// 		{label: "Perempuan", value: 640},
	// 	],
	// 	hideHover: 'auto'
	// });

	// var bar = new Morris.Bar({
	// 	element: 'chart-balita',
	// 	resize: true,
	// 	data: [
	// 		{ y: '1 Tahun', a: 144, b: 95 },
	// 		{ y: '2 Tahun', a: 167, b: 149 },
	// 		{ y: '3 Tahun', a: 175, b: 210 },
	// 		{ y: '4 tahun', a: 135, b: 167 },
	// 		{ y: '5 tahun', a: 8, b: 19 },
	// 	],
	// 	barColors: ['#00a65a', '#f56954'],
	// 	xkey: 'y',
	// 	ykeys: ['a', 'b'],
	// 	labels: ['Laki-Laki', 'Perempuan'],
	// 	hideHover: 'auto'
	// });

	// var bar = new Morris.Bar({
	// 	element: 'chart-kecamatan',
	// 	resize: true,
	// 	data: [
	// 		{ y: 'Semarang Barat', a: 71, b: 61 },
	// 		{ y: 'Semarang Timur', a: 43, b: 39 },
	// 		{ y: 'Semarang Tengah', a: 34, b: 40 },
	// 		{ y: 'Banyumanik', a: 44, b: 41 },
	// 		{ y: 'Candisari', a: 21, b: 10 },
	// 		{ y: 'Gajahmungkur', a: 18, b: 19 },
	// 		{ y: 'Gayamsari', a: 16, b: 22 },
	// 		{ y: 'Genuk', a: 19, b: 25 },
	// 		{ y: 'Gunungpati', a: 40, b: 51 },
	// 		{ y: 'Mijen', a: 37, b: 39 },
	// 		{ y: 'Ngaliyan', a: 54, b: 50 },
	// 		{ y: 'Pedurungan', a: 47, b: 59 },
	// 		{ y: 'Semarang Selatan', a: 42, b: 40 },
	// 		{ y: 'Semarang Utara', a: 91, b: 101 },
	// 		{ y: 'Tembalang', a: 37, b: 32 },
	// 		{ y: 'Tugu', a: 15, b: 11 },
	// 	],
	// 	barColors: ['#00a65a', '#f56954'],
	// 	xkey: 'y',
	// 	ykeys: ['a', 'b'],
	// 	labels: ['Laki-Laki', 'Perempuan'],
	// 	hideHover: 'auto'
	// });

	// var bar = new Morris.Bar({
	// 	element: 'chart-kelurahan',
	// 	resize: true,
	// 	data: [
	// 		{ y: 'Semarang Barat', a: 100, b: 90 },
	// 		{ y: 'Semarang Timur', a: 75, b: 65 },
	// 		{ y: 'Semarang Tengah', a: 50, b: 40 },
	// 		{ y: 'Banyumanik', a: 75, b: 65 },
	// 		{ y: 'Candisari', a: 50, b: 40 },
	// 		{ y: 'Gajahmungkur', a: 100, b: 90 },
	// 		{ y: 'Gayamsari', a: 75, b: 65 },
	// 		{ y: 'Genuk', a: 50, b: 40 },
	// 		{ y: 'Gunungpati', a: 75, b: 65 },
	// 		{ y: 'Mijen', a: 50, b: 40 },
	// 		{ y: 'Ngaliyan', a: 100, b: 90 },
	// 		{ y: 'Pedurungan', a: 75, b: 65 },
	// 		{ y: 'Semarang Selatan', a: 50, b: 40 },
	// 		{ y: 'Semarang Utara', a: 75, b: 65 },
	// 		{ y: 'Tembalang', a: 50, b: 40 },
	// 		{ y: 'Tugu', a: 50, b: 40 },
	// 	],
	// 	barColors: ['#00a65a', '#f56954'],
	// 	xkey: 'y',
	// 	ykeys: ['a', 'b'],
	// 	labels: ['Laki-Laki', 'Perempuan'],
	// 	hideHover: 'auto'
	// });
</script>