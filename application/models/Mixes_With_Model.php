<?php

class Mixes_With_Model extends CI_Model
{
	private $lname, $mname, $taste, $recipe;

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

			return true;
		}

		return false;
	}

	public function save()
	{
		$data = array(
			'lname'		=> $this->get_lname(),
			'mname'		=> $this->get_mname(),
			'taste'		=> $this->get_taste(),
			'recipe'	=> $this->get_recipe()
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
}

?>