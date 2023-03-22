<?php
defined('BASEPATH') OR exit('No direct script access allowed');


/**
*| --------------------------------------------------------------------------
*| Detail Data Dtks Controller
*| --------------------------------------------------------------------------
*| Detail Data Dtks site
*|
*/
class Detail_data_dtks extends Admin {
	public function __construct() {
		parent::__construct();

		$this->load->model('model_detail_data_dtks');
		$this->load->model('group/model_group');
		$this->lang->load('web_lang', $this->current_lang);
	}

	/**
	* show all Detail Data Dtkss
	*
	* @var $offset String
	*/
	public function index($offset = 0) {
		$this->is_allowed('detail_data_dtks_list');

		$filter = $this->input->get('q');
		$field 	= $this->input->get('f');

		$this->data['detail_data_dtkss'] = $this->model_detail_data_dtks->get($filter, $field, $this->limit_page, $offset);
		// echo $this->db->last_query();
		// exit;
		$this->data['detail_data_dtks_counts'] = $this->model_detail_data_dtks->count_all($filter, $field);

		$config = [
			'base_url'     => 'administrator/detail_data_dtks/index/',
			'total_rows'   => $this->data['detail_data_dtks_counts'],
			'per_page'     => $this->limit_page,
			'uri_segment'  => 4,
		];

		$this->data['pagination'] = $this->pagination($config);

		$this->template->title('Detail Data DTKS List');
		$this->render('backend/standart/administrator/detail_data_dtks/detail_data_dtks_list', $this->data);
	}
	
	/**
	* Add new detail_data_dtkss
	*
	*/
	public function add() {
		$this->is_allowed('detail_data_dtks_add');

		$this->template->title('Detail Data Dtks New');
		$this->render('backend/standart/administrator/detail_data_dtks/detail_data_dtks_add', $this->data);
	}

