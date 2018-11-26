<?php 
// si el usuario no esta logeado
if(!isset($_SESSION["user_id"])){ Core::redir("./");}
$user= UserData::getById($_SESSION["user_id"]);
// si el id  del usuario no existe.
if($user==null){ Core::redir("./");}
?>
<div class="container">
<div class="row">
<div class="col-md-12">
<?php 
if ($user->kind==1){
?>
<h2>Hola, <?php echo $user->name; ?></h2>
<?php
}
?>
<?php 
if ($user->kind==2){
?>
<h2>Hola, <?php echo $user->name; ?> 2</h2>
<?php
}
?>
<p>Esta es una funcion de demostracion en la que se puede apreciar el login del usuario.</p>
</div>
</div>
</div>
<!-- //modifica el menu del layau -->      
<script>
$( "#hom" ).last().addClass( "active" );
$( "#home" ).last().addClass( "active" );
</script>