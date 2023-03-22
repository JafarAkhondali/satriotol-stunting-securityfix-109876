<?php
defined('BASEPATH') OR exit('No direct script access allowed');


/**
*| --------------------------------------------------------------------------
*| Data Warga Controller
*| --------------------------------------------------------------------------
*| Data Warga site
*|
*/
class Data_warga extends Admin	
{
	
	public function __construct()
	{
		parent::__construct();

		$this->load->model('model_data_warga');
		$this->load->model('group/model_group');
		$this->lang->load('web_lang', $this->current_lang);
	}

	/**
	* show all Data Wargas
	*
	* @var $offset String
	*/
	public function index($offset = 0)
	{
		$this->is_allowed('data_warga_list');

		$filter = $this->input->get('q');
		$field 	= $this->input->get('f');

		$this->data['data_wargas'] = $this->model_data_warga->get($filter, $field, $this->limit_page, $offset);
		$this->data['data_warga_counts'] = $this->model_data_warga->count_all($filter, $field);

		$config = [
			'base_url'     => 'administrator/data_warga/index/',
			'total_rows'   => $this->data['data_warga_counts'],
			'per_page'     => $this->limit_page,
			'uri_segment'  => 4,
		];

		$this->data['pagination'] = $this->pagination($config);

		$this->template->title('Data Warga List');
		$this->render('backend/standart/administrator/data_warga/data_warga_list', $this->data);
	}
	
	/**
	* Add new data_wargas
	*
	*/
	public function add()
	{
		$this->is_allowed('data_warga_add');

		$this->template->title('Data Warga New');
		$this->render('backend/standart/administrator/data_warga/data_warga_add', $this->data);
	}

