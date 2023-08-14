<?php
defined('BASEPATH') OR exit('No direct script access allowed');


/**
*| --------------------------------------------------------------------------
*| Dashboard Controller
*| --------------------------------------------------------------------------
*| For see your board
*|
*/
class Dashboard extends Admin {
	public function __construct() {
		parent::__construct();
	}

	public function index() {
        if (!$this->aauth->is_admin() && !$this->aauth->is_member(7)) {
		// if (!$this->aauth->is_allowed('dashboard')) {
			// redirect('/', 'refresh');
			redirect(base_url().'administrator/user/profile', 'refresh');
			// }
			// $data = [];
			// $this->render('backend/standart/dashboard', $data);
		}else{
			$this->data = [];
			$this->render('backend/standart/administrator/dashboard', $this->data);
		}
	}

	public function chart() {
		if (!$this->aauth->is_allowed('dashboard')) {
			redirect('/','refresh');
		}

		$data = [];
		$this->render('backend/standart/chart', $data);
	}
}

/* End of file Dashboard.php */
/* Location: ./application/controllers/administrator/Dashboard.php */