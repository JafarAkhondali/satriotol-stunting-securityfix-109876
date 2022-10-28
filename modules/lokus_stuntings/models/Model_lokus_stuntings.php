<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_lokus_stuntings extends MY_Model {

    private $primary_key    = 'lokus_stunting_id';
    private $table_name     = 'lokus_stuntings';
    public $field_search   = ['lokus_year_id', 'kelurahan_id', 'lokus_stunting_create_at', 'lokus_stunting_user', 'lokus_years.lokus_year_nama', 'kelurahans.kelurahan_nama'];
    public $sort_option = ['lokus_stunting_id', 'DESC'];
    
    public function __construct()
    {
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
                $f_search = "lokus_stuntings.".$field;

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
            $where .= "(" . "lokus_stuntings.".$field . " LIKE '%" . $q . "%' )";
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
                $f_search = "lokus_stuntings.".$field;
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
            $where .= "(" . "lokus_stuntings.".$field . " LIKE '%" . $q . "%' )";
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
        $this->db->join('lokus_years', 'lokus_years.lokus_year_id = lokus_stuntings.lokus_year_id', 'LEFT');
        $this->db->join('kelurahans', 'kelurahans.kelurahan_id = lokus_stuntings.kelurahan_id', 'LEFT');
        
        $this->db->select('lokus_years.lokus_year_nama,kelurahans.kelurahan_nama,lokus_stuntings.*,lokus_years.lokus_year_nama as lokus_years_lokus_year_nama,lokus_years.lokus_year_nama as lokus_year_nama,kelurahans.kelurahan_nama as kelurahans_kelurahan_nama,kelurahans.kelurahan_nama as kelurahan_nama');


        return $this;
    }

    public function filter_avaiable() {

        if (!$this->aauth->is_admin()) {
            $this->db->where($this->table_name.'.lokus_stunting_user', get_user_data('id'));
        }

        return $this;
    }

}

/* End of file Model_lokus_stuntings.php */
/* Location: ./application/models/Model_lokus_stuntings.php */