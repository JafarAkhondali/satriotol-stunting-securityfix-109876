<?php
defined('BASEPATH') OR exit('No direct script access allowed');


/**
*| --------------------------------------------------------------------------
*| Policies Controller
*| --------------------------------------------------------------------------
*| Policies site
*|
*/
class Policies extends Admin	
{
	
	public function __construct()
	{
		parent::__construct();

		$this->load->model('model_policies');
		$this->load->model('group/model_group');
		$this->lang->load('web_lang', $this->current_lang);
	}

	/**
	* show all Policiess
	*
	* @var $offset String
	*/
	public function index($offset = 0)
	{
		$this->is_allowed('policies_list');

		$filter = $this->input->get('q');
		$field 	= $this->input->get('f');

		$this->data['policiess'] = $this->model_policies->get($filter, $field, $this->limit_page, $offset);
		$this->data['policies_counts'] = $this->model_policies->count_all($filter, $field);

		$config = [
			'base_url'     => 'administrator/policies/index/',
			'total_rows'   => $this->data['policies_counts'],
			'per_page'     => $this->limit_page,
			'uri_segment'  => 4,
		];

		$this->data['pagination'] = $this->pagination($config);

		$this->template->title('Policies List');
		$this->render('backend/standart/administrator/policies/policies_list', $this->data);
	}
	
	/**
	* Add new policiess
	*
	*/
	public function add()
	{
		$this->is_allowed('policies_add');

		$this->template->title('Policies New');
		$this->render('backend/standart/administrator/policies/policies_add', $this->data);
	}

