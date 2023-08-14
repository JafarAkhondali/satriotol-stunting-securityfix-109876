<?php
defined('BASEPATH') OR exit('No direct script access allowed');


/**
*| --------------------------------------------------------------------------
*| Data Intervensi Anak Controller
*| --------------------------------------------------------------------------
*| Data Intervensi Anak site
*|
*/
class Data_intervensi_anak extends Admin {
	public function __construct() {
		parent::__construct();

		$this->load->model('model_data_intervensi_anak');
		$this->load->model('group/model_group');
		$this->lang->load('web_lang', $this->current_lang);
	}

	/**
	* show all Data Intervensi Anaks
	*
	* @var $offset String
	*/
	public function index($offset = 0) {
		$this->is_allowed('data_intervensi_anak_list');

		$filter = $this->input->get('q');
		$field 	= $this->input->get('f');

		$this->data['data_intervensi_anaks'] 		= $this->model_data_intervensi_anak->get($filter, $field, $this->limit_page, $offset);
		$this->data['data_intervensi_anak_counts'] 	= $this->model_data_intervensi_anak->count_all($filter, $field);

		$config = [
			'base_url'     => 'administrator/data_intervensi_anak/index/',
			'total_rows'   => $this->data['data_intervensi_anak_counts'],
			'per_page'     => $this->limit_page,
			'uri_segment'  => 4,
		];

		$this->data['pagination'] = $this->pagination($config);

		$this->template->title('Data Intervensi Anak List');
		$this->render('backend/standart/administrator/data_intervensi_anak/data_intervensi_anak_list', $this->data);
	}
	
	/**
	* Add new data_intervensi_anaks
	*
	*/
	public function add() {
		$this->is_allowed('data_intervensi_anak_add');

		$this->template->title('Data Intervensi Anak New');
		$this->render('backend/standart/administrator/data_intervensi_anak/data_intervensi_anak_add', $this->data);
	}

