<?php
defined('BASEPATH') OR exit('No direct script access allowed');


/**
*| --------------------------------------------------------------------------
*| Publikasi Stunting Controller
*| --------------------------------------------------------------------------
*| Publikasi Stunting site
*|
*/
class Publikasi_stunting extends Admin {
	public function __construct() {
		parent::__construct();

		$this->load->model('model_publikasi_stunting');
		$this->load->model('group/model_group');
		$this->lang->load('web_lang', $this->current_lang);
	}

	/**
	* show all Publikasi Stuntings
	*
	* @var $offset String
	*/
	public function index($offset = 0) {
		$this->is_allowed('publikasi_stunting_list');

		$filter = $this->input->get('q');
		$field 	= $this->input->get('f');

		$this->data['publikasi_stuntings'] = $this->model_publikasi_stunting->get($filter, $field, $this->limit_page, $offset);
		$this->data['publikasi_stunting_counts'] = $this->model_publikasi_stunting->count_all($filter, $field);

		$config = [
			'base_url'     => 'administrator/publikasi_stunting/index/',
			'total_rows'   => $this->data['publikasi_stunting_counts'],
			'per_page'     => $this->limit_page,
			'uri_segment'  => 4,
		];

		$this->data['pagination'] = $this->pagination($config);

		$this->template->title('Publikasi Dan Pengukuran Stunting List');
		$this->render('backend/standart/administrator/publikasi_stunting/publikasi_stunting_list', $this->data);
	}
	
	/**
	* Add new publikasi_stuntings
	*
	*/
	public function add() {
		$this->is_allowed('publikasi_stunting_add');

		$this->template->title('Publikasi Dan Pengukuran Stunting New');
		$this->render('backend/standart/administrator/publikasi_stunting/publikasi_stunting_add', $this->data);
	}

