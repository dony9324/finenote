<?php

if(!isset($_SESSION["user_id"])){ Core::redir("./");}
$user= UserData::getById($_SESSION["user_id"]);
// si el id  del usuario no existe.
if($user==null){ Core::redir("./");}
if(isset($_GET["o"]) && $_GET["o"]=="all"):?>
<section class="container">
	<div class="row">
		<div class="col-md-12">
			<h1>Lista de Alumnos</h1>
			<a href="index.php?view=alumn&o=new" class="btn btn-default"><i class='glyphicon glyphicon-user'></i> Nuevo</a>
			<br><br>
			<?php
			if(isset($_SESSION["insert_id"])){ echo "hay". $_SESSION["insert_id"];}
			$users = alumnData::getAll();
			if(count($users)>0){
				?>
				<div class="box box-primary">
					<table class="table table-bordered datatable table-hover">
						<thead>
							<th>Nombre completo</th>
							<th>Telefono</th>
							<th>dirrecion</th>
							<th>turo</th>
							<th>identificacion</th>
							<th>grupo</th>
							<th></th>
							<th></th>
							<th></th>
						</thead>
						<?php
						foreach($users as $user){
							?>
							<tr>
								<td><?php echo $user->name." ".$user->lastname; ?></td>
								<td><?php echo $user->phone; ?></td>
								<td><?php echo $user->address; ?></td>
								<td><?php echo $user->turo_id; ?></td>
								<td><?php echo $user->identification; ?></td>
								<td>
									<?php $hay= true; $found= false; $teams = AlumnTeamData::getAllByAlumnId($user->id);
									foreach($teams as $t){ $found=true;
										$isteam = TeamData::getById($t->team_id);
									}
									if(!$found):
										?>
										<div class="btn-group">
											<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
												Agregar al Grupo <span class="caret"></span>
											</button>
											<ul class="dropdown-menu" role="menu">
												<?php
												$allteams = TeamData::getAll();
												foreach ($allteams as $ate) {
													$hay = false;
													echo "<li><a href='./?action=addalumntoteam&al_id=".$user->id."&t_id=".$ate->id."'>".$ate->name." ".$ate->step."°</a></li>";

												}
												if ($hay) {
													echo "<li><a href='javascript:void()'>No hay Grupos</a></li>";
												}
												?>
											</ul>

										</div>
									<?php		else:
										echo $isteam->name." ".$isteam->step."°";
										?>
									<?php endif;?>
								</td>
								<td style="width:120px;">
									<a href="index.php?view=alumn&o=edit&id=<?php echo $user->id;?>" class="btn btn-warning btn-xs">Editar</a>
								</td>
								<td>
									<a href="index.php?action=alumn&o=del&id=<?php echo $user->id;?>" class="btn btn-danger btn-xs">Eliminar</a>
								</td>
								<td>ver mas</td>
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
					<form class="form-horizontal" method="post" id="addproduct" action="index.php?action=alumn&o=add" role="form">
						<div class="form-group">
							<label for="inputEmail1" class="col-lg-2 control-label">Nombre*</label>
							<div class="col-md-6">
								<input type="text" name="name" class="form-control" id="name" placeholder="Nombre">
							</div>
						</div>
						<div class="form-group">
							<label for="inputEmail1" class="col-lg-2 control-label">Apellido*</label>
							<div class="col-md-6">
								<input type="text" name="lastname" required class="form-control" id="lastname" placeholder="Apellido">
							</div>
						</div>
						<div class="form-group">
							<label for="inputEmail1" class="col-lg-2 control-label">Email*</label>
							<div class="col-md-6">
								<input type="text" name="email" class="form-control" id="email" placeholder="Email">
							</div>
						</div>
						<div class="form-group">
							<label for="inputEmail1" class="col-lg-2 control-label">direcion</label>
							<div class="col-md-6">
								<input type="text" name="address" class="form-control" required id="address" placeholder="direcion">
							</div>
						</div>
						<div class="form-group">
							<label for="inputEmail1" class="col-lg-2 control-label">Telefono</label>
							<div class="col-md-6">
								<input type="text" name="phone" class="form-control" required id="phone" placeholder="Telefono">
							</div>
						</div>
						<div class="form-group">
							<label for="inputEmail1" class="col-lg-2 control-label">identificacion</label>
							<div class="col-md-6">
								<input type="text" name="identification" class="form-control" required id="identification" placeholder="identificacion">
							</div>
						</div>

						<?php $users = tutorData::getAll(); ?>

						<div class="form-group">
							<label class="col-md-2 control-label">Acudiente</label>
							<div class="col-md-6">
								<select id="turo_id" name="turo_id" class="form-control">
									<option value="">-- Acudiente --</option>
									<?php foreach($users as $user):?>
										<option value="<?php echo $user->id;?>"><?php echo $user->name ." ".$user->lastname;?></option>
									<?php endforeach;?>
								</select>
							</div>
						</div>

						<div class="form-group">
							<div class="col-lg-offset-2 col-lg-10">
								<button type="submit" class="btn btn-primary">Guardar Alumno</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</section>

	<?php elseif(isset($_GET["o"]) && $_GET["o"]=="edit"):?>
		<div class="container">
			<?php $user = alumnData::getById($_GET["id"]);?>
			<div class="row">
				<div class="col-md-12">
					<h1>Editar Usuario</h1>
					<br>
					<form class="form-horizontal" method="post" id="addproduct" action="index.php?action=alumn&o=upd" role="form">
						<div class="form-group">
							<label for="inputEmail1" class="col-lg-2 control-label">Nombre*</label>
							<div class="col-md-6">
								<input type="text" name="name" value="<?php echo $user->name;?>" class="form-control" id="name" placeholder="Nombre">
							</div>
						</div>
						<div class="form-group">
							<label for="inputEmail1" class="col-lg-2 control-label">Apellido*</label>
							<div class="col-md-6">
								<input type="text" name="lastname" value="<?php echo $user->lastname;?>" required class="form-control" id="lastname" placeholder="Apellido">
							</div>
						</div>
						<div class="form-group">
							<label for="inputEmail1" class="col-lg-2 control-label">Email*</label>
							<div class="col-md-6">
								<input type="text" name="email" value="<?php echo $user->email;?>" class="form-control" id="email" placeholder="Email">
							</div>
						</div>
						<div class="form-group">
							<label for="inputEmail1" class="col-lg-2 control-label">direcion</label>
							<div class="col-md-6">
								<input type="text" name="address" value="<?php echo $user->address;?>" class="form-control" required id="address" placeholder="direcion">
							</div>
						</div>
						<div class="form-group">
							<label for="inputEmail1" class="col-lg-2 control-label">Telefono</label>
							<div class="col-md-6">
								<input type="text" name="phone" value="<?php echo $user->phone;?>" class="form-control" required id="phone" placeholder="Telefono">
							</div>
						</div>
						<div class="form-group">
							<label for="inputEmail1" class="col-lg-2 control-label">identificacion</label>
							<div class="col-md-6">
								<input type="text" name="identification" value="<?php echo $user->identification;?>" class="form-control" required id="identification" placeholder="identificacion">
							</div>
						</div>
						<?php $users = tutorData::getAll(); ?>
						<div class="form-group">
							<label class="col-md-2 control-label">Acudiente</label>
							<div class="col-md-6">
								<select id="turo_id" name="turo_id" class="form-control">
									<option value="">-- Acudiente --</option>
									<?php foreach($users as $usera):?>
										<option  <?php if ($user->turo_id == $usera->id) {echo "selected='true'";} ?> value="<?php echo $usera->id;?>"><?php echo $usera->name ." ".$usera->lastname;?></option>
									<?php endforeach;?>
								</select>
							</div>
						</div>
						<div class="form-group">
							<div class="col-lg-offset-2 col-lg-10">
								<input type="hidden" name="id" value="<?php echo $user->id;?>">
								<button type="submit" class="btn btn-primary">Actualizar Usuario</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	<?php endif; ?>
