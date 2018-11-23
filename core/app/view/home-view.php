<?php
// si el usuario no esta logeado
if(!isset($_SESSION["user_id"])){ Core::redir("./");}
$user= UserData::getById($_SESSION["user_id"]);
// si el id  del usuario no existe.
if($user==null){ Core::redir("./");}
?>

<div id="about" class="about">
	<div class="container">
	<div class="w3-about-head">
		<h3></h3>
		</div>
		<div class="w3-agileitsline">
		<h3>Hola <span><?php echo $user->name; ?></span>  </h3>
		<p></p>
		</div>

    <div class="col-md-6 w3-services-right1-grid">
			<h3></h3>

		</div>
			<!-- banner-bottom -->
			<div class="clearfix"> </div>
	</div>
<!-- //banner-bottom -->
	</div>
</div>
