<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_data_stunting_anak extends MY_Model {
	private $primary_key 	= 'stunting_anak_id';
	private $table_name 	= 'data_stunting_anak';
	public $field_search 	= ['stunting_anak_anak_id', 'stunting_anak_dtks', 'stunting_anak_tgl_ukur', 'stunting_anak_berat_badan', 'stunting_anak_tinggi_badan', 'stunting_anak_anak_angkat', 'stunting_anak_anak_angkat_anggaran', 'stunting_anak_pengasuh_balita', 'stunting_anak_pengasuh_balita_anggaran', 'stunting_anak_day_care', 'stunting_anak_day_care_anggaran', 'stunting_anak_asupan_gizi_pmt', 'stunting_anak_imunisasi', 'stunting_anak_imunisasi_anggaran', 'stunting_anak_terapi_gizi', 'stunting_anak_terapi_gizi_anggaran', 'stunting_anak_bpjs_stunting', 'stunting_anak_bpjs_stunting_anggaran', 'stunting_anak_bantuan_sembako', 'stunting_anak_bantuan_sembako_anggaran', 'stunting_anak_dahsyat', 'stunting_anak_dahsyat_anggaran', 'stunting_anak_rtlh', 'stunting_anak_rtlh_anggaran', 'stunting_anak_dlh', 'stunting_anak_dlh_anggaran', 'stunting_anak_akses_pangan', 'stunting_anak_akses_pangan_anggaran', 'stunting_anak_mitra_lain', 'data_anak.anak_nama'];
	public $sort_option 	= ['stunting_anak_id', 'DESC'];
	
	public function __construct() {
		$config = array(
			'primary_key'   => $this->primary_key,
			'table_name'    => $this->table_name,
			'field_search'  => $this->field_search,
			'sort_option'   => $this->sort_option,
		 );

		parent::__construct($config);
	}

	public function count_all($q = null, $field = null)
	{
		$iterasi = 1;
		$num = count($this->field_search);
		$where = NULL;
		$q = $this->scurity($q);
		$field = $this->scurity($field);

		if (empty($field)) {
			foreach ($this->field_search as $field) {
				$f_search = "data_stunting_anak.".$field;

				if (strpos($field, '.')) {
					$f_search = $field;
				}
				if ($iterasi == 1) {
					$where .=  $f_search . " LIKE '%" . $q . "%' ";
				} else {
					$where .= "OR " .  $f_search . " LIKE '%" . $q . "%' ";
				}
				$iterasi++;
			}

			$where = '('.$where.')';
		} else {
			$where .= "(" . "data_stunting_anak.".$field . " LIKE '%" . $q . "%' )";
		}

		$this->join_avaiable()->filter_avaiable();
		$this->db->where($where);
		$query = $this->db->get($this->table_name);

		return $query->num_rows();
	}

	public function get($q = null, $field = null, $limit = 0, $offset = 0, $select_field = [])
	{
		$iterasi = 1;
		$num = count($this->field_search);
		$where = NULL;
		$q = $this->scurity($q);
		$field = $this->scurity($field);

		if (empty($field)) {
			foreach ($this->field_search as $field) {
				$f_search = "data_stunting_anak.".$field;
				if (strpos($field, '.')) {
					$f_search = $field;
				}

				if ($iterasi == 1) {
					$where .= $f_search . " LIKE '%" . $q . "%' ";
				} else {
					$where .= "OR " .$f_search . " LIKE '%" . $q . "%' ";
				}
				$iterasi++;
			}

			$where = '('.$where.')';
		} else {
			$where .= "(" . "data_stunting_anak.".$field . " LIKE '%" . $q . "%' )";
		}

		if (is_array($select_field) AND count($select_field)) {
			$this->db->select($select_field);
		}
		
		$this->join_avaiable()->filter_avaiable();
		$this->db->where($where);
		$this->db->limit($limit, $offset);
		
		$this->sortable();
		
		$query = $this->db->get($this->table_name);

		return $query->result();
	}

	public function join_avaiable() {
		$this->db->join('data_anak', 'data_anak.anak_id = data_stunting_anak.stunting_anak_anak_id', 'LEFT');
		$this->db->select('data_anak.anak_nama,data_stunting_anak.*,data_anak.anak_nama as data_anak_anak_nama,data_anak.anak_nama as anak_nama');

		return $this;
	}

	public function filter_avaiable() {
		if (!$this->aauth->is_admin()) {
			if ($this->aauth->is_member('7')) {
				$this->db->where('puskesmas_opd_id', $this->session->userdata('opd_id'));
			}else if ($this->aauth->is_member('8')) {
				$this->db->where('kelurahan_id', $this->session->userdata('opd_id'));
			}else if ($this->aauth->is_member('9')) {
				$this->db->where('kecamatan_id', $this->session->userdata('opd_id'));
			}
		}

		return $this;
	}

	public function join_stunting_anak() {
		$this->db->join('kecamatans', 'kecamatan_id = anak_kecamatan_id', 'LEFT');
		$this->db->join('kelurahans', 'kelurahan_id = anak_kelurahan_id', 'LEFT');
		$this->db->join('data_stunting_anak', 'stunting_anak_anak_id = anak_id', 'LEFT');

		return $this;
	}

}

/* End of file Model_data_stunting_anak.php */
/* Location: ./application/models/Model_data_stunting_anak.php */