	/**
	* Add New Publikasi Stuntings
	*
	* @return JSON
	*/
	public function add_save() {
		if (!$this->is_allowed('publikasi_stunting_add', false)) {
			echo json_encode([
				'success' => false,
				'message' => cclang('sorry_you_do_not_have_permission_to_access')
				]);
			exit;
		}

		$this->form_validation->set_rules('pustun_judul', 'Judul', 'trim|required|max_length[255]');
		$this->form_validation->set_rules('pustun_isi', 'Isi Berita', 'trim|required');
		$this->form_validation->set_rules('publikasi_stunting_pustun_media_name[]', 'Upload Foto/Media', 'trim');

		if ($this->form_validation->run()) {
			$save_data = [
				'pustun_judul' 		=> $this->input->post('pustun_judul'),
				'pustun_isi' 		=> $this->input->post('pustun_isi'),
				'pustun_status' 	=> '1',
				'pustun_created_at' => date('Y-m-d H:i:s'),
				'pustun_user_id' 	=> get_user_data('id')
			];
			
			if (!is_dir(FCPATH . '/uploads/publikasi_stunting/')) {
				mkdir(FCPATH . '/uploads/publikasi_stunting/');
			}

			if (count((array) $this->input->post('publikasi_stunting_pustun_media_name'))) {
				foreach ((array) $_POST['publikasi_stunting_pustun_media_name'] as $idx => $file_name) {
					$publikasi_stunting_pustun_media_name_copy = date('YmdHis') . '-' . $file_name;

					rename(FCPATH . 'uploads/tmp/' . $_POST['publikasi_stunting_pustun_media_uuid'][$idx] . '/' .  $file_name, 
							FCPATH . 'uploads/publikasi_stunting/' . $publikasi_stunting_pustun_media_name_copy);

					$listed_image[] = $publikasi_stunting_pustun_media_name_copy;

					if (!is_file(FCPATH . '/uploads/publikasi_stunting/' . $publikasi_stunting_pustun_media_name_copy)) {
						echo json_encode([
							'success' => false,
							'message' => 'Error uploading file'
							]);
						exit;
					}
				}

				$save_data['pustun_media'] = implode(',', $listed_image);
			}
			
			$save_publikasi_stunting = $id = $this->model_publikasi_stunting->store($save_data);

			if ($save_publikasi_stunting) {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = true;
					$this->data['id'] 	   = $save_publikasi_stunting;
					$this->data['message'] = cclang('success_save_data_stay', [
						anchor('administrator/publikasi_stunting/edit/' . $save_publikasi_stunting, 'Edit Publikasi Stunting'),
						anchor('administrator/publikasi_stunting', ' Go back to list')
					]);
				} else {
					set_message(
						cclang('success_save_data_redirect', [
						anchor('administrator/publikasi_stunting/edit/' . $save_publikasi_stunting, 'Edit Publikasi Stunting')
					]), 'success');

            		$this->data['success'] = true;
					$this->data['redirect'] = base_url('administrator/publikasi_stunting');
				}
			} else {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = false;
					$this->data['message'] = cclang('data_not_change');
				} else {
            		$this->data['success'] = false;
            		$this->data['message'] = cclang('data_not_change');
					$this->data['redirect'] = base_url('administrator/publikasi_stunting');
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
	* Update view Publikasi Stuntings
	*
	* @var $id String
	*/
	public function edit($id) {
		$this->is_allowed('publikasi_stunting_update');

		$this->data['publikasi_stunting'] = $this->model_publikasi_stunting->find($id);

		$this->template->title('Publikasi Dan Pengukuran Stunting Update');
		$this->render('backend/standart/administrator/publikasi_stunting/publikasi_stunting_update', $this->data);
	}

	/**
	* Update Publikasi Stuntings
	*
	* @var $id String
	*/
	public function edit_save($id) {
		if (!$this->is_allowed('publikasi_stunting_update', false)) {
			echo json_encode([
				'success' => false,
				'message' => cclang('sorry_you_do_not_have_permission_to_access')
				]);
			exit;
		}

		$this->form_validation->set_rules('pustun_judul', 'Judul', 'trim|required|max_length[255]');
		$this->form_validation->set_rules('pustun_isi', 'Isi Berita', 'trim|required');
		$this->form_validation->set_rules('publikasi_stunting_pustun_media_name[]', 'Upload Foto/Media', 'trim');
		
		if ($this->form_validation->run()) {
			$save_data = [
				'pustun_judul' 	=> $this->input->post('pustun_judul'),
				'pustun_isi' 	=> $this->input->post('pustun_isi'),
			];
			
			$listed_image = [];
			if (count((array) $this->input->post('publikasi_stunting_pustun_media_name'))) {
				foreach ((array) $_POST['publikasi_stunting_pustun_media_name'] as $idx => $file_name) {
					if (isset($_POST['publikasi_stunting_pustun_media_uuid'][$idx]) AND !empty($_POST['publikasi_stunting_pustun_media_uuid'][$idx])) {
						$publikasi_stunting_pustun_media_name_copy = date('YmdHis') . '-' . $file_name;

						rename(FCPATH . 'uploads/tmp/' . $_POST['publikasi_stunting_pustun_media_uuid'][$idx] . '/' .  $file_name, 
								FCPATH . 'uploads/publikasi_stunting/' . $publikasi_stunting_pustun_media_name_copy);

						$listed_image[] = $publikasi_stunting_pustun_media_name_copy;

						if (!is_file(FCPATH . '/uploads/publikasi_stunting/' . $publikasi_stunting_pustun_media_name_copy)) {
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
			
			$save_data['pustun_media'] = implode(',', $listed_image);
		
			
			$save_publikasi_stunting = $this->model_publikasi_stunting->change($id, $save_data);

			if ($save_publikasi_stunting) {

				

				
				
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = true;
					$this->data['id'] 	   = $id;
					$this->data['message'] = cclang('success_update_data_stay', [
						anchor('administrator/publikasi_stunting', ' Go back to list')
					]);
				} else {
					set_message(
						cclang('success_update_data_redirect', [
					]), 'success');

            		$this->data['success'] = true;
					$this->data['redirect'] = base_url('administrator/publikasi_stunting');
				}
			} else {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = false;
					$this->data['message'] = cclang('data_not_change');
				} else {
            		$this->data['success'] = false;
            		$this->data['message'] = cclang('data_not_change');
					$this->data['redirect'] = base_url('administrator/publikasi_stunting');
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
	* delete Publikasi Stuntings
	*
	* @var $id String
	*/
	public function delete($id = null)
	{
		$this->is_allowed('publikasi_stunting_delete');

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
            set_message(cclang('has_been_deleted', 'publikasi_stunting'), 'success');
        } else {
            set_message(cclang('error_delete', 'publikasi_stunting'), 'error');
        }

		redirect_back();
	}

		/**
	* View view Publikasi Stuntings
	*
	* @var $id String
	*/
	public function view($id)
	{
		$this->is_allowed('publikasi_stunting_view');

		$this->data['publikasi_stunting'] = $this->model_publikasi_stunting->join_avaiable()->filter_avaiable()->find($id);

		$this->template->title('Publikasi Dan Pengukuran Stunting Detail');
		$this->render('backend/standart/administrator/publikasi_stunting/publikasi_stunting_view', $this->data);
	}
	
	/**
	* delete Publikasi Stuntings
	*
	* @var $id String
	*/
	private function _remove($id)
	{
		$publikasi_stunting = $this->model_publikasi_stunting->find($id);

		
		if (!empty($publikasi_stunting->pustun_media)) {
			foreach ((array) explode(',', $publikasi_stunting->pustun_media) as $filename) {
				$path = FCPATH . '/uploads/publikasi_stunting/' . $filename;

				if (is_file($path)) {
					$delete_file = unlink($path);
				}
			}
		}
		
		return $this->model_publikasi_stunting->remove($id);
	}
	
	
	/**
	* Upload Image Publikasi Stunting	* 
	* @return JSON
	*/
	public function upload_pustun_media_file()
	{
		if (!$this->is_allowed('publikasi_stunting_add', false)) {
			echo json_encode([
				'success' => false,
				'message' => cclang('sorry_you_do_not_have_permission_to_access')
				]);
			exit;
		}

		$uuid = $this->input->post('qquuid');

		echo $this->upload_file([
			'uuid' 		 	=> $uuid,
			'table_name' 	=> 'publikasi_stunting',
			'allowed_types' => 'jpg|png|jpeg',
		]);
	}

	/**
	* Delete Image Publikasi Stunting	* 
	* @return JSON
	*/
	public function delete_pustun_media_file($uuid)
	{
		if (!$this->is_allowed('publikasi_stunting_delete', false)) {
			echo json_encode([
				'success' => false,
				'error' => cclang('sorry_you_do_not_have_permission_to_access')
				]);
			exit;
		}

		echo $this->delete_file([
            'uuid'              => $uuid, 
            'delete_by'         => $this->input->get('by'), 
            'field_name'        => 'pustun_media', 
            'upload_path_tmp'   => './uploads/tmp/',
            'table_name'        => 'publikasi_stunting',
            'primary_key'       => 'pustun_id',
            'upload_path'       => 'uploads/publikasi_stunting/'
        ]);
	}

	/**
	* Get Image Publikasi Stunting	* 
	* @return JSON
	*/
	public function get_pustun_media_file($id)
	{
		if (!$this->is_allowed('publikasi_stunting_update', false)) {
			echo json_encode([
				'success' => false,
				'message' => 'Image not loaded, you do not have permission to access'
				]);
			exit;
		}

		$publikasi_stunting = $this->model_publikasi_stunting->find($id);

		echo $this->get_file([
            'uuid'              => $id, 
            'delete_by'         => 'id', 
            'field_name'        => 'pustun_media', 
            'table_name'        => 'publikasi_stunting',
            'primary_key'       => 'pustun_id',
            'upload_path'       => 'uploads/publikasi_stunting/',
            'delete_endpoint'   => 'administrator/publikasi_stunting/delete_pustun_media_file'
        ]);
	}
	
	/**
	* Export to excel
	*
	* @return Files Excel .xls
	*/
	public function export()
	{
		$this->is_allowed('publikasi_stunting_export');

		$this->model_publikasi_stunting->export(
			'publikasi_stunting', 
			'publikasi_stunting',
			$this->model_publikasi_stunting->field_search
		);
	}

	/**
	* Export to PDF
	*
	* @return Files PDF .pdf
	*/
	public function export_pdf()
	{
		$this->is_allowed('publikasi_stunting_export');

		$this->model_publikasi_stunting->pdf('publikasi_stunting', 'publikasi_stunting');
	}


	public function single_pdf($id = null)
	{
		$this->is_allowed('publikasi_stunting_export');

		$table = $title = 'publikasi_stunting';
		$this->load->library('HtmlPdf');
      
        $config = array(
            'orientation' => 'p',
            'format' => 'a4',
            'marges' => array(5, 5, 5, 5)
        );

        $this->pdf = new HtmlPdf($config);
        $this->pdf->setDefaultFont('stsongstdlight'); 

        $result = $this->db->get($table);
       
        $data = $this->model_publikasi_stunting->find($id);
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


/* End of file publikasi_stunting.php */
/* Location: ./application/controllers/administrator/Publikasi Stunting.php */