	/**
	* Add New Policiess
	*
	* @return JSON
	*/
	public function add_save()
	{
		if (!$this->is_allowed('policies_add', false)) {
			echo json_encode([
				'success' => false,
				'message' => cclang('sorry_you_do_not_have_permission_to_access')
				]);
			exit;
		}
		
		

		$this->form_validation->set_rules('policies_year', 'Tahun', 'trim|required|max_length[4]');
		

		$this->form_validation->set_rules('policies_policies_file_name', 'Upload File', 'trim|required');
		

		

		if ($this->form_validation->run()) {
			$policies_policies_file_uuid = $this->input->post('policies_policies_file_uuid');
			$policies_policies_file_name = $this->input->post('policies_policies_file_name');
		
			$save_data = [
				'policies_year' => $this->input->post('policies_year'),
			];

			
			



			
			if (!is_dir(FCPATH . '/uploads/policies/')) {
				mkdir(FCPATH . '/uploads/policies/');
			}

			if (!empty($policies_policies_file_name)) {
				$policies_policies_file_name_copy = date('YmdHis') . '-' . $policies_policies_file_name;

				rename(FCPATH . 'uploads/tmp/' . $policies_policies_file_uuid . '/' . $policies_policies_file_name, 
						FCPATH . 'uploads/policies/' . $policies_policies_file_name_copy);

				if (!is_file(FCPATH . '/uploads/policies/' . $policies_policies_file_name_copy)) {
					echo json_encode([
						'success' => false,
						'message' => 'Error uploading file'
						]);
					exit;
				}

				$save_data['policies_file'] = $policies_policies_file_name_copy;
			}
		
			
			$save_policies = $id = $this->model_policies->store($save_data);
            

			if ($save_policies) {
				
				
					
				
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = true;
					$this->data['id'] 	   = $save_policies;
					$this->data['message'] = cclang('success_save_data_stay', [
						anchor('administrator/policies/edit/' . $save_policies, 'Edit Policies'),
						anchor('administrator/policies', ' Go back to list')
					]);
				} else {
					set_message(
						cclang('success_save_data_redirect', [
						anchor('administrator/policies/edit/' . $save_policies, 'Edit Policies')
					]), 'success');

            		$this->data['success'] = true;
					$this->data['redirect'] = base_url('administrator/policies');
				}
			} else {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = false;
					$this->data['message'] = cclang('data_not_change');
				} else {
            		$this->data['success'] = false;
            		$this->data['message'] = cclang('data_not_change');
					$this->data['redirect'] = base_url('administrator/policies');
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
	* Update view Policiess
	*
	* @var $id String
	*/
	public function edit($id)
	{
		$this->is_allowed('policies_update');

		$this->data['policies'] = $this->model_policies->find($id);

		$this->template->title('Policies Update');
		$this->render('backend/standart/administrator/policies/policies_update', $this->data);
	}

	/**
	* Update Policiess
	*
	* @var $id String
	*/
	public function edit_save($id)
	{
		if (!$this->is_allowed('policies_update', false)) {
			echo json_encode([
				'success' => false,
				'message' => cclang('sorry_you_do_not_have_permission_to_access')
				]);
			exit;
		}
				$this->form_validation->set_rules('policies_year', 'Tahun', 'trim|required|max_length[4]');
		

		$this->form_validation->set_rules('policies_policies_file_name', 'Upload File', 'trim|required');
		

		
		if ($this->form_validation->run()) {
			$policies_policies_file_uuid = $this->input->post('policies_policies_file_uuid');
			$policies_policies_file_name = $this->input->post('policies_policies_file_name');
		
			$save_data = [
				'policies_year' => $this->input->post('policies_year'),
			];

			

			


			
			if (!is_dir(FCPATH . '/uploads/policies/')) {
				mkdir(FCPATH . '/uploads/policies/');
			}

			if (!empty($policies_policies_file_uuid)) {
				$policies_policies_file_name_copy = date('YmdHis') . '-' . $policies_policies_file_name;

				rename(FCPATH . 'uploads/tmp/' . $policies_policies_file_uuid . '/' . $policies_policies_file_name, 
						FCPATH . 'uploads/policies/' . $policies_policies_file_name_copy);

				if (!is_file(FCPATH . '/uploads/policies/' . $policies_policies_file_name_copy)) {
					echo json_encode([
						'success' => false,
						'message' => 'Error uploading file'
						]);
					exit;
				}

				$save_data['policies_file'] = $policies_policies_file_name_copy;
			}
		
			
			$save_policies = $this->model_policies->change($id, $save_data);

			if ($save_policies) {

				

				
				
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = true;
					$this->data['id'] 	   = $id;
					$this->data['message'] = cclang('success_update_data_stay', [
						anchor('administrator/policies', ' Go back to list')
					]);
				} else {
					set_message(
						cclang('success_update_data_redirect', [
					]), 'success');

            		$this->data['success'] = true;
					$this->data['redirect'] = base_url('administrator/policies');
				}
			} else {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = false;
					$this->data['message'] = cclang('data_not_change');
				} else {
            		$this->data['success'] = false;
            		$this->data['message'] = cclang('data_not_change');
					$this->data['redirect'] = base_url('administrator/policies');
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
	* delete Policiess
	*
	* @var $id String
	*/
	public function delete($id = null)
	{
		$this->is_allowed('policies_delete');

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
            set_message(cclang('has_been_deleted', 'policies'), 'success');
        } else {
            set_message(cclang('error_delete', 'policies'), 'error');
        }

		redirect_back();
	}

		/**
	* View view Policiess
	*
	* @var $id String
	*/
	public function view($id)
	{
		$this->is_allowed('policies_view');

		$this->data['policies'] = $this->model_policies->join_avaiable()->filter_avaiable()->find($id);

		$this->template->title('Policies Detail');
		$this->render('backend/standart/administrator/policies/policies_view', $this->data);
	}
	
	/**
	* delete Policiess
	*
	* @var $id String
	*/
	private function _remove($id)
	{
		$policies = $this->model_policies->find($id);

		if (!empty($policies->policies_file)) {
			$path = FCPATH . '/uploads/policies/' . $policies->policies_file;

			if (is_file($path)) {
				$delete_file = unlink($path);
			}
		}
		
		
		return $this->model_policies->remove($id);
	}
	
	/**
	* Upload Image Policies	* 
	* @return JSON
	*/
	public function upload_policies_file_file()
	{
		if (!$this->is_allowed('policies_add', false)) {
			echo json_encode([
				'success' => false,
				'message' => cclang('sorry_you_do_not_have_permission_to_access')
				]);
			exit;
		}

		$uuid = $this->input->post('qquuid');

		echo $this->upload_file([
			'uuid' 		 	=> $uuid,
			'table_name' 	=> 'policies',
		]);
	}

	/**
	* Delete Image Policies	* 
	* @return JSON
	*/
	public function delete_policies_file_file($uuid)
	{
		if (!$this->is_allowed('policies_delete', false)) {
			echo json_encode([
				'success' => false,
				'error' => cclang('sorry_you_do_not_have_permission_to_access')
				]);
			exit;
		}

		echo $this->delete_file([
            'uuid'              => $uuid, 
            'delete_by'         => $this->input->get('by'), 
            'field_name'        => 'policies_file', 
            'upload_path_tmp'   => './uploads/tmp/',
            'table_name'        => 'policies',
            'primary_key'       => 'policies_id',
            'upload_path'       => 'uploads/policies/'
        ]);
	}

	/**
	* Get Image Policies	* 
	* @return JSON
	*/
	public function get_policies_file_file($id)
	{
		if (!$this->is_allowed('policies_update', false)) {
			echo json_encode([
				'success' => false,
				'message' => 'Image not loaded, you do not have permission to access'
				]);
			exit;
		}

		$policies = $this->model_policies->find($id);

		echo $this->get_file([
            'uuid'              => $id, 
            'delete_by'         => 'id', 
            'field_name'        => 'policies_file', 
            'table_name'        => 'policies',
            'primary_key'       => 'policies_id',
            'upload_path'       => 'uploads/policies/',
            'delete_endpoint'   => 'administrator/policies/delete_policies_file_file'
        ]);
	}
	
	
	/**
	* Export to excel
	*
	* @return Files Excel .xls
	*/
	public function export()
	{
		$this->is_allowed('policies_export');

		$this->model_policies->export(
			'policies', 
			'policies',
			$this->model_policies->field_search
		);
	}

	/**
	* Export to PDF
	*
	* @return Files PDF .pdf
	*/
	public function export_pdf()
	{
		$this->is_allowed('policies_export');

		$this->model_policies->pdf('policies', 'policies');
	}


	public function single_pdf($id = null)
	{
		$this->is_allowed('policies_export');

		$table = $title = 'policies';
		$this->load->library('HtmlPdf');
      
        $config = array(
            'orientation' => 'p',
            'format' => 'a4',
            'marges' => array(5, 5, 5, 5)
        );

        $this->pdf = new HtmlPdf($config);
        $this->pdf->setDefaultFont('stsongstdlight'); 

        $result = $this->db->get($table);
       
        $data = $this->model_policies->find($id);
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


/* End of file policies.php */
/* Location: ./application/controllers/administrator/Policies.php */