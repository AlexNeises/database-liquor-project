<?php

class Sells_Model extends CI_Model
{
	private $sname, $dname;

	protected $ci;

	public function __construct($sname = null, $dname = null)
	{
		$this->_set_sname($sname);
		$this->_set_dname($dname);
	}

	public function save()
	{
		$data = array(
			'sname'	=> $this->get_sname(),
			'dname'	=> $this->get_dname()
		);

		$this->db->where('sname', $this->get_sname());
		$this->db->where('dname', $this->get_dname());

		$this->db->update('sells', $data);
		if ($this->db->affected_rows() == 0)
		{
			$this->db->insert('sells', $data);
		}
	}

	public function delete()
	{
		$this->db->where('sname', $this->get_sname());
		$this->db->where('dname', $this->get_dname());

		$this->db->delete('sells');
	}

	//----------------------
	// Get and Set Methods
	//----------------------

	public function get_sname()
	{
		return $this->sname;
	}
	
	protected function _set_sname($sname)
	{
		$this->sname = $sname;
	}

	public function get_dname()
	{
		return $this->dname;
	}
	
	protected function _set_dname($dname)
	{
		$this->dname = $dname;
	}
}

?>