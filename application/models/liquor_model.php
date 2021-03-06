<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Liquor_Model extends CI_Model
{
	private $name, $type, $proof, $percent_vol;

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
			$query = $this->db->get_where('Liquor', array('name' => $this->get_name()));

			if($query->num_rows == 1)
			{
				$data = $query->row();
			}
		}

		if($data != null)
		{
			$this->set_type($data->type);
			$this->set_proof($data->proof);
			$this->set_percent_vol($data->percent_vol);

			return true;
		}

		return false;
	}

	public function save()
	{
		$data = array(
			'type'			=>	$this->get_type(),
			'proof'			=>	$this->get_proof(),
			'percent_vol'	=>	$this->get_percent_vol()
		);

		if($this->get_name() == null)
		{
			if(!$this->db->insert('Liquor', $data))
			{
				return false;
			}
			$this->_set_name($data->name);
		}
		else
		{
			$this->db->where('name', $this->get_name());
			if(!$this->db->update('Liquor', $data))
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
			$this->db->delete('Liquor');
		}
	}

	//----------------------
	// Static Methods
	//----------------------

	static public function get_all()
	{
		$ci =& get_instance();

		$select = sprintf("SELECT * FROM `Liquor` WHERE 1 ORDER BY `name` ASC");

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
				$all[] = new Liquor_Model($row->name, $row);
			}
		}

		return $all;
	}

	static public function search($query)
	{
		$ci =& get_instance();

		$select = sprintf("SELECT * FROM `Liquor` WHERE `name` LIKE '%%%s%%' OR `type` LIKE '%%%s%%' OR `proof` LIKE '%%%s%%' OR `percent_vol` LIKE '%%%s%%'", $query, $query, $query, $query);

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
				$all[] = new Liquor_Model($row->name, $row);
			}
		}

		return $all;
	}

	static public function insert($name, $type, $proof, $percent_vol)
	{
		$ci =& get_instance();

		$new_data = array(
			'name'			=>	$name,
			'type'			=>	$type,
			'proof'			=>	$proof,
			'percent_vol'	=>	$percent_vol
		);

		$select = sprintf("SELECT COUNT(`name`) AS `count_num` FROM `Liquor` WHERE `name` = '%s'", $name);

		$query = $ci->db->query($select);
		$result = $query->result()[0];

		if($result->count_num == 0)
		{
			$ci->db->insert('Liquor', $new_data);
			return true;
		}

		return false;
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

	public function get_type()
	{
		return $this->type;
	}
	
	public function set_type($type)
	{
		$this->type = $type;
	}

	public function get_proof()
	{
		return $this->proof;
	}
	
	public function set_proof($proof)
	{
		$this->proof = $proof;
	}

	public function get_percent_vol()
	{
		return $this->percent_vol;
	}
	
	public function set_percent_vol($percent_vol)
	{
		$this->percent_vol = $percent_vol;
	}
}

/* End of file Liquor_Model.php */
/* Location: ./application/models/Liquor_Model.php */