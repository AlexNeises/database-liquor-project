<?php

class Mixes_With_Model extends CI_Model
{
	private $lname, $mname, $taste, $recipe, $recipe_name;

	protected $ci;

	public function __construct($lname = null, $mname = null, $data = null)
	{
		$this->_set_lname($lname);
		$this->_set_mname($mname);
		$this->_get($data);
	}

	protected function _get($data = null)
	{
		if($this->get_lname() != null && $this->get_mname() != null && $data == null)
		{
			$query = $this->db->get_where('mixes_with', array('lname' => $this->get_lname(), 'mname' => $this->get_mname()));

			if($query->num_rows == 1)
			{
				$data = $query->row();
			}
		}

		if($data != null)
		{
			$this->set_taste($data->taste);
			$this->set_recipe($data->recipe);
			$this->set_recipe_name($data->recipe_name);

			return true;
		}

		return false;
	}

	public function save()
	{
		$data = array(
			'lname'			=> $this->get_lname(),
			'mname'			=> $this->get_mname(),
			'taste'			=> $this->get_taste(),
			'recipe'		=> $this->get_recipe(),
			'recipe_name'	=> $this->get_recipe_name()
		);

		$this->db->where('lname', $this->get_lname());
		$this->db->where('mname', $this->get_mname());

		$this->db->update('mixes_with', $data);
		if ($this->db->affected_rows() == 0)
		{
			$this->db->insert('mixes_with', $data);
		}
	}

	public function delete()
	{
		$this->db->where('lname', $this->get_lname());
		$this->db->where('mname', $this->get_mname());

		$this->db->delete('mixes_with');
	}

	//----------------------
	// Static Methods
	//----------------------

	static public function search($query)
	{
		$ci =& get_instance();

		$select = sprintf("SELECT * FROM `mixes_with` WHERE `recipe_name` LIKE '%%%s%%'", $query);

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
				$all[] = new Mixes_With_Model($row->lname, $row->mname, $row);
			}
		}

		return $all;
	}

	//----------------------
	// Get and Set Methods
	//----------------------

	public function get_lname()
	{
		return $this->lname;
	}
	
	protected function _set_lname($lname)
	{
		$this->lname = $lname;
	}

	public function get_mname()
	{
		return $this->mname;
	}
	
	protected function _set_mname($mname)
	{
		$this->mname = $mname;
	}

	public function get_taste()
	{
		return $this->taste;
	}
	
	public function set_taste($taste)
	{
		$this->taste = $taste;
	}

	public function get_recipe()
	{
		return $this->recipe;
	}
	
	public function set_recipe($recipe)
	{
		$this->recipe = $recipe;
	}

	public function get_recipe_name()
	{
		return $this->recipe_name;
	}
	
	public function set_recipe_name($recipe_name)
	{
		$this->recipe_name = $recipe_name;
	}
}

?>