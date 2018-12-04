<section class="container">
	<div class="row">
		<div class="col-md-12">
			<h1>Grupos</h1>
			<a href="./?view=team&o=new" class="btn btn-default"><i class="fa fa-th-list"></i> Nuevo Grupo</a>
			<?php

			$alumns = team_subjectsData::getAllByTeacherId($_SESSION['person_id']);
			?>
			<!--	<a href="./?view=list&team_id=<?php echo $_GET["id"]; ?>" class="btn btn-default"><i class='fa fa-area-chart'></i> Estadisticas</a> -->
			<br><br>
			<?php
			if(count($alumns)>0){
				// si hay usuarios
				?>
				<table class="table table-bordered table-hover">
					<thead>
						<th>Nombre</th>
						<th>Grado</th>
						<th>Materia</th>
						<th>Grupo</th>

					</thead>
					<?php
					foreach($alumns as $al){
						$alumn = $al->getSubjec();
						$teacher = $al->getTeacher();
						$user = $al->getTeam();
						?>
						<tr><a href="./?action=selectteam&id=<?php echo $user->id;?>">
							<td><?php echo $user->name; ?></td>

							<td><?php echo $user->step; ?></td>
							<td><?php echo $alumn->name; ?></td>
							<td style="width:130px;"><a href="./?action=selectteam&id=<?php echo $user->id;?>" class="btn btn-default btn-xs">Seleccionar <i class="fa fa-arrow-right"></i></a></td>

						</a>
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
</section>
