<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {

	private $data;

	function __construct()
	{
		parent::__construct();

		$this->my_global_var_1 = "logged";
	}

	public function index()
	{
		$this->data['page'] = 'recipe';
		$this->alert['logged'] = "Logged in as admin";
		$this->load->view('header', $this->data);
		$this->load->view('home', $this->data);
		$this->load->view('footer', $this->data);
	}
}

/* End of file login.php */
/* Location: ./application/controllers/login.php */