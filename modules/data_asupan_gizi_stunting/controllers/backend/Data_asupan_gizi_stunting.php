<?php
defined('BASEPATH') OR exit('No direct script access allowed');


/**
*| --------------------------------------------------------------------------
*| Data Asupan Gizi Stunting Controller
*| --------------------------------------------------------------------------
*| Data Asupan Gizi Stunting site
*|
*/
class Data_asupan_gizi_stunting extends Admin	
{
	
	public function __construct()
	{
		parent::__construct();

		$this->load->model('model_data_asupan_gizi_stunting');
		$this->load->model('group/model_group');
		$this->lang->load('web_lang', $this->current_lang);
	}

	/**
	* show all Data Asupan Gizi Stuntings
	*
	* @var $offset String
	*/
	public function index($offset = 0)
	{
		$this->is_allowed('data_asupan_gizi_stunting_list');

		$filter = $this->input->get('q');
		$field 	= $this->input->get('f');

		$this->data['data_asupan_gizi_stuntings'] = $this->model_data_asupan_gizi_stunting->get($filter, $field, $this->limit_page, $offset);
		$this->data['data_asupan_gizi_stunting_counts'] = $this->model_data_asupan_gizi_stunting->count_all($filter, $field);

		$config = [
			'base_url'     => 'administrator/data_asupan_gizi_stunting/index/',
			'total_rows'   => $this->data['data_asupan_gizi_stunting_counts'],
			'per_page'     => $this->limit_page,
			'uri_segment'  => 4,
		];

		$this->data['pagination'] = $this->pagination($config);

		$this->template->title('Data Asupan Gizi Stunting OPD List');
		$this->render('backend/standart/administrator/data_asupan_gizi_stunting/data_asupan_gizi_stunting_list', $this->data);
	}
	
	/**
	* Add new data_asupan_gizi_stuntings
	*
	*/
	public function add()
	{
		$this->is_allowed('data_asupan_gizi_stunting_add');

		$this->template->title('Data Asupan Gizi Stunting OPD New');
		$this->render('backend/standart/administrator/data_asupan_gizi_stunting/data_asupan_gizi_stunting_add', $this->data);
	}

