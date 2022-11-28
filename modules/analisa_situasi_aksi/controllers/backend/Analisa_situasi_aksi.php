<?php
defined('BASEPATH') OR exit('No direct script access allowed');


/**
*| --------------------------------------------------------------------------
*| Analisa Situasi Aksi Controller
*| --------------------------------------------------------------------------
*| Analisa Situasi Aksi site
*|
*/
class Analisa_situasi_aksi extends Admin {
	public function __construct() {
		parent::__construct();

		$this->load->model('model_analisa_situasi_aksi');
		$this->load->model('group/model_group');
		$this->lang->load('web_lang', $this->current_lang);
		$this->load->helper('app');
		
	}

	/**
	* show all Analisa Situasi Aksis
	*
	* @var $offset String
	*/
	public function index($offset = 0) {
		$this->is_allowed('analisa_situasi_aksi_list');

		$filter = $this->input->get('q');
		$field 	= $this->input->get('f');

		$this->data['analisa_situasi_aksis'] 		= $this->model_analisa_situasi_aksi->get($filter, $field, $this->limit_page, $offset);
		$this->data['analisa_situasi_aksi_counts'] 	= $this->model_analisa_situasi_aksi->count_all($filter, $field);

		$config = [
			'base_url'     => 'administrator/analisa_situasi_aksi/index/',
			'total_rows'   => $this->data['analisa_situasi_aksi_counts'],
			'per_page'     => $this->limit_page,
			'uri_segment'  => 4,
		];

		$this->data['pagination'] = $this->pagination($config);

		$this->template->title('Analisa Situasi Aksi List');
		$this->render('backend/standart/administrator/analisa_situasi_aksi/analisa_situasi_aksi_list', $this->data);
	}
	
	/**
	* Add new analisa_situasi_aksis
	*
	*/
	public function add() {
		$this->is_allowed('analisa_situasi_aksi_add');

		$getID = $this->input->get('id');

		$this->data = [
			'warna' => strtoupper(kode_acak()),
			'id' 	=> $getID,
		];

		$this->template->title('Analisa Situasi Aksi New');
		$this->render('backend/standart/administrator/analisa_situasi_aksi/analisa_situasi_aksi_add', $this->data);
	}

