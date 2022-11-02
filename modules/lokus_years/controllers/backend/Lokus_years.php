<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
*| --------------------------------------------------------------------------
*| Lokus Years Controller
*| --------------------------------------------------------------------------
*| Lokus Years site
*|
*/
class Lokus_years extends Admin {
	public function __construct() {
		parent::__construct();

		$this->load->model('model_lokus_years');
		$this->load->model('group/model_group');
		$this->lang->load('web_lang', $this->current_lang);
	}

	/**
	* show all Lokus Yearss
	*
	* @var $offset String
	*/
	public function index($offset = 0) {
		$this->is_allowed('lokus_years_list');

		$filter = $this->input->get('q');
		$field 	= $this->input->get('f');

		$this->data['lokus_yearss'] = $this->model_lokus_years->get($filter, $field, $this->limit_page, $offset);
		$this->data['lokus_years_counts'] = $this->model_lokus_years->count_all($filter, $field);

		$config = [
			'base_url'     => 'administrator/lokus_years/index/',
			'total_rows'   => $this->data['lokus_years_counts'],
			'per_page'     => $this->limit_page,
			'uri_segment'  => 4,
		];

		$this->data['pagination'] = $this->pagination($config);

		$this->template->title('Tahun Lokus List');
		$this->render('backend/standart/administrator/lokus_years/lokus_years_list', $this->data);
	}
	
	/**
	* Add new lokus_yearss
	*
	*/
	public function add() {
		$this->is_allowed('lokus_years_add');

		$this->template->title('Tahun Lokus New');
		$this->render('backend/standart/administrator/lokus_years/lokus_years_add', $this->data);
	}

