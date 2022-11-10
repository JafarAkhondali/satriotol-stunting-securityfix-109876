<?php
defined('BASEPATH') OR exit('No direct script access allowed');


/**
*| --------------------------------------------------------------------------
*| Rentan Opd Controller
*| --------------------------------------------------------------------------
*| Rentan Opd site
*|
*/
class Rentan_opd extends Admin {
	public function __construct() {
		parent::__construct();

		$this->load->model('model_rentan_opd');
		$this->load->model('group/model_group');
		$this->lang->load('web_lang', $this->current_lang);
	}

	/**
	* show all Rentan Opds
	*
	* @var $offset String
	*/
	public function index($offset = 0) {
		$this->is_allowed('rentan_opd_list');

		$filter = $this->input->get('q');
		$field 	= $this->input->get('f');

		$this->data['rentan_opds'] = $this->model_rentan_opd->get($filter, $field, $this->limit_page, $offset);
		$this->data['rentan_opd_counts'] = $this->model_rentan_opd->count_all($filter, $field);

		$config = [
			'base_url'     => 'administrator/rentan_opd/index/',
			'total_rows'   => $this->data['rentan_opd_counts'],
			'per_page'     => $this->limit_page,
			'uri_segment'  => 4,
		];

		$this->data['pagination'] = $this->pagination($config);

		$this->template->title('Rencana Kegiatan OPD List');
		$this->render('backend/standart/administrator/rentan_opd/rentan_opd_list', $this->data);
	}
	
	/**
	* Add new rentan_opds
	*
	*/
	public function add() {
		$this->is_allowed('rentan_opd_add');

		$this->template->title('Rencana Kegiatan OPD New');
		$this->render('backend/standart/administrator/rentan_opd/rentan_opd_add', $this->data);
	}

