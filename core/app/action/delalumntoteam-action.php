<?php
$teams = AlumnTeamData::getAllByAlumnId($_GET["id"]);
foreach ($teams as $t) {
	$t->del();
}
Core::redir("./?view=team&o=vie&id=$_GET[tid]");
?>
