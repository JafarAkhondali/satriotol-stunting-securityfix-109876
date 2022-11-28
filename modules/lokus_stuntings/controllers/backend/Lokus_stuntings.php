<?php
defined('BASEPATH') OR exit('No direct script access allowed');


/**
*| --------------------------------------------------------------------------
*| Lokus Stuntings Controller
*| --------------------------------------------------------------------------
*| Lokus Stuntings site
*|
*/
class Lokus_stuntings extends Admin	{
	public function __construct() {
		parent::__construct();

		$this->load->model('model_lokus_stuntings');
		$this->load->model('group/model_group');
		$this->lang->load('web_lang', $this->current_lang);
	}

	/**
	* show all Lokus Stuntingss
	*
	* @var $offset String
	*/
	public function index($offset = 0) {
		$this->is_allowed('lokus_stuntings_list');

		$filter = $this->input->get('q');
		$field 	= $this->input->get('f');

		$this->data['lokus_stuntingss'] 		= $this->model_lokus_stuntings->get($filter, $field, $this->limit_page, $offset);
		// echo $this->db->last_query();
		// exit;
		
		$this->data['lokus_stuntings_counts'] 	= $this->model_lokus_stuntings->count_all($filter, $field);

		$config = [
			'base_url'     => 'administrator/lokus_stuntings/index/',
			'total_rows'   => $this->data['lokus_stuntings_counts'],
			'per_page'     => $this->limit_page,
			'uri_segment'  => 4,
		];

		$this->data['pagination'] = $this->pagination($config);

		$this->template->title('Lokus Stuntings List');
		$this->render('backend/standart/administrator/lokus_stuntings/lokus_stuntings_list', $this->data);
	}
	
	/**
	* Add new lokus_stuntingss
	*
	*/
	public function add() {
		$this->is_allowed('lokus_stuntings_add');

		$getID = $this->input->get('id');

		$this->data = [
			'id' => $getID,
		];

		$this->template->title('Lokus Stuntings New');
		$this->render('backend/standart/administrator/lokus_stuntings/lokus_stuntings_add', $this->data);
	}