	/**
	* Add New Data Asupan Gizi Stuntings
	*
	* @return JSON
	*/
	public function add_save()
	{
		if (!$this->is_allowed('data_asupan_gizi_stunting_add', false)) {
			echo json_encode([
				'success' => false,
				'message' => cclang('sorry_you_do_not_have_permission_to_access')
				]);
			exit;
		}
		
		

		$this->form_validation->set_rules('asupan_gizi_data_stunting_anak_id', 'Nama Anak', 'trim|required');
		

		$this->form_validation->set_rules('asupan_gizi_opd_id', 'Dinas / Instansi', 'trim|required');
		

		

		if ($this->form_validation->run()) {
		
			$save_data = [
				'asupan_gizi_data_stunting_anak_id' => $this->input->post('asupan_gizi_data_stunting_anak_id'),
				'asupan_gizi_opd_id' => $this->input->post('asupan_gizi_opd_id'),
				'asupan_gizi_opd' => $this->input->post('asupan_gizi_opd'),
				'asupan_gizi_opd_anggaran' => $this->input->post('asupan_gizi_opd_anggaran'),
				'asupan_gizi_user_created' => get_user_data('id'),				'asupan_gizi_created_at' => date('Y-m-d H:i:s'),
			];

			
			



			
			
			$save_data_asupan_gizi_stunting = $id = $this->model_data_asupan_gizi_stunting->store($save_data);
            

			if ($save_data_asupan_gizi_stunting) {
				
				
					
				
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = true;
					$this->data['id'] 	   = $save_data_asupan_gizi_stunting;
					$this->data['message'] = cclang('success_save_data_stay', [
						anchor('administrator/data_asupan_gizi_stunting/edit/' . $save_data_asupan_gizi_stunting, 'Edit Data Asupan Gizi Stunting'),
						anchor('administrator/data_asupan_gizi_stunting', ' Go back to list')
					]);
				} else {
					set_message(
						cclang('success_save_data_redirect', [
						anchor('administrator/data_asupan_gizi_stunting/edit/' . $save_data_asupan_gizi_stunting, 'Edit Data Asupan Gizi Stunting')
					]), 'success');

            		$this->data['success'] = true;
					$this->data['redirect'] = base_url('administrator/data_asupan_gizi_stunting');
				}
			} else {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = false;
					$this->data['message'] = cclang('data_not_change');
				} else {
            		$this->data['success'] = false;
            		$this->data['message'] = cclang('data_not_change');
					$this->data['redirect'] = base_url('administrator/data_asupan_gizi_stunting');
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
	* Update view Data Asupan Gizi Stuntings
	*
	* @var $id String
	*/
	public function edit($id)
	{
		$this->is_allowed('data_asupan_gizi_stunting_update');

		$this->data['data_asupan_gizi_stunting'] = $this->model_data_asupan_gizi_stunting->find($id);

		$this->template->title('Data Asupan Gizi Stunting OPD Update');
		$this->render('backend/standart/administrator/data_asupan_gizi_stunting/data_asupan_gizi_stunting_update', $this->data);
	}

	/**
	* Update Data Asupan Gizi Stuntings
	*
	* @var $id String
	*/
	public function edit_save($id)
	{
		if (!$this->is_allowed('data_asupan_gizi_stunting_update', false)) {
			echo json_encode([
				'success' => false,
				'message' => cclang('sorry_you_do_not_have_permission_to_access')
				]);
			exit;
		}
				$this->form_validation->set_rules('asupan_gizi_data_stunting_anak_id', 'Nama Anak', 'trim|required');
		

		$this->form_validation->set_rules('asupan_gizi_opd_id', 'Dinas / Instansi', 'trim|required');
		

		
		if ($this->form_validation->run()) {
		
			$save_data = [
				'asupan_gizi_data_stunting_anak_id' => $this->input->post('asupan_gizi_data_stunting_anak_id'),
				'asupan_gizi_opd_id' => $this->input->post('asupan_gizi_opd_id'),
				'asupan_gizi_opd' => $this->input->post('asupan_gizi_opd'),
				'asupan_gizi_opd_anggaran' => $this->input->post('asupan_gizi_opd_anggaran'),
				'asupan_gizi_user_updated' => get_user_data('id'),				'asupan_gizi_update_at' => date('Y-m-d H:i:s'),
			];

			

			


			
			
			$save_data_asupan_gizi_stunting = $this->model_data_asupan_gizi_stunting->change($id, $save_data);

			if ($save_data_asupan_gizi_stunting) {

				

				
				
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = true;
					$this->data['id'] 	   = $id;
					$this->data['message'] = cclang('success_update_data_stay', [
						anchor('administrator/data_asupan_gizi_stunting', ' Go back to list')
					]);
				} else {
					set_message(
						cclang('success_update_data_redirect', [
					]), 'success');

            		$this->data['success'] = true;
					$this->data['redirect'] = base_url('administrator/data_asupan_gizi_stunting');
				}
			} else {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = false;
					$this->data['message'] = cclang('data_not_change');
				} else {
            		$this->data['success'] = false;
            		$this->data['message'] = cclang('data_not_change');
					$this->data['redirect'] = base_url('administrator/data_asupan_gizi_stunting');
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
	* delete Data Asupan Gizi Stuntings
	*
	* @var $id String
	*/
	public function delete($id = null)
	{
		$this->is_allowed('data_asupan_gizi_stunting_delete');

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
            set_message(cclang('has_been_deleted', 'data_asupan_gizi_stunting'), 'success');
        } else {
            set_message(cclang('error_delete', 'data_asupan_gizi_stunting'), 'error');
        }

		redirect_back();
	}

		/**
	* View view Data Asupan Gizi Stuntings
	*
	* @var $id String
	*/
	public function view($id)
	{
		$this->is_allowed('data_asupan_gizi_stunting_view');

		$this->data['data_asupan_gizi_stunting'] = $this->model_data_asupan_gizi_stunting->join_avaiable()->filter_avaiable()->find($id);

		$this->template->title('Data Asupan Gizi Stunting OPD Detail');
		$this->render('backend/standart/administrator/data_asupan_gizi_stunting/data_asupan_gizi_stunting_view', $this->data);
	}
	
	/**
	* delete Data Asupan Gizi Stuntings
	*
	* @var $id String
	*/
	private function _remove($id)
	{
		$data_asupan_gizi_stunting = $this->model_data_asupan_gizi_stunting->find($id);

		
		
		return $this->model_data_asupan_gizi_stunting->remove($id);
	}
	
	
	/**
	* Export to excel
	*
	* @return Files Excel .xls
	*/
	public function export()
	{
		$this->is_allowed('data_asupan_gizi_stunting_export');

		$this->model_data_asupan_gizi_stunting->export(
			'data_asupan_gizi_stunting', 
			'data_asupan_gizi_stunting',
			$this->model_data_asupan_gizi_stunting->field_search
		);
	}

	/**
	* Export to PDF
	*
	* @return Files PDF .pdf
	*/
	public function export_pdf()
	{
		$this->is_allowed('data_asupan_gizi_stunting_export');

		$this->model_data_asupan_gizi_stunting->pdf('data_asupan_gizi_stunting', 'data_asupan_gizi_stunting');
	}


	public function single_pdf($id = null)
	{
		$this->is_allowed('data_asupan_gizi_stunting_export');

		$table = $title = 'data_asupan_gizi_stunting';
		$this->load->library('HtmlPdf');
      
        $config = array(
            'orientation' => 'p',
            'format' => 'a4',
            'marges' => array(5, 5, 5, 5)
        );

        $this->pdf = new HtmlPdf($config);
        $this->pdf->setDefaultFont('stsongstdlight'); 

        $result = $this->db->get($table);
       
        $data = $this->model_data_asupan_gizi_stunting->find($id);
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


/* End of file data_asupan_gizi_stunting.php */
/* Location: ./application/controllers/administrator/Data Asupan Gizi Stunting.php */