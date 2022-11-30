<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_blog extends MY_Model {

	private $primary_key 	= 'id';
	private $table_name 	= 'blog';
	private $field_search 	= ['title', 'slug', 'image', 'category', 'status', 'author', 'created_at'];

	public function __construct() {
		$config = array(
			'primary_key' 	=> $this->primary_key,
		 	'table_name' 	=> $this->table_name,
		 	'field_search' 	=> $this->field_search,
		 );

		parent::__construct($config);
	}

	public function count_all($q = null, $field = null,$category = null, $tag = null) {
		$user_id 	= $this->session->userdata('id');
		$group_id 	= $this->session->userdata('group_id');

		$iterasi 	= 1;
        $num 		= count($this->field_search);
        $where 		= NULL;
        $q 			= $this->scurity($q);
		$field 		= $this->scurity($field);

        if (empty($field)) {
	        foreach ($this->field_search as $field) {
	            if ($iterasi == 1) {
	                $where .= "blog.".$field . " LIKE '%" . $q . "%' ";
	            } else {
	                $where .= "OR " . "blog.".$field . " LIKE '%" . $q . "%' ";
	            }
	            $iterasi++;
	        }

	        $where = '('.$where.')';
        } else {
        	$where .= "(" . "blog.".$field . " LIKE '%" . $q . "%' )";
        }

        if ($tag) {
        	$this->db->where('tags LIKE "%'.$tag.'%"');
        }
		
		if ($category) {
			$this->db->where('category', $category);
		}

		if ($group_id == '6') {
			$this->query_per_operator($user_id);
		}

		$this->join_avaiable()->filter_avaiable();
        $this->db->where($where);
        $this->db->where_not_in('group_id', ['3']);
		$query = $this->db->get($this->table_name);

		return $query->num_rows();
	}

	public function get($q = null, $field = null, $limit = 0, $offset = 0, $category = null, $tag = null) {
		$user_id 	= $this->session->userdata('id');
		$group_id 	= $this->session->userdata('group_id');

		$iterasi 	= 1;
        $num 		= count($this->field_search);
        $where 		= NULL;
        $q 			= $this->scurity($q);
		$field 		= $this->scurity($field);

        if (empty($field)) {
	        foreach ($this->field_search as $field) {
	            if ($iterasi == 1) {
	                $where .= "blog.".$field . " LIKE '%" . $q . "%' ";
	            } else {
	                $where .= "OR " . "blog.".$field . " LIKE '%" . $q . "%' ";
	            }
	            $iterasi++;
	        }

	        $where = '('.$where.')';
        } else {
        	$where .= "(" . "blog.".$field . " LIKE '%" . $q . "%' )";
        }
        if ($tag) {
        	$this->db->where('tags LIKE "%'.$tag.'%"');
        }

		if ($category) {
			$this->db->where('category', $category);
		}

		$this->db->select('blog.*, blog_category.*,
							aauth_users.id as user_id,
							aauth_users.username as user_username');

		$this->join_avaiable();

        $this->db->where($where);
        $this->db->where_not_in('group_id', ['3']);

		if ($group_id == '6') {
			$this->query_per_operator($user_id);
		}

        $this->db->limit($limit, $offset);
		$this->db->order_by('blog.id', 'DESC');
        $this->sortable();
		$query = $this->db->get($this->table_name);

		return $query->result();
	}

	public function query_per_operator($user_id) {
		$this->db->where(['author' => $user_id, 'group_id' => '6']);

		return $this;
	}

    public function join_avaiable() {
        $this->db->join('aauth_users', 'aauth_users.id = blog.author', 'LEFT');
        $this->db->join('blog_category', 'blog_category.category_id = blog.category', 'LEFT');
		$this->db->join('aauth_user_to_group', 'aauth_user_to_group.user_id = blog.author', 'LEFT');
        
        return $this;
    }

    public function filter_avaiable() {
      	$this->db->where('status', 'publish');  
        return $this;
    }

    public function find_by_slug($slug = null) {
		$this->db->select('blog.*, blog_category.category_id AS id_kategori, blog_category.category_name AS nama_kategori,
							aauth_users.id as user_id,
							aauth_users.username as user_username');

    	$this->join_avaiable()->filter_avaiable();
    	return $this->db->get_where($this->table_name, ['slug' => $slug])->row();
    }

    public function add_viewers($blog_id, $current_view) {
    	$viewers = $current_view+=1;
    	$this->db->update($this->table_name, ['viewers' => $viewers], ['id' => $blog_id]);
    	return $viewers;
    }

	public function count_category() {
		$this->db->select("blog_category.category_id AS id_kategori,
							blog_category.category_name AS nama_kategori,
							COUNT(category) AS jumlah");
		$this->db->join("blog_category", "blog.category = blog_category.category_id");
		$this->db->where([
			'verified_status' 	=> '1',
			'status' 			=> 'publish',
		]);

		$this->db->group_by('category');

		return $this->db->get('blog')->result();
	}

	public function about() {
		return $this->db->get('about')->row();
	}

    // public function bidding_exist() {
    // 	return $this->db->get_where($this->table_name, ['customer_id' => $customer_id, 'product_id' => $product_id])->num_rows();
    // }

}

/* End of file Model_blog.php */
/* Location: ./application/models/Model_blog.php */