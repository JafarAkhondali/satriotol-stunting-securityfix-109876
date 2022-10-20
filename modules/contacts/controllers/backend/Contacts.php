<?php
defined('BASEPATH') OR exit('No direct script access allowed');


/**
*| --------------------------------------------------------------------------
*| Contacts Controller
*| --------------------------------------------------------------------------
*| Contacts site
*|
*/
class Contacts extends Admin {
	public function __construct() {
		parent::__construct();

		$this->load->model('model_contacts');
		$this->load->model('group/model_group');
		$this->lang->load('web_lang', $this->current_lang);
	}

	/**
	* show all Contactss
	*
	* @var $offset String
	*/
	public function index($offset = 0){
		$this->is_allowed('contacts_list');

		$filter = $this->input->get('q');
		$field 	= $this->input->get('f');

		$this->data['contactss'] = $this->model_contacts->get($filter, $field, $this->limit_page, $offset);
		$this->data['contacts_counts'] = $this->model_contacts->count_all($filter, $field);

		$config = [
			'base_url'     => 'administrator/contacts/index/',
			'total_rows'   => $this->data['contacts_counts'],
			'per_page'     => $this->limit_page,
			'uri_segment'  => 4,
		];

		$this->data['pagination'] = $this->pagination($config);

		$this->template->title('Contacts List');
		$this->render('backend/standart/administrator/contacts/contacts_list', $this->data);
	}
	
	/**
	* Add new contactss
	*
	*/
	public function add() {
		$this->is_allowed('contacts_add');

		$this->template->title('Contacts New');
		$this->render('backend/standart/administrator/contacts/contacts_add', $this->data);
	}

	/**
	* Add New Contactss
	*
	* @return JSON
	*/
	public function add_save() {
		$user_id = $this->session->userdata('id');
		
		if (!$this->is_allowed('contacts_add', false)) {
			echo json_encode([
				'success' => false,
				'message' => cclang('sorry_you_do_not_have_permission_to_access')
				]);
			exit;
		}

		$this->form_validation->set_rules('contact_name', 'Nama Kontak', 'trim|required|max_length[60]');
		$this->form_validation->set_rules('contact_image', 'Icon', 'trim|required');
		$this->form_validation->set_rules('contact_url', 'Link URL', 'trim|required|max_length[255]');

		if ($this->form_validation->run()) {
			$save_data = [
				'contact_name' 			=> $this->input->post('contact_name'),
				'contact_image' 		=> $this->input->post('contact_image'),
				'contact_url' 			=> $this->input->post('contact_url'),
				'contact_created_at' 	=> date('Y-m-d H:i:s'),
				'contact_user' 			=> $user_id,
			];

			$save_contacts = $id = $this->model_contacts->store($save_data);

			if ($save_contacts) {
				$id = $save_contacts;
				
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = true;
					$this->data['id'] 	   = $save_contacts;
					$this->data['message'] = cclang('success_save_data_stay', [
						anchor('administrator/contacts/edit/' . $save_contacts, 'Edit Contacts'),
						anchor('administrator/contacts', ' Go back to list')
					]);
				} else {
					set_message(
						cclang('success_save_data_redirect', [
						anchor('administrator/contacts/edit/' . $save_contacts, 'Edit Contacts')
					]), 'success');

            		$this->data['success'] = true;
					$this->data['redirect'] = base_url('administrator/contacts');
				}
			} else {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = false;
					$this->data['message'] = cclang('data_not_change');
				} else {
            		$this->data['success'] = false;
            		$this->data['message'] = cclang('data_not_change');
					$this->data['redirect'] = base_url('administrator/contacts');
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
	* Update view Contactss
	*
	* @var $id String
	*/
	public function edit($id) {
		$this->is_allowed('contacts_update');

		$this->data['contacts'] = $this->model_contacts->find($id);

		$this->template->title('Contacts Update');
		$this->render('backend/standart/administrator/contacts/contacts_update', $this->data);
	}

	/**
	* Update Contactss
	*
	* @var $id String
	*/
	public function edit_save($id) {
		if (!$this->is_allowed('contacts_update', false)) {
			echo json_encode([
				'success' => false,
				'message' => cclang('sorry_you_do_not_have_permission_to_access')
				]);
			exit;
		}

		$this->form_validation->set_rules('contact_name', 'Nama Kontak', 'trim|required|max_length[60]');
		$this->form_validation->set_rules('contact_image', 'Icon', 'trim|required');
		$this->form_validation->set_rules('contact_url', 'Link URL', 'trim|required|max_length[255]');
		
		if ($this->form_validation->run()) {
			$save_data = [
				'contact_name' 	=> $this->input->post('contact_name'),
				'contact_image' => $this->input->post('contact_image'),
				'contact_url' 	=> $this->input->post('contact_url'),
			];

			$save_contacts = $this->model_contacts->change($id, $save_data);

			if ($save_contacts) {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = true;
					$this->data['id'] 	   = $id;
					$this->data['message'] = cclang('success_update_data_stay', [
						anchor('administrator/contacts', ' Go back to list')
					]);
				} else {
					set_message(
						cclang('success_update_data_redirect', [
					]), 'success');

            		$this->data['success'] = true;
					$this->data['redirect'] = base_url('administrator/contacts');
				}
			} else {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = false;
					$this->data['message'] = cclang('data_not_change');
				} else {
            		$this->data['success'] = false;
            		$this->data['message'] = cclang('data_not_change');
					$this->data['redirect'] = base_url('administrator/contacts');
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
	* delete Contactss
	*
	* @var $id String
	*/
	public function delete($id = null) {
		$this->is_allowed('contacts_delete');

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
            set_message(cclang('has_been_deleted', 'contacts'), 'success');
        } else {
            set_message(cclang('error_delete', 'contacts'), 'error');
        }

		redirect_back();
	}

		/**
	* View view Contactss
	*
	* @var $id String
	*/
	public function view($id) {
		$this->is_allowed('contacts_view');

		$this->data['contacts'] = $this->model_contacts->join_avaiable()->filter_avaiable()->find($id);

		$this->template->title('Contacts Detail');
		$this->render('backend/standart/administrator/contacts/contacts_view', $this->data);
	}
	
	/**
	* delete Contactss
	*
	* @var $id String
	*/
	private function _remove($id) {
		$contacts = $this->model_contacts->find($id);
		
		return $this->model_contacts->remove($id);
	}
	
	
	/**
	* Export to excel
	*
	* @return Files Excel .xls
	*/
	public function export() {
		$this->is_allowed('contacts_export');

		$this->model_contacts->export(
			'contacts', 
			'contacts',
			$this->model_contacts->field_search
		);
	}

	/**
	* Export to PDF
	*
	* @return Files PDF .pdf
	*/
	public function export_pdf() {
		$this->is_allowed('contacts_export');

		$this->model_contacts->pdf('contacts', 'contacts');
	}


	public function single_pdf($id = null) {
		$this->is_allowed('contacts_export');

		$table = $title = 'contacts';
		$this->load->library('HtmlPdf');
      
        $config = array(
            'orientation' => 'p',
            'format' => 'a4',
            'marges' => array(5, 5, 5, 5)
        );

        $this->pdf = new HtmlPdf($config);
        $this->pdf->setDefaultFont('stsongstdlight'); 

        $result = $this->db->get($table);
       
        $data = $this->model_contacts->find($id);
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


/* End of file contacts.php */
/* Location: ./application/controllers/administrator/Contacts.php */