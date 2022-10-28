<?php
defined('BASEPATH') OR exit('No direct script access allowed');


/**
*| --------------------------------------------------------------------------
*| Kecamatans Controller
*| --------------------------------------------------------------------------
*| Kecamatans site
*|
*/
class Kecamatans extends Admin {
	public function __construct() {
		parent::__construct();

		$this->load->model('model_kecamatans');
		$this->load->model('group/model_group');
		$this->lang->load('web_lang', $this->current_lang);
	}

	/**
	* show all Kecamatanss
	*
	* @var $offset String
	*/
	public function index($offset = 0) {
		$this->is_allowed('kecamatans_list');

		$filter = $this->input->get('q');
		$field 	= $this->input->get('f');

		$this->data['kecamatanss'] = $this->model_kecamatans->get($filter, $field, $this->limit_page, $offset);
		$this->data['kecamatans_counts'] = $this->model_kecamatans->count_all($filter, $field);

		$config = [
			'base_url'     => 'administrator/kecamatans/index/',
			'total_rows'   => $this->data['kecamatans_counts'],
			'per_page'     => $this->limit_page,
			'uri_segment'  => 4,
		];

		$this->data['pagination'] = $this->pagination($config);

		$this->template->title('Kecamatan List');
		$this->render('backend/standart/administrator/kecamatans/kecamatans_list', $this->data);
	}
	
	/**
	* Add new kecamatanss
	*
	*/
	public function add() {
		$this->is_allowed('kecamatans_add');

		$this->template->title('Kecamatan New');
		$this->render('backend/standart/administrator/kecamatans/kecamatans_add', $this->data);
	}

	/**
	* Add New Kecamatanss
	*
	* @return JSON
	*/
	public function add_save() {
		if (!$this->is_allowed('kecamatans_add', false)) {
			echo json_encode([
				'success' => false,
				'message' => cclang('sorry_you_do_not_have_permission_to_access')
				]);
			exit;
		}

		$this->form_validation->set_rules('kecamatan_nama', 'Nama Kecamatan', 'trim|required|max_length[255]');

		if ($this->form_validation->run()) {
			$save_data = [
				'kecamatan_nama' 		=> $this->input->post('kecamatan_nama'),
				'kecamatan_create_at' 	=> date('Y-m-d h:i:s'),
				'kecamatan_user' 		=> get_user_data('id'),
			];
			
			$save_kecamatans = $id = $this->model_kecamatans->store($save_data);

			if ($save_kecamatans) {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = true;
					$this->data['id'] 	   = $save_kecamatans;
					$this->data['message'] = cclang('success_save_data_stay', [
						anchor('administrator/kecamatans/edit/' . $save_kecamatans, 'Edit Kecamatans'),
						anchor('administrator/kecamatans', ' Go back to list')
					]);
				} else {
					set_message(
						cclang('success_save_data_redirect', [
						anchor('administrator/kecamatans/edit/' . $save_kecamatans, 'Edit Kecamatans')
					]), 'success');

            		$this->data['success'] = true;
					$this->data['redirect'] = base_url('administrator/kecamatans');
				}
			} else {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = false;
					$this->data['message'] = cclang('data_not_change');
				} else {
            		$this->data['success'] = false;
            		$this->data['message'] = cclang('data_not_change');
					$this->data['redirect'] = base_url('administrator/kecamatans');
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
	* Update view Kecamatanss
	*
	* @var $id String
	*/
	public function edit($id) {
		$this->is_allowed('kecamatans_update');

		$this->data['kecamatans'] = $this->model_kecamatans->find($id);

		$this->template->title('Kecamatan Update');
		$this->render('backend/standart/administrator/kecamatans/kecamatans_update', $this->data);
	}

	/**
	* Update Kecamatanss
	*
	* @var $id String
	*/
	public function edit_save($id) {
		if (!$this->is_allowed('kecamatans_update', false)) {
			echo json_encode([
				'success' => false,
				'message' => cclang('sorry_you_do_not_have_permission_to_access')
				]);
			exit;
		}

		$this->form_validation->set_rules('kecamatan_nama', 'Nama Kecamatan', 'trim|required|max_length[255]');
		
		if ($this->form_validation->run()) {
			$save_data = [
				'kecamatan_nama' => $this->input->post('kecamatan_nama'),
			];
			
			$save_kecamatans = $this->model_kecamatans->change($id, $save_data);

			if ($save_kecamatans) {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = true;
					$this->data['id'] 	   = $id;
					$this->data['message'] = cclang('success_update_data_stay', [
						anchor('administrator/kecamatans', ' Go back to list')
					]);
				} else {
					set_message(
						cclang('success_update_data_redirect', [
					]), 'success');

            		$this->data['success'] = true;
					$this->data['redirect'] = base_url('administrator/kecamatans');
				}
			} else {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = false;
					$this->data['message'] = cclang('data_not_change');
				} else {
            		$this->data['success'] = false;
            		$this->data['message'] = cclang('data_not_change');
					$this->data['redirect'] = base_url('administrator/kecamatans');
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
	* delete Kecamatanss
	*
	* @var $id String
	*/
	public function delete($id = null) {
		$this->is_allowed('kecamatans_delete');

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
            set_message(cclang('has_been_deleted', 'kecamatans'), 'success');
        } else {
            set_message(cclang('error_delete', 'kecamatans'), 'error');
        }

		redirect_back();
	}

		/**
	* View view Kecamatanss
	*
	* @var $id String
	*/
	public function view($id) {
		$this->is_allowed('kecamatans_view');

		$this->data['kecamatans'] = $this->model_kecamatans->join_avaiable()->filter_avaiable()->find($id);

		$this->template->title('Kecamatan Detail');
		$this->render('backend/standart/administrator/kecamatans/kecamatans_view', $this->data);
	}
	
	/**
	* delete Kecamatanss
	*
	* @var $id String
	*/
	private function _remove($id) {
		$kecamatans = $this->model_kecamatans->find($id);

		return $this->model_kecamatans->remove($id);
	}
	
	
	/**
	* Export to excel
	*
	* @return Files Excel .xls
	*/
	public function export() {
		$this->is_allowed('kecamatans_export');

		$this->model_kecamatans->export(
			'kecamatans', 
			'kecamatans',
			$this->model_kecamatans->field_search
		);
	}

	/**
	* Export to PDF
	*
	* @return Files PDF .pdf
	*/
	public function export_pdf() {
		$this->is_allowed('kecamatans_export');

		$this->model_kecamatans->pdf('kecamatans', 'kecamatans');
	}


	public function single_pdf($id = null) {
		$this->is_allowed('kecamatans_export');

		$table = $title = 'kecamatans';
		$this->load->library('HtmlPdf');
      
        $config = array(
            'orientation' => 'p',
            'format' => 'a4',
            'marges' => array(5, 5, 5, 5)
        );

        $this->pdf = new HtmlPdf($config);
        $this->pdf->setDefaultFont('stsongstdlight'); 

        $result = $this->db->get($table);
       
        $data = $this->model_kecamatans->find($id);
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


/* End of file kecamatans.php */
/* Location: ./application/controllers/administrator/Kecamatans.php */