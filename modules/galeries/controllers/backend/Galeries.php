<?php
defined('BASEPATH') OR exit('No direct script access allowed');


/**
*| --------------------------------------------------------------------------
*| Galeries Controller
*| --------------------------------------------------------------------------
*| Galeries site
*|
*/
class Galeries extends Admin {
	
	public function __construct() {
		parent::__construct();

		$this->load->model('model_galeries');
		$this->load->model('group/model_group');
		$this->lang->load('web_lang', $this->current_lang);
	}

	/**
	* show all Galeriess
	*
	* @var $offset String
	*/
	public function index($offset = 0) {
		$this->is_allowed('galeries_list');

		$filter = $this->input->get('q');
		$field 	= $this->input->get('f');

		$this->data['galeriess'] = $this->model_galeries->get($filter, $field, $this->limit_page, $offset);
		$this->data['galeries_counts'] = $this->model_galeries->count_all($filter, $field);

		$config = [
			'base_url'     => 'administrator/galeries/index/',
			'total_rows'   => $this->data['galeries_counts'],
			'per_page'     => $this->limit_page,
			'uri_segment'  => 4,
		];

		$this->data['pagination'] = $this->pagination($config);

		$this->template->title('Galeri List');
		$this->render('backend/standart/administrator/galeries/galeries_list', $this->data);
	}
	
	/**
	* Add new galeriess
	*
	*/
	public function add() {
		$this->is_allowed('galeries_add');

		$this->template->title('Galeri New');
		$this->render('backend/standart/administrator/galeries/galeries_add', $this->data);
	}

