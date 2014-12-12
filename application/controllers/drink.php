<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Drink extends CI_Controller {

	private $data;

	public function index()
	{
		$this->data['page'] = 'recipe';
		$this->data['title'] = $drink;
		$this->load->view('header', $this->data);
		$this->load->view('drink', $this->data);
		$this->load->view('footer', $this->data);
	}

	public function review($name)
	{
		$this->data['page'] = 'recipe';
		$new_name = str_replace('_', ' ', $name);
		$this->data['title'] = $new_name;
		if(Liquor_Model::search($new_name))
		{
			$drink = new Liquor_Model($new_name);
			$this->data['type'] = $drink->get_type();
		}
		else
		{
			$drink = new Mixer_Model($new_name);
			$this->data['type'] = $drink->get_type();
		}
		$this->load->view('header', $this->data);
		$this->load->view('drink', $this->data);
		$this->load->view('footer', $this->data);
	}

	public function rate()
	{
		if($post_data = $this->input->post())
		{
			$name = $post_data['drink_name'];
			if(isset($post_data['rating']) && isset($post_data['review_area']))
			{
				$review = new Review_Model();
				$review->set_rating($post_data['rating']);
				$review->set_comment($post_data['review_area']);
				$review->save();
				Rates_Model::insert(Review_Model::max_id()->get_id(), $post_data['drink_name']);
			}
		}
		$this->data['page'] = 'recipe';
		$new_name = str_replace('_', ' ', $name);
		$this->data['title'] = $new_name;
		if(Liquor_Model::search($new_name))
		{
			$drink = new Liquor_Model($new_name);
			$this->data['type'] = $drink->get_type();
		}
		else
		{
			$drink = new Mixer_Model($new_name);
			$this->data['type'] = $drink->get_type();
		}
		$this->load->view('header', $this->data);
		$this->load->view('drink', $this->data);
		$this->load->view('footer', $this->data);
	}
}

/* End of file drink.php */
/* Location: ./application/controllers/drink.php */