	/**
	* Add New Rentan Opds
	*
	* @return JSON
	*/
	public function add_save() {
		if (!$this->is_allowed('rentan_opd_add', false)) {
			echo json_encode([
				'success' => false,
				'message' => cclang('sorry_you_do_not_have_permission_to_access')
				]);
			exit;
		}

		$this->form_validation->set_rules('opd_id', 'Dinas / OPD / Instansi', 'trim|required');
		$this->form_validation->set_rules('rentan_opd_kegiatan', 'Rencana Kegiatan', 'trim|required');

		if ($this->form_validation->run()) {
			$save_data = [
				'opd_id' 				=> $this->input->post('opd_id'),
				'rentan_opd_kegiatan' 	=> $this->input->post('rentan_opd_kegiatan'),
				'rentan_opd_create_at' 	=> date('Y-m-d H:i:s'),
				'rentan_opd_user' 		=> get_user_data('id'),
			];

			$save_rentan_opd = $id = $this->model_rentan_opd->store($save_data);

			if ($save_rentan_opd) {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = true;
					$this->data['id'] 	   = $save_rentan_opd;
					$this->data['message'] = cclang('success_save_data_stay', [
						anchor('administrator/rentan_opd/edit/' . $save_rentan_opd, 'Edit Rentan Opd'),
						anchor('administrator/rentan_opd', ' Go back to list')
					]);
				} else {
					set_message(
						cclang('success_save_data_redirect', [
						anchor('administrator/rentan_opd/edit/' . $save_rentan_opd, 'Edit Rentan Opd')
					]), 'success');

            		$this->data['success'] = true;
					$this->data['redirect'] = base_url('administrator/rentan_opd');
				}
			} else {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = false;
					$this->data['message'] = cclang('data_not_change');
				} else {
            		$this->data['success'] = false;
            		$this->data['message'] = cclang('data_not_change');
					$this->data['redirect'] = base_url('administrator/rentan_opd');
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
	* Update view Rentan Opds
	*
	* @var $id String
	*/
	public function edit($id) {
		$this->is_allowed('rentan_opd_update');

		$this->data['rentan_opd'] = $this->model_rentan_opd->find($id);

		$this->template->title('Rencana Kegiatan OPD Update');
		$this->render('backend/standart/administrator/rentan_opd/rentan_opd_update', $this->data);
	}

	/**
	* Update Rentan Opds
	*
	* @var $id String
	*/
	public function edit_save($id) {
		if (!$this->is_allowed('rentan_opd_update', false)) {
			echo json_encode([
				'success' => false,
				'message' => cclang('sorry_you_do_not_have_permission_to_access')
				]);
			exit;
		}

		$this->form_validation->set_rules('opd_id', 'Dinas / OPD / Instansi', 'trim|required');
		$this->form_validation->set_rules('rentan_opd_kegiatan', 'Rencana Kegiatan', 'trim|required');
		
		if ($this->form_validation->run()) {
			$save_data = [
				'opd_id' 				=> $this->input->post('opd_id'),
				'rentan_opd_kegiatan' 	=> $this->input->post('rentan_opd_kegiatan'),
			];

			$save_rentan_opd = $this->model_rentan_opd->change($id, $save_data);

			if ($save_rentan_opd) {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = true;
					$this->data['id'] 	   = $id;
					$this->data['message'] = cclang('success_update_data_stay', [
						anchor('administrator/rentan_opd', ' Go back to list')
					]);
				} else {
					set_message(
						cclang('success_update_data_redirect', [
					]), 'success');

            		$this->data['success'] = true;
					$this->data['redirect'] = base_url('administrator/rentan_opd');
				}
			} else {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = false;
					$this->data['message'] = cclang('data_not_change');
				} else {
            		$this->data['success'] = false;
            		$this->data['message'] = cclang('data_not_change');
					$this->data['redirect'] = base_url('administrator/rentan_opd');
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
	* delete Rentan Opds
	*
	* @var $id String
	*/
	public function delete($id = null) {
		$this->is_allowed('rentan_opd_delete');

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
            set_message(cclang('has_been_deleted', 'rentan_opd'), 'success');
        } else {
            set_message(cclang('error_delete', 'rentan_opd'), 'error');
        }

		redirect_back();
	}

		/**
	* View view Rentan Opds
	*
	* @var $id String
	*/
	public function view($id) {
		$this->is_allowed('rentan_opd_view');

		$this->data['rentan_opd'] = $this->model_rentan_opd->join_avaiable()->filter_avaiable()->find($id);

		$this->template->title('Rencana Kegiatan OPD Detail');
		$this->render('backend/standart/administrator/rentan_opd/rentan_opd_view', $this->data);
	}
	
	/**
	* delete Rentan Opds
	*
	* @var $id String
	*/
	private function _remove($id) {
		$rentan_opd = $this->model_rentan_opd->find($id);

		return $this->model_rentan_opd->remove($id);
	}
	
	
	/**
	* Export to excel
	*
	* @return Files Excel .xls
	*/
	public function export() {
		$this->is_allowed('rentan_opd_export');

		$this->model_rentan_opd->export(
			'rentan_opd', 
			'rentan_opd',
			$this->model_rentan_opd->field_search
		);
	}

	/**
	* Export to PDF
	*
	* @return Files PDF .pdf
	*/
	public function export_pdf() {
		$this->is_allowed('rentan_opd_export');

		$this->model_rentan_opd->pdf('rentan_opd', 'rentan_opd');
	}


	public function single_pdf($id = null) {
		$this->is_allowed('rentan_opd_export');

		$table = $title = 'rentan_opd';
		$this->load->library('HtmlPdf');
      
        $config = array(
            'orientation' => 'p',
            'format' => 'a4',
            'marges' => array(5, 5, 5, 5)
        );

        $this->pdf = new HtmlPdf($config);
        $this->pdf->setDefaultFont('stsongstdlight'); 

        $result = $this->db->get($table);
       
        $data = $this->model_rentan_opd->find($id);
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

	public function ajax_opd_id($id = null) {
		if (!$this->is_allowed('rentan_opd_list', false)) {
			echo json_encode([
				'success' => false,
				'message' => cclang('sorry_you_do_not_have_permission_to_access')
				]);
			exit;
		}

		if ($id != NULL) {
			$results = db_get_all_data('opd', ['opd_id' => $id]);
		}else{
			$results = db_get_all_data('opd');
		}

		$this->response($results);	
	}
}


/* End of file rentan_opd.php */
/* Location: ./application/controllers/administrator/Rentan Opd.php */