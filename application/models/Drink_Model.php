<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Drink_Model extends CI_Model
{
	private $name;

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
			$query = $this->db->get_where('Drink', array('name' => $this->get_name()));

			if($query->num_rows == 1)
			{
				$data = $query->row();
			}
		}

		if($data != null)
		{
			return true;
		}

		return false;
	}

	public function save()
	{
		if($this->get_name() == null)
		{
			if(!$this->db->insert('Drink', $data))
			{
				return false;
			}
			$this->_set_name($data->name);
		}
		else
		{
			$this->db->where('name', $this->get_name());
			if(!$this->db->update('Drink', $data))
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
			$this->db->delete('Drink');
		}
	}

	static public function insert($name)
	{
		$ci =& get_instance();

		$new_data = array(
			'name'	=>	$name
		);

		$select = sprintf("SELECT COUNT(`name`) AS `count_num` FROM `Drink` WHERE `name` = '%s'", $name);

		$query = $ci->db->query($select);
		$result = $query->result()[0];

		if($result->count_num == 0)
		{
			$ci->db->insert('Drink', $new_data);
			return true;
		}

		return false;
	}

	//----------------------
	// Static Methods
	//----------------------

	static public function get_all()
	{
		$ci =& get_instance();

		$select = sprintf("SELECT * FROM `Drink` WHERE 1 ORDER BY `name` ASC");

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
				$all[] = new Drink_Model($row->name, $row);
			}
		}

		return $all;
	}

	static public function search($query)
	{
		$ci =& get_instance();

		$select = sprintf("SELECT * FROM `Drink` WHERE `name` LIKE '%%%s%%'", $query);

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
				$all[] = new Drink_Model($row->name, $row);
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
}

/* End of file Drink_Model.php */
/* Location: ./application/models/Drink_Model.php */