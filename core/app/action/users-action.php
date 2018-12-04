<?php
if(isset($_SESSION["user_id"])){
	if(isset($_GET["o"]) && $_GET["o"]=="add"){
		if(count($_POST)>0){
			$user = new UserData();
			$user->name = $_POST["name"];
			$user->lastname = $_POST["lastname"];
			$user->username = $_POST["username"];
			$user->email = $_POST["email"];
			$user->password = sha1(md5($_POST["password"]));
			$user->add();
			Core::alert("Usuario eliminado!");
			Core::redir("./?view=users");
		}
	}
	else if(isset($_GET["o"]) && $_GET["o"]=="upd"){
		if(count($_POST)>0){
			$user = UserData::getById($_POST["user_id"]);
			$user->name = $_POST["name"];
			$user->lastname = $_POST["lastname"];
			$user->username = $_POST["username"];
			$user->email = $_POST["email"];
			$user->update();

			if($_POST["password"]!=""){
				$user->password = sha1(md5($_POST["password"]));
				$user->update_passwd();
				Core::alert("Se ha actualizado el password!");
			}
			Core::alert("Usuario actualizado!");
			Core::redir("./?view=users&o=all");
		}
	}

	else if(isset($_GET["o"]) && $_GET["o"]=="onpass"){
		if(count($_POST)>0){
			$user = UserData::getById($_SESSION["user_id"]);
			$user->username = $_POST["username"];
			if ($_POST['password'] != $_POST['password2']) {
				Core::alert("La contraseña de verificación no coincide");
				Core::redir("./?view=users&o=onpass&id=".$_SESSION["user_id"]);
			} else {
				$user->password = sha1(md5($_POST["password"]));
				$user->update_passwd();
				$user->updateonpass();
				setcookie("password_updated","true");
				Core::alert("Se ha actualizado el password!");
				Core::redir("./?action=access&o=logout");
			}
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
