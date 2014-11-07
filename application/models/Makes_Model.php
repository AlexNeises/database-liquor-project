<?php

class Makes_Model extends CI_Model
{
	private $cname, $dname;

	protected $ci;

	public function __construct($cname = null, $dname = null)
	{
		$this->_set_cname($cname);
		$this->_set_dname($dname);
	}

	public function save()
	{
		$data = array(
			'cname'	=> $this->get_cname(),
			'dname'	=> $this->get_dname()
		);

		$this->db->where('cname', $this->get_cname());
		$this->db->where('dname', $this->get_dname());

		$this->db->update('makes', $data);
		if ($this->db->affected_rows() == 0)
		{
			$this->db->insert('makes', $data);
		}
	}

	public function delete()
	{
		$this->db->where('cname', $this->get_cname());
		$this->db->where('dname', $this->get_dname());

		$this->db->delete('makes');
	}

	//----------------------
	// Get and Set Methods
	//----------------------

	public function get_cname()
	{
		return $this->cname;
	}
	
	protected function _set_cname($cname)
	{
		$this->cname = $cname;
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