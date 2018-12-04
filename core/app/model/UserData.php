<?php
class UserData {
	public static $tablename = "user";

	public function Userdata(){
		$this->id = "";
		$this->name = "";
		$this->username = "";
		$this->password = "";
		$this->image = "";
		$this->status = "";
		$this->id_person = "";
		$this->kind = "";
		$this->user_id = $_SESSION["user_id"];
		$this->onpass = "";
		$this->created_at = "NOW()";
	}

	public function add(){
		$sql = "insert into user (name,username,password, id_person, kind, created_at) ";
		$sql .= "value (\"$this->name\",\"$this->username\",\"$this->password\",\"$this->id_person\",\"$this->kind\",$this->created_at)";
		Executor::doit($sql);
	}

	public function del(){
		$sql = "delete from ".self::$tablename." where id=$this->id";
		Executor::doit($sql);
	}

	public static function delBy($k,$v){
		$sql = "delete from ".self::$tablename." where $k=\"$v\"";
		Executor::doit($sql);
	}

	public function update(){
		$sql = "update ".self::$tablename." set name=\"$this->name\",lastname=\"$this->lastname\",username=\"$this->username\",lastname=\"$this->lastname\",status=\"$this->status\",kind=\"$this->kind\" where id=$this->id";
		Executor::doit($sql);
	}
	public function updateonpass(){
		$sql = "update ".self::$tablename." set username=\"$this->username\", onpass = 1 where id=$this->id";
		Executor::doit($sql);
	}

	public function update_passwd(){
		$sql = "update ".self::$tablename." set password=\"$this->password\" where id=$this->id";
		Executor::doit($sql);
	}

	public function updateById($k,$v){
		$sql = "update ".self::$tablename." set $k=\"$v\" where id=$this->id";
		Executor::doit($sql);
	}

	public static function getById($id){
		 $sql = "select * from ".self::$tablename." where id=$id";
		$query = Executor::doit($sql);
		return Model::one($query[0],new UserData());
	}

	public static function getBy($k,$v){
		$sql = "select * from ".self::$tablename." where $k=\"$v\"";
		$query = Executor::doit($sql);
		return Model::one($query[0],new UserData());
	}

	public static function getAll(){
		 $sql = "select * from ".self::$tablename;
		$query = Executor::doit($sql);
		return Model::many($query[0],new UserData());
	}

	public static function getAllBy($k,$v){
		 $sql = "select * from ".self::$tablename." where $k=\"$v\"";
		$query = Executor::doit($sql);
		return Model::many($query[0],new UserData());
	}


	public static function getLike($q){
		$sql = "select * from ".self::$tablename." where name like '%$q%'";
		$query = Executor::doit($sql);
		return Model::many($query[0],new UserData());
	}


}

?>
