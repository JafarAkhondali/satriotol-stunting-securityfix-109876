<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_detail_data_dtks extends MY_Model {
    private $primary_key    = 'detail_data_dtks_id';
    private $table_name     = 'detail_data_dtks';
    public $field_search   = ['detail_data_dtks_warga_id', 'detail_data_dtks_ibu_kandung', 'data_warga.dawar_nama_lengkap'];
    public $sort_option = ['detail_data_dtks_id', 'DESC'];
    
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
        $iterasi = 1;
        $num = count($this->field_search);
        $where = NULL;
        $q = $this->scurity($q);
        $field = $this->scurity($field);

        if (empty($field)) {
            foreach ($this->field_search as $field) {
                $f_search = "detail_data_dtks.".$field;

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
            $where .= "(" . "detail_data_dtks.".$field . " LIKE '%" . $q . "%' )";
        }

        $this->join_avaiable()->filter_avaiable();
        $this->db->where($where);
        $query = $this->db->get($this->table_name);

        return $query->num_rows();
    }

    public function get($q = null, $field = null, $limit = 0, $offset = 0, $select_field = []) {
        $iterasi = 1;
        $num = count($this->field_search);
        $where = NULL;
        $q = $this->scurity($q);
        $field = $this->scurity($field);

        if (empty($field)) {
            foreach ($this->field_search as $field) {
                $f_search = "detail_data_dtks.".$field;
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
            $where .= "(" . "detail_data_dtks.".$field . " LIKE '%" . $q . "%' )";
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
        $this->db->select('data_warga.dawar_nik AS data_warga_dawar_nik,
                            data_warga.dawar_nik AS dawar_nik,
                            data_warga.dawar_nama_lengkap AS data_warga_dawar_nama_lengkap,
                            data_warga.dawar_nama_lengkap AS dawar_nama_lengkap,
                            data_warga.dawar_jenkel AS data_warga_dawar_jenkel,
                            data_warga.dawar_jenkel AS dawar_jenkel,
                            detail_data_dtks.*');

        $this->db->join('data_warga', 'data_warga.dawar_id = detail_data_dtks.detail_data_dtks_warga_id', 'LEFT');

        return $this;
    }

    public function filter_avaiable() {

        if (!$this->aauth->is_admin()) {
            $this->db->where($this->table_name.'.detail_data_dtks_user_created', get_user_data('id'));
        }

        return $this;
    }

}

/* End of file Model_detail_data_dtks.php */
/* Location: ./application/models/Model_detail_data_dtks.php */