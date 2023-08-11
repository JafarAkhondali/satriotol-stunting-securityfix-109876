<?php
defined('BASEPATH') OR exit('No direct script access allowed');


/**
*| --------------------------------------------------------------------------
*| Perkembangan Anak Controller
*| --------------------------------------------------------------------------
*| Perkembangan Anak site
*|
*/
class Perkembangan_anak extends Admin {
	public function __construct() {
		parent::__construct();

		$this->load->model('model_perkembangan_anak');
		$this->load->model('group/model_group');
		$this->lang->load('web_lang', $this->current_lang);
	}

	/**
	* show all Perkembangan Anaks
	*
	* @var $offset String
	*/
	public function index($offset = 0) {
		$this->is_allowed('perkembangan_anak_list');

		$filter = $this->input->get('q');
		$field 	= $this->input->get('f');

		$this->data['perkembangan_anaks'] = $this->model_perkembangan_anak->get($filter, $field, $this->limit_page, $offset);
		$this->data['perkembangan_anak_counts'] = $this->model_perkembangan_anak->count_all($filter, $field);

		$config = [
			'base_url'     => 'administrator/perkembangan_anak/index/',
			'total_rows'   => $this->data['perkembangan_anak_counts'],
			'per_page'     => $this->limit_page,
			'uri_segment'  => 4,
		];

		$this->data['pagination'] = $this->pagination($config);

		$this->template->title('Perkembangan Anak List');
		$this->render('backend/standart/administrator/perkembangan_anak/perkembangan_anak_list', $this->data);
	}
	
	/**
	* Add new perkembangan_anaks
	*
	*/
	public function add()
	{
		$this->is_allowed('perkembangan_anak_add');

		$this->template->title('Perkembangan Anak New');
		$this->render('backend/standart/administrator/perkembangan_anak/perkembangan_anak_add', $this->data);
	}