	/**
	* Add New Lokus Stuntingss
	*
	* @return JSON
	*/
	public function add_save() {
		if (!$this->is_allowed('lokus_stuntings_add', false)) {
			echo json_encode([
				'success' => false,
				'message' => cclang('sorry_you_do_not_have_permission_to_access')
				]);
			exit;
		}

		$this->form_validation->set_rules('lokus_year_id', 'Tahun Lokus', 'trim|required');
		$this->form_validation->set_rules('kelurahan_id[]', 'Nama Kelurahan', 'trim|required');

		$getID = $this->input->post('id');

		if (!empty($getID)) {
			$redirect = base_url('administrator/lokus_years/view/'.$getID);
		}else{
			$redirect = base_url('administrator/lokus_stuntings');
		}

		$listed_kelurahan = [];
		if (count((array) $this->input->post('kelurahan_id'))) {
			foreach ((array) $_POST['kelurahan_id'] as $idx => $kelurahan_id) {
				$listed_kelurahan[] = $kelurahan_id;
			}
		}

		if ($this->form_validation->run()) {
			$save_data = [
				'lokus_year_id' 			=> $this->input->post('lokus_year_id'),
				'kelurahan_id' 				=> implode(',', $listed_kelurahan),
				'lokus_stunting_create_at' 	=> date('Y-m-d H:i:s'),
				'lokus_stunting_user' 		=> get_user_data('id'),
			];

			$save_lokus_stuntings = $id = $this->model_lokus_stuntings->store($save_data);

			if ($save_lokus_stuntings) {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = true;
					$this->data['id'] 	   = $save_lokus_stuntings;
					$this->data['message'] = cclang('success_save_data_stay', [
						anchor('administrator/lokus_stuntings/edit/' . $save_lokus_stuntings, 'Edit Lokus Stuntings'),
						anchor('administrator/lokus_stuntings', ' Go back to list')
					]);
				} else {
					set_message(
						cclang('success_save_data_redirect', [
						anchor('administrator/lokus_stuntings/edit/' . $save_lokus_stuntings, 'Edit Lokus Stuntings')
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
	* Update view Lokus Stuntingss
	*
	* @var $id String
	*/
	public function edit($id) {
		$this->is_allowed('lokus_stuntings_update');

		$getID = $this->input->get('id');

		$this->data = [
			'id' 				=> $getID,
			'lokus_stuntings' 	=> $this->model_lokus_stuntings->find($id),
		];

		$this->template->title('Lokus Stuntings Update');
		$this->render('backend/standart/administrator/lokus_stuntings/lokus_stuntings_update', $this->data);
	}

	/**
	* Update Lokus Stuntingss
	*
	* @var $id String
	*/
	public function edit_save($id) {
		if (!$this->is_allowed('lokus_stuntings_update', false)) {
			echo json_encode([
				'success' => false,
				'message' => cclang('sorry_you_do_not_have_permission_to_access')
				]);
			exit;
		}

		$this->form_validation->set_rules('lokus_year_id', 'Tahun Lokus', 'trim|required');
		$this->form_validation->set_rules('kelurahan_id[]', 'Nama Kelurahan', 'trim|required');

		$listed_kelurahan = [];
		if (count((array) $this->input->post('kelurahan_id'))) {
			foreach ((array) $_POST['kelurahan_id'] as $idx => $kelurahan_id) {
				$listed_kelurahan[] = $kelurahan_id;
			}
		}

		$getID = $this->input->post('id');

		if (!empty($getID)) {
			$redirect = base_url('administrator/lokus_years/view/'.$getID);
		}else{
			$redirect = base_url('administrator/lokus_stuntings');
		}
		
		if ($this->form_validation->run()) {
			$save_data = [
				'lokus_year_id' => $this->input->post('lokus_year_id'),
				'kelurahan_id' 	=> implode(',', $listed_kelurahan),
			];
			
			$save_lokus_stuntings = $this->model_lokus_stuntings->change($id, $save_data);

			if ($save_lokus_stuntings) {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = true;
					$this->data['id'] 	   = $id;
					$this->data['message'] = cclang('success_update_data_stay', [
						anchor('administrator/lokus_stuntings', ' Go back to list')
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
	* delete Lokus Stuntingss
	*
	* @var $id String
	*/
	public function delete($id = null) {
		$this->is_allowed('lokus_stuntings_delete');

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
            set_message(cclang('has_been_deleted', 'lokus_stuntings'), 'success');
        } else {
            set_message(cclang('error_delete', 'lokus_stuntings'), 'error');
        }

		redirect_back();
	}

		/**
	* View view Lokus Stuntingss
	*
	* @var $id String
	*/
	public function view($id) {
		$this->is_allowed('lokus_stuntings_view');

		$this->data['lokus_stuntings'] = $this->model_lokus_stuntings->join_avaiable()->filter_avaiable()->find($id);

		$this->template->title('Lokus Stuntings Detail');
		$this->render('backend/standart/administrator/lokus_stuntings/lokus_stuntings_view', $this->data);
	}
	
	/**
	* delete Lokus Stuntingss
	*
	* @var $id String
	*/
	private function _remove($id) {
		$lokus_stuntings = $this->model_lokus_stuntings->find($id);
		
		return $this->model_lokus_stuntings->remove($id);
	}
	
	
	/**
	* Export to excel
	*
	* @return Files Excel .xls
	*/
	public function export() {
		$this->is_allowed('lokus_stuntings_export');

		$this->model_lokus_stuntings->export(
			'lokus_stuntings', 
			'lokus_stuntings',
			$this->model_lokus_stuntings->field_search
		);
	}

	/**
	* Export to PDF
	*
	* @return Files PDF .pdf
	*/
	public function export_pdf() {
		$this->is_allowed('lokus_stuntings_export');

		$this->model_lokus_stuntings->pdf('lokus_stuntings', 'lokus_stuntings');
	}


	public function single_pdf($id = null) {
		$this->is_allowed('lokus_stuntings_export');

		$table = $title = 'lokus_stuntings';
		$this->load->library('HtmlPdf');
      
        $config = array(
            'orientation' => 'p',
            'format' => 'a4',
            'marges' => array(5, 5, 5, 5)
        );

        $this->pdf = new HtmlPdf($config);
        $this->pdf->setDefaultFont('stsongstdlight'); 

        $result = $this->db->get($table);
       
        $data = $this->model_lokus_stuntings->find($id);
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

	public function ajax_lokus_year_id($id = null) {
		if (!$this->is_allowed('lokus_stuntings_list', false)) {
			echo json_encode([
				'success' => false,
				'message' => cclang('sorry_you_do_not_have_permission_to_access')
				]);
			exit;
		}

		if ($id != null) {
			$results = db_get_all_data('lokus_years', ['lokus_year_id' => $id]);
		}else{
			$results = db_get_all_data('lokus_years');
		}

		$this->response($results);	
	}

	public function ajax_kelurahan_id($id = null) {
		if (!$this->is_allowed('lokus_stuntings_list', false)) {
			echo json_encode([
				'success' => false,
				'message' => cclang('sorry_you_do_not_have_permission_to_access')
				]);
			exit;
		}

		// if ($id != null) {
		// 	$results = db_get_all_data('kelurahans', ['kelurahan_id' => $id]);
		// }else{
			$results = db_get_all_data('kelurahans');
		// }

		$this->response($results);	
	}

	
}


/* End of file lokus_stuntings.php */
/* Location: ./application/controllers/administrator/Lokus Stuntings.php */