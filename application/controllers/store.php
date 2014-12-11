<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Store extends CI_Controller {

	private $data;

	public function index()
	{
		$this->data['page'] = 'recipe';
		$this->data['title'] = $store;
		$this->load->view('header', $this->data);
		$this->load->view('store', $this->data);
		$this->load->view('footer', $this->data);
	}

	public function items($id)
	{
		$this->data['page'] = 'recipe';
		$store = new Store_Model(str_replace('_', ' ', $id));
		$this->data['title'] = $store->get_name();
		$this->data['type'] = 'All Liquors';
		$this->data['all_liquor'] = Sells_Model::get_all_liquor_from_store($store->get_id());
		$this->load->view('header', $this->data);
		$this->load->view('store', $this->data);
		$this->load->view('footer', $this->data);
	}
}

/* End of file store.php */
/* Location: ./application/controllers/store.php */