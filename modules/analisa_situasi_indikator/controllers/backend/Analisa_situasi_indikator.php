<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
*| --------------------------------------------------------------------------
*| Analisa Situasi Indikator Controller
*| --------------------------------------------------------------------------
*| Analisa Situasi Indikator site
*|
*/
class Analisa_situasi_indikator extends Admin {
	public function __construct() {
		parent::__construct();

		$this->load->model('model_analisa_situasi_indikator');
		$this->load->model('group/model_group');
		$this->lang->load('web_lang', $this->current_lang);
	}

	/**
	* show all Analisa Situasi Indikators
	*
	* @var $offset String
	*/
	public function index($offset = 0) {
		$this->is_allowed('analisa_situasi_indikator_list');

		$filter = $this->input->get('q');
		$field 	= $this->input->get('f');

		$this->data['analisa_situasi_indikators'] 		= $this->model_analisa_situasi_indikator->get($filter, $field, $this->limit_page, $offset);
		$this->data['analisa_situasi_indikator_counts'] = $this->model_analisa_situasi_indikator->count_all($filter, $field);

		$config = [
			'base_url'     => 'administrator/analisa_situasi_indikator/index/',
			'total_rows'   => $this->data['analisa_situasi_indikator_counts'],
			'per_page'     => $this->limit_page,
			'uri_segment'  => 4,
		];

		$this->data['pagination'] = $this->pagination($config);

		$this->template->title('Indikator Analisa Situasi List');
		$this->render('backend/standart/administrator/analisa_situasi_indikator/analisa_situasi_indikator_list', $this->data);
	}
	
	/**
	* Add new analisa_situasi_indikators
	*
	*/
	public function add() {
		$this->is_allowed('analisa_situasi_indikator_add');

		$this->template->title('Indikator Analisa Situasi New');
		$this->render('backend/standart/administrator/analisa_situasi_indikator/analisa_situasi_indikator_add', $this->data);
	}

