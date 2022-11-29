<?php
defined('BASEPATH') OR exit('No direct script access allowed');


/**
*| --------------------------------------------------------------------------
*| Rencana Kegiatans Controller
*| --------------------------------------------------------------------------
*| Rencana Kegiatans site
*|
*/
class Rencana_kegiatans extends Admin {
	public function __construct() {
		parent::__construct();

		$this->load->model('model_rencana_kegiatans');
		$this->load->model('group/model_group');
		$this->lang->load('web_lang', $this->current_lang);
	}

	/**
	* show all Rencana Kegiatanss
	*
	* @var $offset String
	*/
	public function index($offset = 0) {
		$this->is_allowed('rencana_kegiatans_list');

		$filter = $this->input->get('q');
		$field 	= $this->input->get('f');

		$this->data['rencana_kegiatanss'] 		= $this->model_rencana_kegiatans->get($filter, $field, $this->limit_page, $offset);
		$this->data['rencana_kegiatans_counts'] = $this->model_rencana_kegiatans->count_all($filter, $field);

		$config = [
			'base_url'     => 'administrator/rencana_kegiatans/index/',
			'total_rows'   => $this->data['rencana_kegiatans_counts'],
			'per_page'     => $this->limit_page,
			'uri_segment'  => 4,
		];

		$this->data['pagination'] = $this->pagination($config);

		$this->template->title('Rencana Kegiatan List');
		$this->render('backend/standart/administrator/rencana_kegiatans/rencana_kegiatans_list', $this->data);
	}
	
	/**
	* Add new rencana_kegiatanss
	*
	*/
	public function add() {
		$this->is_allowed('rencana_kegiatans_add');

		$this->template->title('Rencana Kegiatan New');
		$this->render('backend/standart/administrator/rencana_kegiatans/rencana_kegiatans_add', $this->data);
	}

