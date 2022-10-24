<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_web extends MY_Model {
	public function __construct(){
		parent::__construct();
	}

	public function berita_terbaru(){
		$this->db->select('blog.*, blog_category.category_id AS kategori_id, blog_category.category_name AS nama_kategori');
		$this->db->from('blog');
		return $this->db->join('blog_category', 'blog.category = blog_category.category_id')->get();
	}
}
	
?>