	/**
	* Add New Analisa Situasi Indikators
	*
	* @return JSON
	*/
	public function add_save() {
		if (!$this->is_allowed('analisa_situasi_indikator_add', false)) {
			echo json_encode([
				'success' => false,
				'message' => cclang('sorry_you_do_not_have_permission_to_access')
				]);

			exit;
		}

		$this->form_validation->set_rules('analisa_situasi_indikator_nama', 'Nama Indikator', 'trim|required|max_length[255]');

		if ($this->form_validation->run()) {
			$save_data = [
				'analisa_situasi_indikator_nama' 			=> $this->input->post('analisa_situasi_indikator_nama'),
				'analisa_situasi_indikator_deskripsi' 		=> $this->input->post('analisa_situasi_indikator_deskripsi'),
				'analisa_situasi_indikator_create_author' 	=> get_user_data('id'),
				'analisa_situasi_indikator_create_at' 		=> date('Y-m-d H:i:s'),
			];

			$save_analisa_situasi_indikator = $id = $this->model_analisa_situasi_indikator->store($save_data);

			if ($save_analisa_situasi_indikator) {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = true;
					$this->data['id'] 	   = $save_analisa_situasi_indikator;
					$this->data['message'] = cclang('success_save_data_stay', [
						anchor('administrator/analisa_situasi_indikator/edit/' . $save_analisa_situasi_indikator, 'Edit Analisa Situasi Indikator'),
						anchor('administrator/analisa_situasi_indikator', ' Go back to list')
					]);
				} else {
					set_message(
						cclang('success_save_data_redirect', [
						anchor('administrator/analisa_situasi_indikator/edit/' . $save_analisa_situasi_indikator, 'Edit Analisa Situasi Indikator')
					]), 'success');

					$this->data['success'] = true;
					$this->data['redirect'] = base_url('administrator/analisa_situasi_indikator');
				}
			} else {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = false;
					$this->data['message'] = cclang('data_not_change');
				} else {
					$this->data['success'] = false;
					$this->data['message'] = cclang('data_not_change');
					$this->data['redirect'] = base_url('administrator/analisa_situasi_indikator');
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
	* Update view Analisa Situasi Indikators
	*
	* @var $id String
	*/
	public function edit($id) {
		$this->is_allowed('analisa_situasi_indikator_update');

		$this->data['analisa_situasi_indikator'] = $this->model_analisa_situasi_indikator->find($id);

		$this->template->title('Indikator Analisa Situasi Update');
		$this->render('backend/standart/administrator/analisa_situasi_indikator/analisa_situasi_indikator_update', $this->data);
	}

	/**
	* Update Analisa Situasi Indikators
	*
	* @var $id String
	*/
	public function edit_save($id) {
		if (!$this->is_allowed('analisa_situasi_indikator_update', false)) {
			echo json_encode([
				'success' => false,
				'message' => cclang('sorry_you_do_not_have_permission_to_access')
				]);
			exit;
		}

		$this->form_validation->set_rules('analisa_situasi_indikator_nama', 'Nama Indikator', 'trim|required|max_length[255]');
		
		if ($this->form_validation->run()) {
			$save_data = [
				'analisa_situasi_indikator_nama' 			=> $this->input->post('analisa_situasi_indikator_nama'),
				'analisa_situasi_indikator_deskripsi' 		=> $this->input->post('analisa_situasi_indikator_deskripsi'),
				'analisa_situasi_indikator_update_author' 	=> get_user_data('id'),
				'analisa_situasi_indikator_update_at' 		=> date('Y-m-d H:i:s'),
			];

			$save_analisa_situasi_indikator = $this->model_analisa_situasi_indikator->change($id, $save_data);

			if ($save_analisa_situasi_indikator) {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = true;
					$this->data['id'] 	   = $id;
					$this->data['message'] = cclang('success_update_data_stay', [
						anchor('administrator/analisa_situasi_indikator', ' Go back to list')
					]);
				} else {
					set_message(
						cclang('success_update_data_redirect', [
					]), 'success');

					$this->data['success'] = true;
					$this->data['redirect'] = base_url('administrator/analisa_situasi_indikator');
				}
			} else {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = false;
					$this->data['message'] = cclang('data_not_change');
				} else {
					$this->data['success'] = false;
					$this->data['message'] = cclang('data_not_change');
					$this->data['redirect'] = base_url('administrator/analisa_situasi_indikator');
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
	* delete Analisa Situasi Indikators
	*
	* @var $id String
	*/
	public function delete($id = null) {
		$this->is_allowed('analisa_situasi_indikator_delete');

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
			set_message(cclang('has_been_deleted', 'analisa_situasi_indikator'), 'success');
		} else {
			set_message(cclang('error_delete', 'analisa_situasi_indikator'), 'error');
		}

		redirect_back();
	}

		/**
	* View view Analisa Situasi Indikators
	*
	* @var $id String
	*/
	public function view($id) {
		$this->is_allowed('analisa_situasi_indikator_view');

		$this->data['analisa_situasi_indikator'] = $this->model_analisa_situasi_indikator->join_avaiable()->filter_avaiable()->find($id);

		$this->template->title('Indikator Analisa Situasi Detail');
		$this->render('backend/standart/administrator/analisa_situasi_indikator/analisa_situasi_indikator_view', $this->data);
	}
	
	/**
	* delete Analisa Situasi Indikators
	*
	* @var $id String
	*/
	private function _remove($id) {
		$analisa_situasi_indikator = $this->model_analisa_situasi_indikator->find($id);
		
		return $this->model_analisa_situasi_indikator->remove($id);
	}
	
	
	/**
	* Export to excel
	*
	* @return Files Excel .xls
	*/
	public function export() {
		$this->is_allowed('analisa_situasi_indikator_export');

		$this->model_analisa_situasi_indikator->export(
			'analisa_situasi_indikator', 
			'analisa_situasi_indikator',
			$this->model_analisa_situasi_indikator->field_search
		);
	}

	/**
	* Export to PDF
	*
	* @return Files PDF .pdf
	*/
	public function export_pdf() {
		$this->is_allowed('analisa_situasi_indikator_export');

		$this->model_analisa_situasi_indikator->pdf('analisa_situasi_indikator', 'analisa_situasi_indikator');
	}


	public function single_pdf($id = null) {
		$this->is_allowed('analisa_situasi_indikator_export');

		$table = $title = 'analisa_situasi_indikator';
		$this->load->library('HtmlPdf');
	  
		$config = array(
			'orientation' => 'p',
			'format' => 'a4',
			'marges' => array(5, 5, 5, 5)
		);

		$this->pdf = new HtmlPdf($config);
		$this->pdf->setDefaultFont('stsongstdlight'); 

		$result = $this->db->get($table);
	   
		$data = $this->model_analisa_situasi_indikator->find($id);
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
}


/* End of file analisa_situasi_indikator.php */
/* Location: ./application/controllers/administrator/Analisa Situasi Indikator.php */