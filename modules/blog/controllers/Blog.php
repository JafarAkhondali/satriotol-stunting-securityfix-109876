<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
*| --------------------------------------------------------------------------
*| Blog Controller
*| --------------------------------------------------------------------------
*| For default controller
*|
*/
class Blog extends Front {
	public function __construct() {
		parent::__construct();
        $this->load->model('model_blog');
	}
 
    public function index($offset = 0) {
        $this->limit_page = 5;
        
        $filter = $this->input->get('q');
        $field  = $this->input->get('f');

        $this->data['blogs']                = $this-> model_blog->query_berita($filter, $field, $this->limit_page, $offset);
        $this->data['blog_counts']          = $this->model_blog->count_all($filter, $field);
        $this->data['categories']           = $this->db->get('blog_category')->result();
        $this->data['count_categories']     = $this->model_blog->count_category();

        $config = [
            'base_url'     => 'blog/index/',
            'total_rows'   => $this->model_blog->count_all($filter, $field),
            'per_page'     => $this->limit_page,
            'uri_segment'  => 3,
        ];

        $this->data['pagination'] = $this->pagination($config);
        $this->data['about'] = $this->db->get('about')->row();
        $this->data['links'] = $this->db->where('menu_type_id = 3')->get('menu')->result();

        $this->template->build('blog/blog_index', $this->data);
    }

    public function category($category_id = 0, $category_name = '', $offset = 0) {
        $this->limit_page = 5;
        
        $filter = $this->input->get('q');
        $field  = $this->input->get('f');

        $this->data['blogs']                = $this-> model_blog->query_berita($filter, $field, $this->limit_page, $offset, $category_id);
        $this->data['blog_counts']          = $this->model_blog->count_all($filter, $field, $category_id);
        $this->data['about']                = $this->db->get('about')->row();
        $this->data['categories']           = $this->db->get('blog_category')->result();
        $this->data['count_categories']     = $this->model_blog->count_category();

        $config = [
            'base_url'     => 'blog/index/',
            'total_rows'   => $this->model_blog->count_all($filter, $field),
            'per_page'     => $this->limit_page,
            'uri_segment'  => 5,
        ];

        $this->data['pagination'] = $this->pagination($config);

        $this->template->build('blog/blog_index', $this->data);
    }

    public function tag($tag = 0, $offset = 0) {
        $this->limit_page = 5;
        
        $filter = $this->input->get('q');
        $field  = $this->input->get('f');

        $this->data['blogs']        = $this-> model_blog->query_berita($filter, $field, $this->limit_page, $offset, null, $tag);
        $this->data['blog_counts']  = $this->model_blog->count_all($filter, $field, null, $tag);
        $this->data['about']        = $this->db->get('about')->row();
        $this->data['categories']   = $this->model_blog->count_category();

        $config = [
            'base_url'     => 'blog/index/',
            'total_rows'   => $this->model_blog->count_all($filter, $field),
            'per_page'     => $this->limit_page,
            'uri_segment'  => 5,
        ];

        $this->data['pagination'] = $this->pagination($config);

        $this->template->build('blog/blog_index', $this->data);
    }

    public function detail($slug = null) {
        $blog = $this->model_blog->find_by_slug($slug);
        $this->register_unparse_html($blog);

        if (!$blog) {
            show_404();
        }

        $blog->viewers  = $this->model_blog->add_viewers($blog->id, $blog->viewers);
        $related        = $this-> model_blog->query_berita(null, null, 3, 0, $blog->category);

        $this->register_unparse_html($blog);
        $blog->content = $this->cc_page_element->unParseHtml($blog->content);

        $data = [
            'related'           => $related,
            'blog'              => $blog,
            'title'             => $blog->title,
            'about'             => $this->db->get('about')->row(),
            'links'             => $this->db->where('menu_type_id = 3')->get('menu')->result(),
            'categories'        => $this->db->get('blog_category')->result(),
            'count_categories'  => $this->model_blog->count_category(),
        ];

        $this->template->build('blog/blog_read', $data);
    }
    
    /**
    * Register unparse HTML
    *
    * @var Object $page
    */
    private function register_unparse_html($page) {

        $this->cc_page_element->registerUnParseHtml(function($html){
            $html =  preg_replace_callback(
                '/\{form_builder\(([0-9]{0,11})\)\}/',
                function($matches) {
                    if (isset($matches[1])) {
                        return form_builder($matches[1]);
                    }
                }, $html);

            return $html;
        });
    }
}


/* End of file Blog.php */
/* Location: ./application/controllers/Blog.php */