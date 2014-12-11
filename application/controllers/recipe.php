<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Recipe extends CI_Controller {

	private $data;

	public function index()
	{
		$this->data['page'] = 'recipe';
		$this->data['title'] = 'Recipe Title';
		$this->load->view('header', $this->data);
		$this->load->view('recipe', $this->data);
		$this->load->view('footer', $this->data);
	}
}

/* End of file recipe.php */
/* Location: ./application/controllers/recipe.php */