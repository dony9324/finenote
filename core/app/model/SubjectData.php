<?php
class subjectData {
	public static $tablename = "subjects";
	public function subjectData(){
		$this->id = "";
		$this->name = "";
		$this->user_id = "";
		$this->created_at = "NOW()";
	}

	public function add(){
		$sql = "insert into subjects (name,user_id,created_at) ";
		$sql .= "value (\"$this->name\",\"$this->user_id\",$this->created_at)";
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
		$sql = "update ".self::$tablename." set name=\"$this->name\" where id=$this->id";
		Executor::doit($sql);
	}

	public function updateById($k,$v){
		$sql = "update ".self::$tablename." set $k=\"$v\" where id=$this->id";
		Executor::doit($sql);
	}

	public static function getById($id){
		 $sql = "select * from ".self::$tablename." where id=$id";
		$query = Executor::doit($sql);
		return Model::one($query[0],new subjectData());
	}

	public static function getBy($k,$v){
		$sql = "select * from ".self::$tablename." where $k=\"$v\"";
		$query = Executor::doit($sql);
		return Model::one($query[0],new subjectData());
	}

	public static function getAll(){
		 $sql = "select * from ".self::$tablename;
		$query = Executor::doit($sql);
		return Model::many($query[0],new subjectData());
	}

	public static function getAllBy($k,$v){
		 $sql = "select * from ".self::$tablename." where $k=\"$v\"";
		$query = Executor::doit($sql);
		return Model::many($query[0],new subjectData());
	}


	public static function getLike($q){
		$sql = "select * from ".self::$tablename." where year like '%$q%'";
		$query = Executor::doit($sql);
		return Model::many($query[0],new subjectData());
	}


}

?>
