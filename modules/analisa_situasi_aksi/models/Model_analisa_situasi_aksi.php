<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_analisa_situasi_aksi extends MY_Model {
	private $primary_key 	= 'analisa_situasi_aksi_id';
	private $table_name 	= 'analisa_situasi_aksi';
	public $field_search 	= ['analisa_situasi_id', 'analisa_situasi_indikator_id', 'analisa_situasi_aksi_cakupan', 'analisa_situasi_aksi_warna', 'analisa_situasi.analisa_situasi_year', 'analisa_situasi_indikator.analisa_situasi_indikator_nama'];
	public $sort_option 	= ['analisa_situasi_aksi_id', 'DESC'];
	
	public function __construct() {
		$config = array(
			'primary_key' 	=> $this->primary_key,
			'table_name' 	=> $this->table_name,
			'field_search' 	=> $this->field_search,
			'sort_option' 	=> $this->sort_option,
		 );

		parent::__construct($config);
	}

	public function count_all($q = null, $field = null) {
		$iterasi 	= 1;
		$num 		= count($this->field_search);
		$where 		= NULL;
		$q 			= $this->scurity($q);
		$field 		= $this->scurity($field);

		if (empty($field)) {
			foreach ($this->field_search as $field) {
				$f_search = "analisa_situasi_aksi.".$field;

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
			$where .= "(" . "analisa_situasi_aksi.".$field . " LIKE '%" . $q . "%' )";
		}

		$this->join_avaiable()->filter_avaiable();
		$this->db->where($where);
		$query = $this->db->get($this->table_name);

		return $query->num_rows();
	}

	public function get($q = null, $field = null, $limit = 0, $offset = 0, $select_field = []) {
		$iterasi 	= 1;
		$num 		= count($this->field_search);
		$where 		= NULL;
		$q 			= $this->scurity($q);
		$field 		= $this->scurity($field);

		if (empty($field)) {
			foreach ($this->field_search as $field) {
				$f_search = "analisa_situasi_aksi.".$field;
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
			$where .= "(" . "analisa_situasi_aksi.".$field . " LIKE '%" . $q . "%' )";
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
		$this->db->join('analisa_situasi', 'analisa_situasi.analisa_situasi_id = analisa_situasi_aksi.analisa_situasi_id', 'LEFT');
		$this->db->join('analisa_situasi_indikator', 'analisa_situasi_indikator.analisa_situasi_indikator_id = analisa_situasi_aksi.analisa_situasi_indikator_id', 'LEFT');
		
		$this->db->select('analisa_situasi.analisa_situasi_year,analisa_situasi_indikator.analisa_situasi_indikator_nama,analisa_situasi_aksi.*,analisa_situasi.analisa_situasi_year as analisa_situasi_analisa_situasi_year,analisa_situasi.analisa_situasi_year as analisa_situasi_year,analisa_situasi_indikator.analisa_situasi_indikator_nama as analisa_situasi_indikator_analisa_situasi_indikator_nama,analisa_situasi_indikator.analisa_situasi_indikator_nama as analisa_situasi_indikator_nama');

		return $this;
	}

	public function filter_avaiable() {
		if (!$this->aauth->is_admin()) {
			// $this->db->where($this->table_name.'.analisa_situasi_aksi_create_author', get_user_data('id'));
			// $this->db->where($this->table_name.'.analisa_situasi_aksi_update_author', get_user_data('id'));
		}

		return $this;
	}

}

/* End of file Model_analisa_situasi_aksi.php */
/* Location: ./application/models/Model_analisa_situasi_aksi.php */