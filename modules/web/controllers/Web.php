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

	public function index() {
		$data['sliders']        = $this->db->get('sliders')->result();
		$data['categories']     = $this->db->get('blog_category')->result();
		$data['links']          = $this->db->where('menu_type_id = 3')->get('menu')->result();
		$data['navigation']     = $this->db->where('menu_type_id = 2')->get('menu')->result();
		$data['blogs']          = $this->model_web->berita_terbaru()->result();
		$data['faqs']           = $this->db->from('faqs')->get()->result();
		$data['about']          = $this->db->get('about')->row();
		$data['kontaks']        = $this->db->get('contacts')->result();

		// echo json_encode($data['about']);

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
		$id                     = $this->input->get('id');
		
		$data['sliders']        = $this->db->get('sliders')->result();
		$data['categories']     = $this->db->get('blog_category')->result();
		$data['links']          = $this->db->where('menu_type_id = 3')->get('menu')->result();
		$data['navigation']     = $this->db->where('menu_type_id = 2')->get('menu')->result();
		$data['blogs']          = $this->model_web->berita_terbaru()->result();
		$data['faqs']           = $this->db->from('faqs')->get()->result();
		$data['about']          = $this->db->get('about')->row();
		$rembuks 				= $this->model_web->rembuk_stunting($id);

		if (!empty($id)) {
			$data['rembuks'] 		= $rembuks->row();
			
			$this->template->build('rembuk-stunting-detail', $data);
		}else{
			$data['rembuks'] 		= $rembuks->result();

			$this->template->build('rembuk-stunting', $data);
		}
	}

	public function detail_rembuk_stunting() {
		$id                     = $this->input->get('id');

		$data['sliders']        = $this->db->get('sliders')->result();
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
		$data['sliders']        = $this->db->get('sliders')->result();
		$data['categories']     = $this->db->get('blog_category')->result();
		$data['links']          = $this->db->where('menu_type_id = 3')->get('menu')->result();
		$data['navigation']     = $this->db->where('menu_type_id = 2')->get('menu')->result();
		$data['blogs']          = $this->model_web->berita_terbaru()->result();
		$data['faqs']           = $this->db->from('faqs')->get()->result();
		$data['about']          = $this->db->get('about')->row();
		$data['analisas'] 		= $this->db->get('analisa_situasi')->result();

		$this->template->build('analisa-situasi-stunting', $data);
	}

	public function analisa_situasi_detail($id) {
		$data['sliders']        = $this->db->get('sliders')->result();
		$data['categories']     = $this->db->get('blog_category')->result();
		$data['links']          = $this->db->where('menu_type_id = 3')->get('menu')->result();
		$data['navigation']     = $this->db->where('menu_type_id = 2')->get('menu')->result();
		$data['blogs']          = $this->model_web->berita_terbaru()->result();
		$data['faqs']           = $this->db->from('faqs')->get()->result();
		$data['about']          = $this->db->get('about')->row();
		$data['analisa'] 		= $this->db->where(['analisa_situasi_id' => $id])->get('analisa_situasi')->row();
		$data['details'] 		= $this->db->where(['analisa_situasi_id' => $id])->get('analisa_situasi_aksi')->result();

		$this->template->build('analisa-situasi-detail', $data);
	}

	public function rencana_kegiatan() {
		$data['sliders']        = $this->db->get('sliders')->result();
		$data['categories']     = $this->db->get('blog_category')->result();
		$data['links']          = $this->db->where('menu_type_id = 3')->get('menu')->result();
		$data['navigation']     = $this->db->where('menu_type_id = 2')->get('menu')->result();
		$data['about']          = $this->db->get('about')->row();
		$data['rencana']        = $this->db->get('rencana_kegiatans')->row();

		$this->template->build('rencana-kegiatan', $data);
	}

	public function data_statistik() {
		$data['sliders']        = $this->db->get('sliders')->result();
		$data['categories']     = $this->db->get('blog_category')->result();
		$data['links']          = $this->db->where('menu_type_id = 3')->get('menu')->result();
		$data['navigation']     = $this->db->where('menu_type_id = 2')->get('menu')->result();
		$data['about']          = $this->db->get('about')->row();

		$this->template->build('data-statistik', $data);
	}

	public function kebijakan() {
		$data['sliders']        = $this->db->get('sliders')->result();
		$data['categories']     = $this->db->get('blog_category')->result();
		$data['links']          = $this->db->where('menu_type_id = 3')->get('menu')->result();
		$data['navigation']     = $this->db->where('menu_type_id = 2')->get('menu')->result();
		$data['about']          = $this->db->get('about')->row();
		$data['policies']       = $this->db->from('policies')->order_by('policies_id', 'desc')->get()->result();

		$this->template->build('kebijakan', $data);
	}

	public function lokus_stunting() {
		$data['sliders']        = $this->db->get('sliders')->result();
		$data['categories']     = $this->db->get('blog_category')->result();
		$data['links']          = $this->db->where('menu_type_id = 3')->get('menu')->result();
		$data['navigation']     = $this->db->where('menu_type_id = 2')->get('menu')->result();
		$data['about']          = $this->db->get('about')->row();
		$data['kecamatans']     = $this->db->get('kecamatans')->result();

		$this->template->build('lokus-stunting', $data);
	}

	public function hasil_lokus_stunting(){
		$kecamatan  = $this->input->get('kecamatan');
		$tahun      = $this->input->get('tahun');

		$data ['results'] = $this->model_web->hasil_lokus_stunting($kecamatan, $tahun);

		$this->template->build('file-lokus-stunting', $data);
	}

	public function aksi_konvergensi(){
		$data = [
			'sliders' 		=> $this->db->get('sliders')->result(),
			'categories' 	=> $this->db->get('blog_category')->result(),
			'links'			=> $this->db->where('menu_type_id = 3')->get('menu')->result(),
			'navigation' 	=> $this->db->where('menu_type_id = 2')->get('menu')->result(),
			'about' 		=> $this->db->get('about')->row()
		];

		$this->template->build('aksi-konvergensi', $data);
	}
}


/* End of file Web.php */
/* Location: ./application/controllers/Web.php */