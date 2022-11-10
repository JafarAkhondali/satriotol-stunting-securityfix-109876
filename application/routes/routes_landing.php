<?php
$route['default_controller'] = 'web';


/* Custom Route */
$route['lokus-stunting'] 				= 'web/lokus_stunting';
$route['rembuk-stunting'] 				= 'web/rembuk_stunting';
$route['analisa-situasi'] 				= 'web/analisa_situasi';
$route['analisa-situasi-detail/(:any)'] = 'web/analisa_situasi_detail/$1';
$route['rencana-kegiatan'] 				= 'web/rencana_kegiatan';
$route['data-statistik'] 				= 'web/data_statistik';
$route['kebijakan'] 					= 'web/kebijakan';
$route['aksi-konvergensi'] 				= 'web/aksi_konvergensi';
$route['rencana-kegiatan-dinas'] 		= 'web/rentan_opd';