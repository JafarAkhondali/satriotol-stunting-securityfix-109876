<?php

use Mpdf\Tag\Input;

defined('BASEPATH') or exit('No direct script access allowed');

/**
 *| --------------------------------------------------------------------------
 *| Web Controller
 *| --------------------------------------------------------------------------
 *| For default controller
 *|
 */
class Web extends Front {
	public function __construct() {
		parent::__construct();

		$this->load->model('model_web');
	}

	public function api_data() {
		$token = $this->session->userdata('token');

		if ($token == null) {
			$login_api = json_decode(auth_api_login(), true);

			$token = $login_api['token'];

			$session_api = [
				'token' => $token,
			];

			$this->session->set_userdata($session_api);
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

	public function index() {
		$data['sliders']        = $this->db->where('slider_status', '1')->order_by('slider_id', 'DESC')->get('sliders')->result();
		$data['categories']     = $this->db->get('blog_category')->result();
		$data['links']          = $this->db->where('menu_type_id = 3')->order_by('sort', 'ASC')->get('menu')->result();
		$data['navigation']     = $this->db->where('menu_type_id = 2')->get('menu')->result();
		$data['blogs']          = $this->model_web->berita_terbaru()->result();
		$data['faqs']           = $this->db->get('faqs', '5')->result();
		$data['about']          = $this->db->get('about')->row();
		$data['kontaks']        = $this->db->get('contacts')->result();

		$this->template->build('beranda', $data);
	}

	public function home() {
		if (defined('IS_DEMO')) {
			$this->template->build('home-demo');
		} else {
			$this->template->build('home');
		}
	}

	public function switch_lang($lang = 'english') {
		$this->load->helper(['cookie']);

		set_cookie('language', $lang, (60 * 60 * 24) * 365);
		$this->lang->load('web', $lang);
		redirect_back();
	}

	public function set_full_group_sql() {
		$this->db->query(" 
			set global sql_mode='STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION';
		 ");

		$this->db->query(" 
			set session sql_mode='STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION';
		 ");
	}

	public function migrate($version = null) {
		$this->load->library('migration');

		if ($version) {
			if ($this->migration->version($version) === FALSE) {
				show_error($this->migration->error_string());
			}
		} else {
			if ($this->migration->latest() === FALSE) {
				show_error($this->migration->error_string());
			}
		}
	}

	public function migrate_cicool() {
		$this->load->helper('file');
		$this->load->helper('directory');

		$files = (directory_map('application/controllers/administrator'));

		foreach ($files as $file) {
			$f_name = str_replace('.php', '', $file);
			$f_name_lower = strtolower(str_replace('.php', '', $file));

			if ($file == 'index.html') {
				continue;
			}
			if ($f_name_lower != 'web') {

				mkdir('modules/' . $f_name);
				mkdir('modules/' . $f_name . '/models');
				mkdir('modules/' . $f_name . '/views');
				mkdir('modules/' . $f_name . '/controllers');
				mkdir('modules/' . $f_name . '/controllers/backend');
				mkdir('modules/' . $f_name . '/views/backend');
				mkdir('modules/' . $f_name . '/views/backend/standart');
				mkdir('modules/' . $f_name . '/views/backend/standart/administrator');
				copy(FCPATH . '/application/models/Model_' . $f_name_lower . '.php', 'modules/' . $f_name_lower . '/models/Model_' . $f_name_lower . '.php');
				copy(FCPATH . '/application/controllers/administrator/' . $f_name . '.php', 'modules/' . $f_name . '/controllers/backend/' . $f_name . '.php');
				if (is_dir(FCPATH . '/application/views/backend/standart/administrator/' . $f_name_lower)) {

					$this->recurse_copy(FCPATH . '/application/views/backend/standart/administrator/' . $f_name_lower, 'modules/' . $f_name . '/views/backend/standart/administrator/' . $f_name_lower);
				}
				//unlink('modules/'.$f_name_lower.'/models'.$f_name_lower.'.php' );
			}
		}
	}

	public function migrate_cicool_front() {
		$this->load->helper('file');
		$this->load->helper('directory');

		$files = (directory_map('application/controllers'));

		foreach ($files as $file) {
			$f_name = str_replace('.php', '', $file);
			$f_name_lower = strtolower(str_replace('.php', '', $file));

			if ($file == 'index.html') {
				continue;
			}
			if ($f_name_lower != 'web') {

				mkdir('modules/' . $f_name);
				mkdir('modules/' . $f_name . '/models');
				mkdir('modules/' . $f_name . '/views');
				mkdir('modules/' . $f_name . '/controllers');
				mkdir('modules/' . $f_name . '/controllers');
				mkdir('modules/' . $f_name . '/views/backend');
				mkdir('modules/' . $f_name . '/views/backend/standart');
				mkdir('modules/' . $f_name . '/views/backend/standart/administrator');
				copy(FCPATH . '/application/models/Model_' . $f_name_lower . '.php', 'modules/' . $f_name_lower . '/models/Model_' . $f_name_lower . '.php');
				copy(FCPATH . '/application/controllers/' . $f_name . '.php', 'modules/' . $f_name . '/controllers/' . $f_name . '.php');
				if (is_dir(FCPATH . '/application/views/backend/standart/administrator/' . $f_name_lower)) {

					$this->recurse_copy(FCPATH . '/application/views/backend/standart/administrator/' . $f_name_lower, 'modules/' . $f_name . '/views/backend/standart/administrator/' . $f_name_lower);
				}
				//unlink('modules/'.$f_name_lower.'/models'.$f_name_lower.'.php' );
			}
		}
	}

	public function recurse_copy($src, $dst) {
		$dir = opendir($src);
		@mkdir($dst);
		while (false !== ($file = readdir($dir))) {
			if (($file != '.') && ($file != '..')) {
				if (is_dir($src . '/' . $file)) {
					$this->recurse_copy($src . '/' . $file, $dst . '/' . $file);
				} else {
					copy($src . '/' . $file, $dst . '/' . $file);
				}
			}
		}
		closedir($dir);
	}

	function image($mime_type_or_return = 'image/png') {
		$file_path = $this->input->get('path');
		$this->helper('file');

		$image_content = read_file($file_path);

		// Image was not found
		if ($image_content === FALSE) {
			show_error('Image "' . $file_path . '" could not be found.');
			return FALSE;
		}

		// Return the image or output it?
		if ($mime_type_or_return === TRUE) {
			return $image_content;
		}

		header('Content-Length: ' . strlen($image_content)); // sends filesize header
		header('Content-Type: ' . $mime_type_or_return); // send mime-type header
		header('Content-Disposition: inline; filename="' . basename($file_path) . '";'); // sends filename header
		exit($image_content); // reads and outputs the file onto the output buffer
	}

	public function create_user() {
		for ($i = 0; $i < 30; $i++) {
			$this->aauth->create_user('user' . $i . '@gmail.com', 'admin123', 'user' . $i);
		}
	}

	public function rembuk_stunting() {
		$data['categories']     = $this->db->get('blog_category')->result();
		$data['links']          = $this->db->where('menu_type_id = 3')->get('menu')->result();
		$data['navigation']     = $this->db->where('menu_type_id = 2')->get('menu')->result();
		$data['about']          = $this->db->get('about')->row();

		$data['rembuks'] 		= $this->model_web->rembuk_stunting()->row();

		$this->template->build('rembuk-stunting', $data);
	}

	public function detail_rembuk_stunting() {
		$id                     = $this->input->get('id');

		$data['sliders']        = $this->db->where('slider_status', '1')->get('sliders')->result();
		$data['categories']     = $this->db->get('blog_category')->result();
		$data['links']          = $this->db->where('menu_type_id = 3')->get('menu')->result();
		$data['navigation']     = $this->db->where('menu_type_id = 2')->get('menu')->result();
		$data['blogs']          = $this->model_web->berita_terbaru()->result();
		$data['faqs']           = $this->db->from('faqs')->get()->result();
		$data['about']          = $this->db->get('about')->row();

		$data['rembuks'] 		= $this->model_web->rembuk_stunting($id)->result();

		$this->template->build('rembuk-stunting-detail', $data);
	}

	public function analisa_situasi() {
		$data['sliders']        = $this->db->where('slider_status', '1')->get('sliders')->result();
		$data['categories']     = $this->db->get('blog_category')->result();
		$data['links']          = $this->db->where('menu_type_id = 3')->get('menu')->result();
		$data['navigation']     = $this->db->where('menu_type_id = 2')->get('menu')->result();
		$data['blogs']          = $this->model_web->berita_terbaru()->result();
		$data['faqs']           = $this->db->from('faqs')->get()->result();
		$data['about']          = $this->db->get('about')->row();
		$data['indikators'] 	= $this->db->get('analisa_situasi_indikator')->result();

		$this->template->build('analisa-situasi-stunting', $data);
	}

	public function analisa_situasi_detail() {
		$id = $this->input->get('id');
		
		$data['sliders']        = $this->db->where('slider_status', '1')->get('sliders')->result();
		$data['categories']     = $this->db->get('blog_category')->result();
		$data['links']          = $this->db->where('menu_type_id = 3')->get('menu')->result();
		$data['navigation']     = $this->db->where('menu_type_id = 2')->get('menu')->result();
		$data['blogs']          = $this->model_web->berita_terbaru()->result();
		$data['faqs']           = $this->db->from('faqs')->get()->result();
		$data['about']          = $this->db->get('about')->row();
		$data['indikator'] 		= $this->db->where(['analisa_situasi_indikator_id' => $id])->get('analisa_situasi_indikator')->row();
		$data['analisa'] 		= $this->model_web->query_analisa_stunting($id)->result();

		$this->template->build('analisa-situasi-detail', $data);
	}

	public function rencana_kegiatan() {
		$data['sliders']        = $this->db->where('slider_status', '1')->get('sliders')->result();
		$data['categories']     = $this->db->get('blog_category')->result();
		$data['links']          = $this->db->where('menu_type_id = 3')->get('menu')->result();
		$data['navigation']     = $this->db->where('menu_type_id = 2')->get('menu')->result();
		$data['about']          = $this->db->get('about')->row();
		$data['rencana']        = $this->db->get('rencana_kegiatans')->row();

		$this->template->build('rencana-kegiatan', $data);
	}

	public function data_statistik() {
		$data['sliders']        = $this->db->where('slider_status', '1')->get('sliders')->result();
		$data['categories']     = $this->db->get('blog_category')->result();
		$data['links']          = $this->db->where('menu_type_id = 3')->get('menu')->result();
		$data['navigation']     = $this->db->where('menu_type_id = 2')->get('menu')->result();
		$data['about']          = $this->db->get('about')->row();

		$this->template->build('data-statistik', $data);
	}

	public function kebijakan() {
		$data['sliders']        = $this->db->where('slider_status', '1')->get('sliders')->result();
		$data['categories']     = $this->db->get('blog_category')->result();
		$data['links']          = $this->db->where('menu_type_id = 3')->get('menu')->result();
		$data['navigation']     = $this->db->where('menu_type_id = 2')->get('menu')->result();
		$data['about']          = $this->db->get('about')->row();
		$data['policies']       = $this->db->from('policies')->order_by('policies_id', 'desc')->get()->result();

		$this->template->build('kebijakan', $data);
	}

	public function lokus_stunting() {
		$data['sliders']        = $this->db->where('slider_status', '1')->get('sliders')->result();
		$data['categories']     = $this->db->get('blog_category')->result();
		$data['links']          = $this->db->where('menu_type_id = 3')->get('menu')->result();
		$data['navigation']     = $this->db->where('menu_type_id = 2')->get('menu')->result();
		$data['about']          = $this->db->get('about')->row();
		$data['kecamatans']     = $this->db->get('kecamatans')->result();

		$this->template->build('lokus-stunting', $data);
	}

	public function hasil_lokus_stunting(){
		$tahun      = $this->input->get('tahun');

		$data['kecamatans'] = $this->db->get('kecamatans')->result();
		$data['results'] 	= $this->model_web->hasil_lokus_stunting($tahun);

		$this->template->build('file-lokus-stunting', $data);
	}

	public function aksi_konvergensi(){
		$data = [
			'sliders' 		=> $this->db->where('slider_status', '1')->get('sliders')->result(),
			'categories' 	=> $this->db->get('blog_category')->result(),
			'links'			=> $this->db->where('menu_type_id = 3')->get('menu')->result(),
			'navigation' 	=> $this->db->where('menu_type_id = 2')->get('menu')->result(),
			'about' 		=> $this->db->get('about')->row()
		];

		$this->template->build('aksi-konvergensi', $data);
	}

	public function rentan_opd(){
		$id = $this->input->get('id');
		
		if ($id == null) {
			$data = [
				'sliders' 		=> $this->db->where('slider_status', '1')->get('sliders')->result(),
				'categories' 	=> $this->db->get('blog_category')->result(),
				'links'			=> $this->db->where('menu_type_id = 3')->get('menu')->result(),
				'navigation' 	=> $this->db->where('menu_type_id = 2')->get('menu')->result(),
				'about' 		=> $this->db->get('about')->row(),
				'opds' 			=> $this->model_web->rentan_opd()->result(),
				'rentan_opds' 	=> $this->model_web->rentan_opd_kegiatan()->result(),
			];

			$this->template->build('rentan-opd', $data);
		}else{
			$data = [
				'sliders' 		=> $this->db->where('slider_status', '1')->get('sliders')->result(),
				'categories' 	=> $this->db->get('blog_category')->result(),
				'links'			=> $this->db->where('menu_type_id = 3')->get('menu')->result(),
				'navigation' 	=> $this->db->where('menu_type_id = 2')->get('menu')->result(),
				'about' 		=> $this->db->get('about')->row(),
				'rentan_opd' 	=> $this->model_web->rentan_opd_kegiatan($id)->row(),
				'galeries' 		=> $this->model_web->rentan_opd_galeri($id)->result(),
			];

			$this->template->build('rentan-opd-galery', $data);
		}
	}

	public function pembinaan_kader(){
		$data = [
			'sliders' 		=> $this->db->where('slider_status', '1')->get('sliders')->result(),
			'categories' 	=> $this->db->get('blog_category')->result(),
			'links'			=> $this->db->where('menu_type_id = 3')->get('menu')->result(),
			'navigation' 	=> $this->db->where('menu_type_id = 2')->get('menu')->result(),
			'about' 		=> $this->db->get('about')->row(),
			'pembinaan' 	=> $this->db->where(['aksi_koko_status' => '1', 'aksi_koko_kategori' => '1'])->get('aksi_koko')->row(),
		];

		$this->template->build('pembinaan-kader', $data);
	}

	public function manajemen_data_stunting(){
		$data = [
			'sliders' 		=> $this->db->where('slider_status', '1')->get('sliders')->result(),
			'categories' 	=> $this->db->get('blog_category')->result(),
			'links'			=> $this->db->where('menu_type_id = 3')->get('menu')->result(),
			'navigation' 	=> $this->db->where('menu_type_id = 2')->get('menu')->result(),
			'about' 		=> $this->db->get('about')->row(),
			'mantastu' 		=> $this->db->where(['aksi_koko_status' => '1', 'aksi_koko_kategori' => '2'])->get('aksi_koko')->row(),
		];

		$this->template->build('manajemen-data-stunting', $data);
	}

	public function data_stunting() {
		$data_kecamatan 	= $this->db->order_by('kecamatan_nama')->get('kecamatans')->result();
		$data_kelurahan 	= $this->db->get('kelurahans')->result();
		
		$stunting_jenkel 	= $this->model_web->query_stuntingByAge()->result_array();

		$stunting_kelurahan = [];

		$query_stunting_kecamatan = $this->model_web->query_data_stunting_kecamatan()->result();
		$query_stunting_kelurahan = $this->model_web->query_data_stunting_kelurahan()->result();

		for ($i=0; $i < count($stunting_jenkel) ; $i++) {
			if ($stunting_jenkel[$i]['anak_jenkel'] == '1') {
				$jenkel = 'Laki-Laki';
			}elseif ($stunting_jenkel[$i]['anak_jenkel'] == '2') {
				$jenkel = 'Perempuan';
			}

			$chart_jenkel[] = [
				'name' 	=> $jenkel,
				'y' 	=> $stunting_jenkel[$i]['total'],
			];
		}

		for ($i=0; $i < 5 ; $i++) { 
			$kategori_umur[$i] = $i + 1 ." Tahun";

			$stunting_umur = $this->model_web->query_stuntingByAge($i + 1)->result();

			foreach($stunting_umur as $item){
				if($item->anak_jenkel == "1"){
					$male_umur[$i] 	= $item->total;
				}else {
					$female_umur[$i] = $item->total;
				}
			}
		}

		for ($i=0; $i < count($data_kecamatan); $i++) {
			$nama_kecamatan[$i] = $data_kecamatan[$i]->kecamatan_nama;

			$stunting_kecamatan = $this->model_web->query_stuntingByWilayah($data_kecamatan[$i]->kecamatan_id, 'kecamatan')->result();

			foreach ($stunting_kecamatan as $item) {
				if($item->anak_jenkel == "1"){
					$male_kecamatan[$i] = $item->total;
				}else if($item->anak_jenkel == "2"){
					$female_kecamatan[$i] = $item->total;
				}
			}
		}

		for ($i=0; $i < count($query_stunting_kecamatan); $i++) {
			$data_stunting_kecamatan[$i]['name'] 		= $query_stunting_kecamatan[$i]->kecamatan_nama;
			$data_stunting_kecamatan[$i]['y'] 			= $query_stunting_kecamatan[$i]->total;
			$data_stunting_kecamatan[$i]['drilldown'] 	= $query_stunting_kecamatan[$i]->kecamatan_id;

			$query_data_stunting_kelurahan[$i] = $this->model_web->query_data_stunting_kelurahan($query_stunting_kecamatan[$i]->kecamatan_id)->result();

			if (count($query_data_stunting_kelurahan[$i]) > 0) {
				$data_stunting_kelurahan[$i]['name'] 	= $query_stunting_kecamatan[$i]->kecamatan_nama;
				$data_stunting_kelurahan[$i]['id'] 		= $query_stunting_kecamatan[$i]->kecamatan_id;

				for ($j=0; $j < count($query_data_stunting_kelurahan[$i]); $j++) {
					$kelurahan_id[$i][$j] 	= $query_data_stunting_kelurahan[$i][$j]->kelurahan_id;
					$kelurahan_nama[$i][$j] = $query_data_stunting_kelurahan[$i][$j]->kelurahan_nama;

					$data_stunting_kelurahan[$i]['data'][] = [
						'name' 		=> $query_data_stunting_kelurahan[$i][$j]->kelurahan_nama,
						'y' 		=> $query_data_stunting_kelurahan[$i][$j]->total,
						'drilldown' => str_replace(' ', '', $kelurahan_nama[$i][$j]).''.$kelurahan_id[$i][$j],
					];
				}
			}
		}

		for ($i=0; $i < count($query_stunting_kelurahan); $i++) {
			$kelurahan_id[$i] = $query_stunting_kelurahan[$i]->kelurahan_id;
			$query_kelurahan_by_jenkel[$i] = $this->model_web->query_data_stunting_kelurahan_by_jenkel($query_stunting_kelurahan[$i]->kelurahan_id)->result();

			for ($j=0; $j < count($query_kelurahan_by_jenkel[$i]); $j++) {
				$data_stunting_kelurahan_by_jenkel[$i]['name'] 	= 'Jenis Kelamin';
				$data_stunting_kelurahan_by_jenkel[$i]['id'] 	= str_replace(' ', '', $query_stunting_kelurahan[$i]->kelurahan_nama).''.$kelurahan_id[$i];

				if($query_kelurahan_by_jenkel[$i][$j]->anak_jenkel == "1"){
					$data_stunting_kelurahan_by_jenkel[$i]['data'][$j] = ['Laki-Laki', $query_kelurahan_by_jenkel[$i][$j]->total];
				}else if($query_kelurahan_by_jenkel[$i][$j]->anak_jenkel == "2"){
					$data_stunting_kelurahan_by_jenkel[$i]['data'][$j] = ['Perempuan', $query_kelurahan_by_jenkel[$i][$j]->total];
				}
			}
		}

		$merge_kelurahan = array_merge($data_stunting_kelurahan, $data_stunting_kelurahan_by_jenkel);

		$data = [
			'about' 			=> $this->db->get('about')->row(),
			'categories' 		=> $this->db->get('blog_category')->result(),
			'links'				=> $this->db->where('menu_type_id = 3')->get('menu')->result(),
			'navigation' 		=> $this->db->where('menu_type_id = 2')->get('menu')->result(),
			'kontaks'        	=> $this->db->get('contacts')->result(),

			'stunting_jenkel' 			=> $chart_jenkel,
			'kategori_umur' 			=> $kategori_umur,
			'umur_male' 				=> $male_umur,
			'umur_female' 				=> $female_umur,
			'nama_kecamatan' 			=> $nama_kecamatan,
			'male_kecamatan' 			=> $male_kecamatan,
			'female_kecamatan' 			=> $female_kecamatan,
			'data_stunting_kecamatan' 	=> $data_stunting_kecamatan,
			'data_stunting_kelurahan' 	=> $merge_kelurahan,
		];

		$this->template->build('chart-stunting', $data);
	}

	public function data_dtks() {
		$data_kecamatan 	= $this->db->get('kecamatans')->result();
		$data_kelurahan 	= $this->db->get('kelurahans')->result();

		$dtks_jenkel 		= $this->model_web->query_dtksByAge()->result_array();

		for ($i=0; $i < count($dtks_jenkel) ; $i++) {
			if ($dtks_jenkel[$i]['dtks_jenkel'] == 'L') {
				$jenkel = 'Laki-Laki';
			}elseif ($dtks_jenkel[$i]['dtks_jenkel'] == 'P') {
				$jenkel = 'Perempuan';
			}

			$chart_jenkel[] = [
				'name' => $jenkel,
				'y' => $dtks_jenkel[$i]['total'],
			];
		}

		$data = [
			'about' 			=> $this->db->get('about')->row(),
			'categories' 		=> $this->db->get('blog_category')->result(),
			'links'				=> $this->db->where('menu_type_id = 3')->get('menu')->result(),
			'navigation' 		=> $this->db->where('menu_type_id = 2')->get('menu')->result(),
			'kontaks'        	=> $this->db->get('contacts')->result(),

			'dtks_jenkel' 				=> $chart_jenkel,
		];

		$this->template->build('chart-dtks', $data);
	}

	public function chart_dtks_kecamatan() {
		$data_kecamatan 	= $this->db->get('kecamatans')->result();

		for ($i=0; $i < count($data_kecamatan); $i++) {
			$nama_kecamatan[$i] = $data_kecamatan[$i]->kecamatan_nama;

			$dtks_wilayah_kecamatan = $this->model_web->query_dtksByWilayah($data_kecamatan[$i]->kecamatan_id, 'kecamatan')->result();

			foreach ($dtks_wilayah_kecamatan as $item) {
				if($item->dtks_jenkel == "L"){
					$male_kecamatan[$i] = $item->total;
				}else if($item->dtks_jenkel == "P"){
					$female_kecamatan[$i] = $item->total;
				}
			}
		}

		$data = [
			'about' 			=> $this->db->get('about')->row(),
			'categories' 		=> $this->db->get('blog_category')->result(),
			'links'				=> $this->db->where('menu_type_id = 3')->get('menu')->result(),
			'navigation' 		=> $this->db->where('menu_type_id = 2')->get('menu')->result(),
			'kontaks'        	=> $this->db->get('contacts')->result(),

			'kecamatan_nama' 	=> $nama_kecamatan,
			'kecamatan_male' 	=> $male_kecamatan,
			'kecamatan_female' 	=> $female_kecamatan,
		];

		$this->template->build('chart-dtks-kecamatan', $data);
	}

	public function chart_dtks_kelurahan() {
		$dtks_kecamatan 	= $this->model_web->query_data_dtks_kecamatan()->result();
		$dtks_kelurahan 	= $this->model_web->query_data_dtks_kelurahan()->result();
		// echo $this->db->last_query();
		// exit;

		for ($i=0; $i < count($dtks_kecamatan); $i++) {
			$data_dtks_kecamatan[$i]['name'] 		= $dtks_kecamatan[$i]->kecamatan_nama;
			$data_dtks_kecamatan[$i]['y'] 			= $dtks_kecamatan[$i]->total;
			$data_dtks_kecamatan[$i]['drilldown'] 	= $dtks_kecamatan[$i]->dtks_kecamatan;

			$query_data_dtks_kelurahan[$i] = $this->model_web->query_data_dtks_kelurahan($dtks_kecamatan[$i]->dtks_kecamatan)->result();

			if (count($query_data_dtks_kelurahan[$i]) > 0) {
				$data_dtks_kelurahan[$i]['name'] 	= $dtks_kecamatan[$i]->kecamatan_nama;
				$data_dtks_kelurahan[$i]['id'] 		= $dtks_kecamatan[$i]->dtks_kecamatan;

				for ($j=0; $j < count($query_data_dtks_kelurahan[$i]); $j++) {
					$kelurahan_id[$i][$j] 	= $query_data_dtks_kelurahan[$i][$j]->kelurahan_id;
					$kelurahan_nama[$i][$j] = $query_data_dtks_kelurahan[$i][$j]->kelurahan_nama;

					if ($kelurahan_id[$i][$j] != null) {
						$_kelurahan = $query_data_dtks_kelurahan[$i][$j]->kelurahan_nama;
					}else{
						$_kelurahan = 'Tidak Diketahui';
					}

					$data_dtks_kelurahan[$i]['data'][] = [
						'name' 		=> $_kelurahan,
						'y' 		=> $query_data_dtks_kelurahan[$i][$j]->total,
						'drilldown' => str_replace(' ', '', $kelurahan_nama[$i][$j]).''.$kelurahan_id[$i][$j],
					];
				}
			}
		}

		for ($i=0; $i < count($dtks_kelurahan); $i++) {
			$kelurahan_id[$i] = $dtks_kelurahan[$i]->kelurahan_id;
			$query_kelurahan_by_jenkel[$i] = $this->model_web->query_data_dtks_kelurahan_by_jenkel($dtks_kelurahan[$i]->kelurahan_id)->result();

			for ($j=0; $j < count($query_kelurahan_by_jenkel[$i]); $j++) {
				$data_dtks_kelurahan_by_jenkel[$i]['name'] 	= 'Jenis Kelamin';
				$data_dtks_kelurahan_by_jenkel[$i]['id'] 	= str_replace(' ', '', $dtks_kelurahan[$i]->kelurahan_nama).''.$kelurahan_id[$i];

				if($query_kelurahan_by_jenkel[$i][$j]->dtks_jenkel == "L"){
					$data_dtks_kelurahan_by_jenkel[$i]['data'][$j] = ['Laki-Laki', $query_kelurahan_by_jenkel[$i][$j]->total];
				}else if($query_kelurahan_by_jenkel[$i][$j]->dtks_jenkel == "P"){
					$data_dtks_kelurahan_by_jenkel[$i]['data'][$j] = ['Perempuan', $query_kelurahan_by_jenkel[$i][$j]->total];
				}
			}
		}

		$merge_kelurahan = array_merge($data_dtks_kelurahan, $data_dtks_kelurahan_by_jenkel);

		$data = [
			'about' 			=> $this->db->get('about')->row(),
			'categories' 		=> $this->db->get('blog_category')->result(),
			'links'				=> $this->db->where('menu_type_id = 3')->get('menu')->result(),
			'navigation' 		=> $this->db->where('menu_type_id = 2')->get('menu')->result(),
			'kontaks'        	=> $this->db->get('contacts')->result(),

			'data_dtks_kecamatan' 	=> $data_dtks_kecamatan,
			'data_dtks_kelurahan' 	=> $merge_kelurahan,
		];

		$this->template->build('chart-dtks-kelurahan', $data);
	}

	public function pengukuran_stunting() {
		$id 					= $this->input->get('id');

		$data['categories']     = $this->db->get('blog_category')->result();
		$data['links']          = $this->db->where('menu_type_id = 3')->get('menu')->result();
		$data['navigation']     = $this->db->where('menu_type_id = 2')->get('menu')->result();
		$data['about']          = $this->db->get('about')->row();

		if (!empty($id)) {
			$data['pustu'] 	= db_get_all_data('publikasi_stunting', ['pustun_id' => $id]);
			$konten 		= 'pengukuran-stunting-detail';
		} else {
			$data['pustu'] = db_get_all_data('publikasi_stunting');
			$konten 		= 'pengukuran-stunting';
		}

		$this->template->build($konten, $data);
	}

	public function ppstunting() {
		$data = [
			'sliders' 		=> $this->db->where('slider_status', '1')->get('sliders')->result(),
			'categories' 	=> $this->db->get('blog_category')->result(),
			'links'			=> $this->db->where('menu_type_id = 3')->get('menu')->result(),
			'navigation' 	=> $this->db->where('menu_type_id = 2')->get('menu')->result(),
			'about' 		=> $this->db->get('about')->row()
		];

		$this->template->build('penurunan-percepatan-stunting', $data);
	}

	public function intervensibalita() {
		$data = [
			'sliders' 		=> $this->db->where('slider_status', '1')->get('sliders')->result(),
			'categories' 	=> $this->db->get('blog_category')->result(),
			'links'			=> $this->db->where('menu_type_id = 3')->get('menu')->result(),
			'navigation' 	=> $this->db->where('menu_type_id = 2')->get('menu')->result(),
			'about' 		=> $this->db->get('about')->row()
		];

		$this->template->build('program-intervensi-balita', $data);
	}

	public function edukasigizi() {
		$data = [
			'sliders' 		=> $this->db->where('slider_status', '1')->get('sliders')->result(),
			'categories' 	=> $this->db->get('blog_category')->result(),
			'links'			=> $this->db->where('menu_type_id = 3')->get('menu')->result(),
			'navigation' 	=> $this->db->where('menu_type_id = 2')->get('menu')->result(),
			'about' 		=> $this->db->get('about')->row()
		];

		$this->template->build('wisata-edukasi-gizi', $data);
	}

	public function penghargaan() {
		$data = [
			'sliders' 		=> $this->db->where('slider_status', '1')->get('sliders')->result(),
			'categories' 	=> $this->db->get('blog_category')->result(),
			'links'			=> $this->db->where('menu_type_id = 3')->get('menu')->result(),
			'navigation' 	=> $this->db->where('menu_type_id = 2')->get('menu')->result(),
			'about' 		=> $this->db->get('about')->row()
		];

		$this->template->build('penghargaan', $data);
	}

	public function faq() {
		$data = [
			'links'			=> $this->db->where('menu_type_id = 3')->get('menu')->result(),
			'categories' 	=> $this->db->get('blog_category')->result(),
			'navigation' 	=> $this->db->where('menu_type_id = 2')->get('menu')->result(),
			'about' 		=> $this->db->get('about')->row(),
			'faqs' 			=> $this->db->get('faqs')->result(),
		];

		$this->template->build('faq', $data);
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
		$jumlah_kecamatan 	= [];
		$kelurahan_data 	= [];

		foreach ($data_api['data'] as $data) {
			$kecamatan_domisili = $data['kecamatan_domsili'];
			$kelurahan_domisili = $data['kelurahan_domsili'];

			if (!isset($jumlah_kecamatan[$kecamatan_domisili])) {
				$jumlah_kecamatan[$kecamatan_domisili] = 0;
			}

			$jumlah_kecamatan[$kecamatan_domisili]++;

			$kelurahan_data[$kecamatan_domisili][$kelurahan_domisili] = isset($kelurahan_data[$kecamatan_domisili][$kelurahan_domisili]) ? $kelurahan_data[$kecamatan_domisili][$kelurahan_domisili] + 1 : 1;
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


/* End of file Web.php */
/* Location: ./application/controllers/Web.php */