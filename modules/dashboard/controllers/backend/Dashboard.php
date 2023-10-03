<?php
defined('BASEPATH') OR exit('No direct script access allowed');


/**
*| --------------------------------------------------------------------------
*| Dashboard Controller
*| --------------------------------------------------------------------------
*| For see your board
*|
*/
class Dashboard extends Admin {
	public function __construct() {
		parent::__construct();
	}

	public function index() {
		if (!$this->aauth->is_allowed('dashboard')) {
        // if (!$this->aauth->is_admin() && !$this->aauth->is_member(7)) {
		// if (!$this->aauth->is_allowed('dashboard')) {
			// redirect('/', 'refresh');
			redirect(base_url().'administrator/user/profile', 'refresh');
			// }
			// $data = [];
			// $this->render('backend/standart/dashboard', $data);
		// }else{
		}

		$this->data = [];
		$this->render('backend/standart/administrator/dashboard', $this->data);
	}

	public function chart() {
		if (!$this->aauth->is_allowed('dashboard')) {
			redirect('/','refresh');
		}

		$data = [];
		$this->render('backend/standart/chart', $data);
	}

	public function api_data($token = null) {
		if ($token == null) {
			$token = $this->session->userdata('token');
		}

		$curl_data = curl_init();

		curl_setopt_array($curl_data, [
			CURLOPT_URL 			=> url_api_dkk('stunting'),
			CURLOPT_RETURNTRANSFER 	=> true,
			CURLOPT_ENCODING 		=> '',
			CURLOPT_MAXREDIRS 		=> 10,
			CURLOPT_TIMEOUT 		=> 0,
			CURLOPT_SSL_VERIFYHOST 	=> 0,
			CURLOPT_SSL_VERIFYPEER 	=> 0,
			CURLOPT_FOLLOWLOCATION 	=> true,
			CURLOPT_HTTP_VERSION 	=> CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST 	=> 'GET',
			CURLOPT_HTTPHEADER 		=> [
					'Accept: application/json',
					'Content-Type: application/json',
					'Authorization: Bearer '.$token,
				],
			]
		);

		$response_stunting = curl_exec($curl_data);

		curl_close($curl_data);

		// $this->response($response_stunting);
		return json_decode($response_stunting, true);
	}

	public function data_jumlah_jenkel() {
		$data_api = $this->api_data();

		$jenkel = [
			'Laki-laki' => 0,
			'Perempuan' => 0,
		];

		foreach ($data_api['data'] as $item) {
			if ($item['jenis_kelamin'] == 'L') {
				$jenkel['Laki-laki']++;
			} else if ($item['jenis_kelamin'] == 'P') {
				$jenkel['Perempuan']++;
			}
		}
		
		$result_data = [
			[
				'name' 			=> 'Jenis Kelamin',
				'colorByPoint' 	=> true,
				'innerSize'		=> '70%',
				'dataLabels'	=> [
					'enabled' 	=> false,
					'style' 	=> [
						'fontSize' => 12
					]
				],
				'data' => [
					[
						'name' 	=> 'Laki-laki',
						'y' 	=> $jenkel['Laki-laki'],
						'dataLabels' => [
							'enabled' 	=> true,
							'distance' 	=> -165,
							'format' 	=>  'Total {point.total} anak',
							'style' =>[
								'fontSize' => '12pt',
							],
						],
					],
					[
						'name' 	=> 'Perempuan',
						'y' 	=> $jenkel['Perempuan'],
					],
				],
			],
		];

		$this->response($result_data);
	}

	public function data_jumlah_umur() {
		$data_api = $this->api_data();

		$umur_male = [];
		$umur_female = [];

		for ($umur = 1; $umur <= 5; $umur++) {
			$umur_male[$umur] 	= 0;
			$umur_female[$umur] = 0;
		}

		foreach ($data_api['data'] as $item) {
			$tgl_lahir 		= $item['tanggal_lahir'];
			$tgl_lahir_date = new DateTime($tgl_lahir);
			$tgl_sekarang 	= new DateTime();
			$umur 			= $tgl_lahir_date->diff($tgl_sekarang)->y;

			if ($umur <= 5) {
				if ($item['jenis_kelamin'] == 'L') {
					$umur_male[$umur]++;
				} else if ($item['jenis_kelamin'] == 'P') {
					$umur_female[$umur]++;
				}
			}
		}

		$result_data['kategoriUmur'] 	= ['1 Tahun', '2 Tahun', '3 Tahun', '4 Tahun', '5 Tahun'];
		$result_data['totalJenkel'] 	= array_sum($umur_male) + array_sum($umur_female);
		$result_data['jenkel'] 			= [
			[
				'name' => 'Laki-Laki',
				'dataLabels' => [
					'style' => [
						'fontSize' => 14,
					],
				],
				'data' => array_values($umur_male),
			],
			[
				'name' => 'Perempuan',
				'dataLabels' => [
					'style' => [
						'fontSize' => 14,
					],
				],
				'data' => array_values($umur_female),
			],
		];

		$this->response($result_data);
	}

