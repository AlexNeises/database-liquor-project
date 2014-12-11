<?php

class Sells_Model extends CI_Model
{
	private $sid, $dname;

	protected $ci;

	public function __construct($sid = 0, $dname = null)
	{
		$this->_set_sid($sid);
		$this->_set_dname($dname);
	}

	public function save()
	{
		$data = array(
			'sid'	=> $this->get_sid(),
			'dname'	=> $this->get_dname()
		);

		$this->db->where('sid', $this->get_sid());
		$this->db->where('dname', $this->get_dname());

		$this->db->update('sells', $data);
		if ($this->db->affected_rows() == 0)
		{
			$this->db->insert('sells', $data);
		}
	}

	public function delete()
	{
		$this->db->where('sid', $this->get_sid());
		$this->db->where('dname', $this->get_dname());

		$this->db->delete('sells');
	}

	//----------------------
	// Static Methods
	//----------------------

	static public function get_all_liquor_from_store($query)
	{
		$ci =& get_instance();

		$select = sprintf("SELECT `dname` FROM `sells` WHERE `sid` = '%s'", $query);

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
				$all[] = $row->dname;
			}
		}

		return $all;
	}

	//----------------------
	// Get and Set Methods
	//----------------------

	public function get_sid()
	{
		return $this->sid;
	}
	
	protected function _set_sid($sid)
	{
		$this->sid = $sid;
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