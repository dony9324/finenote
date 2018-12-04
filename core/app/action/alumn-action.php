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

			$numero_aleatorio = rand(1,9);
			$numero_aleatorio .= rand(1,9);
			$numero_aleatorio .= rand(1,9);

			Core::alert("Alumno Guardado!");
			$use = new UserData();
			$use->name = $_POST["name"];
			$use->username = $_POST["name"].$_POST["identification"];
			$use->password = sha1(md5($numero_aleatorio));
			$use->id_person = $_SESSION["insert_id"];
			// 3 =Estudiante
			$use->kind = 3;
			$use->add();
	Core::alert("Usuario: ". 	$use->username ." contraseña: ".$numero_aleatorio);
			Core::redir("./?view=alumn&o=all");
		}
	}
	else if(isset($_GET["o"]) && $_GET["o"]=="upd"){
		if(count($_POST)>0){
			$user = new AlumnData();
			$user->id = $_POST["id"];
			$user->name = $_POST["name"];
			$user->lastname = $_POST["lastname"];
			$user->email = $_POST["email"];
			$user->address = $_POST["address"];
			$user->phone = $_POST["phone"];
			$user->identification = $_POST["identification"];
			$user->turo_id = $_POST["turo_id"];
			$user->update();
			Core::alert("Alumno actualizado! ");
			Core::redir("./?view=alumn&o=all");
		}
	}
	else if(isset($_GET["o"]) && $_GET["o"]=="del"){
		$user = AlumnData::getById($_GET["id"]);
		$user->del();
		Core::alert("Usuario eliminado!");
		Core::redir("./?view=alumn&o=all");
	}
}


?>
