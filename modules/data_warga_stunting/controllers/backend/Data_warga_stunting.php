<?php
defined('BASEPATH') OR exit('No direct script access allowed');


/**
*| --------------------------------------------------------------------------
*| Data Warga Stunting Controller
*| --------------------------------------------------------------------------
*| Data Warga Stunting site
*|
*/
class Data_warga_stunting extends Admin	
{
	
	public function __construct()
	{
		parent::__construct();

		$this->load->model('model_data_warga_stunting');
		$this->load->model('group/model_group');
		$this->lang->load('web_lang', $this->current_lang);
	}

	/**
	* show all Data Warga Stuntings
	*
	* @var $offset String
	*/
	public function index($offset = 0)
	{
		$this->is_allowed('data_warga_stunting_list');

		$filter = $this->input->get('q');
		$field 	= $this->input->get('f');

		$this->data['data_warga_stuntings'] = $this->model_data_warga_stunting->get($filter, $field, $this->limit_page, $offset);
		$this->data['data_warga_stunting_counts'] = $this->model_data_warga_stunting->count_all($filter, $field);

		$config = [
			'base_url'     => 'administrator/data_warga_stunting/index/',
			'total_rows'   => $this->data['data_warga_stunting_counts'],
			'per_page'     => $this->limit_page,
			'uri_segment'  => 4,
		];

		$this->data['pagination'] = $this->pagination($config);

		$this->template->title('Data Warga Stunting List');
		$this->render('backend/standart/administrator/data_warga_stunting/data_warga_stunting_list', $this->data);
	}
	
	/**
	* Add new data_warga_stuntings
	*
	*/
	public function add()
	{
		$this->is_allowed('data_warga_stunting_add');

		$this->template->title('Data Warga Stunting New');
		$this->render('backend/standart/administrator/data_warga_stunting/data_warga_stunting_add', $this->data);
	}

