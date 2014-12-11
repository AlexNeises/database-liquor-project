<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Store_Model extends CI_Model
{
	private $name, $city, $state;

	protected $ci;

	public function __construct($id = 0, $data = null)
	{
		$this->_set_id($id);
		$this->_get($data);
	}

	protected function _get($data = null)
	{
		if($this->get_id() != 0 && $data == null)
		{
			$query = $this->db->get_where('Store', array('id' => $this->get_id()));

			if($query->num_rows == 1)
			{
				$data = $query->row();
			}
		}

		if($data != null)
		{
			$this->set_name($data->name);
			$this->set_city($data->city);
			$this->set_state($data->state);

			return true;
		}

		return false;
	}

	public function save()
	{
		$data = array(
			'name'	=>	$this->get_name(),
			'city'	=>	$this->get_city(),
			'state'	=>	$this->get_state()
		);

		if($this->get_id() === 0)
		{
			if(!$this->db->insert('Store', $data))
			{
				return false;
			}
			// $this->_set_id($data->id);
		}
		else
		{
			$this->db->where('id', $this->get_id());
			if(!$this->db->update('Store', $data))
			{
				return false;
			}
		}
	}

	public function delete()
	{
		if($this->get_id() != 0)
		{
			$this->db->where('id', $this->get_id());
			$this->db->delete('Store');
		}
	}

	//----------------------
	// Static Methods
	//----------------------

	static public function get_all()
	{
		$ci =& get_instance();

		$select = sprintf("SELECT * FROM `Store` WHERE 1 ORDER BY `id` ASC");

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
				$all[] = new Store_Model($row->id, $row);
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
				$all[] = new Store_Model($row->id, $row);
			}
		}

		return $all;
	}

	//----------------------
	// Get and Set Methods
	//----------------------

	public function get_id()
	{
		return $this->id;
	}
	
	protected function _set_id($id)
	{
		$this->id = $id;
	}

	public function get_name()
	{
		return $this->name;
	}
	
	public function set_name($name)
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