<?php
if(isset($_GET["id"]) && $_GET["id"]!=""){
	$_SESSION["selected_id"]= $_GET["id"];
	Core::redir("./?view=oneteam&id=".$_GET["id"]);
}

?>
