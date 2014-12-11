<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Liquor extends CI_Controller {

	private $data;

	public function index()
	{
		$this->data['page'] = 'recipe';
		$this->data['title'] = $liquor;
		$this->load->view('header', $this->data);
		$this->load->view('liquor', $this->data);
		$this->load->view('footer', $this->data);
	}

	public function review($name)
	{
		$this->data['page'] = 'recipe';
		$this->data['title'] = str_replace('_', ' ', $name);
		$liquor = new Liquor_Model(str_replace('_', ' ', $name));
		$this->data['type'] = $liquor->get_type();
		$this->load->view('header', $this->data);
		$this->load->view('liquor', $this->data);
		$this->load->view('footer', $this->data);
	}
}

/* End of file liquor.php */
/* Location: ./application/controllers/liquor.php */