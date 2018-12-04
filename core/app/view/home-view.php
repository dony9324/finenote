<?php
// si el usuario no esta logeado
if(!isset($_SESSION["user_id"])){ Core::redir("./");}
 if(isset($_SESSION["onpass"])){ Core::redir("./?view=users&o=onpass&id=".$_SESSION["user_id"]);}
$user= UserData::getById($_SESSION["user_id"]);
// si el id  del usuario no existe.
if($user==null){ Core::redir("./");}
?>
<div class="container">
<div class="row">
<div class="col-md-12">
  <br>

<h2>Hola, <?php echo $user->name; ?></h2>

<p></p>
</div>
</div>
</div>
<!-- //modifica el menu del layau -->
<script>
$( "#hom" ).last().addClass( "active" );
$( "#home" ).last().addClass( "active" );
</script>
