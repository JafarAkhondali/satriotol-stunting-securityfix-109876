<?php
defined('BASEPATH') OR exit('No direct script access allowed');


/**
*| --------------------------------------------------------------------------
*| Data Anak Controller
*| --------------------------------------------------------------------------
*| Data Anak site
*|
*/
class Data_anak extends Admin {
	public function __construct() {
		parent::__construct();

		$this->load->model('model_data_anak');
		$this->load->model('group/model_group');
		$this->load->model('data_stunting_anak/model_data_stunting_anak');
		$this->load->model('data_intervensi_anak/model_data_intervensi_anak');
		$this->load->model('perkembangan_anak/model_perkembangan_anak');
		$this->lang->load('web_lang', $this->current_lang);
	}

	public function api_auth_data($parameter = null, $token = null) {
		$this->is_allowed('data_anak_list');

		if ($token == null) {
			$token = $this->session->userdata('token');
		}

		$curl_data = curl_init();

		curl_setopt_array($curl_data, [
			CURLOPT_URL 			=> url_api_dkk($parameter),
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

	public function response_data_anak() {
		$this->is_allowed('data_anak_list');

		$data_anak = $this->api_auth_data('stunting');

		$param = $this->input->get('param');
		$nilai = $this->input->get('nilai');

		$this->data['status'] 	= $data_anak['success'];

		if ($data_anak['success'] == true) {
			$data 	= [];
			$no 	= $_POST['start'];

			foreach ($data_anak['data'] as $item) {
				$no++;
				$row 					= [];

				$showRow = true;

				if (!empty($param)) {
					if ($param == 'kecamatan') {
						$showRow = stripos($item['kecamatan_domsili'], $nilai) !== false;
					}else if ($param == 'kelurahan') {
						$showRow = stripos($item['kelurahan_domsili'], $nilai) !== false;
					}else if ($param == 'nokk') {
						$showRow = stripos($item['no_kk'], $nilai) !== false;
					}else if ($param == 'nonik') {
						$showRow = stripos($item['nik_anak'], $nilai) !== false;
					}else if ($param == 'nama_anak') {
						$showRow = stripos($item['nama_anak'], $nilai) !== false;
					}else if ($param == 'nama_ibu') {
						$showRow = stripos($item['nama_ibu'], $nilai) !== false;
					}
				}

				if ($showRow) {
					if ($item['jenis_kelamin'] == 'L') {
						$jenkel = 'Laki-Laki';
					}else if ($item['jenis_kelamin'] == 'P') {
						$jenkel = 'Perempuan';
					}else{
						$jenkel = '-';
					}
	
					$row['no'] 				= $no.'.';
					$row['nama_kecamatan'] 	= $item['kecamatan_ktp'];
					$row['nama_kelurahan'] 	= $item['kelurahan_ktp'];
					$row['no_kk_anak'] 		= $item['no_kk'];
					$row['nik_anak'] 		= $item['nik_anak'];
					$row['nama_anak'] 		= $item['nama_anak'];
					$row['jenkel'] 			= $jenkel;
					$row['tgl_lahir'] 		= systemTanggalIndo($item['tanggal_lahir']);
					$row['umur'] 			= $item['usia'];
					$row['alamat'] 			= $item['alamat_ktp'];
					$row['nama_ibu'] 		= $item['nama_ibu'];
					$row['action'] 			= '<a href="'.site_url('administrator/data_anak/profile_anak?nik=' . $item['nik_anak']).'" class="btn btn-sm btn-default"><i class="fa fa-file-text-o"></i> '.cclang('profile_anak').'</a><br/>
					<a href="'.site_url('administrator/data_stunting_anak/view_stunting?nik=' . $item['nik_anak']).'" class="btn btn-sm btn-danger"><i class="fa fa-file-text-o"></i> '.cclang('stunting_anak').'</a><br/>
					<a href="'.site_url('administrator/perkembangan_anak/view_perkembangan?nik=' . $item['nik_anak']).'" class="btn btn-sm btn-info"><i class="fa fa-file-text-o"></i> '.cclang('perkembangan_anak').' & Pertumbuhan Anak</a><br/>
					<a href="'.site_url('administrator/data_intervensi_anak/view_intervensi?nik=' . $item['nik_anak']).'" class="btn btn-sm btn-primary"><i class="fa fa-file-text-o"></i> '.cclang('intervensi_anak').'</a>';
	
					$data[] = $row;
				}
			}

			$this->data['data'] 	= $data;
		}else{
			$this->data['message'] 	= $data_anak['message'];
		}

		$this->response($this->data);
	}

	/**
	* show all Data Anaks
	*
	* @var $offset String
	*/
	public function index($offset = 0) {
		$this->is_allowed('data_anak_list');

		// $this->data = [
		// 	'data_anak' => $this->api_auth_data('stunting'),
		// ];

		// $this->response($this->data);

		$this->template->title('Data Identitas Anak List');
		$this->render('backend/standart/administrator/data_anak/data_anak_list', $this->data);
	}
	
	/**
	* Add new data_anaks
	*
	*/
	public function add() {
		$this->is_allowed('data_anak_add');

		$this->template->title('Data Identitas Anak New');
		$this->render('backend/standart/administrator/data_anak/data_anak_add', $this->data);
	}

	/**
	* Add New Data Anaks
	*
	* @return JSON
	*/
	public function add_save() {
		if (!$this->is_allowed('data_anak_add', false)) {
			echo json_encode([
				'success' => false,
				'message' => cclang('sorry_you_do_not_have_permission_to_access')
				]);
			exit;
		}

		$this->form_validation->set_rules('anak_puskesmas_id', 'Puskesmas', 'trim|required');
		$this->form_validation->set_rules('anak_kecamatan_id', 'Kecamatan', 'trim|required');
		$this->form_validation->set_rules('anak_kelurahan_id', 'Kelurahan', 'trim|required');
		$this->form_validation->set_rules('anak_no_kk', 'No KK Anak', 'trim|required');
		$this->form_validation->set_rules('anak_nik', 'NIK Anak', 'trim|required');
		$this->form_validation->set_rules('anak_nama', 'Nama Anak', 'trim|required');
		$this->form_validation->set_rules('anak_jenkel', 'Jenis Kelamin', 'trim|required');
		$this->form_validation->set_rules('anak_tanggal_lahir', 'Tanggal Lahir Anak', 'trim|required');
		$this->form_validation->set_rules('anak_alamat', 'Alamat Rumah Anak', 'trim|required');
		$this->form_validation->set_rules('anak_rt', 'RT', 'trim|required');
		$this->form_validation->set_rules('anak_rw', 'RW', 'trim|required');
		$this->form_validation->set_rules('anak_nik_ayah', 'NIK Ayah', 'trim|required');
		$this->form_validation->set_rules('anak_nama_ayah', 'Nama Ayah', 'trim|required');
		$this->form_validation->set_rules('anak_nik_ibu', 'NIK Ibu', 'trim|required');
		$this->form_validation->set_rules('anak_nama_ibu', 'Nama Ibu', 'trim|required');

		if ($this->form_validation->run()) {
			$save_data = [
				'anak_puskesmas_id' 	=> $this->input->post('anak_puskesmas_id'),
				'anak_kecamatan_id' 	=> $this->input->post('anak_kecamatan_id'),
				'anak_kelurahan_id' 	=> $this->input->post('anak_kelurahan_id'),
				'anak_no_kk' 			=> $this->input->post('anak_no_kk'),
				'anak_nik' 				=> $this->input->post('anak_nik'),
				'anak_nama' 			=> $this->input->post('anak_nama'),
				'anak_jenkel' 			=> $this->input->post('anak_jenkel'),
				'anak_tanggal_lahir' 	=> $this->input->post('anak_tanggal_lahir'),
				'anak_alamat' 			=> $this->input->post('anak_alamat'),
				'anak_rt' 				=> $this->input->post('anak_rt'),
				'anak_rw' 				=> $this->input->post('anak_rw'),
				'anak_nik_ayah' 		=> $this->input->post('anak_nik_ayah'),
				'anak_nama_ayah' 		=> $this->input->post('anak_nama_ayah'),
				'anak_nik_ibu' 			=> $this->input->post('anak_nik_ibu'),
				'anak_nama_ibu' 		=> $this->input->post('anak_nama_ibu'),
				'anak_user_created' 	=> get_user_data('id'),
				'anak_created_at' 		=> date('Y-m-d H:i:s'),
			];

			$save_data_anak = $id = $this->model_data_anak->store($save_data);

			if ($save_data_anak) {
				$id = $save_data_anak;
				
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = true;
					$this->data['id'] 	   = $save_data_anak;
					$this->data['message'] = cclang('success_save_data_stay', [
						anchor('administrator/data_anak/edit/' . $save_data_anak, 'Edit Data Anak'),
						anchor('administrator/data_anak', ' Go back to list')
					]);
				} else {
					set_message(
						cclang('success_save_data_redirect', [
						anchor('administrator/data_anak/edit/' . $save_data_anak, 'Edit Data Anak')
					]), 'success');

            		$this->data['success'] = true;
					$this->data['redirect'] = base_url('administrator/data_anak');
				}
			} else {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = false;
					$this->data['message'] = cclang('data_not_change');
				} else {
            		$this->data['success'] = false;
            		$this->data['message'] = cclang('data_not_change');
					$this->data['redirect'] = base_url('administrator/data_anak');
				}
			}

		} else {
			$this->data['success'] = false;
			$this->data['message'] = 'Opss validation failed';
			$this->data['errors'] = $this->form_validation->error_array();
		}

		$this->response($this->data);
	}
	
		/**
	* Update view Data Anaks
	*
	* @var $id String
	*/
	public function edit($id) {
		$this->is_allowed('data_anak_update');

		$this->data['data_anak'] = $this->model_data_anak->find($id);

		$this->template->title('Data Identitas Anak Update');
		$this->render('backend/standart/administrator/data_anak/data_anak_update', $this->data);
	}

	/**
	* Update Data Anaks
	*
	* @var $id String
	*/
	public function edit_save($id) {
		if (!$this->is_allowed('data_anak_update', false)) {
			echo json_encode([
				'success' => false,
				'message' => cclang('sorry_you_do_not_have_permission_to_access')
			]);
			exit;
		}

		$this->form_validation->set_rules('anak_puskesmas_id', 'Puskesmas', 'trim|required');
		$this->form_validation->set_rules('anak_kecamatan_id', 'Kecamatan', 'trim|required');
		$this->form_validation->set_rules('anak_kelurahan_id', 'Kelurahan', 'trim|required');
		$this->form_validation->set_rules('anak_no_kk', 'No KK Anak', 'trim|required');
		$this->form_validation->set_rules('anak_nik', 'NIK Anak', 'trim|required');
		$this->form_validation->set_rules('anak_nama', 'Nama Anak', 'trim|required');
		$this->form_validation->set_rules('anak_jenkel', 'Jenis Kelamin', 'trim|required');
		$this->form_validation->set_rules('anak_tanggal_lahir', 'Tanggal Lahir Anak', 'trim|required');
		$this->form_validation->set_rules('anak_alamat', 'Alamat Rumah Anak', 'trim|required');
		$this->form_validation->set_rules('anak_rt', 'RT', 'trim|required');
		$this->form_validation->set_rules('anak_rw', 'RW', 'trim|required');
		$this->form_validation->set_rules('anak_nik_ayah', 'NIK Ayah', 'trim|required');
		$this->form_validation->set_rules('anak_nama_ayah', 'Nama Ayah', 'trim|required');
		$this->form_validation->set_rules('anak_nik_ibu', 'NIK Ibu', 'trim|required');
		$this->form_validation->set_rules('anak_nama_ibu', 'Nama Ibu', 'trim|required');
		
		if ($this->form_validation->run()) {
			$save_data = [
				'anak_puskesmas_id' 	=> $this->input->post('anak_puskesmas_id'),
				'anak_kecamatan_id' 	=> $this->input->post('anak_kecamatan_id'),
				'anak_kelurahan_id' 	=> $this->input->post('anak_kelurahan_id'),
				'anak_no_kk' 			=> $this->input->post('anak_no_kk'),
				'anak_nik' 				=> $this->input->post('anak_nik'),
				'anak_nama' 			=> $this->input->post('anak_nama'),
				'anak_jenkel' 			=> $this->input->post('anak_jenkel'),
				'anak_tanggal_lahir' 	=> $this->input->post('anak_tanggal_lahir'),
				'anak_alamat' 			=> $this->input->post('anak_alamat'),
				'anak_rt' 				=> $this->input->post('anak_rt'),
				'anak_rw' 				=> $this->input->post('anak_rw'),
				'anak_nik_ayah' 		=> $this->input->post('anak_nik_ayah'),
				'anak_nama_ayah' 		=> $this->input->post('anak_nama_ayah'),
				'anak_nik_ibu' 			=> $this->input->post('anak_nik_ibu'),
				'anak_nama_ibu' 		=> $this->input->post('anak_nama_ibu'),
				'anak_user_updated' 	=> get_user_data('id'),
				'anak_updated_at' 		=> date('Y-m-d H:i:s'),
			];

			$save_data_anak = $this->model_data_anak->change($id, $save_data);

			if ($save_data_anak) {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = true;
					$this->data['id'] 	   = $id;
					$this->data['message'] = cclang('success_update_data_stay', [
						anchor('administrator/data_anak', ' Go back to list')
					]);
				} else {
					set_message(
						cclang('success_update_data_redirect', [
					]), 'success');

            		$this->data['success'] = true;
					$this->data['redirect'] = base_url('administrator/data_anak');
				}
			} else {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = false;
					$this->data['message'] = cclang('data_not_change');
				} else {
            		$this->data['success'] = false;
            		$this->data['message'] = cclang('data_not_change');
					$this->data['redirect'] = base_url('administrator/data_anak');
				}
			}
		} else {
			$this->data['success'] = false;
			$this->data['message'] = 'Opss validation failed';
			$this->data['errors'] = $this->form_validation->error_array();
		}

