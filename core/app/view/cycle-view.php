<?php

if(!isset($_SESSION["user_id"])){ Core::redir("./");}
$user= UserData::getById($_SESSION["user_id"]);
// si el id  del usuario no existe.
if($user==null){ Core::redir("./");}

if(isset($_GET["o"]) && $_GET["o"]=="all"):?>
<section class="container">
	<div class="row">
		<div class="col-md-12">
			<h1>	Ciclo escolar</h1>

			<br><br>
			<?php
			$users = cycleData::getAll();
			if(count($users)>0){
				?>
				<div class="box box-primary">
					<table class="table table-bordered datatable table-hover">
						<thead>
							<th>Año</th>
							<th>peiodos</th>
							<th></th>
						</thead>
						<?php
						foreach($users as $user){
							?>
							<tr>
								<td><?php echo $user->year; ?></td>
								<th></th>
									<td style="width:120px;">
									<a href="index.php?view=cycle&o=edit&id=<?php echo $user->id;?>" class="btn btn-warning btn-xs">Editar</a>
								</td>

							</tr>
							<?php

						}
						echo "</table></div>";

					}else{
						?>
						<a href="./?view=cycle&o=new" class="btn btn-default"><i class='glyphicon glyphicon-refresh'></i>Abrir ciclo escolar</a>
						<br><br>
						<p class="alert alert-warning">No hay ciclos.</p>
						<?php
					}

					?>

				</div>
			</div>
		</section>

	<?php elseif(isset($_GET["o"]) && $_GET["o"]=="new"):?>
		<section class="container">
			<div class="row">
				<div class="col-md-12">
					<h1>Abrir ciclo escolar</h1>
					<br>
					<form class="form-horizontal" method="post" id="addproduct" action="index.php?action=cycle&o=add" role="form">
						<div class="form-group">
							<label for="year" class="col-md-2 control-label"></label>
							<div class="col-md-6">
									<input type="text"  value="<?php echo date("Y"); ?>" class="form-control" disabled>
								<input type="hidden" name="year" value="<?php echo date("Y"); ?>" class="form-control" id="year" >
							</div>
						</div>
						<div class="form-group">
							<label for="periods" class="col-md-2 control-label">periodos</label>
							<div class="col-md-6">
								<input type="number" name="periods" value="4" class="form-control" id="periods" autofocus="on">
							</div>
						</div>

						<div class="form-group">
							<label for="periods" class="col-md-2 control-label"></label>
							<div class="col-lg-offset-2 col-md-10">
								<button type="submit" class="btn btn-primary">siguiente</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</section>

	<?php elseif(isset($_GET["o"]) && $_GET["o"]=="edit"):?>
		<div class="container">
			<?php $user = cycleData::getById($_GET["id"]);?>
			<div class="row">
				<div class="col-md-12">
					<h1>Editar Usuario</h1>
					<br>
					<form class="form-horizontal" method="post" id="addproduct" action="index.php?action=users&o=upd" role="form">
						<div class="form-group">
							<label for="inputEmail1" class="col-lg-2 control-label">Nombre*</label>
							<div class="col-md-6">
								<input type="text" name="name" value="<?php echo $user->year;?>" class="form-control" id="name" placeholder="Nombre">
							</div>
						</div>
						<div class="form-group">
							<div class="col-lg-offset-2 col-lg-10">
								<input type="hidden" name="user_id" value="<?php echo $user->id;?>">
								<button type="submit" class="btn btn-primary">Actualizar ciclo</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	<?php endif; ?>
