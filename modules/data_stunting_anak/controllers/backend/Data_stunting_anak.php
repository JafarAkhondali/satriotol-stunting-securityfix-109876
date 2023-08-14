<?php
defined('BASEPATH') OR exit('No direct script access allowed');


/**
*| --------------------------------------------------------------------------
*| Data Stunting Anak Controller
*| --------------------------------------------------------------------------
*| Data Stunting Anak site
*|
*/
class Data_stunting_anak extends Admin {
	public function __construct() {
		parent::__construct();

		$this->load->model('model_data_stunting_anak');
		$this->load->model('group/model_group');
		$this->lang->load('web_lang', $this->current_lang);
	}

	/**
	* show all Data Stunting Anaks
	*
	* @var $offset String
	*/
	public function index($offset = 0) {
		$this->is_allowed('data_stunting_anak_list');

		$filter = $this->input->get('q');
		$field 	= $this->input->get('f');

		$this->data['data_stunting_anaks'] = $this->model_data_stunting_anak->get($filter, $field, $this->limit_page, $offset);
		$this->data['data_stunting_anak_counts'] = $this->model_data_stunting_anak->count_all($filter, $field);

		$config = [
			'base_url'     => 'administrator/data_stunting_anak/index/',
			'total_rows'   => $this->data['data_stunting_anak_counts'],
			'per_page'     => $this->limit_page,
			'uri_segment'  => 4,
		];

		$this->data['pagination'] = $this->pagination($config);

		$this->template->title('Data Stunting Anak List');
		$this->render('backend/standart/administrator/data_stunting_anak/data_stunting_anak_list', $this->data);
	}
	
	/**
	* Add new data_stunting_anaks
	*
	*/
	public function add() {
		$this->is_allowed('data_stunting_anak_add');

		$this->template->title('Data Stunting Anak New');
		$this->render('backend/standart/administrator/data_stunting_anak/data_stunting_anak_add', $this->data);
	}

