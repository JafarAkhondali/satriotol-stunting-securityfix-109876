<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
*| --------------------------------------------------------------------------
*| Rembuk Stuntings Controller
*| --------------------------------------------------------------------------
*| Rembuk Stuntings site
*|
*/
class Rembuk_stuntings extends Admin {
	public function __construct() {
		parent::__construct();

		$this->load->model('model_rembuk_stuntings');
		$this->load->model('group/model_group');
		$this->lang->load('web_lang', $this->current_lang);
	}

	/**
	* show all Rembuk Stuntingss
	*
	* @var $offset String
	*/
	public function index($offset = 0) {
		$this->is_allowed('rembuk_stuntings_list');

		$filter = $this->input->get('q');
		$field 	= $this->input->get('f');

		$this->data['rembuk_stuntingss'] 		= $this->model_rembuk_stuntings->get($filter, $field, $this->limit_page, $offset);
		$this->data['rembuk_stuntings_counts'] 	= $this->model_rembuk_stuntings->count_all($filter, $field);

		$config = [
			'base_url'     => 'administrator/rembuk_stuntings/index/',
			'total_rows'   => $this->data['rembuk_stuntings_counts'],
			'per_page'     => $this->limit_page,
			'uri_segment'  => 4,
		];

		$this->data['pagination'] = $this->pagination($config);

		$this->template->title('Rembuk Stunting List');
		$this->render('backend/standart/administrator/rembuk_stuntings/rembuk_stuntings_list', $this->data);
	}
	
	/**
	* Add new rembuk_stuntingss
	*
	*/
	public function add() {
		$this->is_allowed('rembuk_stuntings_add');

		$this->template->title('Rembuk Stunting New');
		$this->render('backend/standart/administrator/rembuk_stuntings/rembuk_stuntings_add', $this->data);
	}

