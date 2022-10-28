<?php
defined('BASEPATH') OR exit('No direct script access allowed');


/**
*| --------------------------------------------------------------------------
*| Kelurahans Controller
*| --------------------------------------------------------------------------
*| Kelurahans site
*|
*/
class Kelurahans extends Admin	
{
	
	public function __construct()
	{
		parent::__construct();

		$this->load->model('model_kelurahans');
		$this->load->model('group/model_group');
		$this->lang->load('web_lang', $this->current_lang);
	}

	/**
	* show all Kelurahanss
	*
	* @var $offset String
	*/
	public function index($offset = 0)
	{
		$this->is_allowed('kelurahans_list');

		$filter = $this->input->get('q');
		$field 	= $this->input->get('f');

		$this->data['kelurahanss'] = $this->model_kelurahans->get($filter, $field, $this->limit_page, $offset);
		$this->data['kelurahans_counts'] = $this->model_kelurahans->count_all($filter, $field);

		$config = [
			'base_url'     => 'administrator/kelurahans/index/',
			'total_rows'   => $this->data['kelurahans_counts'],
			'per_page'     => $this->limit_page,
			'uri_segment'  => 4,
		];

		$this->data['pagination'] = $this->pagination($config);

		$this->template->title('Kelurahan List');
		$this->render('backend/standart/administrator/kelurahans/kelurahans_list', $this->data);
	}
	
	/**
	* Add new kelurahanss
	*
	*/
	public function add()
	{
		$this->is_allowed('kelurahans_add');

		$this->template->title('Kelurahan New');
		$this->render('backend/standart/administrator/kelurahans/kelurahans_add', $this->data);
	}

