<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mixer extends CI_Controller {

	private $data;

	public function index()
	{
		$this->data['page'] = 'recipe';
		$this->data['title'] = $mixer;
		$this->load->view('header', $this->data);
		$this->load->view('mixer', $this->data);
		$this->load->view('footer', $this->data);
	}

	public function review($name)
	{
		$this->data['page'] = 'recipe';
		$this->data['title'] = str_replace('_', ' ', $name);
		$mixer = new Mixer_Model(str_replace('_', ' ', $name));
		$this->data['type'] = $mixer->get_type();
		$this->load->view('header', $this->data);
		$this->load->view('mixer', $this->data);
		$this->load->view('footer', $this->data);
	}
}

/* End of file mixer.php */
/* Location: ./application/controllers/mixer.php */