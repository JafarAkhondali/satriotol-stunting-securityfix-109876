<?php
defined('BASEPATH') OR exit('No direct script access allowed');


/**
*| --------------------------------------------------------------------------
*| Opd Controller
*| --------------------------------------------------------------------------
*| Opd site
*|
*/
class Opd extends Admin {
	public function __construct() {
		parent::__construct();

		$this->load->model('model_opd');
		$this->load->model('group/model_group');
		$this->lang->load('web_lang', $this->current_lang);
	}

	/**
	* show all Opds
	*
	* @var $offset String
	*/
	public function index($offset = 0) {
		$this->is_allowed('opd_list');

		$filter = $this->input->get('q');
		$field 	= $this->input->get('f');

		$this->data['opds'] = $this->model_opd->get($filter, $field, $this->limit_page, $offset);
		$this->data['opd_counts'] = $this->model_opd->count_all($filter, $field);

		$config = [
			'base_url'     => 'administrator/opd/index/',
			'total_rows'   => $this->data['opd_counts'],
			'per_page'     => $this->limit_page,
			'uri_segment'  => 4,
		];

		$this->data['pagination'] = $this->pagination($config);

		$this->template->title('OPD List');
		$this->render('backend/standart/administrator/opd/opd_list', $this->data);
	}
	
	/**
	* Add new opds
	*
	*/
	public function add() {
		$this->is_allowed('opd_add');

		$this->template->title('OPD New');
		$this->render('backend/standart/administrator/opd/opd_add', $this->data);
	}

	/**
	* Add New Opds
	*
	* @return JSON
	*/
	public function add_save() {
		if (!$this->is_allowed('opd_add', false)) {
			echo json_encode([
				'success' => false,
				'message' => cclang('sorry_you_do_not_have_permission_to_access')
				]);
			exit;
		}

		$this->form_validation->set_rules('opd_nama', 'Nama OPD', 'trim|required|max_length[255]');

		if ($this->form_validation->run()) {
			$save_data = [
				'opd_nama' 		=> $this->input->post('opd_nama'),
				'opd_create_at' => date('Y-m-d H:i:s'),
				'opd_user' 		=> get_user_data('id'),
			];

			$save_opd = $id = $this->model_opd->store($save_data);

			if ($save_opd) {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = true;
					$this->data['id'] 	   = $save_opd;
					$this->data['message'] = cclang('success_save_data_stay', [
						anchor('administrator/opd/edit/' . $save_opd, 'Edit Opd'),
						anchor('administrator/opd', ' Go back to list')
					]);
				} else {
					set_message(
						cclang('success_save_data_redirect', [
						anchor('administrator/opd/edit/' . $save_opd, 'Edit Opd')
					]), 'success');

            		$this->data['success'] = true;
					$this->data['redirect'] = base_url('administrator/opd');
				}
			} else {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = false;
					$this->data['message'] = cclang('data_not_change');
				} else {
            		$this->data['success'] = false;
            		$this->data['message'] = cclang('data_not_change');
					$this->data['redirect'] = base_url('administrator/opd');
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
	* Update view Opds
	*
	* @var $id String
	*/
	public function edit($id) {
		$this->is_allowed('opd_update');

		$this->data['opd'] = $this->model_opd->find($id);

		$this->template->title('OPD Update');
		$this->render('backend/standart/administrator/opd/opd_update', $this->data);
	}

	/**
	* Update Opds
	*
	* @var $id String
	*/
	public function edit_save($id) {
		if (!$this->is_allowed('opd_update', false)) {
			echo json_encode([
				'success' => false,
				'message' => cclang('sorry_you_do_not_have_permission_to_access')
				]);
			exit;
		}

		$this->form_validation->set_rules('opd_nama', 'Nama OPD', 'trim|required|max_length[255]');

		if ($this->form_validation->run()) {
			$save_data = [
				'opd_nama' => $this->input->post('opd_nama'),
			];

			$save_opd = $this->model_opd->change($id, $save_data);

			if ($save_opd) {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = true;
					$this->data['id'] 	   = $id;
					$this->data['message'] = cclang('success_update_data_stay', [
						anchor('administrator/opd', ' Go back to list')
					]);
				} else {
					set_message(
						cclang('success_update_data_redirect', [
					]), 'success');

            		$this->data['success'] = true;
					$this->data['redirect'] = base_url('administrator/opd');
				}
			} else {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = false;
					$this->data['message'] = cclang('data_not_change');
				} else {
            		$this->data['success'] = false;
            		$this->data['message'] = cclang('data_not_change');
					$this->data['redirect'] = base_url('administrator/opd');
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
	* delete Opds
	*
	* @var $id String
	*/
	public function delete($id = null) {
		$this->is_allowed('opd_delete');

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
            set_message(cclang('has_been_deleted', 'opd'), 'success');
        } else {
            set_message(cclang('error_delete', 'opd'), 'error');
        }

		redirect_back();
	}

		/**
	* View view Opds
	*
	* @var $id String
	*/
	public function view($id) {
		$this->is_allowed('opd_view');

		$this->data['opd'] = $this->model_opd->join_avaiable()->filter_avaiable()->find($id);

		$this->template->title('OPD Detail');
		$this->render('backend/standart/administrator/opd/opd_view', $this->data);
	}
	
	/**
	* delete Opds
	*
	* @var $id String
	*/
	private function _remove($id) {
		$opd = $this->model_opd->find($id);
		
		return $this->model_opd->remove($id);
	}
	
	
	/**
	* Export to excel
	*
	* @return Files Excel .xls
	*/
	public function export() {
		$this->is_allowed('opd_export');

		$this->model_opd->export('opd', 'opd', $this->model_opd->field_search);
	}

	/**
	* Export to PDF
	*
	* @return Files PDF .pdf
	*/
	public function export_pdf() {
		$this->is_allowed('opd_export');

		$this->model_opd->pdf('opd', 'opd');
	}


	public function single_pdf($id = null) {
		$this->is_allowed('opd_export');

		$table = $title = 'opd';
		$this->load->library('HtmlPdf');
      
        $config = array(
            'orientation' => 'p',
            'format' => 'a4',
            'marges' => array(5, 5, 5, 5)
        );

        $this->pdf = new HtmlPdf($config);
        $this->pdf->setDefaultFont('stsongstdlight'); 

        $result = $this->db->get($table);
       
        $data = $this->model_opd->find($id);
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


/* End of file opd.php */
/* Location: ./application/controllers/administrator/Opd.php */