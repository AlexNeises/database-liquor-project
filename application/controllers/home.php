<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {

	private $data;

	public function index()
	{
		$this->load->library('migration');
		$this->migration->current();
		$this->data['page'] = 'home';
		$this->load->view('header', $this->data);
		$this->load->view('home', $this->data);
		$this->load->view('footer', $this->data);
	}
}

/* End of file home.php */
/* Location: ./application/controllers/home.php */