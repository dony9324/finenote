<?php
if(isset($_SESSION["user_id"])){
	if(isset($_GET["o"]) && $_GET["o"]=="add"){
		if(count($_POST)>0){
			$user = new TeacherData();
			$user->name = $_POST["name"];
			$user->lastname = $_POST["lastname"];
			$user->email = $_POST["email"];
			$user->address = $_POST["address"];
			$user->phone = $_POST["phone"];
			$user->identification = $_POST["identification"];
			$user->add();
			$numero_aleatorio = rand(1,9);
			$numero_aleatorio .= rand(1,9);
			$numero_aleatorio .= rand(1,9);
			Core::alert("profesor Guardado!");
			$use = new UserData();
			$use->name = $_POST["name"];
			$use->username = $_POST["identification"];
			$use->password = sha1(md5($numero_aleatorio));
			$use->id_person = $_SESSION["insert_id"];
			// 3 =Estudiante 2=profesor
			$use->kind = 2;
			$use->add();
	Core::alert("Usuario: ". 	$use->username ." contraseña: ".$numero_aleatorio);
			Core::redir("./?view=teacher&o=all");
		}
	}
	else if(isset($_GET["o"]) && $_GET["o"]=="upd"){
		if(count($_POST)>0){
			$user = new TeacherData();
			$user->id = $_POST["id"];
			$user->name = $_POST["name"];
			$user->lastname = $_POST["lastname"];
			$user->email = $_POST["email"];
			$user->address = $_POST["address"];
			$user->phone = $_POST["phone"];
			$user->identification = $_POST["identification"];
			$user->update();
			Core::alert("profesor actualizado!");
			Core::redir("./?view=teacher&o=all");
		}
	}
	else if(isset($_GET["o"]) && $_GET["o"]=="del"){
		$user = teacherData::getById($_GET["id"]);
			$user->del();
		Core::alert("profesor eliminado!");
		Core::redir("./?view=teacher&o=all");
	}
}


?>
