<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_kelurahans extends MY_Model {
    private $primary_key    = 'kelurahan_id';
    private $table_name     = 'kelurahans';
    public $field_search   = ['kecamatan_id', 'kelurahan_nama', 'kelurahan_create_at', 'kelurahan_create_user', 'kecamatans.kecamatan_nama'];
    public $sort_option = ['kelurahan_id', 'DESC'];
    
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
                $f_search = "kelurahans.".$field;

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
            $where .= "(" . "kelurahans.".$field . " LIKE '%" . $q . "%' )";
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
                $f_search = "kelurahans.".$field;
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
            $where .= "(" . "kelurahans.".$field . " LIKE '%" . $q . "%' )";
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
		$this->db->select('kelurahans.*, kecamatans.kecamatan_nama as kecamatans_kecamatan_nama, kecamatans.kecamatan_nama as kecamatan_nama,
							aauth_users.id AS user_id, aauth_users.username AS user_username, aauth_users.full_name AS user_lengkap');
        $this->db->join('kecamatans', 'kecamatans.kecamatan_id = kelurahans.kecamatan_id', 'LEFT');
		$this->db->join('aauth_users', 'aauth_users.id = kelurahans.kelurahan_create_user', 'LEFT');
		

        return $this;
    }

    public function filter_avaiable() {
        if (!$this->aauth->is_admin()) {}

        return $this;
    }

}

/* End of file Model_kelurahans.php */
/* Location: ./application/models/Model_kelurahans.php */