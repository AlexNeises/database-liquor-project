<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Search extends CI_Controller {

	private $data;

	public function index()
	{
		if($post_data = $this->input->post())
		{
			if($post_data['search_category'] == 'company' && $post_data['query_value'] != '')
			{
				$this->data['company_results'] = Company_Model::search($post_data['query_value']);
			}
		}
		$this->data['page'] = 'search';
		$this->load->view('header', $this->data);
		$this->load->view('home', $this->data);
		$this->load->view('footer', $this->data);
	}
}

/* End of file search.php */
/* Location: ./application/controllers/search.php */