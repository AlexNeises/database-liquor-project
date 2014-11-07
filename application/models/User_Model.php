<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User_Model extends CI_Model
{
	private $id, $username, $password, $admin;

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
			$query = $this->db->get_where('User', array('id' => $this->get_id()));

			if($query->num_rows == 1)
			{
				$data = $query->row();
			}
		}

		if($data != null)
		{
			$this->set_username($data->username);
			$this->set_password($data->password);
			$this->set_admin($data->admin);

			return true;
		}

		return false;
	}

	public function save()
	{
		$data = array(
			'username'	=>	$this->get_username(),
			'password'	=>	$this->get_password(),
			'admin'		=>	$this->get_admin()
		);

		if($this->get_id() === 0)
		{
			if(!$this->db->insert('User', $data))
			{
				return false;
			}
			$this->_set_id($data->id);
		}
		else
		{
			$this->db->where('id', $this->get_id());
			if(!$this->db->update('User', $data))
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
			$this->db->delete('User');
		}
	}

	//----------------------
	// Static Methods
	//----------------------



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

	public function get_username()
	{
		return $this->username;
	}
	
	public function set_username($username)
	{
		$this->username = $username;
	}

	public function get_password()
	{
		return $this->password;
	}
	
	public function set_password($password)
	{
		$this->password = $password;
	}

	public function get_admin()
	{
		return $this->admin;
	}
	
	public function set_admin($admin)
	{
		$this->admin = $admin;
	}
}

/* End of file Review_Model.php */
/* Location: ./application/models/Review_Model.php */