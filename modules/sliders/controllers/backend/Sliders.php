<?php
defined('BASEPATH') OR exit('No direct script access allowed');


/**
*| --------------------------------------------------------------------------
*| Sliders Controller
*| --------------------------------------------------------------------------
*| Sliders site
*|
*/
class Sliders extends Admin	{
	public function __construct() {
		parent::__construct();

		$this->load->model('model_sliders');
		$this->load->model('group/model_group');
		$this->lang->load('web_lang', $this->current_lang);
	}

	/**
	* show all Sliderss
	*
	* @var $offset String
	*/
	public function index($offset = 0) {
		$this->is_allowed('sliders_list');

		$filter = $this->input->get('q');
		$field 	= $this->input->get('f');

		$this->data['sliderss'] = $this->model_sliders->get($filter, $field, $this->limit_page, $offset);
		$this->data['sliders_counts'] = $this->model_sliders->count_all($filter, $field);

		$config = [
			'base_url'     => 'administrator/sliders/index/',
			'total_rows'   => $this->data['sliders_counts'],
			'per_page'     => $this->limit_page,
			'uri_segment'  => 4,
		];

		$this->data['pagination'] = $this->pagination($config);

		$this->template->title('Sliders List');
		$this->render('backend/standart/administrator/sliders/sliders_list', $this->data);
	}
	
	/**
	* Add new sliderss
	*
	*/
	public function add() {
		$this->is_allowed('sliders_add');

		$this->template->title('Sliders New');
		$this->render('backend/standart/administrator/sliders/sliders_add', $this->data);
	}

