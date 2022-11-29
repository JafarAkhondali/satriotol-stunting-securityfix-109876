<?php
	$array_lokus_kecamatan 	= [];
	$array_lokus_kelurahan 	= [];
	$key_array 				= [];

	if (count($results->result()) > 0) {
?>
<link rel="stylesheet" href="<?= BASE_ASSET;?>leaflet/leaflet.css" />

<a href="<?= base_url().'uploads/lokus_years/'.$results->row()->file_lokus;?>" target="blank" class="btn btn-danger mb-25">Lihat File</a>
<div id="map" style="width: 1200px; height: 720px; z-index: 1;"></div>

<script type="text/javascript" src="<?= BASE_ASSET;?>leaflet/leaflet.js"></script>

<script type="text/javascript">
	var map = L.map('map').setView([-7.001574, 110.406562], 12);

	L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
		attribution: '&copy; <a href="https://semarangkota.go.id/">Kota Semarang</a> | <a href="https://diskominfo.semarangkota.go.id/">Diskominfo</a> contributors'
	}).addTo(map);

<?php
		foreach ($results->result() as $result) {
			$array_lokus_kecamatan[] 						= $result->kecamatan_id;

			$array_lokus_kelurahan[$result->kecamatan_id][] =  $result->kelurahan_nama;

			$data_kelurahan[$result->kecamatan_id] 			= implode('<br/>&nbsp;&nbsp;&nbsp;&nbsp;- ', $array_lokus_kelurahan[$result->kecamatan_id]);
		}

		for ($i=0; $i < count($kecamatans); $i++) {
?>
<?php
			if (in_array($kecamatans[$i]->kecamatan_id, $array_lokus_kecamatan)) {
?>
	$.getJSON('<?= base_url().'peta-administrasi/'.$kecamatans[$i]->kecamatan_geojson;?>', function (data) {
		geoLayer = L.geoJson(data, {
			style : function (feature) {
				return {
					opacity : 0.5,
					color : '#007100',
					weight : 1,
					fillOpacity : 0.2,
					fillColor : 'red'
				}
			},
		}).addTo(map);

		geoLayer.eachLayer(function (layer) {
			layer.bindPopup('<?php echo '<b>Kecamatan '.$kecamatans[$i]->kecamatan_nama.'</b> : <br/>&nbsp;&nbsp;&nbsp;&nbsp;- '.$data_kelurahan[$kecamatans[$i]->kecamatan_id];?>');
		});
	});
<?php
				}else{
?>
	$.getJSON('<?php echo base_url().'peta-administrasi/'.$kecamatans[$i]->kecamatan_geojson;?>', function (data) {
		geoLayer = L.geoJson(data, {
			style : function (feature) {
				return {
					opacity : 0.5,
					color : '#007100',
					weight : 1,
					fillOpacity : 0.3,
					fillColor : 'grey'
				}
			},
		}).addTo(map);

		geoLayer.eachLayer(function (layer) {
			layer.bindPopup('<?php echo 'Kecamatan '.$kecamatans[$i]->kecamatan_nama;?>');
		});
	});
<?php
			}
		}
	}else{
		echo 'Data Not Available !';
	}
?>

</script>