	/**
	* Add New Analisa Situasi Aksis
	*
	* @return JSON
	*/
	public function add_save() {
		$getID 	= $this->input->post('getID');

		if (!$this->is_allowed('analisa_situasi_aksi_add', false)) {
			echo json_encode([
				'success' => false,
				'message' => cclang('sorry_you_do_not_have_permission_to_access')
				]);

			exit;
		}

		$this->form_validation->set_rules('analisa_situasi_id', 'Tahun Analisa Situasi', 'trim|required');
		$this->form_validation->set_rules('analisa_situasi_indikator_id', 'Indikator Analisa Situasi', 'trim|required');
		$this->form_validation->set_rules('analisa_situasi_aksi_cakupan', 'Cakupan', 'trim|required|max_length[10]');

		if (!empty($getID)) {
			$redirect = base_url('administrator/analisa_situasi/view/'.$getID);
		}else{
			$redirect = base_url('administrator/analisa_situasi_aksi');
		}

		if ($this->form_validation->run()) {
			$save_data = [
				'analisa_situasi_id' 					=> $this->input->post('analisa_situasi_id'),
				'analisa_situasi_indikator_id' 			=> $this->input->post('analisa_situasi_indikator_id'),
				'analisa_situasi_aksi_cakupan' 			=> $this->input->post('analisa_situasi_aksi_cakupan'),
				'analisa_situasi_aksi_warna' 			=> strtoupper($this->input->post('analisa_situasi_aksi_warna')),
				'analisa_situasi_aksi_create_author' 	=> get_user_data('id'),
				'analisa_situasi_aksi_create_at' 		=> date('Y-m-d H:i:s'),
			];
			
			$save_analisa_situasi_aksi = $id = $this->model_analisa_situasi_aksi->store($save_data);

			if ($save_analisa_situasi_aksi) {
				$id = $save_analisa_situasi_aksi;
				
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = true;
					$this->data['id'] 	   = $save_analisa_situasi_aksi;
					$this->data['message'] = cclang('success_save_data_stay', [
						anchor('administrator/analisa_situasi_aksi/edit/' . $save_analisa_situasi_aksi, 'Edit Analisa Situasi Aksi'),
						anchor('administrator/analisa_situasi_aksi', ' Go back to list')
					]);
				} else {
					set_message(
						cclang('success_save_data_redirect', [
						anchor('administrator/analisa_situasi_aksi/edit/' . $save_analisa_situasi_aksi, 'Edit Analisa Situasi Aksi')
					]), 'success');

            		$this->data['success'] = true;
					$this->data['redirect'] = $redirect;
				}
			} else {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = false;
					$this->data['message'] = cclang('data_not_change');
				} else {
            		$this->data['success'] = false;
            		$this->data['message'] = cclang('data_not_change');
					$this->data['redirect'] = $redirect;
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
	* Update view Analisa Situasi Aksis
	*
	* @var $id String
	*/
	public function edit($id) {
		$this->is_allowed('analisa_situasi_aksi_update');

		$getID = $this->input->get('id');

		$this->data = [
			'id' 	=> $getID,
		];

		$this->data['analisa_situasi_aksi'] = $this->model_analisa_situasi_aksi->find($id);

		$this->template->title('Analisa Situasi Aksi Update');
		$this->render('backend/standart/administrator/analisa_situasi_aksi/analisa_situasi_aksi_update', $this->data);
	}

	/**
	* Update Analisa Situasi Aksis
	*
	* @var $id String
	*/
	public function edit_save($id) {
		$getID 	= $this->input->post('getID');

		if (!$this->is_allowed('analisa_situasi_aksi_update', false)) {
			echo json_encode([
				'success' => false,
				'message' => cclang('sorry_you_do_not_have_permission_to_access')
				]);

			exit;
		}

		$this->form_validation->set_rules('analisa_situasi_id', 'Tahun Analisa Situasi', 'trim|required');
		$this->form_validation->set_rules('analisa_situasi_indikator_id', 'Indikator Analisa Situasi', 'trim|required');
		$this->form_validation->set_rules('analisa_situasi_aksi_cakupan', 'Cakupan', 'trim|required|max_length[10]');

		if (!empty($getID)) {
			$redirect = base_url('administrator/analisa_situasi/view/'.$getID);
		}else{
			$redirect = base_url('administrator/analisa_situasi_aksi');
		}
		
		if ($this->form_validation->run()) {
			$save_data = [
				'analisa_situasi_id' 					=> $this->input->post('analisa_situasi_id'),
				'analisa_situasi_indikator_id' 			=> $this->input->post('analisa_situasi_indikator_id'),
				'analisa_situasi_aksi_cakupan' 			=> $this->input->post('analisa_situasi_aksi_cakupan'),
				'analisa_situasi_aksi_warna' 			=> strtoupper($this->input->post('analisa_situasi_aksi_warna')),
				'analisa_situasi_aksi_update_author' 	=> get_user_data('id'),
				'analisa_situasi_aksi_update_at' 		=> date('Y-m-d H:i:s'),
			];
			
			$save_analisa_situasi_aksi = $this->model_analisa_situasi_aksi->change($id, $save_data);

			if ($save_analisa_situasi_aksi) {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = true;
					$this->data['id'] 	   = $id;
					$this->data['message'] = cclang('success_update_data_stay', [
						anchor('administrator/analisa_situasi_aksi', ' Go back to list')
					]);
				} else {
					set_message(
						cclang('success_update_data_redirect', [
					]), 'success');

            		$this->data['success'] = true;
					$this->data['redirect'] = $redirect;
				}
			} else {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = false;
					$this->data['message'] = cclang('data_not_change');
				} else {
            		$this->data['success'] = false;
            		$this->data['message'] = cclang('data_not_change');
					$this->data['redirect'] = $redirect;
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
	* delete Analisa Situasi Aksis
	*
	* @var $id String
	*/
	public function delete($id = null) {
		$this->is_allowed('analisa_situasi_aksi_delete');

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
            set_message(cclang('has_been_deleted', 'analisa_situasi_aksi'), 'success');
        } else {
            set_message(cclang('error_delete', 'analisa_situasi_aksi'), 'error');
        }

		redirect_back();
	}

		/**
	* View view Analisa Situasi Aksis
	*
	* @var $id String
	*/
	public function view($id) {
		$this->is_allowed('analisa_situasi_aksi_view');

		$this->data['analisa_situasi_aksi'] = $this->model_analisa_situasi_aksi->join_avaiable()->filter_avaiable()->find($id);

		$this->template->title('Analisa Situasi Aksi Detail');
		$this->render('backend/standart/administrator/analisa_situasi_aksi/analisa_situasi_aksi_view', $this->data);
	}
	
	/**
	* delete Analisa Situasi Aksis
	*
	* @var $id String
	*/
	private function _remove($id) {
		$analisa_situasi_aksi = $this->model_analisa_situasi_aksi->find($id);
		
		return $this->model_analisa_situasi_aksi->remove($id);
	}
	
	
	/**
	* Export to excel
	*
	* @return Files Excel .xls
	*/
	public function export() {
		$this->is_allowed('analisa_situasi_aksi_export');

		$this->model_analisa_situasi_aksi->export(
			'analisa_situasi_aksi', 
			'analisa_situasi_aksi',
			$this->model_analisa_situasi_aksi->field_search
		);
	}

	/**
	* Export to PDF
	*
	* @return Files PDF .pdf
	*/
	public function export_pdf() {
		$this->is_allowed('analisa_situasi_aksi_export');

		$this->model_analisa_situasi_aksi->pdf('analisa_situasi_aksi', 'analisa_situasi_aksi');
	}


	public function single_pdf($id = null) {
		$this->is_allowed('analisa_situasi_aksi_export');

		$table = $title = 'analisa_situasi_aksi';
		$this->load->library('HtmlPdf');
      
        $config = array(
            'orientation' => 'p',
            'format' => 'a4',
            'marges' => array(5, 5, 5, 5)
        );

        $this->pdf = new HtmlPdf($config);
        $this->pdf->setDefaultFont('stsongstdlight'); 

        $result = $this->db->get($table);
       
        $data = $this->model_analisa_situasi_aksi->find($id);
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

	public function ajax_analisa_situasi_id($id = null) {
		if (!$this->is_allowed('analisa_situasi_aksi_list', false)) {
			echo json_encode([
				'success' => false,
				'message' => cclang('sorry_you_do_not_have_permission_to_access')
				]);

			exit;
		}

		if ($id != null) {
			$results = db_get_all_data('analisa_situasi', ['analisa_situasi_id' => $id]);
		}else{
			$results = db_get_all_data('analisa_situasi');
		}

		$this->response($results);	
	}

	public function ajax_analisa_situasi_indikator_id($id = null) {
		if (!$this->is_allowed('analisa_situasi_aksi_list', false)) {
			echo json_encode([
				'success' => false,
				'message' => cclang('sorry_you_do_not_have_permission_to_access')
				]);
			exit;
		}

		if ($id != null) {
			$results = db_get_all_data('analisa_situasi_indikator', ['analisa_situasi_indikator_id' => $id]);
		}else{
			$results = db_get_all_data('analisa_situasi_indikator');
		}

		$this->response($results);	
	}

	
}


/* End of file analisa_situasi_aksi.php */
/* Location: ./application/controllers/administrator/Analisa Situasi Aksi.php */