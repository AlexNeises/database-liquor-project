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

			if($post_data['search_category'] == 'drink' && $post_data['query_value'] != '')
			{
				$this->data['drink_results'] = Drink_Model::search($post_data['query_value']);
			}

			if($post_data['search_category'] == 'liquor' && $post_data['query_value'] != '')
			{
				$this->data['liquor_results'] = Liquor_Model::search($post_data['query_value']);
			}

			if($post_data['search_category'] == 'mixer' && $post_data['query_value'] != '')
			{
				$this->data['mixer_results'] = Mixer_Model::search($post_data['query_value']);
			}

			if($post_data['search_category'] == 'store' && $post_data['query_value'] != '')
			{
				$this->data['store_results'] = Store_Model::search($post_data['query_value']);
			}

			if($post_data['search_category'] == 'recipe' && $post_data['query_value'] != '')
			{
				$this->data['recipe_results'] = Mixes_With_Model::search($post_data['query_value']);
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