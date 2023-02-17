<?php
defined('BASEPATH') OR exit('No direct script access allowed');


/**
*| --------------------------------------------------------------------------
*| Data Stunting Controller
*| --------------------------------------------------------------------------
*| Data Stunting site
*|
*/
class Data_stunting extends Admin {
	public function __construct() {
		parent::__construct();

		$this->load->model('model_data_stunting');
		$this->load->model('group/model_group');
		$this->lang->load('web_lang', $this->current_lang);
	}

	/**
	* show all Data Stuntings
	*
	* @var $offset String
	*/
	public function index($offset = 0) {
		$this->is_allowed('data_stunting_list');

		$filter = $this->input->get('q');
		$field 	= $this->input->get('f');

		$this->data['data_stuntings'] 		= $this->model_data_stunting->get($filter, $field, $this->limit_page, $offset);
		$this->data['data_stunting_counts'] = $this->model_data_stunting->count_all($filter, $field);

		$config = [
			'base_url'     => 'administrator/data_stunting/index/',
			'total_rows'   => $this->data['data_stunting_counts'],
			'per_page'     => $this->limit_page,
			'uri_segment'  => 4,
		];

		$this->data['pagination'] = $this->pagination($config);

		$this->template->title('Data Stunting List');
		$this->render('backend/standart/administrator/data_stunting/data_stunting_list', $this->data);
	}
	
	/**
	* Add new data_stuntings
	*
	*/
	public function add() {
		$this->is_allowed('data_stunting_add');

		$this->template->title('Data Stunting New');
		$this->render('backend/standart/administrator/data_stunting/data_stunting_add', $this->data);
	}

