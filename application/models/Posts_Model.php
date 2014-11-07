<?php

class Posts_Model extends CI_Model
{
	private $uid, $rid;

	protected $ci;

	public function __construct($uid = 0, $rid = 0)
	{
		$this->_set_uid($uid);
		$this->_set_rid($rid);
	}

	public function save()
	{
		$data = array(
			'uid'	=> $this->get_uid(),
			'rid'	=> $this->get_rid()
		);

		$this->db->where('uid', $this->get_uid());
		$this->db->where('rid', $this->get_rid());

		$this->db->update('posts', $data);
		if ($this->db->affected_rows() == 0)
		{
			$this->db->insert('posts', $data);
		}
	}

	public function delete()
	{
		$this->db->where('uid', $this->get_uid());
		$this->db->where('rid', $this->get_rid());

		$this->db->delete('posts');
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

	public function get_rid()
	{
		return $this->rid;
	}
	
	protected function _set_rid($rid)
	{
		$this->rid = $rid;
	}
}

?>