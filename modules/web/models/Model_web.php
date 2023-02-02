<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_web extends MY_Model {
	public function __construct(){
		parent::__construct();
	}

	public function berita_terbaru(){
		$this->db->select('blog.*, blog_category.category_id AS kategori_id, blog_category.category_name AS nama_kategori, aauth_users.id AS user_id, aauth_users.username AS user_username');
		$this->db->from('blog');
		$this->db->join('blog_category', 'blog.category = blog_category.category_id');
		$this->db->join('aauth_users', 'blog.author = aauth_users.id');
		$this->db->order_by('blog.id', 'DESC');
		$this->db->limit(6);

		return $this->db->where('verified_status', '1')->get();
	}

	public function categorynya(){
		$this->db->select('blog_category.category_id AS id_kategori,
							blog_category.category_name AS nama_kategori');
		return $this->db->from('blog_category')->get();
	}

	public function rembuk_stunting($id = NULL){
		if ($id != NULL) {
			$this->db->select('rembuk_stuntings.*, rembuk_stunting_galery.*');

			$this->db->join('rembuk_stunting_galery', 'rembuk_stunting_galery.rembuk_stunting_id = rembuk_stuntings.rembuk_stunting_id', 'LEFT');
			$this->db->where('rembuk_stuntings.rembuk_stunting_id', $id);
		}else{
			$this->db->select('rembuk_stuntings.*');
		}

		return $this->db->get('rembuk_stuntings');
	}

	public function hasil_lokus_stunting($tahun = NULL) {
		if ($tahun != NULL) {
			$this->db->where('lokus_year_nama', $tahun);
		}

		$this->db->select('lokus_years.lokus_year_nama AS tahun_lokus,
							kecamatans.kecamatan_id,
							kecamatans.kecamatan_nama,
							kelurahans.kelurahan_id,
							kelurahans.kelurahan_nama,
							lokus_years.lokus_year_file AS file_lokus');
		$this->db->from('lokus_stuntings');
		$this->db->join('lokus_years', 'lokus_years.lokus_year_id = lokus_stuntings.lokus_year_id', 'LEFT');
		$this->db->join('kelurahans', 'FIND_IN_SET(kelurahans.kelurahan_id, lokus_stuntings.kelurahan_id) > 0', 'LEFT');
		$this->db->join('kecamatans', 'FIND_IN_SET(kecamatans.kecamatan_id, kelurahans.kecamatan_id) > 0', 'LEFT');

		return $this->db->order_by('kecamatan_nama', 'ASC')->get();
	}

	public function rentan_opd(){
		$this->db->select('rentan_opd.*, opd.*, count(rentan_opd.opd_id) AS jumlah_kegiatan');
		$this->db->join('opd', 'rentan_opd.opd_id = opd.opd_id', 'LEFT');
		$this->db->group_by('opd.opd_id');

		$query = $this->db->from('rentan_opd');
		
		return $query->get();
	}

	public function rentan_opd_kegiatan($id = NULL){
		if ($id != NULL) {
			$this->db->where('rentan_opd.rentan_opd_id', $id);
		}

		$this->db->select('rentan_opd.*, opd.*');
		$this->db->join('opd', 'rentan_opd.opd_id = opd.opd_id', 'LEFT');

		$query = $this->db->from('rentan_opd');
		
		return $query->get();
	}

	public function rentan_opd_galeri($id){
		$this->db->select('rentan_opd_galeri.*');
		$this->db->where('rentan_opd_id', $id);

		$query = $this->db->from('rentan_opd_galeri');
		
		return $query->get();
	}

	public function query_analisa_stunting($id) {
		$year = [
			date('Y', strtotime('-2 year')),
			date('Y', strtotime('-1 year')),
			date('Y'),
		];

		$this->db->select('analisa_situasi.analisa_situasi_year AS tahun,
							analisa_situasi_indikator.analisa_situasi_indikator_nama AS nama_indikator,
							analisa_situasi_aksi.analisa_situasi_aksi_cakupan AS cakupan,
							analisa_situasi_aksi.analisa_situasi_aksi_warna AS warna_cakupan');
		$this->db->join('analisa_situasi', 'analisa_situasi.analisa_situasi_id = analisa_situasi_aksi.analisa_situasi_id', 'LEFT');
		$this->db->join('analisa_situasi_indikator', 'analisa_situasi_indikator.analisa_situasi_indikator_id = analisa_situasi_aksi.analisa_situasi_indikator_id', 'LEFT');
		$this->db->where('analisa_situasi_aksi.analisa_situasi_indikator_id', $id);
		$this->db->where_in('analisa_situasi.analisa_situasi_year', $year);
		$this->db->order_by('tahun', 'ASC');
		
		
		return $this->db->get('analisa_situasi_aksi');
	}

	public function query_stuntingByAge($age = NULL){
		// select count(id_data_stunting) as total, TIMESTAMPDIFF(YEAR,`tanggal_lahir`,NOW()) as umur, jenis_kel from data_stunting
		// where TIMESTAMPDIFF(YEAR,`tanggal_lahir`,NOW()) = 2 AND tanggal_lahir != '0000-00-00'
		// GROUP BY jenis_kel
		$this->db->select("count(id_data_stunting) as total, TIMESTAMPDIFF(YEAR,`tanggal_lahir`,NOW()) as umur, jenis_kel");

		if ($age != NULL) {
			if($age == 1){
				$this->db->where("TIMESTAMPDIFF(YEAR,`tanggal_lahir`,NOW()) <= 1");
			}else {
				$this->db->where("TIMESTAMPDIFF(YEAR,`tanggal_lahir`,NOW()) = $age");
			}
		}

		$this->db->where("tanggal_lahir != '0000-00-00'");

		$query = $this->db->group_by("jenis_kel")->get('data_stunting');

		return $query;
	}

	public function query_stuntingByWilayah($id, $param){
		$this->db->select("jenis_kel, count(id_data_stunting) as total");

		if ($param == 'kecamatan') {
			$this->db->select('kecamatan, kecamatan_nama');
			$this->db->where("kecamatan", $id);
			$this->db->join('kecamatans', 'kecamatans.kecamatan_id = data_stunting.kecamatan', 'LEFT');
			$this->db->order_by('kecamatan_nama');
		}else if ($param == 'kelurahan') {
			$this->db->select('kelurahan, kelurahan_nama');
			$this->db->where('kelurahan', $id);
			$this->db->join('kelurahans', 'kelurahans.kelurahan_id = data_stunting.kelurahan', 'LEFT');
			$this->db->order_by('kelurahan_nama');
		}

		$this->db->where("TIMESTAMPDIFF(YEAR,`tanggal_lahir`,NOW()) <= 5");
		$this->db->where("tanggal_lahir != '0000-00-00'");

		$query = $this->db->group_by("jenis_kel")->get('data_stunting');

		return $query;
	}

	public function query_data_stunting_kecamatan() {
		$this->db->select('kecamatan, kecamatan_nama, count( id_data_stunting ) AS total');
		$this->db->join('kecamatans', 'kecamatans.kecamatan_id = data_stunting.kecamatan', 'LEFT');
		$this->db->where("TIMESTAMPDIFF(YEAR, tanggal_lahir, NOW()) <= 5");
		$this->db->where("tanggal_lahir != '0000-00-00'");
		$query = $this->db->group_by('kecamatan')->order_by('kecamatan_nama')->get('data_stunting');
		
		return $query;
	}

	public function query_data_stunting_kelurahan($kecamatan = NULL) {
		if ($kecamatan != NULL) {
			$this->db->where('kecamatan', $kecamatan);
		}

		$this->db->select('kecamatans.kecamatan_id, kecamatans.kecamatan_nama, kelurahans.kelurahan_nama, kelurahan_id, count( id_data_stunting ) AS total');
		$this->db->join('kecamatans', 'kecamatans.kecamatan_id = data_stunting.kecamatan', 'LEFT');
		$this->db->join('kelurahans', 'kelurahans.kelurahan_id = data_stunting.kelurahan', 'LEFT');
		$this->db->where("TIMESTAMPDIFF(YEAR, tanggal_lahir, NOW()) <= 5");
		$this->db->where("tanggal_lahir != '0000-00-00'");
		$query = $this->db->group_by('kelurahan')->order_by('kecamatan_nama, kelurahan_nama')->get('data_stunting');
		
		return $query;
	}

	public function query_data_stunting_kelurahan_by_jenkel($kelurahan) {
		$this->db->select('jenis_kel, count( id_data_stunting ) AS total, kelurahan, kelurahan_nama');
		$this->db->join('kecamatans', 'kecamatans.kecamatan_id = data_stunting.kecamatan', 'LEFT');
		$this->db->join('kelurahans', 'kelurahans.kelurahan_id = data_stunting.kelurahan', 'LEFT');
		$this->db->where('kelurahan', $kelurahan);
		$this->db->where("TIMESTAMPDIFF(YEAR, tanggal_lahir, NOW()) <= 5");
		$this->db->group_by('jenis_kel');
		$query = $this->db->where("tanggal_lahir != '0000-00-00'");
		
		return $query->get('data_stunting');
	}
}
	
?>