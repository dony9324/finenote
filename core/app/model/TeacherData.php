<?php
class teacherData {
	public static $tablename = "person";

	public function teacherdata(){
		$this->id = "";
		$this->name = "";
		$this->lastname = "";
		$this->email = "";
		$this->address = "";
		$this->phone = "";
		$this->identification = "";
		$this->image = "";
		$this->turo_id = "";
		$this->kind = 2;
		$this->is_active = "";
		$this->created_at = "NOW()";
	}

	public function add(){
		$sql = "insert into person (name, lastname, email, address, phone, identification, kind, created_at) ";
		$sql .= "value (\"$this->name\",\"$this->lastname\",\"$this->email\",\"$this->address\",\"$this->phone\",\"$this->identification\",\"$this->kind\",$this->created_at)";
		$query = Executor::doit($sql);
		$_SESSION["insert_id"] = $query[1];
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
		$sql = "update ".self::$tablename." set name=\"$this->name\", lastname=\"$this->lastname\", email=\"$this->email\", address=\"$this->address\", phone=\"$this->phone\", identification=\"$this->identification\" where id=$this->id";
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
		return Model::one($query[0],new teacherData());
	}

	public static function getBy($k,$v){
		$sql = "select * from ".self::$tablename." where $k=\"$v\"";
		$query = Executor::doit($sql);
		return Model::one($query[0],new teacherData());
	}

	public static function getAll(){
		$sql = "select * from ".self::$tablename." where kind = 2";
		$query = Executor::doit($sql);
		return Model::many($query[0],new teacherData());
	}

	public static function getAllBy($k,$v){
		 $sql = "select * from ".self::$tablename." where $k=\"$v\"";
		$query = Executor::doit($sql);
		return Model::many($query[0],new teacherData());
	}


	public static function getLike($q){
		$sql = "select * from ".self::$tablename." where name like '%$q%'";
		$query = Executor::doit($sql);
		return Model::many($query[0],new teacherData());
	}


}

?>
