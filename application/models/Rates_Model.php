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
	// Static Methods
	//----------------------

	static public function get_all_review_ids_from_liquor($query)
	{
		$ci =& get_instance();

		$select = sprintf("SELECT `rid` FROM `rates` WHERE `dname` = '%s'", $query);

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
				$all[] = $row->rid;
			}
		}

		return $all;
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