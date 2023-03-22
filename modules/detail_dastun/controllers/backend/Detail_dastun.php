<?php
defined('BASEPATH') OR exit('No direct script access allowed');


/**
*| --------------------------------------------------------------------------
*| Detail Dastun Controller
*| --------------------------------------------------------------------------
*| Detail Dastun site
*|
*/
class Detail_dastun extends Admin {
	public function __construct() {
		parent::__construct();

		$this->load->model('model_detail_dastun');
		$this->load->model('group/model_group');
		$this->lang->load('web_lang', $this->current_lang);
	}

	/**
	* show all Detail Dastuns
	*
	* @var $offset String
	*/
	public function index($offset = 0) {
		$this->is_allowed('detail_dastun_list');

		$filter = $this->input->get('q');
		$field 	= $this->input->get('f');

		$this->data['detail_dastuns'] = $this->model_detail_dastun->get($filter, $field, $this->limit_page, $offset);
		// echo $this->db->last_query();
		// exit;
		$this->data['detail_dastun_counts'] = $this->model_detail_dastun->count_all($filter, $field);

		$config = [
			'base_url'     => 'administrator/detail_dastun/index/',
			'total_rows'   => $this->data['detail_dastun_counts'],
			'per_page'     => $this->limit_page,
			'uri_segment'  => 4,
		];

		$this->data['pagination'] = $this->pagination($config);

		$this->template->title('Data Stunting List');
		$this->render('backend/standart/administrator/detail_dastun/detail_dastun_list', $this->data);
	}
	
	/**
	* Add new detail_dastuns
	*
	*/
	public function add()
	{
		$this->is_allowed('detail_dastun_add');

		$this->template->title('Data Stunting New');
		$this->render('backend/standart/administrator/detail_dastun/detail_dastun_add', $this->data);
	}