	/**
	* Add New Lokus Yearss
	*
	* @return JSON
	*/
	public function add_save() {
		if (!$this->is_allowed('lokus_years_add', false)) {
			echo json_encode([
				'success' => false,
				'message' => cclang('sorry_you_do_not_have_permission_to_access')
				]);

			exit;
		}

		$this->form_validation->set_rules('lokus_year_nama', 'Tahun Lokus', 'trim|required|max_length[255]');
		$this->form_validation->set_rules('lokus_years_lokus_year_file_name', 'File Lokus', 'trim|required');

		if ($this->form_validation->run()) {
			$lokus_years_lokus_year_file_uuid = $this->input->post('lokus_years_lokus_year_file_uuid');
			$lokus_years_lokus_year_file_name = $this->input->post('lokus_years_lokus_year_file_name');
		
			$save_data = [
				'lokus_year_nama' 		=> $this->input->post('lokus_year_nama'),
				'lokus_year_create_at' 	=> date('Y-m-d H:i:s'),
				'lokus_year_user' 		=> get_user_data('id'),
			];
			
			if (!is_dir(FCPATH . '/uploads/lokus_years/')) {
				mkdir(FCPATH . '/uploads/lokus_years/');
			}

			if (!empty($lokus_years_lokus_year_file_name)) {
				$lokus_years_lokus_year_file_name_copy = date('YmdHis') . '-' . $lokus_years_lokus_year_file_name;

				rename(FCPATH . 'uploads/tmp/' . $lokus_years_lokus_year_file_uuid . '/' . $lokus_years_lokus_year_file_name, 
						FCPATH . 'uploads/lokus_years/' . $lokus_years_lokus_year_file_name_copy);

				if (!is_file(FCPATH . '/uploads/lokus_years/' . $lokus_years_lokus_year_file_name_copy)) {
					echo json_encode([
						'success' => false,
						'message' => 'Error uploading file'
						]);
					exit;
				}

				$save_data['lokus_year_file'] = $lokus_years_lokus_year_file_name_copy;
			}

			$save_lokus_years = $id = $this->model_lokus_years->store($save_data);

			if ($save_lokus_years) {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = true;
					$this->data['id'] 	   = $save_lokus_years;
					$this->data['message'] = cclang('success_save_data_stay', [
						anchor('administrator/lokus_years/edit/' . $save_lokus_years, 'Edit Lokus Years'),
						anchor('administrator/lokus_years', ' Go back to list')
					]);
				} else {
					set_message(
						cclang('success_save_data_redirect', [
						anchor('administrator/lokus_years/edit/' . $save_lokus_years, 'Edit Lokus Years')
					]), 'success');

            		$this->data['success'] = true;
					$this->data['redirect'] = base_url('administrator/lokus_years');
				}
			} else {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = false;
					$this->data['message'] = cclang('data_not_change');
				} else {
            		$this->data['success'] = false;
            		$this->data['message'] = cclang('data_not_change');
					$this->data['redirect'] = base_url('administrator/lokus_years');
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
	* Update view Lokus Yearss
	*
	* @var $id String
	*/
	public function edit($id) {
		$this->is_allowed('lokus_years_update');

		$this->data['lokus_years'] = $this->model_lokus_years->find($id);

		$this->template->title('Tahun Lokus Update');
		$this->render('backend/standart/administrator/lokus_years/lokus_years_update', $this->data);
	}

	/**
	* Update Lokus Yearss
	*
	* @var $id String
	*/
	public function edit_save($id) {
		if (!$this->is_allowed('lokus_years_update', false)) {
			echo json_encode([
				'success' => false,
				'message' => cclang('sorry_you_do_not_have_permission_to_access')
				]);
			exit;
		}

		$this->form_validation->set_rules('lokus_year_nama', 'Tahun Lokus', 'trim|required|max_length[255]');
		$this->form_validation->set_rules('lokus_years_lokus_year_file_name', 'File Lokus', 'trim|required');
		
		if ($this->form_validation->run()) {
			$lokus_years_lokus_year_file_uuid = $this->input->post('lokus_years_lokus_year_file_uuid');
			$lokus_years_lokus_year_file_name = $this->input->post('lokus_years_lokus_year_file_name');
		
			$save_data = [
				'lokus_year_nama' => $this->input->post('lokus_year_nama'),
			];
			
			if (!is_dir(FCPATH . '/uploads/lokus_years/')) {
				mkdir(FCPATH . '/uploads/lokus_years/');
			}

			if (!empty($lokus_years_lokus_year_file_uuid)) {
				$lokus_years_lokus_year_file_name_copy = date('YmdHis') . '-' . $lokus_years_lokus_year_file_name;

				rename(FCPATH . 'uploads/tmp/' . $lokus_years_lokus_year_file_uuid . '/' . $lokus_years_lokus_year_file_name, 
						FCPATH . 'uploads/lokus_years/' . $lokus_years_lokus_year_file_name_copy);

				if (!is_file(FCPATH . '/uploads/lokus_years/' . $lokus_years_lokus_year_file_name_copy)) {
					echo json_encode([
						'success' => false,
						'message' => 'Error uploading file'
						]);
					exit;
				}

				$save_data['lokus_year_file'] = $lokus_years_lokus_year_file_name_copy;
			}
			
			$save_lokus_years = $this->model_lokus_years->change($id, $save_data);

			if ($save_lokus_years) {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = true;
					$this->data['id'] 	   = $id;
					$this->data['message'] = cclang('success_update_data_stay', [
						anchor('administrator/lokus_years', ' Go back to list')
					]);
				} else {
					set_message(
						cclang('success_update_data_redirect', [
					]), 'success');

            		$this->data['success'] = true;
					$this->data['redirect'] = base_url('administrator/lokus_years');
				}
			} else {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = false;
					$this->data['message'] = cclang('data_not_change');
				} else {
            		$this->data['success'] = false;
            		$this->data['message'] = cclang('data_not_change');
					$this->data['redirect'] = base_url('administrator/lokus_years');
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
	* delete Lokus Yearss
	*
	* @var $id String
	*/
	public function delete($id = null) {
		$this->is_allowed('lokus_years_delete');

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
            set_message(cclang('has_been_deleted', 'lokus_years'), 'success');
        } else {
            set_message(cclang('error_delete', 'lokus_years'), 'error');
        }

		redirect_back();
	}

		/**
	* View view Lokus Yearss
	*
	* @var $id String
	*/
	public function view($id) {
		$this->is_allowed('lokus_years_view');

		$this->data['lokus_years'] = $this->model_lokus_years->join_avaiable()->filter_avaiable()->find($id);

		$this->template->title('Tahun Lokus Detail');
		$this->render('backend/standart/administrator/lokus_years/lokus_years_view', $this->data);
	}
	
	/**
	* delete Lokus Yearss
	*
	* @var $id String
	*/
	private function _remove($id) {
		$lokus_years = $this->model_lokus_years->find($id);

		if (!empty($lokus_years->lokus_year_file)) {
			$path = FCPATH . '/uploads/lokus_years/' . $lokus_years->lokus_year_file;

			if (is_file($path)) {
				$delete_file = unlink($path);
			}
		}
		
		
		return $this->model_lokus_years->remove($id);
	}
	
	/**
	* Upload Image Lokus Years	* 
	* @return JSON
	*/
	public function upload_lokus_year_file_file() {
		if (!$this->is_allowed('lokus_years_add', false)) {
			echo json_encode([
				'success' => false,
				'message' => cclang('sorry_you_do_not_have_permission_to_access')
				]);
			exit;
		}

		$uuid = $this->input->post('qquuid');

		echo $this->upload_file([
			'uuid' 		 	=> $uuid,
			'table_name' 	=> 'lokus_years',
			'allowed_types' => 'pdf',
		]);
	}

	/**
	* Delete Image Lokus Years	* 
	* @return JSON
	*/
	public function delete_lokus_year_file_file($uuid) {
		if (!$this->is_allowed('lokus_years_delete', false)) {
			echo json_encode([
				'success' => false,
				'error' => cclang('sorry_you_do_not_have_permission_to_access')
				]);
			exit;
		}

		echo $this->delete_file([
            'uuid'              => $uuid, 
            'delete_by'         => $this->input->get('by'), 
            'field_name'        => 'lokus_year_file', 
            'upload_path_tmp'   => './uploads/tmp/',
            'table_name'        => 'lokus_years',
            'primary_key'       => 'lokus_year_id',
            'upload_path'       => 'uploads/lokus_years/'
        ]);
	}

	/**
	* Get Image Lokus Years	* 
	* @return JSON
	*/
	public function get_lokus_year_file_file($id) {
		if (!$this->is_allowed('lokus_years_update', false)) {
			echo json_encode([
				'success' => false,
				'message' => 'Image not loaded, you do not have permission to access'
				]);
			exit;
		}

		$lokus_years = $this->model_lokus_years->find($id);

		echo $this->get_file([
            'uuid'              => $id, 
            'delete_by'         => 'id', 
            'field_name'        => 'lokus_year_file', 
            'table_name'        => 'lokus_years',
            'primary_key'       => 'lokus_year_id',
            'upload_path'       => 'uploads/lokus_years/',
            'delete_endpoint'   => 'administrator/lokus_years/delete_lokus_year_file_file'
        ]);
	}
	
	/**
	* Export to excel
	*
	* @return Files Excel .xls
	*/
	public function export() {
		$this->is_allowed('lokus_years_export');

		$this->model_lokus_years->export(
			'lokus_years', 
			'lokus_years',
			$this->model_lokus_years->field_search
		);
	}

	/**
	* Export to PDF
	*
	* @return Files PDF .pdf
	*/
	public function export_pdf() {
		$this->is_allowed('lokus_years_export');

		$this->model_lokus_years->pdf('lokus_years', 'lokus_years');
	}

	public function single_pdf($id = null) {
		$this->is_allowed('lokus_years_export');

		$table = $title = 'lokus_years';
		$this->load->library('HtmlPdf');
      
        $config = array(
            'orientation' => 'p',
            'format' => 'a4',
            'marges' => array(5, 5, 5, 5)
        );

        $this->pdf = new HtmlPdf($config);
        $this->pdf->setDefaultFont('stsongstdlight'); 

        $result = $this->db->get($table);

        $data = $this->model_lokus_years->find($id);
        $fields = $result->list_fields();

        $content = $this->pdf->loadHtmlPdf('core_template/pdf/pdf_single', [
            'data' 		=> $data,
            'fields' 	=> $fields,
            'title' 	=> $title
        ], TRUE);

        $this->pdf->initialize($config);
        $this->pdf->pdf->SetDisplayMode('fullpage');
        $this->pdf->writeHTML($content);
        $this->pdf->Output($table.'.pdf', 'H');
	}
	
}


/* End of file lokus_years.php */
/* Location: ./application/controllers/administrator/Lokus Years.php */