<?php
defined('BASEPATH') OR exit('No direct script access allowed');


/**
*| --------------------------------------------------------------------------
*| Rentan Opd Galeri Controller
*| --------------------------------------------------------------------------
*| Rentan Opd Galeri site
*|
*/
class Rentan_opd_galeri extends Admin {
	public function __construct() {
		parent::__construct();

		$this->load->model('model_rentan_opd_galeri');
		$this->load->model('group/model_group');
		$this->lang->load('web_lang', $this->current_lang);
	}

	/**
	* show all Rentan Opd Galeris
	*
	* @var $offset String
	*/
	public function index($offset = 0) {
		$this->is_allowed('rentan_opd_galeri_list');

		$filter = $this->input->get('q');
		$field 	= $this->input->get('f');

		$this->data['rentan_opd_galeris'] = $this->model_rentan_opd_galeri->get($filter, $field, $this->limit_page, $offset);
		$this->data['rentan_opd_galeri_counts'] = $this->model_rentan_opd_galeri->count_all($filter, $field);

		$config = [
			'base_url'     => 'administrator/rentan_opd_galeri/index/',
			'total_rows'   => $this->data['rentan_opd_galeri_counts'],
			'per_page'     => $this->limit_page,
			'uri_segment'  => 4,
		];

		$this->data['pagination'] = $this->pagination($config);

		$this->template->title('Galeri Rencana Kegiatan OPD List');
		$this->render('backend/standart/administrator/rentan_opd_galeri/rentan_opd_galeri_list', $this->data);
	}
	
	/**
	* Add new rentan_opd_galeris
	*
	*/
	public function add() {
		$this->is_allowed('rentan_opd_galeri_add');

		$getID = $this->input->get('id');
		
		$this->data = [
			'id' => $getID,
		];

		$this->template->title('Galeri Rencana Kegiatan OPD New');
		$this->render('backend/standart/administrator/rentan_opd_galeri/rentan_opd_galeri_add', $this->data);
	}

