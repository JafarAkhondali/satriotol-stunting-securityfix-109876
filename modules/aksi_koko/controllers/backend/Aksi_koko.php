<?php
defined('BASEPATH') OR exit('No direct script access allowed');


/**
*| --------------------------------------------------------------------------
*| Aksi Koko Controller
*| --------------------------------------------------------------------------
*| Aksi Koko site
*|
*/
class Aksi_koko extends Admin {
	public function __construct() {
		parent::__construct();

		$this->load->model('model_aksi_koko');
		$this->load->model('group/model_group');
		$this->lang->load('web_lang', $this->current_lang);
	}

	/**
	* show all Aksi Kokos
	*
	* @var $offset String
	*/
	public function index($offset = 0) {
		$this->is_allowed('aksi_koko_list');

		$filter = $this->input->get('q');
		$field 	= $this->input->get('f');

		$this->data['aksi_kokos'] = $this->model_aksi_koko->get($filter, $field, $this->limit_page, $offset);
		$this->data['aksi_koko_counts'] = $this->model_aksi_koko->count_all($filter, $field);

		$config = [
			'base_url'     => 'administrator/aksi_koko/index/',
			'total_rows'   => $this->data['aksi_koko_counts'],
			'per_page'     => $this->limit_page,
			'uri_segment'  => 4,
		];

		$this->data['pagination'] = $this->pagination($config);

		$this->template->title('Konten Aksi Konvergensi List');
		$this->render('backend/standart/administrator/aksi_koko/aksi_koko_list', $this->data);
	}
	
	/**
	* Add new aksi_kokos
	*
	*/
	public function add() {
		$this->is_allowed('aksi_koko_add');

		$this->template->title('Konten Aksi Konvergensi New');
		$this->render('backend/standart/administrator/aksi_koko/aksi_koko_add', $this->data);
	}