	/**
	* Add New Data Intervensi Anaks
	*
	* @return JSON
	*/
	public function add_save() {
		if (!$this->is_allowed('data_intervensi_anak_add', false)) {
			echo json_encode([
				'success' => false,
				'message' => cclang('sorry_you_do_not_have_permission_to_access')
			]);
			exit;
		}

		$this->form_validation->set_rules('intervensi_kecamatan_id', 'Kecamatan', 'trim|required');
		

		$this->form_validation->set_rules('intervensi_kelurahan_id', 'Kelurahan', 'trim|required');
		

		$this->form_validation->set_rules('intervensi_anak_id', 'Nama Anak', 'trim|required');
		

		$this->form_validation->set_rules('intervensi_bulan', 'Bulan', 'trim|required');
		

		$this->form_validation->set_rules('intervensi_tgl_masuk', 'Tanggal', 'trim|required');

		$bulan_tahun = explode('-', $this->input->post('intervensi_bulan'));

		if ($this->form_validation->run()) {
			$save_data = [
				'intervensi_kecamatan_id' => $this->input->post('intervensi_kecamatan_id'),
				'intervensi_kelurahan_id' => $this->input->post('intervensi_kelurahan_id'),
				'intervensi_anak_id' => $this->input->post('intervensi_anak_id'),
				'intervensi_bulan' => $bulan_tahun[0],
				'intervensi_tahun' => $bulan_tahun[1],
				'intervensi_tgl_masuk' => $this->input->post('intervensi_tgl_masuk'),
				'intervensi_kondisi' => $this->input->post('intervensi_kondisi'),
				'intervensi_nama_ortu_asuh' => $this->input->post('intervensi_nama_ortu_asuh'),
				'intervensi_deskripsi' => $this->input->post('intervensi_deskripsi'),
				'intervensi_tgl_pasca' => $this->input->post('intervensi_tgl_pasca'),
				'intervensi_pasca' => $this->input->post('intervensi_pasca'),
				'intervensi_keterangan' => $this->input->post('intervensi_keterangan'),
				'intervensi_user_created' => get_user_data('id'),				'intervensi_created_at' => date('Y-m-d H:i:s'),
			];

			
			



			
			
			$save_data_intervensi_anak = $id = $this->model_data_intervensi_anak->store($save_data);
			

			if ($save_data_intervensi_anak) {
				
				
					
				
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = true;
					$this->data['id'] 	   = $save_data_intervensi_anak;
					$this->data['message'] = cclang('success_save_data_stay', [
						anchor('administrator/data_intervensi_anak/edit/' . $save_data_intervensi_anak, 'Edit Data Intervensi Anak'),
						anchor('administrator/data_intervensi_anak', ' Go back to list')
					]);
				} else {
					set_message(
						cclang('success_save_data_redirect', [
						anchor('administrator/data_intervensi_anak/edit/' . $save_data_intervensi_anak, 'Edit Data Intervensi Anak')
					]), 'success');

					$this->data['success'] = true;
					$this->data['redirect'] = base_url('administrator/data_intervensi_anak');
				}
			} else {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = false;
					$this->data['message'] = cclang('data_not_change');
				} else {
					$this->data['success'] = false;
					$this->data['message'] = cclang('data_not_change');
					$this->data['redirect'] = base_url('administrator/data_intervensi_anak');
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
	* Update view Data Intervensi Anaks
	*
	* @var $id String
	*/
	public function edit($id)
	{
		$this->is_allowed('data_intervensi_anak_update');

		$this->data['data_intervensi_anak'] = $this->model_data_intervensi_anak->find($id);

		$this->template->title('Data Intervensi Anak Update');
		$this->render('backend/standart/administrator/data_intervensi_anak/data_intervensi_anak_update', $this->data);
	}

	/**
	* Update Data Intervensi Anaks
	*
	* @var $id String
	*/
	public function edit_save($id)
	{
		if (!$this->is_allowed('data_intervensi_anak_update', false)) {
			echo json_encode([
				'success' => false,
				'message' => cclang('sorry_you_do_not_have_permission_to_access')
				]);
			exit;
		}
				$this->form_validation->set_rules('intervensi_kecamatan_id', 'Kecamatan', 'trim|required');
		

		$this->form_validation->set_rules('intervensi_kelurahan_id', 'Kelurahan', 'trim|required');
		

		$this->form_validation->set_rules('intervensi_anak_id', 'Nama Anak', 'trim|required');
		

		$this->form_validation->set_rules('intervensi_bulan', 'Bulan', 'trim|required');
		

		$this->form_validation->set_rules('intervensi_tahun', 'Tahun', 'trim|required');
		

		$this->form_validation->set_rules('intervensi_tgl_masuk', 'Tanggal', 'trim|required');
		

		
		if ($this->form_validation->run()) {
		
			$save_data = [
				'intervensi_kecamatan_id' => $this->input->post('intervensi_kecamatan_id'),
				'intervensi_kelurahan_id' => $this->input->post('intervensi_kelurahan_id'),
				'intervensi_anak_id' => $this->input->post('intervensi_anak_id'),
				'intervensi_bulan' => $this->input->post('intervensi_bulan'),
				'intervensi_tahun' => $this->input->post('intervensi_tahun'),
				'intervensi_tgl_masuk' => $this->input->post('intervensi_tgl_masuk'),
				'intervensi_kondisi' => $this->input->post('intervensi_kondisi'),
				'intervensi_nama_ortu_asuh' => $this->input->post('intervensi_nama_ortu_asuh'),
				'intervensi_deskripsi' => $this->input->post('intervensi_deskripsi'),
				'intervensi_tgl_pasca' => $this->input->post('intervensi_tgl_pasca'),
				'intervensi_pasca' => $this->input->post('intervensi_pasca'),
				'intervensi_keterangan' => $this->input->post('intervensi_keterangan'),
				'intervensi_user_updated' => get_user_data('id'),				'intervensi_updated_at' => date('Y-m-d H:i:s'),
			];

			

			


			
			
			$save_data_intervensi_anak = $this->model_data_intervensi_anak->change($id, $save_data);

			if ($save_data_intervensi_anak) {

				

				
				
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = true;
					$this->data['id'] 	   = $id;
					$this->data['message'] = cclang('success_update_data_stay', [
						anchor('administrator/data_intervensi_anak', ' Go back to list')
					]);
				} else {
					set_message(
						cclang('success_update_data_redirect', [
					]), 'success');

					$this->data['success'] = true;
					$this->data['redirect'] = base_url('administrator/data_intervensi_anak');
				}
			} else {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = false;
					$this->data['message'] = cclang('data_not_change');
				} else {
					$this->data['success'] = false;
					$this->data['message'] = cclang('data_not_change');
					$this->data['redirect'] = base_url('administrator/data_intervensi_anak');
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
	* delete Data Intervensi Anaks
	*
	* @var $id String
	*/
	public function delete($id = null)
	{
		$this->is_allowed('data_intervensi_anak_delete');

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
			set_message(cclang('has_been_deleted', 'data_intervensi_anak'), 'success');
		} else {
			set_message(cclang('error_delete', 'data_intervensi_anak'), 'error');
		}

		redirect_back();
	}

		/**
	* View view Data Intervensi Anaks
	*
	* @var $id String
	*/
	public function view($id)
	{
		$this->is_allowed('data_intervensi_anak_view');

		$this->data['data_intervensi_anak'] = $this->model_data_intervensi_anak->join_avaiable()->filter_avaiable()->find($id);

		$this->template->title('Data Intervensi Anak Detail');
		$this->render('backend/standart/administrator/data_intervensi_anak/data_intervensi_anak_view', $this->data);
	}
	
	/**
	* delete Data Intervensi Anaks
	*
	* @var $id String
	*/
	private function _remove($id)
	{
		$data_intervensi_anak = $this->model_data_intervensi_anak->find($id);

		
		
		return $this->model_data_intervensi_anak->remove($id);
	}
	
	
	/**
	* Export to excel
	*
	* @return Files Excel .xls
	*/
	public function export()
	{
		$this->is_allowed('data_intervensi_anak_export');

		$this->model_data_intervensi_anak->export(
			'data_intervensi_anak', 
			'data_intervensi_anak',
			$this->model_data_intervensi_anak->field_search
		);
	}

	/**
	* Export to PDF
	*
	* @return Files PDF .pdf
	*/
	public function export_pdf()
	{
		$this->is_allowed('data_intervensi_anak_export');

		$this->model_data_intervensi_anak->pdf('data_intervensi_anak', 'data_intervensi_anak');
	}


	public function single_pdf($id = null)
	{
		$this->is_allowed('data_intervensi_anak_export');

		$table = $title = 'data_intervensi_anak';
		$this->load->library('HtmlPdf');
	  
		$config = array(
			'orientation' => 'p',
			'format' => 'a4',
			'marges' => array(5, 5, 5, 5)
		);

		$this->pdf = new HtmlPdf($config);
		$this->pdf->setDefaultFont('stsongstdlight'); 

		$result = $this->db->get($table);
	   
		$data = $this->model_data_intervensi_anak->find($id);
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

	public function ajax_intervensi_kelurahan_id($id = null) {
		if (!$this->is_allowed('data_intervensi_anak_list', false)) {
			echo json_encode([
				'success' => false,
				'message' => cclang('sorry_you_do_not_have_permission_to_access')
			]);
			exit;
		}

		$results = db_get_all_data('kelurahans', ['kecamatan_id' => $id]);
		$this->response($results);	
	}

	public function view_intervensi() {
		$this->is_allowed('data_intervensi_anak_view');

		$id_anak = $this->input->get('anak');

		$this->model_data_intervensi_anak->join_intervensi()->filter_avaiable();
		$query_data = $this->db->where('anak_id', $id_anak)->get('data_anak');

		$this->data['data_intervensi_anak'] 	= $query_data->row();
		$this->data['query_intervensi_anak'] 	= $query_data->result();

		$this->template->title('Data Intervensi Anak Detail');
		$this->render('backend/standart/administrator/data_intervensi_anak/intervensi_anak_view', $this->data);
	}

	public function add_intervensi() {
		$this->is_allowed('data_intervensi_anak_add');

		$id_anak = $this->input->get('anak');

		$this->data['id_anak'] 		= $id_anak;
		$this->data['data_anak'] 	= db_get_all_data('data_anak', ['anak_id' => $id_anak])[0];

		$this->template->title('Data Intervensi Anak New');
		$this->render('backend/standart/administrator/data_intervensi_anak/intervensi_anak_add', $this->data);
	}

	public function add_save_intervensi() {
		if (!$this->is_allowed('data_intervensi_anak_add', false)) {
			echo json_encode([
				'success' => false,
				'message' => cclang('sorry_you_do_not_have_permission_to_access')
			]);
			exit;
		}

		$this->form_validation->set_rules('intervensi_kecamatan_id', 'Kecamatan', 'trim|required');
		$this->form_validation->set_rules('intervensi_kelurahan_id', 'Kelurahan', 'trim|required');
		$this->form_validation->set_rules('intervensi_bulan', 'Bulan', 'trim|required');
		$this->form_validation->set_rules('intervensi_tgl_masuk', 'Tanggal', 'trim|required');

		$bulan_tahun 	= explode('-', $this->input->post('intervensi_bulan'));
		$id_anak 		= $this->input->get('anak');

		if ($this->form_validation->run()) {
			$save_data = [
				'intervensi_kecamatan_id' 	=> $this->input->post('intervensi_kecamatan_id'),
				'intervensi_kelurahan_id' 	=> $this->input->post('intervensi_kelurahan_id'),
				'intervensi_anak_id' 		=> $id_anak,
				'intervensi_bulan' 			=> $bulan_tahun[1],
				'intervensi_tahun' 			=> $bulan_tahun[0],
				'intervensi_tgl_masuk' 		=> $this->input->post('intervensi_tgl_masuk'),
				'intervensi_kondisi' 		=> $this->input->post('intervensi_kondisi'),
				'intervensi_nama_ortu_asuh' => $this->input->post('intervensi_nama_ortu_asuh'),
				'intervensi_deskripsi' 		=> $this->input->post('intervensi_deskripsi'),
				'intervensi_tgl_pasca' 		=> !empty($this->input->post('intervensi_tgl_pasca')) ? $this->input->post('intervensi_tgl_pasca') : null,
				'intervensi_pasca' 			=> $this->input->post('intervensi_pasca'),
				'intervensi_keterangan' 	=> $this->input->post('intervensi_keterangan'),
				'intervensi_user_created' 	=> get_user_data('id'),
				'intervensi_created_at' 	=> date('Y-m-d H:i:s'),
			];

			$save_data_intervensi_anak = $id = $this->model_data_intervensi_anak->store($save_data);

			if ($save_data_intervensi_anak) {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = true;
					$this->data['id'] 	   = $save_data_intervensi_anak;
					$this->data['message'] = cclang('success_save_data_stay', [
						anchor('administrator/data_intervensi_anak/edit_intervensi/' . $save_data_intervensi_anak, 'Edit Data Intervensi Anak'),
						anchor('administrator/data_intervensi_anak/view_intervensi?anak='.$id_anak, ' Go back to list')
					]);
				} else {
					set_message(
						cclang('success_save_data_redirect', [
						anchor('administrator/data_intervensi_anak/edit_intrevensi/' . $save_data_intervensi_anak, 'Edit Data Intervensi Anak')
					]), 'success');

					$this->data['success'] = true;
					$this->data['redirect'] = base_url('administrator/data_intervensi_anak/view_intervensi?anak='.$id_anak);
				}
			} else {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = false;
					$this->data['message'] = cclang('data_not_change');
				} else {
					$this->data['success'] = false;
					$this->data['message'] = cclang('data_not_change');
					$this->data['redirect'] = base_url('administrator/data_intervensi_anak/view_intervensi?anak='.$id_anak);
				}
			}
		} else {
			$this->data['success'] = false;
			$this->data['message'] = 'Opss validation failed';
			$this->data['errors'] = $this->form_validation->error_array();
		}

		$this->response($this->data);
	}

	public function edit_intervensi($id) {
		$this->is_allowed('data_intervensi_anak_update');

		$this->data['data_intervensi_anak'] = $this->model_data_intervensi_anak->find($id);

		$this->template->title('Data Intervensi Anak New');
		$this->render('backend/standart/administrator/data_intervensi_anak/intervensi_anak_update', $this->data);
	}
	public function edit_save_intervensi($id) {
		if (!$this->is_allowed('data_intervensi_anak_update', false)) {
			echo json_encode([
				'success' => false,
				'message' => cclang('sorry_you_do_not_have_permission_to_access')
			]);
			exit;
		}

		$this->form_validation->set_rules('intervensi_kecamatan_id', 'Kecamatan', 'trim|required');
		$this->form_validation->set_rules('intervensi_kelurahan_id', 'Kelurahan', 'trim|required');
		$this->form_validation->set_rules('intervensi_bulan', 'Bulan', 'trim|required');
		$this->form_validation->set_rules('intervensi_tgl_masuk', 'Tanggal', 'trim|required');

		$bulan_tahun 	= explode('-', $this->input->post('intervensi_bulan'));
		$id_anak 		= $this->model_data_intervensi_anak->find($id)->intervensi_anak_id;
		
		if ($this->form_validation->run()) {
			$save_data = [
				'intervensi_kecamatan_id' 	=> $this->input->post('intervensi_kecamatan_id'),
				'intervensi_kelurahan_id' 	=> $this->input->post('intervensi_kelurahan_id'),
				'intervensi_tahun' 			=> $bulan_tahun[0],
				'intervensi_bulan' 			=> $bulan_tahun[1],
				'intervensi_tgl_masuk' 		=> $this->input->post('intervensi_tgl_masuk'),
				'intervensi_kondisi' 		=> $this->input->post('intervensi_kondisi'),
				'intervensi_nama_ortu_asuh' => $this->input->post('intervensi_nama_ortu_asuh'),
				'intervensi_deskripsi' 		=> $this->input->post('intervensi_deskripsi'),
				'intervensi_tgl_pasca' 		=> $this->input->post('intervensi_tgl_pasca'),
				'intervensi_pasca' 			=> $this->input->post('intervensi_pasca'),
				'intervensi_keterangan' 	=> $this->input->post('intervensi_keterangan'),
				'intervensi_user_updated' 	=> get_user_data('id'),
				'intervensi_updated_at' 	=> date('Y-m-d H:i:s'),
			];

			$save_data_intervensi_anak = $this->model_data_intervensi_anak->change($id, $save_data);

			if ($save_data_intervensi_anak) {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = true;
					$this->data['id'] 	   = $id;
					$this->data['message'] = cclang('success_update_data_stay', [
						anchor('administrator/data_intervensi_anak/view_intervensi?anak='.$id_anak, ' Go back to list')
					]);
				} else {
					set_message(
						cclang('success_update_data_redirect', [
					]), 'success');

					$this->data['success'] = true;
					$this->data['redirect'] = base_url('administrator/data_intervensi_anak/view_intervensi?anak='.$id_anak);
				}
			} else {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = false;
					$this->data['message'] = cclang('data_not_change');
				} else {
					$this->data['success'] = false;
					$this->data['message'] = cclang('data_not_change');
					$this->data['redirect'] = base_url('administrator/data_intervensi_anak/view_intervensi?anak='.$id_anak);
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


/* End of file data_intervensi_anak.php */
/* Location: ./application/controllers/administrator/Data Intervensi Anak.php */