	/**
	* Add New Data Stuntings
	*
	* @return JSON
	*/
	public function add_save() {
		if (!$this->is_allowed('data_stunting_add', false)) {
			echo json_encode([
				'success' => false,
				'message' => cclang('sorry_you_do_not_have_permission_to_access')
				]);
			exit;
		}
		
		

		$this->form_validation->set_rules('puskesmas', 'Puskesmas', 'trim|required');
		

		$this->form_validation->set_rules('kecamatan', 'Kecamatan', 'trim|required');
		

		$this->form_validation->set_rules('kelurahan', 'Kelurahan', 'trim|required');
		

		$this->form_validation->set_rules('no_kk', 'No. KK', 'trim|required');
		

		$this->form_validation->set_rules('nama_anak', 'Nama Anak', 'trim|required');
		

		$this->form_validation->set_rules('no_anak', 'Anak Ke-', 'trim|required');
		

		$this->form_validation->set_rules('jenis_kel', 'Jenis Kelamin', 'trim|required');
		

		$this->form_validation->set_rules('tanggal_lahir', 'Tanggal Lahir', 'trim|required');
		

		$this->form_validation->set_rules('alamat', 'Alamat', 'trim|required');
		

		$this->form_validation->set_rules('rt', 'RT', 'trim|required');
		

		$this->form_validation->set_rules('rw', 'RW', 'trim|required');
		

		$this->form_validation->set_rules('nama_ayah', 'Nama Ayah', 'trim|required');
		

		$this->form_validation->set_rules('nama_ibu', 'Nama Ibu', 'trim|required');
		

		

		if ($this->form_validation->run()) {
		
			$save_data = [
				'puskesmas' => $this->input->post('puskesmas'),
				'kecamatan' => $this->input->post('kecamatan'),
				'kelurahan' => $this->input->post('kelurahan'),
				'no_kk' => $this->input->post('no_kk'),
				'nik_anak' => $this->input->post('nik_anak'),
				'nama_anak' => $this->input->post('nama_anak'),
				'no_anak' => $this->input->post('no_anak'),
				'jenis_kel' => $this->input->post('jenis_kel'),
				'tanggal_lahir' => $this->input->post('tanggal_lahir'),
				'alamat' => $this->input->post('alamat'),
				'rt' => $this->input->post('rt'),
				'rw' => $this->input->post('rw'),
				'nik_ayah' => $this->input->post('nik_ayah'),
				'nama_ayah' => $this->input->post('nama_ayah'),
				'nik_ibu' => $this->input->post('nik_ibu'),
				'nama_ibu' => $this->input->post('nama_ibu'),
				'user_created' => get_user_data('id'),				'created_at' => date('Y-m-d H:i:s'),
			];

			
			
//$save_data['_example'] = $this->input->post('_example');
			



			
			
			$save_data_stunting = $id = $this->model_data_stunting->store($save_data);
            

			if ($save_data_stunting) {
				
				$id = $save_data_stunting;
				
				
					
				
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = true;
					$this->data['id'] 	   = $save_data_stunting;
					$this->data['message'] = cclang('success_save_data_stay', [
						anchor('administrator/data_stunting/edit/' . $save_data_stunting, 'Edit Data Stunting'),
						anchor('administrator/data_stunting', ' Go back to list')
					]);
				} else {
					set_message(
						cclang('success_save_data_redirect', [
						anchor('administrator/data_stunting/edit/' . $save_data_stunting, 'Edit Data Stunting')
					]), 'success');

            		$this->data['success'] = true;
					$this->data['redirect'] = base_url('administrator/data_stunting');
				}
			} else {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = false;
					$this->data['message'] = cclang('data_not_change');
				} else {
            		$this->data['success'] = false;
            		$this->data['message'] = cclang('data_not_change');
					$this->data['redirect'] = base_url('administrator/data_stunting');
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
	* Update view Data Stuntings
	*
	* @var $id String
	*/
	public function edit($id)
	{
		$this->is_allowed('data_stunting_update');

		$this->data['data_stunting'] = $this->model_data_stunting->find($id);

		$this->template->title('Data Stunting Update');
		$this->render('backend/standart/administrator/data_stunting/data_stunting_update', $this->data);
	}

	/**
	* Update Data Stuntings
	*
	* @var $id String
	*/
	public function edit_save($id)
	{
		if (!$this->is_allowed('data_stunting_update', false)) {
			echo json_encode([
				'success' => false,
				'message' => cclang('sorry_you_do_not_have_permission_to_access')
				]);
			exit;
		}
				$this->form_validation->set_rules('puskesmas', 'Puskesmas', 'trim|required');
		

		$this->form_validation->set_rules('kecamatan', 'Kecamatan', 'trim|required');
		

		$this->form_validation->set_rules('kelurahan', 'Kelurahan', 'trim|required');
		

		$this->form_validation->set_rules('no_kk', 'No. KK', 'trim|required');
		

		$this->form_validation->set_rules('nama_anak', 'Nama Anak', 'trim|required');
		

		$this->form_validation->set_rules('no_anak', 'Anak Ke-', 'trim|required');
		

		$this->form_validation->set_rules('jenis_kel', 'Jenis Kelamin', 'trim|required');
		

		$this->form_validation->set_rules('tanggal_lahir', 'Tanggal Lahir', 'trim|required');
		

		$this->form_validation->set_rules('alamat', 'Alamat', 'trim|required');
		

		$this->form_validation->set_rules('rt', 'RT', 'trim|required');
		

		$this->form_validation->set_rules('rw', 'RW', 'trim|required');
		

		$this->form_validation->set_rules('nama_ayah', 'Nama Ayah', 'trim|required');
		

		$this->form_validation->set_rules('nama_ibu', 'Nama Ibu', 'trim|required');
		

		
		if ($this->form_validation->run()) {
		
			$save_data = [
				'puskesmas' => $this->input->post('puskesmas'),
				'kecamatan' => $this->input->post('kecamatan'),
				'kelurahan' => $this->input->post('kelurahan'),
				'no_kk' => $this->input->post('no_kk'),
				'nik_anak' => $this->input->post('nik_anak'),
				'nama_anak' => $this->input->post('nama_anak'),
				'no_anak' => $this->input->post('no_anak'),
				'jenis_kel' => $this->input->post('jenis_kel'),
				'tanggal_lahir' => $this->input->post('tanggal_lahir'),
				'alamat' => $this->input->post('alamat'),
				'rt' => $this->input->post('rt'),
				'rw' => $this->input->post('rw'),
				'nik_ayah' => $this->input->post('nik_ayah'),
				'nama_ayah' => $this->input->post('nama_ayah'),
				'nik_ibu' => $this->input->post('nik_ibu'),
				'nama_ibu' => $this->input->post('nama_ibu'),
			];

			

			
//$save_data['_example'] = $this->input->post('_example');
			


			
			
			$save_data_stunting = $this->model_data_stunting->change($id, $save_data);

			if ($save_data_stunting) {

				
				

				
				
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = true;
					$this->data['id'] 	   = $id;
					$this->data['message'] = cclang('success_update_data_stay', [
						anchor('administrator/data_stunting', ' Go back to list')
					]);
				} else {
					set_message(
						cclang('success_update_data_redirect', [
					]), 'success');

            		$this->data['success'] = true;
					$this->data['redirect'] = base_url('administrator/data_stunting');
				}
			} else {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = false;
					$this->data['message'] = cclang('data_not_change');
				} else {
            		$this->data['success'] = false;
            		$this->data['message'] = cclang('data_not_change');
					$this->data['redirect'] = base_url('administrator/data_stunting');
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
	* delete Data Stuntings
	*
	* @var $id String
	*/
	public function delete($id = null)
	{
		$this->is_allowed('data_stunting_delete');

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
            set_message(cclang('has_been_deleted', 'data_stunting'), 'success');
        } else {
            set_message(cclang('error_delete', 'data_stunting'), 'error');
        }

		redirect_back();
	}

		/**
	* View view Data Stuntings
	*
	* @var $id String
	*/
	public function view($id)
	{
		$this->is_allowed('data_stunting_view');

		$this->data['data_stunting'] = $this->model_data_stunting->join_avaiable()->filter_avaiable()->find($id);

		$this->template->title('Data Stunting Detail');
		$this->render('backend/standart/administrator/data_stunting/data_stunting_view', $this->data);
	}
	
	/**
	* delete Data Stuntings
	*
	* @var $id String
	*/
	private function _remove($id)
	{
		$data_stunting = $this->model_data_stunting->find($id);

		
		
		return $this->model_data_stunting->remove($id);
	}
	
	
	/**
	* Export to excel
	*
	* @return Files Excel .xls
	*/
	public function export()
	{
		$this->is_allowed('data_stunting_export');

		$this->model_data_stunting->export(
			'data_stunting', 
			'data_stunting',
			$this->model_data_stunting->field_search
		);
	}

	/**
	* Export to PDF
	*
	* @return Files PDF .pdf
	*/
	public function export_pdf()
	{
		$this->is_allowed('data_stunting_export');

		$this->model_data_stunting->pdf('data_stunting', 'data_stunting');
	}


	public function single_pdf($id = null)
	{
		$this->is_allowed('data_stunting_export');

		$table = $title = 'data_stunting';
		$this->load->library('HtmlPdf');
      
        $config = array(
            'orientation' => 'p',
            'format' => 'a4',
            'marges' => array(5, 5, 5, 5)
        );

        $this->pdf = new HtmlPdf($config);
        $this->pdf->setDefaultFont('stsongstdlight'); 

        $result = $this->db->get($table);
       
        $data = $this->model_data_stunting->find($id);
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

	public function ajax_kelurahan($id = null)
	{
		if (!$this->is_allowed('data_stunting_list', false)) {
			echo json_encode([
				'success' => false,
				'message' => cclang('sorry_you_do_not_have_permission_to_access')
				]);
			exit;
		}
		$results = db_get_all_data('kelurahans', ['kecamatan_id' => $id]);
		$this->response($results);	
	}

	
}


/* End of file data_stunting.php */
/* Location: ./application/controllers/administrator/Data Stunting.php */