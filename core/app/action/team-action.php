<?php
if(isset($_SESSION["user_id"])){
	if(isset($_GET["o"]) && $_GET["o"]=="add"){
		if(count($_POST)>0){
			$user = new teamData();
			$user-> name = $_POST["name"];
			$user-> is_favorite =  isset($_POST["is_favorite"]) ? 1 :0;
			$user-> step = $_POST["step"];
			$user->user_id = $_SESSION["user_id"];
			//	$user->password = sha1(md5($_POST["password"]));
			$user->add();
			Core::alert("grupo Guardado");
			Core::redir("./?view=team&o=all");
		}
	}
	else if(isset($_GET["o"]) && $_GET["o"]=="upd"){
		if(count($_POST)>0){
			//	$usera = teamData::getById($_POST["id"]);
			$usera = new teamData();
			$usera->id = $_POST["id"];
			$usera->name = $_POST["name"];
			$usera->step = $_POST["step"];
			$usera->is_favorite = isset($_POST["is_favorite"]) ? 1 :0;
			$usera->update();
			Core::alert("Grupo actualizado!");
			Core::redir("./?view=team&o=all");
		}
	}
	else if(isset($_GET["o"]) && $_GET["o"]=="ass"){
		if(count($_POST)>0){
			//	$usera = teamData::getById($_POST["id"]);
			$usera = new team_subjectsData();
			$usera->team_id = $_POST["team_id"];
			$usera->subject_id = $_POST["subject_id"];
			$usera->teacher_id = $_POST["teacher_id"];
			$usera->add();
			Core::alert("Se asigno materia a Grupo!");
			Core::redir("./?view=team&o=all");
		}
	}
	else if(isset($_GET["o"]) && $_GET["o"]=="del"){
		$user = teamData::getById($_GET["id"]);
		$user->del();
		Core::alert("grupo eliminado!");
		Core::redir("./?view=team&o=all");
	}
}
?>
