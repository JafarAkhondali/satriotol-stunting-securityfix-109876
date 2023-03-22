<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_data_warga extends MY_Model {

    private $primary_key    = 'dawar_id';
    private $table_name     = 'data_warga';
    public $field_search   = ['dawar_nokk', 'dawar_nik', 'dawar_nama_lengkap', 'dawar_tgl_lahir', 'dawar_jenkel', 'dawar_alamat', 'dawar_rw', 'dawar_rt', 'dawar_kecamatan', 'dawar_kelurahan', 'agama.agama_nama', 'kecamatans.kecamatan_nama', 'kelurahans.kelurahan_nama'];
    public $sort_option = ['dawar_id', 'DESC'];
    
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
                $f_search = "data_warga.".$field;

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
            $where .= "(" . "data_warga.".$field . " LIKE '%" . $q . "%' )";
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
                $f_search = "data_warga.".$field;
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
            $where .= "(" . "data_warga.".$field . " LIKE '%" . $q . "%' )";
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
        $this->db->join('agama', 'agama.agama_id = data_warga.dawar_agama', 'LEFT');
        $this->db->join('kecamatans', 'kecamatans.kecamatan_id = data_warga.dawar_kecamatan', 'LEFT');
        $this->db->join('kelurahans', 'kelurahans.kelurahan_id = data_warga.dawar_kelurahan', 'LEFT');
        
        $this->db->select('agama.agama_nama,kecamatans.kecamatan_nama,kelurahans.kelurahan_nama,data_warga.*,agama.agama_nama as agama_agama_nama,agama.agama_nama as agama_nama,kecamatans.kecamatan_nama as kecamatans_kecamatan_nama,kecamatans.kecamatan_nama as kecamatan_nama,kelurahans.kelurahan_nama as kelurahans_kelurahan_nama,kelurahans.kelurahan_nama as kelurahan_nama');


        return $this;
    }

    public function filter_avaiable() {

        if (!$this->aauth->is_admin()) {
            $this->db->where($this->table_name.'.dawar_user_created', get_user_data('id'));
        }

        return $this;
    }

}

/* End of file Model_data_warga.php */
/* Location: ./application/models/Model_data_warga.php */