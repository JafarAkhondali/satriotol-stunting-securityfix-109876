<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_rembuk_stunting_galery extends MY_Model {
    private $primary_key    = 'rembuk_stunting_galery_id';
    private $table_name     = 'rembuk_stunting_galery';
    public $field_search    = ['rembuk_stunting_id', 'rembuk_stunting_galery_image', 'rembuk_stuntings.rembuk_stunting_year'];
    public $sort_option     = ['rembuk_stunting_galery_id', 'DESC'];
    
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
        $iterasi    = 1;
        $num        = count($this->field_search);
        $where      = NULL;
        $q          = $this->scurity($q);
        $field      = $this->scurity($field);

        if (empty($field)) {
            foreach ($this->field_search as $field) {
                $f_search = "rembuk_stunting_galery.".$field;

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
            $where .= "(" . "rembuk_stunting_galery.".$field . " LIKE '%" . $q . "%' )";
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
                $f_search = "rembuk_stunting_galery.".$field;
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
            $where .= "(" . "rembuk_stunting_galery.".$field . " LIKE '%" . $q . "%' )";
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
        $this->db->select('rembuk_stuntings.rembuk_stunting_year,rembuk_stunting_galery.*,rembuk_stuntings.rembuk_stunting_year as rembuk_stuntings_rembuk_stunting_year,rembuk_stuntings.rembuk_stunting_year as rembuk_stunting_year');
        $this->db->join('rembuk_stuntings', 'rembuk_stuntings.rembuk_stunting_id = rembuk_stunting_galery.rembuk_stunting_id', 'LEFT');

        return $this;
    }

    public function filter_avaiable() {
        if (!$this->aauth->is_admin()) {
            // $this->db->where($this->table_name.'.rembuk_stunting_galery_user', get_user_data('id'));
        }

        return $this;
    }

}

/* End of file Model_rembuk_stunting_galery.php */
/* Location: ./application/models/Model_rembuk_stunting_galery.php */