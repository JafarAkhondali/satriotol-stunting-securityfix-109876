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
}
	
?>