	/**
	* Add New Data Warga Stuntings
	*
	* @return JSON
	*/
	public function add_save()
	{
		if (!$this->is_allowed('data_warga_stunting_add', false)) {
			echo json_encode([
				'success' => false,
				'message' => cclang('sorry_you_do_not_have_permission_to_access')
				]);
			exit;
		}
		
		

		$this->form_validation->set_rules('data_warstun_identitas', 'No. Identitas', 'trim|required');
		

		$this->form_validation->set_rules('data_warstun_ktp', 'KTP', 'trim|required');
		

		$this->form_validation->set_rules('data_warstun_nama_lengkap', 'Nama Lengkap', 'trim|required');
		

		$this->form_validation->set_rules('data_warstun_kecamatan', 'Kecamatan', 'trim|required');
		

		$this->form_validation->set_rules('data_warstun_kelurahan', 'Kelurahan', 'trim|required');
		

		$this->form_validation->set_rules('data_warstun_rt', 'RT', 'trim|required');
		

		$this->form_validation->set_rules('data_warstun_rw', 'RW', 'trim|required');
		

		$this->form_validation->set_rules('data_warstun_tp_lahir', 'Tempat Lahir', 'trim|required');
		

		$this->form_validation->set_rules('data_warstun_tgl_lahir', 'Tanggal Lahir', 'trim|required');
		

		$this->form_validation->set_rules('data_warstun_alamat', 'Alamat Rumah', 'trim|required');
		

		$this->form_validation->set_rules('data_warstun_jenkel', 'Jenis Kelamin', 'trim|required');
		

		$this->form_validation->set_rules('data_warstun_relation', 'Hubungan Keluarga', 'trim|required');
		

		$this->form_validation->set_rules('data_warstun_kawin', 'Status Perkawinan', 'trim|required');
		

		$this->form_validation->set_rules('data_warstun_agama', 'Agama', 'trim|required');
		

		$this->form_validation->set_rules('data_warstun_pendidikan', 'Pendidikan Terakhir', 'trim|required');
		

		$this->form_validation->set_rules('data_warstun_pekerjaan', 'Pekerjaan Utama', 'trim|required');
		

		

		if ($this->form_validation->run()) {
		
			$save_data = [
				'data_warstun_identitas' => $this->input->post('data_warstun_identitas'),
				'data_warstun_ktp' => $this->input->post('data_warstun_ktp'),
				'data_warstun_nama_lengkap' => $this->input->post('data_warstun_nama_lengkap'),
				'data_warstun_kecamatan' => $this->input->post('data_warstun_kecamatan'),
				'data_warstun_kelurahan' => $this->input->post('data_warstun_kelurahan'),
				'data_warstun_rt' => $this->input->post('data_warstun_rt'),
				'data_warstun_rw' => $this->input->post('data_warstun_rw'),
				'data_warstun_tp_lahir' => $this->input->post('data_warstun_tp_lahir'),
				'data_warstun_tgl_lahir' => $this->input->post('data_warstun_tgl_lahir'),
				'data_warstun_alamat' => $this->input->post('data_warstun_alamat'),
				'data_warstun_jenkel' => $this->input->post('data_warstun_jenkel'),
				'data_warstun_relation' => $this->input->post('data_warstun_relation'),
				'data_warstun_kawin' => $this->input->post('data_warstun_kawin'),
				'data_warstun_agama' => $this->input->post('data_warstun_agama'),
				'data_warstun_pendidikan' => $this->input->post('data_warstun_pendidikan'),
				'data_warstun_pekerjaan' => $this->input->post('data_warstun_pekerjaan'),
				'data_warstun_anemia_bumil' => $this->input->post('data_warstun_anemia_bumil'),
				'data_warstun_kek' => $this->input->post('data_warstun_kek'),
				'data_warstun_tablet_bumil' => $this->input->post('data_warstun_tablet_bumil'),
				'data_warstun_usg' => $this->input->post('data_warstun_usg'),
				'data_warstun_anemia' => $this->input->post('data_warstun_anemia'),
				'data_warstun_tabel_remaja' => $this->input->post('data_warstun_tabel_remaja'),
				'data_warstun_kespro' => $this->input->post('data_warstun_kespro'),
				'data_warstun_catin' => $this->input->post('data_warstun_catin'),
				'data_warstun_pos_balita' => $this->input->post('data_warstun_pos_balita'),
				'data_warstun_pos_remaja' => $this->input->post('data_warstun_pos_remaja'),
				'data_warstun_asi_ekslusif' => $this->input->post('data_warstun_asi_ekslusif'),
				'data_warstun_mpasi' => $this->input->post('data_warstun_mpasi'),
				'data_warstun_uw' => $this->input->post('data_warstun_uw'),
				'data_warstun_sdidtk' => $this->input->post('data_warstun_sdidtk'),
				'data_warstun_status_ak' => $this->input->post('data_warstun_status_ak'),
				'data_warstun_status_aa_csr' => $this->input->post('data_warstun_status_aa_csr'),
				'data_warstun_status_at' => $this->input->post('data_warstun_status_at'),
				'data_warstun_asuh_ortu' => $this->input->post('data_warstun_asuh_ortu'),
				'data_warstun_asuh_nenek' => $this->input->post('data_warstun_asuh_nenek'),
				'data_warstun_asuh_tpa' => $this->input->post('data_warstun_asuh_tpa'),
				'data_warstun_inem' => $this->input->post('data_warstun_inem'),
				'data_warstun_imunisasi' => $this->input->post('data_warstun_imunisasi'),
				'data_warstun_tm_pkm' => $this->input->post('data_warstun_tm_pkm'),
				'data_warstun_tm_rujuk' => $this->input->post('data_warstun_tm_rujuk'),
				'data_warstun_bpjs_gibu' => $this->input->post('data_warstun_bpjs_gibu'),
				'data_warstun_sembako' => $this->input->post('data_warstun_sembako'),
				'data_warstun_dashyat' => $this->input->post('data_warstun_dashyat'),
				'data_warstun_pmt' => $this->input->post('data_warstun_pmt'),
				'data_warstun_rtlh' => $this->input->post('data_warstun_rtlh'),
				'data_warstun_ab' => $this->input->post('data_warstun_ab'),
				'data_warstun_jamban' => $this->input->post('data_warstun_jamban'),
				'data_warstun_user_created' => get_user_data('id'),				'data_warstun_created_at' => date('Y-m-d H:i:s'),
			];

			
			
//$save_data['_example'] = $this->input->post('_example');
			



			
			if (!is_dir(FCPATH . '/uploads/data_warga_stunting/')) {
				mkdir(FCPATH . '/uploads/data_warga_stunting/');
			}

			if (count((array) $this->input->post('data_warga_stunting_data_warstun_data_dukung_name'))) {
				foreach ((array) $_POST['data_warga_stunting_data_warstun_data_dukung_name'] as $idx => $file_name) {
					$data_warga_stunting_data_warstun_data_dukung_name_copy = date('YmdHis') . '-' . $file_name;

					rename(FCPATH . 'uploads/tmp/' . $_POST['data_warga_stunting_data_warstun_data_dukung_uuid'][$idx] . '/' .  $file_name, 
							FCPATH . 'uploads/data_warga_stunting/' . $data_warga_stunting_data_warstun_data_dukung_name_copy);

					$listed_image[] = $data_warga_stunting_data_warstun_data_dukung_name_copy;

					if (!is_file(FCPATH . '/uploads/data_warga_stunting/' . $data_warga_stunting_data_warstun_data_dukung_name_copy)) {
						echo json_encode([
							'success' => false,
							'message' => 'Error uploading file'
							]);
						exit;
					}
				}

				$save_data['data_warstun_data_dukung'] = implode($listed_image, ',');
			}
		
			
			$save_data_warga_stunting = $id = $this->model_data_warga_stunting->store($save_data);
            

			if ($save_data_warga_stunting) {
				
				$id = $save_data_warga_stunting;
				
				
					
				
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = true;
					$this->data['id'] 	   = $save_data_warga_stunting;
					$this->data['message'] = cclang('success_save_data_stay', [
						anchor('administrator/data_warga_stunting/edit/' . $save_data_warga_stunting, 'Edit Data Warga Stunting'),
						anchor('administrator/data_warga_stunting', ' Go back to list')
					]);
				} else {
					set_message(
						cclang('success_save_data_redirect', [
						anchor('administrator/data_warga_stunting/edit/' . $save_data_warga_stunting, 'Edit Data Warga Stunting')
					]), 'success');

            		$this->data['success'] = true;
					$this->data['redirect'] = base_url('administrator/data_warga_stunting');
				}
			} else {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = false;
					$this->data['message'] = cclang('data_not_change');
				} else {
            		$this->data['success'] = false;
            		$this->data['message'] = cclang('data_not_change');
					$this->data['redirect'] = base_url('administrator/data_warga_stunting');
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
	* Update view Data Warga Stuntings
	*
	* @var $id String
	*/
	public function edit($id)
	{
		$this->is_allowed('data_warga_stunting_update');

		$this->data['data_warga_stunting'] = $this->model_data_warga_stunting->find($id);

		$this->template->title('Data Warga Stunting Update');
		$this->render('backend/standart/administrator/data_warga_stunting/data_warga_stunting_update', $this->data);
	}

	/**
	* Update Data Warga Stuntings
	*
	* @var $id String
	*/
	public function edit_save($id)
	{
		if (!$this->is_allowed('data_warga_stunting_update', false)) {
			echo json_encode([
				'success' => false,
				'message' => cclang('sorry_you_do_not_have_permission_to_access')
				]);
			exit;
		}
				$this->form_validation->set_rules('data_warstun_identitas', 'No. Identitas', 'trim|required');
		

		$this->form_validation->set_rules('data_warstun_ktp', 'KTP', 'trim|required');
		

		$this->form_validation->set_rules('data_warstun_nama_lengkap', 'Nama Lengkap', 'trim|required');
		

		$this->form_validation->set_rules('data_warstun_kecamatan', 'Kecamatan', 'trim|required');
		

		$this->form_validation->set_rules('data_warstun_kelurahan', 'Kelurahan', 'trim|required');
		

		$this->form_validation->set_rules('data_warstun_rt', 'RT', 'trim|required');
		

		$this->form_validation->set_rules('data_warstun_rw', 'RW', 'trim|required');
		

		$this->form_validation->set_rules('data_warstun_tp_lahir', 'Tempat Lahir', 'trim|required');
		

		$this->form_validation->set_rules('data_warstun_tgl_lahir', 'Tanggal Lahir', 'trim|required');
		

		$this->form_validation->set_rules('data_warstun_alamat', 'Alamat Rumah', 'trim|required');
		

		$this->form_validation->set_rules('data_warstun_jenkel', 'Jenis Kelamin', 'trim|required');
		

		$this->form_validation->set_rules('data_warstun_relation', 'Hubungan Keluarga', 'trim|required');
		

		$this->form_validation->set_rules('data_warstun_kawin', 'Status Perkawinan', 'trim|required');
		

		$this->form_validation->set_rules('data_warstun_agama', 'Agama', 'trim|required');
		

		$this->form_validation->set_rules('data_warstun_pendidikan', 'Pendidikan Terakhir', 'trim|required');
		

		$this->form_validation->set_rules('data_warstun_pekerjaan', 'Pekerjaan Utama', 'trim|required');
		

		
		if ($this->form_validation->run()) {
		
			$save_data = [
				'data_warstun_identitas' => $this->input->post('data_warstun_identitas'),
				'data_warstun_ktp' => $this->input->post('data_warstun_ktp'),
				'data_warstun_nama_lengkap' => $this->input->post('data_warstun_nama_lengkap'),
				'data_warstun_kecamatan' => $this->input->post('data_warstun_kecamatan'),
				'data_warstun_kelurahan' => $this->input->post('data_warstun_kelurahan'),
				'data_warstun_rt' => $this->input->post('data_warstun_rt'),
				'data_warstun_rw' => $this->input->post('data_warstun_rw'),
				'data_warstun_tp_lahir' => $this->input->post('data_warstun_tp_lahir'),
				'data_warstun_tgl_lahir' => $this->input->post('data_warstun_tgl_lahir'),
				'data_warstun_alamat' => $this->input->post('data_warstun_alamat'),
				'data_warstun_jenkel' => $this->input->post('data_warstun_jenkel'),
				'data_warstun_relation' => $this->input->post('data_warstun_relation'),
				'data_warstun_kawin' => $this->input->post('data_warstun_kawin'),
				'data_warstun_agama' => $this->input->post('data_warstun_agama'),
				'data_warstun_pendidikan' => $this->input->post('data_warstun_pendidikan'),
				'data_warstun_pekerjaan' => $this->input->post('data_warstun_pekerjaan'),
				'data_warstun_anemia_bumil' => $this->input->post('data_warstun_anemia_bumil'),
				'data_warstun_kek' => $this->input->post('data_warstun_kek'),
				'data_warstun_tablet_bumil' => $this->input->post('data_warstun_tablet_bumil'),
				'data_warstun_usg' => $this->input->post('data_warstun_usg'),
				'data_warstun_anemia' => $this->input->post('data_warstun_anemia'),
				'data_warstun_tabel_remaja' => $this->input->post('data_warstun_tabel_remaja'),
				'data_warstun_kespro' => $this->input->post('data_warstun_kespro'),
				'data_warstun_catin' => $this->input->post('data_warstun_catin'),
				'data_warstun_pos_balita' => $this->input->post('data_warstun_pos_balita'),
				'data_warstun_pos_remaja' => $this->input->post('data_warstun_pos_remaja'),
				'data_warstun_asi_ekslusif' => $this->input->post('data_warstun_asi_ekslusif'),
				'data_warstun_mpasi' => $this->input->post('data_warstun_mpasi'),
				'data_warstun_uw' => $this->input->post('data_warstun_uw'),
				'data_warstun_sdidtk' => $this->input->post('data_warstun_sdidtk'),
				'data_warstun_status_ak' => $this->input->post('data_warstun_status_ak'),
				'data_warstun_status_aa_csr' => $this->input->post('data_warstun_status_aa_csr'),
				'data_warstun_status_at' => $this->input->post('data_warstun_status_at'),
				'data_warstun_asuh_ortu' => $this->input->post('data_warstun_asuh_ortu'),
				'data_warstun_asuh_nenek' => $this->input->post('data_warstun_asuh_nenek'),
				'data_warstun_asuh_tpa' => $this->input->post('data_warstun_asuh_tpa'),
				'data_warstun_inem' => $this->input->post('data_warstun_inem'),
				'data_warstun_imunisasi' => $this->input->post('data_warstun_imunisasi'),
				'data_warstun_tm_pkm' => $this->input->post('data_warstun_tm_pkm'),
				'data_warstun_tm_rujuk' => $this->input->post('data_warstun_tm_rujuk'),
				'data_warstun_bpjs_gibu' => $this->input->post('data_warstun_bpjs_gibu'),
				'data_warstun_sembako' => $this->input->post('data_warstun_sembako'),
				'data_warstun_dashyat' => $this->input->post('data_warstun_dashyat'),
				'data_warstun_pmt' => $this->input->post('data_warstun_pmt'),
				'data_warstun_rtlh' => $this->input->post('data_warstun_rtlh'),
				'data_warstun_ab' => $this->input->post('data_warstun_ab'),
				'data_warstun_jamban' => $this->input->post('data_warstun_jamban'),
			];

			

			
//$save_data['_example'] = $this->input->post('_example');
			


			
			$listed_image = [];
			if (count((array) $this->input->post('data_warga_stunting_data_warstun_data_dukung_name'))) {
				foreach ((array) $_POST['data_warga_stunting_data_warstun_data_dukung_name'] as $idx => $file_name) {
					if (isset($_POST['data_warga_stunting_data_warstun_data_dukung_uuid'][$idx]) AND !empty($_POST['data_warga_stunting_data_warstun_data_dukung_uuid'][$idx])) {
						$data_warga_stunting_data_warstun_data_dukung_name_copy = date('YmdHis') . '-' . $file_name;

						rename(FCPATH . 'uploads/tmp/' . $_POST['data_warga_stunting_data_warstun_data_dukung_uuid'][$idx] . '/' .  $file_name, 
								FCPATH . 'uploads/data_warga_stunting/' . $data_warga_stunting_data_warstun_data_dukung_name_copy);

						$listed_image[] = $data_warga_stunting_data_warstun_data_dukung_name_copy;

						if (!is_file(FCPATH . '/uploads/data_warga_stunting/' . $data_warga_stunting_data_warstun_data_dukung_name_copy)) {
							echo json_encode([
								'success' => false,
								'message' => 'Error uploading file'
								]);
							exit;
						}
					} else {
						$listed_image[] = $file_name;
					}
				}
			}
			
			$save_data['data_warstun_data_dukung'] = implode($listed_image, ',');
		
			
			$save_data_warga_stunting = $this->model_data_warga_stunting->change($id, $save_data);

			if ($save_data_warga_stunting) {

				
				

				
				
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = true;
					$this->data['id'] 	   = $id;
					$this->data['message'] = cclang('success_update_data_stay', [
						anchor('administrator/data_warga_stunting', ' Go back to list')
					]);
				} else {
					set_message(
						cclang('success_update_data_redirect', [
					]), 'success');

            		$this->data['success'] = true;
					$this->data['redirect'] = base_url('administrator/data_warga_stunting');
				}
			} else {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = false;
					$this->data['message'] = cclang('data_not_change');
				} else {
            		$this->data['success'] = false;
            		$this->data['message'] = cclang('data_not_change');
					$this->data['redirect'] = base_url('administrator/data_warga_stunting');
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
	* delete Data Warga Stuntings
	*
	* @var $id String
	*/
	public function delete($id = null)
	{
		$this->is_allowed('data_warga_stunting_delete');

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
            set_message(cclang('has_been_deleted', 'data_warga_stunting'), 'success');
        } else {
            set_message(cclang('error_delete', 'data_warga_stunting'), 'error');
        }

		redirect_back();
	}

		/**
	* View view Data Warga Stuntings
	*
	* @var $id String
	*/
	public function view($id)
	{
		$this->is_allowed('data_warga_stunting_view');

		$this->data['data_warga_stunting'] = $this->model_data_warga_stunting->join_avaiable()->filter_avaiable()->find($id);

		$this->template->title('Data Warga Stunting Detail');
		$this->render('backend/standart/administrator/data_warga_stunting/data_warga_stunting_view', $this->data);
	}
	
	/**
	* delete Data Warga Stuntings
	*
	* @var $id String
	*/
	private function _remove($id)
	{
		$data_warga_stunting = $this->model_data_warga_stunting->find($id);

		
		if (!empty($data_warga_stunting->data_warstun_data_dukung)) {
			foreach ((array) explode(',', $data_warga_stunting->data_warstun_data_dukung) as $filename) {
				$path = FCPATH . '/uploads/data_warga_stunting/' . $filename;

				if (is_file($path)) {
					$delete_file = unlink($path);
				}
			}
		}
		
		return $this->model_data_warga_stunting->remove($id);
	}
	
	
	/**
	* Upload Image Data Warga Stunting	* 
	* @return JSON
	*/
	public function upload_data_warstun_data_dukung_file()
	{
		if (!$this->is_allowed('data_warga_stunting_add', false)) {
			echo json_encode([
				'success' => false,
				'message' => cclang('sorry_you_do_not_have_permission_to_access')
				]);
			exit;
		}

		$uuid = $this->input->post('qquuid');

		echo $this->upload_file([
			'uuid' 		 	=> $uuid,
			'table_name' 	=> 'data_warga_stunting',
		]);
	}

	/**
	* Delete Image Data Warga Stunting	* 
	* @return JSON
	*/
	public function delete_data_warstun_data_dukung_file($uuid)
	{
		if (!$this->is_allowed('data_warga_stunting_delete', false)) {
			echo json_encode([
				'success' => false,
				'error' => cclang('sorry_you_do_not_have_permission_to_access')
				]);
			exit;
		}

		echo $this->delete_file([
            'uuid'              => $uuid, 
            'delete_by'         => $this->input->get('by'), 
            'field_name'        => 'data_warstun_data_dukung', 
            'upload_path_tmp'   => './uploads/tmp/',
            'table_name'        => 'data_warga_stunting',
            'primary_key'       => 'data_warstun_id',
            'upload_path'       => 'uploads/data_warga_stunting/'
        ]);
	}

	/**
	* Get Image Data Warga Stunting	* 
	* @return JSON
	*/
	public function get_data_warstun_data_dukung_file($id)
	{
		if (!$this->is_allowed('data_warga_stunting_update', false)) {
			echo json_encode([
				'success' => false,
				'message' => 'Image not loaded, you do not have permission to access'
				]);
			exit;
		}

		$data_warga_stunting = $this->model_data_warga_stunting->find($id);

		echo $this->get_file([
            'uuid'              => $id, 
            'delete_by'         => 'id', 
            'field_name'        => 'data_warstun_data_dukung', 
            'table_name'        => 'data_warga_stunting',
            'primary_key'       => 'data_warstun_id',
            'upload_path'       => 'uploads/data_warga_stunting/',
            'delete_endpoint'   => 'administrator/data_warga_stunting/delete_data_warstun_data_dukung_file'
        ]);
	}
	
	/**
	* Export to excel
	*
	* @return Files Excel .xls
	*/
	public function export()
	{
		$this->is_allowed('data_warga_stunting_export');

		$this->model_data_warga_stunting->export(
			'data_warga_stunting', 
			'data_warga_stunting',
			$this->model_data_warga_stunting->field_search
		);
	}

	/**
	* Export to PDF
	*
	* @return Files PDF .pdf
	*/
	public function export_pdf()
	{
		$this->is_allowed('data_warga_stunting_export');

		$this->model_data_warga_stunting->pdf('data_warga_stunting', 'data_warga_stunting');
	}


	public function single_pdf($id = null)
	{
		$this->is_allowed('data_warga_stunting_export');

		$table = $title = 'data_warga_stunting';
		$this->load->library('HtmlPdf');
      
        $config = array(
            'orientation' => 'p',
            'format' => 'a4',
            'marges' => array(5, 5, 5, 5)
        );

        $this->pdf = new HtmlPdf($config);
        $this->pdf->setDefaultFont('stsongstdlight'); 

        $result = $this->db->get($table);
       
        $data = $this->model_data_warga_stunting->find($id);
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

	public function ajax_data_warstun_kelurahan($id = null)
	{
		if (!$this->is_allowed('data_warga_stunting_list', false)) {
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


/* End of file data_warga_stunting.php */
/* Location: ./application/controllers/administrator/Data Warga Stunting.php */