	/**
	* Add New Rencana Kegiatanss
	*
	* @return JSON
	*/
	public function add_save() {
		if (!$this->is_allowed('rencana_kegiatans_add', false)) {
			echo json_encode([
				'success' => false,
				'message' => cclang('sorry_you_do_not_have_permission_to_access')
				]);
			exit;
		}

		$this->form_validation->set_rules('rencana_kegiatan_definisi', 'Definisi', 'trim|required');
		$this->form_validation->set_rules('rencana_kegiatan_tujuan', 'Tujuan', 'trim|required');
		$this->form_validation->set_rules('rencana_kegiatan_output', 'Output', 'trim|required');
		$this->form_validation->set_rules('rencana_kegiatan_meliputi', 'Meliputi', 'trim|required');
		$this->form_validation->set_rules('rencana_kegiatan_peran_opd', 'Peran OPD', 'trim|required');

		if ($this->form_validation->run()) {
			$save_data = [
				'rencana_kegiatan_definisi' 	=> $this->input->post('rencana_kegiatan_definisi'),
				'rencana_kegiatan_tujuan' 		=> $this->input->post('rencana_kegiatan_tujuan'),
				'rencana_kegiatan_output' 		=> $this->input->post('rencana_kegiatan_output'),
				'rencana_kegiatan_meliputi' 	=> $this->input->post('rencana_kegiatan_meliputi'),
				'rencana_kegiatan_peran_opd' 	=> $this->input->post('rencana_kegiatan_peran_opd'),
				'rencana_kegiatan_create_at' 	=> date('Y-m-d H:i:s'),
				'rencana_kegiatan_create_user' 	=> get_user_data('id'),
			];

			$save_rencana_kegiatans = $id = $this->model_rencana_kegiatans->store($save_data);

			if ($save_rencana_kegiatans) {
				$id = $save_rencana_kegiatans;
				
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = true;
					$this->data['id'] 	   = $save_rencana_kegiatans;
					$this->data['message'] = cclang('success_save_data_stay', [
						anchor('administrator/rencana_kegiatans/edit/' . $save_rencana_kegiatans, 'Edit Rencana Kegiatans'),
						anchor('administrator/rencana_kegiatans', ' Go back to list')
					]);
				} else {
					set_message(
						cclang('success_save_data_redirect', [
						anchor('administrator/rencana_kegiatans/edit/' . $save_rencana_kegiatans, 'Edit Rencana Kegiatans')
					]), 'success');

            		$this->data['success'] = true;
					$this->data['redirect'] = base_url('administrator/rencana_kegiatans');
				}
			} else {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = false;
					$this->data['message'] = cclang('data_not_change');
				} else {
            		$this->data['success'] = false;
            		$this->data['message'] = cclang('data_not_change');
					$this->data['redirect'] = base_url('administrator/rencana_kegiatans');
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
	* Update view Rencana Kegiatanss
	*
	* @var $id String
	*/
	public function edit($id) {
		$this->is_allowed('rencana_kegiatans_update');

		$this->data['rencana_kegiatans'] = $this->model_rencana_kegiatans->find($id);

		$this->template->title('Rencana Kegiatan Update');
		$this->render('backend/standart/administrator/rencana_kegiatans/rencana_kegiatans_update', $this->data);
	}

	/**
	* Update Rencana Kegiatanss
	*
	* @var $id String
	*/
	public function edit_save($id) {
		if (!$this->is_allowed('rencana_kegiatans_update', false)) {
			echo json_encode([
				'success' => false,
				'message' => cclang('sorry_you_do_not_have_permission_to_access')
				]);
			exit;
		}

		$this->form_validation->set_rules('rencana_kegiatan_definisi', 'Definisi', 'trim|required');
		$this->form_validation->set_rules('rencana_kegiatan_tujuan', 'Tujuan', 'trim|required');
		$this->form_validation->set_rules('rencana_kegiatan_output', 'Output', 'trim|required');
		$this->form_validation->set_rules('rencana_kegiatan_meliputi', 'Meliputi', 'trim|required');
		$this->form_validation->set_rules('rencana_kegiatan_peran_opd', 'Peran OPD', 'trim|required');
		
		if ($this->form_validation->run()) {
			$save_data = [
				'rencana_kegiatan_definisi' 	=> $this->input->post('rencana_kegiatan_definisi'),
				'rencana_kegiatan_tujuan' 		=> $this->input->post('rencana_kegiatan_tujuan'),
				'rencana_kegiatan_output' 		=> $this->input->post('rencana_kegiatan_output'),
				'rencana_kegiatan_meliputi' 	=> $this->input->post('rencana_kegiatan_meliputi'),
				'rencana_kegiatan_peran_opd' 	=> $this->input->post('rencana_kegiatan_peran_opd'),
				'rencana_kegiatan_update_at' 	=> date('Y-m-d H:i:s'),
				'rencana_kegiatan_update_user' 	=> get_user_data('id'),
			];

			$save_rencana_kegiatans = $this->model_rencana_kegiatans->change($id, $save_data);

			if ($save_rencana_kegiatans) {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = true;
					$this->data['id'] 	   = $id;
					$this->data['message'] = cclang('success_update_data_stay', [
						anchor('administrator/rencana_kegiatans', ' Go back to list')
					]);
				} else {
					set_message(
						cclang('success_update_data_redirect', [
					]), 'success');

            		$this->data['success'] = true;
					$this->data['redirect'] = base_url('administrator/rencana_kegiatans');
				}
			} else {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = false;
					$this->data['message'] = cclang('data_not_change');
				} else {
            		$this->data['success'] = false;
            		$this->data['message'] = cclang('data_not_change');
					$this->data['redirect'] = base_url('administrator/rencana_kegiatans');
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
	* delete Rencana Kegiatanss
	*
	* @var $id String
	*/
	public function delete($id = null) {
		$this->is_allowed('rencana_kegiatans_delete');

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
            set_message(cclang('has_been_deleted', 'rencana_kegiatans'), 'success');
        } else {
            set_message(cclang('error_delete', 'rencana_kegiatans'), 'error');
        }

		redirect_back();
	}

		/**
	* View view Rencana Kegiatanss
	*
	* @var $id String
	*/
	public function view($id) {
		$this->is_allowed('rencana_kegiatans_view');

		$this->data['rencana_kegiatans'] = $this->model_rencana_kegiatans->join_avaiable()->filter_avaiable()->find($id);

		$this->template->title('Rencana Kegiatan Detail');
		$this->render('backend/standart/administrator/rencana_kegiatans/rencana_kegiatans_view', $this->data);
	}
	
	/**
	* delete Rencana Kegiatanss
	*
	* @var $id String
	*/
	private function _remove($id) {
		$rencana_kegiatans = $this->model_rencana_kegiatans->find($id);
		
		return $this->model_rencana_kegiatans->remove($id);
	}
	
	/**
	* Export to excel
	*
	* @return Files Excel .xls
	*/
	public function export() {
		$this->is_allowed('rencana_kegiatans_export');

		$this->model_rencana_kegiatans->export(
			'rencana_kegiatans', 
			'rencana_kegiatans',
			$this->model_rencana_kegiatans->field_search
		);
	}

	/**
	* Export to PDF
	*
	* @return Files PDF .pdf
	*/
	public function export_pdf() {
		$this->is_allowed('rencana_kegiatans_export');

		$this->model_rencana_kegiatans->pdf('rencana_kegiatans', 'rencana_kegiatans');
	}


	public function single_pdf($id = null) {
		$this->is_allowed('rencana_kegiatans_export');

		$table = $title = 'rencana_kegiatans';
		$this->load->library('HtmlPdf');
      
        $config = array(
            'orientation' 	=> 'p',
            'format' 		=> 'a4',
            'marges' 		=> array(5, 5, 5, 5)
        );

        $this->pdf = new HtmlPdf($config);
        $this->pdf->setDefaultFont('stsongstdlight'); 

        $result = $this->db->get($table);
       
        $data 	= $this->model_rencana_kegiatans->find($id);
        $fields = $result->list_fields();

        $content = $this->pdf->loadHtmlPdf('core_template/pdf/pdf_single', [
            'data' 		=> $data,
            'fields' 	=> $fields,
            'title' 	=> $title
        ], TRUE);

        $this->pdf->initialize($config);
        $this->pdf->pdf->SetDisplayMode('fullpage');
        $this->pdf->writeHTML($content);
        $this->pdf->Output($table.'.pdf', 'H');
	}

	
}


/* End of file rencana_kegiatans.php */
/* Location: ./application/controllers/administrator/Rencana Kegiatans.php */