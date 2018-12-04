<?php
$teams = team_subjectsData::getAllBySubjetIdTeamId($_GET["id"],$_GET["tid"],$_GET["idt"]);
foreach ($teams as $t) {
	$t->del();
}
Core::redir("./?view=team&o=ass&id=$_GET[tid]");
?>
