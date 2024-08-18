<?php

class Database
{
	public static $db;
	public static $con;
	public $user;
	public $pass;
	public $host;
	public $ddbb;

	public function __construct()
	{
		$this->user = "root";
		$this->pass = "";
		$this->host = "localhost";
		$this->ddbb = "hotel_s1";
	}

	public function connect()
	{
		$con = new mysqli($this->host, $this->user, $this->pass, $this->ddbb);
		$con->query("set sql_mode=''");
		return $con;
	}

	function connect1()
	{
		$db = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->ddbb, $this->user, $this->pass);
		$db->exec("set names utf8");
		return $db;
	}

	public static function getCon()
	{
		if (self::$con == null && self::$db == null) {
			self::$db = new Database();
			self::$con = self::$db->connect();
		}
		return self::$con;
	}
}