	/**
	* Add New Rembuk Stuntingss
	*
	* @return JSON
	*/
	public function add_save() {
		if (!$this->is_allowed('rembuk_stuntings_add', false)) {
			echo json_encode([
				'success' => false,
				'message' => cclang('sorry_you_do_not_have_permission_to_access')
				]);
			exit;
		}

		$this->form_validation->set_rules('rembuk_stunting_deskripsi', 'Deskripsi', 'trim|required');
		$this->form_validation->set_rules('rembuk_stunting_year', 'Tahun', 'trim|required|max_length[10]');
		$this->form_validation->set_rules('rembuk_stuntings_rembuk_stunting_file_name', 'File', 'trim|required');

		if ($this->form_validation->run()) {
			$rembuk_stuntings_rembuk_stunting_file_uuid 		= $this->input->post('rembuk_stuntings_rembuk_stunting_file_uuid');
			$rembuk_stuntings_rembuk_stunting_file_default_name = $this->input->post('rembuk_stuntings_rembuk_stunting_file_default_name');
			$rembuk_stuntings_rembuk_stunting_file_name 		= $this->input->post('rembuk_stuntings_rembuk_stunting_file_name');
		
			$save_data = [
				'rembuk_stunting_deskripsi' => $this->input->post('rembuk_stunting_deskripsi'),
				'rembuk_stunting_year' 		=> $this->input->post('rembuk_stunting_year'),
				'rembuk_stunting_create_at' => date('Y-m-d H:i:s'),
				'rembuk_stunting_user' 		=> get_user_data('id'),
			];
			
			if (!is_dir(FCPATH . '/uploads/rembuk_stuntings/')) {
				mkdir(FCPATH . '/uploads/rembuk_stuntings/');
			}

			if (!empty($rembuk_stuntings_rembuk_stunting_file_name)) {
				// $rembuk_stuntings_rembuk_stunting_file_name_copy = date('YmdHis') . '-' . $rembuk_stuntings_rembuk_stunting_file_name;
				$rembuk_stuntings_rembuk_stunting_file_name_copy = date('YmdHis') . '_' . str_replace([' ', '_', ' - ', ' _ ', '. '], '-', $rembuk_stuntings_rembuk_stunting_file_default_name);

				rename(FCPATH . 'uploads/tmp/' . $rembuk_stuntings_rembuk_stunting_file_uuid . '/' . $rembuk_stuntings_rembuk_stunting_file_name, 
						FCPATH . 'uploads/rembuk_stuntings/' . $rembuk_stuntings_rembuk_stunting_file_name_copy);

				if (!is_file(FCPATH . '/uploads/rembuk_stuntings/' . $rembuk_stuntings_rembuk_stunting_file_name_copy)) {
					echo json_encode([
						'success' => false,
						'message' => 'Error uploading file'
						]);
					exit;
				}

				$save_data['rembuk_stunting_file'] = $rembuk_stuntings_rembuk_stunting_file_name_copy;
			}
			
			$save_rembuk_stuntings = $id = $this->model_rembuk_stuntings->store($save_data);

			if ($save_rembuk_stuntings) {
				$id = $save_rembuk_stuntings;
				
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = true;
					$this->data['id'] 	   = $save_rembuk_stuntings;
					$this->data['message'] = cclang('success_save_data_stay', [
						anchor('administrator/rembuk_stuntings/edit/' . $save_rembuk_stuntings, 'Edit Rembuk Stuntings'),
						anchor('administrator/rembuk_stuntings', ' Go back to list')
					]);
				} else {
					set_message(
						cclang('success_save_data_redirect', [
						anchor('administrator/rembuk_stuntings/edit/' . $save_rembuk_stuntings, 'Edit Rembuk Stuntings')
					]), 'success');

            		$this->data['success'] = true;
					$this->data['redirect'] = base_url('administrator/rembuk_stuntings');
				}
			} else {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = false;
					$this->data['message'] = cclang('data_not_change');
				} else {
            		$this->data['success'] = false;
            		$this->data['message'] = cclang('data_not_change');
					$this->data['redirect'] = base_url('administrator/rembuk_stuntings');
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
	* Update view Rembuk Stuntingss
	*
	* @var $id String
	*/
	public function edit($id) {
		$this->is_allowed('rembuk_stuntings_update');

		$this->data['rembuk_stuntings'] = $this->model_rembuk_stuntings->find($id);

		$this->template->title('Rembuk Stunting Update');
		$this->render('backend/standart/administrator/rembuk_stuntings/rembuk_stuntings_update', $this->data);
	}

	/**
	* Update Rembuk Stuntingss
	*
	* @var $id String
	*/
	public function edit_save($id) {
		if (!$this->is_allowed('rembuk_stuntings_update', false)) {
			echo json_encode([
				'success' => false,
				'message' => cclang('sorry_you_do_not_have_permission_to_access')
				]);
			exit;
		}

		$this->form_validation->set_rules('rembuk_stunting_year', 'Tahun', 'trim|required|max_length[10]');
		$this->form_validation->set_rules('rembuk_stunting_deskripsi', 'Deskripsi', 'trim|required');
		$this->form_validation->set_rules('rembuk_stuntings_rembuk_stunting_file_name', 'File', 'trim|required');
		
		if ($this->form_validation->run()) {
			$rembuk_stuntings_rembuk_stunting_file_uuid 		= $this->input->post('rembuk_stuntings_rembuk_stunting_file_uuid');
			$rembuk_stuntings_rembuk_stunting_file_default_name = $this->input->post('rembuk_stuntings_rembuk_stunting_file_default_name');
			$rembuk_stuntings_rembuk_stunting_file_name 		= $this->input->post('rembuk_stuntings_rembuk_stunting_file_name');
		
			$save_data = [
				'rembuk_stunting_deskripsi' => $this->input->post('rembuk_stunting_deskripsi'),
				'rembuk_stunting_year' 		=> $this->input->post('rembuk_stunting_year'),
			];
			
			if (!is_dir(FCPATH . '/uploads/rembuk_stuntings/')) {
				mkdir(FCPATH . '/uploads/rembuk_stuntings/');
			}

			if (!empty($rembuk_stuntings_rembuk_stunting_file_uuid)) {
				// $rembuk_stuntings_rembuk_stunting_file_name_copy = date('YmdHis') . '-' . $rembuk_stuntings_rembuk_stunting_file_name;
				$rembuk_stuntings_rembuk_stunting_file_name_copy = date('YmdHis') . '_' . str_replace([' ', '_', ' - ', ' _ ', '. '], '-', $rembuk_stuntings_rembuk_stunting_file_default_name);

				rename(FCPATH . 'uploads/tmp/' . $rembuk_stuntings_rembuk_stunting_file_uuid . '/' . $rembuk_stuntings_rembuk_stunting_file_name, 
						FCPATH . 'uploads/rembuk_stuntings/' . $rembuk_stuntings_rembuk_stunting_file_name_copy);

				if (!is_file(FCPATH . '/uploads/rembuk_stuntings/' . $rembuk_stuntings_rembuk_stunting_file_name_copy)) {
					echo json_encode([
						'success' => false,
						'message' => 'Error uploading file'
						]);
					exit;
				}

				$save_data['rembuk_stunting_file'] = $rembuk_stuntings_rembuk_stunting_file_name_copy;
			}
			
			$save_rembuk_stuntings = $this->model_rembuk_stuntings->change($id, $save_data);

			if ($save_rembuk_stuntings) {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = true;
					$this->data['id'] 	   = $id;
					$this->data['message'] = cclang('success_update_data_stay', [
						anchor('administrator/rembuk_stuntings', ' Go back to list')
					]);
				} else {
					set_message(
						cclang('success_update_data_redirect', [
					]), 'success');

            		$this->data['success'] 	= true;
					$this->data['redirect'] = base_url('administrator/rembuk_stuntings');
				}
			} else {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = false;
					$this->data['message'] = cclang('data_not_change');
				} else {
            		$this->data['success'] 	= false;
            		$this->data['message'] 	= cclang('data_not_change');
					$this->data['redirect'] = base_url('administrator/rembuk_stuntings');
				}
			}
		} else {
			$this->data['success'] 	= false;
			$this->data['message'] 	= 'Opss validation failed';
			$this->data['errors'] 	= $this->form_validation->error_array();
		}

		$this->response($this->data);
	}
	