	/**
	* Add New Sliderss
	*
	* @return JSON
	*/
	public function add_save() {
		if (!$this->is_allowed('sliders_add', false)) {
			echo json_encode([
				'success' => false,
				'message' => cclang('sorry_you_do_not_have_permission_to_access')
				]);
			exit;
		}

		$this->form_validation->set_rules('sliders_slider_image_name', 'Image', 'trim|required');

		if ($this->form_validation->run()) {
			$sliders_slider_image_uuid = $this->input->post('sliders_slider_image_uuid');
			$sliders_slider_image_name = $this->input->post('sliders_slider_image_name');

			$save_data = [
				'slider_title' 		=> $this->input->post('slider_title'),
				'slider_subtitle' 	=> $this->input->post('slider_subtitle'),
				'slider_url' 		=> $this->input->post('slider_url'),
				'slider_createAt' 	=> date('Y-m-d H:i:s'),
				'slider_user' 		=> $this->session->userdata('id'),
				'slider_status' 	=> '1',
			];
			
			if (!is_dir(FCPATH . '/uploads/sliders/')) {
				mkdir(FCPATH . '/uploads/sliders/');
			}

			if (!empty($sliders_slider_image_name)) {
				$sliders_slider_image_name_copy = date('YmdHis') . '-' . $sliders_slider_image_name;

				rename(FCPATH . 'uploads/tmp/' . $sliders_slider_image_uuid . '/' . $sliders_slider_image_name, 
						FCPATH . 'uploads/sliders/' . $sliders_slider_image_name_copy);

				if (!is_file(FCPATH . '/uploads/sliders/' . $sliders_slider_image_name_copy)) {
					echo json_encode([
						'success' => false,
						'message' => 'Error uploading file'
						]);
					exit;
				}

				$save_data['slider_image'] = $sliders_slider_image_name_copy;
			}

			$save_sliders = $id = $this->model_sliders->store($save_data);

			if ($save_sliders) {
				$id = $save_sliders;

				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = true;
					$this->data['id'] 	   = $save_sliders;
					$this->data['message'] = cclang('success_save_data_stay', [
						anchor('administrator/sliders/edit/' . $save_sliders, 'Edit Sliders'),
						anchor('administrator/sliders', ' Go back to list')
					]);
				} else {
					set_message(
						cclang('success_save_data_redirect', [
						anchor('administrator/sliders/edit/' . $save_sliders, 'Edit Sliders')
					]), 'success');

            		$this->data['success'] = true;
					$this->data['redirect'] = base_url('administrator/sliders');
				}
			} else {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = false;
					$this->data['message'] = cclang('data_not_change');
				} else {
            		$this->data['success'] = false;
            		$this->data['message'] = cclang('data_not_change');
					$this->data['redirect'] = base_url('administrator/sliders');
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
	* Update view Sliderss
	*
	* @var $id String
	*/
	public function edit($id) {
		$this->is_allowed('sliders_update');

		$this->data['sliders'] = $this->model_sliders->find($id);
		$this->template->title('Sliders Update');
		$this->render('backend/standart/administrator/sliders/sliders_update', $this->data);
	}

	/**
	* Update Sliderss
	*
	* @var $id String
	*/
	public function edit_save($id) {
		if (!$this->is_allowed('sliders_update', false)) {
			echo json_encode([
				'success' => false,
				'message' => cclang('sorry_you_do_not_have_permission_to_access')
				]);
			exit;
		}

		$this->form_validation->set_rules('sliders_slider_image_name', 'Image', 'trim|required');
		
		if ($this->form_validation->run()) {
			$sliders_slider_image_uuid = $this->input->post('sliders_slider_image_uuid');
			$sliders_slider_image_name = $this->input->post('sliders_slider_image_name');
		
			$save_data = [
				'slider_title' 		=> $this->input->post('slider_title'),
				'slider_subtitle' 	=> $this->input->post('slider_subtitle'),
				'slider_url' 		=> $this->input->post('slider_url'),
			];
			
			if (!is_dir(FCPATH . '/uploads/sliders/')) {
				mkdir(FCPATH . '/uploads/sliders/');
			}

			if (!empty($sliders_slider_image_uuid)) {
				$sliders_slider_image_name_copy = date('YmdHis') . '-' . $sliders_slider_image_name;

				rename(FCPATH . 'uploads/tmp/' . $sliders_slider_image_uuid . '/' . $sliders_slider_image_name, 
						FCPATH . 'uploads/sliders/' . $sliders_slider_image_name_copy);

				if (!is_file(FCPATH . '/uploads/sliders/' . $sliders_slider_image_name_copy)) {
					echo json_encode([
						'success' => false,
						'message' => 'Error uploading file'
						]);
					exit;
				}

				$save_data['slider_image'] = $sliders_slider_image_name_copy;
			}
			
			$save_sliders = $this->model_sliders->change($id, $save_data);

			if ($save_sliders) {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = true;
					$this->data['id'] 	   = $id;
					$this->data['message'] = cclang('success_update_data_stay', [
						anchor('administrator/sliders', ' Go back to list')
					]);
				} else {
					set_message(
						cclang('success_update_data_redirect', [
					]), 'success');

            		$this->data['success'] = true;
					$this->data['redirect'] = base_url('administrator/sliders');
				}
			} else {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = false;
					$this->data['message'] = cclang('data_not_change');
				} else {
            		$this->data['success'] = false;
            		$this->data['message'] = cclang('data_not_change');
					$this->data['redirect'] = base_url('administrator/sliders');
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
	* delete Sliderss
	*
	* @var $id String
	*/
	public function delete($id = null) {
		$this->is_allowed('sliders_delete');

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
            set_message(cclang('has_been_deleted', 'sliders'), 'success');
        } else {
            set_message(cclang('error_delete', 'sliders'), 'error');
        }

		redirect_back();
	}

		/**
	* View view Sliderss
	*
	* @var $id String
	*/
	public function view($id) {
		$this->is_allowed('sliders_view');

		$this->data['sliders'] = $this->model_sliders->join_avaiable()->filter_avaiable()->find($id);

		$this->template->title('Sliders Detail');
		$this->render('backend/standart/administrator/sliders/sliders_view', $this->data);
	}
	
	/**
	* delete Sliderss
	*
	* @var $id String
	*/
	private function _remove($id) {
		$sliders = $this->model_sliders->find($id);

		if (!empty($sliders->slider_image)) {
			$path = FCPATH . '/uploads/sliders/' . $sliders->slider_image;

			if (is_file($path)) {
				$delete_file = unlink($path);
			}
		}
		
		return $this->model_sliders->remove($id);
	}
	
	/**
	* Upload Image Sliders	* 
	* @return JSON
	*/
	public function upload_slider_image_file() {
		if (!$this->is_allowed('sliders_add', false)) {
			echo json_encode([
				'success' => false,
				'message' => cclang('sorry_you_do_not_have_permission_to_access')
				]);
			exit;
		}

		$uuid = $this->input->post('qquuid');

		echo $this->upload_file([
			'uuid' 		 	=> $uuid,
			'table_name' 	=> 'sliders',
			'allowed_types' => 'jpg|jpeg|png',
		]);
	}

	/**
	* Delete Image Sliders	* 
	* @return JSON
	*/
	public function delete_slider_image_file($uuid) {
		if (!$this->is_allowed('sliders_delete', false)) {
			echo json_encode([
				'success' => false,
				'error' => cclang('sorry_you_do_not_have_permission_to_access')
				]);
			exit;
		}

		echo $this->delete_file([
            'uuid'              => $uuid, 
            'delete_by'         => $this->input->get('by'), 
            'field_name'        => 'slider_image', 
            'upload_path_tmp'   => './uploads/tmp/',
            'table_name'        => 'sliders',
            'primary_key'       => 'slider_id',
            'upload_path'       => 'uploads/sliders/'
        ]);
	}

	/**
	* Get Image Sliders	* 
	* @return JSON
	*/
	public function get_slider_image_file($id) {
		if (!$this->is_allowed('sliders_update', false)) {
			echo json_encode([
				'success' => false,
				'message' => 'Image not loaded, you do not have permission to access'
				]);
			exit;
		}

		$sliders = $this->model_sliders->find($id);

		echo $this->get_file([
            'uuid'              => $id, 
            'delete_by'         => 'id', 
            'field_name'        => 'slider_image', 
            'table_name'        => 'sliders',
            'primary_key'       => 'slider_id',
            'upload_path'       => 'uploads/sliders/',
            'delete_endpoint'   => 'administrator/sliders/delete_slider_image_file'
        ]);
	}
	
	
	/**
	* Export to excel
	*
	* @return Files Excel .xls
	*/
	public function export() {
		$this->is_allowed('sliders_export');

		$this->model_sliders->export(
			'sliders', 
			'sliders',
			$this->model_sliders->field_search
		);
	}

	/**
	* Export to PDF
	*
	* @return Files PDF .pdf
	*/
	public function export_pdf() {
		$this->is_allowed('sliders_export');

		$this->model_sliders->pdf('sliders', 'sliders');
	}

	public function single_pdf($id = null) {
		$this->is_allowed('sliders_export');

		$table = $title = 'sliders';
		$this->load->library('HtmlPdf');
      
        $config = array(
            'orientation' => 'p',
            'format' => 'a4',
            'marges' => array(5, 5, 5, 5)
        );

        $this->pdf = new HtmlPdf($config);
        $this->pdf->setDefaultFont('stsongstdlight'); 

        $result = $this->db->get($table);
       
        $data = $this->model_sliders->find($id);
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

	public function status($id) {
		if (!$this->is_allowed('sliders_status', false)) {
			echo json_encode([
				'success' => false,
				'error' => cclang('sorry_you_do_not_have_permission_to_access')
				]);
			exit;
		}

		$slider = db_get_all_data('sliders', ['slider_id' => $id])[0];
		$status = $slider->slider_status;

		if ($status == 0 || empty($status) || $status == null) {
			$update_status = [
				'slider_status' => '1',
			];
		}else if ($status == 1) {
			$update_status = [
				'slider_status' => '0',
			];
		}

		$save_sliders = $this->model_sliders->change($id, $update_status);

		redirect_back();
	}
}


/* End of file sliders.php */
/* Location: ./application/controllers/administrator/Sliders.php */