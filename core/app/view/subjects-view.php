<?php
if(!isset($_SESSION["user_id"])){ Core::redir("./");}
$user= UserData::getById($_SESSION["user_id"]);
// si el id  del usuario no existe.
if($user==null){ Core::redir("./");}
if(isset($_GET["o"]) && $_GET["o"]=="all"):?>
<section class="container">
	<div class="row">
		<div class="col-md-12">
			<h1>Lista de Asignaturas</h1>
			<a href="index.php?view=subjects&o=new" class="btn btn-default"><i class='glyphicon glyphicon-plus'></i> Nueva</a>
			<br><br>
			<?php
			$users = subjectData::getAll();
			if(count($users)>0){
				?>
				<div class="box box-primary">
					<table class="table table-bordered datatable table-hover">
						<thead>
							<th>Nombre</th>
							<th></th>
							<th></th>
						</thead>
						<?php
						foreach($users as $user){
							?>
							<tr>
								<td><?php echo $user->name; ?></td>
								<td>
									<a href="index.php?view=Subjects&o=edit&id=<?php echo $user->id;?>" class="btn btn-warning btn-xs">Editar</a>
								</th>
								<th>
									<a href="index.php?action=Subjects&o=del&id=<?php echo $user->id;?>" class="btn btn-danger btn-xs">Eliminar</a>
								</td>
							</tr>
							<?php
						}
						echo "</table></div>";
					}else{
						?>
						<p class="alert alert-warning">No hay usuarios.</p>
						<?php	}	?>
				</div>
			</div>
		</section>
	<?php elseif(isset($_GET["o"]) && $_GET["o"]=="new"):?>
		<section class="container">
			<div class="row">
				<div class="col-md-12">
					<h1>Agregar Usuario</h1>
					<br>
					<form class="form-horizontal" method="post" id="addproduct" action="index.php?action=Subjects&o=add" role="form">
						<div class="form-group">
							<label for="inputEmail1" class="col-lg-2 control-label">Nombre*</label>
							<div class="col-md-6">
								<input type="text" name="name" class="form-control" id="name" placeholder="Nombre">
							</div>
						</div>
						<div class="form-group">
							<div class="col-lg-offset-2 col-lg-10">
								<button type="submit" class="btn btn-primary">Guardar Asignatura</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</section>
	<?php elseif(isset($_GET["o"]) && $_GET["o"]=="edit"):?>
		<div class="container">
			<?php $user = subjectData::getById($_GET["id"]);?>
			<div class="row">
				<div class="col-md-12">
					<h1>Editar Asignatura</h1>
					<br>
					<form class="form-horizontal" method="post" id="addproduct" action="index.php?action=Subjects&o=upd" role="form">
						<div class="form-group">
							<label for="inputEmail1" class="col-lg-2 control-label">Nombre*</label>
							<div class="col-md-6">
								<input type="text" name="name" value="<?php echo $user->name;?>" class="form-control" id="name" placeholder="Nombre">
							</div>
						</div>
						<div class="form-group">
							<div class="col-lg-offset-2 col-lg-10">
								<input type="hidden" name="id" value="<?php echo $user->id;?>">
								<button type="submit" class="btn btn-primary">Actualizar</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	<?php endif; ?>
