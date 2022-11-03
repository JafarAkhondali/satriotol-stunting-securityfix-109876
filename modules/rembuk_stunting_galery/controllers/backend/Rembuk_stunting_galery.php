<?php
defined('BASEPATH') OR exit('No direct script access allowed');


/**
*| --------------------------------------------------------------------------
*| Rembuk Stunting Galery Controller
*| --------------------------------------------------------------------------
*| Rembuk Stunting Galery site
*|
*/
class Rembuk_stunting_galery extends Admin	
{
	
	public function __construct()
	{
		parent::__construct();

		$this->load->model('model_rembuk_stunting_galery');
		$this->load->model('group/model_group');
		$this->lang->load('web_lang', $this->current_lang);
	}

	/**
	* show all Rembuk Stunting Galerys
	*
	* @var $offset String
	*/
	public function index($offset = 0)
	{
		$this->is_allowed('rembuk_stunting_galery_list');

		$filter = $this->input->get('q');
		$field 	= $this->input->get('f');

		$this->data['rembuk_stunting_galerys'] = $this->model_rembuk_stunting_galery->get($filter, $field, $this->limit_page, $offset);
		$this->data['rembuk_stunting_galery_counts'] = $this->model_rembuk_stunting_galery->count_all($filter, $field);

		$config = [
			'base_url'     => 'administrator/rembuk_stunting_galery/index/',
			'total_rows'   => $this->data['rembuk_stunting_galery_counts'],
			'per_page'     => $this->limit_page,
			'uri_segment'  => 4,
		];

		$this->data['pagination'] = $this->pagination($config);

		$this->template->title('Rembuk Stunting Galery List');
		$this->render('backend/standart/administrator/rembuk_stunting_galery/rembuk_stunting_galery_list', $this->data);
	}
	
	/**
	* Add new rembuk_stunting_galerys
	*
	*/
	public function add()
	{
		$this->is_allowed('rembuk_stunting_galery_add');

		$this->template->title('Rembuk Stunting Galery New');
		$this->render('backend/standart/administrator/rembuk_stunting_galery/rembuk_stunting_galery_add', $this->data);
	}

