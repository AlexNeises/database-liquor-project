<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Records extends CI_Migration {

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

        $query = "INSERT INTO Company (name, city, country, founded) VALUES
            ('Coca-Cola', 'Atlanta', 'USA', 1886),
            ('Kraft Foods', 'Hastings', 'USA', 1927),
            ('PepsiCo Incorporated', 'New Bern', 'USA', 1919),
            ('Smirnoff', 'Moscow', 'Russia', 1864),
            ('Brown-Forman Corporation', 'Louisville', 'USA', 1870),
            ('Bacardi Limited', 'Santiago de Cuba', 'Cuba', 1862),
            ('Diageo', 'London', 'England', 1997),
            ('Phillips Distilling Company', 'Minneapolis', 'USA', 1912)";

		if (!$this->db->query($query))
        {
            log_message('error', "DB ERROR: " . $this->db->_error_message());
            return false;
        }

        $query = "INSERT INTO User (id, username, password, admin) VALUES
            (1, 'davidtomlin', 'tomlin', 'y'),
            (2, 'alexneises', 'neises', 'y'),
            (3, 'jeffhipp', 'hipp', 'y'),
            (4, 'doinacaragea', 'caragea', 'n'),
            (5, 'johnsmith', 'smith', 'n'),
            (6, 'janedoe', 'doe', 'n')";

        if (!$this->db->query($query))
        {
            log_message('error', "DB ERROR: " . $this->db->_error_message());
            return false;
        }

        $query = "INSERT INTO Review (id, rating, comment) VALUES
            (1, 4, 'Gives me heart burn.'),
            (2, 4, 'Not as good as the cherry'),
            (3, 1, 'Chocolate and alcohol do not mix'),
            (4, 3, 'A little too sweet'),
            (5, 5, 'That is some smooth whiskey!'),
            (6, 5, 'Great mixer'),
            (7, 5, 'So much better than Powerade'),
            (8, 5, 'My favorite flavor of Kool-aid'),
            (9, 3, 'It tastes good, but it is strong'),
            (10, 4, 'The mango is pretty good. I will buy this again'),
            (11, 5, 'Old No. 7... you just cannot beat the classics'),
            (12, 4, 'The honey makes is syrup-tasting')";

        if (!$this->db->query($query))
        {
            log_message('error', "DB ERROR: " . $this->db->_error_message());
            return false;
        }

        $query = "INSERT INTO Store (id, name, city, state) VALUES
            (1, 'The Fridge', 'Manhattan', 'KS'),
            (2, 'Beer Goggles', 'Manhattan', 'KS'),
            (3, 'The Library', 'Manhattan', 'KS'),
            (4, 'Walmart', 'Manhattan', 'KS'),
            (5, 'Walmart', 'Junction City', 'KS'),
            (6, 'Rickels', 'Manhattan', 'KS'),
            (7, 'Regelman', 'Junction City', 'KS'),
            (8, 'Dillons', 'Manhattan', 'KS'),
            (9, 'Nelson', 'Junction City', 'KS'),
            (10, 'Aldi', 'Manhattan', 'KS')";

        if (!$this->db->query($query))
        {
            log_message('error', "DB ERROR: " . $this->db->_error_message());
            return false;
        }

        $query = "INSERT INTO Drink (name) VALUES
            ('Coke'),
            ('Sprite'),
            ('Pibb Xtra'),
            ('Schweppes'),
            ('Grape Kool-aid'),
            ('Cherry Kool-aid'),
            ('Lemon-Lime Kool-aid'),
            ('Lemonade Kool-aid'),
            ('Orangeade'),
            ('Tropical Punch'),
            ('Fruit Punch Gatorade'),
            ('Sorbet Light Summer Strawberry'),
            ('Blueberry'),
            ('Cinnamon Churros'),
            ('Fluffed Marshmallow'),
            ('Iced Cake'),
            ('Espresso'),
            ('Sriracha'),
            ('Whipped'),
            ('Chocolate Cake'),
            ('Black Spiced Rum'),
            ('100 Proof Spiced Rum'),
            ('Private Stock'),
            ('Lime Bite'),
            ('Mango Fusion'),
            ('Limon'),
            ('Big Apple'),
            ('Dragon Berry'),
            ('Gentleman Jack'),
            ('Tennessee Honey'),
            ('Old No. 7'),
            ('Single Barrel')";

        if (!$this->db->query($query))
        {
            log_message('error', "DB ERROR: " . $this->db->_error_message());
            return false;
        }

        $query = "INSERT INTO Liquor (name, type, proof, percent_vol) VALUES
            ('Sorbet Light Summer Strawberry', 'Vodka', 70, 35),
            ('Blueberry', 'Vodka', 70, 35),
            ('Cinnamon Churros', 'Vodka', 70, 35),
            ('Fluffed Marshmallow', 'Vodka', 70, 35),
            ('Iced Cake', 'Vodka', 70, 35),
            ('Espresso', 'Vodka', 70, 35),
            ('Sriracha', 'Vodka', 70, 35),
            ('Whipped', 'Vodka', 70, 35),
            ('Chocolate Cake', 'Vodka', 70, 35),
            ('Black Spiced Rum', 'Rum', 94, 47),
            ('100 Proof Spiced Rum', 'Rum', 100, 50),
            ('Private Stock', 'Rum', 80, 40),
            ('Lime Bite', 'Rum', 70, 35),
            ('Mango Fusion', 'Rum', 70, 35),
            ('Limon', 'Rum', 70, 35),
            ('Big Apple', 'Rum', 70, 35),
            ('Dragon Berry', 'Rum', 70, 35),
            ('Gentleman Jack', 'Whiskey', 80, 40),
            ('Tennessee Honey', 'Whiskey', 70, 35),
            ('Old No. 7', 'Whiskey', 80, 40),
            ('Single Barrel', 'Whiskey', 94, 47)";

        if (!$this->db->query($query))
        {
            log_message('error', "DB ERROR: " . $this->db->_error_message());
            return false;
        }

        $query = "INSERT INTO Mixer (name, type) VALUES
            ('Coke', 'Soda'),
            ('Sprite', 'Soda'),
            ('Pibb Xtra', 'Soda'),
            ('Schweppes', 'Ginger Ale'),
            ('Grape Kool-aid', 'Juice'),
            ('Cherry Kool-aid', 'Juice'),
            ('Lemon-Lime Kool-aid', 'Juice'),
            ('Lemonade Kool-aid', 'Juice'),
            ('Orangeade', 'Juice'),
            ('Tropical Punch', 'Juice'),
            ('Fruit Punch Gatorade', 'Sports Drink')";

        if (!$this->db->query($query))
        {
            log_message('error', "DB ERROR: " . $this->db->_error_message());
            return false;
        }

        $query = "INSERT INTO posts (uid, rid) VALUES
            (1, 1),
            (1, 2),
            (4, 3),
            (5, 4),
            (2, 5),
            (3, 6),
            (1, 7),
            (6, 8),
            (2, 9),
            (3, 10),
            (2, 11),
            (5, 12)";

        if (!$this->db->query($query))
        {
            log_message('error', "DB ERROR: " . $this->db->_error_message());
            return false;
        }

        $query = "INSERT INTO makes (cname, dname) VALUES
            ('Coca-Cola', 'Coke'),
            ('Coca-Cola', 'Sprite'),
            ('Coca-Cola', 'Pibb Xtra'),
            ('Coca-Cola', 'Schweppes'),
            ('Kraft Foods', 'Grape Kool-aid'),
            ('Kraft Foods', 'Cherry Kool-aid'),
            ('Kraft Foods', 'Lemon-Lime Kool-aid'),
            ('Kraft Foods', 'Lemonade Kool-aid'),
            ('PepsiCo Incorporated', 'Orangeade'),
            ('PepsiCo Incorporated', 'Tropical Punch'),
            ('PepsiCo Incorporated', 'Fruit Punch Gatorade'),
            ('Smirnoff', 'Sorbet Light Summer Strawberry'),
            ('Smirnoff', 'Blueberry'),
            ('Smirnoff', 'Cinnamon Churros'),
            ('Smirnoff', 'Fluffed Marshmallow'),
            ('Smirnoff', 'Iced Cake'),
            ('Brown-Forman Corporation', 'Gentleman Jack'),
            ('Brown-Forman Corporation', 'Tennessee Honey'),
            ('Brown-Forman Corporation', 'Old No. 7'),
            ('Brown-Forman Corporation', 'Single Barrel'),
            ('Bacardi Limited', 'Mango Fusion'),
            ('Bacardi Limited', 'Limon'),
            ('Bacardi Limited', 'Big Apple'),
            ('Bacardi Limited', 'Dragon Berry'),
            ('Diageo', 'Black Spiced Rum'),
            ('Diageo', '100 Proof Spiced Rum'),
            ('Diageo', 'Private Stock'),
            ('Diageo', 'Lime Bite'),
            ('Phillips Distilling Company', 'Espresso'),
            ('Phillips Distilling Company', 'Sriracha'),
            ('Phillips Distilling Company', 'Whipped'),
            ('Phillips Distilling Company', 'Chocolate Cake')";

        if (!$this->db->query($query))
        {
            log_message('error', "DB ERROR: " . $this->db->_error_message());
            return false;
        }

        $query = "INSERT INTO drinks (uid, dname) VALUES
            (1, 'Sorbet Light Summer Strawberry'),
            (1, 'Coke'),
            (4, 'Chocolate Cake'),
            (5, 'Fluffed Marshmallow'),
            (2, 'Gentleman Jack'),
            (3, 'Coke'),
            (1, 'Fruit Punch Gatorade'),
            (6, 'Grape Kool-aid'),
            (2, 'Single Barrel'),
            (3, 'Mango Fusion'),
            (2, 'Old No. 7'),
            (5, 'Tennessee Honey')";

        if (!$this->db->query($query))
        {
            log_message('error', "DB ERROR: " . $this->db->_error_message());
            return false;
        }

        $query = "INSERT INTO rates (rid, dname) VALUES
            (1, 'Coke'),
            (2, 'Sorbet Light Summer Strawberry'),
            (3, 'Chocolate Cake'),
            (4, 'Fluffed Marshmallow'),
            (5, 'Gentleman Jack'),
            (6, 'Coke'),
            (7, 'Fruit Punch Gatorade'),
            (8, 'Grape Kool-aid'),
            (9, 'Single Barrel'),
            (10, 'Mango Fusion'),
            (11, 'Old No. 7'),
            (12, 'Tennessee Honey')";

        if (!$this->db->query($query))
        {
            log_message('error', "DB ERROR: " . $this->db->_error_message());
            return false;
        }

        $query = "INSERT INTO sells (sid, dname) VALUES
            (1, 'Coke'),
            (1, 'Sprite'),
            (1, 'Blueberry'),
            (1, 'Fluffed Marshmallow'),
            (1, 'Old No. 7'),
            (1, 'Tennessee Honey'),
            (1, 'Mango Fusion'),
            (1, 'Dragon Berry'),
            (1, 'Limon'),
            (1, 'Lime Bite'),
            (1, 'Whipped'),
            (1, 'Chocolate Cake'),
            (2, 'Sorbet Light Summer Strawberry'),
            (2, 'Cinnamon Churros'),
            (2, 'Iced Cake'),
            (2, 'Espresso'),
            (2, 'Sriracha'),
            (2, 'Whipped'),
            (2, 'Chocolate Cake'),
            (2, 'Limon'),
            (2, 'Big Apple'),
            (2, 'Tennessee Honey'),
            (2, 'Old No. 7'),
            (2, 'Single Barrel'),
            (3, 'Black Spiced Rum'),
            (3, '100 Proof Spiced Rum'),
            (3, 'Private Stock'),
            (3, 'Lime Bite'),
            (3, 'Dragon Berry'),
            (3, 'Big Apple'),
            (3, 'Gentleman Jack'),
            (3, 'Single Barrel'),
            (4, 'Coke'),
            (4, 'Sprite'),
            (4, 'Pibb Xtra'),
            (4, 'Schweppes'),
            (4, 'Grape Kool-aid'),
            (4, 'Cherry Kool-aid'),
            (4, 'Lemon-Lime Kool-aid'),
            (4, 'Lemonade Kool-aid'),
            (4, 'Orangeade'),
            (4, 'Tropical Punch'),
            (4, 'Fruit Punch Gatorade'),
            (5, 'Coke'),
            (5, 'Sprite'),
            (5, 'Pibb Xtra'),
            (5, 'Schweppes'),
            (5, 'Grape Kool-aid'),
            (5, 'Cherry Kool-aid'),
            (5, 'Lemon-Lime Kool-aid'),
            (5, 'Lemonade Kool-aid'),
            (6, 'Sorbet Light Summer Strawberry'),
            (6, 'Blueberry'),
            (6, 'Cinnamon Churros'),
            (6, 'Fluffed Marshmallow'),
            (6, 'Iced Cake'),
            (6, 'Espresso'),
            (6, 'Sriracha'),
            (6, 'Whipped'),
            (6, 'Chocolate Cake'),
            (7, 'Black Spiced Rum'),
            (7, '100 Proof Spiced Rum'),
            (7, 'Private Stock'),
            (7, 'Lime Bite'),
            (7, 'Mango Fusion'),
            (7, 'Limon'),
            (7, 'Big Apple'),
            (7, 'Dragon Berry'),
            (8, 'Coke'),
            (8, 'Sprite'),
            (8, 'Pibb Xtra'),
            (8, 'Schweppes'),
            (8, 'Orangeade'),
            (8, 'Tropical Punch'),
            (8, 'Fruit Punch Gatorade'),
            (9, 'Gentleman Jack'),
            (9, 'Tennessee Honey'),
            (9, 'Old No. 7'),
            (9, 'Single Barrel'),
            (9, 'Coke'),
            (9, 'Sprite'),
            (9, 'Pibb Xtra'),
            (9, 'Schweppes'),
            (10, 'Coke'),
            (10, 'Sprite'),
            (10, 'Pibb Xtra'),
            (10, 'Schweppes'),
            (10, 'Orangeade'),
            (10, 'Tropical Punch'),
            (10, 'Fruit Punch Gatorade')";

        if (!$this->db->query($query))
        {
            log_message('error', "DB ERROR: " . $this->db->_error_message());
            return false;
        }

        $query = "INSERT INTO mixes_with (lname, mname, taste, recipe) VALUES
            ('Sorbet Light Summer Strawberry', 'Coke', 'Sweet', '3 parts liquor to 8 parts mixer'),
            ('Old No. 7', 'Coke', 'Stout', '1 parts liquor to 3 parts mixer'),
            ('Limon', 'Sprite', 'Citrus', '1 parts liquor to 2 parts mixer'),
            ('Mango Fusion', 'Schweppes', 'Fruity', '2 parts liquor to 5 parts mixer'),
            ('Dragon Berry', 'Grape Kool-aid', 'Fruity', '1 parts liquor to 1 parts mixer'),
            ('Big Apple', 'Cherry Kool-aid', 'Fruity', '1 parts liquor to 1 parts mixer'),
            ('Lime Bite', 'Lemon-Lime Kool-aid', 'Citrus', '1 parts liquor to 2 parts mixer'),
            ('Lime Bite', 'Lemonade Kool-aid', 'Citrus', '1 parts liquor to 2 parts mixer'),
            ('Blueberry', 'Orangeade', 'Fruity', '1 parts liquor to 3 parts mixer'),
            ('Mango Fusion', 'Tropical Punch', 'Fruity', '1 parts liquor to 3 parts mixer'),
            ('Limon', 'Fruit Punch Gatorade', 'Sweet', '1 parts liquor to 2 parts mixer'),
            ('Gentleman Jack', 'Coke', 'Stout', '1 parts liquor to 3 parts mixer'),
            ('Tenessee Honey', 'Coke', 'Sweet', '1 parts liquor to 2 parts mixer'),
            ('Gentleman Jack', 'Pibb Xtra', 'Stout', '1 parts liquor to 2 parts mixer'),
            ('Single Barrel', 'Pibb Xtra', 'Stout', '1 parts liquor to 2 parts mixer'),
            ('Cinnamon Churros', 'Sprite', 'Cinnamon', '2 parts liquor to 5 parts mixer'),
            ('Fluffed Marshmallow', 'Sprite', 'Sweet', '2 parts liquor to 5 parts mixer'),
            ('Iced Cake', 'Sprite', 'Sweet', '1 parts liquor to 3 parts mixer'),
            ('Sriracha', 'Sprite', 'Citrus', '2 parts liquor to 5 parts mixer'),
            ('Whipped', 'Sprite', 'Sweet', '1 parts liquor to 3 parts mixer'),
            ('Chocolate Cake', 'Sprite', 'Sweet', '1 parts liquor to 3 parts mixer'),
            ('Espresso', 'Pibb Xtra', 'Bitter', '1 parts liquor to 2 parts mixer'),
            ('Private Stock', 'Coke', 'Stout', '1 parts liquor to 2 parts mixer'),
            ('Black Spiced Rum', 'Coke', 'Stout', '1 parts liquor to 2 parts mixer'),
            ('100 Proof Spiced Rum', 'Coke', 'Stout', '1 parts liquor to 3 parts mixer')";

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