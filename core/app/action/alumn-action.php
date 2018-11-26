<?php
if(isset($_SESSION["user_id"])){
	if(isset($_GET["o"]) && $_GET["o"]=="add"){
		if(count($_POST)>0){
			$user = new AlumnData();
			$user->name = $_POST["name"];
			$user->lastname = $_POST["lastname"];
			$user->email = $_POST["email"];
			$user->address = $_POST["address"];
			$user->phone = $_POST["phone"];
			$user->identification = $_POST["identification"];
			$user->turo_id = $_POST["turo_id"];
			$user->add();
			Core::alert("Alumno Guardado!");
			Core::redir("./?view=alumn&o=all");
		}
	}
	else if(isset($_GET["o"]) && $_GET["o"]=="upd"){
		if(count($_POST)>0){
			$user = new AlumnData();
			$user->name = $_POST["name"];
			$user->lastname = $_POST["lastname"];
			$user->username = $_POST["username"];
			$user->email = $_POST["email"];
			$user->address = $_POST["address"];
			$user->phone = $_POST["phone"];
			$user->identification = $_POST["identification"];
			$user->turo_id = $_POST["turo_id"];
			$user->update();
			Core::alert("Alumno actualizado!");
			Core::redir("./?view=alumn&o=all");
		}
	}
	else if(isset($_GET["o"]) && $_GET["o"]=="del"){
		$user = UserData::getById($_GET["id"]);
		if($user->id!=$_SESSION["user_id"]){
			$user->del();
		}
		Core::alert("Usuario eliminado!");
		Core::redir("./?view=users&o=all");
	}
}


?>