		$this->response($this->data);
	}
	
	/**
	* delete Data Anaks
	*
	* @var $id String
	*/
	public function delete($id = null) {
		$this->is_allowed('data_anak_delete');

		$this->load->helper('file');

		$arr_id = $this->input->get('id');
		$remove = false;

		if (!empty($id)) {
			$remove = $this->_remove($id);
		} elseif (count($arr_id) >0) {
			foreach ($arr_id as $id) {
				$remove = $this->_remove($id);
			}
		}

		if ($remove) {
            set_message(cclang('has_been_deleted', 'data_anak'), 'success');
        } else {
            set_message(cclang('error_delete', 'data_anak'), 'error');
        }

		redirect_back();
	}

		/**
	* View view Data Anaks
	*
	* @var $id String
	*/
	public function view($id) {
		$this->is_allowed('data_anak_view');

		$this->data['data_anak'] = $this->model_data_anak->join_avaiable()->filter_avaiable()->find($id);

		$this->template->title('Data Identitas Anak Detail');
		$this->render('backend/standart/administrator/data_anak/data_anak_view', $this->data);
	}

		/**
	* View view Data Anaks
	*
	* @var $id String
	*/
	public function profile_anak() {
		$this->is_allowed('data_anak_profile');

		$nik = $this->input->get('nik');

		$data_anak 			= $this->api_auth_data('stunting/anak?nik='.$nik);
		$data_perkembangan 	= $this->api_auth_data('stunting/perkembangan?nik='.$nik);

		$this->data['data_anak'] 			= $data_anak['data'];
		$this->data['data_stunting'] 		= $this->db->where(['stunting_anak_nik' => $nik])->get('data_stunting_anak')->result();
		$this->data['data_perkembangan'] 	= $data_perkembangan;
		$this->data['data_intervensi'] 		= $this->db->where(['intervensi_anak_nik' => $nik])->get('data_intervensi_anak')->result();

		if ($data_anak['success'] == true) {
			$this->template->title('Data Profile Anak');
			$this->render('backend/standart/administrator/data_anak/data_anak_profile', $this->data);
		}else{
			set_message($data_anak['message'], 'error');

			redirect_back(base_url('administrator/data_anak'));
		}
	}

	public function export_profile() {
		$this->is_allowed('data_anak_profile_export');

		$nik = $this->input->get('nik');

		$data_anak 			= $this->api_auth_data('stunting/anak?nik='.$nik);
		$data_perkembangan 	= $this->api_auth_data('stunting/perkembangan?nik='.$nik);

		$this->data['data_anak'] 			= $data_anak['data'];
		$this->data['data_stunting'] 		= $this->db->where(['stunting_anak_nik' => $nik])->get('data_stunting_anak')->result();
		$this->data['data_perkembangan'] 	= $data_perkembangan;
		$this->data['data_intervensi'] 		= $this->db->where(['intervensi_anak_nik' => $nik])->get('data_intervensi_anak')->result();

		// $this->response($this->data);
		// exit;

		if ($data_anak['success'] == true) {
			$this->template->title('Export Profile Anak');

			$this->load->view('backend/standart/administrator/data_anak/data_anak_pdf', $this->data);
		}else{
			set_message($data_anak['message'], 'error');

			redirect_back(base_url('administrator/data_anak/profile_anak?nik='.$nik));
		}

		// $this->data = [
		// 	'data_anak' 			=> $query_data_anak,
		// 	'stunting_anak' 		=> $query_stunting,
		// 	'intervensi_anak' 		=> $query_intervensi,
		// 	'perkembangan_anak' 	=> $query_perkembangan,
		// ];

		
		// $this->load->library('HtmlPdf');
      
        // $config = array(
        //     'orientation' 	=> 'L',
        //     'format' 		=> 'a5',
        //     'marges' 		=> array(5, 5, 5, 5)
        // );

        // $this->pdf = new HtmlPdf($config);

		// $this->pdf->pdf->SetCreator('Adobe Acrobat PDF Creator from Garasi');
		// $this->pdf->pdf->SetAuthor('Akang Adnan');
		// $this->pdf->pdf->SetSubject('Profile Anak Stunting');
		// $this->pdf->pdf->SetKeywords('Laporan, Profile, PDF, Profile Anak, Data Stunting, Anak Stunting');
		
		// $content = $this->pdf->loadHtmlPdf('backend/standart/administrator/data_anak/data_anak_pdf', $this->data, TRUE);
		// $this->pdf->writeHTML($content);

		// $this->pdf->pdf->lastPage();
		// $this->pdf->pdf->SetTitle('Profile Anak');
		// $this->pdf->pdf->SetDisplayMode('fullpage');
		// $this->pdf->Output('Profile Anak.pdf', 'D');

		// $this->load->view('backend/standart/administrator/data_anak/data_anak_pdf', $this->data);
	}
	
	/**
	* delete Data Anaks
	*
	* @var $id String
	*/
	private function _remove($id) {
		$data_anak = $this->model_data_anak->find($id);

		return $this->model_data_anak->remove($id);
	}
	
	
	/**
	* Export to excel
	*
	* @return Files Excel .xls
	*/
	public function export() {
		$this->is_allowed('data_anak_export');

		$this->model_data_anak->export(
			'data_anak', 
			'data_anak',
			$this->model_data_anak->field_search
		);
	}

	/**
	* Export to PDF
	*
	* @return Files PDF .pdf
	*/
	public function export_pdf() {
		$this->is_allowed('data_anak_export');

		$this->model_data_anak->pdf('data_anak', 'data_anak');
	}


	public function single_pdf($id = null) {
		$this->is_allowed('data_anak_export');

		$table = $title = 'data_anak';
		$this->load->library('HtmlPdf');
      
        $config = array(
            'orientation' 	=> 'L',
            'format' 		=> 'A4',
            'marges' 		=> array(5, 5, 5, 5)
        );

        $this->pdf = new HtmlPdf($config);
        $this->pdf->setDefaultFont('stsongstdlight'); 

        $result = $this->db->get($table);
       
        $data = $this->model_data_anak->find($id);
        $fields = $result->list_fields();

        $content = $this->pdf->loadHtmlPdf('core_template/pdf/pdf_single', [
            'data' => $data,
            'fields' => $fields,
            'title' => $title
        ], TRUE);

        $this->pdf->initialize($config);
        $this->pdf->pdf->SetDisplayMode('fullpage');
        $this->pdf->writeHTML($content);
        $this->pdf->Output($table.'.pdf', 'H');
	}

	public function ajax_anak_kelurahan_id($id = null) {
		if (!$this->is_allowed('data_anak_list', false)) {
			echo json_encode([
				'success' => false,
				'message' => cclang('sorry_you_do_not_have_permission_to_access')
				]);
			exit;
		}
		$results = db_get_all_data('kelurahans', ['kecamatan_id' => $id]);
		$this->response($results);	
	}
	
}


/* End of file data_anak.php */
/* Location: ./application/controllers/administrator/Data Anak.php */