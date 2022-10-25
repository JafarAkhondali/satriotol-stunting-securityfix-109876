<?php
defined('BASEPATH') OR exit('No direct script access allowed');


/**
*| --------------------------------------------------------------------------
*| About Controller
*| --------------------------------------------------------------------------
*| About site
*|
*/
class About extends Admin {
	public function __construct() {
		parent::__construct();

		$this->load->model('model_about');
		$this->load->model('group/model_group');
		$this->lang->load('web_lang', $this->current_lang);
	}

	/**
	* show all Abouts
	*
	* @var $offset String
	*/
	public function index($offset = 0) {
		$this->is_allowed('about_list');

		$filter = $this->input->get('q');
		$field 	= $this->input->get('f');

		$this->data['abouts'] = $this->model_about->get($filter, $field, $this->limit_page, $offset);
		$this->data['about_counts'] = $this->model_about->count_all($filter, $field);

		$config = [
			'base_url'     => 'administrator/about/index/',
			'total_rows'   => $this->data['about_counts'],
			'per_page'     => $this->limit_page,
			'uri_segment'  => 4,
		];

		$this->data['pagination'] = $this->pagination($config);

		$this->template->title('About List');
		$this->render('backend/standart/administrator/about/about_list', $this->data);
	}
	
	/**
	* Add new abouts
	*
	*/
	public function add() {
		$this->is_allowed('about_add');

		$this->template->title('About New');
		$this->render('backend/standart/administrator/about/about_add', $this->data);
	}