	/**
	* Add New Perkembangan Anaks
	*
	* @return JSON
	*/
	public function add_save()
	{
		if (!$this->is_allowed('perkembangan_anak_add', false)) {
			echo json_encode([
				'success' => false,
				'message' => cclang('sorry_you_do_not_have_permission_to_access')
				]);
			exit;
		}
		
		

		$this->form_validation->set_rules('perkembangan_anak_id', 'Nama Anak', 'trim|required');
		

		$this->form_validation->set_rules('perkembangan_tgl', 'Tanggal Perkembangan', 'trim|required');
		

		$this->form_validation->set_rules('perkembangan_anak_perkembangan_foto_name[]', 'Foto Kegiatan Perkembangan', 'trim|required');
		

		

		if ($this->form_validation->run()) {
		
			$save_data = [
				'perkembangan_anak_id' => $this->input->post('perkembangan_anak_id'),
				'perkembangan_tgl' => $this->input->post('perkembangan_tgl'),
				'perkembangan_deskripsi' => $this->input->post('perkembangan_deskripsi'),
				'perkembangan_indikasi' => $this->input->post('perkembangan_indikasi'),
				'perkembangan_keterangan' => $this->input->post('perkembangan_keterangan'),
				'perkembangan_user_created' => get_user_data('id'),				'perkembangan_created_at' => date('Y-m-d H:i:s'),
			];

			
			
//$save_data['_example'] = $this->input->post('_example');
			



			
			if (!is_dir(FCPATH . '/uploads/perkembangan_anak/')) {
				mkdir(FCPATH . '/uploads/perkembangan_anak/');
			}

			if (count((array) $this->input->post('perkembangan_anak_perkembangan_foto_name'))) {
				foreach ((array) $_POST['perkembangan_anak_perkembangan_foto_name'] as $idx => $file_name) {
					$perkembangan_anak_perkembangan_foto_name_copy = date('YmdHis') . '-' . $file_name;

					rename(FCPATH . 'uploads/tmp/' . $_POST['perkembangan_anak_perkembangan_foto_uuid'][$idx] . '/' .  $file_name, 
							FCPATH . 'uploads/perkembangan_anak/' . $perkembangan_anak_perkembangan_foto_name_copy);

					$listed_image[] = $perkembangan_anak_perkembangan_foto_name_copy;

					if (!is_file(FCPATH . '/uploads/perkembangan_anak/' . $perkembangan_anak_perkembangan_foto_name_copy)) {
						echo json_encode([
							'success' => false,
							'message' => 'Error uploading file'
							]);
						exit;
					}
				}

				$save_data['perkembangan_foto'] = implode($listed_image, ',');
			}
		
			
			$save_perkembangan_anak = $id = $this->model_perkembangan_anak->store($save_data);
            

			if ($save_perkembangan_anak) {
				
				$id = $save_perkembangan_anak;
				
				
					
				
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = true;
					$this->data['id'] 	   = $save_perkembangan_anak;
					$this->data['message'] = cclang('success_save_data_stay', [
						anchor('administrator/perkembangan_anak/edit/' . $save_perkembangan_anak, 'Edit Perkembangan Anak'),
						anchor('administrator/perkembangan_anak', ' Go back to list')
					]);
				} else {
					set_message(
						cclang('success_save_data_redirect', [
						anchor('administrator/perkembangan_anak/edit/' . $save_perkembangan_anak, 'Edit Perkembangan Anak')
					]), 'success');

            		$this->data['success'] = true;
					$this->data['redirect'] = base_url('administrator/perkembangan_anak');
				}
			} else {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = false;
					$this->data['message'] = cclang('data_not_change');
				} else {
            		$this->data['success'] = false;
            		$this->data['message'] = cclang('data_not_change');
					$this->data['redirect'] = base_url('administrator/perkembangan_anak');
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
	* Update view Perkembangan Anaks
	*
	* @var $id String
	*/
	public function edit($id)
	{
		$this->is_allowed('perkembangan_anak_update');

		$this->data['perkembangan_anak'] = $this->model_perkembangan_anak->find($id);

		$this->template->title('Perkembangan Anak Update');
		$this->render('backend/standart/administrator/perkembangan_anak/perkembangan_anak_update', $this->data);
	}

	/**
	* Update Perkembangan Anaks
	*
	* @var $id String
	*/
	public function edit_save($id)
	{
		if (!$this->is_allowed('perkembangan_anak_update', false)) {
			echo json_encode([
				'success' => false,
				'message' => cclang('sorry_you_do_not_have_permission_to_access')
				]);
			exit;
		}
				$this->form_validation->set_rules('perkembangan_anak_id', 'Nama Anak', 'trim|required');
		

		$this->form_validation->set_rules('perkembangan_tgl', 'Tanggal Perkembangan', 'trim|required');
		

		$this->form_validation->set_rules('perkembangan_anak_perkembangan_foto_name[]', 'Foto Kegiatan Perkembangan', 'trim|required');
		

		
		if ($this->form_validation->run()) {
		
			$save_data = [
				'perkembangan_anak_id' => $this->input->post('perkembangan_anak_id'),
				'perkembangan_tgl' => $this->input->post('perkembangan_tgl'),
				'perkembangan_deskripsi' => $this->input->post('perkembangan_deskripsi'),
				'perkembangan_indikasi' => $this->input->post('perkembangan_indikasi'),
				'perkembangan_keterangan' => $this->input->post('perkembangan_keterangan'),
				'perkembangan_user_updated' => get_user_data('id'),				'perkembangan_updated_at' => date('Y-m-d H:i:s'),
			];

			

			
//$save_data['_example'] = $this->input->post('_example');
			


			
			$listed_image = [];
			if (count((array) $this->input->post('perkembangan_anak_perkembangan_foto_name'))) {
				foreach ((array) $_POST['perkembangan_anak_perkembangan_foto_name'] as $idx => $file_name) {
					if (isset($_POST['perkembangan_anak_perkembangan_foto_uuid'][$idx]) AND !empty($_POST['perkembangan_anak_perkembangan_foto_uuid'][$idx])) {
						$perkembangan_anak_perkembangan_foto_name_copy = date('YmdHis') . '-' . $file_name;

						rename(FCPATH . 'uploads/tmp/' . $_POST['perkembangan_anak_perkembangan_foto_uuid'][$idx] . '/' .  $file_name, 
								FCPATH . 'uploads/perkembangan_anak/' . $perkembangan_anak_perkembangan_foto_name_copy);

						$listed_image[] = $perkembangan_anak_perkembangan_foto_name_copy;

						if (!is_file(FCPATH . '/uploads/perkembangan_anak/' . $perkembangan_anak_perkembangan_foto_name_copy)) {
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
			
			$save_data['perkembangan_foto'] = implode($listed_image, ',');
		
			
			$save_perkembangan_anak = $this->model_perkembangan_anak->change($id, $save_data);

			if ($save_perkembangan_anak) {

				
				

				
				
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = true;
					$this->data['id'] 	   = $id;
					$this->data['message'] = cclang('success_update_data_stay', [
						anchor('administrator/perkembangan_anak', ' Go back to list')
					]);
				} else {
					set_message(
						cclang('success_update_data_redirect', [
					]), 'success');

            		$this->data['success'] = true;
					$this->data['redirect'] = base_url('administrator/perkembangan_anak');
				}
			} else {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = false;
					$this->data['message'] = cclang('data_not_change');
				} else {
            		$this->data['success'] = false;
            		$this->data['message'] = cclang('data_not_change');
					$this->data['redirect'] = base_url('administrator/perkembangan_anak');
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
	* delete Perkembangan Anaks
	*
	* @var $id String
	*/
	public function delete($id = null) {
		$this->is_allowed('perkembangan_anak_delete');

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
            set_message(cclang('has_been_deleted', 'perkembangan_anak'), 'success');
        } else {
            set_message(cclang('error_delete', 'perkembangan_anak'), 'error');
        }

		redirect_back();
	}

		/**
	* View view Perkembangan Anaks
	*
	* @var $id String
	*/
	public function view($id) {
		$this->is_allowed('perkembangan_anak_view');

		$this->data['perkembangan_anak'] = $this->model_perkembangan_anak->join_avaiable()->filter_avaiable()->find($id);

		$this->template->title('Perkembangan Anak Detail');
		$this->render('backend/standart/administrator/perkembangan_anak/perkembangan_anak_view', $this->data);
	}
	
	/**
	* delete Perkembangan Anaks
	*
	* @var $id String
	*/
	private function _remove($id) {
		$perkembangan_anak = $this->model_perkembangan_anak->find($id);

		
		if (!empty($perkembangan_anak->perkembangan_foto)) {
			foreach ((array) explode(',', $perkembangan_anak->perkembangan_foto) as $filename) {
				$path = FCPATH . '/uploads/perkembangan_anak/' . $filename;

				if (is_file($path)) {
					$delete_file = unlink($path);
				}
			}
		}
		
		return $this->model_perkembangan_anak->remove($id);
	}
	
	
	/**
	* Upload Image Perkembangan Anak	* 
	* @return JSON
	*/
	public function upload_perkembangan_foto_file() {
		if (!$this->is_allowed('perkembangan_anak_add', false)) {
			echo json_encode([
				'success' => false,
				'message' => cclang('sorry_you_do_not_have_permission_to_access')
				]);
			exit;
		}

		$uuid = $this->input->post('qquuid');

		echo $this->upload_file([
			'uuid' 		 	=> $uuid,
			'table_name' 	=> 'perkembangan_anak',
			'allowed_types' => 'jpg|png|jpeg',
			'max_size' 	 	=> 2048,
		]);
	}

	/**
	* Delete Image Perkembangan Anak	* 
	* @return JSON
	*/
	public function delete_perkembangan_foto_file($uuid) {
		if (!$this->is_allowed('perkembangan_anak_delete', false)) {
			echo json_encode([
				'success' => false,
				'error' => cclang('sorry_you_do_not_have_permission_to_access')
				]);
			exit;
		}

		echo $this->delete_file([
            'uuid'              => $uuid, 
            'delete_by'         => $this->input->get('by'), 
            'field_name'        => 'perkembangan_foto', 
            'upload_path_tmp'   => './uploads/tmp/',
            'table_name'        => 'perkembangan_anak',
            'primary_key'       => 'perkembangan_id',
            'upload_path'       => 'uploads/perkembangan_anak/'
        ]);
	}

	/**
	* Get Image Perkembangan Anak	* 
	* @return JSON
	*/
	public function get_perkembangan_foto_file($id) {
		if (!$this->is_allowed('perkembangan_anak_update', false)) {
			echo json_encode([
				'success' => false,
				'message' => 'Image not loaded, you do not have permission to access'
				]);
			exit;
		}

		$perkembangan_anak = $this->model_perkembangan_anak->find($id);

		echo $this->get_file([
            'uuid'              => $id, 
            'delete_by'         => 'id', 
            'field_name'        => 'perkembangan_foto', 
            'table_name'        => 'perkembangan_anak',
            'primary_key'       => 'perkembangan_id',
            'upload_path'       => 'uploads/perkembangan_anak/',
            'delete_endpoint'   => 'administrator/perkembangan_anak/delete_perkembangan_foto_file'
        ]);
	}
	
	/**
	* Export to excel
	*
	* @return Files Excel .xls
	*/
	public function export() {
		$this->is_allowed('perkembangan_anak_export');

		$this->model_perkembangan_anak->export(
			'perkembangan_anak', 
			'perkembangan_anak',
			$this->model_perkembangan_anak->field_search
		);
	}

	/**
	* Export to PDF
	*
	* @return Files PDF .pdf
	*/
	public function export_pdf() {
		$this->is_allowed('perkembangan_anak_export');

		$this->model_perkembangan_anak->pdf('perkembangan_anak', 'perkembangan_anak');
	}


	public function single_pdf($id = null) {
		$this->is_allowed('perkembangan_anak_export');

		$table = $title = 'perkembangan_anak';
		$this->load->library('HtmlPdf');
      
        $config = array(
            'orientation' => 'p',
            'format' => 'a4',
            'marges' => array(5, 5, 5, 5)
        );

        $this->pdf = new HtmlPdf($config);
        $this->pdf->setDefaultFont('stsongstdlight'); 

        $result = $this->db->get($table);
       
        $data = $this->model_perkembangan_anak->find($id);
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



	/* DATA PERKEMBANGAN ANAK */

	public function view_perkembangan() {
		$this->is_allowed('detail_perkembangan_anak');
		$id_anak = $this->input->get('anak');

		$this->model_perkembangan_anak->join_perkembangan_anak()->filter_avaiable();
		$this->data['data_perkembangan_anak'] = $this->db->where('anak_id', $id_anak)->get('data_anak')->row();

		$nik_anak = '';
		if ($this->data['data_perkembangan_anak']->anak_nik != null) {
			$nik_anak = ' ('.$this->data['data_perkembangan_anak']->anak_nik.')';
		}

		$this->template->title('Detail Perkembangan Anak '.$this->data['data_perkembangan_anak']->anak_nama.$nik_anak);
		$this->render('backend/standart/administrator/perkembangan_anak/view_perkembangan_anak', $this->data);
	}

	public function add_perkembangan() {
		$this->is_allowed('perkembangan_anak_add');

		$this->data['id_anak'] = $this->input->get('id');

		$this->template->title('Perkembangan Anak New');
		$this->render('backend/standart/administrator/perkembangan_anak/add_perkembangan_anak', $this->data);
	}

	public function add_save_perkembangan() {
		if (!$this->is_allowed('perkembangan_anak_add', false)) {
			echo json_encode([
				'success' => false,
				'message' => cclang('sorry_you_do_not_have_permission_to_access')
			]);

			exit;
		}

		$this->form_validation->set_rules('perkembangan_tgl', 'Tanggal Perkembangan', 'trim|required');
		$this->form_validation->set_rules('perkembangan_anak_perkembangan_foto_name[]', 'Foto Kegiatan Perkembangan', 'trim|required');

		$id_anak = $this->input->get('anak');

		if ($this->form_validation->run()) {
			$save_data = [
				'perkembangan_anak_id' 		=> $id_anak,
				'perkembangan_tgl' 			=> $this->input->post('perkembangan_tgl'),
				'perkembangan_deskripsi' 	=> $this->input->post('perkembangan_deskripsi'),
				'perkembangan_indikasi' 	=> $this->input->post('perkembangan_indikasi'),
				'perkembangan_keterangan' 	=> $this->input->post('perkembangan_keterangan'),
				'perkembangan_user_created' => get_user_data('id'),
				'perkembangan_created_at' 	=> date('Y-m-d H:i:s'),
			];

			if (!is_dir(FCPATH . 'uploads/perkembangan_anak/')) {
				mkdir(FCPATH . 'uploads/perkembangan_anak/');
			}

			if (count((array) $this->input->post('perkembangan_anak_perkembangan_foto_name'))) {
				foreach ((array) $_POST['perkembangan_anak_perkembangan_foto_name'] as $idx => $file_name) {
					$perkembangan_anak_perkembangan_foto_name_copy = date('YmdHis') . '-' . $file_name;

					rename(FCPATH . 'uploads/tmp/' . $_POST['perkembangan_anak_perkembangan_foto_uuid'][$idx] . '/' .  $file_name, 
							FCPATH . 'uploads/perkembangan_anak/' . $perkembangan_anak_perkembangan_foto_name_copy);

					$listed_image[] = $perkembangan_anak_perkembangan_foto_name_copy;

					if (!is_file(FCPATH . 'uploads/perkembangan_anak/' . $perkembangan_anak_perkembangan_foto_name_copy)) {
						echo json_encode([
							'success' => false,
							'message' => 'Error uploading file'
							]);
						exit;
					}
				}

				$save_data['perkembangan_foto'] = implode(', ', $listed_image);
			}
			
			$save_perkembangan_anak = $id = $this->model_perkembangan_anak->store($save_data);

			if ($save_perkembangan_anak) {
				$id = $save_perkembangan_anak;
				
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = true;
					$this->data['id'] 	   = $save_perkembangan_anak;
					$this->data['message'] = cclang('success_save_data_stay', [
						anchor('administrator/perkembangan_anak/edit_perkembangan?id='.$id, 'Edit Perkembangan Anak'),
						anchor('administrator/perkembangan_anak', ' Go back to list')
					]);
				} else {
					set_message(
						cclang('success_save_data_redirect', [
						anchor('administrator/perkembangan_anak/edit_perkembangan?id='.$id, 'Edit Perkembangan Anak')
					]), 'success');

            		$this->data['success'] = true;
					$this->data['redirect'] = base_url('administrator/perkembangan_anak/view_perkembangan?anak='.$id_anak);
				}
			} else {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = false;
					$this->data['message'] = cclang('data_not_change');
				} else {
            		$this->data['success'] = false;
            		$this->data['message'] = cclang('data_not_change');
					$this->data['redirect'] = base_url('administrator/perkembangan_anak/view_perkembangan?anak='.$id_anak);
				}
			}
		} else {
			$this->data['success'] = false;
			$this->data['message'] = 'Opss validation failed';
			$this->data['errors'] = $this->form_validation->error_array();
		}

		$this->response($this->data);
	}

	public function edit_perkembangan() {
		$this->is_allowed('perkembangan_anak_update');

		$id = $this->input->get('id');

		$this->db->join('data_anak', 'anak_id = perkembangan_anak_id', 'LEFT');
		$this->data['perkembangan_anak'] = $this->model_perkembangan_anak->find($id);

		$this->template->title('Perkembangan Anak Update');
		$this->render('backend/standart/administrator/perkembangan_anak/update_perkembangan_anak', $this->data);
	}

	public function edit_save_perkembangan($id) {
		if (!$this->is_allowed('perkembangan_anak_update', false)) {
			echo json_encode([
				'success' => false,
				'message' => cclang('sorry_you_do_not_have_permission_to_access')
				]);
			exit;
		}

		$this->form_validation->set_rules('perkembangan_tgl', 'Tanggal Perkembangan', 'trim|required');
		$this->form_validation->set_rules('perkembangan_anak_perkembangan_foto_name[]', 'Foto Kegiatan Perkembangan', 'trim|required');

		$id_anak = db_get_all_data('perkembangan_anak', ['perkembangan_id' => $id])[0]->perkembangan_anak_id;

		if ($this->form_validation->run()) {
			$save_data = [
				'perkembangan_tgl' 			=> $this->input->post('perkembangan_tgl'),
				'perkembangan_deskripsi' 	=> $this->input->post('perkembangan_deskripsi'),
				'perkembangan_indikasi' 	=> $this->input->post('perkembangan_indikasi'),
				'perkembangan_keterangan' 	=> $this->input->post('perkembangan_keterangan'),
				'perkembangan_user_updated' => get_user_data('id'),
				'perkembangan_updated_at' 	=> date('Y-m-d H:i:s'),
			];

			$listed_image = [];
			if (count((array) $this->input->post('perkembangan_anak_perkembangan_foto_name'))) {
				foreach ((array) $_POST['perkembangan_anak_perkembangan_foto_name'] as $idx => $file_name) {
					if (isset($_POST['perkembangan_anak_perkembangan_foto_uuid'][$idx]) AND !empty($_POST['perkembangan_anak_perkembangan_foto_uuid'][$idx])) {
						$perkembangan_anak_perkembangan_foto_name_copy = date('YmdHis') . '-' . $file_name;

						rename(FCPATH . 'uploads/tmp/' . $_POST['perkembangan_anak_perkembangan_foto_uuid'][$idx] . '/' .  $file_name, 
								FCPATH . 'uploads/perkembangan_anak/' . $perkembangan_anak_perkembangan_foto_name_copy);

						$listed_image[] = $perkembangan_anak_perkembangan_foto_name_copy;

						if (!is_file(FCPATH . 'uploads/perkembangan_anak/' . $perkembangan_anak_perkembangan_foto_name_copy)) {
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
			
			$save_data['perkembangan_foto'] = implode(',', $listed_image);

			$save_perkembangan_anak = $this->model_perkembangan_anak->change($id, $save_data);

			if ($save_perkembangan_anak) {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = true;
					$this->data['id'] 	   = $id;
					$this->data['message'] = cclang('success_update_data_stay', [
						anchor('administrator/perkembangan_anak/view_perkembangan?anak='.$id_anak, ' Go back to list')
					]);
				} else {
					set_message(
						cclang('success_update_data_redirect', [
					]), 'success');

            		$this->data['success'] = true;
					$this->data['redirect'] = base_url('administrator/perkembangan_anak/view_perkembangan?anak='.$id_anak);
				}
			} else {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = false;
					$this->data['message'] = cclang('data_not_change');
				} else {
            		$this->data['success'] = false;
            		$this->data['message'] = cclang('data_not_change');
					$this->data['redirect'] = base_url('administrator/perkembangan_anak/view_perkembangan?anak='.$id_anak);
				}
			}
		} else {
			$this->data['success'] = false;
			$this->data['message'] = 'Opss validation failed';
			$this->data['errors'] = $this->form_validation->error_array();
		}

		$this->response($this->data);
	}
}


/* End of file perkembangan_anak.php */
/* Location: ./application/controllers/administrator/Perkembangan Anak.php */