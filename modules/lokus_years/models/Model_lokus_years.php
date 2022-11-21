<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_lokus_years extends MY_Model {
    private $primary_key    = 'lokus_year_id';
    private $table_name     = 'lokus_years';
    public $field_search   = ['lokus_year_nama', 'lokus_year_file', 'lokus_year_create_at', 'lokus_year_user'];
    public $sort_option = ['lokus_year_id', 'DESC'];
    
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
                $f_search = "lokus_years.".$field;

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
            $where .= "(" . "lokus_years.".$field . " LIKE '%" . $q . "%' )";
        }

        $this->join_avaiable()->filter_avaiable();
        $this->db->where($where);
        $query = $this->db->get($this->table_name);

        return $query->num_rows();
    }

    public function get($q = null, $field = null, $limit = 0, $offset = 0, $select_field = []) {
        $iterasi    = 1;
        $num        = count($this->field_search);
        $where      = NULL;
        $q          = $this->scurity($q);
        $field      = $this->scurity($field);

        if (empty($field)) {
            foreach ($this->field_search as $field) {
                $f_search = "lokus_years.".$field;
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
            $where .= "(" . "lokus_years.".$field . " LIKE '%" . $q . "%' )";
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
        $this->db->select('lokus_years.*, aauth_users.id AS user_id, aauth_users.username AS user_username');
        $this->db->join('aauth_users', 'aauth_users.id = lokus_years.lokus_year_user', 'LEFT');

        return $this;
    }

    public function filter_avaiable() {
        if (!$this->aauth->is_admin()) {
            // $this->db->where($this->table_name.'.lokus_year_user', get_user_data('id'));
        }

        return $this;
    }

    public function query_lokus_stunting($id) {
        $this->db->where('lokus_year_id', $id);
        $query = $this->db->get('lokus_stuntings');
        
        return $query;
    }

    public function _get_datatables_query_lokus_stunting(){
        $this->db->select('lokus_stuntings.*,
                            kecamatans.kecamatan_nama AS nama_kecamatan,
                            kelurahans.kelurahan_nama AS nama_kelurahan');

		$this->db->from('lokus_stuntings');
		
		$i = 0;

		foreach ($this->column_search as $item){
			if($_POST['search']['value']){
				if($i===0){
					$this->db->group_start(); 
					$this->db->like($item, $_POST['search']['value']);
				}else{
					$this->db->or_like($item, $_POST['search']['value']);
				}

				if(count($this->column_search) - 1 == $i){
					$this->db->group_end();
				}

				$i++;
			}

			if(isset($_POST['order'])){
				$this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
			}else if(isset($this->order)){
				$order = $this->order;
				$this->db->order_by(key($order), $order[key($order)]);
			}
		}
	}

	public function get_datatables_lokus_stunting($id){
		$this->_get_datatables_query_lokus_stunting($id);
        $this->db->join('kelurahans', 'FIND_IN_SET( kelurahans.kelurahan_id, lokus_stuntings.kelurahan_id ) > 0', 'LEFT');
        $this->db->join('kecamatans', 'kecamatans.kecamatan_id = kelurahans.kecamatan_id', 'LEFT');
        
        $this->db->where('lokus_stuntings.lokus_year_id', $id);

		if($_POST['length'] != -1) {
            $this->db->limit($_POST['length'], $_POST['start']);
        }

		$query = $this->db->get();
		return $query->result();
	}

	public function count_filtered($id){
		$this->_get_datatables_query_lokus_stunting($id);
        $this->db->join('kelurahans', 'FIND_IN_SET( kelurahans.kelurahan_id, lokus_stuntings.kelurahan_id ) > 0', 'LEFT');
        $this->db->join('kecamatans', 'kecamatans.kecamatan_id = kelurahans.kecamatan_id', 'LEFT');
        
        $this->db->where('lokus_stuntings.lokus_year_id', $id);
		$query = $this->db->get();

		return $query->num_rows();
	}

	public function count_all_kelurahan($id){
		$this->db->from('lokus_stuntings');
        $this->db->join('kelurahans', 'FIND_IN_SET( kelurahans.kelurahan_id, lokus_stuntings.kelurahan_id ) > 0', 'LEFT');
        $this->db->join('kecamatans', 'kecamatans.kecamatan_id = kelurahans.kecamatan_id', 'LEFT');
        $this->db->where('lokus_stuntings.lokus_year_id', $id);

		return $this->db->count_all_results();
	}

}

/* End of file Model_lokus_years.php */
/* Location: ./application/models/Model_lokus_years.php */