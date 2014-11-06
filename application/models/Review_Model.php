<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Review_Model extends CI_Model
{
	private $id, $rating, $comment;

	protected $ci;

	public function __construct($id = 0, $data = null)
	{
		$this->_set_id($id);
		$this->_get($data);
	}

	protected function _get($data = null)
	{
		if($this->get_id() != 0 && $data == null)
		{
			$query = $this->db->get_where('Review', array('id' => $this->get_id()));

			if($query->num_rows == 1)
			{
				$data = $query->row();
			}
		}

		if($data != null)
		{
			$this->set_rating($data->rating);
			$this->set_comment($data->comment);

			return true;
		}

		return false;
	}

	public function save()
	{
		$data = array(
			'rating'	=>	$this->get_rating(),
			'comment'	=>	$this->get_comment()
		);

		if($this->get_id() === 0)
		{
			if(!$this->db->insert('Review', $data))
			{
				return false;
			}
			$this->_set_id($data->id);
		}
		else
		{
			$this->db->where('id', $this->get_id());
			if(!$this->db->update('Review', $data))
			{
				return false;
			}
		}
	}

	public function delete()
	{
		if($this->get_id() != 0)
		{
			$this->db->where('id', $this->get_id());
			$this->db->delete('Review');
		}
	}

	//----------------------
	// Static Methods
	//----------------------

	static public function get_all()
	{
		$ci =& get_instance();

		$select = sprintf("SELECT * FROM `Review` WHERE 1 ORDER BY `id` ASC");

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
				$all[] = new Review_Model($row->name, $row);
			}
		}

		return $all;
	}

	//----------------------
	// Get and Set Methods
	//----------------------

	public function get_id()
	{
		return $this->id;
	}
	
	protected function _set_id($id)
	{
		$this->id = $id;
	}

	public function get_rating()
	{
		return $this->rating;
	}
	
	public function set_rating($rating)
	{
		$this->rating = $rating;
	}

	public function get_comment()
	{
		return $this->comment;
	}
	
	public function set_comment($comment)
	{
		$this->comment = $comment;
	}
}

/* End of file Review_Model.php */
/* Location: ./application/models/Review_Model.php */