	/**
	* Add New Kelurahanss
	*
	* @return JSON
	*/
	public function add_save()
	{
		if (!$this->is_allowed('kelurahans_add', false)) {
			echo json_encode([
				'success' => false,
				'message' => cclang('sorry_you_do_not_have_permission_to_access')
				]);
			exit;
		}
		
		

		$this->form_validation->set_rules('kecamatan_id', 'Nama Kecamatan', 'trim|required');
		

		$this->form_validation->set_rules('kelurahan_nama', 'Nama Kelurahan', 'trim|required|max_length[255]');
		

		

		if ($this->form_validation->run()) {
		
			$save_data = [
				'kecamatan_id' => $this->input->post('kecamatan_id'),
				'kelurahan_nama' => $this->input->post('kelurahan_nama'),
				'kelurahan_create_at' => $this->input->post('kelurahan_create_at'),
				'kelurahan_create_user' => $this->input->post('kelurahan_create_user'),
			];

			
			



			
			
			$save_kelurahans = $id = $this->model_kelurahans->store($save_data);
            

			if ($save_kelurahans) {
				
				
					
				
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = true;
					$this->data['id'] 	   = $save_kelurahans;
					$this->data['message'] = cclang('success_save_data_stay', [
						anchor('administrator/kelurahans/edit/' . $save_kelurahans, 'Edit Kelurahans'),
						anchor('administrator/kelurahans', ' Go back to list')
					]);
				} else {
					set_message(
						cclang('success_save_data_redirect', [
						anchor('administrator/kelurahans/edit/' . $save_kelurahans, 'Edit Kelurahans')
					]), 'success');

            		$this->data['success'] = true;
					$this->data['redirect'] = base_url('administrator/kelurahans');
				}
			} else {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = false;
					$this->data['message'] = cclang('data_not_change');
				} else {
            		$this->data['success'] = false;
            		$this->data['message'] = cclang('data_not_change');
					$this->data['redirect'] = base_url('administrator/kelurahans');
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
	* Update view Kelurahanss
	*
	* @var $id String
	*/
	public function edit($id)
	{
		$this->is_allowed('kelurahans_update');

		$this->data['kelurahans'] = $this->model_kelurahans->find($id);

		$this->template->title('Kelurahan Update');
		$this->render('backend/standart/administrator/kelurahans/kelurahans_update', $this->data);
	}

	/**
	* Update Kelurahanss
	*
	* @var $id String
	*/
	public function edit_save($id)
	{
		if (!$this->is_allowed('kelurahans_update', false)) {
			echo json_encode([
				'success' => false,
				'message' => cclang('sorry_you_do_not_have_permission_to_access')
				]);
			exit;
		}
				$this->form_validation->set_rules('kecamatan_id', 'Nama Kecamatan', 'trim|required');
		

		$this->form_validation->set_rules('kelurahan_nama', 'Nama Kelurahan', 'trim|required|max_length[255]');
		

		
		if ($this->form_validation->run()) {
		
			$save_data = [
				'kecamatan_id' => $this->input->post('kecamatan_id'),
				'kelurahan_nama' => $this->input->post('kelurahan_nama'),
			];

			

			


			
			
			$save_kelurahans = $this->model_kelurahans->change($id, $save_data);

			if ($save_kelurahans) {

				

				
				
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = true;
					$this->data['id'] 	   = $id;
					$this->data['message'] = cclang('success_update_data_stay', [
						anchor('administrator/kelurahans', ' Go back to list')
					]);
				} else {
					set_message(
						cclang('success_update_data_redirect', [
					]), 'success');

            		$this->data['success'] = true;
					$this->data['redirect'] = base_url('administrator/kelurahans');
				}
			} else {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = false;
					$this->data['message'] = cclang('data_not_change');
				} else {
            		$this->data['success'] = false;
            		$this->data['message'] = cclang('data_not_change');
					$this->data['redirect'] = base_url('administrator/kelurahans');
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
	* delete Kelurahanss
	*
	* @var $id String
	*/
	public function delete($id = null)
	{
		$this->is_allowed('kelurahans_delete');

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
            set_message(cclang('has_been_deleted', 'kelurahans'), 'success');
        } else {
            set_message(cclang('error_delete', 'kelurahans'), 'error');
        }

		redirect_back();
	}

		/**
	* View view Kelurahanss
	*
	* @var $id String
	*/
	public function view($id)
	{
		$this->is_allowed('kelurahans_view');

		$this->data['kelurahans'] = $this->model_kelurahans->join_avaiable()->filter_avaiable()->find($id);

		$this->template->title('Kelurahan Detail');
		$this->render('backend/standart/administrator/kelurahans/kelurahans_view', $this->data);
	}
	
	/**
	* delete Kelurahanss
	*
	* @var $id String
	*/
	private function _remove($id)
	{
		$kelurahans = $this->model_kelurahans->find($id);

		
		
		return $this->model_kelurahans->remove($id);
	}
	
	
	/**
	* Export to excel
	*
	* @return Files Excel .xls
	*/
	public function export()
	{
		$this->is_allowed('kelurahans_export');

		$this->model_kelurahans->export(
			'kelurahans', 
			'kelurahans',
			$this->model_kelurahans->field_search
		);
	}

	/**
	* Export to PDF
	*
	* @return Files PDF .pdf
	*/
	public function export_pdf()
	{
		$this->is_allowed('kelurahans_export');

		$this->model_kelurahans->pdf('kelurahans', 'kelurahans');
	}


	public function single_pdf($id = null)
	{
		$this->is_allowed('kelurahans_export');

		$table = $title = 'kelurahans';
		$this->load->library('HtmlPdf');
      
        $config = array(
            'orientation' => 'p',
            'format' => 'a4',
            'marges' => array(5, 5, 5, 5)
        );

        $this->pdf = new HtmlPdf($config);
        $this->pdf->setDefaultFont('stsongstdlight'); 

        $result = $this->db->get($table);
       
        $data = $this->model_kelurahans->find($id);
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

	public function ajax_kecamatan_id($id = null)
	{
		if (!$this->is_allowed('kelurahans_list', false)) {
			echo json_encode([
				'success' => false,
				'message' => cclang('sorry_you_do_not_have_permission_to_access')
				]);
			exit;
		}
		$results = db_get_all_data('kecamatans', ['kecamatan_id' => $id]);
		$this->response($results);	
	}

	
}


/* End of file kelurahans.php */
/* Location: ./application/controllers/administrator/Kelurahans.php */