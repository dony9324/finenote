<?php
if(isset($_SESSION["user_id"])){
if(isset($_GET["o"]) && $_GET["o"]=="add"){
if(count($_POST)>0){
	$user = new subjectData();
	$user->name = $_POST["name"];
	$user->user_id = $_SESSION["user_id"];
	$user->add();
	Core::alert("Asignatura guardada!");
	Core::redir("./?view=subjects&o=all");
}
}
else if(isset($_GET["o"]) && $_GET["o"]=="upd"){
if(count($_POST)>0){
	$user = subjectData::getById($_POST["id"]);
	$user->name = $_POST["name"];
	$user->update();
	Core::alert("Asignatura actualizada!");
	Core::redir("./?view=subjects&o=all");
}
}
else if(isset($_GET["o"]) && $_GET["o"]=="del"){
	$user = subjectData::getById($_GET["id"]);
		$user->del();
	Core::alert("Asignatura eliminado!");
	Core::redir("./?view=subjects&o=all");
}
}


?>