	/**
	* Add New Detail Dastuns
	*
	* @return JSON
	*/
	public function add_save() {
		if (!$this->is_allowed('detail_dastun_add', false)) {
			echo json_encode([
				'success' => false,
				'message' => cclang('sorry_you_do_not_have_permission_to_access')
				]);
			exit;
		}

		$this->form_validation->set_rules('detail_data_stunting_dawar_id', 'Nama Data Warga', 'trim|required');
		$this->form_validation->set_rules('detail_data_stunting_ibu_hamil', 'Ibu Hamil', 'trim|required');
		$this->form_validation->set_rules('detail_data_stunting_tambah_darah', 'Tablet Tambah Darah Remaja', 'trim|required');
		$this->form_validation->set_rules('detail_data_stunting_screening_anemia', 'SCRENING ANEMIA', 'trim|required');
		$this->form_validation->set_rules('detail_data_stunting_kespro', 'KESPRO', 'trim|required');
		$this->form_validation->set_rules('detail_data_stunting_kelas_catin', 'KELAS CATIN', 'trim|required');
		$this->form_validation->set_rules('detail_data_stunting_usg', 'USG', 'trim|required');
		$this->form_validation->set_rules('detail_data_stunting_posyandu', 'POSYANDU', 'trim|required');
		$this->form_validation->set_rules('detail_data_stunting_asi_ekslusif', 'ASI EKSCLUSIF', 'trim|required');
		$this->form_validation->set_rules('detail_data_stunting_mpasi', 'MPASI', 'trim|required');
		$this->form_validation->set_rules('detail_data_stunting_sdidtk', 'SDIDTK', 'trim|required');
		$this->form_validation->set_rules('detail_data_stunting_anak_angkat_csr', 'Anak Angkat CSR', 'trim|required');
		$this->form_validation->set_rules('detail_data_stunting_pengasuh_balita', 'Pengasuh Balita', 'trim|required');
		$this->form_validation->set_rules('detail_data_stunting_asupan_gizi', 'Asupan Gizi', 'trim|required');
		$this->form_validation->set_rules('detail_data_stunting_imunisasi', 'Imunisasi', 'trim|required');
		$this->form_validation->set_rules('detail_data_stunting_terapi_gizi', 'Terapi Masalah Gizi', 'trim|required');
		$this->form_validation->set_rules('detail_data_stunting_bpjs_stunting', 'BPJS Stunting', 'trim|required');
		$this->form_validation->set_rules('detail_data_stunting_bantuan_sembako', 'Bantuan Sembako', 'trim|required');
		$this->form_validation->set_rules('detail_data_stunting_dahsyat', 'Dahsyat', 'trim|required');
		$this->form_validation->set_rules('detail_data_stunting_rtlh', 'RTLH', 'trim|required');
		$this->form_validation->set_rules('detail_data_stunting_air_bersih', 'Air Bersih', 'trim|required');
		$this->form_validation->set_rules('detail_data_stunting_akses_pangan', 'AKSES PANGAN LOKAL', 'trim|required');

		if ($this->form_validation->run()) {
			$save_data = [
				'detail_data_stunting_dawar_id'  			=> $this->input->post('detail_data_stunting_dawar_id'),
				'detail_data_stunting_ibu_hamil'  			=> $this->input->post('detail_data_stunting_ibu_hamil'),
				'detail_data_stunting_tambah_darah'  		=> $this->input->post('detail_data_stunting_tambah_darah'),
				'detail_data_stunting_screening_anemia'  	=> $this->input->post('detail_data_stunting_screening_anemia'),
				'detail_data_stunting_kespro'  				=> $this->input->post('detail_data_stunting_kespro'),
				'detail_data_stunting_kelas_catin'  		=> $this->input->post('detail_data_stunting_kelas_catin'),
				'detail_data_stunting_usg'  				=> $this->input->post('detail_data_stunting_usg'),
				'detail_data_stunting_posyandu'  			=> $this->input->post('detail_data_stunting_posyandu'),
				'detail_data_stunting_asi_ekslusif'  		=> $this->input->post('detail_data_stunting_asi_ekslusif'),
				'detail_data_stunting_mpasi'  				=> $this->input->post('detail_data_stunting_mpasi'),
				'detail_data_stunting_sdidtk'  				=> $this->input->post('detail_data_stunting_sdidtk'),
				'detail_data_stunting_anak_angkat_csr'  	=> $this->input->post('detail_data_stunting_anak_angkat_csr'),
				'detail_data_stunting_pengasuh_balita'  	=> $this->input->post('detail_data_stunting_pengasuh_balita'),
				'detail_data_stunting_asupan_gizi'  		=> $this->input->post('detail_data_stunting_asupan_gizi'),
				'detail_data_stunting_imunisasi'  			=> $this->input->post('detail_data_stunting_imunisasi'),
				'detail_data_stunting_terapi_gizi'  		=> $this->input->post('detail_data_stunting_terapi_gizi'),
				'detail_data_stunting_bpjs_stunting'  		=> $this->input->post('detail_data_stunting_bpjs_stunting'),
				'detail_data_stunting_bantuan_sembako'  	=> $this->input->post('detail_data_stunting_bantuan_sembako'),
				'detail_data_stunting_dahsyat'  			=> $this->input->post('detail_data_stunting_dahsyat'),
				'detail_data_stunting_rtlh'  				=> $this->input->post('detail_data_stunting_rtlh'),
				'detail_data_stunting_air_bersih'  			=> $this->input->post('detail_data_stunting_air_bersih'),
				'detail_data_stunting_akses_pangan'  		=> $this->input->post('detail_data_stunting_akses_pangan'),
				'detail_data_stunting_user_created'  		=> get_user_data('id'),
				'detail_data_stunting_created_at' 			=> date('Y-m-d H:i:s'),
			];
			
			$save_detail_dastun = $id = $this->model_detail_dastun->store($save_data);

			if ($save_detail_dastun) {
				$id = $save_detail_dastun;

				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = true;
					$this->data['id'] 	   = $save_detail_dastun;
					$this->data['message'] = cclang('success_save_data_stay', [
						anchor('administrator/detail_dastun/edit/' . $save_detail_dastun, 'Edit Detail Dastun'),
						anchor('administrator/detail_dastun', ' Go back to list')
					]);
				} else {
					set_message(
						cclang('success_save_data_redirect', [
						anchor('administrator/detail_dastun/edit/' . $save_detail_dastun, 'Edit Detail Dastun')
					]), 'success');

            		$this->data['success'] = true;
					$this->data['redirect'] = base_url('administrator/detail_dastun');
				}
			} else {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = false;
					$this->data['message'] = cclang('data_not_change');
				} else {
            		$this->data['success'] = false;
            		$this->data['message'] = cclang('data_not_change');
					$this->data['redirect'] = base_url('administrator/detail_dastun');
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
	* Update view Detail Dastuns
	*
	* @var $id String
	*/
	public function edit($id) {
		$this->is_allowed('detail_dastun_update');

		$this->data['detail_dastun'] = $this->model_detail_dastun->find($id);

		$this->template->title('Data Stunting Update');
		$this->render('backend/standart/administrator/detail_dastun/detail_dastun_update', $this->data);
	}

	/**
	* Update Detail Dastuns
	*
	* @var $id String
	*/
	public function edit_save($id) {
		if (!$this->is_allowed('detail_dastun_update', false)) {
			echo json_encode([
				'success' => false,
				'message' => cclang('sorry_you_do_not_have_permission_to_access')
				]);
			exit;
		}

		$this->form_validation->set_rules('detail_data_stunting_dawar_id', 'Nama Data Warga', 'trim|required');
		$this->form_validation->set_rules('detail_data_stunting_ibu_hamil', 'Ibu Hamil', 'trim|required');
		$this->form_validation->set_rules('detail_data_stunting_tambah_darah', 'Tablet Tambah Darah Remaja', 'trim|required');
		$this->form_validation->set_rules('detail_data_stunting_screening_anemia', 'SCRENING ANEMIA', 'trim|required');
		$this->form_validation->set_rules('detail_data_stunting_kespro', 'KESPRO', 'trim|required');
		$this->form_validation->set_rules('detail_data_stunting_kelas_catin', 'KELAS CATIN', 'trim|required');
		$this->form_validation->set_rules('detail_data_stunting_usg', 'USG', 'trim|required');
		$this->form_validation->set_rules('detail_data_stunting_posyandu', 'POSYANDU', 'trim|required');
		$this->form_validation->set_rules('detail_data_stunting_asi_ekslusif', 'ASI EKSCLUSIF', 'trim|required');
		$this->form_validation->set_rules('detail_data_stunting_mpasi', 'MPASI', 'trim|required');
		$this->form_validation->set_rules('detail_data_stunting_sdidtk', 'SDIDTK', 'trim|required');
		$this->form_validation->set_rules('detail_data_stunting_anak_angkat_csr', 'Anak Angkat CSR', 'trim|required');
		$this->form_validation->set_rules('detail_data_stunting_pengasuh_balita', 'Pengasuh Balita', 'trim|required');
		$this->form_validation->set_rules('detail_data_stunting_asupan_gizi', 'Asupan Gizi', 'trim|required');
		$this->form_validation->set_rules('detail_data_stunting_imunisasi', 'Imunisasi', 'trim|required');
		$this->form_validation->set_rules('detail_data_stunting_terapi_gizi', 'Terapi Masalah Gizi', 'trim|required');
		$this->form_validation->set_rules('detail_data_stunting_bpjs_stunting', 'BPJS Stunting', 'trim|required');
		$this->form_validation->set_rules('detail_data_stunting_bantuan_sembako', 'Bantuan Sembako', 'trim|required');
		$this->form_validation->set_rules('detail_data_stunting_dahsyat', 'Dahsyat', 'trim|required');
		$this->form_validation->set_rules('detail_data_stunting_rtlh', 'RTLH', 'trim|required');
		$this->form_validation->set_rules('detail_data_stunting_air_bersih', 'Air Bersih', 'trim|required');
		$this->form_validation->set_rules('detail_data_stunting_akses_pangan', 'AKSES PANGAN LOKAL', 'trim|required');
		
		if ($this->form_validation->run()) {
			$save_data = [
				'detail_data_stunting_dawar_id' 			=> $this->input->post('detail_data_stunting_dawar_id'),
				'detail_data_stunting_ibu_hamil' 			=> $this->input->post('detail_data_stunting_ibu_hamil'),
				'detail_data_stunting_tambah_darah' 		=> $this->input->post('detail_data_stunting_tambah_darah'),
				'detail_data_stunting_screening_anemia' 	=> $this->input->post('detail_data_stunting_screening_anemia'),
				'detail_data_stunting_kespro' 				=> $this->input->post('detail_data_stunting_kespro'),
				'detail_data_stunting_kelas_catin' 			=> $this->input->post('detail_data_stunting_kelas_catin'),
				'detail_data_stunting_usg' 					=> $this->input->post('detail_data_stunting_usg'),
				'detail_data_stunting_posyandu' 			=> $this->input->post('detail_data_stunting_posyandu'),
				'detail_data_stunting_asi_ekslusif' 		=> $this->input->post('detail_data_stunting_asi_ekslusif'),
				'detail_data_stunting_mpasi' 				=> $this->input->post('detail_data_stunting_mpasi'),
				'detail_data_stunting_sdidtk' 				=> $this->input->post('detail_data_stunting_sdidtk'),
				'detail_data_stunting_anak_angkat_csr' 		=> $this->input->post('detail_data_stunting_anak_angkat_csr'),
				'detail_data_stunting_pengasuh_balita' 		=> $this->input->post('detail_data_stunting_pengasuh_balita'),
				'detail_data_stunting_asupan_gizi' 			=> $this->input->post('detail_data_stunting_asupan_gizi'),
				'detail_data_stunting_imunisasi' 			=> $this->input->post('detail_data_stunting_imunisasi'),
				'detail_data_stunting_terapi_gizi' 			=> $this->input->post('detail_data_stunting_terapi_gizi'),
				'detail_data_stunting_bpjs_stunting' 		=> $this->input->post('detail_data_stunting_bpjs_stunting'),
				'detail_data_stunting_bantuan_sembako' 		=> $this->input->post('detail_data_stunting_bantuan_sembako'),
				'detail_data_stunting_dahsyat' 				=> $this->input->post('detail_data_stunting_dahsyat'),
				'detail_data_stunting_rtlh' 				=> $this->input->post('detail_data_stunting_rtlh'),
				'detail_data_stunting_air_bersih' 			=> $this->input->post('detail_data_stunting_air_bersih'),
				'detail_data_stunting_akses_pangan' 		=> $this->input->post('detail_data_stunting_akses_pangan'),
			];

			$save_detail_dastun = $this->model_detail_dastun->change($id, $save_data);

			if ($save_detail_dastun) {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = true;
					$this->data['id'] 	   = $id;
					$this->data['message'] = cclang('success_update_data_stay', [
						anchor('administrator/detail_dastun', ' Go back to list')
					]);
				} else {
					set_message(
						cclang('success_update_data_redirect', [
					]), 'success');

            		$this->data['success'] = true;
					$this->data['redirect'] = base_url('administrator/detail_dastun');
				}
			} else {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = false;
					$this->data['message'] = cclang('data_not_change');
				} else {
            		$this->data['success'] = false;
            		$this->data['message'] = cclang('data_not_change');
					$this->data['redirect'] = base_url('administrator/detail_dastun');
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
	* delete Detail Dastuns
	*
	* @var $id String
	*/
	public function delete($id = null)
	{
		$this->is_allowed('detail_dastun_delete');

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
            set_message(cclang('has_been_deleted', 'detail_dastun'), 'success');
        } else {
            set_message(cclang('error_delete', 'detail_dastun'), 'error');
        }

		redirect_back();
	}

		/**
	* View view Detail Dastuns
	*
	* @var $id String
	*/
	public function view($id)
	{
		$this->is_allowed('detail_dastun_view');

		$this->data['detail_dastun'] = $this->model_detail_dastun->join_avaiable()->filter_avaiable()->find($id);

		$this->template->title('Data Stunting Detail');
		$this->render('backend/standart/administrator/detail_dastun/detail_dastun_view', $this->data);
	}
	
	/**
	* delete Detail Dastuns
	*
	* @var $id String
	*/
	private function _remove($id)
	{
		$detail_dastun = $this->model_detail_dastun->find($id);

		
		
		return $this->model_detail_dastun->remove($id);
	}
	
	
	/**
	* Export to excel
	*
	* @return Files Excel .xls
	*/
	public function export() {
		$this->is_allowed('detail_dastun_export');

		$this->model_detail_dastun->export(
			'detail_dastun', 
			cclang('detail_dastun'),
			$this->model_detail_dastun->field_search
		);
	}

	/**
	* Export to PDF
	*
	* @return Files PDF .pdf
	*/
	public function export_pdf()
	{
		$this->is_allowed('detail_dastun_export');

		$this->model_detail_dastun->pdf('detail_dastun', 'detail_dastun');
	}


	public function single_pdf($id = null)
	{
		$this->is_allowed('detail_dastun_export');

		$table = $title = 'detail_dastun';
		$this->load->library('HtmlPdf');
      
        $config = array(
            'orientation' => 'p',
            'format' => 'a4',
            'marges' => array(5, 5, 5, 5)
        );

        $this->pdf = new HtmlPdf($config);
        $this->pdf->setDefaultFont('stsongstdlight'); 

        $result = $this->db->get($table);
       
        $data = $this->model_detail_dastun->find($id);
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


/* End of file detail_dastun.php */
/* Location: ./application/controllers/administrator/Detail Dastun.php */