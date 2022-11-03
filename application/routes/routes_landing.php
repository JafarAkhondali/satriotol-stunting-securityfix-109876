<?php
$route['default_controller'] = 'web';


/* Custom Route */
$route['tahun-lokus-stunting'] 			= 'web/tahun_lokus';
$route['rembuk-stunting'] 				= 'web/rembuk_stunting';
$route['analisa-situasi'] 				= 'web/analisa_situasi';
$route['analisa-situasi-detail/(:any)'] = 'web/analisa_situasi_detail/$1';
$route['rencana-kegiatan'] 				= 'web/rencana_kegiatan';