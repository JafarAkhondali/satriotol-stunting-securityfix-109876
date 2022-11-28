<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_rentan_opd extends MY_Model {
	private $primary_key 	= 'rentan_opd_id';
	private $table_name 	= 'rentan_opd';
	public $field_search 	= ['opd_id', 'rentan_opd_kegiatan', 'opd.opd_nama'];
	public $sort_option 	= ['rentan_opd_id', 'DESC'];
	
	public function __construct() {
		$config = array(
			'primary_key'   => $this->primary_key,
			'table_name'    => $this->table_name,
			'field_search'  => $this->field_search,
			'sort_option'   => $this->sort_option,
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
				$f_search = "rentan_opd.".$field;

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
			$where .= "(" . "rentan_opd.".$field . " LIKE '%" . $q . "%' )";
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
				$f_search = "rentan_opd.".$field;
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
			$where .= "(" . "rentan_opd.".$field . " LIKE '%" . $q . "%' )";
		}

		if (is_array($select_field) AND count($select_field)) {
			$this->db->select($select_field);
		}
		
		$this->join_avaiable()->filter_avaiable();
		$this->db->where($where);
		$this->db->limit($limit, $offset);
		$this->db->order_by('rentan_opd_id', 'DESC');
		
		
		$this->sortable();
		
		$query = $this->db->get($this->table_name);

		return $query->result();
	}

	public function join_avaiable() {
		$this->db->join('opd', 'opd.opd_id = rentan_opd.opd_id', 'LEFT');
		
		$this->db->select('opd.opd_nama,rentan_opd.*,opd.opd_nama as opd_opd_nama,opd.opd_nama as opd_nama');

		return $this;
	}

	public function filter_avaiable() {
		if (!$this->aauth->is_admin()) {
			// $this->db->where($this->table_name.'.rentan_opd_user', get_user_data('id'));
		}

		return $this;
	}

	public function query_galeri_rentan($id) {
		$this->db->join('rentan_opd', 'rentan_opd.rentan_opd_id = rentan_opd_galeri.rentan_opd_id', 'LEFT');
		$this->db->where('rentan_opd.rentan_opd_id', $id);
		
		return $this->db->get('rentan_opd_galeri');
	}

}

/* End of file Model_rentan_opd.php */
/* Location: ./application/models/Model_rentan_opd.php */