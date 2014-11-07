<?php

class Drinks_Model extends CI_Model
{
	private $uid, $dname;

	protected $ci;

	public function __construct($uid = 0, $dname = null)
	{
		$this->_set_uid($uid);
		$this->_set_dname($dname);
	}

	public function save()
	{
		$data = array(
			'uid'	=> $this->get_uid(),
			'dname'	=> $this->get_dname()
		);

		$this->db->where('uid', $this->get_uid());
		$this->db->where('dname', $this->get_dname());

		$this->db->update('drinks', $data);
		if ($this->db->affected_rows() == 0)
		{
			$this->db->insert('drinks', $data);
		}
	}

	public function delete()
	{
		$this->db->where('uid', $this->get_uid());
		$this->db->where('dname', $this->get_dname());

		$this->db->delete('drinks');
	}

	//----------------------
	// Get and Set Methods
	//----------------------

	public function get_uid()
	{
		return $this->uid;
	}
	
	protected function _set_uid($uid)
	{
		$this->uid = $uid;
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