	/**
	* Add New Aksi Kokos
	*
	* @return JSON
	*/
	public function add_save() {
		if (!$this->is_allowed('aksi_koko_add', false)) {
			echo json_encode([
				'success' => false,
				'message' => cclang('sorry_you_do_not_have_permission_to_access')
				]);

			exit;
		}

		$this->form_validation->set_rules('aksi_koko_kategori', 'Kategori', 'trim|required');
		$this->form_validation->set_rules('aksi_koko_judul', 'Judul', 'trim|required');
		$this->form_validation->set_rules('aksi_koko_isi', 'Isi Konten', 'trim|required');

		$kategori = $this->input->post('aksi_koko_kategori');

		if ($this->form_validation->run()) {
			$this->db->update('aksi_koko', ['aksi_koko_status' => '0'], ['aksi_koko_kategori' => $kategori]);
			
			$save_data = [
				'aksi_koko_kategori' 	=> $kategori,
				'aksi_koko_judul' 		=> $this->input->post('aksi_koko_judul'),
				'aksi_koko_isi' 		=> $this->input->post('aksi_koko_isi'),
				'aksi_koko_status' 		=> '1',
				'aksi_koko_created_at' 	=> date('Y-m-d H:i:s'),
				'aksi_koko_user_id' 	=> get_user_data('id')
			];
			
			if (!is_dir(FCPATH . '/uploads/aksi_koko/')) {
				mkdir(FCPATH . '/uploads/aksi_koko/');
			}

			if (count((array) $this->input->post('aksi_koko_aksi_koko_media_name'))) {
				foreach ((array) $_POST['aksi_koko_aksi_koko_media_name'] as $idx => $file_name) {
					$aksi_koko_aksi_koko_media_name_copy = date('YmdHis') . '-' . $file_name;

					rename(FCPATH . 'uploads/tmp/' . $_POST['aksi_koko_aksi_koko_media_uuid'][$idx] . '/' .  $file_name, 
							FCPATH . 'uploads/aksi_koko/' . $aksi_koko_aksi_koko_media_name_copy);

					$listed_image[] = $aksi_koko_aksi_koko_media_name_copy;

					if (!is_file(FCPATH . '/uploads/aksi_koko/' . $aksi_koko_aksi_koko_media_name_copy)) {
						echo json_encode([
							'success' => false,
							'message' => 'Error uploading file'
							]);
						exit;
					}
				}

				$save_data['aksi_koko_media'] = implode(',', $listed_image);
			}

			$save_aksi_koko = $id = $this->model_aksi_koko->store($save_data);

			if ($save_aksi_koko) {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = true;
					$this->data['id'] 	   = $save_aksi_koko;
					$this->data['message'] = cclang('success_save_data_stay', [
						anchor('administrator/aksi_koko/edit/' . $save_aksi_koko, 'Edit Aksi Koko'),
						anchor('administrator/aksi_koko', ' Go back to list')
					]);
				} else {
					set_message(
						cclang('success_save_data_redirect', [
						anchor('administrator/aksi_koko/edit/' . $save_aksi_koko, 'Edit Aksi Koko')
					]), 'success');

            		$this->data['success'] = true;
					$this->data['redirect'] = base_url('administrator/aksi_koko');
				}
			} else {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = false;
					$this->data['message'] = cclang('data_not_change');
				} else {
            		$this->data['success'] = false;
            		$this->data['message'] = cclang('data_not_change');
					$this->data['redirect'] = base_url('administrator/aksi_koko');
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
	* Update view Aksi Kokos
	*
	* @var $id String
	*/
	public function edit($id) {
		$this->is_allowed('aksi_koko_update');

		$this->data['aksi_koko'] = $this->model_aksi_koko->find($id);

		$this->template->title('Konten Aksi Konvergensi Update');
		$this->render('backend/standart/administrator/aksi_koko/aksi_koko_update', $this->data);
	}

	/**
	* Update Aksi Kokos
	*
	* @var $id String
	*/
	public function edit_save($id) {
		if (!$this->is_allowed('aksi_koko_update', false)) {
			echo json_encode([
				'success' => false,
				'message' => cclang('sorry_you_do_not_have_permission_to_access')
				]);
			exit;
		}

		$this->form_validation->set_rules('aksi_koko_kategori', 'Kategori', 'trim|required');
		$this->form_validation->set_rules('aksi_koko_judul', 'Judul', 'trim|required');
		$this->form_validation->set_rules('aksi_koko_isi', 'Isi Konten', 'trim|required');
		
		if ($this->form_validation->run()) {
			$save_data = [
				'aksi_koko_kategori' 	=> $this->input->post('aksi_koko_kategori'),
				'aksi_koko_judul' 		=> $this->input->post('aksi_koko_judul'),
				'aksi_koko_isi' 		=> $this->input->post('aksi_koko_isi'),
			];
			
			$listed_image = [];
			if (count((array) $this->input->post('aksi_koko_aksi_koko_media_name'))) {
				foreach ((array) $_POST['aksi_koko_aksi_koko_media_name'] as $idx => $file_name) {
					if (isset($_POST['aksi_koko_aksi_koko_media_uuid'][$idx]) AND !empty($_POST['aksi_koko_aksi_koko_media_uuid'][$idx])) {
						$aksi_koko_aksi_koko_media_name_copy = date('YmdHis') . '-' . $file_name;

						rename(FCPATH . 'uploads/tmp/' . $_POST['aksi_koko_aksi_koko_media_uuid'][$idx] . '/' .  $file_name, 
								FCPATH . 'uploads/aksi_koko/' . $aksi_koko_aksi_koko_media_name_copy);

						$listed_image[] = $aksi_koko_aksi_koko_media_name_copy;

						if (!is_file(FCPATH . '/uploads/aksi_koko/' . $aksi_koko_aksi_koko_media_name_copy)) {
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
			
			$save_data['aksi_koko_media'] = implode(',', $listed_image);
			
			$save_aksi_koko = $this->model_aksi_koko->change($id, $save_data);

			if ($save_aksi_koko) {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = true;
					$this->data['id'] 	   = $id;
					$this->data['message'] = cclang('success_update_data_stay', [
						anchor('administrator/aksi_koko', ' Go back to list')
					]);
				} else {
					set_message(
						cclang('success_update_data_redirect', [
					]), 'success');

            		$this->data['success'] = true;
					$this->data['redirect'] = base_url('administrator/aksi_koko');
				}
			} else {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = false;
					$this->data['message'] = cclang('data_not_change');
				} else {
            		$this->data['success'] = false;
            		$this->data['message'] = cclang('data_not_change');
					$this->data['redirect'] = base_url('administrator/aksi_koko');
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
	* delete Aksi Kokos
	*
	* @var $id String
	*/
	public function delete($id = null) {
		$this->is_allowed('aksi_koko_delete');

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
            set_message(cclang('has_been_deleted', 'aksi_koko'), 'success');
        } else {
            set_message(cclang('error_delete', 'aksi_koko'), 'error');
        }

		redirect_back();
	}

	public function status_data($id) {
		$this->is_allowed('aksi_koko_aktif');
		$this->is_allowed('aksi_koko_nonaktif');

		$get = $this->input->get('get');

		if ($get == '0') {
			$status = $this->db->update('aksi_koko', ['aksi_koko_status' => '0'], ['aksi_koko_id' => $id]);
		}else if ($get == '1') {
			$koko = $this->db->where('aksi_koko_id', $id)->get('aksi_koko')->row();

			$this->db->update('aksi_koko', ['aksi_koko_status' => '0'], ['aksi_koko_kategori' => $koko->aksi_koko_kategori]);

			$status = $this->db->update('aksi_koko', ['aksi_koko_status' => '1'], ['aksi_koko_id' => $id]);
		}

		if ($status) {
            set_message('Data berhasil diperbarui!', 'success');
        } else {
            set_message('Data gagal diperbarui!', 'error');
        }

		// echo $this->db->last_query();
		

		redirect_back();
	}

		/**
	* View view Aksi Kokos
	*
	* @var $id String
	*/
	public function view($id)
	{
		$this->is_allowed('aksi_koko_view');

		$this->data['aksi_koko'] = $this->model_aksi_koko->join_avaiable()->filter_avaiable()->find($id);

		$this->template->title('Konten Aksi Konvergensi Detail');
		$this->render('backend/standart/administrator/aksi_koko/aksi_koko_view', $this->data);
	}
	
	/**
	* delete Aksi Kokos
	*
	* @var $id String
	*/
	private function _remove($id)
	{
		$aksi_koko = $this->model_aksi_koko->find($id);

		
		if (!empty($aksi_koko->aksi_koko_media)) {
			foreach ((array) explode(',', $aksi_koko->aksi_koko_media) as $filename) {
				$path = FCPATH . '/uploads/aksi_koko/' . $filename;

				if (is_file($path)) {
					$delete_file = unlink($path);
				}
			}
		}
		
		return $this->model_aksi_koko->remove($id);
	}
	
	
	/**
	* Upload Image Aksi Koko	* 
	* @return JSON
	*/
	public function upload_aksi_koko_media_file()
	{
		if (!$this->is_allowed('aksi_koko_add', false)) {
			echo json_encode([
				'success' => false,
				'message' => cclang('sorry_you_do_not_have_permission_to_access')
				]);
			exit;
		}

		$uuid = $this->input->post('qquuid');

		echo $this->upload_file([
			'uuid' 		 	=> $uuid,
			'table_name' 	=> 'aksi_koko',
		]);
	}

	/**
	* Delete Image Aksi Koko	* 
	* @return JSON
	*/
	public function delete_aksi_koko_media_file($uuid)
	{
		if (!$this->is_allowed('aksi_koko_delete', false)) {
			echo json_encode([
				'success' => false,
				'error' => cclang('sorry_you_do_not_have_permission_to_access')
				]);
			exit;
		}

		echo $this->delete_file([
            'uuid'              => $uuid, 
            'delete_by'         => $this->input->get('by'), 
            'field_name'        => 'aksi_koko_media', 
            'upload_path_tmp'   => './uploads/tmp/',
            'table_name'        => 'aksi_koko',
            'primary_key'       => 'aksi_koko_id',
            'upload_path'       => 'uploads/aksi_koko/'
        ]);
	}

	/**
	* Get Image Aksi Koko	* 
	* @return JSON
	*/
	public function get_aksi_koko_media_file($id)
	{
		if (!$this->is_allowed('aksi_koko_update', false)) {
			echo json_encode([
				'success' => false,
				'message' => 'Image not loaded, you do not have permission to access'
				]);
			exit;
		}

		$aksi_koko = $this->model_aksi_koko->find($id);

		echo $this->get_file([
            'uuid'              => $id, 
            'delete_by'         => 'id', 
            'field_name'        => 'aksi_koko_media', 
            'table_name'        => 'aksi_koko',
            'primary_key'       => 'aksi_koko_id',
            'upload_path'       => 'uploads/aksi_koko/',
            'delete_endpoint'   => 'administrator/aksi_koko/delete_aksi_koko_media_file'
        ]);
	}
	
	/**
	* Export to excel
	*
	* @return Files Excel .xls
	*/
	public function export()
	{
		$this->is_allowed('aksi_koko_export');

		$this->model_aksi_koko->export(
			'aksi_koko', 
			'aksi_koko',
			$this->model_aksi_koko->field_search
		);
	}

	/**
	* Export to PDF
	*
	* @return Files PDF .pdf
	*/
	public function export_pdf()
	{
		$this->is_allowed('aksi_koko_export');

		$this->model_aksi_koko->pdf('aksi_koko', 'aksi_koko');
	}


	public function single_pdf($id = null)
	{
		$this->is_allowed('aksi_koko_export');

		$table = $title = 'aksi_koko';
		$this->load->library('HtmlPdf');
      
        $config = array(
            'orientation' => 'p',
            'format' => 'a4',
            'marges' => array(5, 5, 5, 5)
        );

        $this->pdf = new HtmlPdf($config);
        $this->pdf->setDefaultFont('stsongstdlight'); 

        $result = $this->db->get($table);
       
        $data = $this->model_aksi_koko->find($id);
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


/* End of file aksi_koko.php */
/* Location: ./application/controllers/administrator/Aksi Koko.php */