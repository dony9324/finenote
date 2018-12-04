<?php
class team_subjectsData {
	public static $tablename = "team_subjects";

	public function team_subjectsData(){
		$this->id = "";
		$this->team_id = "";
		$this->subject_id = "";
		$this->teacher_id = "";
	}

	public function getSubjec(){ return subjectData::getById($this->subject_id); }
	public function getTeacher(){ return teacherData::getById($this->teacher_id); }
	public function getTeam(){ return TeamData::getById($this->team_id); }

	public function add(){
		$sql = "insert into team_subjects (team_id, subject_id ,teacher_id) ";
		$sql .= "value (\"$this->team_id\",\"$this->subject_id \",$this->teacher_id)";
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
		$sql = "update ".self::$tablename." set name=\"$this->name\",lastname=\"$this->lastname\",subject_id =\"$this->subject_id \",lastname=\"$this->lastname\",status=\"$this->status\",kind=\"$this->kind\" where id=$this->id";
		Executor::doit($sql);
	}

	public function update_passwd(){
		$sql = "update ".self::$tablename." set teacher_id=\"$this->teacher_id\" where id=$this->id";
		Executor::doit($sql);
	}

	public function updateById($k,$v){
		$sql = "update ".self::$tablename." set $k=\"$v\" where id=$this->id";
		Executor::doit($sql);
	}

	public static function getById($id){
		$sql = "select * from ".self::$tablename." where id=$id";
		$query = Executor::doit($sql);
		return Model::one($query[0],new team_subjectsData());
	}

	public static function getBy($k,$v){
		$sql = "select * from ".self::$tablename." where $k=\"$v\"";
		$query = Executor::doit($sql);
		return Model::one($query[0],new team_subjectsData());
	}

	public static function getAll(){
		$sql = "select * from ".self::$tablename;
		$query = Executor::doit($sql);
		return Model::many($query[0],new team_subjectsData());
	}
	public static function getAllByTeamId($id){
	$sql = "select * from ".self::$tablename." where team_id=$id";
	$query = Executor::doit($sql);
	return Model::many($query[0],new team_subjectsData());
}
public static function getAllByTeacherId($id){
$sql = "select * from ".self::$tablename." where teacher_id=$id";
$query = Executor::doit($sql);
return Model::many($query[0],new team_subjectsData());
}
public static function getAllBySubjetIdTeamId($id,$tid,$idt){
$sql = "select * from ".self::$tablename." where subject_id= \"$id\" && teacher_id= \"$idt\" &&  team_id=$tid";
$query = Executor::doit($sql);
return Model::many($query[0],new team_subjectsData());
}


	public static function getAllBy($k,$v){
		$sql = "select * from ".self::$tablename." where $k=\"$v\"";
		$query = Executor::doit($sql);
		return Model::many($query[0],new team_subjectsData());
	}


	public static function getLike($q){
		$sql = "select * from ".self::$tablename." where name like '%$q%'";
		$query = Executor::doit($sql);
		return Model::many($query[0],new team_subjectsData());
	}


}

?>
