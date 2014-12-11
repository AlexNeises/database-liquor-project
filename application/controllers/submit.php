<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Submit extends CI_Controller {

	private $data;

	public function index()
	{
		if($post_data = $this->input->post())
		{
			if(isset($post_data['c_name']) && isset($post_data['c_founded']) && isset($post_data['c_city']) && isset($post_data['c_country']))
			{
				if(Company_Model::insert($post_data['c_name']))
				{
					$new_company = new Company_Model($post_data['c_name']);
					$new_company->set_city($post_data['c_city']);
					$new_company->set_country($post_data['c_country']);
					$new_company->set_founded($post_data['c_founded']);
					$new_company->save();
				}
			}

			if(isset($post_data['l_name']) && isset($post_data['l_type']) && isset($post_data['l_proof']) && isset($post_data['l_abv']))
			{
				if(Drink_Model::insert($post_data['l_name']))
				{
					Liquor_Model::insert($post_data['l_name'], $post_data['l_type'], $post_data['l_proof'], $post_data['l_abv']);
				}
			}

			if(isset($post_data['m_name']) && isset($post_data['m_type']))
			{
				if(Drink_Model::insert($post_data['m_name']))
				{
					Mixer_Model::insert($post_data['m_name'], $post_data['m_type']);
				}
			}

			if(isset($post_data['s_name']) && isset($post_data['s_city']) && isset($post_data['s_state']))
			{
				$new_store = new Store_Model();
				$new_store->set_name($post_data['s_name']);
				$new_store->set_city($post_data['s_city']);
				$new_store->set_state($post_data['s_state']);
				$new_store->save();
			}
		}
		$this->data['page'] = 'submit';
		$this->load->view('header', $this->data);
		$this->load->view('home', $this->data);
		$this->load->view('footer', $this->data);
	}
}

/* End of file submit.php */
/* Location: ./application/controllers/submit.php */