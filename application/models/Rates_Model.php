<?php

class Rates_Model extends CI_Model
{
	private $rid, $dname;

	protected $ci;

	public function __construct($rid = 0, $dname = null)
	{
		$this->_set_rid($rid);
		$this->_set_dname($dname);
	}

	public function save()
	{
		$data = array(
			'rid'	=> $this->get_rid(),
			'dname'	=> $this->get_dname()
		);

		$this->db->where('rid', $this->get_rid());
		$this->db->where('dname', $this->get_dname());

		$this->db->update('rates', $data);
		if ($this->db->affected_rows() == 0)
		{
			$this->db->insert('rates', $data);
		}
	}

	public function delete()
	{
		$this->db->where('rid', $this->get_rid());
		$this->db->where('dname', $this->get_dname());

		$this->db->delete('rates');
	}

	//----------------------
	// Get and Set Methods
	//----------------------

	public function get_rid()
	{
		return $this->rid;
	}
	
	protected function _set_rid($rid)
	{
		$this->rid = $rid;
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