	/**
	* delete Rembuk Stuntingss
	*
	* @var $id String
	*/
	public function delete($id = null) {
		$this->is_allowed('rembuk_stuntings_delete');

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
            set_message(cclang('has_been_deleted', 'rembuk_stuntings'), 'success');
        } else {
            set_message(cclang('error_delete', 'rembuk_stuntings'), 'error');
        }

		redirect_back();
	}

		/**
	* View view Rembuk Stuntingss
	*
	* @var $id String
	*/
	public function view($id) {
		$this->is_allowed('rembuk_stuntings_view');

		$this->data['rembuk_stuntings'] = $this->model_rembuk_stuntings->join_avaiable()->filter_avaiable()->find($id);

		$this->template->title('Rembuk Stunting Detail');
		$this->render('backend/standart/administrator/rembuk_stuntings/rembuk_stuntings_view', $this->data);
	}
	
	/**
	* delete Rembuk Stuntingss
	*
	* @var $id String
	*/
	private function _remove($id) {
		$rembuk_stuntings = $this->model_rembuk_stuntings->find($id);

		if (!empty($rembuk_stuntings->rembuk_stunting_file)) {
			$path = FCPATH . '/uploads/rembuk_stuntings/' . $rembuk_stuntings->rembuk_stunting_file;

			if (is_file($path)) {
				$delete_file = unlink($path);
			}
		}
		
		return $this->model_rembuk_stuntings->remove($id);
	}
	
	/**
	* Upload Image Rembuk Stuntings	* 
	* @return JSON
	*/
	public function upload_rembuk_stunting_file_file() {
		if (!$this->is_allowed('rembuk_stuntings_add', false)) {
			echo json_encode([
				'success' => false,
				'message' => cclang('sorry_you_do_not_have_permission_to_access')
				]);
			exit;
		}

		$uuid = $this->input->post('qquuid');

		echo $this->upload_file([
			'uuid' 		 	=> $uuid,
			'table_name' 	=> 'rembuk_stuntings',
			'allowed_types' => 'pdf',
		]);
	}

	/**
	* Delete Image Rembuk Stuntings	* 
	* @return JSON
	*/
	public function delete_rembuk_stunting_file_file($uuid) {
		if (!$this->is_allowed('rembuk_stuntings_delete', false)) {
			echo json_encode([
				'success' => false,
				'error' => cclang('sorry_you_do_not_have_permission_to_access')
				]);
			exit;
		}

		echo $this->delete_file([
            'uuid'              => $uuid, 
            'delete_by'         => $this->input->get('by'), 
            'field_name'        => 'rembuk_stunting_file', 
            'upload_path_tmp'   => './uploads/tmp/',
            'table_name'        => 'rembuk_stuntings',
            'primary_key'       => 'rembuk_stunting_id',
            'upload_path'       => 'uploads/rembuk_stuntings/'
        ]);
	}

	/**
	* Get Image Rembuk Stuntings	* 
	* @return JSON
	*/
	public function get_rembuk_stunting_file_file($id) {
		if (!$this->is_allowed('rembuk_stuntings_update', false)) {
			echo json_encode([
				'success' => false,
				'message' => 'Image not loaded, you do not have permission to access'
				]);
			exit;
		}

		$rembuk_stuntings = $this->model_rembuk_stuntings->find($id);

		echo $this->get_file([
            'uuid'              => $id, 
            'delete_by'         => 'id', 
            'field_name'        => 'rembuk_stunting_file', 
            'table_name'        => 'rembuk_stuntings',
            'primary_key'       => 'rembuk_stunting_id',
            'upload_path'       => 'uploads/rembuk_stuntings/',
            'delete_endpoint'   => 'administrator/rembuk_stuntings/delete_rembuk_stunting_file_file'
        ]);
	}
	
	
	/**
	* Export to excel
	*
	* @return Files Excel .xls
	*/
	public function export() {
		$this->is_allowed('rembuk_stuntings_export');

		$this->model_rembuk_stuntings->export(
			'rembuk_stuntings', 
			'rembuk_stuntings',
			$this->model_rembuk_stuntings->field_search
		);
	}

	/**
	* Export to PDF
	*
	* @return Files PDF .pdf
	*/
	public function export_pdf() {
		$this->is_allowed('rembuk_stuntings_export');

		$this->model_rembuk_stuntings->pdf('rembuk_stuntings', 'rembuk_stuntings');
	}


	public function single_pdf($id = null) {
		$this->is_allowed('rembuk_stuntings_export');

		$table = $title = 'rembuk_stuntings';
		$this->load->library('HtmlPdf');
      
        $config = array(
            'orientation' => 'p',
            'format' => 'a4',
            'marges' => array(5, 5, 5, 5)
        );

        $this->pdf = new HtmlPdf($config);
        $this->pdf->setDefaultFont('stsongstdlight'); 

        $result = $this->db->get($table);
       
        $data = $this->model_rembuk_stuntings->find($id);
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


/* End of file rembuk_stuntings.php */
/* Location: ./application/controllers/administrator/Rembuk Stuntings.php */