	/**
	* Add New Galeriess
	*
	* @return JSON
	*/
	public function add_save() {
		if (!$this->is_allowed('galeries_add', false)) {
			echo json_encode([
				'success' => false,
				'message' => cclang('sorry_you_do_not_have_permission_to_access')
				]);
			exit;
		}

		$galeries_galery_type 		= $this->input->post('galery_type');

		$this->form_validation->set_rules('galery_name', 'Judul Galeri', 'trim|required|max_length[255]');
		$this->form_validation->set_rules('galery_type', 'Type', 'trim|required');

		// if ($galeries_galery_type == '1') {
		// 	$this->form_validation->set_rules('galeries_galery_media_name', 'Media', 'trim|required');
		// }elseif ($galeries_galery_type == '2') {
		// 	$this->form_validation->set_rules('galery_embed_YT', 'Media', 'trim|required');
		// }

		if ($this->form_validation->run()) {
			$galeries_galery_media_uuid = $this->input->post('galeries_galery_media_uuid');
			$galeries_galery_media_name = $this->input->post('galeries_galery_media_name');

			$save_data = [
				'galery_name' 		=> $this->input->post('galery_name'),
				'galery_type' 		=> $galeries_galery_type,
				'galery_create_at' 	=> date('Y-m-d H:i:s'),
				'galery_user' 		=> get_user_data('id'),
				'galery_status' 	=> '1',
			];

			if ($galeries_galery_type == '1') {
				if (!is_dir(FCPATH . '/uploads/galeries/')) {
					mkdir(FCPATH . '/uploads/galeries/');
				}
	
				if (!empty($galeries_galery_media_name)) {
					$galeries_galery_media_name_copy = date('YmdHis') . '-' . $galeries_galery_media_name;
	
					rename(FCPATH . 'uploads/tmp/' . $galeries_galery_media_uuid . '/' . $galeries_galery_media_name, 
							FCPATH . 'uploads/galeries/' . $galeries_galery_media_name_copy);
	
					if (!is_file(FCPATH . '/uploads/galeries/' . $galeries_galery_media_name_copy)) {
						echo json_encode([
							'success' => false,
							'message' => 'Error uploading file'
							]);
						exit;
					}
	
					$save_data['galery_media'] = $galeries_galery_media_name_copy;
				}
			}else{
				$save_data['galery_media'] = $this->input->post('galery_embed_YT');
			}

			$save_galeries = $id = $this->model_galeries->store($save_data);

			if ($save_galeries) {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = true;
					$this->data['id'] 	   = $save_galeries;
					$this->data['message'] = cclang('success_save_data_stay', [
						anchor('administrator/galeries/edit/' . $save_galeries, 'Edit Galeries'),
						anchor('administrator/galeries', ' Go back to list')
					]);
				} else {
					set_message(
						cclang('success_save_data_redirect', [
						anchor('administrator/galeries/edit/' . $save_galeries, 'Edit Galeries')
					]), 'success');

					$this->data['success'] 	= true;
					$this->data['redirect'] = base_url('administrator/galeries');
				}
			} else {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = false;
					$this->data['message'] = cclang('data_not_change');
				} else {
					$this->data['success'] 	= false;
					$this->data['message'] 	= cclang('data_not_change');
					$this->data['redirect'] = base_url('administrator/galeries');
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
	* Update view Galeriess
	*
	* @var $id String
	*/
	public function edit($id) {
		$this->is_allowed('galeries_update');

		$this->data['galeries'] = $this->model_galeries->find($id);

		$this->template->title('Galeri Update');
		$this->render('backend/standart/administrator/galeries/galeries_update', $this->data);
	}

	/**
	* Update Galeriess
	*
	* @var $id String
	*/
	public function edit_save($id) {
		if (!$this->is_allowed('galeries_update', false)) {
			echo json_encode([
				'success' => false,
				'message' => cclang('sorry_you_do_not_have_permission_to_access')
				]);
			exit;
		}

		$galeries_galery_type = $this->input->post('galery_type');

		$this->form_validation->set_rules('galery_name', 'Judul Galeri', 'trim|required|max_length[255]');
		$this->form_validation->set_rules('galery_type', 'Type', 'trim|required');
		$this->form_validation->set_rules('galery_status', 'Status', 'trim|required');

		if ($galeries_galery_type == '1') {
			$this->form_validation->set_rules('galeries_galery_media_name', 'Media', 'trim|required');
		}elseif ($galeries_galery_type == '2') {
			$this->form_validation->set_rules('galery_media_name', 'Media', 'trim|required');
		}

		if ($this->form_validation->run()) {
			$galeries_galery_media_uuid = $this->input->post('galeries_galery_media_uuid');
			$galeries_galery_media_name = $this->input->post('galeries_galery_media_name');
		
			$save_data = [
				'galery_name' 	=> $this->input->post('galery_name'),
				'galery_type' 	=> $this->input->post('galery_type'),
				'galery_status' => $this->input->post('galery_status'),
			];

			if ($galeries_galery_type == '1') {
				if (!is_dir(FCPATH . '/uploads/galeries/')) {
					mkdir(FCPATH . '/uploads/galeries/');
				}
	
				if (!empty($galeries_galery_media_uuid)) {
					$galeries_galery_media_name_copy = date('YmdHis') . '-' . $galeries_galery_media_name;
	
					rename(FCPATH . 'uploads/tmp/' . $galeries_galery_media_uuid . '/' . $galeries_galery_media_name, 
							FCPATH . 'uploads/galeries/' . $galeries_galery_media_name_copy);
	
					if (!is_file(FCPATH . '/uploads/galeries/' . $galeries_galery_media_name_copy)) {
						echo json_encode([
								'success' => false,
								'message' => 'Error uploading file'
							]);
						exit;
					}

					$save_data['galery_media'] = $galeries_galery_media_name_copy;
				}
			}else{
				$save_data['galery_media'] = $this->input->post('galery_embed_YT');
			}

			$save_galeries = $this->model_galeries->change($id, $save_data);

			if ($save_galeries) {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = true;
					$this->data['id'] 	   = $id;
					$this->data['message'] = cclang('success_update_data_stay', [anchor('administrator/galeries', ' Go back to list')]);
				} else {
					set_message(cclang('success_update_data_redirect', []), 'success');

            		$this->data['success'] 	= true;
					$this->data['redirect'] = base_url('administrator/galeries');
				}
			} else {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = false;
					$this->data['message'] = cclang('data_not_change');
				} else {
            		$this->data['success'] 	= false;
            		$this->data['message'] 	= cclang('data_not_change');
					$this->data['redirect'] = base_url('administrator/galeries');
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
	* delete Galeriess
	*
	* @var $id String
	*/
	public function delete($id = null) {
		$this->is_allowed('galeries_delete');

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
            set_message(cclang('has_been_deleted', 'galeries'), 'success');
        } else {
            set_message(cclang('error_delete', 'galeries'), 'error');
        }

		redirect_back();
	}

		/**
	* View view Galeriess
	*
	* @var $id String
	*/
	public function view($id) {
		$this->is_allowed('galeries_view');

		$this->data['galeries'] = $this->model_galeries->join_avaiable()->filter_avaiable()->find($id);

		$this->template->title('Galeri Detail');
		$this->render('backend/standart/administrator/galeries/galeries_view', $this->data);
	}
	
	/**
	* delete Galeriess
	*
	* @var $id String
	*/
	private function _remove($id) {
		$galeries = $this->model_galeries->find($id);

		if (!empty($galeries->galery_media)) {
			$path = FCPATH . '/uploads/galeries/' . $galeries->galery_media;

			if (is_file($path)) {
				$delete_file = unlink($path);
			}
		}
		
		return $this->model_galeries->remove($id);
	}
	
	/**
	* Upload Image Galeries	* 
	* @return JSON
	*/
	public function upload_galery_media_file() {
		if (!$this->is_allowed('galeries_add', false)) {
			echo json_encode([
				'success' => false,
				'message' => cclang('sorry_you_do_not_have_permission_to_access')
				]);
			exit;
		}

		$uuid = $this->input->post('qquuid');

		echo $this->upload_file([
			'uuid' 		 	=> $uuid,
			'table_name' 	=> 'galeries',
		]);
	}

	/**
	* Delete Image Galeries	* 
	* @return JSON
	*/
	public function delete_galery_media_file($uuid) {
		if (!$this->is_allowed('galeries_delete', false)) {
			echo json_encode([
				'success' => false,
				'error' => cclang('sorry_you_do_not_have_permission_to_access')
				]);
			exit;
		}

		echo $this->delete_file([
            'uuid'              => $uuid, 
            'delete_by'         => $this->input->get('by'), 
            'field_name'        => 'galery_media', 
            'upload_path_tmp'   => './uploads/tmp/',
            'table_name'        => 'galeries',
            'primary_key'       => 'galery_id',
            'upload_path'       => 'uploads/galeries/'
        ]);
	}

	/**
	* Get Image Galeries	* 
	* @return JSON
	*/
	public function get_galery_media_file($id) {
		if (!$this->is_allowed('galeries_update', false)) {
			echo json_encode([
				'success' => false,
				'message' => 'Image not loaded, you do not have permission to access'
				]);
			exit;
		}

		$galeries = $this->model_galeries->find($id);

		echo $this->get_file([
            'uuid'              => $id, 
            'delete_by'         => 'id', 
            'field_name'        => 'galery_media', 
            'table_name'        => 'galeries',
            'primary_key'       => 'galery_id',
            'upload_path'       => 'uploads/galeries/',
            'delete_endpoint'   => 'administrator/galeries/delete_galery_media_file'
        ]);
	}
	
	
	/**
	* Export to excel
	*
	* @return Files Excel .xls
	*/
	public function export() {
		$this->is_allowed('galeries_export');

		$this->model_galeries->export(
			'galeries', 
			'galeries',
			$this->model_galeries->field_search
		);
	}

	/**
	* Export to PDF
	*
	* @return Files PDF .pdf
	*/
	public function export_pdf() {
		$this->is_allowed('galeries_export');

		$this->model_galeries->pdf('galeries', 'galeries');
	}


	public function single_pdf($id = null) {
		$this->is_allowed('galeries_export');

		$table = $title = 'galeries';
		$this->load->library('HtmlPdf');
      
        $config = array(
            'orientation' => 'p',
            'format' => 'a4',
            'marges' => array(5, 5, 5, 5)
        );

        $this->pdf = new HtmlPdf($config);
        $this->pdf->setDefaultFont('stsongstdlight'); 

        $result = $this->db->get($table);
       
        $data = $this->model_galeries->find($id);
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


/* End of file galeries.php */
/* Location: ./application/controllers/administrator/Galeries.php */