<?php
class alumnData {
	public static $tablename = "person";

	public function alumndata(){
		$this->id = "";
		$this->name = "";
		$this->lastname = "";
		$this->email = "";
		$this->address = "";
		$this->phone = "";
		$this->identification = "";
		$this->image = "";
		$this->turo_id = "";
		$this->kind = 3;
		$this->is_active = "";
		$this->created_at = "NOW()";
	}

	public function add(){
		$sql = "insert into person (name, lastname, email, address, phone, identification, turo_id, kind, created_at) ";
		$sql .= "value (\"$this->name\",\"$this->lastname\",\"$this->email\",\"$this->address\",\"$this->phone\",\"$this->identification\",\"$this->turo_id\",\"$this->kind\",$this->created_at)";
		$query = Executor::doit($sql);
		$_SESSION["insert_id"] = $query[1];
/*
		$use = new UserData();
		$use->name = $this->name;
		$use->username = $this->name = "";
		$use->id_person = mysql_insert_id();
		$use->password = sha1(md5($_POST["password"]));
		$use->add();*/

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
		$sql = "update ".self::$tablename." set name=\"$this->name\", lastname=\"$this->lastname\", email=\"$this->email\", address=\"$this->address\", phone=\"$this->phone\", identification=\"$this->identification\", turo_id=\"$this->turo_id\" where id=$this->id";
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
		return Model::one($query[0],new alumnData());
	}

	public static function getBy($k,$v){
		$sql = "select * from ".self::$tablename." where $k=\"$v\"";
		$query = Executor::doit($sql);
		return Model::one($query[0],new alumnData());
	}

	public static function getAll(){
		$sql = "select * from ".self::$tablename." where kind = 3";
		$query = Executor::doit($sql);
		return Model::many($query[0],new alumnData());
	}

	public static function getAllBy($k,$v){
		$sql = "select * from ".self::$tablename." where $k=\"$v\"";
		$query = Executor::doit($sql);
		return Model::many($query[0],new alumnData());
	}


	public static function getLike($q){
		$sql = "select * from ".self::$tablename." where name like '%$q%'";
		$query = Executor::doit($sql);
		return Model::many($query[0],new alumnData());
	}


}

?>
