<?php
if(isset($_SESSION["user_id"])){
	if(isset($_GET["o"]) && $_GET["o"]=="add"){
		if(count($_POST)>0){
			$user = new cycleData();

			$user-> year = $_POST["year"];
			$user->is_active = 1;
			//	$user->password = sha1(md5($_POST["password"]));
			$user->add();
			Core::alert("Ciclo escolar abierto, Defina los periods");
			Core::redir("./?view=periods&o=new&periods="$_POST["periods"]);
		}
	}
	else if(isset($_GET["o"]) && $_GET["o"]=="fin"){
		if(count($_POST)>0){
			$user = UserData::getById($_POST["user_id"]);
			$user->id = $_POST["id"];
			$user->update();
			Core::alert("Usuario actualizado!");
			Core::redir("./?view=users&o=all");
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