	/**
	* Add New Rentan Opd Galeris
	*
	* @return JSON
	*/
	public function add_save() {
		if (!$this->is_allowed('rentan_opd_galeri_add', false)) {
			echo json_encode([
				'success' => false,
				'message' => cclang('sorry_you_do_not_have_permission_to_access')
				]);
			exit;
		}

		$this->form_validation->set_rules('rentan_opd_galeri_rentan_opd_galeri_file_name[]', 'Gambar', 'trim|required');
		$this->form_validation->set_rules('rentan_opd_id', 'Kegiatan', 'trim|required');

		$getID = $this->input->post('rentan_opd_id');

		if (!empty($getID)) {
			$redirectURL = base_url('administrator/rentan_opd/view/'.$getID);
		}else{
			$redirectURL = base_url('administrator/rentan_opd_galeri');
		}

		if ($this->form_validation->run()) {
			$save_data = [
				'rentan_opd_id' 				=> $getID,
				'rentan_opd_galeri_create_at' 	=> date('Y-m-d H:i:s'),
				'rentan_opd_galeri_user' 		=> get_user_data('id'),
			];
			
			if (!is_dir(FCPATH . '/uploads/rentan_opd_galeri/')) {
				mkdir(FCPATH . '/uploads/rentan_opd_galeri/');
			}

			if (count((array) $this->input->post('rentan_opd_galeri_rentan_opd_galeri_file_name'))) {
				foreach ((array) $_POST['rentan_opd_galeri_rentan_opd_galeri_file_name'] as $idx => $file_name) {
					$rentan_opd_galeri_rentan_opd_galeri_file_name_copy = date('YmdHis') . '-' . $file_name;

					rename(FCPATH . 'uploads/tmp/' . $_POST['rentan_opd_galeri_rentan_opd_galeri_file_uuid'][$idx] . '/' .  $file_name, 
							FCPATH . 'uploads/rentan_opd_galeri/' . $rentan_opd_galeri_rentan_opd_galeri_file_name_copy);

					$listed_image[] = $rentan_opd_galeri_rentan_opd_galeri_file_name_copy;

					if (!is_file(FCPATH . '/uploads/rentan_opd_galeri/' . $rentan_opd_galeri_rentan_opd_galeri_file_name_copy)) {
						echo json_encode([
							'success' => false,
							'message' => 'Error uploading file'
							]);
						exit;
					}
				}

				$save_data['rentan_opd_galeri_file'] = implode(',', $listed_image);
			}
			
			$save_rentan_opd_galeri = $id = $this->model_rentan_opd_galeri->store($save_data);

			if ($save_rentan_opd_galeri) {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = true;
					$this->data['id'] 	   = $save_rentan_opd_galeri;
					$this->data['message'] = cclang('success_save_data_stay', [
						anchor('administrator/rentan_opd_galeri/edit/' . $save_rentan_opd_galeri, 'Edit Rentan Opd Galeri'),
						anchor('administrator/rentan_opd_galeri', ' Go back to list')
					]);
				} else {
					set_message(
						cclang('success_save_data_redirect', [
						anchor('administrator/rentan_opd_galeri/edit/' . $save_rentan_opd_galeri, 'Edit Rentan Opd Galeri')
					]), 'success');

            		$this->data['success'] = true;
					$this->data['redirect'] = $redirectURL;
				}
			} else {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = false;
					$this->data['message'] = cclang('data_not_change');
				} else {
            		$this->data['success'] = false;
            		$this->data['message'] = cclang('data_not_change');
					$this->data['redirect'] = $redirectURL;
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
	* Update view Rentan Opd Galeris
	*
	* @var $id String
	*/
	public function edit($id) {
		$this->is_allowed('rentan_opd_galeri_update');

		$getID = $this->input->get('id');
		
		$this->data = [
			'id' 				=> $getID,
			'rentan_opd_galeri' => $this->model_rentan_opd_galeri->find($id),
		];


		$this->template->title('Galeri Rencana Kegiatan OPD Update');
		$this->render('backend/standart/administrator/rentan_opd_galeri/rentan_opd_galeri_update', $this->data);
	}

	/**
	* Update Rentan Opd Galeris
	*
	* @var $id String
	*/
	public function edit_save($id) {
		if (!$this->is_allowed('rentan_opd_galeri_update', false)) {
			echo json_encode([
				'success' => false,
				'message' => cclang('sorry_you_do_not_have_permission_to_access')
				]);
			exit;
		}

		$this->form_validation->set_rules('rentan_opd_galeri_rentan_opd_galeri_file_name[]', 'Gambar', 'trim|required');
		$this->form_validation->set_rules('rentan_opd_id', 'Kegiatan', 'trim|required');

		$getID = $this->input->post('rentan_opd_id');

		if (!empty($getID)) {
			$redirectURL = base_url('administrator/rentan_opd/view/'.$getID);
		}else{
			$redirectURL = base_url('administrator/rentan_opd_galeri');
		}
		
		if ($this->form_validation->run()) {
			$save_data = [
				'rentan_opd_id' => $getID,
			];

			$listed_image = [];
			if (count((array) $this->input->post('rentan_opd_galeri_rentan_opd_galeri_file_name'))) {
				foreach ((array) $_POST['rentan_opd_galeri_rentan_opd_galeri_file_name'] as $idx => $file_name) {
					if (isset($_POST['rentan_opd_galeri_rentan_opd_galeri_file_uuid'][$idx]) AND !empty($_POST['rentan_opd_galeri_rentan_opd_galeri_file_uuid'][$idx])) {
						$rentan_opd_galeri_rentan_opd_galeri_file_name_copy = date('YmdHis') . '-' . $file_name;

						rename(FCPATH . 'uploads/tmp/' . $_POST['rentan_opd_galeri_rentan_opd_galeri_file_uuid'][$idx] . '/' .  $file_name, 
								FCPATH . 'uploads/rentan_opd_galeri/' . $rentan_opd_galeri_rentan_opd_galeri_file_name_copy);

						$listed_image[] = $rentan_opd_galeri_rentan_opd_galeri_file_name_copy;

						if (!is_file(FCPATH . '/uploads/rentan_opd_galeri/' . $rentan_opd_galeri_rentan_opd_galeri_file_name_copy)) {
							echo json_encode([
								'success' => false,
								'message' => 'Error uploading file'
								]);
							exit;
						}
					} else {
						$listed_image[] = $file_name;
					}
				}
			}
			
			$save_data['rentan_opd_galeri_file'] = implode(',', $listed_image);
			
			$save_rentan_opd_galeri = $this->model_rentan_opd_galeri->change($id, $save_data);

			if ($save_rentan_opd_galeri) {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = true;
					$this->data['id'] 	   = $id;
					$this->data['message'] = cclang('success_update_data_stay', [
						anchor('administrator/rentan_opd_galeri', ' Go back to list')
					]);
				} else {
					set_message(
						cclang('success_update_data_redirect', [
					]), 'success');

            		$this->data['success'] = true;
					$this->data['redirect'] = $redirectURL;
				}
			} else {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = false;
					$this->data['message'] = cclang('data_not_change');
				} else {
            		$this->data['success'] = false;
            		$this->data['message'] = cclang('data_not_change');
					$this->data['redirect'] = $redirectURL;
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
	* delete Rentan Opd Galeris
	*
	* @var $id String
	*/
	public function delete($id = null) {
		$this->is_allowed('rentan_opd_galeri_delete');

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
            set_message(cclang('has_been_deleted', 'rentan_opd_galeri'), 'success');
        } else {
            set_message(cclang('error_delete', 'rentan_opd_galeri'), 'error');
        }

		redirect_back();
	}

		/**
	* View view Rentan Opd Galeris
	*
	* @var $id String
	*/
	public function view($id) {
		$this->is_allowed('rentan_opd_galeri_view');

		$this->data['rentan_opd_galeri'] = $this->model_rentan_opd_galeri->join_avaiable()->filter_avaiable()->find($id);

		$this->template->title('Galeri Rencana Kegiatan OPD Detail');
		$this->render('backend/standart/administrator/rentan_opd_galeri/rentan_opd_galeri_view', $this->data);
	}
	
	/**
	* delete Rentan Opd Galeris
	*
	* @var $id String
	*/
	private function _remove($id) {
		$rentan_opd_galeri = $this->model_rentan_opd_galeri->find($id);

		if (!empty($rentan_opd_galeri->rentan_opd_galeri_file)) {
			foreach ((array) explode(',', $rentan_opd_galeri->rentan_opd_galeri_file) as $filename) {
				$path = FCPATH . '/uploads/rentan_opd_galeri/' . $filename;

				if (is_file($path)) {
					$delete_file = unlink($path);
				}
			}
		}
		
		return $this->model_rentan_opd_galeri->remove($id);
	}
	
	
	/**
	* Upload Image Rentan Opd Galeri	* 
	* @return JSON
	*/
	public function upload_rentan_opd_galeri_file_file() {
		if (!$this->is_allowed('rentan_opd_galeri_add', false)) {
			echo json_encode([
				'success' => false,
				'message' => cclang('sorry_you_do_not_have_permission_to_access')
				]);
			exit;
		}

		$uuid = $this->input->post('qquuid');

		echo $this->upload_file([
			'uuid' 		 	=> $uuid,
			'table_name' 	=> 'rentan_opd_galeri',
		]);
	}

	/**
	* Delete Image Rentan Opd Galeri	* 
	* @return JSON
	*/
	public function delete_rentan_opd_galeri_file_file($uuid) {
		if (!$this->is_allowed('rentan_opd_galeri_delete', false)) {
			echo json_encode([
				'success' => false,
				'error' => cclang('sorry_you_do_not_have_permission_to_access')
				]);
			exit;
		}

		echo $this->delete_file([
            'uuid'              => $uuid, 
            'delete_by'         => $this->input->get('by'), 
            'field_name'        => 'rentan_opd_galeri_file', 
            'upload_path_tmp'   => './uploads/tmp/',
            'table_name'        => 'rentan_opd_galeri',
            'primary_key'       => 'rentan_opd_galeri_id',
            'upload_path'       => 'uploads/rentan_opd_galeri/'
        ]);
	}

	/**
	* Get Image Rentan Opd Galeri	* 
	* @return JSON
	*/
	public function get_rentan_opd_galeri_file_file($id) {
		if (!$this->is_allowed('rentan_opd_galeri_update', false)) {
			echo json_encode([
				'success' => false,
				'message' => 'Image not loaded, you do not have permission to access'
				]);
			exit;
		}

		$rentan_opd_galeri = $this->model_rentan_opd_galeri->find($id);

		echo $this->get_file([
            'uuid'              => $id, 
            'delete_by'         => 'id', 
            'field_name'        => 'rentan_opd_galeri_file', 
            'table_name'        => 'rentan_opd_galeri',
            'primary_key'       => 'rentan_opd_galeri_id',
            'upload_path'       => 'uploads/rentan_opd_galeri/',
            'delete_endpoint'   => 'administrator/rentan_opd_galeri/delete_rentan_opd_galeri_file_file'
        ]);
	}
	
	/**
	* Export to excel
	*
	* @return Files Excel .xls
	*/
	public function export() {
		$this->is_allowed('rentan_opd_galeri_export');

		$this->model_rentan_opd_galeri->export(
			'rentan_opd_galeri', 
			'rentan_opd_galeri',
			$this->model_rentan_opd_galeri->field_search
		);
	}

	/**
	* Export to PDF
	*
	* @return Files PDF .pdf
	*/
	public function export_pdf() {
		$this->is_allowed('rentan_opd_galeri_export');

		$this->model_rentan_opd_galeri->pdf('rentan_opd_galeri', 'rentan_opd_galeri');
	}


	public function single_pdf($id = null) {
		$this->is_allowed('rentan_opd_galeri_export');

		$table = $title = 'rentan_opd_galeri';
		$this->load->library('HtmlPdf');
      
        $config = array(
            'orientation' => 'p',
            'format' => 'a4',
            'marges' => array(5, 5, 5, 5)
        );

        $this->pdf = new HtmlPdf($config);
        $this->pdf->setDefaultFont('stsongstdlight'); 

        $result = $this->db->get($table);
       
        $data = $this->model_rentan_opd_galeri->find($id);
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

	public function ajax_rentan_opd_id($id = null) {
		if (!$this->is_allowed('rentan_opd_galeri_list', false)) {
			echo json_encode([
				'success' => false,
				'message' => cclang('sorry_you_do_not_have_permission_to_access')
				]);
			exit;
		}

		if ($id != null) {
			$results = db_get_all_data('rentan_opd', ['rentan_opd_id' => $id]);
		}else{
			$results = db_get_all_data('rentan_opd');
		}

		$this->response($results);	
	}

	
}


/* End of file rentan_opd_galeri.php */
/* Location: ./application/controllers/administrator/Rentan Opd Galeri.php */