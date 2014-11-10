<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Migrate extends CI_Controller {

	private $data;

	public function index()
	{
		
	}

	public function update($key)
	{
		if($key == 'jf4jfewa47301phfdap')
		{
			
			$this->load->view('home');
		}
	}
}

/* End of file home.php */
/* Location: ./application/controllers/home.php */