	/**
	* Add New Data Stunting Anaks
	*
	* @return JSON
	*/
	public function add_save() {
		if (!$this->is_allowed('data_stunting_anak_add', false)) {
			echo json_encode([
				'success' => false,
				'message' => cclang('sorry_you_do_not_have_permission_to_access')
				]);
			exit;
		}

		$this->form_validation->set_rules('stunting_anak_anak_id', 'Nama Anak', 'trim|required');
		$this->form_validation->set_rules('stunting_anak_dtks', 'DTKS', 'trim|required');
		$this->form_validation->set_rules('stunting_anak_tgl_ukur', 'Tanggal Pengukuran', 'trim|required');
		$this->form_validation->set_rules('stunting_anak_berat_badan', 'Berat Badan Anak', 'trim|required');
		$this->form_validation->set_rules('stunting_anak_tinggi_badan', 'Tinggi Badan Anak', 'trim|required');
		$this->form_validation->set_rules('stunting_anak_anak_angkat', 'Anak Angkat', 'trim|required');
		$this->form_validation->set_rules('stunting_anak_anak_angkat_anggaran', 'Anggaran Anak Angkat', 'trim|required');
		$this->form_validation->set_rules('stunting_anak_pengasuh_balita', 'Pengasuh Balita', 'trim|required');
		$this->form_validation->set_rules('stunting_anak_pengasuh_balita_anggaran', 'Anggaran Pengasuh Balita', 'trim|required');
		$this->form_validation->set_rules('stunting_anak_day_care', 'Day Care Stunting', 'trim|required');
		$this->form_validation->set_rules('stunting_anak_day_care_anggaran', 'Anggaran Day Care Stunting', 'trim|required');
		$this->form_validation->set_rules('stunting_anak_asupan_gizi_pmt', 'Asupan Gizi (PMT)', 'trim|required');
		$this->form_validation->set_rules('stunting_anak_imunisasi', 'Imunisasi Anak', 'trim|required');
		$this->form_validation->set_rules('stunting_anak_imunisasi_anggaran', 'Anggaran Imunisasi Anak', 'trim|required');
		$this->form_validation->set_rules('stunting_anak_terapi_gizi', 'Terapi Gizi', 'trim|required');
		$this->form_validation->set_rules('stunting_anak_terapi_gizi_anggaran', 'Anggaran Terapi Gizi', 'trim|required');
		$this->form_validation->set_rules('stunting_anak_bpjs_stunting', 'BPJS Stunting', 'trim|required');
		$this->form_validation->set_rules('stunting_anak_bpjs_stunting_anggaran', 'Anggaran BPJS Stunting', 'trim|required');
		$this->form_validation->set_rules('stunting_anak_bantuan_sembako', 'Bantuan Sembako', 'trim|required');
		$this->form_validation->set_rules('stunting_anak_bantuan_sembako_anggaran', 'Anggaran Bantuan Sembako', 'trim|required');
		$this->form_validation->set_rules('stunting_anak_dahsyat', 'Dahsyat', 'trim|required');
		$this->form_validation->set_rules('stunting_anak_dahsyat_anggaran', 'Anggaran Dahsyat', 'trim|required');
		$this->form_validation->set_rules('stunting_anak_rtlh', 'RTLH', 'trim|required');
		$this->form_validation->set_rules('stunting_anak_rtlh_anggaran', 'Anggaran RTLH', 'trim|required');
		$this->form_validation->set_rules('stunting_anak_dlh', 'DLH', 'trim|required');
		$this->form_validation->set_rules('stunting_anak_dlh_anggaran', 'Anggaran DLH', 'trim|required');
		$this->form_validation->set_rules('stunting_anak_akses_pangan', 'Akses Pangan / UMKM Lokal', 'trim|required');
		$this->form_validation->set_rules('stunting_anak_akses_pangan_anggaran', 'Anggaran Akses Pangan / UMKM Lokal', 'trim|required');

		if ($this->form_validation->run()) {
			$save_data = [
				'stunting_anak_anak_id' 					=> $this->input->post('stunting_anak_anak_id'),
				'stunting_anak_dtks' 						=> $this->input->post('stunting_anak_dtks'),
				'stunting_anak_tgl_ukur' 					=> $this->input->post('stunting_anak_tgl_ukur'),
				'stunting_anak_berat_badan' 				=> $this->input->post('stunting_anak_berat_badan'),
				'stunting_anak_tinggi_badan' 				=> $this->input->post('stunting_anak_tinggi_badan'),
				'stunting_anak_anak_angkat' 				=> $this->input->post('stunting_anak_anak_angkat'),
				'stunting_anak_anak_angkat_anggaran' 		=> $this->input->post('stunting_anak_anak_angkat_anggaran'),
				'stunting_anak_pengasuh_balita' 			=> $this->input->post('stunting_anak_pengasuh_balita'),
				'stunting_anak_pengasuh_balita_anggaran' 	=> $this->input->post('stunting_anak_pengasuh_balita_anggaran'),
				'stunting_anak_day_care' 					=> $this->input->post('stunting_anak_day_care'),
				'stunting_anak_day_care_anggaran' 			=> $this->input->post('stunting_anak_day_care_anggaran'),
				'stunting_anak_asupan_gizi_pmt' 			=> $this->input->post('stunting_anak_asupan_gizi_pmt'),
				'stunting_anak_imunisasi' 					=> $this->input->post('stunting_anak_imunisasi'),
				'stunting_anak_imunisasi_anggaran' 			=> $this->input->post('stunting_anak_imunisasi_anggaran'),
				'stunting_anak_terapi_gizi' 				=> $this->input->post('stunting_anak_terapi_gizi'),
				'stunting_anak_terapi_gizi_anggaran' 		=> $this->input->post('stunting_anak_terapi_gizi_anggaran'),
				'stunting_anak_bpjs_stunting' 				=> $this->input->post('stunting_anak_bpjs_stunting'),
				'stunting_anak_bpjs_stunting_anggaran' 		=> $this->input->post('stunting_anak_bpjs_stunting_anggaran'),
				'stunting_anak_bantuan_sembako' 			=> $this->input->post('stunting_anak_bantuan_sembako'),
				'stunting_anak_bantuan_sembako_anggaran' 	=> $this->input->post('stunting_anak_bantuan_sembako_anggaran'),
				'stunting_anak_dahsyat' 					=> $this->input->post('stunting_anak_dahsyat'),
				'stunting_anak_dahsyat_anggaran' 			=> $this->input->post('stunting_anak_dahsyat_anggaran'),
				'stunting_anak_rtlh' 						=> $this->input->post('stunting_anak_rtlh'),
				'stunting_anak_rtlh_anggaran' 				=> $this->input->post('stunting_anak_rtlh_anggaran'),
				'stunting_anak_dlh' 						=> $this->input->post('stunting_anak_dlh'),
				'stunting_anak_dlh_anggaran' 				=> $this->input->post('stunting_anak_dlh_anggaran'),
				'stunting_anak_akses_pangan' 				=> $this->input->post('stunting_anak_akses_pangan'),
				'stunting_anak_akses_pangan_anggaran' 		=> $this->input->post('stunting_anak_akses_pangan_anggaran'),
				'stunting_anak_mitra_lain' 					=> $this->input->post('stunting_anak_mitra_lain'),
				'stunting_anak_user_created' 				=> get_user_data('id'),
				'stunting_anak_created_at' 					=> date('Y-m-d H:i:s'),
			];

			$save_data_stunting_anak = $id = $this->model_data_stunting_anak->store($save_data);

			if ($save_data_stunting_anak) {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = true;
					$this->data['id'] 	   = $save_data_stunting_anak;
					$this->data['message'] = cclang('success_save_data_stay', [
						anchor('administrator/data_stunting_anak/edit/' . $save_data_stunting_anak, 'Edit Data Stunting Anak'),
						anchor('administrator/data_stunting_anak', ' Go back to list')
					]);
				} else {
					set_message(
						cclang('success_save_data_redirect', [
						anchor('administrator/data_stunting_anak/edit/' . $save_data_stunting_anak, 'Edit Data Stunting Anak')
					]), 'success');

					$this->data['success'] = true;
					$this->data['redirect'] = base_url('administrator/data_stunting_anak');
				}
			} else {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = false;
					$this->data['message'] = cclang('data_not_change');
				} else {
					$this->data['success'] = false;
					$this->data['message'] = cclang('data_not_change');
					$this->data['redirect'] = base_url('administrator/data_stunting_anak');
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
	* Update view Data Stunting Anaks
	*
	* @var $id String
	*/
	public function edit($id)
	{
		$this->is_allowed('data_stunting_anak_update');

		$this->data['data_stunting_anak'] = $this->model_data_stunting_anak->find($id);

		$this->template->title('Data Stunting Anak Update');
		$this->render('backend/standart/administrator/data_stunting_anak/data_stunting_anak_update', $this->data);
	}

	/**
	* Update Data Stunting Anaks
	*
	* @var $id String
	*/
	public function edit_save($id) {
		if (!$this->is_allowed('data_stunting_anak_update', false)) {
			echo json_encode([
				'success' => false,
				'message' => cclang('sorry_you_do_not_have_permission_to_access')
			]);
			exit;
		}

		$this->form_validation->set_rules('stunting_anak_anak_id', 'Nama Anak', 'trim|required');
		$this->form_validation->set_rules('stunting_anak_dtks', 'DTKS', 'trim|required');
		$this->form_validation->set_rules('stunting_anak_tgl_ukur', 'Tanggal Pengukuran', 'trim|required');
		$this->form_validation->set_rules('stunting_anak_berat_badan', 'Berat Badan Anak', 'trim|required');
		$this->form_validation->set_rules('stunting_anak_tinggi_badan', 'Tinggi Badan Anak', 'trim|required');
		$this->form_validation->set_rules('stunting_anak_anak_angkat', 'Anak Angkat', 'trim|required');
		$this->form_validation->set_rules('stunting_anak_anak_angkat_anggaran', 'Anggaran Anak Angkat', 'trim|required');
		$this->form_validation->set_rules('stunting_anak_pengasuh_balita', 'Pengasuh Balita', 'trim|required');
		$this->form_validation->set_rules('stunting_anak_pengasuh_balita_anggaran', 'Anggaran Pengasuh Balita', 'trim|required');
		$this->form_validation->set_rules('stunting_anak_day_care', 'Day Care Stunting', 'trim|required');
		$this->form_validation->set_rules('stunting_anak_day_care_anggaran', 'Anggaran Day Care Stunting', 'trim|required');
		$this->form_validation->set_rules('stunting_anak_asupan_gizi_pmt', 'Asupan Gizi (PMT)', 'trim|required');
		$this->form_validation->set_rules('stunting_anak_imunisasi', 'Imunisasi Anak', 'trim|required');
		$this->form_validation->set_rules('stunting_anak_imunisasi_anggaran', 'Anggaran Imunisasi Anak', 'trim|required');
		$this->form_validation->set_rules('stunting_anak_terapi_gizi', 'Terapi Gizi', 'trim|required');
		$this->form_validation->set_rules('stunting_anak_terapi_gizi_anggaran', 'Anggaran Terapi Gizi', 'trim|required');
		$this->form_validation->set_rules('stunting_anak_bpjs_stunting', 'BPJS Stunting', 'trim|required');
		$this->form_validation->set_rules('stunting_anak_bpjs_stunting_anggaran', 'Anggaran BPJS Stunting', 'trim|required');
		$this->form_validation->set_rules('stunting_anak_bantuan_sembako', 'Bantuan Sembako', 'trim|required');
		$this->form_validation->set_rules('stunting_anak_bantuan_sembako_anggaran', 'Anggaran Bantuan Sembako', 'trim|required');
		$this->form_validation->set_rules('stunting_anak_dahsyat', 'Dahsyat', 'trim|required');
		$this->form_validation->set_rules('stunting_anak_dahsyat_anggaran', 'Anggaran Dahsyat', 'trim|required');
		$this->form_validation->set_rules('stunting_anak_rtlh', 'RTLH', 'trim|required');
		$this->form_validation->set_rules('stunting_anak_rtlh_anggaran', 'Anggaran RTLH', 'trim|required');
		$this->form_validation->set_rules('stunting_anak_dlh', 'DLH', 'trim|required');
		$this->form_validation->set_rules('stunting_anak_dlh_anggaran', 'Anggaran DLH', 'trim|required');
		$this->form_validation->set_rules('stunting_anak_akses_pangan', 'Akses Pangan / UMKM Lokal', 'trim|required');
		$this->form_validation->set_rules('stunting_anak_akses_pangan_anggaran', 'Anggaran Akses Pangan / UMKM Lokal', 'trim|required');
		
		if ($this->form_validation->run()) {
			$save_data = [
				'stunting_anak_anak_id' 					=> $this->input->post('stunting_anak_anak_id'),
				'stunting_anak_dtks' 						=> $this->input->post('stunting_anak_dtks'),
				'stunting_anak_tgl_ukur' 					=> $this->input->post('stunting_anak_tgl_ukur'),
				'stunting_anak_berat_badan' 				=> $this->input->post('stunting_anak_berat_badan'),
				'stunting_anak_tinggi_badan' 				=> $this->input->post('stunting_anak_tinggi_badan'),
				'stunting_anak_anak_angkat' 				=> $this->input->post('stunting_anak_anak_angkat'),
				'stunting_anak_anak_angkat_anggaran' 		=> $this->input->post('stunting_anak_anak_angkat_anggaran'),
				'stunting_anak_pengasuh_balita' 			=> $this->input->post('stunting_anak_pengasuh_balita'),
				'stunting_anak_pengasuh_balita_anggaran' 	=> $this->input->post('stunting_anak_pengasuh_balita_anggaran'),
				'stunting_anak_day_care' 					=> $this->input->post('stunting_anak_day_care'),
				'stunting_anak_day_care_anggaran' 			=> $this->input->post('stunting_anak_day_care_anggaran'),
				'stunting_anak_asupan_gizi_pmt' 			=> $this->input->post('stunting_anak_asupan_gizi_pmt'),
				'stunting_anak_imunisasi' 					=> $this->input->post('stunting_anak_imunisasi'),
				'stunting_anak_imunisasi_anggaran' 			=> $this->input->post('stunting_anak_imunisasi_anggaran'),
				'stunting_anak_terapi_gizi' 				=> $this->input->post('stunting_anak_terapi_gizi'),
				'stunting_anak_terapi_gizi_anggaran' 		=> $this->input->post('stunting_anak_terapi_gizi_anggaran'),
				'stunting_anak_bpjs_stunting' 				=> $this->input->post('stunting_anak_bpjs_stunting'),
				'stunting_anak_bpjs_stunting_anggaran' 		=> $this->input->post('stunting_anak_bpjs_stunting_anggaran'),
				'stunting_anak_bantuan_sembako' 			=> $this->input->post('stunting_anak_bantuan_sembako'),
				'stunting_anak_bantuan_sembako_anggaran' 	=> $this->input->post('stunting_anak_bantuan_sembako_anggaran'),
				'stunting_anak_dahsyat' 					=> $this->input->post('stunting_anak_dahsyat'),
				'stunting_anak_dahsyat_anggaran' 			=> $this->input->post('stunting_anak_dahsyat_anggaran'),
				'stunting_anak_rtlh' 						=> $this->input->post('stunting_anak_rtlh'),
				'stunting_anak_rtlh_anggaran' 				=> $this->input->post('stunting_anak_rtlh_anggaran'),
				'stunting_anak_dlh' 						=> $this->input->post('stunting_anak_dlh'),
				'stunting_anak_dlh_anggaran' 				=> $this->input->post('stunting_anak_dlh_anggaran'),
				'stunting_anak_akses_pangan' 				=> $this->input->post('stunting_anak_akses_pangan'),
				'stunting_anak_akses_pangan_anggaran' 		=> $this->input->post('stunting_anak_akses_pangan_anggaran'),
				'stunting_anak_mitra_lain' 					=> $this->input->post('stunting_anak_mitra_lain'),
				'stunting_anak_user_updated' 				=> get_user_data('id'),				'stunting_anak_update_at' => date('Y-m-d H:i:s'),
			];
			
			$save_data_stunting_anak = $this->model_data_stunting_anak->change($id, $save_data);

			if ($save_data_stunting_anak) {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = true;
					$this->data['id'] 	   = $id;
					$this->data['message'] = cclang('success_update_data_stay', [
						anchor('administrator/data_stunting_anak', ' Go back to list')
					]);
				} else {
					set_message(
						cclang('success_update_data_redirect', [
					]), 'success');

					$this->data['success'] = true;
					$this->data['redirect'] = base_url('administrator/data_stunting_anak');
				}
			} else {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = false;
					$this->data['message'] = cclang('data_not_change');
				} else {
					$this->data['success'] = false;
					$this->data['message'] = cclang('data_not_change');
					$this->data['redirect'] = base_url('administrator/data_stunting_anak');
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
	* delete Data Stunting Anaks
	*
	* @var $id String
	*/
	public function delete($id = null)
	{
		$this->is_allowed('data_stunting_anak_delete');

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
			set_message(cclang('has_been_deleted', 'data_stunting_anak'), 'success');
		} else {
			set_message(cclang('error_delete', 'data_stunting_anak'), 'error');
		}

		redirect_back();
	}

		/**
	* View view Data Stunting Anaks
	*
	* @var $id String
	*/
	public function view($id) {
		$this->is_allowed('data_stunting_anak_view');

		$this->data['data_stunting_anak'] = $this->model_data_stunting_anak->join_avaiable()->filter_avaiable()->find($id);

		$this->template->title('Data Stunting Anak Detail');
		$this->render('backend/standart/administrator/data_stunting_anak/data_stunting_anak_view', $this->data);
	}
	
	/**
	* delete Data Stunting Anaks
	*
	* @var $id String
	*/
	private function _remove($id)
	{
		$data_stunting_anak = $this->model_data_stunting_anak->find($id);

		
		
		return $this->model_data_stunting_anak->remove($id);
	}
	
	
	/**
	* Export to excel
	*
	* @return Files Excel .xls
	*/
	public function export()
	{
		$this->is_allowed('data_stunting_anak_export');

		$this->model_data_stunting_anak->export(
			'data_stunting_anak', 
			'data_stunting_anak',
			$this->model_data_stunting_anak->field_search
		);
	}

	/**
	* Export to PDF
	*
	* @return Files PDF .pdf
	*/
	public function export_pdf() {
		$this->is_allowed('data_stunting_anak_export');

		$this->model_data_stunting_anak->pdf('data_stunting_anak', 'data_stunting_anak');
	}


	public function single_pdf($id = null) {
		$this->is_allowed('data_stunting_anak_export');

		$table = $title = 'data_stunting_anak';
		$this->load->library('HtmlPdf');
	  
		$config = array(
			'orientation' => 'p',
			'format' => 'a4',
			'marges' => array(5, 5, 5, 5)
		);

		$this->pdf = new HtmlPdf($config);
		$this->pdf->setDefaultFont('stsongstdlight'); 

		$result = $this->db->get($table);
	   
		$data = $this->model_data_stunting_anak->find($id);
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
	
	public function view_stunting() {
		$this->is_allowed('detail_stunting_anak');

		$id_anak = $this->input->get('anak');

		$this->model_data_stunting_anak->filter_avaiable()->join_stunting_anak();
		$this->data['data_stunting_anak'] = $this->db->where('anak_id', $id_anak)->get('data_anak')->row();

		$nik_anak = '';
		if ($this->data['data_stunting_anak']->anak_nik != null) {
			$nik_anak = ' ('.$this->data['data_stunting_anak']->anak_nik.')';
		}

		$this->template->title('Detail Stunting Anak '.$this->data['data_stunting_anak']->anak_nama.$nik_anak);
		$this->render('backend/standart/administrator/data_stunting_anak/stunting_anak_detail', $this->data);
	}

	public function add_stunting() {
		$this->is_allowed('data_stunting_anak_add');

		$this->data['id_anak'] = $this->input->get('anak');

		$this->template->title('Data Stunting Anak New');
		$this->render('backend/standart/administrator/data_stunting_anak/stunting_anak_add', $this->data);
	}
	public function add_save_stunting() {
		if (!$this->is_allowed('data_stunting_anak_add', false)) {
			echo json_encode([
				'success' => false,
				'message' => cclang('sorry_you_do_not_have_permission_to_access')
				]);
			exit;
		}

		$asupan_opd_id 			= $this->input->post('asupan_gizi_opd_id');
		$asupan_opd_status 		= $this->input->post('asupan_gizi_opd');
		$asupan_opd_anggaran 	= $this->input->post('asupan_gizi_opd_anggaran');

		$id_anak = $this->input->get('anak');

		/* $this->form_validation->set_rules('stunting_anak_dtks', 'DTKS', 'trim|required');
		$this->form_validation->set_rules('stunting_anak_tgl_ukur', 'Tanggal Pengukuran', 'trim|required');
		$this->form_validation->set_rules('stunting_anak_berat_badan', 'Berat Badan Anak', 'trim|required');
		$this->form_validation->set_rules('stunting_anak_tinggi_badan', 'Tinggi Badan Anak', 'trim|required');
		$this->form_validation->set_rules('stunting_anak_anak_angkat', 'Anak Angkat', 'trim|required');
		$this->form_validation->set_rules('stunting_anak_anak_angkat_anggaran', 'Anggaran Anak Angkat', 'trim|required');
		$this->form_validation->set_rules('stunting_anak_pengasuh_balita', 'Pengasuh Balita', 'trim|required');
		$this->form_validation->set_rules('stunting_anak_pengasuh_balita_anggaran', 'Anggaran Pengasuh Balita', 'trim|required');
		$this->form_validation->set_rules('stunting_anak_day_care', 'Day Care Stunting', 'trim|required');
		$this->form_validation->set_rules('stunting_anak_day_care_anggaran', 'Anggaran Day Care Stunting', 'trim|required');
		$this->form_validation->set_rules('stunting_anak_asupan_gizi_pmt', 'Asupan Gizi (PMT)', 'trim|required');

		$this->form_validation->set_rules('asupan_gizi_opd_id[0]', 'Asupan Gizi Instansi DKK', 'trim|required');
		$this->form_validation->set_rules('asupan_gizi_opd_anggaran[0]', 'Anggaran Asupan Gizi Instansi DKK', 'trim|required');
		$this->form_validation->set_rules('asupan_gizi_opd_id[1]', 'Asupan Gizi Instansi DISTAPANG', 'trim|required');
		$this->form_validation->set_rules('asupan_gizi_opd_anggaran[1]', 'Anggaran Asupan Gizi Instansi DISTAPANG', 'trim|required');
		$this->form_validation->set_rules('asupan_gizi_opd_id[2]', 'Asupan Gizi Instansi DISPERIKANAN', 'trim|required');
		$this->form_validation->set_rules('asupan_gizi_opd_anggaran[2]', 'Anggaran Asupan Gizi Instansi DISPERIKANAN', 'trim|required');

		$this->form_validation->set_rules('stunting_anak_asupan_gizi_csr', 'Asupan Gizi CSR', 'trim|required');
		$this->form_validation->set_rules('stunting_anak_asupan_gizi_csr_anggaran', 'Anggaran Asupan Gizi CSR', 'trim|required');
		$this->form_validation->set_rules('stunting_anak_imunisasi', 'Imunisasi Anak', 'trim|required');
		$this->form_validation->set_rules('stunting_anak_imunisasi_anggaran', 'Anggaran Imunisasi Anak', 'trim|required');
		$this->form_validation->set_rules('stunting_anak_terapi_gizi', 'Terapi Gizi', 'trim|required');
		$this->form_validation->set_rules('stunting_anak_terapi_gizi_anggaran', 'Anggaran Terapi Gizi', 'trim|required');
		$this->form_validation->set_rules('stunting_anak_bpjs_stunting', 'BPJS Stunting', 'trim|required');
		$this->form_validation->set_rules('stunting_anak_bpjs_stunting_anggaran', 'Anggaran BPJS Stunting', 'trim|required');
		$this->form_validation->set_rules('stunting_anak_bantuan_sembako', 'Bantuan Sembako', 'trim|required');
		$this->form_validation->set_rules('stunting_anak_bantuan_sembako_anggaran', 'Anggaran Bantuan Sembako', 'trim|required');
		$this->form_validation->set_rules('stunting_anak_dahsyat', 'Dahsyat', 'trim|required');
		$this->form_validation->set_rules('stunting_anak_dahsyat_anggaran', 'Anggaran Dahsyat', 'trim|required');
		$this->form_validation->set_rules('stunting_anak_rtlh', 'RTLH', 'trim|required');
		$this->form_validation->set_rules('stunting_anak_rtlh_anggaran', 'Anggaran RTLH', 'trim|required');
		$this->form_validation->set_rules('stunting_anak_dlh', 'DLH', 'trim|required');
		$this->form_validation->set_rules('stunting_anak_dlh_anggaran', 'Anggaran DLH', 'trim|required');
		$this->form_validation->set_rules('stunting_anak_akses_pangan', 'Akses Pangan / UMKM Lokal', 'trim|required');
		$this->form_validation->set_rules('stunting_anak_akses_pangan_anggaran', 'Anggaran Akses Pangan / UMKM Lokal', 'trim|required'); */

		if ($this->form_validation->run()) {
			$save_data = [
				'stunting_anak_anak_id' 					=> $id_anak,
				'stunting_anak_dtks' 						=> $this->input->post('stunting_anak_dtks'),
				'stunting_anak_tgl_ukur' 					=> $this->input->post('stunting_anak_tgl_ukur'),
				'stunting_anak_berat_badan' 				=> $this->input->post('stunting_anak_berat_badan'),
				'stunting_anak_tinggi_badan' 				=> $this->input->post('stunting_anak_tinggi_badan'),
				'stunting_anak_anak_angkat' 				=> $this->input->post('stunting_anak_anak_angkat'),
				'stunting_anak_anak_angkat_anggaran' 		=> str_replace('.', '', $this->input->post('stunting_anak_anak_angkat_anggaran')),
				'stunting_anak_pengasuh_balita' 			=> $this->input->post('stunting_anak_pengasuh_balita'),
				'stunting_anak_pengasuh_balita_anggaran' 	=> str_replace('.', '', $this->input->post('stunting_anak_pengasuh_balita_anggaran')),
				'stunting_anak_day_care' 					=> $this->input->post('stunting_anak_day_care'),
				'stunting_anak_day_care_anggaran' 			=> str_replace('.', '', $this->input->post('stunting_anak_day_care_anggaran')),
				'stunting_anak_asupan_gizi_pmt' 			=> $this->input->post('stunting_anak_asupan_gizi_pmt'),
				'stunting_anak_asupan_gizi_csr' 			=> $this->input->post('stunting_anak_asupan_gizi_csr'),
				'stunting_anak_asupan_gizi_csr_anggaran' 	=> str_replace('.', '', $this->input->post('stunting_anak_asupan_gizi_csr_anggaran')),
				'stunting_anak_imunisasi' 					=> $this->input->post('stunting_anak_imunisasi'),
				'stunting_anak_imunisasi_anggaran' 			=> str_replace('.', '', $this->input->post('stunting_anak_imunisasi_anggaran')),
				'stunting_anak_terapi_gizi' 				=> $this->input->post('stunting_anak_terapi_gizi'),
				'stunting_anak_terapi_gizi_anggaran' 		=> str_replace('.', '', $this->input->post('stunting_anak_terapi_gizi_anggaran')),
				'stunting_anak_bpjs_stunting' 				=> $this->input->post('stunting_anak_bpjs_stunting'),
				'stunting_anak_bpjs_stunting_anggaran' 		=> str_replace('.', '', $this->input->post('stunting_anak_bpjs_stunting_anggaran')),
				'stunting_anak_bantuan_sembako' 			=> $this->input->post('stunting_anak_bantuan_sembako'),
				'stunting_anak_bantuan_sembako_anggaran' 	=> str_replace('.', '', $this->input->post('stunting_anak_bantuan_sembako_anggaran')),
				'stunting_anak_dahsyat' 					=> $this->input->post('stunting_anak_dahsyat'),
				'stunting_anak_dahsyat_anggaran' 			=> str_replace('.', '', $this->input->post('stunting_anak_dahsyat_anggaran')),
				'stunting_anak_rtlh' 						=> $this->input->post('stunting_anak_rtlh'),
				'stunting_anak_rtlh_anggaran' 				=> str_replace('.', '', $this->input->post('stunting_anak_rtlh_anggaran')),
				'stunting_anak_dlh' 						=> $this->input->post('stunting_anak_dlh'),
				'stunting_anak_dlh_anggaran' 				=>str_replace('.', '',  $this->input->post('stunting_anak_dlh_anggaran')),
				'stunting_anak_akses_pangan' 				=> $this->input->post('stunting_anak_akses_pangan'),
				'stunting_anak_akses_pangan_anggaran' 		=> str_replace('.', '', $this->input->post('stunting_anak_akses_pangan_anggaran')),
				'stunting_anak_mitra_lain' 					=> $this->input->post('stunting_anak_mitra_lain'),
				'stunting_anak_user_created' 				=> get_user_data('id'),
				'stunting_anak_created_at' 					=> date('Y-m-d H:i:s'),
			];

			$save_data_stunting_anak = $id = $this->model_data_stunting_anak->store($save_data);

			if ($save_data_stunting_anak) {
				for ($i=0; $i < count($asupan_opd_id); $i++) {
					$save_data_stunting_opd = [
						'asupan_gizi_data_stunting_anak_id' => $id,
						'asupan_gizi_opd_id' 				=> $asupan_opd_id[$i],
						'asupan_gizi_opd' 					=> $asupan_opd_status[$i],
						'asupan_gizi_opd_anggaran' 			=> str_replace('.', '', $asupan_opd_anggaran[$i]),
						'asupan_gizi_user_created' 			=> get_user_data('id'),
						'asupan_gizi_created_at' 			=> date('Y-m-d H:i:s'),
					];
					
					$this->db->insert('data_asupan_gizi_stunting', $save_data_stunting_opd);
				}
		
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = true;
					$this->data['id'] 	   = $save_data_stunting_anak;
					$this->data['message'] = cclang('success_save_data_stay', [
						anchor('administrator/data_stunting_anak/edit/' . $save_data_stunting_anak, 'Edit Data Stunting Anak'),
						anchor('administrator/data_stunting_anak', ' Go back to list')
					]);
				} else {
					set_message(
						cclang('success_save_data_redirect', [
						anchor('administrator/data_stunting_anak/edit/' . $save_data_stunting_anak, 'Edit Data Stunting Anak')
					]), 'success');

					$this->data['success'] = true;
					$this->data['redirect'] = base_url('administrator/data_stunting_anak/view_stunting?anak='.$id_anak);
				}
			} else {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = false;
					$this->data['message'] = cclang('data_not_change');
				} else {
					$this->data['success'] = false;
					$this->data['message'] = cclang('data_not_change');
					$this->data['redirect'] = base_url('administrator/data_stunting_anak/view_stunting?anak='.$id_anak);
				}
			}
		} else {
			$this->data['success'] = false;
			$this->data['message'] = 'Opss validation failed';
			$this->data['errors'] = $this->form_validation->error_array();
		}

		$this->response($this->data);
	}

	public function edit_stunting($id) {
		$this->is_allowed('data_stunting_anak_update');

		$this->data['data_stunting_anak'] = $this->model_data_stunting_anak->find($id);

		$this->template->title('Data Stunting Anak Update');
		$this->render('backend/standart/administrator/data_stunting_anak/stunting_anak_update', $this->data);
	}

	
	public function edit_save_stunting($id) {
		if (!$this->is_allowed('data_stunting_anak_update', false)) {
			echo json_encode([
				'success' => false,
				'message' => cclang('sorry_you_do_not_have_permission_to_access')
			]);
			exit;
		}

		$asupan_opd_id 			= $this->input->post('asupan_gizi_opd_id');
		$asupan_opd_status 		= $this->input->post('asupan_gizi_opd');
		$asupan_opd_anggaran 	= $this->input->post('asupan_gizi_opd_anggaran');

		$id_anak = db_get_all_data('data_stunting_anak', ['stunting_anak_id' => $id])[0]->stunting_anak_anak_id;

		/* $this->form_validation->set_rules('stunting_anak_dtks', 'DTKS', 'trim|required');
		$this->form_validation->set_rules('stunting_anak_tgl_ukur', 'Tanggal Pengukuran', 'trim|required');
		$this->form_validation->set_rules('stunting_anak_berat_badan', 'Berat Badan Anak', 'trim|required');
		$this->form_validation->set_rules('stunting_anak_tinggi_badan', 'Tinggi Badan Anak', 'trim|required');
		$this->form_validation->set_rules('stunting_anak_anak_angkat', 'Anak Angkat', 'trim|required');
		$this->form_validation->set_rules('stunting_anak_anak_angkat_anggaran', 'Anggaran Anak Angkat', 'trim|required');
		$this->form_validation->set_rules('stunting_anak_pengasuh_balita', 'Pengasuh Balita', 'trim|required');
		$this->form_validation->set_rules('stunting_anak_pengasuh_balita_anggaran', 'Anggaran Pengasuh Balita', 'trim|required');
		$this->form_validation->set_rules('stunting_anak_day_care', 'Day Care Stunting', 'trim|required');
		$this->form_validation->set_rules('stunting_anak_day_care_anggaran', 'Anggaran Day Care Stunting', 'trim|required');
		$this->form_validation->set_rules('stunting_anak_asupan_gizi_pmt', 'Asupan Gizi (PMT)', 'trim|required');

		$this->form_validation->set_rules('asupan_gizi_opd_id[0]', 'Asupan Gizi Instansi DKK', 'trim|required');
		$this->form_validation->set_rules('asupan_gizi_opd_anggaran[0]', 'Anggaran Asupan Gizi Instansi DKK', 'trim|required');
		$this->form_validation->set_rules('asupan_gizi_opd_id[1]', 'Asupan Gizi Instansi DISTAPANG', 'trim|required');
		$this->form_validation->set_rules('asupan_gizi_opd_anggaran[1]', 'Anggaran Asupan Gizi Instansi DISTAPANG', 'trim|required');
		$this->form_validation->set_rules('asupan_gizi_opd_id[2]', 'Asupan Gizi Instansi DISPERIKANAN', 'trim|required');
		$this->form_validation->set_rules('asupan_gizi_opd_anggaran[2]', 'Anggaran Asupan Gizi Instansi DISPERIKANAN', 'trim|required');

		$this->form_validation->set_rules('stunting_anak_asupan_gizi_csr', 'Asupan Gizi CSR', 'trim|required');
		$this->form_validation->set_rules('stunting_anak_asupan_gizi_csr_anggaran', 'Anggaran Asupan Gizi CSR', 'trim|required');

		$this->form_validation->set_rules('stunting_anak_imunisasi', 'Imunisasi Anak', 'trim|required');
		$this->form_validation->set_rules('stunting_anak_imunisasi_anggaran', 'Anggaran Imunisasi Anak', 'trim|required');
		$this->form_validation->set_rules('stunting_anak_terapi_gizi', 'Terapi Gizi', 'trim|required');
		$this->form_validation->set_rules('stunting_anak_terapi_gizi_anggaran', 'Anggaran Terapi Gizi', 'trim|required');
		$this->form_validation->set_rules('stunting_anak_bpjs_stunting', 'BPJS Stunting', 'trim|required');
		$this->form_validation->set_rules('stunting_anak_bpjs_stunting_anggaran', 'Anggaran BPJS Stunting', 'trim|required');
		$this->form_validation->set_rules('stunting_anak_bantuan_sembako', 'Bantuan Sembako', 'trim|required');
		$this->form_validation->set_rules('stunting_anak_bantuan_sembako_anggaran', 'Anggaran Bantuan Sembako', 'trim|required');
		$this->form_validation->set_rules('stunting_anak_dahsyat', 'Dahsyat', 'trim|required');
		$this->form_validation->set_rules('stunting_anak_dahsyat_anggaran', 'Anggaran Dahsyat', 'trim|required');
		$this->form_validation->set_rules('stunting_anak_rtlh', 'RTLH', 'trim|required');
		$this->form_validation->set_rules('stunting_anak_rtlh_anggaran', 'Anggaran RTLH', 'trim|required');
		$this->form_validation->set_rules('stunting_anak_dlh', 'DLH', 'trim|required');
		$this->form_validation->set_rules('stunting_anak_dlh_anggaran', 'Anggaran DLH', 'trim|required');
		$this->form_validation->set_rules('stunting_anak_akses_pangan', 'Akses Pangan / UMKM Lokal', 'trim|required');
		$this->form_validation->set_rules('stunting_anak_akses_pangan_anggaran', 'Anggaran Akses Pangan / UMKM Lokal', 'trim|required'); */
		
		if ($this->form_validation->run()) {
			$save_data = [
				'stunting_anak_dtks' 						=> $this->input->post('stunting_anak_dtks'),
				'stunting_anak_tgl_ukur' 					=> $this->input->post('stunting_anak_tgl_ukur'),
				'stunting_anak_berat_badan' 				=> $this->input->post('stunting_anak_berat_badan'),
				'stunting_anak_tinggi_badan' 				=> $this->input->post('stunting_anak_tinggi_badan'),
				'stunting_anak_anak_angkat' 				=> $this->input->post('stunting_anak_anak_angkat'),
				'stunting_anak_anak_angkat_anggaran' 		=> str_replace('.', '', $this->input->post('stunting_anak_anak_angkat_anggaran')),
				'stunting_anak_pengasuh_balita' 			=> $this->input->post('stunting_anak_pengasuh_balita'),
				'stunting_anak_pengasuh_balita_anggaran' 	=> str_replace('.', '', $this->input->post('stunting_anak_pengasuh_balita_anggaran')),
				'stunting_anak_day_care' 					=> $this->input->post('stunting_anak_day_care'),
				'stunting_anak_day_care_anggaran' 			=> str_replace('.', '', $this->input->post('stunting_anak_day_care_anggaran')),
				'stunting_anak_asupan_gizi_pmt' 			=> $this->input->post('stunting_anak_asupan_gizi_pmt'),
				'stunting_anak_imunisasi' 					=> $this->input->post('stunting_anak_imunisasi'),
				'stunting_anak_imunisasi_anggaran' 			=> str_replace('.', '', $this->input->post('stunting_anak_imunisasi_anggaran')),
				'stunting_anak_terapi_gizi' 				=> $this->input->post('stunting_anak_terapi_gizi'),
				'stunting_anak_terapi_gizi_anggaran' 		=> str_replace('.', '', $this->input->post('stunting_anak_terapi_gizi_anggaran')),
				'stunting_anak_bpjs_stunting' 				=> $this->input->post('stunting_anak_bpjs_stunting'),
				'stunting_anak_bpjs_stunting_anggaran' 		=> str_replace('.', '', $this->input->post('stunting_anak_bpjs_stunting_anggaran')),
				'stunting_anak_bantuan_sembako' 			=> $this->input->post('stunting_anak_bantuan_sembako'),
				'stunting_anak_bantuan_sembako_anggaran' 	=> str_replace('.', '', $this->input->post('stunting_anak_bantuan_sembako_anggaran')),
				'stunting_anak_dahsyat' 					=> $this->input->post('stunting_anak_dahsyat'),
				'stunting_anak_dahsyat_anggaran' 			=> str_replace('.', '', $this->input->post('stunting_anak_dahsyat_anggaran')),
				'stunting_anak_rtlh' 						=> $this->input->post('stunting_anak_rtlh'),
				'stunting_anak_rtlh_anggaran' 				=> str_replace('.', '', $this->input->post('stunting_anak_rtlh_anggaran')),
				'stunting_anak_dlh' 						=> $this->input->post('stunting_anak_dlh'),
				'stunting_anak_dlh_anggaran' 				=> str_replace('.', '', $this->input->post('stunting_anak_dlh_anggaran')),
				'stunting_anak_akses_pangan' 				=> $this->input->post('stunting_anak_akses_pangan'),
				'stunting_anak_akses_pangan_anggaran' 		=> str_replace('.', '', $this->input->post('stunting_anak_akses_pangan_anggaran')),
				'stunting_anak_mitra_lain' 					=> $this->input->post('stunting_anak_mitra_lain'),
				'stunting_anak_user_updated' 				=> get_user_data('id'),
				'stunting_anak_update_at' 					=> date('Y-m-d H:i:s'),
			];
			
			$save_data_stunting_anak = $this->model_data_stunting_anak->change($id, $save_data);

			if ($save_data_stunting_anak) {
				for ($i=0; $i < count($asupan_opd_id); $i++) {
					$save_data_stunting_opd = [
						'asupan_gizi_opd' 					=> $asupan_opd_status[$i],
						'asupan_gizi_opd_anggaran' 			=> str_replace('.', '', $asupan_opd_anggaran[$i]),
						'asupan_gizi_user_created' 			=> get_user_data('id'),
						'asupan_gizi_created_at' 			=> date('Y-m-d H:i:s'),
					];
					
					$this->db->update('data_asupan_gizi_stunting', $save_data_stunting_opd, ['asupan_gizi_data_stunting_anak_id' => $id, 'asupan_gizi_opd_id' => $asupan_opd_id[$i]]);
				}

				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = true;
					$this->data['id'] 	   = $id;
					$this->data['message'] = cclang('success_update_data_stay', [
						anchor('administrator/data_stunting_anak', ' Go back to list')
					]);
				} else {
					set_message(
						cclang('success_update_data_redirect', [
					]), 'success');

					$this->data['success'] = true;
					$this->data['redirect'] = base_url('administrator/data_stunting_anak/view_stunting?anak='.$id_anak);
				}
			} else {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = false;
					$this->data['message'] = cclang('data_not_change');
				} else {
					$this->data['success'] = false;
					$this->data['message'] = cclang('data_not_change');
					$this->data['redirect'] = base_url('administrator/data_stunting_anak/view_stunting?anak='.$id_anak);
				}
			}
		} else {
			$this->data['success'] = false;
			$this->data['message'] = 'Opss validation failed';
			$this->data['errors'] = $this->form_validation->error_array();
		}

		$this->response($this->data);
	}

	private function _remove_stunting($id) {
		$conditions_stunting = [
			'stunting_anak_id' => $id,
		];

		$this->db->delete('data_stunting_anak', $conditions_stunting);

		$conditions_gizi = [
			'asupan_gizi_data_stunting_anak_id' => $id,
		];

		return $this->db->delete('data_asupan_gizi_stunting', $conditions_gizi);
	}

	public function delete_stunting($id){
		$this->is_allowed('data_stunting_anak_delete');

		$this->load->helper('file');

		$arr_id = $this->input->get('id');
		$remove = false;

		if (!empty($id)) {
			$remove = $this->_remove_stunting($id);
		} elseif (count($arr_id) >0) {
			foreach ($arr_id as $id) {
				$remove = $this->_remove_stunting($id);
			}
		}

		if ($remove) {
			set_message(cclang('has_been_deleted', cclang('data_stunting_anak')), 'success');
		} else {
			set_message(cclang('error_delete', cclang('data_stunting_anak')), 'error');
		}

		redirect_back();
	}
}


/* End of file data_stunting_anak.php */
/* Location: ./application/controllers/administrator/Data Stunting Anak.php */