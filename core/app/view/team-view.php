<?php
if(!isset($_SESSION["user_id"])){ Core::redir("./");}
$user= UserData::getById($_SESSION["user_id"]);
// si el id  del usuario no existe.
if($user==null){ Core::redir("./");}
if(isset($_GET["o"]) && $_GET["o"]=="all"):?>
<section class="container">
	<div class="row">
		<div class="col-md-12">
			<h1>Grupos</h1>
			<a href="./?view=team&o=new" class="btn btn-default"><i class="fa fa-th-list"></i> Nuevo Grupo</a>
			<br><br>
			<?php
			$users = teamData::getAll();
			if(count($users)>0){
				?>
				<div class="box box-primary">
					<table class="table table-bordered datatable table-hover">
						<thead>

							<th>Nombre</th>
							<th>Curso</th>
							<th></th>
							<th></th>
							<th></th>
						</thead>
						<?php
						foreach($users as $user){
							?>
							<tr>
								
								<td><a href="./?view=team&o=vie&id=<?php echo $user->id;?>"><?php echo $user->name; ?></a></td>
								<th><?php echo $user->step; ?></th>
								<td style="width:120px;">
									<a href="./?view=team&o=ass&id=<?php echo $user->id;?>" class="btn btn-primary btn-xs">Asignar Materias</a>
								</td>
								<td style="width:120px;">
									<a href="./?view=team&o=edit&id=<?php echo $user->id;?>" class="btn btn-warning btn-xs">Editar</a>
								</td>
								<td style="width:120px;">
									<a href="./?action=team&o=del&id=<?php echo $user->id;?>" class="btn btn-danger btn-xs">Eliminar</a>
								</td>
							</tr>
							<?php
						}
						echo "</table></div>";
					}else{
						?>

						<p class="alert alert-warning">No hay grupos.</p>
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
					<h1>Nuevo grupo</h1>
					<br>
					<form class="form-horizontal" method="post" id="addproduct" action="./?action=team&o=add" role="form">
						<div class="form-group">
							<label for="year" class="col-md-2 control-label">Nombre</label>
							<div class="col-md-6">
								<input type="text" name="name" required="" class="form-control" id="name" placeholder="Nombre">
							</div>
						</div>
						<div id="contentmarca" for="trademark" class="form-group">
							<label class="col-sm-2 control-label">Grado</label>
							<div class="col-md-6">
								<select id="step" name="step" class="form-control">
									<option value="">-- Grado --</option>
									<option value="1">1°</option>
									<option value="2">2°</option>
									<option value="3">3°</option>
									<option value="4">4°</option>
									<option value="5">5°</option>
									<option value="6">6°</option>
									<option value="7">7°</option>
									<option value="8">8°</option>
									<option value="9">9°</option>
									<option value="10">10°</option>
									<option value="11">11°</option>
								</select>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label">Favorito</label>
							<div class="col-md-6">
								<div class="checkbox">

									<input type="checkbox" name="is_favorite">
								</div>
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
			<?php $user = teamData::getById($_GET["id"]);?>
			<div class="row">
				<div class="col-md-12">
					<h1>Editar Grupo</h1>
					<br>
					<form class="form-horizontal" method="post" id="addproduct" action="./?action=team&o=upd" role="form">
						<div class="form-group">
							<label for="year" class="col-md-2 control-label">Nombre</label>
							<div class="col-md-6">
								<input type="hidden" name="id"value="<?php echo $user->id;?>" id="id">
								<input type="text" name="name"value="<?php echo $user->name;?>" required="" class="form-control" id="name" placeholder="Nombre">
							</div>
						</div>
						<div id="contentmarca" for="trademark" class="form-group">
							<label class="col-sm-2 control-label">Grado</label>
							<div class="col-md-6">
								<select id="step" name="step" class="form-control">
									<option value="">-- Grado --</option>
									<option value="1"<?php if ($user->step==1 ){echo "selected='true'";}?>>1°</option>
									<option value="2"<?php if ($user->step==2 ){echo "selected='true'";}?>>2°</option>
									<option value="3"<?php if ($user->step==3 ){echo "selected='true'";}?>>3°</option>
									<option value="4"<?php if ($user->step==4 ){echo "selected='true'";}?>>4°</option>
									<option value="5"<?php if ($user->step==5 ){echo "selected='true'";}?>>5°</option>
									<option value="6"<?php if ($user->step==6 ){echo "selected='true'";}?>>6°</option>
									<option value="7"<?php if ($user->step==7 ){echo "selected='true'";}?>>7°</option>
									<option value="8"<?php if ($user->step==8 ){echo "selected='true'";}?>>8°</option>
									<option value="9"<?php if ($user->step==9 ){echo "selected='true'";}?>>9°</option>
									<option value="10"<?php if ($user->step==10){echo "selected='true'";}?>>10°</option>
									<option value="11"<?php if ($user->step==11){echo "selected='true'";}?>>11°</option>
								</select>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label">Favorito</label>
							<div class="col-md-6">
								<div class="checkbox">
									<input type="checkbox" name="is_favorite" <?php if ($user->is_favorite==1){echo "checked";}?>>
								</div>
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
		</div>


	<?php elseif(isset($_GET["o"]) && $_GET["o"]=="ass"):?>
		<div class="container">
			<?php $user = teamData::getById($_GET["id"]);?>
			<div class="row">
				<br>
				<div class="col-md-6">
					<h1> Asignar Materia</h1>
					<br>
					<form class="form-horizontal" method="post" id="addproduct" action="./?action=team&o=ass" role="form">
						<div class="form-group">
							<label class="col-md-4 control-label">Grupo</label>
							<div class="col-md-8">
								<input type="hidden" name="team_id" value="<?php echo $user->id;?>" id="id">
								<input type="text" value="<?php echo $user->name;?>" class="form-control"disabled>
							</div>
						</div>
						<div class="form-group">
							<label for="year" class="col-md-4 control-label">Grado</label>
							<div class="col-md-8">
								<input type="text" value="<?php echo $user->step;?>°" class="form-control"disabled>
							</div>
						</div>
						<?php $users = subjectData::getAll(); ?>
						<div class="form-group">
							<label class="col-md-4 control-label">Asignatura</label>
							<div class="col-md-8">
								<select id="subject_id" name="subject_id" class="form-control" required>
									<option value="">-- Asignatura --</option>
									<?php foreach($users as $user):?>
										<option value="<?php echo $user->id;?>"><?php echo $user->name;?></option>
									<?php endforeach;?>
								</select>
							</div>
						</div>
						<?php $users = teacherData::getAll(); ?>
						<div class="form-group">
							<label class="col-sm-4 control-label">Profesor a impartir</label>
							<div class="col-md-8">
								<select  name="teacher_id" class="form-control" required>
									<option value="">-- Profesor --</option>
									<?php foreach($users as $user):?>
										<option value="<?php echo $user->id;?>"><?php echo $user->name;?></option>
									<?php endforeach;?>
								</select>
							</div>
						</div>

						<div class="form-group">
								<div class="col-lg-offset-4 col-md-10">
								<button type="submit" class="btn btn-primary">Guardar</button>
							</div>
						</div>
					</form>

				</div>
				<div class="col-md-6">
					<h1>Materias Asignadas</h1>




					<?php
					$team =  TeamData::getById($_GET["id"]);
					$alumns = team_subjectsData::getAllByTeamId($_GET["id"]);
					?>
							<!--	<a href="./?view=list&team_id=<?php echo $_GET["id"]; ?>" class="btn btn-default"><i class='fa fa-area-chart'></i> Estadisticas</a> -->
							<br><br>
							<?php
							if(count($alumns)>0){
								// si hay usuarios
								?>
								<table class="table table-bordered table-hover">
									<thead>
										<th>Materia</th>
										<th>Profesor</th>
										<th></th>
									</thead>
									<?php
									foreach($alumns as $al){
										$alumn = $al->getSubjec();
										$teacher = $al->getTeacher();
										?>
										<tr>
											<td><?php echo $alumn->name; ?></td>
											<td><?php echo $teacher->name; ?></td>
											<td style="width:160px;"> <a href="./?action=delsubjectteam&id=<?php echo $alumn->id;?>&idt=<?php echo $teacher->id;?>&tid=<?php echo $team->id;?>" class="btn btn-danger btn-xs">Eliminar del grupo</a></td>
										</tr>
										<?php
									}
									echo "</table>";
								}else{
									echo "<p class='alert alert-danger'>No hay Materias asignadas en este grupo</p>";
								}
								?>














				</div>
			</div>
		</div>








	<?php elseif(isset($_GET["o"]) && $_GET["o"]=="vie"):?>
		<?php
		$team =  TeamData::getById($_GET["id"]);
		$alumns = AlumnTeamData::getAllByTeamId($_GET["id"]);
		?>
		<section class="container">
		<div class="row">
			<div class="col-md-12">
				<br>
				<h1>Alumnos <small><?php echo $team->name;?></small></h1>

				<?php if(count($alumns)>0):?>
					<!-- Single button -->

					<a href="report/team-word.php?team_id=<?php echo $_GET["id"]; ?>" class="btn btn-default"><i class='fa fa-download'></i> Descargar</a>
				<?php endif; ?>
				<!--	<a href="./?view=list&team_id=<?php echo $_GET["id"]; ?>" class="btn btn-default"><i class='fa fa-area-chart'></i> Estadisticas</a> -->
				<br><br>
				<?php
				if(count($alumns)>0){
					// si hay usuarios
					?>
					<table class="table table-bordered table-hover">
						<thead>
							<th>Nombre</th>
							<th></th>
						</thead>
						<?php
						foreach($alumns as $al){
							$alumn = $al->getAlumn();
							?>
							<tr>
								<td><?php echo $alumn->name." ".$alumn->lastname; ?></td>
								<td style="width:160px;"> <a href="./?action=delalumntoteam&id=<?php echo $alumn->id;?>&tid=<?php echo $team->id;?>" class="btn btn-danger btn-xs">Eliminar del grupo</a></td>
							</tr>
							<?php
						}
						echo "</table>";
					}else{
						echo "<p class='alert alert-danger'>No hay Alumnos</p>";
					}
					?>
				</div>
			</div>
				</section>













	<?php endif; ?>
