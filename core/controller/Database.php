<?php
class Database {
	public static $db;
	public static $con;
	function __construt(){
		$this->user="root";$this->pass="";$this->host="localhost";$this->ddbb="finenote";
	}

	function connect(){
		$this->user="root";$this->pass="";$this->host="localhost";$this->ddbb="finenote";
		$con = new mysqli($this->host,$this->user,$this->pass,$this->ddbb);
		return $con;
	}

	public static function getCon(){
		if(self::$con==null && self::$db==null){
			self::$db = new Database();
			self::$con = self::$db->connect();
		}
		return self::$con;
	}

}
?>