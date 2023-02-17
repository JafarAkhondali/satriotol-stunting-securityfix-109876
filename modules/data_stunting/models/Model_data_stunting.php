<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_data_stunting extends MY_Model {

    private $primary_key 	= 'id_data_stunting';
    private $table_name 	= 'data_stunting';
    public $field_search 	= ['puskesmas', 'kecamatan', 'kelurahan', 'no_kk', 'nik_anak', 'nama_anak', 'jenis_kel', 'tanggal_lahir', 'puskesmas.puskesmas_nama', 'kecamatans.kecamatan_nama', 'kelurahans.kelurahan_nama'];
    public $sort_option 	= ['id_data_stunting', 'DESC'];
    
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
                $f_search = "data_stunting.".$field;

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
            $where .= "(" . "data_stunting.".$field . " LIKE '%" . $q . "%' )";
        }

        $this->join_avaiable()->filter_avaiable();
        $this->db->where($where);
		$this->db->order_by('id_data_stunting', 'DESC');
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
                $f_search = "data_stunting.".$field;
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
            $where .= "(" . "data_stunting.".$field . " LIKE '%" . $q . "%' )";
        }

        if (is_array($select_field) AND count($select_field)) {
            $this->db->select($select_field);
        }
        
        $this->join_avaiable()->filter_avaiable();
        $this->db->where($where);
		$this->db->order_by('id_data_stunting', 'DESC');
        $this->db->limit($limit, $offset);
        
        $this->sortable();
        
        $query = $this->db->get($this->table_name);

        return $query->result();
    }

    public function join_avaiable() {
        $this->db->join('puskesmas', 'puskesmas.puskesmas_id = data_stunting.puskesmas', 'LEFT');
        $this->db->join('kecamatans', 'kecamatans.kecamatan_id = data_stunting.kecamatan', 'LEFT');
        $this->db->join('kelurahans', 'kelurahans.kelurahan_id = data_stunting.kelurahan', 'LEFT');
        
        $this->db->select('puskesmas.puskesmas_nama,kecamatans.kecamatan_nama,kelurahans.kelurahan_nama,data_stunting.*,puskesmas.puskesmas_nama as puskesmas_puskesmas_nama,puskesmas.puskesmas_nama as puskesmas_nama,kecamatans.kecamatan_nama as kecamatans_kecamatan_nama,kecamatans.kecamatan_nama as kecamatan_nama,kelurahans.kelurahan_nama as kelurahans_kelurahan_nama,kelurahans.kelurahan_nama as kelurahan_nama');


        return $this;
    }

    public function filter_avaiable() {

        if (!$this->aauth->is_admin()) {
            $this->db->where($this->table_name.'.user_created', get_user_data('id'));
        }

        return $this;
    }

}

/* End of file Model_data_stunting.php */
/* Location: ./application/models/Model_data_stunting.php */