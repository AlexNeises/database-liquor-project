<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Add_Triggers extends CI_Migration {

	public function up()
	{
		$query = "SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0";

		if (!$this->db->query($query))
        {
            log_message('error', "DB ERROR: " . $this->db->_error_message());
            return false;
        }

        $query = "SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0";

		if (!$this->db->query($query))
        {
            log_message('error', "DB ERROR: " . $this->db->_error_message());
            return false;
        }

        $query = "SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES'";

		if (!$this->db->query($query))
        {
            log_message('error', "DB ERROR: " . $this->db->_error_message());
            return false;
        }

        $query = "DROP TRIGGER IF EXISTS storeTrigger;
            DROP TRIGGER IF EXISTS userTrigger;

            delimiter //
            create trigger storeTrigger
            before delete on Store
            for each row
            begin
                delete from sells where sid=old.id;
            end;//
            delimiter ;

            delimiter //
            create trigger userTrigger
            before delete on User
            for each row
            begin
                delete from drinks where uid=old.id;
                delete from posts where uid=old.id;
            end;//
            delimiter ;";

		if (!$this->db->query($query))
        {
            log_message('error', "DB ERROR: " . $this->db->_error_message());
            return false;
        }

        $query = "SET SQL_MODE=@OLD_SQL_MODE";

		if (!$this->db->query($query))
        {
            log_message('error', "DB ERROR: " . $this->db->_error_message());
            return false;
        }

        $query = "SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS";

		if (!$this->db->query($query))
        {
            log_message('error', "DB ERROR: " . $this->db->_error_message());
            return false;
        }

        $query = "SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS";

		if (!$this->db->query($query))
        {
            log_message('error', "DB ERROR: " . $this->db->_error_message());
            return false;
        }
	}

	public function down()
	{

	}
}