<?php
defined('BASEPATH') OR exit('No direct script access allowed');


/**
*| --------------------------------------------------------------------------
*| Analisa Situasi Controller
*| --------------------------------------------------------------------------
*| Analisa Situasi site
*|
*/
class Analisa_situasi extends Admin	{
	public function __construct(){
		parent::__construct();

		$this->load->model('model_analisa_situasi');
		$this->load->model('group/model_group');
		$this->lang->load('web_lang', $this->current_lang);
	}

	/**
	* show all Analisa Situasis
	*
	* @var $offset String
	*/
	public function index($offset = 0) {
		$this->is_allowed('analisa_situasi_list');

		$filter = $this->input->get('q');
		$field 	= $this->input->get('f');

		$this->data['analisa_situasis'] 		= $this->model_analisa_situasi->get($filter, $field, $this->limit_page, $offset);
		$this->data['analisa_situasi_counts'] 	= $this->model_analisa_situasi->count_all($filter, $field);

		$config = [
			'base_url'     => 'administrator/analisa_situasi/index/',
			'total_rows'   => $this->data['analisa_situasi_counts'],
			'per_page'     => $this->limit_page,
			'uri_segment'  => 4,
		];

		$this->data['pagination'] = $this->pagination($config);

		$this->template->title('Analisa Situasi List');
		$this->render('backend/standart/administrator/analisa_situasi/analisa_situasi_list', $this->data);
	}
	
	/**
	* Add new analisa_situasis
	*
	*/
	public function add() {
		$this->is_allowed('analisa_situasi_add');

		$this->template->title('Analisa Situasi New');
		$this->render('backend/standart/administrator/analisa_situasi/analisa_situasi_add', $this->data);
	}