	/**
	* Add New Detail Data Dtkss
	*
	* @return JSON
	*/
	public function add_save() {
		if (!$this->is_allowed('detail_data_dtks_add', false)) {
			echo json_encode([
				'success' => false,
				'message' => cclang('sorry_you_do_not_have_permission_to_access')
				]);
			exit;
		}

		$this->form_validation->set_rules('detail_data_dtks_warga_id', 'Data Nama Warga', 'trim|required');
		$this->form_validation->set_rules('detail_data_dtks_pekerjaan', 'Pekerjaan', 'trim|required');
		$this->form_validation->set_rules('detail_data_dtks_ibu_kandung', 'Nama Ibu Kandung', 'trim|required');
		$this->form_validation->set_rules('detail_data_dtks_keterangan_padan', 'Keterangan Padan', 'trim|required');
		$this->form_validation->set_rules('detail_data_dtks_bansos_bpnt', 'Bansos BPNT', 'trim|required');
		$this->form_validation->set_rules('detail_data_dtks_bansos_pkh', 'Bansos PKH', 'trim|required');
		$this->form_validation->set_rules('detail_data_dtks_bansos_bpnt_ppkm', 'Bansos BPNT PPKM', 'trim|required');
		$this->form_validation->set_rules('detail_data_dtks_pbi_jkn', 'PBI JKN', 'trim|required');
		$this->form_validation->set_rules('detail_data_dtks_kepesertaan_bpnt', 'Kepesertaan BPNT', 'trim|required');
		$this->form_validation->set_rules('detail_data_dtks_ketbansos', 'Keterangan Bansos', 'trim|required');
		$this->form_validation->set_rules('detail_data_dtks_kepesertaan_pkh', 'Kepesertaan PKH', 'trim|required');

		if ($this->form_validation->run()) {
			$save_data = [
				'detail_data_dtks_warga_id' => $this->input->post('detail_data_dtks_warga_id'),
				'detail_data_dtks_pekerjaan' => $this->input->post('detail_data_dtks_pekerjaan'),
				'detail_data_dtks_ibu_kandung' => $this->input->post('detail_data_dtks_ibu_kandung'),
				'detail_data_dtks_keterangan_padan' => $this->input->post('detail_data_dtks_keterangan_padan'),
				'detail_data_dtks_bansos_bpnt' => $this->input->post('detail_data_dtks_bansos_bpnt'),
				'detail_data_dtks_bansos_pkh' => $this->input->post('detail_data_dtks_bansos_pkh'),
				'detail_data_dtks_bansos_bpnt_ppkm' => $this->input->post('detail_data_dtks_bansos_bpnt_ppkm'),
				'detail_data_dtks_pbi_jkn' => $this->input->post('detail_data_dtks_pbi_jkn'),
				'detail_data_dtks_kepesertaan_bpnt' => $this->input->post('detail_data_dtks_kepesertaan_bpnt'),
				'detail_data_dtks_ketbansos' => $this->input->post('detail_data_dtks_ketbansos'),
				'detail_data_dtks_kepesertaan_pkh' => $this->input->post('detail_data_dtks_kepesertaan_pkh'),
				'detail_data_dtks_user_created' => get_user_data('id'),				'detail_data_dtks_created_at' => date('Y-m-d H:i:s'),
			];
			
			$save_detail_data_dtks = $id = $this->model_detail_data_dtks->store($save_data);

			if ($save_detail_data_dtks) {
				$id = $save_detail_data_dtks;
				
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = true;
					$this->data['id'] 	   = $save_detail_data_dtks;
					$this->data['message'] = cclang('success_save_data_stay', [
						anchor('administrator/detail_data_dtks/edit/' . $save_detail_data_dtks, 'Edit Detail Data Dtks'),
						anchor('administrator/detail_data_dtks', ' Go back to list')
					]);
				} else {
					set_message(
						cclang('success_save_data_redirect', [
						anchor('administrator/detail_data_dtks/edit/' . $save_detail_data_dtks, 'Edit Detail Data Dtks')
					]), 'success');

            		$this->data['success'] = true;
					$this->data['redirect'] = base_url('administrator/detail_data_dtks');
				}
			} else {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = false;
					$this->data['message'] = cclang('data_not_change');
				} else {
            		$this->data['success'] = false;
            		$this->data['message'] = cclang('data_not_change');
					$this->data['redirect'] = base_url('administrator/detail_data_dtks');
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
	* Update view Detail Data Dtkss
	*
	* @var $id String
	*/
	public function edit($id) {
		$this->is_allowed('detail_data_dtks_update');

		$this->data['detail_data_dtks'] = $this->model_detail_data_dtks->find($id);

		$this->template->title('Detail Data Dtks Update');
		$this->render('backend/standart/administrator/detail_data_dtks/detail_data_dtks_update', $this->data);
	}

	/**
	* Update Detail Data Dtkss
	*
	* @var $id String
	*/
	public function edit_save($id)
	{
		if (!$this->is_allowed('detail_data_dtks_update', false)) {
			echo json_encode([
				'success' => false,
				'message' => cclang('sorry_you_do_not_have_permission_to_access')
				]);
			exit;
		}
				$this->form_validation->set_rules('detail_data_dtks_warga_id', 'Data Nama Warga', 'trim|required');
		

		$this->form_validation->set_rules('detail_data_dtks_pekerjaan', 'Pekerjaan', 'trim|required');
		

		$this->form_validation->set_rules('detail_data_dtks_ibu_kandung', 'Nama Ibu Kandung', 'trim|required');
		

		$this->form_validation->set_rules('detail_data_dtks_keterangan_padan', 'Keterangan Padan', 'trim|required');
		

		$this->form_validation->set_rules('detail_data_dtks_bansos_bpnt', 'Bansos BPNT', 'trim|required');
		

		$this->form_validation->set_rules('detail_data_dtks_bansos_pkh', 'Bansos PKH', 'trim|required');
		

		$this->form_validation->set_rules('detail_data_dtks_bansos_bpnt_ppkm', 'Bansos BPNT PPKM', 'trim|required');
		

		$this->form_validation->set_rules('detail_data_dtks_pbi_jkn', 'PBI JKN', 'trim|required');
		

		$this->form_validation->set_rules('detail_data_dtks_kepesertaan_bpnt', 'Kepesertaan BPNT', 'trim|required');
		

		$this->form_validation->set_rules('detail_data_dtks_ketbansos', 'Keterangan Bansos', 'trim|required');
		

		$this->form_validation->set_rules('detail_data_dtks_kepesertaan_pkh', 'Kepesertaan PKH', 'trim|required');
		

		
		if ($this->form_validation->run()) {
		
			$save_data = [
				'detail_data_dtks_warga_id' => $this->input->post('detail_data_dtks_warga_id'),
				'detail_data_dtks_pekerjaan' => $this->input->post('detail_data_dtks_pekerjaan'),
				'detail_data_dtks_ibu_kandung' => $this->input->post('detail_data_dtks_ibu_kandung'),
				'detail_data_dtks_keterangan_padan' => $this->input->post('detail_data_dtks_keterangan_padan'),
				'detail_data_dtks_bansos_bpnt' => $this->input->post('detail_data_dtks_bansos_bpnt'),
				'detail_data_dtks_bansos_pkh' => $this->input->post('detail_data_dtks_bansos_pkh'),
				'detail_data_dtks_bansos_bpnt_ppkm' => $this->input->post('detail_data_dtks_bansos_bpnt_ppkm'),
				'detail_data_dtks_pbi_jkn' => $this->input->post('detail_data_dtks_pbi_jkn'),
				'detail_data_dtks_kepesertaan_bpnt' => $this->input->post('detail_data_dtks_kepesertaan_bpnt'),
				'detail_data_dtks_ketbansos' => $this->input->post('detail_data_dtks_ketbansos'),
				'detail_data_dtks_kepesertaan_pkh' => $this->input->post('detail_data_dtks_kepesertaan_pkh'),
			];

			

			
//$save_data['_example'] = $this->input->post('_example');
			


			
			
			$save_detail_data_dtks = $this->model_detail_data_dtks->change($id, $save_data);

			if ($save_detail_data_dtks) {

				
				

				
				
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = true;
					$this->data['id'] 	   = $id;
					$this->data['message'] = cclang('success_update_data_stay', [
						anchor('administrator/detail_data_dtks', ' Go back to list')
					]);
				} else {
					set_message(
						cclang('success_update_data_redirect', [
					]), 'success');

            		$this->data['success'] = true;
					$this->data['redirect'] = base_url('administrator/detail_data_dtks');
				}
			} else {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = false;
					$this->data['message'] = cclang('data_not_change');
				} else {
            		$this->data['success'] = false;
            		$this->data['message'] = cclang('data_not_change');
					$this->data['redirect'] = base_url('administrator/detail_data_dtks');
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
	* delete Detail Data Dtkss
	*
	* @var $id String
	*/
	public function delete($id = null)
	{
		$this->is_allowed('detail_data_dtks_delete');

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
            set_message(cclang('has_been_deleted', 'detail_data_dtks'), 'success');
        } else {
            set_message(cclang('error_delete', 'detail_data_dtks'), 'error');
        }

		redirect_back();
	}

		/**
	* View view Detail Data Dtkss
	*
	* @var $id String
	*/
	public function view($id)
	{
		$this->is_allowed('detail_data_dtks_view');

		$this->data['detail_data_dtks'] = $this->model_detail_data_dtks->join_avaiable()->filter_avaiable()->find($id);

		$this->template->title('Detail Data Dtks Detail');
		$this->render('backend/standart/administrator/detail_data_dtks/detail_data_dtks_view', $this->data);
	}
	
	/**
	* delete Detail Data Dtkss
	*
	* @var $id String
	*/
	private function _remove($id)
	{
		$detail_data_dtks = $this->model_detail_data_dtks->find($id);

		
		
		return $this->model_detail_data_dtks->remove($id);
	}
	
	
	/**
	* Export to excel
	*
	* @return Files Excel .xls
	*/
	public function export()
	{
		$this->is_allowed('detail_data_dtks_export');

		$this->model_detail_data_dtks->export(
			'detail_data_dtks', 
			'detail_data_dtks',
			$this->model_detail_data_dtks->field_search
		);
	}

	/**
	* Export to PDF
	*
	* @return Files PDF .pdf
	*/
	public function export_pdf()
	{
		$this->is_allowed('detail_data_dtks_export');

		$this->model_detail_data_dtks->pdf('detail_data_dtks', 'detail_data_dtks');
	}


	public function single_pdf($id = null)
	{
		$this->is_allowed('detail_data_dtks_export');

		$table = $title = 'detail_data_dtks';
		$this->load->library('HtmlPdf');
      
        $config = array(
            'orientation' => 'p',
            'format' => 'a4',
            'marges' => array(5, 5, 5, 5)
        );

        $this->pdf = new HtmlPdf($config);
        $this->pdf->setDefaultFont('stsongstdlight'); 

        $result = $this->db->get($table);
       
        $data = $this->model_detail_data_dtks->find($id);
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


/* End of file detail_data_dtks.php */
/* Location: ./application/controllers/administrator/Detail Data Dtks.php */