	public function data_jumlah_kecamatan() {
		$data_api 			= $this->api_data();
		$dataUsia 			= [];
		$totalDataPerTahun 	= [];

		$kecamatanDomisiliArray = [];

		foreach ($data_api['data'] as $data) {
			$usia 				= $data['usia'];
			$kecamatanDomisili 	= $data['kecamatan_domsili'];

			if (!isset($kecamatanDomisiliArray[$kecamatanDomisili])) {
				$kecamatanDomisiliArray[$kecamatanDomisili] = true;
			}

			preg_match('/(\d+) tahun/', $usia, $matches);
			$tahun = (int)$matches[1];

			if (!isset($totalDataPerTahun[$tahun][$kecamatanDomisili])) {
				$totalDataPerTahun[$tahun][$kecamatanDomisili] = 1;
			} else {
				$totalDataPerTahun[$tahun][$kecamatanDomisili]++;
			}
		}

		$kecamatanOrder = array_keys($kecamatanDomisiliArray);
		ksort($kecamatanOrder);

		foreach ($totalDataPerTahun as $tahun => $totalPerKecamatan) {
			$dataPerKecamatan = [];
			foreach ($kecamatanOrder as $kecamatan) {
				$total = isset($totalPerKecamatan[$kecamatan]) ? $totalPerKecamatan[$kecamatan] : 0;
					$dataPerKecamatan[] = $total;
			}

			usort($dataPerKecamatan, function ($a, $b) use ($kecamatanOrder) {
				$aIndex = array_search($a['name'], $kecamatanOrder);
				$bIndex = array_search($b['name'], $kecamatanOrder);
	
				return $aIndex - $bIndex;
			});

			$dataUsia[] = [
				"name" => "$tahun Tahun",
				"data" => $dataPerKecamatan
			];
		}

		usort($dataUsia, function ($a, $b) {
			return strcmp($a['name'], $b['name']);
		});

		foreach ($dataUsia as &$tahunData) {
			foreach ($tahunData['data'] as &$kecamatanData) {
				$kecamatan = $kecamatanData['name'];
				$urutan = array_search($kecamatan, $kecamatanOrder);
				if ($urutan !== false) {
					$kecamatanData['name'] = $kecamatanOrder[$urutan];
				}
			}
		}

		$totalData = array_sum(array_map(function ($tahun) {
			return array_sum($tahun);
		}, $totalDataPerTahun));

		$this->data['total_data'] = $totalData;
		$this->data['kecamatan'] = $kecamatanOrder;
		$this->data['data_usia'] = $dataUsia;

		$this->response($this->data);
	}

	public function data_jumlah_kelurahan() {
		$data_api 			= $this->api_data();
		$hasil 				= [];
		$jumlah_kecamatan 	= [];
		$kelurahan_data 	= [];

		foreach ($data_api['data'] as $data) {
			$kecamatan_domisili = $data['kecamatan_domsili'];
			$kelurahan_domisili = $data['kelurahan_domsili'];

			if (!isset($jumlah_kecamatan[$kecamatan_domisili])) {
				$jumlah_kecamatan[$kecamatan_domisili] = 0;
			}

			$jumlah_kecamatan[$kecamatan_domisili]++;
	
			// if (!isset($kelurahan_data[$kelurahan_domisili])) {
			// 	$kelurahan_data[$kelurahan_domisili] = 0;
			// }
	
			$kelurahan_data[$kecamatan_domisili][$kelurahan_domisili] = isset($kelurahan_data[$kecamatan_domisili][$kelurahan_domisili]) ? $kelurahan_data[$kecamatan_domisili][$kelurahan_domisili] + 1 : 1;
			// $kelurahan_data[$kecamatan_domisili][$kelurahan_domisili]++;
		}

		foreach ($kelurahan_data as $kecamatan_domisili) {
			ksort($kelurahan_data[$kecamatan_domisili]);
		}

		foreach ($jumlah_kecamatan as $kecamatan_domisili => $jumlah) {
			$hasil_series[] = [
				'name' 		=> $kecamatan_domisili,
				'y' 		=> $jumlah,
				'drilldown' => str_replace(' ', '', $kecamatan_domisili),
			];
		}

		foreach ($jumlah_kecamatan as $kecamatan_domisili => $jumlah) {
			$data_per_kecamatan = [];

			foreach ($kelurahan_data[$kecamatan_domisili] as $nama_kelurahan => $total_per_kelurahan) {
				$data_per_kecamatan[] = [
					$nama_kelurahan,
					$total_per_kelurahan
				];
			}

			$hasil_drilldown[] = [
				'name' 	=> $kecamatan_domisili,
				'id' 	=> str_replace(' ', '', $kecamatan_domisili),
				'data' 	=> $data_per_kecamatan
			];
		}

		$this->data['data_total'] 		= array_sum(array_column($hasil_series, 'y'));
		$this->data['data_series'] 		= $hasil_series;
		$this->data['data_drilldown'] 	= $hasil_drilldown;

		$this->response($this->data);
	}
}

/* End of file Dashboard.php */
/* Location: ./application/controllers/administrator/Dashboard.php */