<?php

class DB 
{
	
	private $db_name;
	private $db_user;
	private $db_pass;
	private $db_host;
	

    protected function connect() 
    {
			$this->db_name = "pooCharacters";
			$this->db_user = "root";
			$this->db_pass = "0000";
			$this->db_host = "localhost";

			$conn = new PDO("mysql:host=".$this->db_host.";dbname=".$this->db_name, $this->db_user, $this->db_pass);
			$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			return $conn;
		}

}