	/**
	* Add New Analisa Situasis
	*
	* @return JSON
	*/
	public function add_save() {
		if (!$this->is_allowed('analisa_situasi_add', false)) {
			echo json_encode([
				'success' => false,
				'message' => cclang('sorry_you_do_not_have_permission_to_access')
				]);
			exit;
		}

		$this->form_validation->set_rules('analisa_situasi_year', 'Tahun', 'trim|required|max_length[10]');
		$this->form_validation->set_rules('analisa_situasi_analisa_situasi_image_name', 'Gambar', 'trim|required');

		if ($this->form_validation->run()) {
			$analisa_situasi_analisa_situasi_image_uuid = $this->input->post('analisa_situasi_analisa_situasi_image_uuid');
			$analisa_situasi_analisa_situasi_image_name = $this->input->post('analisa_situasi_analisa_situasi_image_name');
		
			$save_data = [
				'analisa_situasi_year' 		=> $this->input->post('analisa_situasi_year'),
				'analisa_situasi_create_at' => date('Y-m-d H:i:s'),
				'analisa_situasi_user' 		=> get_user_data('id'),
			];
			
			if (!is_dir(FCPATH . '/uploads/analisa_situasi/')) {
				mkdir(FCPATH . '/uploads/analisa_situasi/');
			}

			if (!empty($analisa_situasi_analisa_situasi_image_name)) {
				$analisa_situasi_analisa_situasi_image_name_copy = date('YmdHis') . '-' . $analisa_situasi_analisa_situasi_image_name;

				rename(FCPATH . 'uploads/tmp/' . $analisa_situasi_analisa_situasi_image_uuid . '/' . $analisa_situasi_analisa_situasi_image_name, 
						FCPATH . 'uploads/analisa_situasi/' . $analisa_situasi_analisa_situasi_image_name_copy);

				if (!is_file(FCPATH . '/uploads/analisa_situasi/' . $analisa_situasi_analisa_situasi_image_name_copy)) {
					echo json_encode([
						'success' => false,
						'message' => 'Error uploading file'
						]);
					exit;
				}

				$save_data['analisa_situasi_image'] = $analisa_situasi_analisa_situasi_image_name_copy;
			}
			
			$save_analisa_situasi = $id = $this->model_analisa_situasi->store($save_data);

			if ($save_analisa_situasi) {
				$id = $save_analisa_situasi;

				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = true;
					$this->data['id'] 	   = $save_analisa_situasi;
					$this->data['message'] = cclang('success_save_data_stay', [
						anchor('administrator/analisa_situasi/edit/' . $save_analisa_situasi, 'Edit Analisa Situasi'),
						anchor('administrator/analisa_situasi', ' Go back to list')
					]);
				} else {
					set_message(
						cclang('success_save_data_redirect', [
						anchor('administrator/analisa_situasi/edit/' . $save_analisa_situasi, 'Edit Analisa Situasi')
					]), 'success');

            		$this->data['success'] = true;
					$this->data['redirect'] = base_url('administrator/analisa_situasi');
				}
			} else {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = false;
					$this->data['message'] = cclang('data_not_change');
				} else {
            		$this->data['success'] = false;
            		$this->data['message'] = cclang('data_not_change');
					$this->data['redirect'] = base_url('administrator/analisa_situasi');
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
	* Update view Analisa Situasis
	*
	* @var $id String
	*/
	public function edit($id) {
		$this->is_allowed('analisa_situasi_update');

		$this->data['analisa_situasi'] = $this->model_analisa_situasi->find($id);

		$this->template->title('Analisa Situasi Update');
		$this->render('backend/standart/administrator/analisa_situasi/analisa_situasi_update', $this->data);
	}

	/**
	* Update Analisa Situasis
	*
	* @var $id String
	*/
	public function edit_save($id) {
		if (!$this->is_allowed('analisa_situasi_update', false)) {
			echo json_encode([
				'success' => false,
				'message' => cclang('sorry_you_do_not_have_permission_to_access')
				]);
			exit;
		}

		$this->form_validation->set_rules('analisa_situasi_year', 'Tahun', 'trim|required|max_length[10]');
		$this->form_validation->set_rules('analisa_situasi_analisa_situasi_image_name', 'Gambar', 'trim|required');
		
		if ($this->form_validation->run()) {
			$analisa_situasi_analisa_situasi_image_uuid = $this->input->post('analisa_situasi_analisa_situasi_image_uuid');
			$analisa_situasi_analisa_situasi_image_name = $this->input->post('analisa_situasi_analisa_situasi_image_name');
		
			$save_data = [
				'analisa_situasi_year' => $this->input->post('analisa_situasi_year'),
			];
			
			if (!is_dir(FCPATH . '/uploads/analisa_situasi/')) {
				mkdir(FCPATH . '/uploads/analisa_situasi/');
			}

			if (!empty($analisa_situasi_analisa_situasi_image_uuid)) {
				$analisa_situasi_analisa_situasi_image_name_copy = date('YmdHis') . '-' . $analisa_situasi_analisa_situasi_image_name;

				rename(FCPATH . 'uploads/tmp/' . $analisa_situasi_analisa_situasi_image_uuid . '/' . $analisa_situasi_analisa_situasi_image_name, 
						FCPATH . 'uploads/analisa_situasi/' . $analisa_situasi_analisa_situasi_image_name_copy);

				if (!is_file(FCPATH . '/uploads/analisa_situasi/' . $analisa_situasi_analisa_situasi_image_name_copy)) {
					echo json_encode([
						'success' => false,
						'message' => 'Error uploading file'
						]);
					exit;
				}

				$save_data['analisa_situasi_image'] = $analisa_situasi_analisa_situasi_image_name_copy;
			}

			$save_analisa_situasi = $this->model_analisa_situasi->change($id, $save_data);

			if ($save_analisa_situasi) {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = true;
					$this->data['id'] 	   = $id;
					$this->data['message'] = cclang('success_update_data_stay', [
						anchor('administrator/analisa_situasi', ' Go back to list')
					]);
				} else {
					set_message(
						cclang('success_update_data_redirect', [
					]), 'success');

            		$this->data['success'] = true;
					$this->data['redirect'] = base_url('administrator/analisa_situasi');
				}
			} else {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = false;
					$this->data['message'] = cclang('data_not_change');
				} else {
            		$this->data['success'] = false;
            		$this->data['message'] = cclang('data_not_change');
					$this->data['redirect'] = base_url('administrator/analisa_situasi');
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
	* delete Analisa Situasis
	*
	* @var $id String
	*/
	public function delete($id = null) {
		$this->is_allowed('analisa_situasi_delete');

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
            set_message(cclang('has_been_deleted', 'analisa_situasi'), 'success');
        } else {
            set_message(cclang('error_delete', 'analisa_situasi'), 'error');
        }

		redirect_back();
	}

		/**
	* View view Analisa Situasis
	*
	* @var $id String
	*/
	public function view($id) {
		$this->is_allowed('analisa_situasi_view');

		$this->data['analisa_situasi'] = $this->model_analisa_situasi->join_avaiable()->filter_avaiable()->find($id);

		$this->template->title('Analisa Situasi Detail');
		$this->render('backend/standart/administrator/analisa_situasi/analisa_situasi_view', $this->data);
	}

	public function ajax_data_aksi_analisa() {
		$id 	= $this->input->get('id');
		$list 	= $this->model_analisa_situasi->get_datatables_aksi_analisa($id);
		$data 	= array();
		$no 	= $_POST['start'];
		
		foreach ($list as $field) {
			$no++;
			$row 	= array();
			$row[] 	= $no.'.';
			$row[] 	= $field->analisa_situasi_aksi_indikator;
			$row[] 	= $field->analisa_situasi_aksi_cakupan;
			$row[] 	= '<div id="colorSelector"><div style="background-color: '.$field->analisa_situasi_aksi_warna.'"></div></div>';

			$data[] = $row;
		}

		$output = [
			"draw" 				=> $_POST['draw'],
			"recordsTotal" 		=> $this->model_analisa_situasi->count_all_aksi_analisa($id),
			"recordsFiltered" 	=> $this->model_analisa_situasi->count_filtered($id),
			"data" 				=> $data,
		];

		echo json_encode($output);
	}
	
	/**
	* delete Analisa Situasis
	*
	* @var $id String
	*/
	private function _remove($id) {
		$analisa_situasi = $this->model_analisa_situasi->find($id);

		if (!empty($analisa_situasi->analisa_situasi_image)) {
			$path = FCPATH . '/uploads/analisa_situasi/' . $analisa_situasi->analisa_situasi_image;

			if (is_file($path)) {
				$delete_file = unlink($path);
			}
		}
		
		return $this->model_analisa_situasi->remove($id);
	}
	
	/**
	* Upload Image Analisa Situasi	* 
	* @return JSON
	*/
	public function upload_analisa_situasi_image_file() {
		if (!$this->is_allowed('analisa_situasi_add', false)) {
			echo json_encode([
				'success' => false,
				'message' => cclang('sorry_you_do_not_have_permission_to_access')
				]);
			exit;
		}

		$uuid = $this->input->post('qquuid');

		echo $this->upload_file([
			'uuid' 		 	=> $uuid,
			'table_name' 	=> 'analisa_situasi',
		]);
	}

	/**
	* Delete Image Analisa Situasi	* 
	* @return JSON
	*/
	public function delete_analisa_situasi_image_file($uuid) {
		if (!$this->is_allowed('analisa_situasi_delete', false)) {
			echo json_encode([
				'success' => false,
				'error' => cclang('sorry_you_do_not_have_permission_to_access')
				]);
			exit;
		}

		echo $this->delete_file([
            'uuid'              => $uuid, 
            'delete_by'         => $this->input->get('by'), 
            'field_name'        => 'analisa_situasi_image', 
            'upload_path_tmp'   => './uploads/tmp/',
            'table_name'        => 'analisa_situasi',
            'primary_key'       => 'analisa_situasi_id',
            'upload_path'       => 'uploads/analisa_situasi/'
        ]);
	}

	/**
	* Get Image Analisa Situasi	* 
	* @return JSON
	*/
	public function get_analisa_situasi_image_file($id) {
		if (!$this->is_allowed('analisa_situasi_update', false)) {
			echo json_encode([
				'success' => false,
				'message' => 'Image not loaded, you do not have permission to access'
				]);
			exit;
		}

		$analisa_situasi = $this->model_analisa_situasi->find($id);

		echo $this->get_file([
            'uuid'              => $id, 
            'delete_by'         => 'id', 
            'field_name'        => 'analisa_situasi_image', 
            'table_name'        => 'analisa_situasi',
            'primary_key'       => 'analisa_situasi_id',
            'upload_path'       => 'uploads/analisa_situasi/',
            'delete_endpoint'   => 'administrator/analisa_situasi/delete_analisa_situasi_image_file'
        ]);
	}
	
	
	/**
	* Export to excel
	*
	* @return Files Excel .xls
	*/
	public function export() {
		$this->is_allowed('analisa_situasi_export');

		$this->model_analisa_situasi->export(
			'analisa_situasi', 
			'analisa_situasi',
			$this->model_analisa_situasi->field_search
		);
	}

	/**
	* Export to PDF
	*
	* @return Files PDF .pdf
	*/
	public function export_pdf() {
		$this->is_allowed('analisa_situasi_export');

		$this->model_analisa_situasi->pdf('analisa_situasi', 'analisa_situasi');
	}


	public function single_pdf($id = null) {
		$this->is_allowed('analisa_situasi_export');

		$table = $title = 'analisa_situasi';
		$this->load->library('HtmlPdf');
      
        $config = array(
            'orientation' => 'p',
            'format' => 'a4',
            'marges' => array(5, 5, 5, 5)
        );

        $this->pdf = new HtmlPdf($config);
        $this->pdf->setDefaultFont('stsongstdlight'); 

        $result = $this->db->get($table);
       
        $data = $this->model_analisa_situasi->find($id);
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


/* End of file analisa_situasi.php */
/* Location: ./application/controllers/administrator/Analisa Situasi.php */