	/**
	* Add New Data Wargas
	*
	* @return JSON
	*/
	public function add_save()
	{
		if (!$this->is_allowed('data_warga_add', false)) {
			echo json_encode([
				'success' => false,
				'message' => cclang('sorry_you_do_not_have_permission_to_access')
				]);
			exit;
		}
		
		

		$this->form_validation->set_rules('dawar_nokk', 'No. KK', 'trim|required');
		

		$this->form_validation->set_rules('dawar_nik', 'NIK', 'trim|required');
		

		$this->form_validation->set_rules('dawar_nama_lengkap', 'Nama Lengkap', 'trim|required');
		

		$this->form_validation->set_rules('dawar_tp_lahir', 'Tempat Lahir', 'trim|required');
		

		$this->form_validation->set_rules('dawar_tgl_lahir', 'Tanggal Lahir', 'trim|required');
		

		$this->form_validation->set_rules('dawar_jenkel', 'Jenis Kelamin', 'trim|required');
		

		$this->form_validation->set_rules('dawar_hub_kel', 'Hubungan Keluarga', 'trim|required');
		

		$this->form_validation->set_rules('dawar_agama', 'Agama', 'trim|required');
		

		$this->form_validation->set_rules('dawar_status_kawin', 'Status Perkawinan', 'trim|required');
		

		$this->form_validation->set_rules('dawar_alamat', 'Alamat', 'trim|required');
		

		$this->form_validation->set_rules('dawar_rw', 'RW', 'trim|required');
		

		$this->form_validation->set_rules('dawar_rt', 'RT', 'trim|required');
		

		$this->form_validation->set_rules('dawar_kecamatan', 'Kecamatan', 'trim|required');
		

		$this->form_validation->set_rules('dawar_kelurahan', 'Kelurahan', 'trim|required');
		

		

		if ($this->form_validation->run()) {
		
			$save_data = [
				'dawar_identitas' => $this->input->post('dawar_identitas'),
				'dawar_nokk' => $this->input->post('dawar_nokk'),
				'dawar_nik' => $this->input->post('dawar_nik'),
				'dawar_nama_lengkap' => $this->input->post('dawar_nama_lengkap'),
				'dawar_tp_lahir' => $this->input->post('dawar_tp_lahir'),
				'dawar_tgl_lahir' => $this->input->post('dawar_tgl_lahir'),
				'dawar_jenkel' => $this->input->post('dawar_jenkel'),
				'dawar_hub_kel' => $this->input->post('dawar_hub_kel'),
				'dawar_agama' => $this->input->post('dawar_agama'),
				'dawar_pend_akhir' => $this->input->post('dawar_pend_akhir'),
				'dawar_jn_pekerjaan' => $this->input->post('dawar_jn_pekerjaan'),
				'dawar_status_kawin' => $this->input->post('dawar_status_kawin'),
				'dawar_alamat' => $this->input->post('dawar_alamat'),
				'dawar_rw' => $this->input->post('dawar_rw'),
				'dawar_rt' => $this->input->post('dawar_rt'),
				'dawar_kecamatan' => $this->input->post('dawar_kecamatan'),
				'dawar_kelurahan' => $this->input->post('dawar_kelurahan'),
				'dawar_created_at' => date('Y-m-d H:i:s'),
				'dawar_user_created' => get_user_data('id'),			];

			
			
//$save_data['_example'] = $this->input->post('_example');
			



			
			
			$save_data_warga = $id = $this->model_data_warga->store($save_data);
            

			if ($save_data_warga) {
				
				$id = $save_data_warga;
				
				
					
				
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = true;
					$this->data['id'] 	   = $save_data_warga;
					$this->data['message'] = cclang('success_save_data_stay', [
						anchor('administrator/data_warga/edit/' . $save_data_warga, 'Edit Data Warga'),
						anchor('administrator/data_warga', ' Go back to list')
					]);
				} else {
					set_message(
						cclang('success_save_data_redirect', [
						anchor('administrator/data_warga/edit/' . $save_data_warga, 'Edit Data Warga')
					]), 'success');

            		$this->data['success'] = true;
					$this->data['redirect'] = base_url('administrator/data_warga');
				}
			} else {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = false;
					$this->data['message'] = cclang('data_not_change');
				} else {
            		$this->data['success'] = false;
            		$this->data['message'] = cclang('data_not_change');
					$this->data['redirect'] = base_url('administrator/data_warga');
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
	* Update view Data Wargas
	*
	* @var $id String
	*/
	public function edit($id)
	{
		$this->is_allowed('data_warga_update');

		$this->data['data_warga'] = $this->model_data_warga->find($id);

		$this->template->title('Data Warga Update');
		$this->render('backend/standart/administrator/data_warga/data_warga_update', $this->data);
	}

	/**
	* Update Data Wargas
	*
	* @var $id String
	*/
	public function edit_save($id)
	{
		if (!$this->is_allowed('data_warga_update', false)) {
			echo json_encode([
				'success' => false,
				'message' => cclang('sorry_you_do_not_have_permission_to_access')
				]);
			exit;
		}
				$this->form_validation->set_rules('dawar_nokk', 'No. KK', 'trim|required');
		

		$this->form_validation->set_rules('dawar_nik', 'NIK', 'trim|required');
		

		$this->form_validation->set_rules('dawar_nama_lengkap', 'Nama Lengkap', 'trim|required');
		

		$this->form_validation->set_rules('dawar_tp_lahir', 'Tempat Lahir', 'trim|required');
		

		$this->form_validation->set_rules('dawar_tgl_lahir', 'Tanggal Lahir', 'trim|required');
		

		$this->form_validation->set_rules('dawar_jenkel', 'Jenis Kelamin', 'trim|required');
		

		$this->form_validation->set_rules('dawar_hub_kel', 'Hubungan Keluarga', 'trim|required');
		

		$this->form_validation->set_rules('dawar_agama', 'Agama', 'trim|required');
		

		$this->form_validation->set_rules('dawar_status_kawin', 'Status Perkawinan', 'trim|required');
		

		$this->form_validation->set_rules('dawar_alamat', 'Alamat', 'trim|required');
		

		$this->form_validation->set_rules('dawar_rw', 'RW', 'trim|required');
		

		$this->form_validation->set_rules('dawar_rt', 'RT', 'trim|required');
		

		$this->form_validation->set_rules('dawar_kecamatan', 'Kecamatan', 'trim|required');
		

		$this->form_validation->set_rules('dawar_kelurahan', 'Kelurahan', 'trim|required');
		

		
		if ($this->form_validation->run()) {
		
			$save_data = [
				'dawar_identitas' => $this->input->post('dawar_identitas'),
				'dawar_nokk' => $this->input->post('dawar_nokk'),
				'dawar_nik' => $this->input->post('dawar_nik'),
				'dawar_nama_lengkap' => $this->input->post('dawar_nama_lengkap'),
				'dawar_tp_lahir' => $this->input->post('dawar_tp_lahir'),
				'dawar_tgl_lahir' => $this->input->post('dawar_tgl_lahir'),
				'dawar_jenkel' => $this->input->post('dawar_jenkel'),
				'dawar_hub_kel' => $this->input->post('dawar_hub_kel'),
				'dawar_agama' => $this->input->post('dawar_agama'),
				'dawar_pend_akhir' => $this->input->post('dawar_pend_akhir'),
				'dawar_jn_pekerjaan' => $this->input->post('dawar_jn_pekerjaan'),
				'dawar_status_kawin' => $this->input->post('dawar_status_kawin'),
				'dawar_alamat' => $this->input->post('dawar_alamat'),
				'dawar_rw' => $this->input->post('dawar_rw'),
				'dawar_rt' => $this->input->post('dawar_rt'),
				'dawar_kecamatan' => $this->input->post('dawar_kecamatan'),
				'dawar_kelurahan' => $this->input->post('dawar_kelurahan'),
			];

			

			
//$save_data['_example'] = $this->input->post('_example');
			


			
			
			$save_data_warga = $this->model_data_warga->change($id, $save_data);

			if ($save_data_warga) {

				
				

				
				
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = true;
					$this->data['id'] 	   = $id;
					$this->data['message'] = cclang('success_update_data_stay', [
						anchor('administrator/data_warga', ' Go back to list')
					]);
				} else {
					set_message(
						cclang('success_update_data_redirect', [
					]), 'success');

            		$this->data['success'] = true;
					$this->data['redirect'] = base_url('administrator/data_warga');
				}
			} else {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = false;
					$this->data['message'] = cclang('data_not_change');
				} else {
            		$this->data['success'] = false;
            		$this->data['message'] = cclang('data_not_change');
					$this->data['redirect'] = base_url('administrator/data_warga');
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
	* delete Data Wargas
	*
	* @var $id String
	*/
	public function delete($id = null)
	{
		$this->is_allowed('data_warga_delete');

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
            set_message(cclang('has_been_deleted', 'data_warga'), 'success');
        } else {
            set_message(cclang('error_delete', 'data_warga'), 'error');
        }

		redirect_back();
	}

		/**
	* View view Data Wargas
	*
	* @var $id String
	*/
	public function view($id)
	{
		$this->is_allowed('data_warga_view');

		$this->data['data_warga'] = $this->model_data_warga->join_avaiable()->filter_avaiable()->find($id);

		$this->template->title('Data Warga Detail');
		$this->render('backend/standart/administrator/data_warga/data_warga_view', $this->data);
	}
	
	/**
	* delete Data Wargas
	*
	* @var $id String
	*/
	private function _remove($id)
	{
		$data_warga = $this->model_data_warga->find($id);

		
		
		return $this->model_data_warga->remove($id);
	}
	
	
	/**
	* Export to excel
	*
	* @return Files Excel .xls
	*/
	public function export()
	{
		$this->is_allowed('data_warga_export');

		$this->model_data_warga->export(
			'data_warga', 
			'data_warga',
			$this->model_data_warga->field_search
		);
	}

	/**
	* Export to PDF
	*
	* @return Files PDF .pdf
	*/
	public function export_pdf()
	{
		$this->is_allowed('data_warga_export');

		$this->model_data_warga->pdf('data_warga', 'data_warga');
	}


	public function single_pdf($id = null)
	{
		$this->is_allowed('data_warga_export');

		$table = $title = 'data_warga';
		$this->load->library('HtmlPdf');
      
        $config = array(
            'orientation' => 'p',
            'format' => 'a4',
            'marges' => array(5, 5, 5, 5)
        );

        $this->pdf = new HtmlPdf($config);
        $this->pdf->setDefaultFont('stsongstdlight'); 

        $result = $this->db->get($table);
       
        $data = $this->model_data_warga->find($id);
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

	public function ajax_dawar_kelurahan($id = null)
	{
		if (!$this->is_allowed('data_warga_list', false)) {
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


/* End of file data_warga.php */
/* Location: ./application/controllers/administrator/Data Warga.php */