	/**
	* Add New Rembuk Stunting Galerys
	*
	* @return JSON
	*/
	public function add_save()
	{
		if (!$this->is_allowed('rembuk_stunting_galery_add', false)) {
			echo json_encode([
				'success' => false,
				'message' => cclang('sorry_you_do_not_have_permission_to_access')
				]);
			exit;
		}
		
		

		$this->form_validation->set_rules('rembuk_stunting_id', 'Reff Rembuk Stunting', 'trim|required|max_length[11]');
		

		$this->form_validation->set_rules('rembuk_stunting_galery_rembuk_stunting_galery_image_name', 'Gambar', 'trim|required');
		

		

		if ($this->form_validation->run()) {
			$rembuk_stunting_galery_rembuk_stunting_galery_image_uuid = $this->input->post('rembuk_stunting_galery_rembuk_stunting_galery_image_uuid');
			$rembuk_stunting_galery_rembuk_stunting_galery_image_name = $this->input->post('rembuk_stunting_galery_rembuk_stunting_galery_image_name');
		
			$save_data = [
				'rembuk_stunting_id' => $this->input->post('rembuk_stunting_id'),
			];

			
			



			
			if (!is_dir(FCPATH . '/uploads/rembuk_stunting_galery/')) {
				mkdir(FCPATH . '/uploads/rembuk_stunting_galery/');
			}

			if (!empty($rembuk_stunting_galery_rembuk_stunting_galery_image_name)) {
				$rembuk_stunting_galery_rembuk_stunting_galery_image_name_copy = date('YmdHis') . '-' . $rembuk_stunting_galery_rembuk_stunting_galery_image_name;

				rename(FCPATH . 'uploads/tmp/' . $rembuk_stunting_galery_rembuk_stunting_galery_image_uuid . '/' . $rembuk_stunting_galery_rembuk_stunting_galery_image_name, 
						FCPATH . 'uploads/rembuk_stunting_galery/' . $rembuk_stunting_galery_rembuk_stunting_galery_image_name_copy);

				if (!is_file(FCPATH . '/uploads/rembuk_stunting_galery/' . $rembuk_stunting_galery_rembuk_stunting_galery_image_name_copy)) {
					echo json_encode([
						'success' => false,
						'message' => 'Error uploading file'
						]);
					exit;
				}

				$save_data['rembuk_stunting_galery_image'] = $rembuk_stunting_galery_rembuk_stunting_galery_image_name_copy;
			}
		
			
			$save_rembuk_stunting_galery = $id = $this->model_rembuk_stunting_galery->store($save_data);
            

			if ($save_rembuk_stunting_galery) {
				
				
					
				
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = true;
					$this->data['id'] 	   = $save_rembuk_stunting_galery;
					$this->data['message'] = cclang('success_save_data_stay', [
						anchor('administrator/rembuk_stunting_galery/edit/' . $save_rembuk_stunting_galery, 'Edit Rembuk Stunting Galery'),
						anchor('administrator/rembuk_stunting_galery', ' Go back to list')
					]);
				} else {
					set_message(
						cclang('success_save_data_redirect', [
						anchor('administrator/rembuk_stunting_galery/edit/' . $save_rembuk_stunting_galery, 'Edit Rembuk Stunting Galery')
					]), 'success');

            		$this->data['success'] = true;
					$this->data['redirect'] = base_url('administrator/rembuk_stunting_galery');
				}
			} else {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = false;
					$this->data['message'] = cclang('data_not_change');
				} else {
            		$this->data['success'] = false;
            		$this->data['message'] = cclang('data_not_change');
					$this->data['redirect'] = base_url('administrator/rembuk_stunting_galery');
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
	* Update view Rembuk Stunting Galerys
	*
	* @var $id String
	*/
	public function edit($id)
	{
		$this->is_allowed('rembuk_stunting_galery_update');

		$this->data['rembuk_stunting_galery'] = $this->model_rembuk_stunting_galery->find($id);

		$this->template->title('Rembuk Stunting Galery Update');
		$this->render('backend/standart/administrator/rembuk_stunting_galery/rembuk_stunting_galery_update', $this->data);
	}

	/**
	* Update Rembuk Stunting Galerys
	*
	* @var $id String
	*/
	public function edit_save($id)
	{
		if (!$this->is_allowed('rembuk_stunting_galery_update', false)) {
			echo json_encode([
				'success' => false,
				'message' => cclang('sorry_you_do_not_have_permission_to_access')
				]);
			exit;
		}
				$this->form_validation->set_rules('rembuk_stunting_id', 'Reff Rembuk Stunting', 'trim|required|max_length[11]');
		

		$this->form_validation->set_rules('rembuk_stunting_galery_rembuk_stunting_galery_image_name', 'Gambar', 'trim|required');
		

		
		if ($this->form_validation->run()) {
			$rembuk_stunting_galery_rembuk_stunting_galery_image_uuid = $this->input->post('rembuk_stunting_galery_rembuk_stunting_galery_image_uuid');
			$rembuk_stunting_galery_rembuk_stunting_galery_image_name = $this->input->post('rembuk_stunting_galery_rembuk_stunting_galery_image_name');
		
			$save_data = [
				'rembuk_stunting_id' => $this->input->post('rembuk_stunting_id'),
			];

			

			


			
			if (!is_dir(FCPATH . '/uploads/rembuk_stunting_galery/')) {
				mkdir(FCPATH . '/uploads/rembuk_stunting_galery/');
			}

			if (!empty($rembuk_stunting_galery_rembuk_stunting_galery_image_uuid)) {
				$rembuk_stunting_galery_rembuk_stunting_galery_image_name_copy = date('YmdHis') . '-' . $rembuk_stunting_galery_rembuk_stunting_galery_image_name;

				rename(FCPATH . 'uploads/tmp/' . $rembuk_stunting_galery_rembuk_stunting_galery_image_uuid . '/' . $rembuk_stunting_galery_rembuk_stunting_galery_image_name, 
						FCPATH . 'uploads/rembuk_stunting_galery/' . $rembuk_stunting_galery_rembuk_stunting_galery_image_name_copy);

				if (!is_file(FCPATH . '/uploads/rembuk_stunting_galery/' . $rembuk_stunting_galery_rembuk_stunting_galery_image_name_copy)) {
					echo json_encode([
						'success' => false,
						'message' => 'Error uploading file'
						]);
					exit;
				}

				$save_data['rembuk_stunting_galery_image'] = $rembuk_stunting_galery_rembuk_stunting_galery_image_name_copy;
			}
		
			
			$save_rembuk_stunting_galery = $this->model_rembuk_stunting_galery->change($id, $save_data);

			if ($save_rembuk_stunting_galery) {

				

				
				
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = true;
					$this->data['id'] 	   = $id;
					$this->data['message'] = cclang('success_update_data_stay', [
						anchor('administrator/rembuk_stunting_galery', ' Go back to list')
					]);
				} else {
					set_message(
						cclang('success_update_data_redirect', [
					]), 'success');

            		$this->data['success'] = true;
					$this->data['redirect'] = base_url('administrator/rembuk_stunting_galery');
				}
			} else {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = false;
					$this->data['message'] = cclang('data_not_change');
				} else {
            		$this->data['success'] = false;
            		$this->data['message'] = cclang('data_not_change');
					$this->data['redirect'] = base_url('administrator/rembuk_stunting_galery');
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
	* delete Rembuk Stunting Galerys
	*
	* @var $id String
	*/
	public function delete($id = null)
	{
		$this->is_allowed('rembuk_stunting_galery_delete');

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
            set_message(cclang('has_been_deleted', 'rembuk_stunting_galery'), 'success');
        } else {
            set_message(cclang('error_delete', 'rembuk_stunting_galery'), 'error');
        }

		redirect_back();
	}

		/**
	* View view Rembuk Stunting Galerys
	*
	* @var $id String
	*/
	public function view($id)
	{
		$this->is_allowed('rembuk_stunting_galery_view');

		$this->data['rembuk_stunting_galery'] = $this->model_rembuk_stunting_galery->join_avaiable()->filter_avaiable()->find($id);

		$this->template->title('Rembuk Stunting Galery Detail');
		$this->render('backend/standart/administrator/rembuk_stunting_galery/rembuk_stunting_galery_view', $this->data);
	}
	
	/**
	* delete Rembuk Stunting Galerys
	*
	* @var $id String
	*/
	private function _remove($id)
	{
		$rembuk_stunting_galery = $this->model_rembuk_stunting_galery->find($id);

		if (!empty($rembuk_stunting_galery->rembuk_stunting_galery_image)) {
			$path = FCPATH . '/uploads/rembuk_stunting_galery/' . $rembuk_stunting_galery->rembuk_stunting_galery_image;

			if (is_file($path)) {
				$delete_file = unlink($path);
			}
		}
		
		
		return $this->model_rembuk_stunting_galery->remove($id);
	}
	
	/**
	* Upload Image Rembuk Stunting Galery	* 
	* @return JSON
	*/
	public function upload_rembuk_stunting_galery_image_file()
	{
		if (!$this->is_allowed('rembuk_stunting_galery_add', false)) {
			echo json_encode([
				'success' => false,
				'message' => cclang('sorry_you_do_not_have_permission_to_access')
				]);
			exit;
		}

		$uuid = $this->input->post('qquuid');

		echo $this->upload_file([
			'uuid' 		 	=> $uuid,
			'table_name' 	=> 'rembuk_stunting_galery',
		]);
	}

	/**
	* Delete Image Rembuk Stunting Galery	* 
	* @return JSON
	*/
	public function delete_rembuk_stunting_galery_image_file($uuid)
	{
		if (!$this->is_allowed('rembuk_stunting_galery_delete', false)) {
			echo json_encode([
				'success' => false,
				'error' => cclang('sorry_you_do_not_have_permission_to_access')
				]);
			exit;
		}

		echo $this->delete_file([
            'uuid'              => $uuid, 
            'delete_by'         => $this->input->get('by'), 
            'field_name'        => 'rembuk_stunting_galery_image', 
            'upload_path_tmp'   => './uploads/tmp/',
            'table_name'        => 'rembuk_stunting_galery',
            'primary_key'       => 'rembuk_stunting_galery_id',
            'upload_path'       => 'uploads/rembuk_stunting_galery/'
        ]);
	}

	/**
	* Get Image Rembuk Stunting Galery	* 
	* @return JSON
	*/
	public function get_rembuk_stunting_galery_image_file($id)
	{
		if (!$this->is_allowed('rembuk_stunting_galery_update', false)) {
			echo json_encode([
				'success' => false,
				'message' => 'Image not loaded, you do not have permission to access'
				]);
			exit;
		}

		$rembuk_stunting_galery = $this->model_rembuk_stunting_galery->find($id);

		echo $this->get_file([
            'uuid'              => $id, 
            'delete_by'         => 'id', 
            'field_name'        => 'rembuk_stunting_galery_image', 
            'table_name'        => 'rembuk_stunting_galery',
            'primary_key'       => 'rembuk_stunting_galery_id',
            'upload_path'       => 'uploads/rembuk_stunting_galery/',
            'delete_endpoint'   => 'administrator/rembuk_stunting_galery/delete_rembuk_stunting_galery_image_file'
        ]);
	}
	
	
	/**
	* Export to excel
	*
	* @return Files Excel .xls
	*/
	public function export()
	{
		$this->is_allowed('rembuk_stunting_galery_export');

		$this->model_rembuk_stunting_galery->export(
			'rembuk_stunting_galery', 
			'rembuk_stunting_galery',
			$this->model_rembuk_stunting_galery->field_search
		);
	}

	/**
	* Export to PDF
	*
	* @return Files PDF .pdf
	*/
	public function export_pdf()
	{
		$this->is_allowed('rembuk_stunting_galery_export');

		$this->model_rembuk_stunting_galery->pdf('rembuk_stunting_galery', 'rembuk_stunting_galery');
	}


	public function single_pdf($id = null)
	{
		$this->is_allowed('rembuk_stunting_galery_export');

		$table = $title = 'rembuk_stunting_galery';
		$this->load->library('HtmlPdf');
      
        $config = array(
            'orientation' => 'p',
            'format' => 'a4',
            'marges' => array(5, 5, 5, 5)
        );

        $this->pdf = new HtmlPdf($config);
        $this->pdf->setDefaultFont('stsongstdlight'); 

        $result = $this->db->get($table);
       
        $data = $this->model_rembuk_stunting_galery->find($id);
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

	public function ajax_rembuk_stunting_id($id = null)
	{
		if (!$this->is_allowed('rembuk_stunting_galery_list', false)) {
			echo json_encode([
				'success' => false,
				'message' => cclang('sorry_you_do_not_have_permission_to_access')
				]);
			exit;
		}
		$results = db_get_all_data('rembuk_stuntings', ['rembuk_stunting_id' => $id]);
		$this->response($results);	
	}

	
}


/* End of file rembuk_stunting_galery.php */
/* Location: ./application/controllers/administrator/Rembuk Stunting Galery.php */