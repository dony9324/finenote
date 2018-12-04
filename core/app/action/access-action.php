<?php
// access-action.php
// este archivo sirve para procesar las opciones de login y logout
if(isset($_GET["o"]) && $_GET["o"]=="login"){
	if(!isset($_SESSION["user_id"])) {
		$user = $_POST['username'];
		$pass = sha1(md5($_POST['password']));
		$base = new Database();
		$con = $base->connect();
		$sql = "select * from user where username= \"".$user."\" and password= \"".$pass."\" and status=1";
		//print $sql;
		$query = $con->query($sql);
		$found = false;
		$userid = null;
		while($r = $query->fetch_array()){
			$found = true ;
			$userid = $r['id'];
			$userkind = $r['kind'];
			$person_id = $r['id_person'];
			$onpass = $r['onpass'];

		}
		if($found==true) {
			$_SESSION['user_id']=$userid ;
			$_SESSION['kind']=$userkind ;
			$_SESSION['person_id']=$person_id ;
			if ($onpass == 0) {
				$_SESSION['onpass']=$onpass ;
			}

			print "Cargando ... $user";
			Core::redir("./?view=home");
		}else {
			setcookie("error_acceder","true",(time()+40));
			Core::redir("./?view=login");
		}
	}else{
		Core::redir("./?view=home");
	}
}
if(isset($_GET["o"]) && $_GET["o"]=="logout"){
	unset($_SESSION);
	session_destroy();
	Core::redir("./?view=login");
}
?>
