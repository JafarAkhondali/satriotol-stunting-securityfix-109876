<?php
defined('BASEPATH') OR exit('No direct script access allowed');


/**
*| --------------------------------------------------------------------------
*| Faqs Controller
*| --------------------------------------------------------------------------
*| Faqs site
*|
*/
class Faqs extends Admin	
{
	
	public function __construct()
	{
		parent::__construct();

		$this->load->model('model_faqs');
		$this->load->model('group/model_group');
		$this->lang->load('web_lang', $this->current_lang);
	}

	/**
	* show all Faqss
	*
	* @var $offset String
	*/
	public function index($offset = 0)
	{
		$this->is_allowed('faqs_list');

		$filter = $this->input->get('q');
		$field 	= $this->input->get('f');

		$this->data['faqss'] = $this->model_faqs->get($filter, $field, $this->limit_page, $offset);
		$this->data['faqs_counts'] = $this->model_faqs->count_all($filter, $field);

		$config = [
			'base_url'     => 'administrator/faqs/index/',
			'total_rows'   => $this->data['faqs_counts'],
			'per_page'     => $this->limit_page,
			'uri_segment'  => 4,
		];

		$this->data['pagination'] = $this->pagination($config);

		$this->template->title('Faqs List');
		$this->render('backend/standart/administrator/faqs/faqs_list', $this->data);
	}
	
	/**
	* Add new faqss
	*
	*/
	public function add()
	{
		$this->is_allowed('faqs_add');

		$this->template->title('Faqs New');
		$this->render('backend/standart/administrator/faqs/faqs_add', $this->data);
	}

	/**
	* Add New Faqss
	*
	* @return JSON
	*/
	public function add_save()
	{
		if (!$this->is_allowed('faqs_add', false)) {
			echo json_encode([
				'success' => false,
				'message' => cclang('sorry_you_do_not_have_permission_to_access')
				]);
			exit;
		}
		
		

		$this->form_validation->set_rules('faq_question', 'Pertanyaan', 'trim|required|max_length[255]');
		

		$this->form_validation->set_rules('faq_answer', 'Jawaban', 'trim|required');
		

		

		if ($this->form_validation->run()) {
		
			$save_data = [
				'faq_question' => $this->input->post('faq_question'),
				'faq_answer' => $this->input->post('faq_answer'),
			];

			
			



			
			
			$save_faqs = $id = $this->model_faqs->store($save_data);
            

			if ($save_faqs) {
				
				
					
				
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = true;
					$this->data['id'] 	   = $save_faqs;
					$this->data['message'] = cclang('success_save_data_stay', [
						anchor('administrator/faqs/edit/' . $save_faqs, 'Edit Faqs'),
						anchor('administrator/faqs', ' Go back to list')
					]);
				} else {
					set_message(
						cclang('success_save_data_redirect', [
						anchor('administrator/faqs/edit/' . $save_faqs, 'Edit Faqs')
					]), 'success');

            		$this->data['success'] = true;
					$this->data['redirect'] = base_url('administrator/faqs');
				}
			} else {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = false;
					$this->data['message'] = cclang('data_not_change');
				} else {
            		$this->data['success'] = false;
            		$this->data['message'] = cclang('data_not_change');
					$this->data['redirect'] = base_url('administrator/faqs');
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
	* Update view Faqss
	*
	* @var $id String
	*/
	public function edit($id)
	{
		$this->is_allowed('faqs_update');

		$this->data['faqs'] = $this->model_faqs->find($id);

		$this->template->title('Faqs Update');
		$this->render('backend/standart/administrator/faqs/faqs_update', $this->data);
	}

	/**
	* Update Faqss
	*
	* @var $id String
	*/
	public function edit_save($id)
	{
		if (!$this->is_allowed('faqs_update', false)) {
			echo json_encode([
				'success' => false,
				'message' => cclang('sorry_you_do_not_have_permission_to_access')
				]);
			exit;
		}
				$this->form_validation->set_rules('faq_question', 'Pertanyaan', 'trim|required|max_length[255]');
		

		$this->form_validation->set_rules('faq_answer', 'Jawaban', 'trim|required');
		

		
		if ($this->form_validation->run()) {
		
			$save_data = [
				'faq_question' => $this->input->post('faq_question'),
				'faq_answer' => $this->input->post('faq_answer'),
			];

			

			


			
			
			$save_faqs = $this->model_faqs->change($id, $save_data);

			if ($save_faqs) {

				

				
				
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = true;
					$this->data['id'] 	   = $id;
					$this->data['message'] = cclang('success_update_data_stay', [
						anchor('administrator/faqs', ' Go back to list')
					]);
				} else {
					set_message(
						cclang('success_update_data_redirect', [
					]), 'success');

            		$this->data['success'] = true;
					$this->data['redirect'] = base_url('administrator/faqs');
				}
			} else {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = false;
					$this->data['message'] = cclang('data_not_change');
				} else {
            		$this->data['success'] = false;
            		$this->data['message'] = cclang('data_not_change');
					$this->data['redirect'] = base_url('administrator/faqs');
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
	* delete Faqss
	*
	* @var $id String
	*/
	public function delete($id = null)
	{
		$this->is_allowed('faqs_delete');

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
            set_message(cclang('has_been_deleted', 'faqs'), 'success');
        } else {
            set_message(cclang('error_delete', 'faqs'), 'error');
        }

		redirect_back();
	}

		/**
	* View view Faqss
	*
	* @var $id String
	*/
	public function view($id)
	{
		$this->is_allowed('faqs_view');

		$this->data['faqs'] = $this->model_faqs->join_avaiable()->filter_avaiable()->find($id);

		$this->template->title('Faqs Detail');
		$this->render('backend/standart/administrator/faqs/faqs_view', $this->data);
	}
	
	/**
	* delete Faqss
	*
	* @var $id String
	*/
	private function _remove($id)
	{
		$faqs = $this->model_faqs->find($id);

		
		
		return $this->model_faqs->remove($id);
	}
	
	
	/**
	* Export to excel
	*
	* @return Files Excel .xls
	*/
	public function export()
	{
		$this->is_allowed('faqs_export');

		$this->model_faqs->export(
			'faqs', 
			'faqs',
			$this->model_faqs->field_search
		);
	}

	/**
	* Export to PDF
	*
	* @return Files PDF .pdf
	*/
	public function export_pdf()
	{
		$this->is_allowed('faqs_export');

		$this->model_faqs->pdf('faqs', 'faqs');
	}


	public function single_pdf($id = null)
	{
		$this->is_allowed('faqs_export');

		$table = $title = 'faqs';
		$this->load->library('HtmlPdf');
      
        $config = array(
            'orientation' => 'p',
            'format' => 'a4',
            'marges' => array(5, 5, 5, 5)
        );

        $this->pdf = new HtmlPdf($config);
        $this->pdf->setDefaultFont('stsongstdlight'); 

        $result = $this->db->get($table);
       
        $data = $this->model_faqs->find($id);
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


/* End of file faqs.php */
/* Location: ./application/controllers/administrator/Faqs.php */