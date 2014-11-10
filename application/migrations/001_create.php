<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Create extends CI_Migration {

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

        $query = "DROP TABLE IF EXISTS mixes_with";

		if (!$this->db->query($query))
        {
            log_message('error', "DB ERROR: " . $this->db->_error_message());
            return false;
        }

        $query = "DROP TABLE IF EXISTS sells";

		if (!$this->db->query($query))
        {
            log_message('error', "DB ERROR: " . $this->db->_error_message());
            return false;
        }

        $query = "DROP TABLE IF EXISTS rates";

		if (!$this->db->query($query))
        {
            log_message('error', "DB ERROR: " . $this->db->_error_message());
            return false;
        }

        $query = "DROP TABLE IF EXISTS drinks";

		if (!$this->db->query($query))
        {
            log_message('error', "DB ERROR: " . $this->db->_error_message());
            return false;
        }

        $query = "DROP TABLE IF EXISTS makes";

		if (!$this->db->query($query))
        {
            log_message('error', "DB ERROR: " . $this->db->_error_message());
            return false;
        }

        $query = "DROP TABLE IF EXISTS posts";

		if (!$this->db->query($query))
        {
            log_message('error', "DB ERROR: " . $this->db->_error_message());
            return false;
        }

        $query = "DROP TABLE IF EXISTS Mixer";

		if (!$this->db->query($query))
        {
            log_message('error', "DB ERROR: " . $this->db->_error_message());
            return false;
        }

        $query = "DROP TABLE IF EXISTS Liquor";

		if (!$this->db->query($query))
        {
            log_message('error', "DB ERROR: " . $this->db->_error_message());
            return false;
        }

        $query = "DROP TABLE IF EXISTS Drink";

		if (!$this->db->query($query))
        {
            log_message('error', "DB ERROR: " . $this->db->_error_message());
            return false;
        }

        $query = "DROP TABLE IF EXISTS Review";

		if (!$this->db->query($query))
        {
            log_message('error', "DB ERROR: " . $this->db->_error_message());
            return false;
        }

        $query = "DROP TABLE IF EXISTS Store";

		if (!$this->db->query($query))
        {
            log_message('error', "DB ERROR: " . $this->db->_error_message());
            return false;
        }

        $query = "DROP TABLE IF EXISTS Company";

		if (!$this->db->query($query))
        {
            log_message('error', "DB ERROR: " . $this->db->_error_message());
            return false;
        }

        $query = "DROP TABLE IF EXISTS User";

		if (!$this->db->query($query))
        {
            log_message('error', "DB ERROR: " . $this->db->_error_message());
            return false;
        }

        $query = "CREATE TABLE IF NOT EXISTS Company (
        	name VARCHAR(35) NOT NULL,
        	city VARCHAR(35) NOT NULL,
        	country VARCHAR(50) NOT NULL,
        	founded INTEGER NOT NULL,
        	PRIMARY KEY (name)
        	) ENGINE = InnoDB";

		if (!$this->db->query($query))
        {
            log_message('error', "DB ERROR: " . $this->db->_error_message());
            return false;
        }

        $query = "CREATE TABLE IF NOT EXISTS User (
        	id INTEGER NOT NULL,
        	username VARCHAR(35) NOT NULL,
        	password VARCHAR(20) NOT NULL,
        	admin CHAR(1) NOT NULL,
        	PRIMARY KEY (id)
        	) ENGINE = InnoDB";

		if (!$this->db->query($query))
        {
            log_message('error', "DB ERROR: " . $this->db->_error_message());
            return false;
        }

        $query = "CREATE TABLE IF NOT EXISTS Review (
        	id INTEGER NOT NULL,
        	rating INTEGER NOT NULL,
        	comment VARCHAR(100),
        	PRIMARY KEY (id)
        	) ENGINE = InnoDB;";

		if (!$this->db->query($query))
        {
            log_message('error', "DB ERROR: " . $this->db->_error_message());
            return false;
        }

        $query = "CREATE TABLE IF NOT EXISTS Store (
        	id INTEGER NOT NULL,
        	name VARCHAR(35) NOT NULL,
        	city VARCHAR(35) NOT NULL,
        	state VARCHAR(25) NOT NULL,
        	PRIMARY KEY (id)
        	) ENGINE = InnoDB";

		if (!$this->db->query($query))
        {
            log_message('error', "DB ERROR: " . $this->db->_error_message());
            return false;
        }

        $query = "CREATE TABLE IF NOT EXISTS Drink (
        	name VARCHAR(50) NOT NULL,
        	PRIMARY KEY (name)
        	) ENGINE = InnoDB";

		if (!$this->db->query($query))
        {
            log_message('error', "DB ERROR: " . $this->db->_error_message());
            return false;
        }

        $query = "CREATE TABLE IF NOT EXISTS Liquor (
        	name VARCHAR(50) NOT NULL,
        	type VARCHAR(35) NOT NULL,
        	proof INTEGER NOT NULL,
        	percent_vol INTEGER NOT NULL,
        	PRIMARY KEY (name),
        	FOREIGN KEY (name) REFERENCES Drink(name)
        	) ENGINE = InnoDB";

		if (!$this->db->query($query))
        {
            log_message('error', "DB ERROR: " . $this->db->_error_message());
            return false;
        }

        $query = "CREATE TABLE IF NOT EXISTS Mixer (
        	name VARCHAR(35) NOT NULL,
        	type VARCHAR(35) NOT NULL,
        	PRIMARY KEY (name),
        	FOREIGN KEY (name) REFERENCES Drink(name)
        	) ENGINE = InnoDB";

		if (!$this->db->query($query))
        {
            log_message('error', "DB ERROR: " . $this->db->_error_message());
            return false;
        }

        $query = "CREATE TABLE IF NOT EXISTS posts (
        	uid INTEGER NOT NULL,
        	rid INTEGER NOT NULL,
        	PRIMARY KEY (uid, rid),
        	FOREIGN KEY (uid) REFERENCES User(id),
        	FOREIGN KEY (rid) REFERENCES Review(id)
        	) ENGINE = InnoDB";

		if (!$this->db->query($query))
        {
            log_message('error', "DB ERROR: " . $this->db->_error_message());
            return false;
        }

        $query = "CREATE TABLE IF NOT EXISTS makes (
        	cname VARCHAR(35) NOT NULL,
        	dname VARCHAR(35) NOT NULL,
        	PRIMARY KEY (cname, dname),
        	FOREIGN KEY (cname) REFERENCES Company(name),
        	FOREIGN KEY (dname) REFERENCES Drink(name)
        	) ENGINE = InnoDB";

		if (!$this->db->query($query))
        {
            log_message('error', "DB ERROR: " . $this->db->_error_message());
            return false;
        }

        $query = "CREATE TABLE IF NOT EXISTS drinks (
        	uid INTEGER NOT NULL,
        	dname VARCHAR(50) NOT NULL,
        	PRIMARY KEY (uid, dname),
        	FOREIGN KEY (uid) REFERENCES User(id),
        	FOREIGN KEY (dname) REFERENCES Drink(name)
        	) ENGINE = InnoDB";

		if (!$this->db->query($query))
        {
            log_message('error', "DB ERROR: " . $this->db->_error_message());
            return false;
        }

        $query = "CREATE TABLE IF NOT EXISTS rates (
        	rid INTEGER NOT NULL,
        	dname VARCHAR(50) NOT NULL,
        	PRIMARY KEY (rid, dname),
        	FOREIGN KEY (rid) REFERENCES Review(id),
        	FOREIGN KEY (dname) REFERENCES Drink(name)
        	) ENGINE = InnoDB";

		if (!$this->db->query($query))
        {
            log_message('error', "DB ERROR: " . $this->db->_error_message());
            return false;
        }

        $query = "CREATE TABLE IF NOT EXISTS sells (
        	sid INTEGER NOT NULL,
        	dname VARCHAR(50) NOT NULL,
        	PRIMARY KEY (sid, dname),
        	FOREIGN KEY (sid) REFERENCES Store(id),
        	FOREIGN KEY (dname) REFERENCES Drink(name)
        	) ENGINE = InnoDB";

		if (!$this->db->query($query))
        {
            log_message('error', "DB ERROR: " . $this->db->_error_message());
            return false;
        }

        $query = "CREATE TABLE IF NOT EXISTS mixes_with (
        	lname VARCHAR(50) NOT NULL,
        	mname VARCHAR(35) NOT NULL,
        	taste VARCHAR(20) NOT NULL,
        	recipe VARCHAR(100) NOT NULL,
        	PRIMARY KEY (lname, mname),
        	FOREIGN KEY (lname) REFERENCES Liquor(name),
        	FOREIGN KEY (mname) REFERENCES Mixer(name)
        	) ENGINE = InnoDB";

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