	/**
	* Add New Abouts
	*
	* @return JSON
	*/
	public function add_save() {
		if (!$this->is_allowed('about_add', false)) {
			echo json_encode([
				'success' => false,
				'message' => cclang('sorry_you_do_not_have_permission_to_access')
				]);
			exit;
		}

		$this->form_validation->set_rules('about_description', 'Kata Pengantar', 'trim|required');
		$this->form_validation->set_rules('about_about_image_name', 'Gambar Kata Pengantar', 'trim|required');
		$this->form_validation->set_rules('about_about_logo_name', 'Logo', 'trim|required');
		$this->form_validation->set_rules('about_address', 'Alamat', 'trim|required');
		$this->form_validation->set_rules('about_pengertian', 'Pengertian Stunting', 'trim|required');
		$this->form_validation->set_rules('about_penyebab', 'Penyebab Stunting', 'trim|required');
		$this->form_validation->set_rules('about_about_image_pengertian_name', 'Gambar Pengertian', 'trim|required');
		$this->form_validation->set_rules('about_about_image_penyebab_name', 'Gambar Penyebab', 'trim|required');

		if ($this->form_validation->run()) {
			$about_about_image_uuid = $this->input->post('about_about_image_uuid');
			$about_about_image_name = $this->input->post('about_about_image_name');
			$about_about_logo_uuid = $this->input->post('about_about_logo_uuid');
			$about_about_logo_name = $this->input->post('about_about_logo_name');
			$about_about_image_pengertian_uuid = $this->input->post('about_about_image_pengertian_uuid');
			$about_about_image_pengertian_name = $this->input->post('about_about_image_pengertian_name');
			$about_about_image_penyebab_uuid = $this->input->post('about_about_image_penyebab_uuid');
			$about_about_image_penyebab_name = $this->input->post('about_about_image_penyebab_name');
		
			$save_data = [
				'about_description' => $this->input->post('about_description'),
				'about_address' => $this->input->post('about_address'),
				'about_pengertian' => $this->input->post('about_pengertian'),
				'about_penyebab' => $this->input->post('about_penyebab'),
			];
			
			if (!is_dir(FCPATH . '/uploads/about/')) {
				mkdir(FCPATH . '/uploads/about/');
			}

			if (!empty($about_about_image_name)) {
				$about_about_image_name_copy = date('YmdHis') . '-' . $about_about_image_name;

				rename(FCPATH . 'uploads/tmp/' . $about_about_image_uuid . '/' . $about_about_image_name, 
						FCPATH . 'uploads/about/' . $about_about_image_name_copy);

				if (!is_file(FCPATH . '/uploads/about/' . $about_about_image_name_copy)) {
					echo json_encode([
						'success' => false,
						'message' => 'Error uploading file'
						]);
					exit;
				}

				$save_data['about_image'] = $about_about_image_name_copy;
			}
		
			if (!empty($about_about_logo_name)) {
				$about_about_logo_name_copy = date('YmdHis') . '-' . $about_about_logo_name;

				rename(FCPATH . 'uploads/tmp/' . $about_about_logo_uuid . '/' . $about_about_logo_name, 
						FCPATH . 'uploads/about/' . $about_about_logo_name_copy);

				if (!is_file(FCPATH . '/uploads/about/' . $about_about_logo_name_copy)) {
					echo json_encode([
						'success' => false,
						'message' => 'Error uploading file'
						]);
					exit;
				}

				$save_data['about_logo'] = $about_about_logo_name_copy;
			}
		
			if (!empty($about_about_image_pengertian_name)) {
				$about_about_image_pengertian_name_copy = date('YmdHis') . '-' . $about_about_image_pengertian_name;

				rename(FCPATH . 'uploads/tmp/' . $about_about_image_pengertian_uuid . '/' . $about_about_image_pengertian_name, 
						FCPATH . 'uploads/about/' . $about_about_image_pengertian_name_copy);

				if (!is_file(FCPATH . '/uploads/about/' . $about_about_image_pengertian_name_copy)) {
					echo json_encode([
						'success' => false,
						'message' => 'Error uploading file'
						]);
					exit;
				}

				$save_data['about_image_pengertian'] = $about_about_image_pengertian_name_copy;
			}
		
			if (!empty($about_about_image_penyebab_name)) {
				$about_about_image_penyebab_name_copy = date('YmdHis') . '-' . $about_about_image_penyebab_name;

				rename(FCPATH . 'uploads/tmp/' . $about_about_image_penyebab_uuid . '/' . $about_about_image_penyebab_name, 
						FCPATH . 'uploads/about/' . $about_about_image_penyebab_name_copy);

				if (!is_file(FCPATH . '/uploads/about/' . $about_about_image_penyebab_name_copy)) {
					echo json_encode([
						'success' => false,
						'message' => 'Error uploading file'
						]);
					exit;
				}

				$save_data['about_image_penyebab'] = $about_about_image_penyebab_name_copy;
			}
		
			$save_about = $id = $this->model_about->store($save_data);

			if ($save_about) {
				$id = $save_about;
				
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = true;
					$this->data['id'] 	   = $save_about;
					$this->data['message'] = cclang('success_save_data_stay', [
						anchor('administrator/about/edit/' . $save_about, 'Edit About'),
						anchor('administrator/about', ' Go back to list')
					]);
				} else {
					set_message(
						cclang('success_save_data_redirect', [
						anchor('administrator/about/edit/' . $save_about, 'Edit About')
					]), 'success');

            		$this->data['success'] = true;
					$this->data['redirect'] = base_url('administrator/about');
				}
			} else {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = false;
					$this->data['message'] = cclang('data_not_change');
				} else {
            		$this->data['success'] = false;
            		$this->data['message'] = cclang('data_not_change');
					$this->data['redirect'] = base_url('administrator/about');
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
	* Update view Abouts
	*
	* @var $id String
	*/
	public function edit($id) {
		$this->is_allowed('about_update');

		$this->data['about'] = $this->model_about->find($id);

		$this->template->title('About Update');
		$this->render('backend/standart/administrator/about/about_update', $this->data);
	}

	/**
	* Update Abouts
	*
	* @var $id String
	*/
	public function edit_save($id) {
		if (!$this->is_allowed('about_update', false)) {
			echo json_encode([
				'success' => false,
				'message' => cclang('sorry_you_do_not_have_permission_to_access')
				]);
			exit;
		}

		$this->form_validation->set_rules('about_description', 'Kata Pengantar', 'trim|required');
		$this->form_validation->set_rules('about_about_image_name', 'Gambar Kata Pengantar', 'trim|required');
		$this->form_validation->set_rules('about_about_logo_name', 'Logo', 'trim|required');
		$this->form_validation->set_rules('about_address', 'Alamat', 'trim|required');
		$this->form_validation->set_rules('about_pengertian', 'Pengertian Stunting', 'trim|required');
		$this->form_validation->set_rules('about_penyebab', 'Penyebab Stunting', 'trim|required');
		$this->form_validation->set_rules('about_about_image_pengertian_name', 'Gambar Pengertian', 'trim|required');
		$this->form_validation->set_rules('about_about_image_penyebab_name', 'Gambar Penyebab', 'trim|required');

		if ($this->form_validation->run()) {
			$about_about_image_uuid = $this->input->post('about_about_image_uuid');
			$about_about_image_name = $this->input->post('about_about_image_name');
			$about_about_logo_uuid = $this->input->post('about_about_logo_uuid');
			$about_about_logo_name = $this->input->post('about_about_logo_name');
			$about_about_image_pengertian_uuid = $this->input->post('about_about_image_pengertian_uuid');
			$about_about_image_pengertian_name = $this->input->post('about_about_image_pengertian_name');
			$about_about_image_penyebab_uuid = $this->input->post('about_about_image_penyebab_uuid');
			$about_about_image_penyebab_name = $this->input->post('about_about_image_penyebab_name');
		
			$save_data = [
				'about_description' => $this->input->post('about_description'),
				'about_address' => $this->input->post('about_address'),
				'about_pengertian' => $this->input->post('about_pengertian'),
				'about_penyebab' => $this->input->post('about_penyebab'),
			];
			
			if (!is_dir(FCPATH . '/uploads/about/')) {
				mkdir(FCPATH . '/uploads/about/');
			}

			if (!empty($about_about_image_uuid)) {
				$about_about_image_name_copy = date('YmdHis') . '-' . $about_about_image_name;

				rename(FCPATH . 'uploads/tmp/' . $about_about_image_uuid . '/' . $about_about_image_name, 
						FCPATH . 'uploads/about/' . $about_about_image_name_copy);

				if (!is_file(FCPATH . '/uploads/about/' . $about_about_image_name_copy)) {
					echo json_encode([
						'success' => false,
						'message' => 'Error uploading file'
						]);
					exit;
				}

				$save_data['about_image'] = $about_about_image_name_copy;
			}
		
			if (!empty($about_about_logo_uuid)) {
				$about_about_logo_name_copy = date('YmdHis') . '-' . $about_about_logo_name;

				rename(FCPATH . 'uploads/tmp/' . $about_about_logo_uuid . '/' . $about_about_logo_name, 
						FCPATH . 'uploads/about/' . $about_about_logo_name_copy);

				if (!is_file(FCPATH . '/uploads/about/' . $about_about_logo_name_copy)) {
					echo json_encode([
						'success' => false,
						'message' => 'Error uploading file'
						]);
					exit;
				}

				$save_data['about_logo'] = $about_about_logo_name_copy;
			}
		
			if (!empty($about_about_image_pengertian_uuid)) {
				$about_about_image_pengertian_name_copy = date('YmdHis') . '-' . $about_about_image_pengertian_name;

				rename(FCPATH . 'uploads/tmp/' . $about_about_image_pengertian_uuid . '/' . $about_about_image_pengertian_name, 
						FCPATH . 'uploads/about/' . $about_about_image_pengertian_name_copy);

				if (!is_file(FCPATH . '/uploads/about/' . $about_about_image_pengertian_name_copy)) {
					echo json_encode([
						'success' => false,
						'message' => 'Error uploading file'
						]);
					exit;
				}

				$save_data['about_image_pengertian'] = $about_about_image_pengertian_name_copy;
			}
		
			if (!empty($about_about_image_penyebab_uuid)) {
				$about_about_image_penyebab_name_copy = date('YmdHis') . '-' . $about_about_image_penyebab_name;

				rename(FCPATH . 'uploads/tmp/' . $about_about_image_penyebab_uuid . '/' . $about_about_image_penyebab_name, 
						FCPATH . 'uploads/about/' . $about_about_image_penyebab_name_copy);

				if (!is_file(FCPATH . '/uploads/about/' . $about_about_image_penyebab_name_copy)) {
					echo json_encode([
						'success' => false,
						'message' => 'Error uploading file'
						]);
					exit;
				}

				$save_data['about_image_penyebab'] = $about_about_image_penyebab_name_copy;
			}
			
			$save_about = $this->model_about->change($id, $save_data);

			if ($save_about) {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = true;
					$this->data['id'] 	   = $id;
					$this->data['message'] = cclang('success_update_data_stay', [
						anchor('administrator/about', ' Go back to list')
					]);
				} else {
					set_message(
						cclang('success_update_data_redirect', [
					]), 'success');

            		$this->data['success'] = true;
					$this->data['redirect'] = base_url('administrator/about');
				}
			} else {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = false;
					$this->data['message'] = cclang('data_not_change');
				} else {
            		$this->data['success'] = false;
            		$this->data['message'] = cclang('data_not_change');
					$this->data['redirect'] = base_url('administrator/about');
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
	* delete Abouts
	*
	* @var $id String
	*/
	public function delete($id = null) {
		$this->is_allowed('about_delete');

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
            set_message(cclang('has_been_deleted', 'about'), 'success');
        } else {
            set_message(cclang('error_delete', 'about'), 'error');
        }

		redirect_back();
	}

		/**
	* View view Abouts
	*
	* @var $id String
	*/
	public function view($id) {
		$this->is_allowed('about_view');

		$this->data['about'] = $this->model_about->join_avaiable()->filter_avaiable()->find($id);

		$this->template->title('About Detail');
		$this->render('backend/standart/administrator/about/about_view', $this->data);
	}
	
	/**
	* delete Abouts
	*
	* @var $id String
	*/
	private function _remove($id) {
		$about = $this->model_about->find($id);

		if (!empty($about->about_image)) {
			$path = FCPATH . '/uploads/about/' . $about->about_image;

			if (is_file($path)) {
				$delete_file = unlink($path);
			}
		}
		if (!empty($about->about_logo)) {
			$path = FCPATH . '/uploads/about/' . $about->about_logo;

			if (is_file($path)) {
				$delete_file = unlink($path);
			}
		}
		if (!empty($about->about_image_pengertian)) {
			$path = FCPATH . '/uploads/about/' . $about->about_image_pengertian;

			if (is_file($path)) {
				$delete_file = unlink($path);
			}
		}
		if (!empty($about->about_image_penyebab)) {
			$path = FCPATH . '/uploads/about/' . $about->about_image_penyebab;

			if (is_file($path)) {
				$delete_file = unlink($path);
			}
		}
		
		return $this->model_about->remove($id);
	}
	
	/**
	* Upload Image About	* 
	* @return JSON
	*/
	public function upload_about_image_file() {
		if (!$this->is_allowed('about_add', false)) {
			echo json_encode([
				'success' => false,
				'message' => cclang('sorry_you_do_not_have_permission_to_access')
				]);
			exit;
		}

		$uuid = $this->input->post('qquuid');

		echo $this->upload_file([
			'uuid' 		 	=> $uuid,
			'table_name' 	=> 'about',
			'allowed_types' => 'jpg|jpeg|png',
		]);
	}

	/**
	* Delete Image About	* 
	* @return JSON
	*/
	public function delete_about_image_file($uuid) {
		if (!$this->is_allowed('about_delete', false)) {
			echo json_encode([
				'success' => false,
				'error' => cclang('sorry_you_do_not_have_permission_to_access')
				]);
			exit;
		}

		echo $this->delete_file([
            'uuid'              => $uuid, 
            'delete_by'         => $this->input->get('by'), 
            'field_name'        => 'about_image', 
            'upload_path_tmp'   => './uploads/tmp/',
            'table_name'        => 'about',
            'primary_key'       => 'about_id',
            'upload_path'       => 'uploads/about/'
        ]);
	}

	/**
	* Get Image About	* 
	* @return JSON
	*/
	public function get_about_image_file($id) {
		if (!$this->is_allowed('about_update', false)) {
			echo json_encode([
				'success' => false,
				'message' => 'Image not loaded, you do not have permission to access'
				]);
			exit;
		}

		$about = $this->model_about->find($id);

		echo $this->get_file([
            'uuid'              => $id, 
            'delete_by'         => 'id', 
            'field_name'        => 'about_image', 
            'table_name'        => 'about',
            'primary_key'       => 'about_id',
            'upload_path'       => 'uploads/about/',
            'delete_endpoint'   => 'administrator/about/delete_about_image_file'
        ]);
	}
	
	/**
	* Upload Image About	* 
	* @return JSON
	*/
	public function upload_about_logo_file() {
		if (!$this->is_allowed('about_add', false)) {
			echo json_encode([
				'success' => false,
				'message' => cclang('sorry_you_do_not_have_permission_to_access')
				]);
			exit;
		}

		$uuid = $this->input->post('qquuid');

		echo $this->upload_file([
			'uuid' 		 	=> $uuid,
			'table_name' 	=> 'about',
			'allowed_types' => 'jpg|jpeg|png',
		]);
	}

	/**
	* Delete Image About	* 
	* @return JSON
	*/
	public function delete_about_logo_file($uuid) {
		if (!$this->is_allowed('about_delete', false)) {
			echo json_encode([
				'success' => false,
				'error' => cclang('sorry_you_do_not_have_permission_to_access')
				]);
			exit;
		}

		echo $this->delete_file([
            'uuid'              => $uuid, 
            'delete_by'         => $this->input->get('by'), 
            'field_name'        => 'about_logo', 
            'upload_path_tmp'   => './uploads/tmp/',
            'table_name'        => 'about',
            'primary_key'       => 'about_id',
            'upload_path'       => 'uploads/about/'
        ]);
	}

	/**
	* Get Image About	* 
	* @return JSON
	*/
	public function get_about_logo_file($id) {
		if (!$this->is_allowed('about_update', false)) {
			echo json_encode([
				'success' => false,
				'message' => 'Image not loaded, you do not have permission to access'
				]);
			exit;
		}

		$about = $this->model_about->find($id);

		echo $this->get_file([
            'uuid'              => $id, 
            'delete_by'         => 'id', 
            'field_name'        => 'about_logo', 
            'table_name'        => 'about',
            'primary_key'       => 'about_id',
            'upload_path'       => 'uploads/about/',
            'delete_endpoint'   => 'administrator/about/delete_about_logo_file'
        ]);
	}
	
	/**
	* Upload Image About	* 
	* @return JSON
	*/
	public function upload_about_image_pengertian_file() {
		if (!$this->is_allowed('about_add', false)) {
			echo json_encode([
				'success' => false,
				'message' => cclang('sorry_you_do_not_have_permission_to_access')
				]);
			exit;
		}

		$uuid = $this->input->post('qquuid');

		echo $this->upload_file([
			'uuid' 		 	=> $uuid,
			'table_name' 	=> 'about',
			'allowed_types' => 'jpg|jpeg|png',
		]);
	}

	/**
	* Delete Image About	* 
	* @return JSON
	*/
	public function delete_about_image_pengertian_file($uuid) {
		if (!$this->is_allowed('about_delete', false)) {
			echo json_encode([
				'success' => false,
				'error' => cclang('sorry_you_do_not_have_permission_to_access')
				]);
			exit;
		}

		echo $this->delete_file([
            'uuid'              => $uuid, 
            'delete_by'         => $this->input->get('by'), 
            'field_name'        => 'about_image_pengertian', 
            'upload_path_tmp'   => './uploads/tmp/',
            'table_name'        => 'about',
            'primary_key'       => 'about_id',
            'upload_path'       => 'uploads/about/'
        ]);
	}

	/**
	* Get Image About	* 
	* @return JSON
	*/
	public function get_about_image_pengertian_file($id) {
		if (!$this->is_allowed('about_update', false)) {
			echo json_encode([
				'success' => false,
				'message' => 'Image not loaded, you do not have permission to access'
				]);
			exit;
		}

		$about = $this->model_about->find($id);

		echo $this->get_file([
            'uuid'              => $id, 
            'delete_by'         => 'id', 
            'field_name'        => 'about_image_pengertian', 
            'table_name'        => 'about',
            'primary_key'       => 'about_id',
            'upload_path'       => 'uploads/about/',
            'delete_endpoint'   => 'administrator/about/delete_about_image_pengertian_file'
        ]);
	}
	
	/**
	* Upload Image About	* 
	* @return JSON
	*/
	public function upload_about_image_penyebab_file() {
		if (!$this->is_allowed('about_add', false)) {
			echo json_encode([
				'success' => false,
				'message' => cclang('sorry_you_do_not_have_permission_to_access')
				]);
			exit;
		}

		$uuid = $this->input->post('qquuid');

		echo $this->upload_file([
			'uuid' 		 	=> $uuid,
			'table_name' 	=> 'about',
			'allowed_types' => 'jpg|jpeg|png',
		]);
	}

	/**
	* Delete Image About	* 
	* @return JSON
	*/
	public function delete_about_image_penyebab_file($uuid) {
		if (!$this->is_allowed('about_delete', false)) {
			echo json_encode([
				'success' => false,
				'error' => cclang('sorry_you_do_not_have_permission_to_access')
				]);
			exit;
		}

		echo $this->delete_file([
            'uuid'              => $uuid, 
            'delete_by'         => $this->input->get('by'), 
            'field_name'        => 'about_image_penyebab', 
            'upload_path_tmp'   => './uploads/tmp/',
            'table_name'        => 'about',
            'primary_key'       => 'about_id',
            'upload_path'       => 'uploads/about/'
        ]);
	}

	/**
	* Get Image About	* 
	* @return JSON
	*/
	public function get_about_image_penyebab_file($id) {
		if (!$this->is_allowed('about_update', false)) {
			echo json_encode([
				'success' => false,
				'message' => 'Image not loaded, you do not have permission to access'
				]);
			exit;
		}

		$about = $this->model_about->find($id);

		echo $this->get_file([
            'uuid'              => $id, 
            'delete_by'         => 'id', 
            'field_name'        => 'about_image_penyebab', 
            'table_name'        => 'about',
            'primary_key'       => 'about_id',
            'upload_path'       => 'uploads/about/',
            'delete_endpoint'   => 'administrator/about/delete_about_image_penyebab_file'
        ]);
	}
	
	/**
	* Export to excel
	*
	* @return Files Excel .xls
	*/
	public function export() {
		$this->is_allowed('about_export');

		$this->model_about->export(
			'about', 
			'about',
			$this->model_about->field_search
		);
	}

	/**
	* Export to PDF
	*
	* @return Files PDF .pdf
	*/
	public function export_pdf() {
		$this->is_allowed('about_export');

		$this->model_about->pdf('about', 'about');
	}


	public function single_pdf($id = null) {
		$this->is_allowed('about_export');

		$table = $title = 'about';
		$this->load->library('HtmlPdf');
      
        $config = array(
            'orientation' 	=> 'p',
            'format' 		=> 'a4',
            'marges' 		=> array(5, 5, 5, 5)
        );

        $this->pdf = new HtmlPdf($config);
        $this->pdf->setDefaultFont('stsongstdlight'); 

        $result = $this->db->get($table);
       
        $data = $this->model_about->find($id);
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


/* End of file about.php */
/* Location: ./application/controllers/administrator/About.php */