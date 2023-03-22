<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_data_warga_stunting extends MY_Model {

    private $primary_key    = 'data_warstun_id';
    private $table_name     = 'data_warga_stunting';
    public $field_search   = ['data_warstun_identitas', 'data_warstun_ktp', 'data_warstun_nama_lengkap', 'data_warstun_kecamatan', 'data_warstun_kelurahan', 'data_warstun_rt', 'data_warstun_rw', 'data_warstun_tp_lahir', 'data_warstun_tgl_lahir', 'data_warstun_alamat', 'data_warstun_jenkel', 'data_warstun_relation', 'data_warstun_kawin', 'data_warstun_agama', 'data_warstun_pendidikan', 'data_warstun_pekerjaan', 'data_warstun_anemia_bumil', 'data_warstun_kek', 'data_warstun_tablet_bumil', 'data_warstun_usg', 'data_warstun_anemia', 'data_warstun_tabel_remaja', 'data_warstun_kespro', 'data_warstun_catin', 'data_warstun_pos_balita', 'data_warstun_pos_remaja', 'data_warstun_asi_ekslusif', 'data_warstun_mpasi', 'data_warstun_uw', 'data_warstun_sdidtk', 'data_warstun_status_ak', 'data_warstun_status_aa_csr', 'data_warstun_status_at', 'data_warstun_asuh_ortu', 'data_warstun_asuh_nenek', 'data_warstun_asuh_tpa', 'data_warstun_inem', 'data_warstun_imunisasi', 'data_warstun_tm_pkm', 'data_warstun_tm_rujuk', 'data_warstun_bpjs_gibu', 'data_warstun_sembako', 'data_warstun_dashyat', 'data_warstun_pmt', 'data_warstun_rtlh', 'data_warstun_ab', 'data_warstun_jamban', 'data_warstun_data_dukung', 'kecamatans.kecamatan_nama', 'kelurahans.kelurahan_nama', 'relation.relation_nama', 'marriage.marriage_nama', 'agama.agama_nama', 'pendidikan.pendidikan_nama', 'pekerjaan.pekerjaan_nama'];
    public $sort_option = ['data_warstun_id', 'DESC'];
    
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
                $f_search = "data_warga_stunting.".$field;

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
            $where .= "(" . "data_warga_stunting.".$field . " LIKE '%" . $q . "%' )";
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
                $f_search = "data_warga_stunting.".$field;
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
            $where .= "(" . "data_warga_stunting.".$field . " LIKE '%" . $q . "%' )";
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
        $this->db->join('kecamatans', 'kecamatans.kecamatan_id = data_warga_stunting.data_warstun_kecamatan', 'LEFT');
        $this->db->join('kelurahans', 'kelurahans.kelurahan_id = data_warga_stunting.data_warstun_kelurahan', 'LEFT');
        $this->db->join('relation', 'relation.relation_id = data_warga_stunting.data_warstun_relation', 'LEFT');
        $this->db->join('marriage', 'marriage.marriage_id = data_warga_stunting.data_warstun_kawin', 'LEFT');
        $this->db->join('agama', 'agama.agama_id = data_warga_stunting.data_warstun_agama', 'LEFT');
        $this->db->join('pendidikan', 'pendidikan.pendidikan_id = data_warga_stunting.data_warstun_pendidikan', 'LEFT');
        $this->db->join('pekerjaan', 'pekerjaan.pekerjaan_id = data_warga_stunting.data_warstun_pekerjaan', 'LEFT');
        
        $this->db->select('kecamatans.kecamatan_nama,kelurahans.kelurahan_nama,relation.relation_nama,marriage.marriage_nama,agama.agama_nama,pendidikan.pendidikan_nama,pekerjaan.pekerjaan_nama,data_warga_stunting.*,kecamatans.kecamatan_nama as kecamatans_kecamatan_nama,kecamatans.kecamatan_nama as kecamatan_nama,kelurahans.kelurahan_nama as kelurahans_kelurahan_nama,kelurahans.kelurahan_nama as kelurahan_nama,relation.relation_nama as relation_relation_nama,relation.relation_nama as relation_nama,marriage.marriage_nama as marriage_marriage_nama,marriage.marriage_nama as marriage_nama,agama.agama_nama as agama_agama_nama,agama.agama_nama as agama_nama,pendidikan.pendidikan_nama as pendidikan_pendidikan_nama,pendidikan.pendidikan_nama as pendidikan_nama,pekerjaan.pekerjaan_nama as pekerjaan_pekerjaan_nama,pekerjaan.pekerjaan_nama as pekerjaan_nama');


        return $this;
    }

    public function filter_avaiable() {

        if (!$this->aauth->is_admin()) {
            $this->db->where($this->table_name.'.data_warstun_user_created', get_user_data('id'));
        }

        return $this;
    }

}

/* End of file Model_data_warga_stunting.php */
/* Location: ./application/models/Model_data_warga_stunting.php */