<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Add_Drink_Name extends CI_Migration {

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

        $query = "CREATE TABLE IF NOT EXISTS mixes_with (
            lname varchar(50) not null,
            mname varchar(35) not null,
            taste varchar(20) not null,
            recipe varchar(100) not null,
            recipe_name varchar(35) not null,
            primary key (lname, mname),
            foreign key (lname) references Liquor(name),
            foreign key (mname) references Mixer(name)
        ) ENGINE = InnoDB";

        if (!$this->db->query($query))
        {
            log_message('error', "DB ERROR: " . $this->db->_error_message());
            return false;
        }

        $query = "INSERT INTO mixes_with (lname, mname, taste, recipe, recipe_name) VALUES
            ('Sorbet Light Summer Strawberry', 'Coke', 'Sweet', '3 parts liquor to 8 parts mixer', 'Stroke'),
            ('Old No. 7', 'Coke', 'Stout', '1 parts liquor to 3 parts mixer', 'Homer'),
            ('Limon', 'Sprite', 'Citrus', '1 parts liquor to 2 parts mixer', 'Shitrus'),
            ('Single Barrel', 'Pibb Xtra', 'Stout', '1 parts liquor to 1 parts mixer', '24th Flavor'),
            ('Mango Fusion', 'Schweppes', 'Fruity', '2 parts liquor to 5 parts mixer', 'Mango Delight'),
            ('Dragon Berry', 'Grape Kool-aid', 'Fruity', '1 parts liquor to 1 parts mixer', 'Berry Blast'),
            ('Big Apple', 'Cherry Kool-aid', 'Fruity', '1 parts liquor to 1 parts mixer', 'Chapple'),
            ('Lime Bite', 'Lemon-Lime Kool-aid', 'Citrus', '1 parts liquor to 2 parts mixer', 'Screaming Betty'),
            ('Lime Bite', 'Lemonade Kool-aid', 'Citrus', '1 parts liquor to 2 parts mixer', 'Bahama Blast'),
            ('Blueberry', 'Orangeade', 'Fruity', '1 parts liquor to 3 parts mixer', 'Rainbow'),
            ('Mango Fusion', 'Tropical Punch', 'Fruity', '1 parts liquor to 3 parts mixer', 'Tropical Breeze'),
            ('Limon', 'Fruit Punch Gatorade', 'Sweet', '1 parts liquor to 2 parts mixer', 'Hatorade'),
            ('Gentleman Jack', 'Coke', 'Stout', '1 parts liquor to 3 parts mixer', 'Jack Around'),
            ('Tenessee Honey', 'Coke', 'Sweet', '1 parts liquor to 2 parts mixer', 'Kissed Coke'),
            ('Gentleman Jack', 'Pibb Xtra', 'Stout', '1 parts liquor to 2 parts mixer', 'Extra Gentle'),
            ('Cinnamon Churros', 'Sprite', 'Cinnamon', '2 parts liquor to 5 parts mixer', 'Devilish Lime'),
            ('Fluffed Marshmallow', 'Sprite', 'Sweet', '2 parts liquor to 5 parts mixer', 'Campfire'),
            ('Iced Cake', 'Sprite', 'Sweet', '1 parts liquor to 3 parts mixer', 'Birthday'),
            ('Sriracha', 'Sprite', 'Citrus', '2 parts liquor to 5 parts mixer', 'Nancy'),
            ('Whipped', 'Sprite', 'Sweet', '1 parts liquor to 3 parts mixer', 'Sweet Lemon'),
            ('Chocolate Cake', 'Sprite', 'Sweet', '1 parts liquor to 3 parts mixer', 'Citrus Cake'),
            ('Espresso', 'Pibb Xtra', 'Bitter', '1 parts liquor to 2 parts mixer', 'Black Coffee'),
            ('Private Stock', 'Coke', 'Stout', '1 parts liquor to 2 parts mixer', 'Private Stalker'),
            ('Black Spiced Rum', 'Coke', 'Stout', '1 parts liquor to 2 parts mixer', 'Blackout'),
            ('100 Proof Spiced Rum', 'Coke', 'Stout', '1 parts liquor to 3 parts mixer', '100 Ways To Die')";

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