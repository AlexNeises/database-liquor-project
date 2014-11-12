<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Store_Model extends CI_Model
{
	private $name, $city, $state;

	protected $ci;

	public function __construct($name = null, $data = null)
	{
		$this->_set_name($name);
		$this->_get($data);
	}

	protected function _get($data = null)
	{
		if($this->get_name() != null && $data == null)
		{
			$query = $this->db->get_where('Store', array('name' => $this->get_name()));

			if($query->num_rows == 1)
			{
				$data = $query->row();
			}
		}

		if($data != null)
		{
			$this->set_city($data->city);
			$this->set_state($data->state);

			return true;
		}

		return false;
	}

	public function save()
	{
		$data = array(
			'city'	=>	$this->get_city(),
			'state'	=>	$this->get_state()
		);

		if($this->get_name() == null)
		{
			if(!$this->db->insert('Store', $data))
			{
				return false;
			}
			$this->_set_name($data->name);
		}
		else
		{
			$this->db->where('name', $this->get_name());
			if(!$this->db->update('Store', $data))
			{
				return false;
			}
		}
	}

	public function delete()
	{
		if($this->get_name() != null)
		{
			$this->db->where('name', $this->get_name());
			$this->db->delete('Store');
		}
	}

	//----------------------
	// Static Methods
	//----------------------

	static public function get_all()
	{
		$ci =& get_instance();

		$select = sprintf("SELECT * FROM `Store` WHERE 1 ORDER BY `name` ASC");

		$all = array();

		if(!$query = $ci->db->query($select))
		{
			log_message('debug', $ci->db->_error_message());
			return false;
		}

		if($query->num_rows > 0)
		{
			foreach($query->result() as $row)
			{
				$all[] = new Store_Model($row->name, $row);
			}
		}

		return $all;
	}

	static public function search($query)
	{
		$ci =& get_instance();

		$select = sprintf("SELECT * FROM `Store` WHERE `name` LIKE '%%%s%%' OR `city` LIKE '%%%s%%' OR `state` LIKE '%%%s%%'", $query, $query, $query);

		$all = array();

		if(!$query = $ci->db->query($select))
		{
			log_message('debug', $ci->db->_error_message());
			return false;
		}

		if($query->num_rows > 0)
		{
			foreach($query->result() as $row)
			{
				$all[] = new Store_Model($row->name, $row);
			}
		}

		return $all;
	}

	//----------------------
	// Get and Set Methods
	//----------------------

	public function get_name()
	{
		return $this->name;
	}
	
	protected function _set_name($name)
	{
		$this->name = $name;
	}

	public function get_city()
	{
		return $this->city;
	}
	
	public function set_city($city)
	{
		$this->city = $city;
	}

	public function get_state()
	{
		return $this->state;
	}
	
	public function set_state($state)
	{
		$this->state = $state;
	}
}

/* End of file Store_Model.php */
/* Location: ./application/models/Store_Model.php */